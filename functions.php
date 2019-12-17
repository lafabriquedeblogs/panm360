<?php
/**
 * panm360 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package panm360
 */


if ( ! function_exists( 'panm360_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function panm360_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on panm360, use a find and replace
		 * to change 'panm360' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'panm360', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'panm360' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'panm360_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		
		add_theme_support( 'editor-style' );
	}
endif;
add_action( 'after_setup_theme', 'panm360_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function panm360_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'panm360_content_width', 640 );
}
add_action( 'after_setup_theme', 'panm360_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function panm360_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'panm360' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'panm360' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'panm360_widgets_init' );

//add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
function wps_deregister_styles() {
    wp_dequeue_style( 'wp-block-library' );
}

function panm360_wp_body_open(){
	include_once( "assets/img/panm360_sprite.svg");

}
add_action( 'wp_body_open', 'panm360_wp_body_open' );

function tenpixelsleft_custom_posts_per_page($query) {
    
    if (!is_admin() && $query->is_main_query() && $query->is_tax(array('genre','annee','label','pays')) ){
	    $query->set('posts_per_page', '24');
	    $query->set( 'post_type', 'records' );
    }
    
    return $query;
}
add_action('pre_get_posts', 'tenpixelsleft_custom_posts_per_page');

add_filter( 'block_categories', 'panm360_block_category', 10, 2);
function panm360_block_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'panm360-blocks',
				'title' => __( 'PanM 360', 'panm360' ),
			),
		)
	);
}

add_filter( 'allowed_block_types', 'panm360_allowed_block_types', 10, 2 );
function panm360_allowed_block_types( $allowed_blocks, $post ) {
 
	$allowed_blocks = array(
		'core/image',
		'core/paragraph',
		'core/heading',
		'core/gallery',
		'core/list',
		'core/columns',
		'core/text-columns',
		'core/html',
		'core/separator',
		'core/spacer',
		'core/shortcode',
		'core/embed',
		'core-embed/youtube',
		'core-embed/soundcloud',
		'core-embed/spotify',
		'core-embed/vimeo',
		'core/group',
		'core/button',
		'acf/icones-partage',
		'acf/liste-pages',
		'gravityforms/form'
	);
 
	
	//	if( $post->post_type === 'page' ) {
	//		$allowed_blocks[] = 'core/shortcode';
	//	}
 
	
	return $allowed_blocks;
 
}

add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_sub_page') ) {

        // Add parent.
        $parent = acf_add_options_page(array(
            'page_title'  => __('PanM 360 General Settings'),
            'menu_title'  => __('PanM 360 Réglages Theme'),
            'redirect'    => false,
        ));

        // Add sub page.
        $child = acf_add_options_sub_page(array(
            'page_title'  => __('Social Settings'),
            'menu_title'  => __('Social'),
            'parent_slug' => $parent['menu_slug'],
        ));
        // Add sub page.
        $child_abos = acf_add_options_sub_page(array(
            'page_title'  => __('Abonnements'),
            'menu_title'  => __('Abonnements'),
            'parent_slug' => $parent['menu_slug'],
        ));

        // Add sub page.
        $child_ads = acf_add_options_sub_page(array(
            'page_title'  => __('Publicités'),
            'menu_title'  => __('Publicités'),
            'parent_slug' => $parent['menu_slug'],
        ));
    }
}


add_filter( 'acf/fields/svg_icon/file_path/name=icone_reseau_social', 'tc_acf_svg_icon_file_path' );
function tc_acf_svg_icon_file_path( $file_path ) {
    return get_theme_file_path( 'assets/img/panm360_sprite.svg' );
}
	
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customs_posts_types.php';
require get_template_directory() . '/inc/taxonomies.php';
require get_template_directory() . '/inc/scripts.php';
require get_template_directory() . '/inc/shortcodes-abonnements.php';
/*
 *
 * BLOCKS
 *
*/

require get_template_directory() . '/template-parts/blocks/icone_partages.php';
require get_template_directory() . '/template-parts/blocks/liste_pages.php';
require get_template_directory() . '/template-parts/blocks/banieres_publcite.php';