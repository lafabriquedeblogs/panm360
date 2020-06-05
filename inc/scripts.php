<?php

/**
 * Enqueue scripts and styles.
*/

add_action( 'wp_enqueue_scripts', 'panm360_scripts' );
add_action( 'wp_head', 'panm360_header_style');
add_action( 'enqueue_block_assets', 'remove_editor_blocks_assets' );
add_action( 'admin_head', 'panm360_admin_css');
add_action( 'enqueue_block_editor_assets', 'my_gutenberg_scripts' );

function my_gutenberg_scripts() {
    wp_enqueue_script( 'my-editor-enhancement', get_template_directory_uri().'/assets/js/editor.js',array( 'wp-blocks', 'wp-dom' ), filemtime(get_template_directory().'/assets/js/editor.js') ,true );
    //wp_enqueue_style( 'panm360-css', get_theme_file_uri( '/assets/css/editor_main.css' ), false );
}

function panm360_scripts() {
	//wp_dequeue_style( 'wp-block-library' );
	wp_enqueue_style( 'panm360-google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Rubik:300,400,500,700,900&display=swap' );
	wp_enqueue_style( 'panm360-slick', get_template_directory_uri().'/assets/js/lib/slick/slick.css' );

	wp_enqueue_style( 'panm360-style', get_template_directory_uri().'/assets/css/main.css', array(), filemtime(get_template_directory().'/assets/css/main.css'));
	
	wp_enqueue_script( 'script-infinite-scroll', get_template_directory_uri() .'/assets/js/lib/infinite-scroll.pkgd.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'script-slick', get_template_directory_uri() . '/assets/js/lib/slick/slick.min.js', array('jquery'), false, false );
	wp_enqueue_script( 'script-app', get_template_directory_uri() . '/assets/js/app-min.js?v=2', array(), false, true );
	
	if( is_page( array( 6944 , 10003 ) ) ){
		wp_enqueue_style( 'panm360-datepicker-style', get_template_directory_uri().'/assets/js/lib/datepicker/datepicker.min.css' );
		wp_enqueue_script( 'script-datepicker', get_template_directory_uri() . '/assets/js/lib/datepicker/datepicker.min.js', array(), false, true );
	}	
	
	$my_current_lang = apply_filters( 'wpml_current_language', NULL );
	wp_localize_script( 'script-app', 'agendAjax', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'current_language' => $my_current_lang,
		)
	);
	
	wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-style');
    //wp_deregister_style( 'dashicons' );
}

function panm360_header_style(){
	?>
		<style><?php include get_template_directory().'/assets/css/header.css'; ?></style>
	<?php
}

function remove_editor_blocks_assets() {
	if ( !is_admin() ) {
		wp_dequeue_style( 'editor-blocks' );
		
	}
}

function panm360_admin_css() {
	echo '<style type="text/css">
		.wp-block {
			max-width: 1284px;
		}
		.wpml_acf_original_value {
			display: none;
		</style>';
}

//add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
function wps_deregister_styles() {
    wp_dequeue_style( 'wp-block-library' );
}

function add_addthis(){
	?>
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="apple-touch-icon" sizes="57x57" href="/favicons/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/favicons/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/favicons/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/favicons/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/favicons/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/favicons/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/favicons/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/favicons/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="/favicons/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/favicons/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
	<link rel="manifest" href="/favicons/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<meta name="google-site-verification" content="=VTCijZR84yTYbBCjuRst-zSYuF6B-qWIRe9ItH1ceSE" />
		<script type="text/javascript" async="async" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5df97d325d480cb8&async=1&domready=1"></script>
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

 
