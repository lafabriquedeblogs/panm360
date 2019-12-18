<?php

/*
	Template name: Visionner
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
				<div class="section-inner">
				
					<div class="section-content-c">
						<ul class="section-content--has-6-columns">
							<?php
									$albums_count = 50;	
									
									$args = array(
										'post_type' => 'records',
										'posts_per_page' => $albums_count,
										'post_status' => 'publish',
										'orderby' => 'rand'
									);
									
									$albums = new WP_Query($args);
									
									while($albums->have_posts() ){
											$albums->the_post();
											
											include( locate_template( '/template-parts/modules/element-album.php', false, false ) );			
										$albums_count--;
									}
							?>
								<li id="pages-liste-navigation" >
									<?php
											the_posts_pagination( array(
											'mid_size'  => 4,
											'prev_text' => __( 'Précédente', 'panm360' ),
											'next_text' => __( 'Suivante', 'panm360' ),
										) );
									?>
								</li>
							</ul><!-- section-content--has-6-columns -->
						
					</div><!-- section-content-c -->
					
				</div><!-- section-inner -->
			</section><!-- section -->
			</article>
		</main><!-- #main -->
	</div><!-- #primary -->
	
	
	<?php //get_template_part( '/template-parts/publicites/publicite', 'banniere' ); ?>
	
	<?php //get_template_part( '/template-parts/modules/element', 'infolettre' ); ?>
	

<?php
get_footer();
