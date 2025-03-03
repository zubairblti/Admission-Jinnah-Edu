<?php
/**
 * Block Name: Key Features
 *
 * The template for displaying the custom gutenberg block named Key Features.
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package BaseTheme Package
 * @since 1.0.0
 */

// Get all the fields from ACF for this block ID
// $block_fields = get_fields( $block['id'] );
$block_fields = get_fields_escaped( $block['id'] );
// $block_fields = get_fields_escaped( $block['id'] ,'sanitize_text_field' ); // if want to remove all html

// Set the block name for it's ID & class from it's file name
$block_glide_name = $block['name'];
$block_glide_name = str_replace("acf/" , "" , $block_glide_name);

// Set the preview thumbnail for this block for gutenberg editor view.
if( isset( $block['data']['preview_image_help'] )  ) {    /* rendering in inserter preview  */
	echo '<img src="'. $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';
}

// create align class ("alignwide") from block setting ("wide").
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Get the class name for the block to be used for it.
$class_name = (isset($block['className'])) ? $block['className'] : null;

// Making the unique ID for the block.
$id = 'block-' .$block_glide_name . "-" . $block['id'];

// Making the unique ID for the block.
if($block['name']){
	$block_name = $block['name'];
	$block_name = str_replace("/" , "-" , $block_name);
	$name = 'block-' .  $block_name;
}

// Block variables
// $custom_field_of_block = html_entity_decode($block_fields['custom_field_of_block']); // for keeping html from input
// $custom_field_of_block = html_entity_remove($block_fields['custom_field_of_block']); // for removing html from input

// echo '<pre>';
// print_r($block_fields);
// echo '</pre>';
$mth_blk_contact_map = ( isset( $block_fields['mth_blk_contact_map'] ) ) ? $block_fields['mth_blk_contact_map'] : null;
$mth_blk_contact_address = ( isset( $block_fields['mth_blk_contact_address'] ) ) ? $block_fields['mth_blk_contact_address'] : null;
$mth_blk_contact_telephone = ( isset( $block_fields['mth_blk_contact_telephone'] ) ) ? $block_fields['mth_blk_contact_telephone'] : null;
$mth_blk_contact_email = ( isset( $block_fields['mth_blk_contact_email'] ) ) ? $block_fields['mth_blk_contact_email'] : null;
$mth_blk_contact_facebook = ( isset( $block_fields['mth_blk_contact_facebook'] ) ) ? $block_fields['mth_blk_contact_facebook'] : null;
$mth_blk_contact_twitter = ( isset( $block_fields['mth_blk_contact_twitter'] ) ) ? $block_fields['mth_blk_contact_twitter'] : null;
$mth_blk_contact_youtube = ( isset( $block_fields['mth_blk_contact_youtube'] ) ) ? $block_fields['mth_blk_contact_youtube'] : null;
$mth_blk_contact_insta = ( isset( $block_fields['mth_blk_contact_insta'] ) ) ? $block_fields['mth_blk_contact_insta'] : null;
$mth_blk_contact_form_id = ( isset( $block_fields['mth_blk_contact_form_id'] ) ) ? $block_fields['mth_blk_contact_form_id'] : null;




?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name. ' ' . $name; ?> glide-block-<?php echo $block_glide_name; ?>">

<!-- Contact Block -->
<section class="contact-block">
				<div class="container">
					<div class="location-map">
						<iframe src="<?php echo $mth_blk_contact_map;?>" width="600" height="450" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
					<div class="row-block flex-direction-reverse">
						<div class="col-block col-block-7">
							<h3>Send Message</h3>
							<!-- Contact Form -->
							<?php echo do_shortcode( '[contact-form-7 id=".$mth_blk_contact_form_id." title="Contact form 1"]' ); ?>
						</div>
						<div class="col-block col-block-5">
							<h3>Contact Details</h3>
							<ul class="contact-information">
								<li>
									<strong class="title">Address</strong>
									<div class="textbox">
										<address><?php echo html_entity_decode( $mth_blk_contact_address);?></address>
									</div>
								</li>
								<li>
									<strong class="title">Telephone</strong>
									<div class="textbox">
										<span class="text"><a href="tel:<?php echo $mth_blk_contact_telephone;?>"><?php echo $mth_blk_contact_telephone;?></a></span>
									</div>
								</li>
								<li>
									<strong class="title">E-mail</strong>
									<div class="textbox">
										<span class="text email"><a href="mailto:<?php echo $mth_blk_contact_email;?>"><?php echo $mth_blk_contact_email;?></a></span>
									</div>
								</li>
								<li>
									<strong class="title">Social</strong>
									<div class="textbox">
										<ul class="social-networks">
											<li><a href="<?php echo $mth_blk_contact_facebook;?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
											<li><a href="<?php echo $mth_blk_contact_twitter;?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
											<li><a href="<?php echo $mth_blk_contact_youtube;?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
											<li><a href="<?php echo $mth_blk_contact_insta;?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
										</ul>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</section>
</div>
