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
		add_post_type_support( 'records', 'author' );
		//add_theme_support( 'editor-style' );
		
		add_image_size( 'panm360_square', 500, 500,true);
	}
endif;
add_action( 'after_setup_theme', 'panm360_setup' );


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

function add_addthis(){
	?>
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<meta name="google-site-verification" content="=VTCijZR84yTYbBCjuRst-zSYuF6B-qWIRe9ItH1ceSE" />
	<!-- Go to www.addthis.com/dashboard to customize your tools -->
	<script type="text/javascript" async="async" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5df97d325d480cb8"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-147470280-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	  gtag('config', 'UA-147470280-1');
	</script>
	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<?php
}

add_action('wp_head','add_addthis');


/**
 * Disable the emoji's
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );

function create_new_roles_panm360(){
	add_role( 'membre_free', 'Abonné gratuit', array(
		'read' => true,
		'edit_posts' => false,
		'delete_posts' => false
	) );
	add_role( 'membre_premium', 'Abonné premium', array(
		'read' => true,
		'edit_posts' => false,
		'delete_posts' => false
	) );	
}
add_action( 'init', 'create_new_roles_panm360' );
/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param    array  $plugins  
 * @return   array             Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}


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

//add_filter( 'allowed_block_types', 'panm360_allowed_block_types', 10, 2 );
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
		'acf/abonnement',
		'gravityforms/form',
		'woocommerce/featured-product',
		'acf/section_un',
		'acf/agenda_360',
		'acf/section_trois_colonnes'
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
            'menu_title'  => __('PanM 360'),
            'redirect'    => false,
        ));

        // Add sub page.
/*
        $child = acf_add_options_sub_page(array(
            'page_title'  => __('Social Settings'),
            'menu_title'  => __('Social'),
            'parent_slug' => $parent['menu_slug'],
        ));
*/
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
require get_template_directory() . '/inc/agenda/agenda.php';
require get_template_directory() . '/inc/agenda/ajax_agenda.php';
require get_template_directory() . '/inc/woocommerce/woocommerce.php';
require get_template_directory() . '/inc/filter_content.php';

/*
 *
 * CUSTOM BLOCKS
 *
*/

require get_template_directory() . '/template-parts/blocks/icone_partages.php';
require get_template_directory() . '/template-parts/blocks/liste_pages.php';
require get_template_directory() . '/template-parts/blocks/banieres_publcite.php';
require get_template_directory() . '/template-parts/blocks/section_un.php';
require get_template_directory() . '/template-parts/blocks/section_3_colonnes.php';
require get_template_directory() . '/template-parts/blocks/block_agenda_360.php';
require get_template_directory() . '/template-parts/blocks/block_slider_1.php';
