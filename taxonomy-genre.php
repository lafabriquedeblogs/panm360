<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package panm360
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="section">
				<div class="section-inner">
				
					<div class="section-content">
						
						<div class="section-content--main">
							<ul class="section-content--has-4-columns">
						<?php
							
							while ( have_posts() ) :
								the_post();
								$posts_count = '';
								/*
								 * Include the Post-Type-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
								 */
								include( locate_template( '/template-parts/modules/element-album.php', false, false ) );
							
							endwhile;
														
						?>
							</ul>
							<div><?php the_posts_navigation(); ?></div>
						</div>
						<div class="aside-content">
							<div class="title-calendrier">
								<h2>CALENDRIER <span>DES CONCERTS</span></h2>
							</div>
							<ul>
								<?php
								$albums_count = 8;	
								while( $albums_count > 0 ){
										$artiste = 'Nom de l\'Artiste';
										include( locate_template( '/template-parts/modules/element-aside-calendrier.php', false, false ) );		
									$albums_count--;
								}
								?>
							</ul>	
							<a href="" class="plus-de">PLUS DE CONCERTS <svg class="icone"><use xlink:href="#fleche-lien"></use></svg></a>
							
							<?php get_template_part( '/template-parts/publicites/publicite', 'ilot' ); ?>
							
							<h3>Listes d'écoutes</h3>
							<ul>
							<?php
								$liste_ecoutes_count = 5;	
								while( $liste_ecoutes_count > 0 ){
										get_template_part( '/template-parts/modules/element', 'aside' );		
									$liste_ecoutes_count--;
								}
							?>	
								
							</ul>
							
						</div>
						
					</div>
					
				</div>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
