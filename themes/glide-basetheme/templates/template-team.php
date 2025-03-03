<?php
/**
 * Template Name: Team
 * Template Post Type: page
 *
 * This template is for displaying team page.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
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

$basethemevar_trcho_feature_post = $fields['basethemevar_trcho_feature_post'];

?>

<section id="hero-section" class="hero-section">
	<div class="blog-hero">
		<div class="wrapper">
			<div class="banner-content ">
				<h1><?php echo the_title(); ?></h1>
			</div>
		</div>
	</div>
	<!-- Hero End -->
</section>

<section id="page-section" class="page-section">
	<!-- Content Start -->
	<div class="wrapper">
		<div class="section-team">
			<div class="team-post-archive four-columns ">
				<?php
					// WP_Query arguments
					global $paged;
					$args = array(
						'post_type'              => array( 'team' ),
						'posts_per_page'         => -1, //how many posts you need
						'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
					);
					// The Query
					$query = new WP_Query( $args );
					// The Loop
					if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
							$query->the_post();
						//Include specific template for the content.
						get_template_part( 'partials/content', 'archive-team' );
						}
					?> <div class="clear"></div> <?php
					} else {
						// If no content, include the "No posts found" template.
						get_template_part( 'partials/content', 'none' );
				}?>
			</div>
			<div class="s-50"></div>
			<?php if ( function_exists( 'glide_pagination' ) ) { ?>
				<div class="center-align"> <?php glide_pagination( $query->max_num_pages ); ?></div>
			<?php } ?>
			<div class="s-80"></div>
			<!-- Content End -->
		</div>
	</div>
</section>

<?php get_footer();
