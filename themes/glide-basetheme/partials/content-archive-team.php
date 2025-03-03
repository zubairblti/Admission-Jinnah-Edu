<?php
/**
 * Template part for displaying posts in an archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BaseTheme Package
 * @since 1.0.0
 */
$block_fields = get_fields_escaped( $block['id'] );

$image                             = get_the_post_thumbnail_url();
$title                             = get_the_title();
$basethemevar_cpt_team_designation = $block_fields['basethemevar_cpt_team_designation'];
$basethemevar_cpt_team_text        = html_entity_decode( $block_fields['basethemevar_cpt_team_text'] );
?>



<article <?php post_class( 'single-member column' ); ?>>
	<div  id="post-<?php the_ID(); ?>" class="team-detail mfp-hide">
		<div class="team-detail-inner">
			<div class="single-team">
				<div class="single-team-head d-flex flex-wrap justify-content-between align-items-center">
					<?php if ( $image ) { ?>
						<div class="member-image-popup reset-bg" style="background-image:url(<?php echo $image; ?>);">
						</div>
					<?php } ?>
					<div class="member-detail-popup">
						<?php if ( $title ) { ?>
							<h3 class="member-name-popup medium-text"> <?php echo $title; ?> </h3>
						<?php } ?>
						<?php if ( $basethemevar_cpt_team_designation ) { ?>
							<h5 class="member-designation"><?php echo $basethemevar_cpt_team_designation; ?></h5>
						<?php } ?>
					</div>
				</div>
				<?php if ( $basethemevar_cpt_team_text ) { ?>
					<div class="single-team-content"><?php echo $basethemevar_cpt_team_text; ?></div>
				<?php } ?>
			</div>
		</div>
	</div>
	<a class="sm-inner open-popup-link" href="#post-<?php the_ID(); ?>">
		<?php if ( $image ) { ?>
			<div class="member-image" style="background-image:url(<?php echo $image; ?>);">
			</div>
		<?php } ?>
		<div class="t-detail">
			<?php if ( $title ) { ?>
				<h4 class="member-name medium-text"> <?php echo $title; ?> </h4>
			<?php } ?>
			<?php if ( $basethemevar_cpt_team_designation ) { ?>
				<h5 class="designation"><?php echo $basethemevar_cpt_team_designation; ?></h5>
			<?php } ?>
		</div>
	</a>
</article><!-- #post-<?php the_ID(); ?> -->
