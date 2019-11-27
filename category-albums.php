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
				<div id="critiques-albums" class="section-inner">
<!-- 					<h4 class="section-titre"><span>Critiques d'albums</span> <a href="#"><svg class="icone"><use xlink:href="#fleche-lien"></use></svg></a></h4> -->
					
					<div class="section-content ">
						
						<ul class="section-content--main">

							<?php
							/* Start the Loop */
							/*
									while ( have_posts() ) :
											the_post();
											get_template_part( 'template-parts/content', get_post_type() );
											endwhile;
							
										the_posts_navigation();
							
									else :
							
										get_template_part( 'template-parts/content', 'none' );
							
									endif;
							*/
							?>

						<?php
							$albums_count = 84;	
							while( $albums_count > 0 ){
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
							
						</div>
						
					</div>
					
				</div>
			</section>



		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
