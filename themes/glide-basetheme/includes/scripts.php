<?php
/**
 * Setup function for the project
 *
 * @link https://developer.wordpress.org/themes/basics/including-css-javascript/
 *
 * @package BaseTheme Package
 * @since 1.0.0
 */


/**
 * Theme assets
 *
 * Define variable to store asset directory folder in it.
 *
 * That can be used afterward to call stylesheet / scripts etc
 */

// Time format for the_time()
DEFINE( 'project_dtformat', 'F j, Y' );

// Define assets folder
DEFINE( 'assetDir', get_template_directory_uri() . '/assets' );

// Define bundle version
DEFINE( 'ASSET_VERSION_JS', filemtime( get_template_directory() . '/assets/js/jquery.js' ) );
DEFINE( 'ASSET_VERSION_CSS', filemtime( get_template_directory() . '/assets/css/main.css' ) );

/**
 * Theme assets
 *
 * Enqueue and Dequeue required files
 */
function glide_assets() {

	// Enqueue theme styles
	wp_enqueue_style( 'glide-theme-stylesheet', assetDir . '/css/main.css?v=' . ASSET_VERSION_CSS, false, null );
	wp_enqueue_style( 'glide-theme-stylesheet', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css' . ASSET_VERSION_CSS, false, null );
	wp_enqueue_script('jquery-main.js', assetDir . '/js/jquery-main.js', array('jquery'), rand(100000, 9999999), true);
	// Eliminate the emoji script
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );

	// Enqueue comments reply script on single post pages
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( ! is_admin() && ! is_user_logged_in() ) {

		// Deregister dashicons on frontend
		wp_deregister_style( 'dashicons' );
	}
	// wp_enqueue_script( 'jquery' );
// echo '==='.assetDir . '/js/jquery.js?v=' . ASSET_VERSION_JS;
	// Register project scripts
	// wp_register_script( 'glide-theme-scripts', assetDir . '/js/bundle.min.js?v=' . ASSET_VERSION_JS, array( 'jquery' ), null, false );
	wp_register_script( 'jquery', assetDir . '/js/jquery.js?v=' . ASSET_VERSION_JS, array( ), null, false );
	wp_register_script( 'jquery-main-dist', assetDir . '/js/jquery.main-dist.js?v=' . ASSET_VERSION_JS, array( 'jquery' ), null, false );
	wp_register_script( 'jquery-custom', assetDir . '/js/custom.js?v=' . ASSET_VERSION_JS, array( 'jquery' ), null, false );
/*
	if ( is_page_template( 'templates/template-home.php' ) ) {
		wp_enqueue_script( 'owl-carousel-js', get_template_directory_uri() . '/assets/js/vendor/owl.carousel.js', '1.0.0', true );
		wp_enqueue_script( 'owl-carousel-js', get_template_directory_uri() . '/assets/js/vendor/owl.carousel.js', '1.0.0', true );
		wp_enqueue_script( 'home-hero-scripts', get_template_directory_uri() . '/templates/js/home.js', '1.0.0', true );
	}
	if ( is_page_template( 'templates/template-team.php' ) ) {
		wp_enqueue_script( 'magnific-popup-js', get_template_directory_uri() . '/assets/js/vendor/jquery-magnificpopup.js', '1.0.0', true );
		wp_enqueue_script( 'team-js', get_template_directory_uri() . '/templates/js/team.js', '1.0.0', true );
	}
	*/


	// Localize
	wp_localize_script(
		'glide-theme-scripts',
		'localVars',
		array(
			'ajax_url' => admin_url( 'admin-ajax.php' ),
		)
	);

	// Enqueue project scripts
	wp_enqueue_script( 'glide-theme-scripts' );
	wp_enqueue_script( 'jquery-main-dist' );

}

add_action( 'wp_enqueue_scripts', 'glide_assets' );


add_action( 'wp_enqueue_scripts', 'glide_assets' );

function wpdocs_enqueue_custom_admin_style() {
	wp_enqueue_style( 'sample-editor-styles', get_template_directory_uri() . '/assets/css/editor-style.min.css', false, '1.0.0' );
}
add_action( 'admin_enqueue_scripts', 'wpdocs_enqueue_custom_admin_style' );
