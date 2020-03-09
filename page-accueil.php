<?php

/*
	Template name: Accueil
*/

get_header();


$critiques_dalbums = my_translate_object_id( 11680, 'page' );
$interviews = my_translate_object_id( 11684, 'page' );
//my_translate_object_id( $object_id, $type )


?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
				$from = strtotime("2020-02-19");
				$to = strtotime("2020-03-08");
				$to_day = date("Y-m-d");
				$today = strtotime($to_day);
				
				if( $from < $today && $to > $today ):
					
			?>
			
				<section class="publicite publicite-banniere" style="padding-bottom: 60px;">
					<a href="https://www.analekta.com/" target="_blank">
						<img src="https://panm360.com/wp-content/uploads/2020/02/Analekta_banniere.jpg" width="728" height="90" alt="publicite"/>
					</a> 
				</section>
	
			<?php endif; ?>
			
			
						
			<?php the_content(); ?>

			<section class="section">
				<div id="critiques-albums" class="section-inner">
					
					<div class="section-content ">
						
						<div class="section-content--main">
							
							<div class="section--element">
																
								<h4 class="section-titre"><span><?php _e('Interviews','panm360'); ?></span> <a href="<?php echo get_permalink( $interviews );?>"><svg class="icone"><use xlink:href="#fleche-lien"></use></svg></a></h4>
								
								<?php
									
									$interviews_args = array(
										'post_type' => 'interviews',
										'posts_per_page' => 3,
										'post_status' => array('publish'),
										'orderby' => 'date',
										'order' => 'DESC'
									);
									
									$interviews_query = new WP_Query($interviews_args);
									$interviews = $interviews_query->posts;
									$interview = array_shift($interviews);
								?>
								
								
								<?php
								$post_id = $interview->ID;
									if( !$image_src ){
										$image_src = get_template_directory_uri()."/assets/img/default/sample-album.png";
									}
									
									include( locate_template( '/template-parts/modules/element-main.php', false, false ) );
									
								?>
								
								<?php
								
								if( count($interviews) > 0 ): ?>	
								<ul class="content-list-articles--max-2-cols">
									
									<?php

										foreach( $interviews as $interview ){
											
											$post_id = $interview->ID;

									
											if( !$image_src ){
												$image_src = get_template_directory_uri()."/assets/img/default/sample-album.png";
											}
									?>
										<li>
											<?php include( locate_template( '/template-parts/modules/element-article.php', false, false ) ); ?>
										</li>									
									<?php		
										}
										
									?>

								</ul>
								<?php endif; ?>
								
								
							</div><!-- section--element -->
							
							
							<div class="section--element">
								<h4 class="section-titre"><span><?php _e('Critiques d\'albums','panm360'); ?></span> <a href="<?php echo get_permalink( $critiques_dalbums );?>"><svg class="icone"><use xlink:href="#fleche-lien"></use></svg></a></h4>
								
								<ul class="section-list-albums">
								<?php
									$albums_count = 24;	
									
									$args = array(
										'post_type' => 'records',
										'posts_per_page' => $albums_count,
										'post_status' => array('publish'),
										'category__not_in' => array(969),
										'tag__not_in' => array(2512),
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
								
								<a href="<?php echo get_permalink( $critiques_dalbums );?>" class="bouton"><?php _e('Lire la suite','panm360'); ?></a>
								
							</div><!-- section--element -->
						</div> <!-- section-content--main -->
						
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
