<?php

/*
	Template name: Wow
*/

get_header();

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">			
			
			<article>
							
			<?php the_content(); ?>

			<section class="section">
				<div id="critiques-albums" class="section-inner">
					
					<div class="section-content ">
						
						<div class="section-content--main">
							
							
							<div class="section--element">
								<h4 id="albums-wow--title" class="section-titre lang-<?php echo ICL_LANGUAGE_CODE;?>">
									<?php if( ICL_LANGUAGE_CODE == 'fr' ): ?>
										<span>Albums</span> <img src="<?php echo get_template_directory_uri(  ) ;?>/assets/img/wow.svg"  width="151px" height="53px"  alt="wow" />
									<?php else: ?>
										<img src="<?php echo get_template_directory_uri(  ) ;?>/assets/img/wow.svg"  width="151px" height="53px"  alt="wow" /> <span>Albums</span>
									<?php endif; ?>
								</h4>	
								<ul class="section-list-albums">
								<?php
									
									$albums_paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
									$albums_count = 36;	
									
									$args = array(
										'post_type' => 'records',
										'posts_per_page' => $albums_count,
										'post_status' => array('publish'),
										'category__in' => array(5250,5255),
										'category__not_in' => array(969),
										'tag__not_in' => array(2512),
										'orderby' => 'date',	
										'order' => 'DESC',
										'paged' => $albums_paged,																
									);
									
									$albums = new WP_Query($args);
									
									while($albums->have_posts() ){
											$albums->the_post();
											
											include( locate_template( '/template-parts/modules/element-album.php', false, false ) );
										$albums_count--;
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
