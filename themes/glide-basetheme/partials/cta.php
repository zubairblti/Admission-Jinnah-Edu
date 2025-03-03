<?php
/**
 * Template part for footer cta
 *
 * @link https://developer.wordpress.org/themes/template-files-section/partial-and-miscellaneous-template-files/
 *
 * @package BaseTheme Package
 * @since 1.0.0
 */

$basethemevar_page_cta_pagevisibility = ( isset( $fields['basethemevar_page_cta_pagevisibility'] ) ) ? $fields['basethemevar_page_cta_pagevisibility'] : null;


 $basethemevar_to_cta_headline = ( isset( $fields['basethemevar_to_cta_headline'] ) ) ? $option_fields['basethemevar_to_cta_headline'] : null;
$basethemevar_ftrcta_headline  = ( isset( $fields['basethemevar_page_cta_headline'] ) ) ? $fields['basethemevar_page_cta_headline'] : $basethemevar_to_cta_headline;
?>

<section id="cta-section" class="cta-section">
	<!-- cta Start -->
	<div class="cta-single">
		<div class="wrapper">
			<h4><?php echo $basethemevar_ftrcta_headline; ?></h4>
		</div>
	</div>
	<!-- cta End -->
</section>
