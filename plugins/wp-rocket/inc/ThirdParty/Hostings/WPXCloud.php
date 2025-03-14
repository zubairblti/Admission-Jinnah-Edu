<?php

namespace WP_Rocket\ThirdParty\Hostings;

use WP_Rocket\ThirdParty\ReturnTypesTrait;

/**
 * Compatibility class for WPX Cloud.
 */
class WPXCloud extends AbstractNoCacheHost {
	/**
	 * Array of events this subscriber wants to listen to.
	 *
	 * @return array
	 */
	public static function get_subscribed_events() {
		return [
			'rocket_varnish_ip'                       => 'varnish_ip',
			'rocket_display_input_varnish_auto_purge' => 'return_false',
			'do_rocket_varnish_http_purge'            => 'return_true',
			'rocket_varnish_field_settings'           => 'varnish_addon_title',
			'after_rocket_htaccess_rules'             => 'append_cache_control_header',
		];
	}

	/**
	 * Adds WPX Cloud Varnish IP to varnish IPs array
	 *
	 * @param array $varnish_ip Varnish IP.
	 * @return array
	 */
	public function varnish_ip( $varnish_ip ) {
		if ( ! is_array( $varnish_ip ) ) {
			$varnish_ip = (array) $varnish_ip;
		}

		$varnish_ip[] = '127.0.0.1:6081';

		return $varnish_ip;
	}

	/**
	 * Displays custom title for the Varnish add-on
	 *
	 * @param array $settings Array of settings for Varnish.
	 * @return array
	 */
	public function varnish_addon_title( array $settings ) {
		$settings['varnish_auto_purge']['title'] = sprintf(
			// Translators: %s = Hosting name.
			__( 'Your site is hosted on %s, we have enabled Varnish auto-purge for compatibility.', 'rocket' ),
			'WPX'
		);

		return $settings;
	}

	/**
	 * Append cache control header.
	 *
	 * @return string
	 */
	public function append_cache_control_header(): string {
		$header  = '<IfModule mod_headers.c>' . PHP_EOL;
		$header .= 'Header append Cache-Control " s-maxage=3600, stale-while-revalidate=21600" "expr=%{CONTENT_TYPE} =~ m#text/html#"' . PHP_EOL;
		$header .= '</IfModule>' . PHP_EOL;

		return $header;
	}

	/**
	 * Performs these actions during the plugin activation.
	 *
	 * @return void
	 */
	public function activate() {
		parent::activate();

		add_action( 'rocket_activation', [ $this, 'append_cache_control_header_on_activation' ] );
	}

	/**
	 * Append cache control header.
	 *
	 * @return void
	 */
	public function append_cache_control_header_on_activation() {
		add_filter( 'after_rocket_htaccess_rules', [ $this, 'append_cache_control_header' ] );
	}
}
