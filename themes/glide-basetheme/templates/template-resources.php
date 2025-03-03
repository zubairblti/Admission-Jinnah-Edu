<?php
/**
 * Template Name: Resources
 * Template Post Type: page
 *
 * This template is for displaying resource page.
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

$basethemevar_trcho_feature_post = $fields['basethemevar_trcho_feature_post']; ?>

<section id="hero-section" class="hero-section">
	<div class="blog-hero">
		<div class="wrapper">
			<div class="banner-content">
				<h1><?php echo the_title(); ?></h1>
			</div>
			<div class="s-80"></div>
			<?php
			global $post;
			if($basethemevar_trcho_feature_post){ ?> <?php foreach ($basethemevar_trcho_feature_post as $key => $feature_post) {
				$post 			= $feature_post;
				setup_postdata( $post );
				$pID         	= $post->ID;
				$post_title   	= get_the_title($pID);
				$post_excerpt   = get_the_excerpt($pID);
				$post_date 		= get_the_date('M d Y',$pID);
				$parmalink 		= get_the_permalink($pID );
				$image 			= (has_post_thumbnail($pID))? get_the_post_thumbnail_url( $pID,'full') : get_template_directory_uri()."/assets/img/defaults/default-image.webp";
				?>

				<div class="resources-post-box featured-post">
					<div class="resources-inner two-columns align-items-center justify-content-between"> <?php if($image){ ?>
						<div class="rc-post-img post-image rs-view-100">
							<a href="<?php echo $parmalink; ?>"><img src="<?php echo $image; ?>"></a>
						</div> <?php } ?>
						<div class="post-content rs-view-100">
							<?php if($post_title){ ?>
								<div class="post-box-title">
									<h2><a href="<?php echo $parmalink; ?>"><?php echo $post_title; ?></a></h2>
								</div>
							<?php } ?>
							<!-- post exerpt -->
							<?php if($post_excerpt){ ?>
								<div class="post-box-excerpt">
									<p>
										<?php echo $post_excerpt; ?>
									</p>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php } } ?>
		</div>
	</div>
	<!-- Hero End -->
</section>
<section id="page-section" class="page-section">
	<!-- Content Start -->
	<div class="wrapper">
		<div class="rc-post-archive three-columns"> <?php
			// WP_Query arguments
			global $paged;
			$args = array(
				'post_type'              => array( 'resource' ),
				// 'meta_key' => 'basethemevar_trcho_feature_post',
				'posts_per_page'         => 9, //how many posts you need
				'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
				// 'meta_query' => array(
				// 	array(
				// 		'key'     => 'basethemevar_trcho_feature_post',
				// 		'value'   => '1',
				// 		'compare' => '!=',
				// 	)
				// ),
			);
			// The Query
			$query = new WP_Query( $args );
			// The Loop
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
				//Include specific template for the content.
				get_template_part( 'partials/content', 'archive-resource' );
				}
			} else {
				// If no content, include the "No posts found" template.
				get_template_part( 'partials/content', 'none' );
			}?>
		</div>

		<div class="ts-40"></div>
		<?php if ( function_exists( 'glide_pagination' ) ) { ?>
			<div class="center-align"> <?php glide_pagination( $query->max_num_pages ); ?></div>
		<?php } ?>
		<div class="ts-80"></div>
		<!-- Content End -->
	</div>
</section>

<?php get_footer();
