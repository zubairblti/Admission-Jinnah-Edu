<?php
/**
 * Template Name: Member
 * Template Post Type: page
 *
 * This template is for displaying home page.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package BaseTheme Package
 * @since 1.0.0
 *
 */

// Include header
get_header();

// Global variables
global $option_fields;
global $pID;
global $fields;

$mth_image_along_side_text_image = (isset($fields['mth_image_along_side_text_image']) && $fields['mth_image_along_side_text_image']!='' ) ? $fields['mth_image_along_side_text_image'] : get_the_title();
$mth_image_along_side_text = (isset($fields['mth_image_along_side_text']) && $fields['mth_image_along_side_text']!='' ) ? $fields['mth_image_along_side_text'] : get_the_title();
$mth_image_along_side_text_description = (isset($fields['mth_image_along_side_text_description']) && $fields['mth_image_along_side_text_description']!='' ) ? $fields['mth_image_along_side_text_description'] : get_the_title();
$mth_image_along_side_text_link_title_link = (isset($fields['mth_image_along_side_text_link_title_link']) && $fields['mth_image_along_side_text_link_title_link']!='' ) ? $fields['mth_image_along_side_text_link_title_link'] : get_the_title();

?>
<section id="page-section" class="page-section">
	<!-- Content Start --> <?php while ( have_posts() ) { the_post();
		//Include specific template for the content.
		get_template_part( 'partials/content', 'page' );

	} ?> <div class="clear"></div>
	<div class="ts-80"></div>
	<!-- Content End -->
	
</section> <?php get_footer(); ?>
