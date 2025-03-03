<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package BaseTheme Package
 * @since 1.0.0
 */

// Include header.
get_header();

// Global variables.
global $option_fields;
global $pID;
global $fields;

// Required if you want different search results style for separate CPT etc
// $post_type = get_post_type();

 /**
 * Search Masthead
 *
 */
?>


<section class="section section-news bg-gray">
	<div class="container">
		<header class="section-head">
			<h1>Search Results<span class="border-line"></span></h1>
			<p>
				<?php
					printf(
						/* translators: %s: search term. */
						esc_html__( 'You searched for "%s"', 'aperiambio_td' ),
						'<span class="search-term">' . esc_html( get_search_query() ) . '</span>'
					);
				?>
			</p>
		</header>
		<div class="row-block">

			<?php if ( have_posts() ) {
					while ( have_posts() ) {
						the_post();
						// Include specific template for the content
						get_template_part( 'partials/content-archive','post' );
					} ?>
			<?php }else {
					// If no content, include the "No posts found" template.
					get_template_part( 'partials/content', 'none' );
				} ?>
		</div>
		<div class="ts-40"></div>
		<?php if ( function_exists( 'glide_pagination' ) ) {
				glide_pagination( $wp_query->max_num_pages );
			} ?>
		<div class="ts-80"></div>

	</div>
	<div class="btn-block">
		<a href="<?php echo $mth_news_events_read_all_post_link;?>" class="btn btn-primary">ALL NEWS POSTS</a>
	</div>
	</div>
</section>
<?php get_footer(); ?>
