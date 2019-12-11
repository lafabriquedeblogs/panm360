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

function get_artiste( $album_id , $get_lien = true ){
	
	$artiste = get_the_title( get_field('relier_artiste',$album_id) );
	$artiste_lien = get_permalink( get_field('relier_artiste',$album_id) );
	
	$artiste_output = $artiste;
	
	if( $get_lien ){
		$artiste_output = '<a href="'.$artiste_lien.'">'.$artiste.'</a>';
	}
	
	return $artiste_output;
}

function get_genre($album_id){
	$genres = array();
	$genres_list = get_the_terms($album_id,'genre');
	
	if ( $genres_list && !is_wp_error($genres_list) ) {
		foreach( $genres_list as $genre ){
			$genres[] = '<a href="'. get_term_link( $genre, 'genre' ) .'">'.$genre->name.'</a>';
		}
	}
	$genres_txt = implode(" / ", $genres);
	
	return $genres_txt;
}

function get_annee($album_id){
	$annees = array();
	$annee_list = get_the_terms($album_id,'annee');
	
	if ( $annee_list && !is_wp_error($annee_list) ) {
		foreach( $annee_list as $an ){
			$annees[] = '<a href="'. get_term_link( $an, 'annee' ) .'">'.$an->name.'</a>';
		}
	}
	$annees_txt = implode(" / ", $annees);
	
	return $annees_txt;
}

function get_pays($album_id){
	$pays = array();
	$pays_list = get_the_terms($album_id,'pays');
	
	if ( $pays_list && !is_wp_error($pays_list) ) {
		foreach( $pays_list as $an ){
			$pays[] = '<a href="'. get_term_link( $an, 'pays' ) .'">'.$an->name.'</a>';
		}
	}
	$pays_txt = implode(" / ", $pays);
	
	return $pays_txt;
}

function get_label($album_id){
	$label = array();
	$label_list = get_the_terms($album_id,'label');
	
	if ( $label_list && !is_wp_error($label_list) ) {
		foreach( $label_list as $an ){
			$label[] = '<a href="'. get_term_link( $an, 'label' ) .'">'.$an->name.'</a>';
		}
	}
	$label_txt = implode(" / ", $label);
	
	return $label_txt;
}