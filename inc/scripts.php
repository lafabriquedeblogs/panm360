<?php

/**
 * Enqueue scripts and styles.
*/
 
function panm360_scripts() {
	//wp_dequeue_style( 'wp-block-library' );
	wp_enqueue_style( 'panm360-google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700|Rubik:400,500,700,900&display=swap' );
	wp_enqueue_style( 'panm360-slick', get_template_directory_uri().'/assets/vendor/slick/slick.css' );
	wp_enqueue_style( 'panm360-style', get_template_directory_uri().'/assets/css/main.css' );
	
	wp_enqueue_script( 'script-slick', get_template_directory_uri() . '/assets/vendor/slick/slick.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'script-app', get_template_directory_uri() . '/assets/js/app.js', array(), false, true );

}
add_action( 'wp_enqueue_scripts', 'panm360_scripts' );
	