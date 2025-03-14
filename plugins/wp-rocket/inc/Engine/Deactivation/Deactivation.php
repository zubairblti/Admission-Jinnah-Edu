<?php

namespace WP_Rocket\Engine\Deactivation;

use WP_Rocket\Admin\Options;
use WP_Rocket\Dependencies\League\Container\Container;
use WP_Rocket\Engine\Admin\Beacon\ServiceProvider as BeaconServiceProvider;
use WP_Rocket\Engine\Support\ServiceProvider as SupportServiceProvider;
use WP_Rocket\ServiceProvider\Options as OptionsServiceProvider;
use WP_Rocket\ThirdParty\Hostings\HostResolver;
use WP_Rocket\ThirdParty\Hostings\ServiceProvider as HostingsServiceProvider;

class Deactivation {
	const DEACTIVATION_ENDPOINT = 'https://api.wp-rocket.me/api/wp-rocket/deactivate-licence.php';

	/**
	 * Aliases in the container for each class that needs to call its deactivate method
	 *
	 * @var array
	 */
	private static $deactivators = [
		'advanced_cache',
		'capabilities_manager',
		'wp_cache',
		'cloudflare_plugin_subscriber',
	];

	/**
	 * Performs these actions during the plugin deactivation
	 *
	 * @return void
	 */
	public static function deactivate_plugin() {
		global $is_apache;

		$container = new Container();

		$container->add( 'options_api', new Options( 'wp_rocket_' ) );
		$container->add( 'template_path', WP_ROCKET_PATH . 'views' );

		$container->addServiceProvider( new OptionsServiceProvider() );
		$container->addServiceProvider( new BeaconServiceProvider() );
		$container->addServiceProvider( new SupportServiceProvider() );

		$container->addServiceProvider( new ServiceProvider() );
		$container->addServiceProvider( new HostingsServiceProvider() );

		$host_type = HostResolver::get_host_service();

		if ( ! empty( $host_type ) ) {
			array_unshift( self::$deactivators, $host_type );
		}

		foreach ( self::$deactivators as $deactivator ) {
			$container->get( $deactivator );
		}

		if ( ! isset( $_GET['rocket_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_GET['rocket_nonce'] ), 'force_deactivation' ) ) {
			$causes = [];

			// .htaccess problem.
			if ( $is_apache && ! rocket_direct_filesystem()->is_writable( get_home_path() . '.htaccess' ) ) {
				$causes[] = 'htaccess';
			}

			/**
			 * Filters the causes which can prevent the deactivation of the plugin
			 *
			 * @since 3.6.3
			 *
			 * @param array $causes An array of causes to pass to the notice.
			 */
			$causes = (array) apply_filters( 'rocket_prevent_deactivation', $causes );

			if ( count( $causes ) ) {
				set_transient( get_current_user_id() . '_donotdeactivaterocket', $causes );
				wp_safe_redirect( wp_get_referer() );
				die();
			}
		}

		// Delete config files.
		rocket_delete_config_file();

		$sites_number = count( _rocket_get_php_files_in_dir( rocket_get_constant( 'WP_ROCKET_CONFIG_PATH' ) ) );

		if ( ! $sites_number ) {
			// Delete All WP Rocket rules of the .htaccess file.
			flush_rocket_htaccess( true );
		}

		// Update customer key & licence.
		wp_remote_get(
			self::DEACTIVATION_ENDPOINT,
			[
				'blocking' => false,
			]
		);

		// Delete transients.
		delete_transient( 'rocket_check_licence_30' );
		delete_transient( 'rocket_check_licence_1' );
		delete_transient( 'rocket_rucss_as_tables_count' );
		delete_site_transient( 'update_wprocket_response' );
		delete_site_transient( 'wp_rocket_update_data' );

		// Delete user metadata.
		rocket_renew_box( 'preload_notice' );

		// Unschedule WP Cron events.
		wp_clear_scheduled_hook( 'rocket_cache_dir_size_check' );

		/**
		 * WP Rocket deactivation.
		 *
		 * @since 3.6.3 add $sites_count parameter.
		 * @since  3.1.5
		 *
		 * @param int $sites_number Number of WP Rocket config files found.
		 */
		do_action( 'rocket_deactivation', $sites_number );
	}
}
