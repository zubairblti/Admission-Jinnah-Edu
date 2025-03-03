<?php
/**
 * The template for displaying all posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package BaseTheme Package
 * @since 1.0.0
 *
 */

// Include header
get_header();

// Global variables
global $option_fields;
global $pID;
global $fields;
?>

<section id="hero-section" class="hero-section">
	<!-- Hero Start -->

	<div class="container-980">
		<div class="hero-single">
			<div class="wrapper">
				<div class="post-title">
					<h1><?php the_title(); ?></h1>
					<!-- <div class="s-50"></div> -->
				</div> <?php get_template_part( 'partials/post-meta-single' ); ?>
			</div>
		</div>
	</div>

	<!-- Hero End  -->
</section>

<section id="page-section" class="page-section">
	<!-- Content Start -->

	<?php while ( have_posts() ) { the_post();
		//Include specific template for the content.
		get_template_part( 'partials/content', get_post_type() );
	} ?>

	<div class="clear"></div>
	<div class="ts-80"></div>

	<!-- Content End -->
</section>

<?php get_footer();
