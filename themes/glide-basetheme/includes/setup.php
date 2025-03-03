<?php
/**
 * Setup function for the project
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package BaseTheme Package
 * @since 1.0.0
 */

 /**
  * Sets up theme defaults and registers support for various WordPress features.
  */
if ( ! function_exists( 'glide_setup_function' ) ) {

	function glide_setup_function() {
		// Make theme available for translation.
		load_theme_textdomain( 'basetheme_td' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for RSS Feed.
		add_theme_support( 'automatic-feed-links' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// Set post thumbnail sizes
		set_post_thumbnail_size( 150, 150, true );

		// Add custom thumbnail sizes for backend admin
		add_image_size( 'admin-square', 90, 90, false  );
		add_image_size( 'admin-landscape', 150, 90, false   );
		add_image_size( 'admin-portrait', 90, 130, false   );
		// Add custom thumbnail sizes for frontend theme
		add_image_size( 'thumb_2000', 2000 , 9999, false );
		add_image_size( 'thumb_1600', 1600, 9999, false );
		add_image_size( 'thumb_1400', 1400 , 9999, false );
		add_image_size( 'thumb_1200', 1200 , 9999, false );
		add_image_size( 'thumb_1000', 1000, 9999, false );
		add_image_size( 'thumb_900', 900, 9999, false );
		add_image_size( 'thumb_800', 800, 9999, false );
		add_image_size( 'thumb_700', 700, 9999, false );
		add_image_size( 'thumb_600', 600, 9999, false );
		add_image_size( 'thumb_500', 500, 9999, false );
		add_image_size( 'thumb_400', 400, 9999, false );
		add_image_size( 'thumb_300', 300, 9999, false );
		add_image_size( 'thumb_200', 200, 9999, false );
		add_image_size( 'thumb_100', 100, 9999, false );

		// Register wp_nav_menu() menus
		register_nav_menus(
			array(
				'header-nav'   => __( 'Header Nav', 'basetheme_td' ),
				'footer-nav-one' => __( 'Footer Nav One', 'basetheme_td' ),
				'footer-nav-two' => __( 'Footer Nav Two', 'basetheme_td' ),
				'footer-nav-three' => __( 'Footer Nav Three', 'basetheme_td' ),
				'legal-nav' => __( 'Legal Nav', 'basetheme_td' ),
			)
		);

		// Fallback function for menus
		function nav_fallback(){
			if(is_user_logged_in()){
			?> <ul>
	<li> <?php _e( 'Go to admin area to create navigation menu', 'minnestar_td' ); ?></li>
</ul> <?php }
		}

		// Add HTML5 theme support for required functionalities
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		// Align support for Gutenberg - Enabling theme support for align full and align wide option for the block editor.
		add_theme_support( 'align-wide' );

		// Set JPEG quality to 100%
		add_filter(
			'jpeg_quality',
			function() {
				return 100;
			}
		);

	}
}

add_action( 'after_setup_theme', 'glide_setup_function' );



add_action( 'glide_register', 'glide_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the glide library
 * and one from the .org repo.
 *
 * The variable passed to glide_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into glide_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function glide_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        array(
            'name'      => 'Advanced Custom Fields Pro',
            'slug'      => 'advanced-custom-fields-pro',
            'required'  => true,
			'source' => 'https://bit.ly/3s652zg',
        ),
		array(
            'name'      => 'Advanced Custom Fields Pro [Nav Menu Addon]',
            'slug'      => 'advanced-custom-fields-pro-nav-menu-addon',
            'required'  => true,
			'source' => 'https://bit.ly/3pu11TG',
        ),	array(
            'name'      => 'Advanced Custom Fields Pro [Gravity Form Addon]',
            'slug'      => 'advanced-custom-fields-pro-gravity-form-addon',
            'required'  => true,
			'source' => 'https://bit.ly/3vvXSX3',
		),
		array(
            'name'      => 'Gravity Form Pro',
            'slug'      => 'gravity-form-pro',
            'required'  => true,
			'source' => 'https://bit.ly/3H7osbp',
        ),
		array(
            'name'      => 'Yoest Seo',
            'slug'      => 'yoset-seo',
            'required'  => true,
			// 'source' => 'https://download1590.mediafire.com/4xzj45px3eug/foc7axzvcro6dw0/wordpress-seo.zip',
			'source' => 'https://bit.ly/35odBNp',
        ),
		array(
            'name'      => 'WP Rocket',
            'slug'      => 'wp-rocket',
            'required'  => true,
			'source' => 'https://bit.ly/3Ka27f0',
        ),
		array(
            'name'      => 'Svg Support',
            'slug'      => 'svg-support',
            'required'  => true,
        ),
    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'glide-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'basetheme_td' ),
            'menu_title'                      => __( 'Plugin Installer', 'basetheme_td' ),
            'installing'                      => __( 'Installing Plugin: %s', 'basetheme_td' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'basetheme_td' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'basetheme_td' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'basetheme_td' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'basetheme_td' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    glide( $plugins, $config );

}


class pgroup_menu_walker extends Walker_Nav_Menu
{
    private $CurrentItem;
    public $parent_menu_item_id = 0;
    function start_lvl(&$output, $depth = 0, $args = array(), $id = 0) {
        
        $parent_id = $this->CurrentItem->menu_item_parent;
        $parent_nav_mega = get_post_meta($parent_id, '_menu_item_megamenu', true);
        $this_nav_mega = get_post_meta($this->parent_menu_item_id, '_menu_item_megamenu', true);

        $output .= '<ul class="sub-menu"><i class="fas fa-chevron-down drop-opener"></i>';
    }

    function end_lvl(&$output, $depth = 0, $args = array()) {
        $parent_id = $this->CurrentItem->menu_item_parent;
        $parent_nav_mega = get_post_meta($parent_id, '_menu_item_megamenu', true);
        $this_nav_mega = get_post_meta($this->parent_menu_item_id, '_menu_item_megamenu', true);

        $output .= '</ul>';
    }

	function start_el(&$output, $item, $depth = 0, $args = array(), $current_object_id = 0){
        global $wp_query;
        $this->CurrentItem = $item;
        if ($depth == 0) {
            $this->parent_menu_item_id = $item->ID;
        }
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

		if (empty($args)) {
            $args = new stdClass();
        }

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        $nav_mega = get_post_meta($item->ID, '_menu_item_megamenu', true);
        if ($depth == 0 && $nav_mega) {
            $classes[] = 'dropdown megamenu-fw';
        }
		if ($args->has_children) {
			$classes[] = 'has-dropdown';
		}

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names = ' class="'. esc_attr( $class_names ) . '"';

		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$menu_icon_tag  = ! empty( $item->menu_icon ) ? '<i class="'.esc_attr( $item->menu_icon ).'"></i>' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $menu_icon_tag. $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
		$item_output .= $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

	function display_element($element, &$children_elements, $max_depth, $depth = 0, $args = '', &$output = '') {
        $id_field = $this->db_fields['id'];
        if (is_object($args[0])) {
            $args[0]->has_children = !empty($children_elements[$element->$id_field]);
        }
        return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
	}

}

function pgroup_header_navigation() {
	
	$args = array(
		'theme_location' => 'header-nav',
		'container' => false, // Disable the container
		'walker' => new pgroup_menu_walker(),
        'menu_class' => 'menu main-menu',
        'menu_id' => 'menu-custmenu'
	);
	wp_nav_menu($args);
}

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

 

function special_nav_class ($classes, $item) {
  if (in_array('current-menu-item', $classes) ){
    $classes[] = 'active ';
  }
  return $classes;
}
