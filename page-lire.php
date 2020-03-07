<?php

/*
	Template name: Lire
*/

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<article>

			<?php
				$from = strtotime("2020-02-17");
				$to = strtotime("2020-02-23");
				$to_day = date("Y-m-d");
				$today = strtotime($to_day);
				
				if( $from < $today && $to > $today && is_page( array( 2691 , 5750 ))):
					
			?>
				<section class="publicite publicite-banniere">
					<a href="https://sixmedia.ca/" target="_blank">
						<img src="https://panm360.com/wp-content/uploads/2020/02/728X90.jpg" width="728" height="90" alt="publicite"/>
					</a> 
				</section>
	
			<?php endif; ?>

	
				<header class="entry-header section">
					<h1 class="entry-title has-text-align-center"><?php the_title(); ?></h1>
				</header>
			
				<div class="entry-content">
					<?php the_content();?>
			
					<section class="section">
						<div id="critiques-albums" class="section-content">

						<div class="section-content--main">
							
							
							<div class="section--element">
								<h4 class="section-titre"><span><?php _e('Critiques d\'albums','panm360'); ?></span> <a href="#"><svg class="icone"><use xlink:href="#fleche-lien"></use></svg></a></h4>
								
								<ul class="section-list-albums">
								<?php
									
									$albums_paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
									$albums_count = 24;	
									
									$args = array(
										'post_type' => 'records',
										'posts_per_page' => $albums_count,
										'post_status' => array('publish'),
										'category__not_in' => array(969),
										'tag__not_in' => array(2512),
										'orderby' => 'date',
										'order' => 'DESC',
										'paged' => $albums_paged																
									);
									
									$albums = new WP_Query($args);
									
									while($albums->have_posts() ){
											$albums->the_post();
											
											include( locate_template( '/template-parts/modules/element-album.php', false, false ) );
										//$albums_count--;
									}
								?>
								</ul>
	
								<div id="pages-liste-navigation">
									<nav class="navigation pagination" role="navigation" aria-label="Publications">
										<div class="nav-links">
										     <?php
										     $big = 999999999;
										     echo paginate_links( array(
										          'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
										          'format' => '?paged=%#%',
										          'current' => max( 1, get_query_var('paged') ),
										          'total' => $albums->max_num_pages,
										          'prev_text' => '&laquo;',
										          'next_text' => '&raquo;'
										     ) );
										?>
										</div>
									</nav>
								</div><!-- pages-liste-navigation -->						
								<?php wp_reset_postdata(); ?>
								
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
					</section>
					<?php /* ?>
					
					
					<section class="section">
						<div id="interviews" class="section-inner">
							<h4 class="section-titre"><span>Interviews</span> <a href="#"><svg class="icone"><use xlink:href="#fleche-lien"></use></svg></a></h4>
							
							<div class="section-content ">
								
								<div class="section-content--main">
								<?php get_template_part( '/template-parts/modules/element', 'main' ); ?>
								</div>
								
								<ul class="aside-content">
									<?php
									$albums_count = 3;	
									while( $albums_count > 0 ){
											get_template_part( '/template-parts/modules/element', 'aside' );		
										$albums_count--;
									}
								?>	
								</ul>
								
							</div>
							
						</div>
					</section>
					
								
					<section class="section">
						<div id="panam-at-sat" class="section-inner">
							<h4 class="section-titre"><span>Panm@Sat</span> <a href="#"><svg class="icone"><use xlink:href="#fleche-lien"></use></svg></a></h4>
							<div class="section-content">
								<div class="section-content--has-3-columns">
								<?php
									$albums_count = 3;	
									while( $albums_count > 0 ){
											get_template_part( '/template-parts/modules/element', 'article' );		
										$albums_count--;
									}
								?>							
								</div>
							</div>
						</div>
					</section>
					
					
					<section class="section">
						<div id="critiques-concerts" class="section-inner">
							<h4 class="section-titre"><span>CRITIQUEs DE CONCERTs</span> <a href="#"><svg class="icone"><use xlink:href="#fleche-lien"></use></svg></a></h4>
							
							<div class="section-content ">
								
								<div class="section-content--main">
								<?php get_template_part( '/template-parts/modules/element', 'main' ); ?>
								</div>
								
								<div class="aside-content">
									<?php
									$albums_count = 3;	
									while( $albums_count > 0 ){
											get_template_part( '/template-parts/modules/element', 'aside' );		
										$albums_count--;
									}
								?>	
								</div>
								
							</div>
							
						</div>
					</section>
					
					
					<section class="section">
						<div id="chroniques" class="section-inner">
							<h4 class="section-titre"><span>Chroniques</span> <a href="#"><svg class="icone"><use xlink:href="#fleche-lien"></use></svg></a></h4>
							<div class="section-content">
								<div class="section-content--has-4-columns">
								<?php
									$albums_count = 4;	
									while( $albums_count > 0 ){
											get_template_part( '/template-parts/modules/element', 'article' );		
										$albums_count--;
									}
								?>							
								</div>						
							</div>
						</div>
					</section>
					
					<section class="section">
						<div id="apprendre" class="section-inner">
							<h4 class="section-titre"><span>Apprendre</span> <a href="#"><svg class="icone"><use xlink:href="#fleche-lien"></use></svg></a></h4>
							<div class="section-content">
								<div class="section-content--has-4-columns">
								<?php
									$albums_count = 4;	
									while( $albums_count > 0 ){
											get_template_part( '/template-parts/modules/element', 'article' );		
										$albums_count--;
									}
								?>							
								</div>						
							</div>
						</div>
					</section>	
	<?php */ ?>
			</div><!-- .entry-content -->



			</article>
		</main><!-- #main -->
	</div><!-- #primary -->	

<?php
get_footer();
