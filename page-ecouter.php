<?php

/*
	Template name: Ecouter
*/

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			
			<?php while ( have_posts() ) :
				the_post(); ?>
					<header class="entry-header section">
						<h1 class="entry-title"><?php the_title(); ?></h1>
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

							<?php include( locate_template( '/template-parts/modules/sections.php', false, false ) ); ?>

								
						</div> <!-- section-content--main -->
						
						<div class="aside-content">
							<?php include( locate_template( '/template-parts/modules/agenda-mini.php', false, false ) ); ?>
							<?php //get_template_part( '/template-parts/publicites/publicite', 'ilot' ); ?>
							
						</div><!-- .aside-content -->
						
					</div>
					
				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
