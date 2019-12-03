<?php

/*
	Template name: Top 200
*/

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			
			
			<section class="section">
				<div id="critiques-albums" class="section-inner">
					<h4 class="section-titre"><span>Top 200</span> <a href="#"></a></h4>
					
					<div class="section-content ">
						
						<ul class="section-content--has-6-columns">
						<?php
							$albums_count = -1;	
							
							$args = array(
								'post_type' => 'records',
								'posts_per_page' => $albums_count,
								'post_status' => 'publish',
								'orderby' => 'name',
								'order' => 'ASC'
							);
							
							$albums = new WP_Query($args);
							
							while($albums->have_posts() ){
									$albums->the_post();
									
									include( locate_template( '/template-parts/modules/element-album.php', false, false ) );			
								$albums_count--;
							}
						?>
						</ul>					
					</div>
					
				</div>
			</section>

	
		</main><!-- #main -->
	</div><!-- #primary -->
	
	
	<?php //get_template_part( '/template-parts/publicites/publicite', 'banniere' ); ?>
	
	<?php //get_template_part( '/template-parts/modules/element', 'infolettre' ); ?>
	

<?php
get_footer();
