<?php

/*
	Template name: Generic
*/

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			
			<?php while ( have_posts() ) : the_post(); ?>
			
					<header class="entry-header section">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header>
						
			<?php
					
					$display_categories = get_field('choisir_une_categorie');
					the_content();			
				
				endwhile; 
				wp_reset_query();
				
			?>
			
			<section class="section">
				<div id="critiques-albums" class="section-inner">
					<div class="section-content ">
						<div class="section-content--main">
							<div class="section--element">
								
								<?php
									
									$regarder_args = array(
										'post_type' => array('post','page'),
										'category__in' => $display_categories,
										'posts_per_page' => 1,
										'post_status' => array('publish'),
										'orderby' => 'date',
										'order' => 'DESC'
									);
									
									$article = new WP_Query($regarder_args);
									$regarder = $article->posts;
									//$article = array_shift($regarder);
									
									while ( $article->have_posts() ) :
										$article->the_post();
											include( locate_template( '/template-parts/modules/element-main.php', false, false ) );
									endwhile;
									wp_reset_query() ;
								?>
								
								<?php if( count($regarder) > 0 ):
									
									$regarder_args_suite = array(
										'post_type' => 'post',
										'category__in' => $display_categories,
										'posts_per_page' => 24,
										'offset' => 1,
										'post_status' => array('publish'),
										'orderby' => 'date',
										'order' => 'DESC'
									);
									
									$articles = new WP_Query($regarder_args_suite);
									
								?>	
								<ul class="content-list-articles--max-2-cols">
									
									<?php
										while( $articles->have_posts() ){
											$articles->the_post();
										//foreach( $regarder as $article ){
									?>
										<li>
											<?php include( locate_template( '/template-parts/modules/element-article.php', false, false ) ); ?>
										</li>									
									<?php		
										}
										wp_reset_query(  );
									?>

								</ul>
								<?php endif; ?>
								
								
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
