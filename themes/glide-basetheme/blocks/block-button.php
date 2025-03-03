<?php
/**
 * Block Name: Buttons
 *
 * The template for displaying the custom gutenberg block named Buttons.
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
// $basethemevar_blk_btn_variation = (isset($block_fields['basethemevar_blk_btn_variation'])) ? $block_fields['basethemevar_blk_btn_variation'] : null;
$basethemevar_blk_btn_variation		 = $block_fields['basethemevar_blk_btn_variation'];
if($basethemevar_blk_btn_variation 	== 'single'){
	$basethemevar_blk_button 		= $block_fields['basethemevar_blk_button'];
	$basethemevar_blk_btn_style 	= $block_fields['basethemevar_blk_btn_style'];
	if($basethemevar_blk_btn_style == 'de(fault'){
		$block_btn_class = ' button ';
	} else if($basethemevar_blk_btn_style == 'boxed') {
		$block_btn_class = ' boxed button ';
	}
} else {
	$basethemevar_blk_buttons 		=  $block_fields['basethemevar_blk_buttons'];
}

?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name. ' ' . $name; ?> glide-block-<?php echo $block_glide_name; ?>">

	<?php
		if($basethemevar_blk_btn_variation == 'single'){
			if( $basethemevar_blk_button ) :
				echo glide_acf_button( $basethemevar_blk_button, $block_btn_class );
			endif;
		} else {

			if($basethemevar_blk_buttons){
				foreach ($basethemevar_blk_buttons as $button ) {
					$button_link = $button['button'];
					$button_style = $button['style'];
					if($button_style == 'default'){
						$button_style_class = ' button ';
					} else {
						$button_style_class = ' button boxed ';
					}
					if( $button_link ) :
						echo glide_acf_button( $button_link, $button_style_class );
					endif;
				}
			}

		}
	?>

</div>
