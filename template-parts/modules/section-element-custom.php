<div class="section--element">
	<h4 class="section-titre"><span><?php echo $page_titre; ?></span> <a href="<?php echo get_permalink( $page_id );?>"><svg class="icone"><use xlink:href="#fleche-lien"></use></svg></a></h4>
	<?php
		//wp_reset_query();
		$args = array(
			'post_type' => $post_type,
			'posts_per_page' => $posts_per_page,
			'post_status' => array('publish'),
			'orderby' => 'date',
			'order' => 'DESC'
		);
		
		$section_query = new WP_Query($args);
		$section_posts = $section_query->posts;
		$article = array_shift($section_posts);
		
		wp_reset_query();
	?>
	<?php
		$post_id = $article->ID;
		if( !$image_src ){
			$image_src = get_template_directory_uri()."/assets/img/default/sample-album.png";
		}
		
		include( locate_template( '/template-parts/modules/element-main.php', false, false ) );
	?>
	
	<?php
	
	if( count($section_posts) > 0 ): ?>	
	<ul class="content-list-articles--max-2-cols">
		
		<?php

			foreach( $section_posts as $article ){
				
				$post_id = $article->ID;

		
				if( !$image_src ){
					$image_src = get_template_directory_uri()."/assets/img/default/sample-album.png";
				}
		?>
			<li>
				<?php include( locate_template( '/template-parts/modules/element-article.php', false, false ) ); ?>
			</li>									
		<?php		
			}
			
		?>

	</ul>
	<?php endif; ?>
	
	
</div><!-- section--element -->