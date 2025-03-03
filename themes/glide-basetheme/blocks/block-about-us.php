<?php
/**
 * Block Name: About US
 *
 * The template for displaying the custom gutenberg block named Image Alongside Text.
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package BaseTheme Package
 * @since 1.0.0
 */


// Get all the fields from ACF for this block ID

$block_fields = get_fields_escaped( $block['id'] );
// $block_fields = get_fields_escaped( $block['id'] ,'sanitize_text_field' ); // if want to remove all html


// Set the block name for it's ID & class from it's file name
$block_glide_name = $block['name'];
$block_glide_name = str_replace( 'acf/', '', $block_glide_name );

// Set the preview thumbnail for this block for gutenberg editor view.
if ( isset( $block['data']['preview_image_help'] ) ) {    /* rendering in inserter preview  */
	echo '<img src="' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">';
}

// create align class ("alignwide") from block setting ("wide").
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Get the class name for the block to be used for it.
$class_name = ( isset( $block['className'] ) ) ? $block['className'] : null;

// Making the unique ID for the block.
$id = 'block-' . $block_glide_name . '-' . $block['id'];

// Making the unique ID for the block.
if ( $block['name'] ) {
	$block_name = $block['name'];
	$block_name = str_replace( '/', '-', $block_name );
	$name       = 'block-' . $block_name;
}

// Block variables
/*
$basethemevar_iat_title        = $block_fields['basethemevar_iat_title'];
$basethemevar_iat_text         = html_entity_decode( $block_fields['basethemevar_iat_text'] );
$basethemevar_iat_button       = $block_fields['basethemevar_iat_button'];
$basethemevar_iat_img_location = $block_fields['basethemevar_iat_img_location'];
$basethemevar_iat_image        = $block_fields['basethemevar_iat_image'];


if ( $basethemevar_iat_img_location == 'left' ) {
	$basethemevar_iat_img_location = 'image-at-left';
} else {
	$basethemevar_iat_img_location = 'image-at-right';
}*/
// echo '<pre>';
// print_r($block_fields);
// echo '</pre>';
$about_us_title = ( isset( $block_fields['about_us_title'] ) ) ? $block_fields['about_us_title'] : null;
$about_us_kicker = ( isset( $block_fields['about_us_kicker'] ) ) ? $block_fields['about_us_kicker'] : null;
$about_us_description = ( isset( $block_fields['about_us_description'] ) ) ? $block_fields['about_us_description'] : null;
$about_core_values = ( isset( $block_fields['about_core_values'] ) ) ? $block_fields['about_core_values'] : null;
?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name . ' ' . $name; ?> glide-block-<?php echo $block_glide_name; ?>">

			<section class="about">
				<div class="container">
					<header class="section-head">
						<h2><?php echo html_entity_decode( $about_us_title );?></h2>
						<?php echo html_entity_decode( $about_us_description );?>
						
					</header>
					<div class="feature-boxes">
<?php  
						foreach ($about_core_values as $row) {
							?>	

						<div class="box-frame">
							<div class="icon-holder">
								<img src="<?php echo $row['core_value_image']; ?>" alt="icon">
							</div>
							<h3><?php echo $row['core_value_title']; ?></h3>
							<?php echo html_entity_decode($row['core_value_description']);?>
						</div>
						<?php
						  }
						?>
					</div>
				</div>
			</section>
</div>
