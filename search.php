<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package panm360
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>
		<article>
			<header class="section">
				<h1 class="page-title light">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Recherche : %s', 'panm360' ), '<span class="bold">' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

				

			<section id="search-liste" class="section">
				<div id="critiques-albums" class="section-inner">
				
					<div class="section-content-c">	
						<ul class="section-content--has-6-columns">
								<?php
								/* Start the Loop */
								while ( have_posts() ) :
									the_post();
									include( locate_template( '/template-parts/modules/element-album.php', false, false ) ); 
						
								endwhile;
								
								echo '<li id="pages-liste-navigation">';
								the_posts_pagination( array(
									'mid_size'  => 4,
									'prev_text' => __( 'Précédente', 'panm360' ),
									'next_text' => __( 'Suivante', 'panm360' ),
								) );
								echo '</li>';
							?>
						</ul>

					</div>
					
				</div>
			
			</section>
			
			<?php else :?>
			<header class="section">
				<h1 class="page-title light">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Recherche : %s', 'panm360' ), '<span class="bold">' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->			
			<?php
					get_template_part( 'template-parts/content', 'none' );
				endif;
			?>
			
			
		</article>
		
		</main><!-- #main -->
		
	</section><!-- #primary -->
	
<?php
get_footer();
