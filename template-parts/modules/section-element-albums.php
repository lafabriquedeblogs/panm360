<div class="section--element">
	<h4 class="section-titre"><span><?php echo $page_titre; ?></span> <a href="<?php echo get_permalink( $page_id );?>"><svg class="icone"><use xlink:href="#fleche-lien"></use></svg></a></h4>
	
	<ul class="section-list-albums">
	<?php
		
		$args = array(
			'post_type' => $post_type,
			'posts_per_page' => $posts_per_page,
			'post_status' => array('publish'),
			'category__not_in' => $category__not_in,
			'tag__not_in' => $tag__not_in,
			'orderby' => 'date',
			'order' => 'DESC'
		);
		
		$albums = new WP_Query($args);
		
		while($albums->have_posts() ){
				$albums->the_post();
				
				include( locate_template( '/template-parts/modules/element-album.php', false, false ) );
			$albums_count--;
		}
	?>
	</ul>
	
	<a href="<?php echo get_permalink( $critiques_dalbums );?>" class="bouton"><?php _e('Lire la suite','panm360'); ?></a>
	
</div><!-- section--element -->
v> <!-- section-content--main -->