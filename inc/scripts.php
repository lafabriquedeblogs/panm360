<?php

/**
 * Enqueue scripts and styles.
*/

add_action( 'wp_enqueue_scripts', 'panm360_scripts' );
add_action( 'wp_head', 'panm360_header_style');
add_action( 'enqueue_block_assets', 'remove_editor_blocks_assets' );
add_action( 'admin_head', 'panm360_admin_css');

//add_action( 'enqueue_block_editor_assets', 'photographus_add_gutenberg_assets' );

function panm360_scripts() {
	//wp_dequeue_style( 'wp-block-library' );
	wp_enqueue_style( 'panm360-google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700|Rubik:300,400,500,700,900&display=swap' );
	wp_enqueue_style( 'panm360-slick', get_template_directory_uri().'/assets/js/lib/slick/slick.css' );
	wp_enqueue_style( 'panm360-style', get_template_directory_uri().'/assets/css/main.css' );
	
	wp_enqueue_script( 'script-slick', get_template_directory_uri() . '/assets/js/lib/slick/slick.min.js', array('jquery'), false, false );
	wp_enqueue_script( 'script-lozad', get_template_directory_uri() . '/assets/js/lib/lozad.min.js', array('jquery'), false, false );
	wp_enqueue_script( 'script-app', get_template_directory_uri() . '/assets/js/app-min.js', array(), false, true );
	
	wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-style');
}

// Add backend styles for Gutenberg.
/**
 * Load Gutenberg stylesheet.
 */
function photographus_add_gutenberg_assets() {
	// Load the theme styles within Gutenberg.
	wp_enqueue_style( 'panm360-css', get_theme_file_uri( '/assets/css/main.css' ), false );
}




function panm360_header_style(){
	?>
		<style>
			<?php include get_template_directory().'/assets/css/header.css'; ?>
		</style>
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
		}</style>';
}



 
