<?php

/**
 * Block Name: Image Alongside Text
 *
 * The template for displaying the custom gutenberg block named Key Features.
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package Hadaff Allied
 * @since 1.0.0
 */

// Get all the fields from ACF for this block ID
// $block_fields = get_fields( $block['id'] );
$block_fields = get_fields_escaped($block['id']);
// $block_fields = get_fields_escaped( $block['id'] ,'sanitize_text_field' ); // if want to remove all html

// Set the block name for it's ID & class from it's file name
$block_glide_name = $block['name'];
$block_glide_name = str_replace("acf/", "", $block_glide_name);

// Set the preview thumbnail for this block for gutenberg editor view.
if (isset($block['data']['preview_image_help'])) {    /* rendering in inserter preview  */
	echo '<img src="' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">';
}

// create align class ("alignwide") from block setting ("wide").
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// Get the class name for the block to be used for it.
$class_name = (isset($block['className'])) ? $block['className'] : null;

// Making the unique ID for the block.
$id = 'block-' . $block_glide_name . "-" . $block['id'];

// Making the unique ID for the block.
if ($block['name']) {
	$block_name = $block['name'];
	$block_name = str_replace("/", "-", $block_name);
	$name = 'block-' .  $block_name;
}

// Block variables
// $custom_field_of_block = html_entity_decode($block_fields['custom_field_of_block']); // for keeping html from input
// $custom_field_of_block = html_entity_remove($block_fields['custom_field_of_block']); // for removing html from input

// echo '<pre>';
// print_r($block_fields);
// echo '</pre>';
$blk_pt_title = (isset($block_fields['blk_pt_title'])) ? $block_fields['blk_pt_title'] : null;
$blk_pt_description = (isset($block_fields['blk_pt_description'])) ? $block_fields['blk_pt_description'] : null;
$blk_pt_sub_title_left = (isset($block_fields['blk_pt_sub_title_left'])) ? $block_fields['blk_pt_sub_title_left'] : null;
$blk_pt_text_left = (isset($block_fields['blk_pt_text_left'])) ? $block_fields['blk_pt_text_left'] : null;
$blk_pt_image = (isset($block_fields['blk_pt_image'])) ? $block_fields['blk_pt_image'] : null;
$blk_pt_sub_title_right = (isset($block_fields['blk_pt_sub_title_right'])) ? $block_fields['blk_pt_sub_title_right'] : null;
$blk_pt_text_right = (isset($block_fields['blk_pt_text_right'])) ? $block_fields['blk_pt_text_right'] : null;
$blk_pt_link = (isset($block_fields['blk_pt_link'])) ? $block_fields['blk_pt_link'] : null;

?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name . ' ' . $name; ?> glide-block-<?php echo $block_glide_name; ?>">

	<!-- Setion opportunities -->
	<section class="secure-future">
                <div class="container">
                    <div class="title">
                      <?php echo $blk_pt_title;?>
                    </div>
                    <div class="text">
                         <?php echo $blk_pt_description;?>
                    </div>
                    <div class="box-holder">
                        <div class="left-col">
                            <span>  <?php echo $blk_pt_sub_title_left;?></span>
                            <p>  <?php echo $blk_pt_text_left;?></p>
                        </div>
                        <div class="image-holder"><img src="  <?php echo $blk_pt_image;?>" alt=""></div>
                        <div class="right-col">
                            <span>  <?php echo $blk_pt_sub_title_right;?></span>
                            <p>  <?php echo $blk_pt_text_right;?></p>
                        </div>
                        <div class="btn-holder">
                            <a class="btn" href="<?php echo $blk_pt_link['url'];?>"><?php echo $blk_pt_link['title'];?></a>
                        </div>
                    </div>
                </div>
            </section>
</div>
