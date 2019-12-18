<?php

/*
	Template name: Lire
*/

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<article>
				<header class="entry-header section">
					<h1 clas="entry-title"><?php the_title(); ?></h1>
				</header>
			
				<div class="entry-content">
					<?php the_content();?>
				</div><!-- .entry-content -->
			
				<?php include( locate_template( '/template-parts/modules/six-columns-albums.php', false, false ) );	?>
				<a href="/" class="bouton"><?php _e('Voir plus d\'albums','panm360'); ?></a>			
			</article>
		</main><!-- #main -->
	</div><!-- #primary -->	

<?php
get_footer();
