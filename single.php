<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package panm360
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main article-single">
			<section class="section">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			//the_post_navigation();


			if ( is_user_logged_in() && comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
		</section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
