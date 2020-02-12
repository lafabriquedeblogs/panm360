<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">


		
		<article id="post-<?php the_ID(); ?>" <?php post_class("post-agenda section"); ?>>
			
			<div class="album-cover">
				<div class="lp-cover">
					<?php panm360_post_thumbnail(); ?>
				</div>
								
				<!-- Go to www.addthis.com/dashboard to customize your tools -->
				<div class="addthis_inline_share_toolbox"></div>
				
				<?php
					/**/
					$am_start = date('Y/m/d');
					$am_end = '2020/06/30';
									
					$am_year = date('Y');
					$am_month =  date('m');
					//$nonce = wp_create_nonce("my_user_like_nonce");
												
					$post_start = 1;
				
					$timeout = false;
					$today_timestamp = strtotime($am_start);
					
					$count = 5;
					
					$calendrier = get_liste_concerts( $am_start, $am_end , $count, false );
					
				?>

				<div class="single-agenda--agenda-mini">
					
					<div class="title-calendrier">
						<h2><?php _e('Agenda','panm360'); ?> <span class="bold">360</span></h2>
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
					</div><!-- #agenda_mini -->
				</div>				
			<?php /**/ ?>	
			</div>
		<?php
			
			while ( have_posts() ) : the_post(); 
			
				$post_id = get_the_id();
				$_genres_raw = get_genre($post_id, false,true);
				$label = get_label($post_id);

				$_genres = array();
				
				foreach( $_genres_raw as $_genre ){
					$_genres[] = $_genre->name;
				}
	
				$auteur_id = get_the_author_meta('ID');
				$auteur = get_the_author_meta('display_name');
				$auteur_link =  get_author_posts_url($auteur_id) ;

				$ville =  get_ville( $post_id );
				$salle = get_salle( $post_id );
				
				$dates_arrays = get_field('dates', $post_id);
				$single_dates = array();
				foreach( $dates_arrays as $date ){
					
					$ddate = str_replace('/', '-', $date['date_concert']);
					$jour = date_i18n('D\&\n\b\s\p\;\<\s\p\a\n \c\l\a\s\s\=\"\b\o\l\d\"\>d\&\n\b\s\p\;M\<\/\s\p\a\n\>\&\n\b\s\p\;Y', strtotime($ddate));
					
					if( !empty($jour) && !empty($date['heure_concert'])){
						$single_dates[] = $jour.'&nbsp;•&nbsp;'.$date['heure_concert'];
					}
					
				}				
				
				$prix = get_field('prix',$post_id );
				$single_informations_supplementaires = get_field( 'informations_supplementaires' , $post_id );

		?>			
			<div class="single-album-body">
				<header class="entry-header">
					<div>
						<?php lien_agenda_complet(); ?>
					</div>
					<?php the_title( '<h1 class="entry-title">', '</h1>' );?>
					<span class="single-agenda-infos-sup"><?php echo implode(', ', $single_informations_supplementaires );?></span>	
					<div class="single-agenda-date-genre">
						<span class="single-agenda-date"><?php echo implode(' / ', $single_dates );?></span>
						<span class="single-agenda-genre"><?php echo implode( ' / ', $_genres );?></span>
					</div>
					
					<div class="single-agenda-salle-prix">
						<span class="single-agenda-salle"><span class="medium"><?php echo $salle;?></span> - <?php echo $ville?></span>
						<span class="single-agenda-prix"><?php echo $prix['montant'];?></span>
					</div>
					
					<span class="author">· <?php _e('par','panm360'); ?> <a class="author-name" href="<?php echo $auteur_link;?>"><?php echo $auteur;?></a></span>
				</header><!-- .entry-header -->
				
				
				
				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->				
				<footer class="entry-footer">
					
					<?php panm360_entry_footer(); ?>
				</footer><!-- .entry-footer -->

			</div>
			
		<?php endwhile; ?>
		</article><!-- #post-<?php the_ID(); ?> -->
		
		<section class="section">
			<div class="section-inner">
					<ul class="section-content--has-6-columns">
					<?php
						$albums_count = 12;	
					
						$args = array(
							'post_type' => 'records',
							'posts_per_page' => $albums_count,
							'post_status' => 'publish',
							'orderby' => 'rand',
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
			
			</div>			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
