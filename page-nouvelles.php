<?php
	
	/** Template name: blogue*/
	
	
	get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="section">
				<div id="chroniques" class="section-inner">
					<div class="section-content">
						
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->
					<div class="entry-content">
						<?php the_content();?>
					</div><!-- .entry-content -->
						<div class="section-content--has-3-columns">

						<?php
							$nouvelles_args = array(
								'post_type' => 'post',
								'posts_per_page' => -1,
								'post_status' => array('publish'),
								'category__not_in' => array(268,280,282,266,281),
								'orderby' => 'date',
								'order' => 'DESC'
							);
							
							$nouvelles_query = new WP_Query($nouvelles_args);							
							while ( $nouvelles_query->have_posts() ) :
								$nouvelles_query->the_post();
								include( locate_template( '/template-parts/modules/element-article.php', false, false ) );	
							endwhile;
							
						?>
							
						</div>						
					</div>
				</div>
			</section>



		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
