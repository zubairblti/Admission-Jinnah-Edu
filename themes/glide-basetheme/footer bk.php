<?php
/**
 * The template for displaying website footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BaseTheme Package
 * @since 1.0.0
 */
// Global variables
global $option_fields;
global $pID;
global $fields;

$pID = get_the_ID();

if ( is_home() ) {
	$pID = get_option( 'page_for_posts' );
}

if ( is_404() || is_archive() || is_category() || is_search() ) {
	$pID = get_option( 'page_on_front' );
}

if ( function_exists( 'get_fields' ) && function_exists( 'get_fields_escaped' ) ) {
	$option_fields = get_fields_escaped( 'option' );
	$fields        = get_fields_escaped( $pID );
}
?> <?php

// Default Footer Options

$footer_scripts = ( isset( $option_fields['footer_scripts'] ) ) ? $option_fields['footer_scripts'] : null;



// Schema Markup - ACF variables.


$basethemevar_schema_check = isset($option_fields['basethemevar_schema_check']) ? $option_fields['basethemevar_schema_check']:"";
if ( $basethemevar_schema_check ) {
	$basethemevar_schema_business_name       = html_entity_remove( $option_fields['basethemevar_schema_business_name'] );
	$basethemevar_schema_business_legal_name = html_entity_remove( $option_fields['basethemevar_schema_business_legal_name'] );
	$basethemevar_schema_street_address      = html_entity_remove( $option_fields['basethemevar_schema_street_address'] );
	$basethemevar_schema_locality            = html_entity_remove( $option_fields['basethemevar_schema_locality'] );
	$basethemevar_schema_region              = html_entity_remove( $option_fields['basethemevar_schema_region'] );
	$basethemevar_schema_postal_code         = html_entity_remove( $option_fields['basethemevar_schema_postal_code'] );
	$basethemevar_schema_map_short_link      = html_entity_remove( $option_fields['basethemevar_schema_map_short_link'] );
	$basethemevar_schema_latitude            = html_entity_remove( $option_fields['basethemevar_schema_latitude'] );
	$basethemevar_schema_longitude           = html_entity_remove( $option_fields['basethemevar_schema_longitude'] );
	$basethemevar_schema_opening_hours       = html_entity_remove( $option_fields['basethemevar_schema_opening_hours'] );
	$basethemevar_schema_telephone           = html_entity_remove( $option_fields['basethemevar_schema_telephone'] );
	$basethemevar_schema_business_email      = html_entity_remove( $option_fields['basethemevar_schema_business_email'] );
	$basethemevar_schema_business_logo       = html_entity_remove( $option_fields['basethemevar_schema_business_logo'] );
	$basethemevar_schema_price_range         = html_entity_remove( $option_fields['basethemevar_schema_price_range'] );
	$basethemevar_schema_type                = html_entity_remove( $option_fields['basethemevar_schema_type'] );
}
// Custom - ACF variables.
// echo '<pre>';
// print_r($option_fields);
// echo '</pre>';
$basethemevar_ftrop_title     = ( isset( $option_fields['basethemevar_ftrop_title'] ) ) ? $option_fields['basethemevar_ftrop_title'] : null;
$basethemevar_ftrop_text      = isset($option_fields['basethemevar_ftrop_text'])? html_entity_decode( $option_fields['basethemevar_ftrop_text'] ):"";
$basethemevar_ftrop_copyright = isset($option_fields['basethemevar_ftrop_copyright'] )? html_entity_decode( $option_fields['basethemevar_ftrop_copyright'] ):"";
$basethemevar_social_fb       = ( isset( $option_fields['basethemevar_social_fb'] ) ) ? $option_fields['basethemevar_social_fb'] : null;
$basethemevar_social_tw       = ( isset( $option_fields['basethemevar_social_tw'] ) ) ? $option_fields['basethemevar_social_tw'] : null;
$basethemevar_social_li       = ( isset( $option_fields['basethemevar_social_li'] ) ) ? $option_fields['basethemevar_social_li'] : null;
$basethemevar_social_in       = ( isset( $option_fields['basethemevar_social_in'] ) ) ? $option_fields['basethemevar_social_in'] : null;
$mtl_blk_footer_contact_email       = ( isset( $option_fields['mtl_blk_footer_contact_email'] ) ) ? $option_fields['mtl_blk_footer_contact_email'] : null;
$mtl_blk_footer_contact_number       = ( isset( $option_fields['mtl_blk_footer_contact_number'] ) ) ? $option_fields['mtl_blk_footer_contact_number'] : null;
$mtl_blk_footer_location       = ( isset( $option_fields['mtl_blk_footer_location'] ) ) ? $option_fields['mtl_blk_footer_location'] : null;
$mth_blk_footer_logos = ( isset( $option_fields['mth_blk_footer_logos'] ) ) ? $option_fields['mth_blk_footer_logos'] : array();
$mth_blk_footer_logo_img_1 = isset($mth_blk_footer_logos[0]['mth_blk_footer_logo_img']) ? $mth_blk_footer_logos[0]['mth_blk_footer_logo_img']:null;
$mth_blk_footer_logo_title_1 = isset($mth_blk_footer_logos[0]['mth_blk_footer_logo_title']) ? $mth_blk_footer_logos[0]['mth_blk_footer_logo_title']:null;
$mth_blk_footer_logo_img_2 = isset($mth_blk_footer_logos[1]['mth_blk_footer_logo_img']) ? $mth_blk_footer_logos[1]['mth_blk_footer_logo_img']:null;
$mth_blk_footer_logo_title_2 = isset($mth_blk_footer_logos[1]['mth_blk_footer_logo_title']) ? $mth_blk_footer_logos[1]['mth_blk_footer_logo_title']:null;


?>
 <?php get_template_part( 'partials/cta' ); ?> </main>
<footer id="footer" class="footer-section">

	
			<div class="footer-topbar">
				<div class="container">
					<div class="row-block">
						<div class="col-block">
							<div class="logo">
								<a href="#"><img src="<?php echo $mth_blk_footer_logo_img_1; ?>" alt="" width="240" height="80"></a>
							</div>
						</div>
						<div class="col-block">
							<h6>Contact</h6>
							<span class="text"><a href="tel:042-35915336"><?php echo $mtl_blk_footer_contact_number;?></a></span>
						</div>
						<div class="col-block">
							<h6>Email</h6>
							<span class="text"><a href="mailto:info@modeltownhospital.com.pk"><?php echo $mtl_blk_footer_contact_number;?></a></span>
						</div>
						<div class="col-block">
							<h6>Location</h6>
							<address><?php echo html_entity_decode($mtl_blk_footer_location);?></address>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-content">
				<div class="container">
					<div class="row-block">
						<div class="col-block">
							<ul class="social-networks">
								<li><a href="#" class="fab fa-facebook-f"></a></li>
								<li><a href="#" class="fab fa-twitter"></a></li>
								<li><a href="#" class="fab fa-youtube"></a></li>
								<li><a href="#" class="fab fa-instagram"></a></li>
							</ul>
							<form class="form-newsletter">
								<h5>Our Newsletter</h5>
								<div class="newsletter">
									<div class="input-holder">
										<input type="email" class="form-control" placeholder="Email">
										
									</div>
									<button class="btn-submit" type="submit"><i class="fa fa-chevron-right"></i></button>
								</div>
							</form>
						</div>
						<div class="col-block">
							<h5>Patients and Visitors</h5>
							<?php 
								wp_nav_menu( array(
    					   		'theme_location' => 'footer-nav-one',
      							'menu_class' => 'footer-nav',
	  							'container' => false
    							 ) );
							?>
						</div>
						<div class="col-block">
							<h5>Use Full Links</h5>
							<?php 
								wp_nav_menu( array(
    					   		'theme_location' => 'footer-nav-two',
      							'menu_class' => 'footer-nav',
	  							'container' => false
    							 ) );
							?>
						</div>
						<div class="col-block col-project">
							<div class="logo-dunya">
								<a href="#"><img src="<?php echo $mth_blk_footer_logo_img_2; ?>" alt="Dunya Foundation" width="165" height="63"></a>
							</div>
							<p><?php echo html_entity_decode($mth_blk_footer_logo_title_2); ?></p>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-info">
				<p><?php echo str_replace("%%year%%",date("Y"),$basethemevar_ftrop_copyright) ;?></p>
			</div>
		
	<!-- Footer Start -->
	
	<!-- Footer End --> 
	<?php
	if ( $basethemevar_schema_check ) {
		?>
		 <script type="application/ld+json">
	{
		"@context": "http://schema.org",
		"@type": "<?php echo $basethemevar_schema_type; ?>",
		"address": {
			"@type": "PostalAddress",
			"addressLocality": "<?php echo $basethemevar_schema_locality; ?>",
			"addressRegion": "<?php echo $basethemevar_schema_region; ?>",
			"postalCode": "<?php echo $basethemevar_schema_postal_code; ?>",
			"streetAddress": "<?php echo $basethemevar_schema_street_address; ?>"
		},
		"hasMap": "<?php echo $basethemevar_schema_map_short_link; ?>",
		"geo": {
			"@type": "GeoCoordinates",
			"latitude": "<?php echo $basethemevar_schema_latitude; ?>",
			"longitude": "<?php echo $basethemevar_schema_longitude; ?>"
		},
		"name": "<?php echo $basethemevar_schema_business_name; ?>",
		"openingHours": "<?php echo $basethemevar_schema_opening_hours; ?>",
		"telephone": "<?php echo $basethemevar_schema_telephone; ?>",
		"email": "<?php echo $basethemevar_schema_business_email; ?>",
		"url": "<?php echo esc_url( home_url() ); ?>",
		"image": "<?php echo $basethemevar_schema_business_logo; ?>",
		"legalName": "<?php echo $basethemevar_schema_business_legal_name; ?>",
		"priceRange": "<?php echo $basethemevar_schema_price_range; ?>"
	}
	</script> <?php } ?>
</footer> 
</div>

<?php wp_footer(); ?> <?php
if ( $footer_scripts != '' ) {
	?>
	 <div style="display: none;">
	<?php echo html_entity_decode( $footer_scripts, ENT_QUOTES ); ?> </div> <?php } ?> </body>

</html>
