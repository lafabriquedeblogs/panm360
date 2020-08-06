<?php

/*
	Template name: Lire
*/

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<article>
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
								$count = 12;
								$start = date('Y/m/d');
								$end = date('Y/m/d', strtotime($start. ' + 15 days'));
								
								include( locate_template( '/template-parts/modules/agenda-mini.php', false, false ) );
							?>
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
