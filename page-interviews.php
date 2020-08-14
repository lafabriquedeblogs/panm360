<?php

/*
	Template name: Interviews
*/

get_header();


$tax_query = query_var_genre();

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<header class="entry-header section">
				<h1 class="entry-title"><?php the_title(); ?>
				
									<?php
										if( $tax_query ):
											$term = get_term( $tax_query['genre'], 'genre');
											echo '<span class="sub-genre light">'.$term->name.'</span>';	
										endif;
									?>				
				</h1>
			</header>
						
			<?php
				
				while( have_posts()): the_post();
					
					the_content();
				
				endwhile;	
			
			?>

			<section class="section">
				<div id="critiques-albums" class="section-inner">
					
					
					<div class="section-content ">
						<div class="section-content--main">
							
							<div class="section--element margin-bottom-0">
								<?php
									$direct_link = false;
									$post_types = 'interviews';
									include( locate_template( '/template-parts/modules/slider_genres.php', false, false ) );
								
								?>
							</div>
							
							<div class="section--element">
																
								<?php /*<h4 class="section-titre"><span><?php _e('Interviews','panm360'); ?></span> <a href="<?php echo get_permalink( $interviews );?>"><svg class="icone"><use xlink:href="#fleche-lien"></use></svg></a></h4> */?>								
								<?php
																		
									$interviews_args = array(
										'post_type' => 'interviews',
										'posts_per_page' => -1,
										'post_status' => array('publish'),
										'tax_query' => $tax_query['tax'],										
										'orderby' => 'date',
										'order' => 'DESC'
									);
									
									$interviews_query = new WP_Query($interviews_args);
									$interviews = $interviews_query->posts;
									$article = array_shift($interviews);
									
									if( $interviews_query->have_posts()):
									include( locate_template( '/template-parts/modules/element-main.php', false, false ) );
									
								?>
								
								<?php if( count($interviews) > 0 ): ?>	
								<ul class="content-list-articles--max-2-cols">
									
									<?php

										foreach( $interviews as $article ){
									?>
										<li>
											<?php include( locate_template( '/template-parts/modules/element-article.php', false, false ) ); ?>
										</li>									
									<?php		
										}
										
									?>

								</ul>
								<?php endif; ?>
								
								<?php
									else: 
									
										echo_no_genre_found($genre);
									
									endif; //have_posts ?>
									
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
