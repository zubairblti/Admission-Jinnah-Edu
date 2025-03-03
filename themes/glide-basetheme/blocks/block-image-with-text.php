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
$blk_iat_title = (isset($block_fields['blk_iat_title'])) ? $block_fields['blk_iat_title'] : null;
$blk_iat_repeater = (isset($block_fields['blk_iat_repeater'])) ? $block_fields['blk_iat_repeater'] : null;




?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name . ' ' . $name; ?> glide-block-<?php echo $block_glide_name; ?>">

	<!-- Section Intro -->
	 <section class="why-maju">
                <div class="container">
                    <span><?php echo $blk_iat_title;?></span>
                    <?php 
$rows = get_field('blk_iat_repeater'); // Get the rows of the repeater field
if( $rows ): ?>
<div class="box-holder">
    <?php 
    $counter = 1;
    foreach( $rows as $row ):
	
        // Replace 'your_sub_field_image' and 'your_sub_field_text' with the actual field names
        $image = $row['image'];
        $text = $row['text'];

    ?>
        <div class="col-<?php echo $counter; ?>">
            <div class="img-holder">
                <img src="<?php echo esc_url($image); ?>" alt="">
            </div>
            <div class="text"><?php echo esc_html($text); ?></div>
        </div>
    <?php 
        $counter++;
    endforeach; 
    ?>
</div>
<?php endif; ?>

                </div>
            </section>
</div>
