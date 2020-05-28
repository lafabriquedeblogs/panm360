<?php
								
	if( have_rows('sections')):
		
		while(  have_rows('sections') ){
			the_row();
			
			if( get_row_layout() == 'categorie' ):

				$page_titre = get_sub_field('titre_de_la_categorie');
				$page_id = my_translate_object_id( get_sub_field('line_vers_la_page'), 'page' );
				$post_type = get_sub_field( 'choisir_les_types_de_pages' );
				$display_categories = get_sub_field( 'id_categorie');
				$posts_per_page = get_sub_field( 'nombre_darticles_a_afficher' );
				
				include( locate_template( '/template-parts/modules/section-element-category.php', false, false ) );										
												
			elseif( get_row_layout() == 'custom' ):

				$page_titre = get_sub_field('titre_de_la_categorie');
				$page_id = my_translate_object_id( get_sub_field('line_vers_la_page'), 'page' );
				$post_type = get_sub_field( 'choisir_les_types_de_pages' );
				$posts_per_page = get_sub_field( 'nombre_darticles_a_afficher' );
				
				include( locate_template( '/template-parts/modules/section-element-custom.php', false, false ) );	

			elseif( get_row_layout() == 'albums' ):
			
				$page_titre = get_sub_field('titre_de_la_categorie');
				$page_id = my_translate_object_id( get_sub_field('line_vers_la_page'), 'page' );
				$post_type = get_sub_field( 'choisir_les_types_de_pages' );
				$posts_per_page = get_sub_field( 'nombre_darticles_a_afficher' );
				$category__not_in = get_sub_field( 'ne_pas_inclure_la_ou_les_categorie' );// top360
				$tag__not_in = get_sub_field( 'ne_pas_inclure_la_ou_les_etiquettes' );//top360
				
				$inclure_la_categorie = get_sub_field( 'inclure_la_categorie' );
				$inclure_letiquette = get_sub_field( 'inclure_letiquette' );
				
				$choisir_le_genre = get_sub_field( 'choisir_le_genre' );
				
				include( locate_template( '/template-parts/modules/section-element-albums.php', false, false ) );										
			
			endif;

			
				
		}//while_have_roes
		
		
	endif;//have_rows	
?>				
