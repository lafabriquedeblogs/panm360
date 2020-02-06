<?php

/*
	Template name: Accueil
*/

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		
			
			<section class="section">
				<div id="critiques-albums" class="section-inner">
					<h4 class="section-titre"><span>Critiques d'albums</span> <a href="#"><svg class="icone"><use xlink:href="#fleche-lien"></use></svg></a></h4>
					
					<div class="section-content ">
						
						<ul class="section-content--main">
						<?php
							$albums_count = 12;	
							
							$args = array(
								'post_type' => 'records',
								'posts_per_page' => $albums_count,
								'post_status' => 'publish',
								'orderby' => 'date',
								'order' => 'DESC'
							);
							
							$albums = new WP_Query($args);
							
							while($albums->have_posts() ){
									$albums->the_post();
									
									include( locate_template( '/template-parts/modules/element-album.php', false, false ) );			
								$albums_count--;
							}
						?>
						</ul>
						<div class="aside-content">
								<div class="title-calendrier">
									<h2>Agenda <span class="bold">360</span></h2>
									<form id="choix-style-musical">
										<div class="select-light">
											<select>
												<?php $genres = get_main_genres( false ); ?>
												<?php foreach( $genres as $genre): ?>
													<option value="<?php echo $genre['id'];?>"><?php echo $genre['name'];?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</form>
								</div>
								
																
								<?php
									$count = 8;
									$Agenda_start = '2020/01/01';
									$start = date('Y/m/d');
									$end = '2020/06/30';
									include( locate_template( '/template-parts/modules/element-aside-calendrier.php', false, false ) );
									$agenda_full_id = apply_filters( 'wpml_object_id', 6944, 'page', TRUE  );
									$agenda_full_permalien = get_permalink( $agenda_full_id );
								?>
														

							<?php get_template_part( '/template-parts/publicites/publicite', 'ilot' ); ?>
							
						</div>
						
					</div>
					
				</div>
			</section>

			
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
	
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
