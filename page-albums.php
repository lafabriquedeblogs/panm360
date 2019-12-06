<?php

/*
	Template name: Albums
*/

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<article>
			<header class="section">
				<h1 clas="entry-title"><?php the_title(); ?></h1>
			</header>
			
			<section class="section">
				<div id="critiques-albums" class="section-inner">
<!-- 					<h4 class="section-titre"><span>Critiques d'albums</span> <a href="#"><svg class="icone"><use xlink:href="#fleche-lien"></use></svg></a></h4> -->
					
					<div class="section-content ">
						
						<ul class="section-content--main">
						<?php
							$albums_count = -1;	
							
							$args = array(
								'post_type' => 'records',
								'posts_per_page' => $albums_count,
								'post_status' => 'publish'
							);
							
							$albums = new WP_Query($args);
							
							while($albums->have_posts() ){
									$albums->the_post();
									
									include( locate_template( '/template-parts/modules/element-album.php', false, false ) );			
								$albums_count--;
							}
						?>
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
								$liste_ecoutes_count = 10;	
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
	
	
	<?php //get_template_part( '/template-parts/publicites/publicite', 'banniere' ); ?>
	
	<?php //get_template_part( '/template-parts/modules/element', 'infolettre' ); ?>
	

<?php
get_footer();
