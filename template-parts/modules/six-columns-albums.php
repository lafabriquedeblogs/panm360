<section class="section">
	<div class="section-inner">
	
		<div class="section-content-c">
			<ul class="section-content--has-6-columns">
				<?php
						$albums_count = 54;	
						
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
