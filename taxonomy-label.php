<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<article>
			<header class="section">
				<h1 clas="entry-title"><span class="light">LABEL : <?php echo single_cat_title( '', false ); ?></span></h1>
			</header>
			<section class="section">
				<div class="section-inner">
				
					<div class="section-content-c">
						<ul class="section-content--has-6-columns">
								<?php
									
									while ( have_posts() ) :
										the_post();
										$posts_count = '';
										include( locate_template( '/template-parts/modules/element-album.php', false, false ) );
									endwhile;
																
								?>

							</ul><!-- section-content--has-6-columns -->
								<div id="pages-liste-navigation" >
									<?php
											the_posts_pagination( array(
											'mid_size'  => 4,
											'prev_text' => __( 'Précédente', 'panm360' ),
											'next_text' => __( 'Suivante', 'panm360' ),
										) );
									?>
								</div>						
					</div><!-- section-content-c -->
					
				</div><!-- section-inner -->
			</section><!-- section -->			
			</article>
			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
