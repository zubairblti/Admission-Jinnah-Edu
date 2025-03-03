<?php
/**
 * Template Name: Homepage
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

$dc_blk_banner_title = (isset($fields['dc_blk_banner_title']) && $fields['dc_blk_banner_title']!='' ) ? $fields['dc_blk_banner_title'] : get_the_title();
$dc_blk_banner_kicker = (isset($fields['dc_blk_banner_kicker']) && $fields['dc_blk_banner_kicker']!='' ) ? $fields['dc_blk_banner_kicker'] : get_the_title();
$mth_image_along_side_text_description = (isset($fields['mth_image_along_side_text_description']) && $fields['mth_image_along_side_text_description']!='' ) ? $fields['mth_image_along_side_text_description'] : get_the_title();
$mth_image_along_side_text_link_title_link = (isset($fields['mth_image_along_side_text_link_title_link']) && $fields['mth_image_along_side_text_link_title_link']!='' ) ? $fields['mth_image_along_side_text_link_title_link'] : get_the_title();


$page_id = get_the_ID();

// Retrieve the featured image URL
$image_url = get_the_post_thumbnail_url($page_id, 'full');
//echo '<pre>';
//print_r($fields);

// Display the featured image


?>
<section class="visual-block">
	<div class="container">
		<div class="textbox">
			<h1><?php echo html_entity_decode($dc_blk_banner_title); ?></h1>
			<p><?php echo $dc_blk_banner_kicker; ?></p>
		</div>
		<div class="image-holder">
			<div class="image-wrap">
				<?php 
				if ($image_url) {
					echo '<img src="' . esc_url($image_url) . '" width="325" height="657" alt="DUNYA FOUNDATION">';
				}				
				?>				
			</div>
		</div>
	</div>
</section>
<section id="page-section" class="page-section">
	<!-- Content Start --> <?php while ( have_posts() ) { the_post();
		//Include specific template for the content.
		get_template_part( 'partials/content', 'page' );

	} ?> <div class="clear"></div>
	<div class="ts-80"></div>
	<!-- Content End -->
</section> <?php get_footer(); ?>
