<?php

/*
	Template name: Accueil
*/

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			
			<?php the_content(); ?>
			
			<?php
				
				if( have_rows('slide') ){
					?>
			<div id="wrap-new-featured-slider">
				<ul id="new-featured-slider">					
					<?php
					while( have_rows('slide') ){
						the_row();
						$titre = get_sub_field('titre');
						$soustitre = get_sub_field( 'sous_titre' );
						$image_data = get_sub_field( 'image' );
						$content = get_sub_field( 'texte' );
						$cta = get_sub_field( 'bouton' );
						$cta_texte = $cta['titre'];
						$cta_lien = $cta['lien'];
						?>
						
						<li class="new-featured-slider--slide element">
							<div class="new-featured-slider--slide--row">
								
								<div class="new-featured-slider--slide--content">
									<div class="slide-content">
<!-- 										<span class="genre"><a href="#">INTERVIEW</a> / <a href="">JAZZ - BOSSA NOVA</a></span> -->
										<h2 class="element-title"><?php echo $titre;?></h2>
										<h3 class="sub-title"><?php echo $soustitre;?></h3>
										<p class="excerpt"><?php echo $content;?></p>
<!-- 									<p class="author">par: <a href="">Alain Brunet</a></p> -->
									</div>
								</div>
								
								<div class="new-featured-slider--slide--picture" style="background-image:url('<?php echo get_template_directory_uri(); ?>/src/img/image-featured-home-slider-dev.png'); background-size: cover;background-repeat: no-repeat; background-position: center center;">
									<img src="<?php echo get_template_directory_uri(); ?>/src/img/image-featured-home-slider-dev.png"  class="hidden" alt="title"/>
								</div>
							</div><!-- new-featured-slider--slide--row -->
						</li><!-- new-featured-slider--slide -->
						
						<?php
					}
					?>
				</ul><!-- new-featured-slider -->
			</div><!-- wrap-new-featured-slider -->						
					<?php
				}
				
			?>
			
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
							<?php
								$count = 8;
								$start = date('Y/m/d');
								$end = '2020/06/30';

								$agenda_full_id = apply_filters( 'wpml_object_id', 6944, 'page', TRUE  );
								$agenda_full_permalien = get_permalink( $agenda_full_id );
								
								$year = date('Y');
								$month =  date('m');
								$nonce = wp_create_nonce("my_user_like_nonce");
															
								$post_start = 1;

								$timeout = false;
								$today_timestamp = strtotime($start);
								
								$calendrier = get_liste_concerts( $start, $end , $count );
							?>
								
									
									<div class="title-calendrier">
										<h2>Agenda <span class="bold">360</span></h2>
										<form id="choix-style-musical">
											<div class="select-light">
												<select id="agenda-genre">
													<?php $genres = get_main_genres( false ); ?>
													<?php foreach( $genres as $genre): ?>
														<option value="<?php echo $genre['id'];?>"><?php echo $genre['name'];?></option>
													<?php endforeach; ?>
												</select>
												<input type="hidden" id="agenda-start" value="<?php echo $start;?>"/>
												<input type="hidden" id="agenda-year" value="<?php echo $year;?>"/>
												<input type="hidden" id="agenda-month" value="<?php echo $month;?>"/>
												<input type="hidden" id="agenda-nonce" value="<?php echo $nonce;?>"/>
												<input type="hidden" id="agenda-count" value="<?php echo $count;?>"/>
											</div>
										</form>
									</div>
									
									<a href="<?php echo $agenda_full_permalien;?>" class="plus-de"><?php _e('Voir l\'agenda complet','panm360'); ?> <svg class="icone"><use xlink:href="#fleche-lien"></use></svg></a>	
									
									<div id="agenda_mini">
										<ul class="calendrier-ul-container">
											<?php
										
											if( count($calendrier) > 0 ):
											
											foreach( $calendrier as $_date => $items ){
												foreach( $items as $item ){
										
													if( $post_start > $count ) break;
													
													$post_start++;
														
													include( locate_template( '/template-parts/modules/element-item-calendrier.php', false, false ) );
														
												}
											}
											
											else:
											?>
												<li class="no-result">
													<h3><?php _e('Aucun résultat','panm360'); ?></h3>
												</li>
											<?php
											endif;
											?>
										</ul>
									</div><!-- agenda_mini -->
							<?php //get_template_part( '/template-parts/publicites/publicite', 'ilot' ); ?>
							
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
