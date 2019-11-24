<?php

/*
	Template name: Accueil
*/

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			
			
			<div id="wrap-new-featured-slider">
				<ul id="new-featured-slider">
					<?php
						$slider_count = 6;	
							while( $slider_count > 0 ){
								get_template_part( 'template-parts/modules/element', 'slider' );
								$slider_count--;
							}
						?>
				</ul><!-- new-featured-slider -->
			</div><!-- wrap-new-featured-slider -->
			

			
			<section class="section">
				<div id="critiques-albums" class="section-inner">
					<h4 class="section-titre">Critiques d'albums <a href="#">-></a></h4>
					
					<div class="section-content ">
						
						<ul class="section-content--main">
						<?php
							$albums_count = 12;	
							while( $albums_count > 0 ){
									get_template_part( '/template-parts/modules/element', 'album' );		
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
										get_template_part( '/template-parts/modules/element', 'aside-calendrier' );		
									$albums_count--;
								}
								?>
							</ul>	
						</div>
						
					</div>
					
				</div>
			</section>



			<section class="section">
				<div id="interviews" class="section-inner">
					<h4 class="section-titre">Interviews <a href="#">-></a></h4>
					
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
					<h4 class="section-titre">Panm@Sat <a href="#">-></a></h4>
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
					<h4 class="section-titre">CRITIQUEs DE CONCERTs <a href="#">-></a></h4>
					
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
					<h4 class="section-titre">Chroniques <a href="#">-></a></h4>
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
					<h4 class="section-titre">Apprendre <a href="#">-></a></h4>
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
	
		</main><!-- #main -->
	</div><!-- #primary -->
	
	

	
<?php
get_footer();
