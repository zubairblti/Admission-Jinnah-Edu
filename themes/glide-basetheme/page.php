<?php
/**
 * The template for displaying all pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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


// $basethemevar_pagetitle = (isset($fields['basethemevar_pagetitle'])) ? $fields['basethemevar_pagetitle'] : null;
// if(!$basethemevar_pagetitle){
// 	$basethemevar_pagetitle = get_the_title();
// }


//echo '<pre>';
//print_r($fields);
//print_r($option_fields);
$basethemevar_pagetitle = glide_page_title('basethemevar_pagetitle');


$hero_background_image = ( isset( $fields['hero_background_image'] ) ) ? $fields['hero_background_image'] : null;
$hero_text = ( isset( $fields['hero_text'] ) ) ? $fields['hero_text'] : null;
if(empty($about_us_title)){

	$about_us_title= $basethemevar_pagetitle;
}

?>
<!-- Visual Block -->
<section class="visual-banner" style="background-image: url(<?php echo $hero_background_image ; ?>);">

<h2 class="elementor-heading-title elementor-size-default"><?php echo $hero_text ;?></h2>
</section>




	<?php while ( have_posts() ) { the_post();
		//Include specific template for the content.
		get_template_part( 'partials/content', 'page' );

	} ?>


<?php get_footer(); ?>
