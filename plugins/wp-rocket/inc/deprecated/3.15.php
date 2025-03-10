<?php

/**
 * Add "Cache options" metabox
 *
 * @since 3.15 deprecated
 * @since 2.5
 */
function rocket_cache_options_meta_boxes() {

	if ( ! rocket_can_display_options() ) {
		return;
	}

	if ( current_user_can( 'rocket_manage_options' ) ) {
		$cpts = get_post_types(
			[
				'public' => true,
			],
			'objects'
		);
		unset( $cpts['attachment'] );

		$cpts = apply_filters( 'rocket_metabox_options_post_types', $cpts );

		foreach ( $cpts as $cpt => $cpt_object ) {
			$label = $cpt_object->labels->singular_name;
			add_meta_box( 'rocket_post_exclude', sprintf( __( 'WP Rocket Options', 'rocket' ), $label ), 'rocket_display_cache_options_meta_boxes', $cpt, 'side', 'core' );
		}
	}
}

/**
 * Displays some checkbox to de/activate some cache options
 *
 * @since 3.15 deprecated
 * @since 2.5
 */
function rocket_display_cache_options_meta_boxes() {
	if ( current_user_can( 'rocket_manage_options' ) ) {
		global $post, $pagenow;
		wp_nonce_field( 'rocket_box_option', '_rocketnonce', false, true );
		?>

		<div class="misc-pub-section">
			<?php
				$reject_current_uri = false;
			if ( 'post-new.php' !== $pagenow ) {
				$rejected_uris = array_flip( get_rocket_option( 'cache_reject_uri', [] ) );
				$path          = rocket_clean_exclude_file( get_permalink( $post->ID ) );

				if ( isset( $rejected_uris[ $path ] ) ) {
					$reject_current_uri = true;
				}
			}
			?>
			<input name="rocket_post_nocache" id="rocket_post_nocache" type="checkbox" title="<?php esc_html_e( 'Never cache this page', 'rocket' ); ?>" <?php checked( $reject_current_uri, true ); ?>><label for="rocket_post_nocache"><?php esc_html_e( 'Never cache this page', 'rocket' ); ?></label>
		</div>

		<div class="misc-pub-section">
			<p><?php esc_html_e( 'Activate these options on this post:', 'rocket' ); ?></p>
			<?php
			$fields = [];

			$old_fields = $fields;

			/**
			 * WP Rocket Metabox fields on post edit page.
			 *
			 * @param string[] $fields Metaboxes fields.
			 */
			$fields = apply_filters( 'rocket_meta_boxes_fields', $fields );

			if ( ! is_array( $fields ) ) {
				$fields = $old_fields;
			}

			foreach ( $fields as $field => $label ) {
				$disabled = disabled( ! get_rocket_option( $field ), true, false );
				// translators: %s is the name of the option.
				$title   = $disabled ? ' title="' . esc_attr( sprintf( __( 'Activate first the %s option.', 'rocket' ), $label ) ) . '"' : '';
				$class   = $disabled ? ' class="rkt-disabled"' : '';
				$checked = ! $disabled ? checked( ! get_post_meta( $post->ID, '_rocket_exclude_' . $field, true ), true, false ) : '';
				?>

				<input name="rocket_post_exclude_hidden[<?php echo esc_attr( $field ); ?>]" type="hidden" value="on">
				<input name="rocket_post_exclude[<?php echo esc_attr( $field ); ?>]" id="rocket_post_exclude_<?php echo esc_attr( $field ); ?>" type="checkbox"<?php echo $title; ?><?php echo $checked; ?><?php echo $disabled; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Dynamic content is properly escaped in the view. ?>>
				<label for="rocket_post_exclude_<?php echo esc_attr( $field ); ?>"<?php echo $title; ?><?php echo $class; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Dynamic content is properly escaped in the view. ?>><?php echo esc_html( $label ); ?></label><br>

				<?php
			}
			?>

			<p class="rkt-note">
			<?php
			// translators: %1$s = opening strong tag, %2$s = closing strong tag.
			printf( esc_html__( '%1$sNote:%2$s None of these options will be applied if this post has been excluded from cache in the global cache settings.', 'rocket' ), '<strong>', '</strong>' );
			?>
			</p>
		</div>

		<?php
		/**
		 * Fires after WP Rocket’s metabox.
		 *
		 * @since 3.6
		 */
		do_action( 'rocket_after_options_metabox' );
	}
}

/**
 * Manage the cache options from the metabox.
 *
 * @since 3.15 deprecated
 * @since 2.5
 */
function rocket_save_metabox_options() {
	if ( current_user_can( 'rocket_manage_options' ) &&
		isset( $_POST['post_ID'], $_POST['rocket_post_exclude_hidden'], $_POST['_rocketnonce'] ) ) {

		check_admin_referer( 'rocket_box_option', '_rocketnonce' );

		// No cache field.
		if ( isset( $_POST['post_status'] ) && 'publish' === $_POST['post_status'] ) {
			$new_cache_reject_uri = $cache_reject_uri = get_rocket_option( 'cache_reject_uri', [] ); // phpcs:ignore Squiz.PHP.DisallowMultipleAssignments.Found
			$rejected_uris        = array_flip( $cache_reject_uri );
			$path                 = rocket_clean_exclude_file( get_permalink( (int) $_POST['post_ID'] ) );

			if ( isset( $_POST['rocket_post_nocache'] ) ) {
				if ( ! isset( $rejected_uris[ $path ] ) ) {
					array_push( $new_cache_reject_uri, $path );
				}
			} else {
				if ( isset( $rejected_uris[ $path ] ) ) {
					unset( $new_cache_reject_uri[ $rejected_uris[ $path ] ] );
				}
			}

			if ( $new_cache_reject_uri !== $cache_reject_uri ) {
				// Update the "Never cache the following pages" option.
				update_rocket_option( 'cache_reject_uri', $new_cache_reject_uri );

				// Update config file.
				rocket_generate_config_file();
			}
		}

		// Options fields.
		$fields = [];

		$old_fields = $fields;

		/**
		 * Metaboxes fields.
		 *
		 * @param string[] $fields Metaboxes fields.
		 */
		$fields = apply_filters( 'rocket_meta_boxes_fields', $fields );

		if ( ! is_array( $old_fields ) ) {
			$fields = $old_fields;
		}

		$fields = array_keys( $fields );

		foreach ( $fields as $field ) {
			if ( isset( $_POST['rocket_post_exclude_hidden'][ $field ] ) ) {
				if ( isset( $_POST['rocket_post_exclude'][ $field ] ) ) {
					delete_post_meta( (int) $_POST['post_ID'], '_rocket_exclude_' . $field );
				} else {
					if ( get_rocket_option( $field ) ) {
						update_post_meta( (int) $_POST['post_ID'], '_rocket_exclude_' . $field, true );
					}
				}
			}
		}
	}
}
