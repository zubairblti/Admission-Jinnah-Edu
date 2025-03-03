<?php
/**
 * Block Name: Slider
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


$mth_blk_slider = ( isset( $block_fields['mth_blk_slider'] ) ) ? $block_fields['mth_blk_slider'] : array();

?>

<div id="<?php echo $id; ?>" class="<?php echo $align_class . ' ' . $class_name. ' ' . $name; ?> glide-block-<?php echo $block_glide_name; ?>">

<?php
$class = '';
if (!is_front_page()) {
	$class ==' section-banner';    
} 
?>
<?php
if(count($mth_blk_slider)>0){
?>
<section class="section-intro introSlider <?php echo $class;?>">
<?php
	foreach($mth_blk_slider as $slider){
?>
	<div class="intro-slide">
		<div class="intro-frame">
			<div class="img-bg" style="background-image: url(<?php echo $slider['mth_blk_slider_image']; ?>);"></div>
			<div class="container intro-holder">				
				
				<div class="text-box">
					<h1><?php echo htmlspecialchars_decode($slider['mt_blk_slider_title'])?></h1>
					<?php  
					if($slider['mth_blk_slider_description']!=""){
						echo html_entity_decode($slider['mth_blk_slider_description']);
					}
					?>
					<div class="btn-block">
						<a href="<?php echo ($slider['mth_blk_slider_more_link']!=""? $slider['mth_blk_slider_more_link']: "#" )?>" class="btn btn-secondary">Learn More</a>
					</div>
				</div>
			</div>
		</div>
	</div>	
	<?php 
	}
	?>
</section>
<?php }?>	
</div>
