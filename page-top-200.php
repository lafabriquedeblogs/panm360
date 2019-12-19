<?php

/*
	Template name: Top 200
*/

get_header();
?>
<div id="text-introduction-panm360">
	<?php the_content();?>
</div>
	
<div id="top-360-hero">
<!--
	<h1><strong class="small">Top</strong> 360</h1>
	<p>De la décennie <strong class="blanc">2010-2019</strong></p>
-->
</div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<article id="post-<?php the_ID(); ?>">
			<?php /* ?>
			<div class="entry-content">
				<?php the_content();?>
			</div><!-- .entry-content -->
			<?php  */ ?>
			
			<div id="filtre-liste-albums">
				
				<ul  class="filtres-content-tabs">
					<li>
						<h3 class="medium"><?php _e('Filtres','panm360'); ?></h3>
					</li>
					<li class="filtrer-par">
						<a data-content="#filtre-genre"><?php _e('Genre et style','panm360'); ?></a>
						</li>
					<li class="filtrer-par">
						<a data-content="#filtre-annee"><?php _e('Année','panm360'); ?></a>
						</li>
					<li class="filtrer-par">
						<a data-content="#filtre-artiste"><?php _e('Artiste','panm360'); ?></a>
					</li>
				</ul>
				<ul class="filtres-content">
					<li id="filtre-genre" class="filtrer-par">
						<p class="filtre-liste-tax filtre-list-genres"><?php echo get_filter_data('genre'); ?></p>
					</li><!-- filtrer-par -->
					<li id="filtre-annee" class="filtrer-par">
						<p class="filtre-liste-tax filtre-list-annee"><?php echo get_filter_data('annee'); ?></p>
					</li>
					<li id="filtre-artiste" class="filtrer-par">
						<p class="filtre-liste-tax filtre-list-artiste"><?php echo get_liste_filtre_artiste(); ?></p>
					</li>
				</ul>
			</div>
			
			<section class="section">
				<div id="critiques-albums" class="section-inner">
				
					<div class="section-content-c">
						
						<?php
							
							$years = get_years_list();							
							
							foreach( $years as $year ){
								$posts_array = get_posts(
								    array(
								    	
								    	'posts_per_page' => -1,
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
									<h2 class="bold annee-top" data-filter="<?php echo $year->name;?>"><?php echo $year->name;?></h2>
									<ul class="section-content--has-6-columns" data-filter="<?php echo $year->name;?>">
								<?php
									foreach( $artistes_a as $artist => $post ){
										setup_postdata( $post );
										include( locate_template( '/template-parts/modules/element-album.php', false, false ) ); 
									}
								?>
									</ul>
								<?php
								wp_reset_postdata();								
							}
						?>	
										
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
