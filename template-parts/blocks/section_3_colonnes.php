<?php

add_action( 'acf/init', 'register_panm360_section_trois_colonnes');

function register_panm360_section_trois_colonnes() {

    // register a testimonial block.
    acf_register_block_type(array(
        'name'              => 'section_trois_colonnes',
        'title'             => __('Section 3 colonnes'),
        'description'       => __('Section 3 colonnes'),
        'render_callback'   => 'section_trois_colonnes_render_callback',
        'category'          => 'panm360-blocks',
        'icon'              => 'admin-comments',
        'mode'				=> 'edit',
        'keywords'          => array( 'section', 'menu' ),
    ));
}

function section_trois_colonnes_render_callback( $block, $content = '', $is_preview = false ){

	$id = 'section_trois_colonnes_' . $block['id'];
	if( !empty($block['anchor']) ) {
	    $id = $block['anchor'];
	}
	
	// Create class attribute allowing for custom "className" and "align" values.
	$className = 'section-un';
	if( !empty($block['className']) ) {
	    $className .= ' ' . $block['className'];
	}
	if( !empty($block['align']) ) {
	    $className .= ' align' . $block['align'];
	}
	
	
	$marges_internes = get_field('marges_internes');
	$automatique_ou_manuel = get_field('automatique_ou_manuel');
	


?>

	<section class="section">
		<div id="panam-at-sat" class="section-inner">
			<h4 class="section-titre"><span>Panm@Sat</span> <a href="#"><svg class="icone"><use xlink:href="#fleche-lien"></use></svg></a></h4>
			<div class="section-content">


<?php
	
	if( $automatique_ou_manuel == 'oui'){
		
			$taxonomy = get_field('choisir_la_categorie');
			
			$term_name = get_term( $taxonomy )->name;
			$term_link = get_term_link( $taxonomy );

			$articles = get_articles_par_terms( $taxonomy , 3 );
			
						
?>
			<div class="section-content--has-3-columns">
			<?php

				foreach( $articles as $article  ){
						
					$genre = get_genre( $article->ID, false,  false );
					$Title = get_the_title( $article->ID );
						
					$auteur_id = $article->post_author;
					$Author = get_the_author_meta('display_name',$auteur_id );
					$auteur_link =  get_author_posts_url($auteur_id) ;
						
					$image = get_the_post_thumbnail_url( $article->ID, array(500,500) );
					
					$permalien = get_permalink($article->ID);
											
					if( !$image ) $image =  get_template_directory_uri()."/assets/img/panm-icones/500x500/m-gris-sur-gris.jpg";							
						
					include( locate_template( '/template-parts/modules/element-article.php', false, false ) ); 		
						
				}
						


			?>							
			</div>			
<?php } else { ?>					



<?php } ?>
		</div>
	</div>
</section>
<?php } ?>
