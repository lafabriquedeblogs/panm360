<?php

/*
	Template name: Accueil
*/

get_header();

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
						
			<?php
				
				the_content();
				

			?>

			<section class="section">
				<div class="section-inner">
					
					<div class="section-content">
						
						<div class="section-content--main">
							
							<?php
								$page_titre = "Interviews";
								$page_id = my_translate_object_id( 11684, 'page' );
								$post_type = array('interviews');
								$posts_per_page = 3;
								include( locate_template( '/template-parts/modules/section-element-custom.php', false, false ) );
							
							?>

							<?php
								
								$page_id = my_translate_object_id( 2700, 'page' );
								$post_type = array('post','page');
								$display_categories = array(280);
								$posts_per_page = 2;
								$page_titre = "Regarder";
								include( locate_template( '/template-parts/modules/section-element-category.php', false, false ) );
							
							?>
							
							<?php
								
								$page_id = my_translate_object_id( 11680, 'page' );
								$post_type = array('records');
								$posts_per_page = 24;
								$page_titre = "Critiques d\'albums";
								$category__not_in = array(969);// top360
								$tag__not_in = array(2512);//top360
								
								include( locate_template( '/template-parts/modules/section-element-albums.php', false, false ) );
							
							?>						
							

						
						<div class="aside-content">
							<?php
								$count = 8;
								$start = date('Y/m/d');
								$end = '2020/06/30';
								
								$year = date('Y');
								$month =  date('m');
								$nonce = wp_create_nonce("my_user_like_nonce");
															
								$post_start = 1;

								$timeout = false;
								$today_timestamp = strtotime($start);
								
								$calendrier = get_liste_concerts( $start, $end , $count );
							?>
								
									
									<div class="title-calendrier">
										<h2><?php _e('Agenda','panm360'); ?> <span class="bold">360</span></h2>
										<form id="choix-style-musical">
											<div class="select-light">
												<select id="agenda-genre">
													<option value="0"><?php _e('Style musical','panm360'); ?></option>
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
											<div class="loader-filtre-genre"><div></div><div></div><div></div></div>
										</form>
										
									</div>
									
									<?php lien_agenda_complet(); ?>									

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
