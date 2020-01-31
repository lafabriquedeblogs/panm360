<?php

add_action( 'acf/init', 'register_panm360_section_un');

function register_panm360_section_un() {

    // register a testimonial block.
    acf_register_block_type(array(
        'name'              => 'section_un',
        'title'             => __('Section Un'),
        'description'       => __('Section Un'),
        'render_callback'   => 'section_un_render_callback',
        'category'          => 'panm360-blocks',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'section', 'menu' ),
    ));
}

function section_un_render_callback( $block, $content = '', $is_preview = false ){

	$id = 'section_un_' . $block['id'];
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
	
	//choix_du_contenu : auto || manuel
	//choix_dune_categorie /taxonomy
	//choix_customs /group
	//titre
	//lien_du_titre
	//elements_aside /repeater
	
	$choix_du_contenu = get_field('choix_du_contenu');
	
	$genre = 'Genre';
	$Title = 'Title';
	$Sous_titre = 'Sous titre';
	$excerpt = 'Proin sed turpis et elit cursus semper. Etiam gravida neque sit amet felis sollicitudin, eget hendrerit massa venenatis. Curabitur magna magna, eleifend id volutpat et, placerat vel odio. Nam tristique dignissim augue sit amet pretium.';
	$Author = 'Author';


?>
	<section class="section <?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>>">
		<div id="interviews" class="section-inner">
<?php
	
	if( $choix_du_contenu == 'auto'){
		
			$choix_dune_categorie = get_field('choix_dune_categorie');
			
			$term_name = get_term( $choix_dune_categorie )->name;
			$term_link = get_term_link( $choix_dune_categorie );

			$articles = get_articles_par_terms( $choix_dune_categorie , 4 );
			$first_element = array_shift($articles);
			
?>

			<h4 class="section-titre"><span><?php echo $term_name;?></span> <a href="<?php echo $term_link;?>"><svg class="icone"><use xlink:href="#fleche-lien"></use></svg></a></h4>
			
			<div class="section-content">
				
				<div class="section-content--main">
					
					<?php

						$genre = get_genre( $first_element->ID, false,  false );
						$Title = get_the_title( $first_element->ID );
						$words = 35 ;
						$more = '…';			 
						$excerpt = wp_trim_words( $first_element->post_content, $words, $more );
						
						$auteur_id = $first_element->post_author;
						$Author = get_the_author_meta('display_name',$auteur_id );
						$auteur_link =  get_author_posts_url($auteur_id) ;
						
						$image = get_the_post_thumbnail_url( $first_element->ID, array(500,500) );
						
						$permalien = get_permalink($first_element->ID);
						
						$Sous_titre = get_field('sous_titre',$first_element->ID );
						
						if( !$image ) $image =  get_template_directory_uri()."/assets/img/panm-icones/500x500/m-gris-sur-gris.jpg";
								
						include( locate_template( '/template-parts/modules/element-main.php', false, false ) );  ?>
				</div><!-- section-content--main -->
				
				<ul class="aside-content">
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
						
						include( locate_template( '/template-parts/modules/element-aside.php', false, false ) ); 		
						
					}
				?>	
				</ul>
			</div><!-- section-content -->
			
<?php } else { ?>					

			<h4 class="section-titre"><span><?php echo $choix_du_contenu;?></span> <a href="#"><svg class="icone"><use xlink:href="#fleche-lien"></use></svg></a></h4>
			
			<div class="section-content ">
				
				<div class="section-content--main">
					
					<?php include( locate_template( '/template-parts/modules/element-main.php', false, false ) );  ?>
				</div>
				
				<ul class="aside-content">
					<?php
					$albums_count = 3;	
					while( $albums_count > 0 ){
							include( locate_template( '/template-parts/modules/element-aside.php', false, false ) ); 		
						$albums_count--;
					}
				?>	
				</ul>
			</div>

<?php } ?>
		</div>
	</section>
			
<?php } ?>
