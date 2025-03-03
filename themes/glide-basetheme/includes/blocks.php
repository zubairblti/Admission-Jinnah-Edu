<?php
/**
 * Functions for custom Gutenberg blocks
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package BaseTheme Package
 * @since 1.0.0
 */

/**
 * Register custom Gutenberg blocks
 */
add_action( 'acf/init', 'glide_theme_acf_init' );
function glide_theme_acf_init() {

	if ( function_exists( 'acf_register_block' ) ) {


		acf_register_block(
			array(
				'name'            => 'about-doctor-care',
				'title'           => __( 'About Doctor Care', 'basetheme_td' ),
				'description'     => __( 'A About Doctor Care.', 'basetheme_td' ),
				'render_callback' => 'glide_acf_block_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'images-alt2',
				'mode'            => 'edit',
				'keywords'        => array( 'About Doctor Care' ),
				'align'           => 'wide',
				// calling assets js,css
				// 'enqueue_assets' => function(){
				// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
				// },
				'supports'        => array(
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
						),
					),
				),
			)
		);
		acf_register_block(
			array(
				'name'            => 'delivering-services',
				'title'           => __( 'Devlivering Services', 'basetheme_td' ),
				'description'     => __( 'A Devlivering Services.', 'basetheme_td' ),
				'render_callback' => 'glide_acf_block_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'images-alt2',
				'mode'            => 'edit',
				'keywords'        => array( 'Devlivering Services' ),
				'align'           => 'wide',
				// calling assets js,css
				// 'enqueue_assets' => function(){
				// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
				// },
				'supports'        => array(
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
						),
					),
				),
			)
		);
		acf_register_block(
			array(
				'name'            => 'healthcare-experties',
				'title'           => __( 'Healthcare Experties', 'basetheme_td' ),
				'description'     => __( 'A Healthcare Experties.', 'basetheme_td' ),
				'render_callback' => 'glide_acf_block_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'images-alt2',
				'mode'            => 'edit',
				'keywords'        => array( 'Healthcare Experties' ),
				'align'           => 'wide',
				// calling assets js,css
				// 'enqueue_assets' => function(){
				// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
				// },
				'supports'        => array(
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
						),
					),
				),
			)
		);
		acf_register_block(
			array(
				'name'            => 'envisioned-group',
				'title'           => __( 'Envisioned Group', 'basetheme_td' ),
				'description'     => __( 'A Envisioned Group.', 'basetheme_td' ),
				'render_callback' => 'glide_acf_block_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'images-alt2',
				'mode'            => 'edit',
				'keywords'        => array( 'Envisioned Group' ),
				'align'           => 'wide',
				// calling assets js,css
				// 'enqueue_assets' => function(){
				// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
				// },
				'supports'        => array(
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
						),
					),
				),
			)
		);
		acf_register_block(
			array(
				'name'            => 'legacy-of-excellence',
				'title'           => __( 'Legacy Of Excellence', 'basetheme_td' ),
				'description'     => __( 'A Legacy Of Excellence.', 'basetheme_td' ),
				'render_callback' => 'glide_acf_block_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'images-alt2',
				'mode'            => 'edit',
				'keywords'        => array( 'Legacy Of Excellence' ),
				'align'           => 'wide',
				// calling assets js,css
				// 'enqueue_assets' => function(){
				// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
				// },
				'supports'        => array(
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
						),
					),
				),
			)
		);
		//added by talha 
		acf_register_block(
			array(
				'name'            => 'about-us',
				'title'           => __( 'About Us', 'basetheme_td' ),
				'description'     => __( 'A About Us.', 'basetheme_td' ),
				'render_callback' => 'glide_acf_block_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'images-alt2',
				'mode'            => 'edit',
				'keywords'        => array( 'image side text' ),
				'align'           => 'wide',
				// calling assets js,css
				// 'enqueue_assets' => function(){
				// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
				// },
				'supports'        => array(
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
						),
					),
				),
			)
		);
		acf_register_block(
			array(
				'name'            => 'core-values',
				'title'           => __( 'About Core Values', 'basetheme_td' ),
				'description'     => __( 'A Core Values.', 'basetheme_td' ),
				'render_callback' => 'glide_acf_block_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'images-alt2',
				'mode'            => 'edit',
				'keywords'        => array( 'image side text' ),
				'align'           => 'wide',
				// calling assets js,css
				// 'enqueue_assets' => function(){
				// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
				// },
				'supports'        => array(
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
						),
					),
				),
			)
		);
		acf_register_block(
			array(
				'name'            => 'contact',
				'title'           => __( 'Contact', 'basetheme_td' ),
				'description'     => __( 'A Contact.', 'basetheme_td' ),
				'render_callback' => 'glide_acf_block_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'images-alt2',
				'mode'            => 'edit',
				'keywords'        => array( 'image side text' ),
				'align'           => 'wide',
				// calling assets js,css
				// 'enqueue_assets' => function(){
				// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
				// },
				'supports'        => array(
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
						),
					),
				),
			)
		);
		acf_register_block(
			array(
				'name'            => 'annual-report',
				'title'           => __( 'Annual Report', 'basetheme_td' ),
				'description'     => __( 'A Annual Report.', 'basetheme_td' ),
				'render_callback' => 'glide_acf_block_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'images-alt2',
				'mode'            => 'edit',
				'keywords'        => array( 'image side text' ),
				'align'           => 'wide',
				// calling assets js,css
				// 'enqueue_assets' => function(){
				// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
				// },
				'supports'        => array(
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
						),
					),
				),
			)
		);
		acf_register_block(
			array(
				'name'            => 'sevices',
				'title'           => __( 'DC Services', 'basetheme_td' ),
				'description'     => __( 'A Services.', 'basetheme_td' ),
				'render_callback' => 'glide_acf_block_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'images-alt2',
				'mode'            => 'edit',
				'keywords'        => array( 'Services' ),
				'align'           => 'wide',
				// calling assets js,css
				// 'enqueue_assets' => function(){
				// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
				// },
				'supports'        => array(
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
						),
					),
				),
			)
		);
        
		acf_register_block(
			array(
				'name'            => 'app',
				'title'           => __( 'App', 'basetheme_td' ),
				'description'     => __( 'A App.', 'basetheme_td' ),
				'render_callback' => 'glide_acf_block_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'images-alt2',
				'mode'            => 'edit',
				'keywords'        => array( 'App' ),
				'align'           => 'wide',
				// calling assets js,css
				// 'enqueue_assets' => function(){
				// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
				// },
				'supports'        => array(
					'align' => false,
				),
				'example'         => array(
					'attributes' => array(
						'mode' => 'preview',
						'data' => array(
							'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
						),
					),
				),
			)
		);
		acf_register_block(
			array(
				'name'            => 'image-with-text',
				'title'           => __('Image with text', 'basetheme_td'),
				'description'     => __('An Image with text.', 'basetheme_td'),
				'render_callback' => 'glide_acf_block_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'images-alt2',
				'mode'            => 'edit',
				'keywords'        => array('image alongside text'),
				'align'           => 'wide',
				// calling assets js,css
				// 'enqueue_assets' => function(){
				// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
				// },
				'supports'        => array(
					'align' => false,
				),
				// 'example'         => array(
				// 	'attributes' => array(
				// 		'mode' => 'preview',
				// 		'data' => array(
				// 			'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
				// 		),
				// 	),
				// ),
			)
		);
		// Block Icons Alongside Text
		acf_register_block(
			array(
				'name'            => 'company-timeline',
				'title'           => __('Company Timeline', 'basetheme_td'),
				'description'     => __('An Company Timeline.', 'basetheme_td'),
				'render_callback' => 'glide_acf_block_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'images-alt2',
				'mode'            => 'edit',
				'keywords'        => array('company timeline'),
				'align'           => 'wide',
				// calling assets js,css
				// 'enqueue_assets' => function(){
				// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
				// },
				'supports'        => array(
					'align' => false,
				),
				// 'example'         => array(
				// 	'attributes' => array(
				// 		'mode' => 'preview',
				// 		'data' => array(
				// 			'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
				// 		),
				// 	),
				// ),
			)
		);
		// Block Company Timeline
		// Block Company Timeline
		acf_register_block(
			array(
				'name'            => 'icon-alongside-text',
				'title'           => __('Icon Alongside Text', 'basetheme_td'),
				'description'     => __('An Icon Alongside Text.', 'basetheme_td'),
				'render_callback' => 'glide_acf_block_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'images-alt2',
				'mode'            => 'edit',
				'keywords'        => array('icon alongside text'),
				'align'           => 'wide',
				// calling assets js,css
				// 'enqueue_assets' => function(){
				// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
				// },
				'supports'        => array(
					'align' => false,
				),
				// 'example'         => array(
				// 	'attributes' => array(
				// 		'mode' => 'preview',
				// 		'data' => array(
				// 			'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
				// 		),
				// 	),
				// ),
			)
		);

		// Block Company Timeline
		// Block Company Timeline
		acf_register_block(
			array(
				'name'            => 'plain-text',
				'title'           => __('Plain Text', 'basetheme_td'),
				'description'     => __('An Plain Text.', 'basetheme_td'),
				'render_callback' => 'glide_acf_block_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'images-alt2',
				'mode'            => 'edit',
				'keywords'        => array('Plain Text'),
				'align'           => 'wide',
				// calling assets js,css
				// 'enqueue_assets' => function(){
				// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
				// },
				'supports'        => array(
					'align' => false,
				),
				// 'example'         => array(
				// 	'attributes' => array(
				// 		'mode' => 'preview',
				// 		'data' => array(
				// 			'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
				// 		),
				// 	),
				// ),
			)
		);

		// Block Company Timeline
		// Block Company Timeline
		acf_register_block(
			array(
				'name'            => 'program-list',
				'title'           => __('Program List', 'basetheme_td'),
				'description'     => __('An Program List.', 'basetheme_td'),
				'render_callback' => 'glide_acf_block_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'images-alt2',
				'mode'            => 'edit',
				'keywords'        => array('Program List'),
				'align'           => 'wide',
				// calling assets js,css
				// 'enqueue_assets' => function(){
				// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
				// },
				'supports'        => array(
					'align' => false,
				),
				// 'example'         => array(
				// 	'attributes' => array(
				// 		'mode' => 'preview',
				// 		'data' => array(
				// 			'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
				// 		),
				// 	),
				// ),
			)
		);

		// Block Company Timeline
		// Block Company Timeline
		acf_register_block(
			array(
				'name'            => 'separator',
				'title'           => __('Separator', 'basetheme_td'),
				'description'     => __('An Separator.', 'basetheme_td'),
				'render_callback' => 'glide_acf_block_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'images-alt2',
				'mode'            => 'edit',
				'keywords'        => array('Separator'),
				'align'           => 'wide',
				// calling assets js,css
				// 'enqueue_assets' => function(){
				// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
				// },
				'supports'        => array(
					'align' => false,
				),
				// 'example'         => array(
				// 	'attributes' => array(
				// 		'mode' => 'preview',
				// 		'data' => array(
				// 			'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
				// 		),
				// 	),
				// ),
			)
		);
		// Block Company Timeline
		// Block Company Timeline
		acf_register_block(
			array(
				'name'            => 'resource-list',
				'title'           => __('Resource List', 'basetheme_td'),
				'description'     => __('An Resource List.', 'basetheme_td'),
				'render_callback' => 'glide_acf_block_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'images-alt2',
				'mode'            => 'edit',
				'keywords'        => array('Resource List'),
				'align'           => 'wide',
				// calling assets js,css
				// 'enqueue_assets' => function(){
				// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
				// },
				'supports'        => array(
					'align' => false,
				),
				// 'example'         => array(
				// 	'attributes' => array(
				// 		'mode' => 'preview',
				// 		'data' => array(
				// 			'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
				// 		),
				// 	),
				// ),
			)
		);

		// Block Company Timeline
		// Block Company Timeline
		acf_register_block(
			array(
				'name'            => 'testimonial',
				'title'           => __('Testimonial', 'basetheme_td'),
				'description'     => __('An Testimonial.', 'basetheme_td'),
				'render_callback' => 'glide_acf_block_callback',
				'category'        => 'glide-blocks',
				'icon'            => 'images-alt2',
				'mode'            => 'edit',
				'keywords'        => array('Testimonial'),
				'align'           => 'wide',
				// calling assets js,css
				// 'enqueue_assets' => function(){
				// wp_enqueue_script( 'block-testimonial', get_template_directory_uri() . '/scripts/jquery.cycle2.min.js', array('jquery'), '', true );
				// },
				'supports'        => array(
					'align' => false,
				),
				// 'example'         => array(
				// 	'attributes' => array(
				// 		'mode' => 'preview',
				// 		'data' => array(
				// 			'preview_image_help' => get_template_directory_uri() . '/assets/img/admin/default-block-preview.webp',
				// 		),
				// 	),
				// ),
			)
		);
		
	}
}
