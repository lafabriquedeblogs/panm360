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

function get_genre( $album_id, $data = false, $raw = false ){
	
	$genres = array();
	$genres_list = get_the_terms($album_id,'genre');
	
	if( !$genres_list ) return '';
	
	if( $raw ) return $genres_list;
	
	if ( $genres_list && !is_wp_error($genres_list) ) {
		foreach( $genres_list as $genre ){
			$genres[] = '<a href="'. get_term_link( $genre, 'genre' ) .'">'.$genre->name.'</a>';
		}
	}
	
	$genres_txt = implode(" / ", $genres);
	
	if( $data ){
		$genres_txt = '';
		foreach( $genres_list as $genre ){
			$genres_txt .= " ".sanitize_title( $genre->name );
		}
	}
	return $genres_txt;
}

function get_genre_parents( $post_id , $link = false){
	
	//$_terms = get_genre( $post_id, false, true );
    $_terms = get_the_terms( $post_id,'genre');

    if( empty($_terms) ) return '';
    
    foreach ($_terms as $_term) {
       
       if( $_term->parent == 0 ){
       	
            if( !$link ){
	            $genres[] = $_term->name ;
            } else {
	            $link_term = get_term_link( $_term->term_id, 'genre' );
	            $genres[] = '<a href="'.$link_term.'">'.$_term->name.'</a>';
            }
            	        
        } else {
	        
	        $parent = get_term( $_term->parent, 'genre');
            if( !$link ){
	            $genres[] = $parent->name ;
            } else {
	            $link_term = get_term_link( $parent->term_id, 'genre' );
	            $genres[] = '<a href="'.$link_term.'">'.$parent->name.'</a>';
            }
        }
	}
	
	$genres = array_unique($genres);
	
    $genres_txt = implode(" / ", $genres);
    return $genres_txt;
}

function get_main_genres( $get_links = false ){
	
	$myterms = get_terms( 'genre', array( 'parent' => 0 ) );
    
    if( empty($myterms) ) return '';
    
    $genres = array();
    
    if( $get_links ){
    	
    	foreach ($myterms as $_term) {
	    	$link = get_term_link( $_term->term_id, 'genre' );
   	        $genres[] = '<a href="'.$link.'">'.$_term->name.'</a>';
    	}	
    	 
    	$genres_txt = implode(" / ", $genres);
    	
    	return $genres_txt;
    }

    foreach ($myterms as $_term) {
	    $genre = array();
	    $genre['name'] = ucfirst($_term->name);
        $genre['id'] = $_term->term_id;
        $genres[] = $genre;
   	}
   	
    return $genres;
}

function get_annee($album_id, $data = false){
	$annees = array();
	$annee_list = get_the_terms($album_id,'annee');
	
	if ( $annee_list && !is_wp_error($annee_list) ) {
		foreach( $annee_list as $an ){
			$annees[] = '<a href="'. get_term_link( $an, 'annee' ) .'">'.$an->name.'</a>';
		}
	}
	$annees_txt = implode(" / ", $annees);

	if( $data ){
		$annees_txt = '';
		foreach( $annee_list as $an ){
			$annees_txt .= " ".sanitize_title( $an->name );
		}
	}
		
	return $annees_txt;
}

function get_months_list(){
	$months = array(
		'01' => __( 'janvier', 'panm360' ),
		'02' => __( 'février', 'panm360' ),
		'03' => __( 'mars', 'panm360' ),
		'04' => __( 'avril', 'panm360' ),
		'05' => __( 'mai', 'panm360' ),
		'06' => __( 'juin', 'panm360' ),
		'07' => __( 'juillet', 'panm360' ),
		'08' => __( 'août', 'panm360' ),
		'09' => __( 'septembre', 'panm360' ),
		'10' => __( 'octobre', 'panm360' ),
		'11' => __( 'novembre', 'panm360' ),
		'12' => __( 'décembre', 'panm360' ),
	);
	
	return $months;
};

function get_month_name( $m ){

	$months = get_months_list();

	return $months[$m];
}
function get_days_list(){
	$days = array(
		'1' => __( 'lundi', 'panm360' ),
		'2' => __( 'mardi', 'panm360' ),
		'3' => __( 'mercredi', 'panm360' ),
		'4' => __( 'jeudi', 'panm360' ),
		'5' => __( 'vendredi', 'panm360' ),
		'6' => __( 'samedi', 'panm360' ),
		'7' => __( 'dimanche', 'panm360' ),
	);
	
	return $days;
};

function get_day_name( $d ){

	$days = get_days_list();

	return $days[$d];
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


function get_ville($album_id){
	
	$ville = array();
	
	$ville_list = get_the_terms($album_id,'ville');
	
	$ville_txt = $ville_list[0]->name;
	
	return $ville_txt;
}

function get_salle($album_id){
	
	$salle = array();
	
	$salle_list = get_the_terms($album_id,'salle');
	
	$salle_txt = $salle_list[0]->name;
	
	return $salle_txt;
}


function get_years_list(){
							
	/* Add your taxonomy. */
	$taxonomies = array( 
	    'annee',
	);
	
	$args = array(
	    'orderby'           => 'name', 
	    'order'             => 'DESC',
	    'hide_empty'        => true, 
	    'exclude'           => array(), 
	    'exclude_tree'      => array(), 
	    'include'           => array(),
	    'number'            => '', 
	    'fields'            => 'all', 
	    'slug'              => '', 
	    'parent'            => '',
	    'hierarchical'      => true, 
	    'child_of'          => 0, 
	    'get'               => '', 
	    'name__like'        => '',
	    'description__like' => '',
	    'pad_counts'        => false, 
	    'offset'            => '', 
	    'search'            => '', 
	    'cache_domain'      => 'core'
	); 
	
	$years = get_terms( $taxonomies, $args );
	
	return $years;
}
function get_filter_data( $taxonomies ){
	$terms = get_terms( array(
		'taxonomy' => $taxonomies,
		'hide_empty' => false,
	) );
	
	$liste = array();
	
	foreach( $terms as $term ){
		$nom = strtolower( $term->name );
		$slug = get_term_link( $term->term_id, $taxonomies );
		$id = $term->term_id;
		$liste[] = '<a href="'.$slug.'">'.$nom.'</a>';
	}
	
	return implode(" • ", $liste);	
}

function get_liste_filtre_artiste(){

	$args = array(
		'post_type' => 'artiste',
		'posts_per_page' => -1,
		'orderby' => 'title',
		'order' => 'DESC',
		'suppress_filters' => false,
	);
	
	$artistes_query = new WP_Query($args);
	$artistes = $artistes_query->posts;
	
	foreach( $artistes as $artiste ){
		$nom = strtolower( $artiste->post_title );
		$slug = sanitize_title( $nom );
		$relier_album = get_field('relier_album',$artiste->ID);
		$lien_album = get_permalink($relier_album);
		//$id = $artiste->ID;
		$liste[] = '<a href="'.$lien_album.'">'.$nom.'</a>';
	}
	return implode(" • ", $liste);
}

add_filter( 'the_content', 'filter_the_content_in_the_main_loop' );
 
function filter_the_content_in_the_main_loop( $content ) {

		$user_id = get_current_user_id();

		if( $user_id == 0 && !is_page() ){
			
			global $post;
			
			$content_strip = strip_tags($post->post_content);
			$content_total_length = str_word_count($content_strip);
			$words = $content_total_length / 2 ;
			$more = '…';
			 
			$excerpt = wp_trim_words( $content, $words, $more );
			echo $excerpt;
			
		} else {
			
			$args = array( 
				'status' => array( 'active', 'complimentary', 'pending','free_trial' ),
			);  
			
			$active_memberships = wc_memberships_get_user_memberships( $user_id, $args );
			$active_subscriptions = wcs_get_users_subscriptions($user_id);
			
			$active_memberships_names = array();
			
			foreach( $active_memberships as $membership){
				$active_memberships_names[] = $membership->plan->name;
			}
			
			if( in_array('Premium', $active_memberships_names ) ){
				return $content;
			}
			
			$viewed_interviews = get_user_meta( $user_id , 'viewed_interviews', true );
			$viewed_albums = get_user_meta( $user_id , 'viewed_albums', true );
			$viewed_review = get_user_meta( $user_id , 'viewed_review', true );
			$viewed_chronique = get_user_meta( $user_id , 'viewed_chronique', true );
			
		}

}
