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
					<h1 class="entry-title has-text-align-center"><?php the_title(); ?></h1>
				</header>
			
				<div class="entry-content">
					<?php the_content();?>
				</div><!-- .entry-content -->


			<?php get_template_part( '/template-parts/publicites/publicite', 'banniere' ); ?>
			
			
			<section class="section">
				<div id="critiques-albums" class="section-inner">
					<h4 class="section-titre"><span>Critiques d'albums</span> <a href="#"><svg class="icone"><use xlink:href="#fleche-lien"></use></svg></a></h4>
					
					<div class="section-content ">
						
						<ul class="section-content--main">
						<?php
							$albums_count = 12;	
							
							$args = array(
								'post_type' => 'records',
								'posts_per_page' => $albums_count,
								'post_status' => 'publish',
								'orderby' => 'rand'
							);
							
							$albums = new WP_Query($args);
							
							while($albums->have_posts() ){
									$albums->the_post();
									
									include( locate_template( '/template-parts/modules/element-album.php', false, false ) );			
								$albums_count--;
							}
						?>
						</ul>
						<div class="aside-content">
							
							<?php get_template_part( '/template-parts/modules/element', 'aside-calendrier' ); ?>
							
							<?php get_template_part( '/template-parts/publicites/publicite', 'ilot' ); ?>
							
						</div>
						
					</div>
					
				</div>
			</section>



			<section class="section">
				<div id="interviews" class="section-inner">
					<h4 class="section-titre"><span>Interviews</span> <a href="#"><svg class="icone"><use xlink:href="#fleche-lien"></use></svg></a></h4>
					
					<div class="section-content ">
						
						<div class="section-content--main">
						<?php get_template_part( '/template-parts/modules/element', 'main' ); ?>
						</div>
						
						<ul class="aside-content">
							<?php
							$albums_count = 3;	
							while( $albums_count > 0 ){
									get_template_part( '/template-parts/modules/element', 'aside' );		
								$albums_count--;
							}
						?>	
						</ul>
						
					</div>
					
				</div>
			</section>
			
						
			<section class="section">
				<div id="panam-at-sat" class="section-inner">
					<h4 class="section-titre"><span>Panm@Sat</span> <a href="#"><svg class="icone"><use xlink:href="#fleche-lien"></use></svg></a></h4>
					<div class="section-content">
						<div class="section-content--has-3-columns">
						<?php
							$albums_count = 3;	
							while( $albums_count > 0 ){
									get_template_part( '/template-parts/modules/element', 'article' );		
								$albums_count--;
							}
						?>							
						</div>
					</div>
				</div>
			</section>
			

			<section class="section">
				<div id="critiques-concerts" class="section-inner">
					<h4 class="section-titre"><span>CRITIQUEs DE CONCERTs</span> <a href="#"><svg class="icone"><use xlink:href="#fleche-lien"></use></svg></a></h4>
					
					<div class="section-content ">
						
						<div class="section-content--main">
						<?php get_template_part( '/template-parts/modules/element', 'main' ); ?>
						</div>
						
						<div class="aside-content">
							<?php
							$albums_count = 3;	
							while( $albums_count > 0 ){
									get_template_part( '/template-parts/modules/element', 'aside' );		
								$albums_count--;
							}
						?>	
						</div>
						
					</div>
					
				</div>
			</section>
			

			<section class="section">
				<div id="chroniques" class="section-inner">
					<h4 class="section-titre"><span>Chroniques</span> <a href="#"><svg class="icone"><use xlink:href="#fleche-lien"></use></svg></a></h4>
					<div class="section-content">
						<div class="section-content--has-4-columns">
						<?php
							$albums_count = 4;	
							while( $albums_count > 0 ){
									get_template_part( '/template-parts/modules/element', 'article' );		
								$albums_count--;
							}
						?>							
						</div>						
					</div>
				</div>
			</section>

			<section class="section">
				<div id="apprendre" class="section-inner">
					<h4 class="section-titre"><span>Apprendre</span> <a href="#"><svg class="icone"><use xlink:href="#fleche-lien"></use></svg></a></h4>
					<div class="section-content">
						<div class="section-content--has-4-columns">
						<?php
							$albums_count = 4;	
							while( $albums_count > 0 ){
									get_template_part( '/template-parts/modules/element', 'article' );		
								$albums_count--;
							}
						?>							
						</div>						
					</div>
				</div>
			</section>	
	




			</article>
		</main><!-- #main -->
	</div><!-- #primary -->	

<?php
get_footer();
