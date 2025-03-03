<?php
/**
 * Custom functions added to all projects
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package BaseTheme Package
 * @since 1.0.0
 */

/**
 * Excerpt Function
 *
 * Function used to create custom excerpt.
 */
function glide_excerpt( $count ) {
	global $post;
	$permalink = get_permalink( $post->ID );
	$excerpt   = get_the_excerpt();
	$excerpt   = strip_tags( $excerpt );
	$excerpt   = substr( $excerpt, 0, $count );
	$excerpt   = substr( $excerpt, 0, strripos( $excerpt, ' ' ) );
	$excerpt   = $excerpt . ' ...';
	$excerpt   = $excerpt;
	return $excerpt;
}


/**
 * Excerpt with no read more option
 *
 * Function used to create custom excerpt.
 */
function glide_excerpt_nomore( $count ) {
	global $post;
	$permalink = get_permalink( $post->ID );
	$excerpt   = get_the_excerpt();
	$excerpt   = strip_tags( $excerpt );
	$excerpt   = substr( $excerpt, 0, $count );
	$excerpt   = substr( $excerpt, 0, strripos( $excerpt, ' ' ) );
	$excerpt   = $excerpt;
	return $excerpt;
}


/**
 * Pagination Function
 *
 * The pagination function to display pagination on any archive page
 */
function glide_pagination( $pages = '', $range = 4 ) {
	$showitems = ( $range * 2 ) + 1;

	global $paged;
	if ( empty( $paged ) ) {
		$paged = 1;
	}

	if ( $pages == '' ) {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if ( ! $pages ) {
			$pages = 1;
		}
	}

	if ( 1 != $pages ) {
		echo '<div class="pagination"><span>Page ' . $paged . ' of ' . $pages . '</span>';
		if ( $paged > 2 && $paged > $range + 1 && $showitems < $pages ) {
			echo "<a href='" . get_pagenum_link( 1 ) . "'>&laquo; First</a>";
		}
		if ( $paged > 1 && $showitems < $pages ) {
			echo "<a href='" . get_pagenum_link( $paged - 1 ) . "'>&lsaquo; Previous</a>";
		}

		for ( $i = 1; $i <= $pages; $i++ ) {
			if ( 1 != $pages && ( ! ( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $showitems ) ) {
				echo ( $paged == $i ) ? '<span class="current">' . $i . '</span>' : "<a href='" . get_pagenum_link( $i ) . "' class=\"inactive\">" . $i . '</a>';
			}
		}

		if ( $paged < $pages && $showitems < $pages ) {
			echo '<a href="' . get_pagenum_link( $paged + 1 ) . '">Next &rsaquo;</a>';
		}
		if ( $paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages ) {
			echo "<a href='" . get_pagenum_link( $pages ) . "'>Last &raquo;</a>";
		}
		echo "<div class='clear'></div></div>\n";
	}
}


/**
 * Allow SVG files upload in WordPress Media panel - Default restricted
 */
function glide_svg_upload_support( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

add_filter( 'upload_mimes', 'glide_svg_upload_support' );


/**
 * Remove default WordPress login logo link & set it to homepage of site
 */
function glide_login_logo_url( $url ) {
	return '"' . home_url() . '"';
}

add_filter( 'login_headerurl', 'glide_login_logo_url' );


/**
 * Add viewport meta tag in head
 */
function glide_viewport() {
	echo '
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	';
}

add_action( 'wp_head', 'glide_viewport' );


/**
 * Gravity forms filters
 */
add_filter( 'gform_confirmation_anchor', '__return_true' );
add_filter( 'gform_init_scripts_footer', '__return_true' );

// Set Tabindex For Gravity Form
add_filter( 'gform_tabindex', 'change_tabindex', 10, 2 );
function change_tabindex( $tabindex, $form ) {
	return 10;
}

/**
 * First and last menu item classes
 */
function glide_first_last_menu_classes( $items ) {
	if ( $items ) {
		$items[1]->classes[]                 = 'first-menu-item';
		$items[ count( $items ) ]->classes[] = 'last-menu-item';
		return $items;
	}
	return $items;
}
add_filter( 'wp_nav_menu_objects', 'glide_first_last_menu_classes' );

/**
 * Gravity Forms
 *
 * Disable the tab-index
 */

add_filter(
	'gform_tabindex',
	function() {
		return false;
	}
);



/**
 * Set favicon of dashboard
 */

function glide_theme_favicon() {
	 $favicon_path = get_template_directory_uri() . '/assets/img/pwa/favicon.ico';

	 echo '<link rel="shortcut icon" href="' . esc_url( $favicon_path ) . '" />';
}

add_action( 'admin_head', 'glide_theme_favicon' );

/**
 * Function to remove the starting words from the_archive_title()
 *
 * E.g. from Category : Dallas Neighborhoods => Dallas Neighborhoods
 */

function glide_theme_archive_title( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = get_the_author_meta( 'display_name' );
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	}

	 return $title;
}

add_filter( 'get_the_archive_title', 'glide_theme_archive_title' );



/**
 * Custom logo for WordPress login screen
 *
 * This function replaces the default WordPress logo on the login with website logo.
 */
function glide_login_logo() {
	 echo '
		<style type="text/css">
			.login h1 a {
				background-image: url(' . get_stylesheet_directory_uri() . '/assets/img/logo.svg) !important;
				background-position: center center;
				color:rgba(0, 0, 0, 0);
				background-size: contain;
				height: 80px;
				width: 80%;
				outline: 0;
			}
		</style>
	';
}

add_action( 'login_head', 'glide_login_logo' );

// removing parmalink from team cpt
add_action( 'admin_head', 'wpds_custom_admin_post_css' );
function wpds_custom_admin_post_css() {

	 global $post_type;

	if ( $post_type == 'team' ) {
		echo '<style>#edit-slug-box {display:none;}</style>';
	}
}
