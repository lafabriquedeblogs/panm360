<?php

/*
	Template name: Accueil
*/

get_header();

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php include( locate_template( '/template-parts/publicites/accueil-top.php', false, false ) ); ?>
						
			<?php the_content();	?>

			<section class="section">
				<div class="section-inner">
					
					<div class="section-content">
						
						<div class="section-content--main">
							
							<!-- //slider_genres.php -->

							<?php
								$direct_link = 1;	
								include( locate_template( '/template-parts/modules/slider_genres.php', false, false ) );
							?>
							<?php include( locate_template( '/template-parts/modules/sections.php', false, false ) ); ?>
														
						</div><!-- section-content -->	
						
						<div class="aside-content">
							<?php include( locate_template( '/template-parts/modules/agenda-mini.php', false, false ) ); ?>
							
						</div><!-- .aside-content -->
						
					</div>
					
				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
