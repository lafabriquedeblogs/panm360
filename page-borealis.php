<?php

/*
	Template name: Borealis
*/

get_header();

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">			
			
			<article>
			<?php /**/ ?>	
			<div id="wrap-square-featured-slider">
				<ul id="square-featured-slider">
					<?php
				
						$args = array(
							'post_type' => 'records',
							'posts_per_page' => 15,
							'post_status' => array('publish'),
							'tax_query' => array(
								'relation' => 'OR',
								array(
									'taxonomy' => 'pays',
									'field'    => 'slug',
									'terms'    => 'canada'
								),
								array(
									'taxonomy' => 'pays',
									'field'    => 'slug',
									'terms'    => 'quebec'
								),
								array(
									'taxonomy' => 'pays',
									'field'    => 'slug',
									'terms'    => 'canadaquebec'
								),
							),
							'orderby' => 'date',	
							'order' => 'DESC',
						);
						
						$albums_query = new WP_Query($args);
						$albums = $albums_query->posts;
						foreach( $albums as $item ){
							include( locate_template( '/template-parts/modules/element-slider-square.php', false, false ) );
						}
					?>
				</ul><!-- new-featured-slider -->
			</div><!-- wrap-new-featured-slider -->
			<?php /**/ ?>						
			

			<section class="section">
				<div id="critiques-albums" class="section-inner">
					
					<div class="section-content ">
						
						<div class="section-content--main">
							
							
							<div class="section--element">
								<h4 class="section-titre"><span><?php _e('Borealis','panm360'); ?></span> <a href="#"><svg class="icone"><use xlink:href="#fleche-lien"></use></svg></a></h4>

								<?php the_content(); ?>
								
								<ul class="section-list-albums">
								<?php
									
									$albums_paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
									$albums_count = 36;	
									
									$args = array(
										'post_type' => 'records',
										'posts_per_page' => $albums_count,
										'post_status' => array('publish'),
										//'category__not_in' => array(969),
										//'tag__not_in' => array(2512),
										'tax_query' => array(
											'relation' => 'OR',
											array(
												'taxonomy' => 'pays',
												'field'    => 'slug',
												'terms'    => 'canada'
											),
											array(
												'taxonomy' => 'pays',
												'field'    => 'slug',
												'terms'    => 'quebec'
											),
											array(
												'taxonomy' => 'pays',
												'field'    => 'slug',
												'terms'    => 'canadaquebec'
											),
										),
										'orderby' => 'date',	
										'order' => 'DESC',
										'paged' => $albums_paged,																
									);
									
									$albums = new WP_Query($args);
									
									while($albums->have_posts() ){
											$albums->the_post();
											
											include( locate_template( '/template-parts/modules/element-album.php', false, false ) );
										//$albums_count--;
									}
								?>
								</ul>
								
								<?php /* ?>
								<div id="loading-infinite">
									<!-- <button class="view-more-button"><?php _e('+ d\'albums','panm360'); ?></button> -->
									<p><?php _e('Chargement de + d\'album','panm360'); ?>s</p>
									<div class="lds-ring hide"><div></div><div></div><div></div><div></div></div>
								</div>
								<?php */ ?>
								
								<?php /**/ ?>	
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
								<?php /**/ ?>
														
								<?php wp_reset_postdata(); ?>
								
							</div><!-- section--element -->
						</div> <!-- section-content--main -->
						
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
			

		</article>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
