<?php
/**
 * The template  displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package BaseTheme Package
 * @since   1.0.0
 */

// Include header
get_header();

// Global variables
global $option_fields;
global $pID;
global $fields;

// 404 Page - Advanced custom fields variables
$basethemevar_error_headline         = html_entity_decode( $option_fields['basethemevar_error_headline'] );
$basethemevar_error_sub_headline     = html_entity_decode( $option_fields['basethemevar_error_sub_headline'] );
$basethemevar_error_text             = html_entity_decode( $option_fields['basethemevar_error_text'] );
$basethemevar_error_menu             = html_entity_decode( $option_fields['basethemevar_error_menu'] );
$basethemevar_error_menu_bottom_text = html_entity_decode( $option_fields['basethemevar_error_menu_bottom_text'] );
$basethemevar_error_search           = html_entity_decode( $option_fields['basethemevar_error_search'] );

?>
<section id="hero-section" class="hero-section">
	<!-- Hero Start -->
	<section class="m-section">
		<div class="hero-single center-align error-page-hero">
			<div class="wrapper">
				<h1><?php echo $basethemevar_error_headline; ?></h1>
				<div class="banner-text">
					<p><?php echo $basethemevar_error_sub_headline; ?></p>
				</div>
			</div>
		</div>
	</section>
	<!-- Hero End -->
</section>
<section id="page-section" class="page-section">
	<!-- Page Content Start -->
	<div class="m-section">
		<div class="wrapper">
			<section class="error-404 not-found">
				<div class="page-content">
					<?php
					if ( $basethemevar_error_text ) {
						echo $basethemevar_error_text;
					}
					if ( $basethemevar_error_menu ) {
						?>
					<div class="error">
						<?php echo $basethemevar_error_menu; ?> </div>
						<?php
					}
					?>
					<div class="clear"></div>
					<div class="form-404">
						<?php
						if ( $basethemevar_error_menu_bottom_text ) {
							echo $basethemevar_error_menu_bottom_text;
						}
						if ( 1 !== $basethemevar_error_search ) {
							get_search_form();
						}
						?>
					</div>
					<!--404-form-->
				</div><!-- .page-content -->
			</section><!-- .error-404 -->
			<div class="ts-80"></div>
		</div>
	</div>
</section>
<?php
get_footer();
