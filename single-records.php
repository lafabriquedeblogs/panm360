<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
			
			while ( have_posts() ) : the_post(); 
			
			$album_id = get_the_id();
			$artiste = get_artiste( $album_id , false );
			$genres = get_genre($album_id);
			$annee = get_annee($album_id);
			$pays = get_pays($album_id);
			$label = get_label($album_id);
		?>
		
		<article id="post-<?php the_ID(); ?>" <?php post_class("post-album"); ?>>
			
			<div class="album-cover">
				<div class="lp-cover">
					<?php panm360_post_thumbnail(); ?>
				</div>
				<div class="lp-metas">
					<span class="single-album-pays"><span  class="bleu bold meta-name"><?php _e('Pays','panm360'); ?> : </span><?php echo $pays;?></span>
					<span class="single-album-label"><span class="bleu bold meta-name"><?php _e('Label','panm360'); ?> : </span><?php echo $label;?></span>
					<span class="single-album-genre"><span class="bleu bold meta-name"><?php _e('Genres et styles','panm360'); ?> : </span><?php echo $genres;?></span>
					<span class="single-album-annee"><span class="bleu bold meta-name"><?php _e('Année','panm360'); ?> : </span><?php echo $annee;?></span>
				</div>
				
				<?php $rows_icons = get_field("reseau_social",'options'); ?>
				<ul class="icones-de-partage">
					<?php foreach( $rows_icons as $icon ){ ?>
						<li class="reseau-partage">
							<a href="#" id="<?php echo $icon['icone_reseau_social']['ID'];?>">
								<svg class="icon"><use xlink:href="#<?php echo $icon['icone_reseau_social']['ID'];?>"></use></svg>
							</a>
						</li>
					<?php }	?>
				</ul>
			</div>
			
			<div class="single-album-body">
				<header class="entry-header">
					<span class="sub-title"><?php echo $artiste;?></span>
					<?php the_title( '<h1 class="entry-title">', '</h1>' );?>	
				</header><!-- .entry-header -->
				
				
				
				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->				
				<footer class="entry-footer">
					<?php panm360_entry_footer(); ?>
				</footer><!-- .entry-footer -->

			</div>
		

		</article><!-- #post-<?php the_ID(); ?> -->


		<?php endwhile; ?>
		<section class="section">
			<div class="section-inner">
				<h4 class="section-titre"><span><?php _e('Critiques d\'albums','panm360'); ?></span> <?php //<a href="#"><svg class="icone"><use xlink:href="#fleche-lien"></use></svg></a> ?></h4>

					<ul class="section-content--has-6-columns">
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
			</div>
		</section>
			
			</div>			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
