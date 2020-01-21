<?php

/*
	Template name: Agenda Full
*/

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<article>
				<header class="entry-header section">
					<h1 class="entry-title has-text-align-center"><?php the_title(); ?></h1>
				</header>
			
				<div class="entry-content">
					<?php the_content();?>
				</div><!-- .entry-content -->

				<section class="section">
					<div id="agenda" class="section-inner">
						<div>
							<?php
								$count = 1000;
								$Agenda_start = '2020/01/01';
								$start = date('Y/m/d');
								$start = '2020/01/01';
								$end = '2020/06/30';
								include( locate_template( '/template-parts/modules/element-aside-calendrier.php', false, false ) );
								//get_template_part( '/template-parts/modules/element', 'aside-calendrier' ); ?>					
						</div>
					</div>
				</section>	

			</article>
		</main><!-- #main -->
	</div><!-- #primary -->	

<?php
get_footer();