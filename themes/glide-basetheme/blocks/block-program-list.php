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
$blk_pl_ug_title = (isset($block_fields['blk_pl_ug_title'])) ? $block_fields['blk_pl_ug_title'] : null;
$blk_pl_ug_course_repeater = (isset($block_fields['blk_pl_ug_course_repeater'])) ? $block_fields['blk_pl_ug_course_repeater'] : null;
$blk_pl_ad_course_repeater = (isset($block_fields['blk_pl_ad_course_repeater'])) ? $block_fields['blk_pl_ad_course_repeater'] : null;
$blk_pl_gp_repeater = (isset($block_fields['blk_pl_gp_repeater'])) ? $block_fields['blk_pl_gp_repeater'] : null;
$blk_pl_dp_repeater = (isset($block_fields['blk_pl_dp_repeater'])) ? $block_fields['blk_pl_dp_repeater'] : null;
$blk_pl_button_first = (isset($block_fields['blk_pl_button_first'])) ? $block_fields['blk_pl_button_first'] : null;
$blk_pl_button_second = (isset($block_fields['blk_pl_button_second'])) ? $block_fields['blk_pl_button_second'] : null;
$blk_pl_ad_title = (isset($block_fields['blk_pl_ad_title'])) ? $block_fields['blk_pl_ad_title'] : null;
$blk_pl_gp_title = (isset($block_fields['blk_pl_gp_title'])) ? $block_fields['blk_pl_gp_title'] : null;
$blk_pl_dp_title = (isset($block_fields['blk_pl_dp_title'])) ? $block_fields['blk_pl_dp_title'] : null;




?>
<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name . ' ' . $name; ?> glide-block-<?php echo $block_glide_name; ?>">

	<!-- Setion opportunities -->
	<section class="course-program">
                <div class="container">
                    <div class="box-holder">

                        <div class="left-col">
                            <div class="title"><?php echo $blk_pl_ug_title;?></div>
                            <ul>
								<?php foreach ($blk_pl_ug_course_repeater as $link) { ?>								
                                <li><a style="display:flex;" href="<?php echo $link['link']['url']; ?>"><?php echo $link['link']['title']; ?> <span style="color: <?php echo $link['program_sub_title_color']; ?>; margin-left: 10px;"><?php echo $link['program_sub_title']; ?></span></a></li>
                               <?php } ?>
                            </ul>

                            <div class="title"><?php echo $blk_pl_ad_title;?></div>
                            <ul>
								<?php foreach ($blk_pl_ad_course_repeater as $link) { ?>
                               <li><a
                                      href="<?php echo $link['link']['url']; ?>"><?php echo $link['link']['title']; ?></a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="right-col">
                           <div class="title"><?php echo $blk_pl_gp_title;?></div>
                           <ul>
								<?php foreach ($blk_pl_gp_repeater as $link) { ?>
                               <li><a
                                     href="<?php echo $link['link']['url']; ?>"><?php echo $link['link']['title']; ?></a>
                                </li>
                                <?php } ?>
                            </ul>


                            <div class="title"><?php echo $blk_pl_dp_title;?></div>

                           <ul>
								<?php foreach ($blk_pl_dp_repeater as $link) { ?>
                               <li><a
                                         href="<?php echo $link['link']['url']; ?>"><?php echo $link['link']['title']; ?></a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="btn-holder">
                            <a class="btn first" href="<?php echo $blk_pl_button_first['url']; ?>"><?php echo $blk_pl_button_first['title']; ?></a>
                            <a class="btn second" href="<?php  echo $blk_pl_button_second['url']; ?>"><?php echo $blk_pl_button_second['title']; ?></a>
                        </div>
                    </div>
                </div>
            </section>
</div>
