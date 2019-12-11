<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<article>
			<header class="section">
				<h1 clas="entry-title"><span class="light">LABEL : <?php echo single_cat_title( '', false ); ?></span></h1>
			</header>
			<section class="section">
				<div class="section-inner">
				
					<div class="section-content">
						
							<ul class="section-content--main">
								<?php
									
									while ( have_posts() ) :
										the_post();
										$posts_count = '';
										include( locate_template( '/template-parts/modules/element-album.php', false, false ) );
									endwhile;
																
								?>
								<li id="pages-liste-navigation" ><?php the_posts_navigation(); ?></li>
							</ul>
							
						
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
			
			</article>
			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
