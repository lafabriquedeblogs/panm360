<?php

/*
	Template name: Accueil
*/

get_header();

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
						
			<?php the_content();	?>

			<section class="section">
				<div class="section-inner">
					
					<div class="section-content">
						
						<div class="section-content--main">



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
							
						</div><!-- section-content -->	
						
						<div class="aside-content">
							<?php
								$count = 12;
								$start = date('Y/m/d');
								$end = date('Y/m/d', strtotime($start. ' + 15 days'));
								
								include( locate_template( '/template-parts/modules/agenda-mini.php', false, false ) );
							?>
							<?php //get_template_part( '/template-parts/publicites/publicite', 'ilot' ); ?>
							
						</div><!-- .aside-content -->
						
					</div>
					
				</div>
			</section>

<?php /* ?>			
			<div id="top-360-hero" class="wide-screen"></div>			
			<div id="text-introduction-panm360">
				<?php
					
					$top360_id = apply_filters( 'wpml_object_id', 2683, 'page', TRUE  );
					$top360_content = get_post( $top360_id );
					$top360_content = $top360_content->post_content;
					
					echo $top360_content;
				?>
			</div>
			
			<section class="section">
				<div id="critiques-albums" class="section-inner">
				
					<div class="section-content-c">
						
						<?php
							
							$top_args = array(
								'posts_per_page' => 18,
								'post_type' => 'records',
								'orderby' => 'rand'
							);
							
							$top_query = new WP_Query($top_args);
							
							$posts_array = $top_query->posts;
							?>
								<ul class="section-content--has-6-columns">
							<?php
								foreach( $posts_array as $post ){
								
									setup_postdata( $post );
																	
									include( locate_template( '/template-parts/modules/element-album.php', false, false ) ); 
											
								}

								?>
								</ul>
							<?php
								wp_reset_postdata();								
							
						?>			
					</div>
					
				</div>
			</section>
<?php */ ?>	
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
