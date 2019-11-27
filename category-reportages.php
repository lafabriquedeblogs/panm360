<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package panm360
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">


			<header class="page-header">
				<h1 class="category-title">Lire - <?php echo single_cat_title( '', false ); ?></h1>
				<?php the_archive_description( '<div class="archive-description">', '</div>' );?>
			</header><!-- .page-header -->

			<section class="section">
				<div id="chroniques" class="section-inner">
					<div class="section-content">
						<div class="section-content--has-4-columns">
						<?php
							$albums_count = 40;	
							while( $albums_count > 0 ){
									get_template_part( '/template-parts/modules/element', 'article' );		
								$albums_count--;
							}
						?>							
						</div>						
					</div>
				</div>
			</section>



		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
