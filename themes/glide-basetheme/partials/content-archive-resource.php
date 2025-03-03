<?php
/**
 * Template part for displaying posts in an archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BaseTheme Package
 * @since 1.0.0
 */


?> <article id="post-<?php the_ID(); ?>" <?php post_class("post-box column"); ?>>
	<div class="post-box-img post-image">
		<a href="<?php the_permalink(); ?>"> <?php if ( has_post_thumbnail() ) { ?><?php the_post_thumbnail(
								'thumb_600',
								array(
									'alt'   => get_the_title(),
									'title' => get_the_title(),
								)
							); ?> <?php } else { ?> <img
				src="<?php echo get_template_directory_uri(); ?>/assets/img/admin/defaults/default-image.webp" class=""
				alt="<?php get_the_title(); ?>" title="<?php get_the_title(); ?>"> <?php } ?> </a>
	</div>
	<div class="post-content">
		<div class="post-box-title post-title">
			<h4 id="post-<?php the_ID(); ?>" class="post-title-archive">
				<a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a>
			</h4>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
