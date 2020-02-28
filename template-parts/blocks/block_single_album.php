<?php

add_action( 'acf/init', 'register_panm360_single_album');

function register_panm360_single_album() {

    // register a testimonial block.
    acf_register_block_type(array(
        'name'              => 'single_album',
        'title'             => __('Single albums'),
        'description'       => __('Single albums'),
        'render_callback'   => 'single_album_render_callback',
        'category'          => 'panm360-blocks',
        'icon'              => 'admin-comments',
        'mode'				=> 'edit',
        'keywords'          => array( 'social', 'share' ),
    ));
}

function single_album_render_callback( $block, $content = '', $is_preview = false ){

	$id = 'single-album-' . $block['id'];
	if( !empty($block['anchor']) ) {
	    $id = $block['anchor'];
	}
	
	// Create class attribute allowing for custom "className" and "align" values.
	$className = 'single-album';
	if( !empty($block['className']) ) {
	    $className .= ' ' . $block['className'];
	}
	if( !empty($block['align']) ) {
	    $className .= ' align' . $block['align'];
	}
	
    $selectionner_un_album = get_field('selectionner_un_album');
    $saisir_une_ou_plusieurs_id_dalbums = get_field('saisir_une_ou_plusieurs_id_dalbums');
    
    $albums =  ( !empty( $selectionner_un_album )) ? $selectionner_un_album : explode(',', $saisir_une_ou_plusieurs_id_dalbums);
    
	$albums_count = count($albums);	
	
	$args = array(
		'post_type' => 'records',
		'posts_per_page' => $albums_count,
		'post_status' => 'publish',
		'post__in' => $albums
	);
	
	$albums = new WP_Query($args);
	
	echo '<ul id="'.$id.'" class="single-album-list">';
	
	while($albums->have_posts() ){
			$albums->the_post();
			
			include( locate_template( '/template-parts/modules/element-album.php', false, false ) );			
		$albums_count--;
	}
	echo '</ul> <!--single-album-list-->';
}