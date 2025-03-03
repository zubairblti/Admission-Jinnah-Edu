<?php
/**
 * Template part for displaying posts in an archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BaseTheme Package
 * @since 1.0.0
 */


$post_id = get_the_ID();
$thumbnail_src = get_the_post_thumbnail_url($post_id);
if(!$thumbnail_src){
	$thumbnail_src = esc_url(get_template_directory_uri())."/assets/images/default-thumbnail.jpg"; 
}
?>
<article class="news-box col-block-4">
	<div class="news-holder">
		<div class="img-holder">
			<a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail_src; ?>" alt="" width="370"
					height="251"></a>
		</div>
		<div class="text-box">
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<div class="link-holder">
				<a href="<?php the_permalink(); ?>" class="link-bordered">Read
					More</a>
			</div>
		</div>
	</div>
</article>
