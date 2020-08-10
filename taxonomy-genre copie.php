<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package panm360
 */

get_header();

$term = get_queried_object();
$child_terms = get_term_children( $term->term_id, 'genre' );
$child_terms_array = array();

foreach( $child_terms as $child ){
	$term = get_term( $child , 'genre' );
	$child_terms_array[] = '<a href="'.get_term_link( $term, 'genre' ).'">'.$term->name.'</a>';
}
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<article>
			<header class="section">
				<?php if( count($child_terms) > 0 ): ?>
						<p class="explore-genres">Explorer les styles</p>
					<?php endif; ?>
				<h1 class="entry-title genre-title"><span class="light"><?php echo single_cat_title( '', false ); ?></span>
				<?php if( count($child_terms) > 0 ): ?>
					<span class="sub-genre light"><?php echo implode(' / ', $child_terms_array ); ?></span>
					
				<?php endif; ?>
				</h1>
			</header>
			<section class="section">
				<div class="section-inner">
				
					<div class="section-content-c">
						<ul class="section-content--has-6-columns">
								<?php

									while ( have_posts() ) :
										the_post();
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
