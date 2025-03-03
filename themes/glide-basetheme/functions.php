<?php
/**
 * Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * Please note that missing files will produce a fatal error.
 *
 * @package BaseTheme Package
 * @since 1.0.0
 */

$file_includes = array(
	'includes/setup.php',               // Basic theme setup
	'includes/scripts.php',             // Enqueue theme styles and scripts
	'includes/project.php',             // Custom functions for this specific project
	'includes/acf.php',                 // Advanced custom fields functions
	'includes/blocks.php',              // Custom Gutenberg blocks
	'includes/cpt.php',                 // Custom post types setup
	'includes/custom.php',              // Custom functions
	'includes/ajax.php',                // Ajax related functions
	'includes/editor.php',              // Editor styles
	'includes/nav-walker.php',          // Header nav Walker
	'includes/api.php',                 // Api
);

/**
 * Checks if any file have error while including it.
 */
foreach ( $file_includes as $file ) {
	if ( ! $filepath = locate_template( $file ) ) {
		trigger_error( sprintf( __( 'Error locating %s for inclusion', 'basetheme_td' ), $file ), E_USER_ERROR );
	}
	require_once $filepath;
}
unset( $file, $filepath );

// For Speed Optimization CSS Add
function custom_inline_styles() {
    if ((is_home() || is_front_page()) && !is_admin()) {
        ?>
        <style>
/*! CSS Used from: https://admissions.jinnah.edu/wp-includes/css/dist/block-library/style.min.css?ver=6.5.5 ; media=all */
@media all{
ul{box-sizing:border-box;}
:root{--wp--preset--font-size--normal:16px;--wp--preset--font-size--huge:42px;}
.screen-reader-text{border:0;clip:rect(1px,1px,1px,1px);-webkit-clip-path:inset(50%);clip-path:inset(50%);height:1px;margin:-1px;overflow:hidden;padding:0;position:absolute;width:1px;word-wrap:normal!important;}
.screen-reader-text:focus{background-color:#ddd;clip:auto!important;-webkit-clip-path:none;clip-path:none;color:#444;display:block;font-size:1em;height:auto;left:5px;line-height:normal;padding:15px 23px 14px;text-decoration:none;top:5px;width:auto;z-index:100000;}
}
</style>
        <?php
    }
}
add_action('wp_head', 'custom_inline_styles');

// CSS Files remove
function custom_dequeue_styles() {
    if ((is_home() || is_front_page()) && !is_admin()) {    
        wp_dequeue_style('wp-block-library');
    }
}
add_action('wp_enqueue_scripts', 'custom_dequeue_styles', 100);