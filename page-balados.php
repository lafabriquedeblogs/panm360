<?php

/*
	Template name: Podcasts
*/

get_header();
$tax_query = query_var_genre();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			
			<?php while ( have_posts() ) :
				the_post(); ?>
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
				
				the_content();				
				endwhile; 
				wp_reset_query();
				
			?>
			<section class="section">
				<div id="critiques-albums" class="section-inner">
					<div class="section-content ">
						<div class="section-content--main">

							<div class="section--element margin-bottom-0">
								<?php
									$direct_link = false;
									$post_types = 'podcasts';
									include( locate_template( '/template-parts/modules/slider_genres.php', false, false ) );
								?>
							</div>
							
							<div class="section--element">
<!-- 								<h4 class="section-titre"><span><?php _e('Listes d\'écoutes','panm360'); ?></span> <a><svg class="icone"><use xlink:href="#fleche-lien"></use></svg></a></h4> -->
								
								
								<?php
									
									$albums_paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
									$albums_count = 36;	
									
									$args = array(
										'post_type' => 'podcasts',
										'posts_per_page' => $albums_count,
										'post_status' => array('publish'),
										'orderby' => 'date',	
										'order' => 'DESC',
										'paged' => $albums_paged,
										'tax_query' => $tax_query['tax']																
									);
									
									$albums = new WP_Query($args);
									
									if( $albums->have_posts() ):?>
									
									<ul class="section-list-albums">
									<?php
										while($albums->have_posts() ){
												$albums->the_post();
												
												include( locate_template( '/template-parts/modules/element-album.php', false, false ) );
											//$albums_count--;
										}
									?>
									</ul>
									
									<?php
										
										else:
										
										echo_no_genre_found($genre);
										
										endif;//have_posts
										
									?>
								
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
							

							<?php //include( locate_template( '/template-parts/modules/sections.php', false, false ) ); ?>

								
						</div> <!-- section-content--main -->
						
						<div class="aside-content">
							<?php include( locate_template( '/template-parts/modules/agenda-mini.php', false, false ) );?>
							<?php //get_template_part( '/template-parts/publicites/publicite', 'ilot' ); ?>
							
						</div><!-- .aside-content -->
						
					</div>
					
				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
