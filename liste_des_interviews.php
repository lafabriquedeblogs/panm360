<?php

/*
	Template name: Liste Interviews Raw
*/

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php
					
				$interviews_args = array(
					'post_type' => 'interviews',
					'posts_per_page' => -1,
					'post_status' => array('publish'),
					'orderby' => 'date',
					'order' => 'DESC'
				);
				
				$interviews_query = new WP_Query($interviews_args);
				
				echo '<ul style="padding:50px 0;">';
				
				while( $interviews_query->have_posts() ){
					$interviews_query->the_post();
					
					echo '<li style="font-size: 13px;line-height:1.3;margin-bottom:15px;">
							<a href="'.get_the_permalink().'" target="_blank">
								<strong>Titre : '.get_the_title().'</strong>
								<br>
								url : '.get_the_permalink().'
							</a>
						</li>';
				}
				echo '</ul>';

			?>
		</main><!-- #main -->
	</div><!-- #primary -->
	

<?php
get_footer();
