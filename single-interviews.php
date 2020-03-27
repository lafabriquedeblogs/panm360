<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
			
			while ( have_posts() ) : the_post(); 
				$page_id = get_the_id();
				$artiste = get_artiste( $page_id , false );
				//$image_data =  get_field('image');
				$image = get_the_post_thumbnail_url( get_the_id(),'medium_large' );//$image_data['sizes']['medium_large'];
				$introduction_presentation = get_field('lead');
				$author = get_the_author();
		?>

			<div id="header_interview">
				
				<div class="portrait"
						style="background-image: url('<?php echo $image;?>');background-size:cover; background-repeat: no-repeat;background-position: center center;"
				>
					<img src="<?php echo $image;?>" />
				</div>
				<div class="interview-header">
					<div class="has-text-align-left">
						<?php echo lien_page_interviews(); ?>
					</div>
					<h1><?php the_title(); ?></h1>
					<span class="author"><?php _e('Interview réalisé par','panm360'); ?> <?php echo $author;?></span>
					<div class="lead"><?php echo $introduction_presentation;?></div>
				</div>
			</div><!-- wrap-new-featured-slider -->	
					
		<article id="post-<?php the_ID(); ?>" <?php post_class(""); ?>>
			<div class="wp-block-columns panm-columns-1 contenu-abonne">

				<div class="wp-block-column">
					
					<div class="addthis_inline_share_toolbox"></div>
					
					<h4><?php _e('renseignements supplémentaires','panm360'); ?></h4>
						<?php
							
							if( iam_admin() && get_current_user_id()  == 4 ){
								echo '<pre>';
									var_dump($page_id);
									var_dump( get_field('informations_supplementaires_yeah_0_code'));
								echo '</pre>';
							}
							
							if( have_rows('informations_supplementaires', $page_id ) ):
							
								   // Loop through rows.
								   while ( have_rows('informations_supplementaires', $page_id ) ) : the_row();
							
									   // Case: Paragraph layout.
									   if( get_row_layout() == 'evenements_passes_et_a_venir' ):
										   $evenements_passes_et_a_venir = get_sub_field('evenements_passes_et_a_venir');
										   $titre = $evenements_passes_et_a_venir['titre'];
										   $agendas = $evenements_passes_et_a_venir['selectionner_un_agenda'];
										   $agendas_count = count($agendas);
										   
										   if( $agendas_count >= 1 ): 
										   
										   
									   ?>
									   	<h4 class="bleu"><?php echo $titre;?></h4>
									   <?php	
										$agendas_count = count($agendas);	
											
											$args = array(
												'post_type' => 'agenda',
												'posts_per_page' => $agendas_count,
												'post_status' => 'publish',
												'post__in' => $agendas
												
											);
											
											$list_agendas = new WP_Query($args);
											$elements = array();
											
											
											while( $list_agendas->have_posts() ):
												$list_agendas->the_post();
										
												$agenda_id = get_the_id();
												
												$titre = get_the_title( $agenda_id );
												$genres = get_genre_parents( $agenda_id , false );
												
												$ville =  get_ville( $agenda_id );
												$salle = get_salle( $agenda_id );
												
												$dates_data = get_field('dates', $agenda_id);
											
												
												
												$dates_str = $dates_data[0]['date_concert'];
												$date = str_replace('/', '-', $dates_str);
												$date =	 date('Y-m-d', strtotime($date));
												$timestamp = strtotime($date);
												
												$date = date_i18n('D \<\s\p\a\n \c\l\a\s\s\=\"\m\e\d\i\u\m\"\>d M\<\/\s\p\a\n\> Y', $timestamp);
												
												$heure = get_time_concert( $agenda_id, date_i18n('Ymd', $timestamp) );
												
												$prix = get_field('prix',$agenda_id );
												$informations_supplementaires = get_field( 'informations_supplementaires' , $agenda_id );
												
												$agenda_commente = get_field('agenda_commente',$agenda_id);
												$permalien = get_permalink( $agenda_id );
												
												ob_start();
										?>
										
											<li class="aside-item-calendrier element">
													<div class="detail <?php if( $agenda_commente ): ?>agenda-commente<?php endif; ?>">
														<span class="date"><?php echo $date;?> • <?php echo $heure;?></span>
														<!-- <span class="genre album-genre element-genre"><?php echo $genres?></span> -->
														<span class="element-title"><?php echo $titre?></span>
														<?php if( $informations_supplementaires ): ?>
															<span class="element-infos-supp"><?php echo implode(', ', $informations_supplementaires );?></span>
														<?php endif; ?>
														<span class="element-location"><span class="medium"><?php echo $salle;?></span> - <?php echo $ville?></span>
														<!-- <span class="element-prix"><?php echo $prix['montant'];?></span> -->
													</div>
											
													
													<?php if( $agenda_commente ): ?>
													<a href="<?php echo $permalien;?>" class="link-vignette"><svg class="icon bleu"><use xlink:href="#plus_cercle"></use></svg></a>
													<?php endif; ?>
											</li>			
										<?php	
												$li = ob_get_clean();
												$elements[$timestamp] = $li;
												$agendas_count--;
											
											endwhile;
											
											wp_reset_query();
											
											ksort($elements);
											
											echo '<ul id="'.$id.'" class="single-agenda-list">';
											
											foreach( $elements as $element ){
												echo $element;
											}
											
											echo '</ul> <!--single-agenda-list-->';
										
										endif;//$agendas_count > 1
										
									   // Case: Download layout.
									   elseif( get_row_layout() == 'lecteur_audio_bandcampspotify' ): 
										   
										   $lecteurs = get_sub_field('lecteur');
										  
										  foreach( $lecteurs as $lecteur ):
									?>
										<div class="wp-block-group">
											<div class="wp-block-group__inner-container">
												<?php echo $lecteur;?>
											</div>
										</div>									
									<?php
										endforeach;
										
									   // Case: Download layout.
									   elseif( get_row_layout() == 'albums' ): 
										 
										$titre = get_sub_field('titre');
										$albums_panm_360 = get_sub_field('albums_panm_360');
										$albums_panm_360 = $albums_panm_360["selectionner_un_album"];
										
										$lecteurs_audios = get_sub_field('lecteur_audio');
										
										$albums_lecteurs = array_merge($albums_panm_360, $lecteurs_audios);
										
										if( count($albums_lecteurs) >= 1 ):
										?>
										
										<h4 class="bleu"><?php echo $titre;?></h4>
										
										<?php
											$albums_count = count($albums_panm_360);	
											$args = array(
													'post_type' => 'records',
														'posts_per_page' => $albums_count,
														'post_status' => 'publish',
														'post__in' => $albums_panm_360
													);
													
													$albums = new WP_Query($args);
													
													echo '<ul id="'.$id.'" class="single-album-list">';
													
													while($albums->have_posts() ){
															$albums->the_post();
															
															include( locate_template( '/template-parts/modules/element-album.php', false, false ) );			
														$albums_count--;
													}
													wp_reset_postdata();
													echo '</ul> <!--single-album-list-->';										 

											
											foreach( $lecteurs_audios as $lecteur ){
												?>
													<div class="wp-block-group">
														<div class="wp-block-group__inner-container">
															<?php echo $lecteur["lecteur"]["code"];?>
														</div>
													</div>									
												<?php
											}
																			  
										endif;//count($albums_lecteurs) >= 1
										
										
									 
									   // Case: Download layout.
									   elseif( get_row_layout() == 'contenu_riche' ): 
										   $titre = get_sub_field('titre');
										   $contenu_riche = get_sub_field('contenu_riche');
											?>
										
											<h4 class="bleu"><?php echo $titre;?></h4>
											<div class="contenu_riche">
												<?php echo $contenu_riche;?>
											</div>
										   <?php
   										  							
									   endif;
							
								   // End loop.
								   endwhile;
							
							// No value.
							else :
								   // Do something...
							endif;
					?>
					
							
				</div><!-- wp-block-column -->
			
				<div class="wp-block-column">
					<?php the_content();?>
				</div><!-- wp-block-column -->
			
			</div><!-- wp-block-columns -->		
		</article><!-- #post-<?php the_ID(); ?> -->

		<?php endwhile; ?>

		<section class="section">
			<div class="section-inner">
					<ul class="section-content--has-6-columns">
						<?php
							$albums_count = 12;	
						
							$args = array(
								'post_type' => 'records',
								'posts_per_page' => $albums_count,
								'post_status' => 'publish',
								'orderby' => 'date',
							);
							
							$albums = new WP_Query($args);
							
							while($albums->have_posts() ){
									$albums->the_post();
									
									include( locate_template( '/template-parts/modules/element-album.php', false, false ) );			
								$albums_count--;
							}
						?>
					</ul>
			</div>
		</section>
			
		<!-- 	</div> -->			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
