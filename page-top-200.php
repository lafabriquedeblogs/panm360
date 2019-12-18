<?php

/*
	Template name: Top 200
*/

get_header();
?>
<div id="top-360-hero">
	<h1><strong class="small">Top</strong> 360</h1>
	<p>De la décennie <strong class="blanc">2010-2019</strong></p>
</div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<article id="post-<?php the_ID(); ?>">
				<div class="entry-content">
					<?php the_content();?>
				</div><!-- .entry-content -->
			
			
			<div id="filtre-liste-albums">
				<h2>Filtres</h2>
				<p class="filtre-liste-tax filtre-list-genres"><?php echo get_filter_data('genre'); ?></p>
				<p class="filtre-liste-tax filtre-list-annee"><?php echo get_filter_data('annee'); ?></p>
				<p class="filtre-liste-tax filtre-list-artiste"><?php echo get_liste_filtre_artiste(); ?></p>
			</div>
			
			<section class="section">
				<div id="critiques-albums" class="section-inner">
				
					<div class="section-content-c">
						<ul class="section-content--has-6-columns">
						<?php
							
							$years = get_years_list();							
							
							foreach( $years as $year ){
								$posts_array = get_posts(
								    array(
								    	
								    	'numberposts' => -1,
								        'post_type' => 'records',
								        'orderby' => 'relier_artiste',
								        'tax_query' => array(
								            array(
								            'taxonomy' => 'annee',
								            'field' => 'slug',
								            'terms' => $year->name,
								            )
								        )
								    )
								);
								
								$artistes_a = array();
								$i = 1;
								foreach( $posts_array as $post ){
								
									setup_postdata( $post );
									$album_id = get_the_id();
									$artiste = get_artiste( $album_id , false );
									
									if( !array_key_exists($artiste,$artistes_a) ){
										$artistes_a[$artiste] = $post;
									} else {
										$artistes_a[$artiste."-".$i] = $post;
									}
									$i++;
											
								}
								sort($artistes_a);

								wp_reset_postdata();
								?>
									<!-- <h2 class="bold"><?php echo $year->name;?></h2> -->
									
										<?php
										
										
											

										foreach( $artistes_a as $artist => $post ){
											setup_postdata( $post );
											include( locate_template( '/template-parts/modules/element-album.php', false, false ) ); 
											
										}
										wp_reset_postdata();

										?>
									
									<?php
								
								
							}
					?>	
					</ul>				
					</div>
					
				</div>
			</section>

			</article><!-- #post-<?php the_ID(); ?> -->
		</main><!-- #main -->
	</div><!-- #primary -->
	
	
	<?php //get_template_part( '/template-parts/publicites/publicite', 'banniere' ); ?>
	
	<?php //get_template_part( '/template-parts/modules/element', 'infolettre' ); ?>
	

<?php
get_footer();
