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
$blk_rl_title = ( isset( $block_fields['blk_rl_title'] ) ) ? $block_fields['blk_rl_title'] : null;
$blk_rs_link = ( isset( $block_fields['blk_rs_link'] ) ) ? $block_fields['blk_rs_link'] : null;
$blk_rl_repeater = ( isset( $block_fields['blk_rl_repeater'] ) ) ? $block_fields['blk_rl_repeater'] : null;

?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name. ' ' . $name; ?> glide-block-<?php echo $block_glide_name; ?>">

<!-- Contact Block -->
  <div class="application-resource">
                <div class="container">
                    <div class="btn-holder"><a href="<?php echo $blk_rs_link['url']?>"><?php echo $blk_rs_link['title']?></a></div>
                    <div class="title"><?php echo $blk_rl_title; ?></div>
                    <ul>
						<?php foreach ($blk_rl_repeater as $link) { ?>
                        <li><a href="<?php echo $link['link']['url']; ?>"><?php echo $link['link']['title']; ?></a></li>
                         <?php } ?>
                    </ul>
                </div>

            </div>
</div>
