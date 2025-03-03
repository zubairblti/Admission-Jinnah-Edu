<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BaseTheme Package
 * @since 1.0.0
 *
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


		<?php get_template_part( 'partials/content' ); ?>


</div>
