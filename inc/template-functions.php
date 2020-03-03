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

function get_artiste( $album_id , $get_lien = true ){
	
	$artiste_id =  get_field('relier_artiste',$album_id);
	
	if( empty( $artiste_id ) ) return '';
	
	if( is_array( $artiste_id ) ) {
		
		$art_array = array();
		
		foreach( $artiste_id as $art_id) {

			$artiste = get_the_title( $art_id );
			$artiste_lien = get_permalink( $art_id );
			
			if( $get_lien ){
				$art_array[] = '<a href="'.$artiste_lien.'">'.$artiste.'</a>';
			} else {
				$art_array[] = $artiste;
			}			
		}
		
		return implode(" ", $art_array);
	}

	$artiste = get_the_title( $artiste_id );

	$artiste_lien = get_permalink( $artiste_id );
	
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


function get_post_primary_category($post_id, $term='category', $return_all_categories=false){
    
    $return = array();

    if (class_exists('WPSEO_Primary_Term')){
        // Show Primary category by Yoast if it is enabled & set
        $wpseo_primary_term = new WPSEO_Primary_Term( $term, $post_id );
        $primary_term = get_term($wpseo_primary_term->get_primary_term());
		
        if (!is_wp_error($primary_term)){
            $return['primary_category'] = $primary_term;
        }
    }

    if (empty($return['primary_category']) || $return_all_categories){
        $categories_list = get_the_terms($post_id, $term);

        if (empty($return['primary_category']) && !empty($categories_list)){
            $return['primary_category'] = $categories_list[0];  //get the first category
        }
        if ($return_all_categories){
            $return['all_categories'] = array();

            if (!empty($categories_list)){
                foreach($categories_list as &$category){
                    $return['all_categories'][] = $category->term_id;
                }
            }
        }
    }
    return $return;
}


function get_term_top_most_parent( $term, $taxonomy ) {
    // Start from the current term
    $parent  = get_term( $term, $taxonomy );
    // Climb up the hierarchy until we reach a term with parent = '0'
    while ( $parent->parent != '0' ) {
        $term_id = $parent->parent;
        $parent  = get_term( $term_id, $taxonomy);
    }
    return $parent;
}


function get_genre_parents( $post_id , $link = false){
	
	$taxonomy = 'genre';
	
	$_terms = wp_get_object_terms( $post_id,$taxonomy);
	
	$top_parent_terms = array();
	$output = array();
	
	$post_categories = get_post_primary_category( $post_id, $taxonomy);


    if( empty($_terms) || empty($post_categories) ) return '';
    
 	$primary_category = $post_categories['primary_category'];
	$primary_category_name = $primary_category->name;   
    
    foreach ($_terms as $_term) {
	
		$top_parent = get_term_top_most_parent( $_term, $taxonomy );
		
		if ( !in_array( $top_parent, $top_parent_terms ) ) {
			$top_parent_terms[] = $top_parent;
		}
	}

	foreach ( $top_parent_terms as $term ) {
		//Add every term
		if( $link ){
			$output[] = '<a href="'. get_term_link( $term ) . '">' . $term->name . '</a>';
		} else {
			$output[] =  $term->name;
		}
	}

		if( $link ){
			array_unshift($output ,  '<a href="'. get_term_link( $primary_category ) . '">' . $primary_category_name . '</a>' );
		} else {
			array_unshift($output ,  $primary_category_name);
		}
	
	
	$output = array_unique($output);
	
    $genres_txt = implode(" / ", $output);
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
	
	if( empty($annee_list)) return '';
	
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
	
	if( empty($ville_list)) return '';
	
	$ville_txt = $ville_list[0]->name;
	
	return $ville_txt;
}

function get_salle($album_id){
	
	$salle = array();
	
	$salle_list = get_the_terms($album_id,'salle');
	
	if( empty($salle_list)) return '';
	
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
	wp_reset_query( );
	return implode(" • ", $liste);
}

function get_articles_par_terms( $term , $posts_per_page = -1 ){
	$args = array(
		'posts_per_page' => $posts_per_page,
		'post_type' => array('records','post','gig_review'),
		'post_status' => 'publish',
		'tax_query' => array(
		    array(
		        'taxonomy' => 'category',
		        'field'    => 'id',
		        'terms'    => $term,
		    ),
		),
		'orderby' => 'date',
		'order' => 'DESC'	
	);
	
	$my_query = new WP_Query($args);
	wp_reset_query();
	return $my_query->posts;
	
}

function menu_langue(){
	
	if( is_admin()) return '';
	
	global $post;
	
	$post_type = get_post_type( $post );
	
	$others_l = ( ICL_LANGUAGE_CODE == 'en' ) ? 'fr' : 'en';
	$yop = icl_get_languages('skip_missing=1&orderby=KEY&order=DIR&link_empty_to=str');

	$translations = apply_filters( 'wpml_element_has_translations', NULL , $post->ID, $post_type );
	
	if( $translations ) {
		?>
			<li id="panm-lang-switch" class="menu-item">
				<a href="<?php echo $yop[$others_l]['url'];?>"><?php echo strtoupper( $others_l );?></a>
			</li>	
		<?php			
	}
	return;
}

function get_image_sizes( $size = '' ) {
    $wp_additional_image_sizes = wp_get_additional_image_sizes();
 
    $sizes = array();
    $get_intermediate_image_sizes = get_intermediate_image_sizes();
 
    // Create the full array with sizes and crop info
    foreach( $get_intermediate_image_sizes as $_size ) {
        if ( in_array( $_size, array( 'thumbnail', 'medium', 'large' ) ) ) {
            $sizes[ $_size ]['width'] = get_option( $_size . '_size_w' );
            $sizes[ $_size ]['height'] = get_option( $_size . '_size_h' );
            $sizes[ $_size ]['crop'] = (bool) get_option( $_size . '_crop' );
        } elseif ( isset( $wp_additional_image_sizes[ $_size ] ) ) {
            $sizes[ $_size ] = array( 
                'width' => $wp_additional_image_sizes[ $_size ]['width'],
                'height' => $wp_additional_image_sizes[ $_size ]['height'],
                'crop' =>  $wp_additional_image_sizes[ $_size ]['crop']
            );
        }
    }
 
    // Get only 1 size if found
    if ( $size ) {
        if( isset( $sizes[ $size ] ) ) {
            return $sizes[ $size ];
        } else {
            return false;
        }
    }
    return $sizes;
}


function lien_critiques_dalbum_complet(){
	$critiques_dalbums = my_translate_object_id( 11680, 'page' );
	$critiques_dalbums_permalien = get_permalink( $critiques_dalbums );
	$lien_critiques_dalbum_complet = '<a href="'.$critiques_dalbums_permalien.'" class="plus-de">'. __('Critiques d\'albums','panm360').'<svg class="icone"><use xlink:href="#fleche-lien"></use></svg></a>';	

	echo $lien_critiques_dalbum_complet;
}
	
	
function return_acf_block_content_interview_introduction_presentation( $post_content = '', $block_name = '', $post_id = 0 ){

	if( $post_id == 0 ) return '';
	
	if ( function_exists( 'get_field' ) ) {
		//$pid = get_post();
		if ( has_blocks( $post_content ) ) {
			$blocks = parse_blocks( $post_content );
			foreach ( $blocks as $block ) {
				if ( $block['blockName'] === $block_name ) {
					
					$content = $block['attrs']['data']['introduction_presentation'];

				} elseif ( $block['blockName'] === 'core/block' ) {
					$block_content = parse_blocks( get_post( $block['attrs']['ref'] )->post_content );
					if ( $block_content[0]['blockName'] === $block_name ) {
						// Access to "some" block data
						$content = $block_content[0]['attrs']['data']['introduction_presentation'];
					}
				}
			}
		}
		
		return $content;
	}
	
	return '';	
}

function return_acf_block_content_interview_introduction_image( $post_content = '', $block_name = '', $post_id = 0 ){

	if( $post_id == 0 ) return '';
	
	if ( function_exists( 'get_field' ) ) {
		//$pid = get_post();
		if ( has_blocks( $post_content ) ) {
			$blocks = parse_blocks( $post_content );
			foreach ( $blocks as $block ) {
				if ( $block['blockName'] === $block_name ) {

					$content = $block['attrs']['data']['image'];

				} elseif ( $block['blockName'] === 'core/block' ) {
					$block_content = parse_blocks( get_post( $block['attrs']['ref'] )->post_content );
					if ( $block_content[0]['blockName'] === $block_name ) {
						// Access to "some" block data
						$content = $block_content[0]['attrs']['data']['image'];
					}
				}
			}
		}
		
		return $content;
	}
	
	return '';	
}