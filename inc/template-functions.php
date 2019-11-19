<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package panm360
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function panm360_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'panm360_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function panm360_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'panm360_pingback_header' );


require get_template_directory() . '/inc/panm360_Walker-menu.php';
require get_template_directory() . '/inc/panm360_Walker-submenu.php';

function main_menu_desktop(){
	$menu = wp_nav_menu( array(
		'menu' => 290,
		'menu_id' => 'nos-choix-menu-desktop',
		'menu_class' => 'main-menu-level-1',
		'container' => '',
		'depth' => 1,
		'echo' => false,
		'items_wrap' => '%3$s',
		'walker' => new panm360_Walker()
	) );

	$menu .= wp_nav_menu( array(
		'menu' => 2,
		'menu_id' => 'lire-menu-desktop',
		'menu_class' => 'main-menu-level-1',
		'container' => '',
		'depth' => 1,
		'echo' => false,
		'items_wrap' => '%3$s',
		'walker' => new panm360_Walker()
	) );
	$menu .= wp_nav_menu( array(
		'menu' => 286,
		'menu_id' => 'ecouter-menu-desktop',
		'menu_class' => 'main-menu-level-1',
		'container' => '',
		'depth' => 1,
		'echo' => false,
		'items_wrap' => '%3$s',
		'walker' => new panm360_Walker()
	) );
	$menu .= wp_nav_menu( array(
		'menu' => 284,
		'menu_id' => 'visionner-menu-desktop',
		'menu_class' => 'main-menu-level-1',
		'container' => '',
		'depth' => 1,
		'echo' => false,
		'items_wrap' => '%3$s',
		'walker' => new panm360_Walker()
	) );
	$menu .= wp_nav_menu( array(
		'menu' => 287,
		'menu_id' => 'apprendre-menu-desktop',
		'menu_class' => 'main-menu-level-1',
		'container' => '',
		'depth' => 1,
		'echo' => false,
		'items_wrap' => '%3$s',
		'walker' => new panm360_Walker()
	) );
	$menu .= wp_nav_menu( array(
		'menu' => 285,
		'menu_id' => 'participer-menu-desktop',
		'menu_class' => 'main-menu-level-1',
		'container' => '',
		'depth' => 1,
		'echo' => false,
		'items_wrap' => '%3$s',
		'walker' => new panm360_Walker()
	) );
	
	return $menu;	
}

function main_menu_mobile(){
	$menu = wp_nav_menu( array(
		'menu' => 290,
		'menu_id'        => 'nos-choix-menu-mobile',
		'menu_class'	=> 'main-menu-level-1',
		'depth' => 0,
		'echo' => false
	) );
	$menu .= wp_nav_menu( array(
		'menu' => 2,
		'menu_id'        => 'lire-menu-mobile',
		'menu_class'	=> 'main-menu-level-1',
		'depth' => 0,
		'echo' => false
	) );
	$menu .= wp_nav_menu( array(
		'menu' => 286,
		'menu_id'        => 'ecouter-menu-mobile',
		'menu_class'	=> 'main-menu-level-1',
		'depth' => 0,
		'echo' => false
	) );
	$menu .= wp_nav_menu( array(
		'menu' => 284,
		'menu_id'        => 'visionner-menu-mobile',
		'menu_class'	=> 'main-menu-level-1',
		'depth' => 0,
		'echo' => false
	) );
	$menu .= wp_nav_menu( array(
		'menu' => 287,
		'menu_id'        => 'apprendre-menu-mobile',
		'menu_class'	=> 'main-menu-level-1',
		'depth' => 0,
		'echo' => false
	) );
	$menu .= wp_nav_menu( array(
		'menu' => 285,
		'menu_id'        => 'participer-menu-mobile',
		'menu_class'	=> 'main-menu-level-1',
		'depth' => 0,
		'echo' => false
	) );
	
	return $menu;	
}

function main_sub_menu_desktop(){
	
	$menu = wp_nav_menu( array(
		'menu' => 2,
		//'container' => '',
		'depth' => 2,
		'echo' => false,
		'items_wrap' => '%3$s',
		'walker' => new panm360_Walker_sub_menu()
	) );
	$menu .= wp_nav_menu( array(
		'menu' => 286,
		//'container' => '',
		'depth' => 0,
		'echo' => false,
		'items_wrap' => '%3$s',

		'walker' => new panm360_Walker_sub_menu()
	) );
	$menu .= wp_nav_menu( array(
		'menu' => 284,
		//'container' => '',
		'depth' => 0,
		'echo' => false,
		'items_wrap' => '%3$s',

		'walker' => new panm360_Walker_sub_menu()
	) );
	$menu .= wp_nav_menu( array(
		'menu' => 287,
		//'container' => '',
		'depth' => 0,
		'echo' => false,
		'items_wrap' => '%3$s',

		'walker' => new panm360_Walker_sub_menu()
	) );
	$menu .= wp_nav_menu( array(
		'menu' => 285,
		//'container' => '',
		'depth' => 0,
		'echo' => false,
		'items_wrap' => '%3$s',

		'walker' => new panm360_Walker_sub_menu()
	) );
	
	return $menu;
}
