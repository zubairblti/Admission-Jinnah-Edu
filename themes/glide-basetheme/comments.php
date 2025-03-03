<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BaseTheme Package
 * @since 1.0.0
 */

/**
 *
 * If the user tries to load the comments page directly
 * not inside a page or single etc. /1/
 *
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments. /2/
 */

if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) { /*1*/
		die( __( 'Please do not load this page directly. Thanks!', 'basetheme_td' ) );
}
if ( post_password_required() ) { /*2*/ ?>
	<?php _e( 'This post is password protected. Enter the password to view comments.', 'basetheme_td' ); ?>
	<?php
	return;
}

?>

<section id="respond">
	<div id="comments" class="comments-area">

		<?php
		// Only show  when comments are available.
		if ( have_comments() ) {
			?>
		<h3 class="section-title" id="comments">
			<?php
				$theme_comment_count = get_comments_number();
			if ( '1' === $theme_comment_count ) {
				printf(
					/* translators: 1: title. */
					__( 'One Responce', 'basetheme_td' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s Responce', '%1$s Responces', $theme_comment_count, 'comments title', 'basetheme_td' ) ),
					number_format_i18n( $theme_comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h3>
		<div class="navigation">
			<?php the_comments_navigation(); ?>
		</div>
		<ol class="commentlist">

			<?php
				wp_list_comments(
					array(
						'style'       => 'ol',
						'short_ping'  => true,
						'avatar_size' => 60,
					)
				);
			?>

		</ol>
		<div class="navigation">
			<?php the_comments_navigation(); ?>
		</div>
		<?php } else { // this is displayed if there are no comments so far ?>

			<?php
			// If comments are closed and there are comments, let's leave a little note, shall we?
			if ( ! comments_open() ) {
				?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'basetheme_td' ); ?></p>
				<?php
			}
		}// Check for have_comments().
			comment_form();
		?>

	</div><!-- #comments -->
</section>
