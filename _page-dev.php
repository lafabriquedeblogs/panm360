<?php

/*
	Template name: Dev
*/

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<article>
			<header class="section">
				<h1 clas="entry-title"><?php the_title(); ?></h1>
			</header>
			<section class="section">
				<div class="section-inner">
					<?php
						
						$block_types = WP_Block_Type_Registry::get_instance()->get_all_registered();
echo '<pre>';
	var_dump($block_types);
echo '</pre>';
					?>
				</div>
			</section>	
			</article>
		</main><!-- #main -->
	</div><!-- #primary -->
	
	
	<?php //get_template_part( '/template-parts/publicites/publicite', 'banniere' ); ?>
	
	<?php //get_template_part( '/template-parts/modules/element', 'infolettre' ); ?>
	

<?php
get_footer();
