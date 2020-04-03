<?php

add_action( 'acf/init', 'register_panm360_panm360_accueil');

function register_panm360_panm360_accueil() {

    // register a testimonial block.
    acf_register_block_type(array(
        'name'              => 'panm360_accueil',
        'title'             => __('Section Un'),
        'description'       => __('Section Un'),
        'render_callback'   => 'panm360_accueil_render_callback',
        'category'          => 'panm360-blocks',
        'icon'              => 'admin-comments',
        'mode'				=> 'edit',
        'keywords'          => array( 'section', 'menu' ),
    ));
}

function panm360_accueil_render_callback( $block, $content = '', $is_preview = false ){

	$id = 'panm360_accueil_' . $block['id'];
	if( !empty($block['anchor']) ) {
	    $id = $block['anchor'];
	}
	
	// Create class attribute allowing for custom "className" and "align" values.
	$className = 'panm360-accueil';
	if( !empty($block['className']) ) {
	    $className .= ' ' . $block['className'];
	}
	if( !empty($block['align']) ) {
	    $className .= ' align' . $block['align'];
	}
	
	//choix_du_contenu : auto || manuel
	//choix_dune_categorie /taxonomy
	//choix_customs /group
	//titre
	//lien_du_titre
	//elements_aside /repeater
	
	$titre_categorie = get_field('choix_du_contenu');
	
	$genre = 'Genre';
	$Title = 'Title';
	$Sous_titre = 'Sous titre';
	$excerpt = 'Proin sed turpis et elit cursus semper. Etiam gravida neque sit amet felis sollicitudin, eget hendrerit massa venenatis. Curabitur magna magna, eleifend id volutpat et, placerat vel odio. Nam tristique dignissim augue sit amet pretium.';
	$Author = 'Author';
	
	
	if( have_rows('sections')):
		
		while(  have_rows('sections') ){
			the_row();
			
			if( get_row_layout() == 'categorie' ):
				$titre_categorie = get_field('titre_de_la_categorie');
				$category_id = get_field('id_categorie');
				
				
			endif;
			
				
		}//while_have_roes
		
		
	endif;//have_rows
?>
