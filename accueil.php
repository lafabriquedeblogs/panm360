<?php

/*
	Template name: Accueil
*/

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php get_template_part( 'template-parts/accueil/accueil', 'slider_home' ); ?>

			
			<section class="section">
				<div id="critiques-albums" class="section-inner">
					<h4 class="section-titre">Critiques d'albums <a href="#">-></a></h4>
					
					<div class="section-content ">
						
						<div class="section-content--albums">
						<?php
							$albums_count = 12;	
							while( $albums_count > 0 ){
									get_template_part( '/template-parts/modules/element', 'album' );		
								$albums_count--;
							}
						?>
						</div>
						<div class="aside-content">
							<div class="title-calendrier">
								<h2>CALENDRIER <span>DES CONCERTS</span></h2>
							</div>
							<?php
							$albums_count = 8;	
							while( $albums_count > 0 ){
									get_template_part( '/template-parts/modules/element', 'aside-calendrier' );		
								$albums_count--;
							}
						?>	
						</div>
						
					</div>
					
				</div>
			</section>



			<section class="section">
				<div id="interviews-albums" class="section-inner">
					<h4 class="section-titre">Interviews <a href="#">-></a></h4>
					
					<div class="section-content ">
						
						<div class="section-content--albums">
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
				<div id="panam-at-sat" class="section-inner">
					<h4 class="section-titre">Panm@Sat <a href="#">-></a></h4>
					<div class="section-content">
						<div class="section-content--interviews">
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
						
						<div class="section-content--albums">
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
						<div class="section-content--panm-at-sat">
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
						<div class="section-content--panm-at-sat">
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
