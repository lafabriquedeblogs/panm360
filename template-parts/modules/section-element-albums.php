<div class="section--element">
	<h4 class="section-titre"><span><?php echo $page_titre; ?></span> <a href="<?php echo get_permalink( $page_id );?>"><svg class="icone"><use xlink:href="#fleche-lien"></use></svg></a></h4>
	
	<ul class="section-list-albums">
	<?php
		
		$args = array(
			'post_type' => $post_type,
			'posts_per_page' => $posts_per_page,
			'post_status' => array('publish'),
			'orderby' => 'date',
			'order' => 'DESC'
		);
		
		if(!empty($category__not_in)){
			$args['category__not_in'] = $category__not_in;
			
		}
		
		if(!empty($tag__not_in)){
			$args['tag__not_in'] = $tag__not_in;
		}		
		
		if( !empty($inclure_la_categorie) ){
			$args['category__in'] = $inclure_la_categorie;
		}		

		if( !empty($inclure_letiquette) ){
			$args['tag__in'] = $inclure_letiquette;
		}	
				
		if( !empty($choisir_le_genre)  ){
			$args['tax_query'][] = array(
					'taxonomy' => 'genre',
					'field' => 'term_id',
					'terms' => $choisir_le_genre
				);				
		}
		
		$albums = new WP_Query($args);

		while($albums->have_posts() ){
				$albums->the_post();
				
				include( locate_template( '/template-parts/modules/element-album.php', false, false ) );
		}
		
		wp_reset_query();
	?>
	</ul>
	
</div><!-- section--element -->
