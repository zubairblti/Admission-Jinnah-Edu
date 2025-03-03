<?php
/**
 * Extra functions for the project
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package BaseTheme Package
 * @since 1.0.0
 */


/**
 * Custom CSS Styling for Admin Page
 *
 * This function adds some new css styles to admin page.
 */
function glide_custom_admin_css() {
	echo '
	<style>

  	</style>
	';
}

add_action( 'admin_head', 'glide_custom_admin_css' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function glide_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'glide_theme_content_width', 900 );
}

add_action( 'after_setup_theme', 'glide_theme_content_width', 0 );

function my_breadcrumbs()
{
	global $post;
	$separator = ' > ';
	$home = 'Home';

	echo '<ul class="breadcrumbs">';

	echo '<li><a href="' . get_home_url() . '">' . $home . '</a></li>';

	if (is_single()) {
		$category = get_the_category();
		if ($category) {
			$cat_id = $category[0]->cat_ID;
			$cat_link = get_category_link($cat_id);
			$cat_name = $category[0]->cat_name;
			echo '<li><a href="' . $cat_link . '">' . $cat_name . '</a></li>';
		}
		echo '<li>' . get_the_title() . '</li>';
	} elseif (is_page()) {
		if ($post->post_parent) {
			$ancestors = get_post_ancestors($post->ID);
			$ancestors = array_reverse($ancestors);
			foreach ($ancestors as $ancestor) {
				$ancestor_title = get_the_title($ancestor);
				$ancestor_link = get_permalink($ancestor);
				echo '<li><a href="' . $ancestor_link . '">' . $ancestor_title . '</a></li>';
			}
		}
		echo '<li>' . get_the_title() . '</li>';
	} elseif (is_category()) {
		echo '<li>' . single_cat_title('', false) . '</li>';
	} elseif (is_tag()) {
		echo '<li>' . single_tag_title('', false) . '</li>';
	} elseif (is_day()) {
		echo '<li>' . get_the_time('F jS, Y') . '</li>';
	} elseif (is_month()) {
		echo '<li>' . get_the_time('F, Y') . '</li>';
	} elseif (is_year()) {
		echo '<li>' . get_the_time('Y') . '</li>';
	} elseif (is_author()) {
		global $author;
		$userdata = get_userdata($author);
		echo '<li>Author: ' . $userdata->display_name . '</li>';
	} elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
		echo '<li>Page ' . $_GET['paged'] . '</li>';
	} elseif (is_search()) {
		echo '<li>Search results for "' . get_search_query() . '"</li>';
	}

	echo '</ul>';
}
