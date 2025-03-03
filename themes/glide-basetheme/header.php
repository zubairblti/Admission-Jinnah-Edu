<?php

/**
 * The template for displaying website header
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

if (is_home()) {
	$pID = get_option('page_for_posts');
}

if (is_404() || is_archive() || is_category() || is_search()) {
	$pID = get_option('page_on_front');
}

if (function_exists('get_fields') && function_exists('get_fields_escaped')) {
	$option_fields = get_fields_escaped('option');
	$fields        = get_fields_escaped($pID);
}
// Page Tags - Advanced custom fields variables
$tracking = (isset($option_fields['tracking_code'])) ? $option_fields['tracking_code'] : null;
$ccss     = (isset($option_fields['custom_css'])) ? $option_fields['custom_css'] : null;
$hscripts = (isset($option_fields['head_scripts'])) ? $option_fields['head_scripts'] : null;
$bscripts = (isset($option_fields['body_scripts'])) ? $option_fields['body_scripts'] : null;

$apply_button_top_header     = isset($option_fields['apply_button_top_header']) ? $option_fields['apply_button_top_header'] : null;
$basethemevar_tohdr_btn_two = isset($option_fields['basethemevar_tohdr_btn_two']) ? $option_fields['basethemevar_tohdr_btn_two'] : null;
$basethemevar_tohdr_tbar    = isset($option_fields['basethemevar_tohdr_tbar']) ? $option_fields['basethemevar_tohdr_tbar'] : null;
$mth_image_along_side_text = (isset($fields['mth_image_along_side_text']) && $fields['mth_image_along_side_text'] != '') ? $fields['mth_image_along_side_text'] : get_the_title();
$mth_image_along_side_text_description = (isset($fields['mth_image_along_side_text_description']) && $fields['mth_image_along_side_text_description'] != '') ? $fields['mth_image_along_side_text_description'] : get_the_title();
$mth_image_along_side_text_link_title_link = (isset($fields['mth_image_along_side_text_link_title_link']) && $fields['mth_image_along_side_text_link_title_link'] != '') ? $fields['mth_image_along_side_text_link_title_link'] : get_the_title();
// Page variables - Advanced custom fields variables
$jinnah_header_logo     = isset($option_fields['jinnah_header_logo']) ? $option_fields['jinnah_header_logo'] : null;
$dc_get_app_link     = isset($option_fields['dc_get_app_link']) ? $option_fields['dc_get_app_link'] : null;

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<?php
	// Add Head Scripts
	if ($hscripts != '') {
		echo html_entity_decode($hscripts, ENT_QUOTES);
	}
	?>
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/pwa/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/pwa/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/pwa/favicon-16x16.png">
	<link rel="icon" sizes="any" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/pwa/favicon.ico">
	<link rel="icon" type="image/svg+xml" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/pwa/icon.svg">
	<link rel="manifest" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/pwa/site.webmanifest">
	<meta name="theme-color" content="#0047FE">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="application-name" content="BaseTheme Package">
	<!-- Windows Phone -->
	<meta name="msapplication-navbutton_color" content="#0047FE">
	<meta name="msapplication-TileColor" content="#0047FE">
	<meta name="msapplication-tap-highlight" content="no">
	<meta name="msapplication-TileImage" content="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/pwa/pwa-icon-144.png">
	<!-- iOS Safari -->
	<meta name="apple-mobile-web-app-status-bar-style" content="#0047FE">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<?php if (is_front_page()) { ?>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<?php
	} else {
	?>

		<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<?php
	}
?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<?php 
	// Tracking Code
	if ($tracking != '') {
		echo html_entity_decode($tracking, ENT_QUOTES);
	}

	// Custom CSS
	if ($ccss != '') {
		echo '<style type="text/css">';
		echo html_entity_decode($ccss, ENT_QUOTES);
		echo '</style>';
	}
	?>
	<?php wp_head(); ?> 
	<!-- <script>
		"serviceWorker" in navigator && window.addEventListener("load", function() {
			navigator.serviceWorker.register("/sw.js").then(function(e) {
				console.log("ServiceWorker registration successful with scope: ", e.scope)
			}, function(e) {
				console.log("ServiceWorker registration failed: ", e)
			})
		});
	</script> -->

	<!-- Google Tag Manager -->
	<!-- <script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src =
				'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-TZQ96ZB');
	</script> -->
	<!-- End Google Tag Manager -->
</head>

<body <?php body_class(); ?>> 
	<!-- Google Tag Manager (noscript) -->
<!-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TZQ96ZB"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> -->
<!-- End Google Tag Manager (noscript) -->
	
	
	<?php wp_body_open(); ?> <?php
														if ($bscripts != '') {
														?>
		<div style="display: none;" id='wrapper'>
			<?php echo html_entity_decode($bscripts, ENT_QUOTES); ?> </div> <?php } ?> <a class="skip-link screen-reader-text" href="#page-section"><?php esc_html_e('Skip to content', 'basetheme_td'); ?></a>
	<!-- Header of the page -->



	<header id="header" class="header">
		<div class="top-header" id="top-header">
			<div class="container">
				<div class="top-header-inner">
					<div class="top-header-left"><a target="_blank" rel="noopener" href="<?php echo $apply_button_top_header; ?>">Apply</a></div>
					<div class="top-header-right">

						<form role="search" method="get" class="search-form" action="#">
							<label>
								<span class="screen-reader-text">Search for:</span>
								<input type="search" class="search-field" placeholder="Search …" value="" name="s">
							</label>
							<input type="submit" class="search-submit" value="Search">
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="master-header">
			<div class="container">
				<div class="master-header-inner">
					<div class="logo-holder">
						<a class="dark-logo" href="https://www.jinnah.edu/"><img src="<?php echo $jinnah_header_logo; ?>" alt="MAJU"></a>
					</div>
					<div class="navigation">
						<div class="header-holder">
							<a href="javascript:;" class="nav-opener"><span></span></a>

							<!-- <ul id="menu-custmenu" class="menu main-menu">
								<div class="nav-wrap"> -->
							<?php
							pgroup_header_navigation();
							?>

							<!-- </div>
                                </ul> -->
						</div>
					</div>
				</div>



			</div>
		</div>
	</header>

	<!-- Main Area Start -->
	<main id="main" class="main-section">