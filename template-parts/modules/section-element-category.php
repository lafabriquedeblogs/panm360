<div class="section--element">
	<h4 class="section-titre"><span><?php echo $page_titre;?></span> <a href="<?php echo get_permalink( $page_id );?>"><svg class="icone"><use xlink:href="#fleche-lien"></use></svg></a></h4>

		<?php
			
			$args = array(
				'post_type' => $post_type,
				'category__in' => $display_categories,
				'posts_per_page' => 1,
				'post_status' => array('publish'),
				'orderby' => 'date',
				'order' => 'DESC'
			);
			
			$article = new WP_Query($args);
			$articles = $article->posts;
			//$article = array_shift($regarder);
			
			while ( $article->have_posts() ) :
				$article->the_post();
					include( locate_template( '/template-parts/modules/element-main.php', false, false ) );
			endwhile;
			wp_reset_query() ;
		?>
		
		<?php if( count($articles) > 0 ):
			
			$args_suite = array(
				'post_type' => $post_type,
				'category__in' => $display_categories,
				'posts_per_page' => $posts_per_page,
				'offset' => 1,
				'post_status' => array('publish'),
				'orderby' => 'date',
				'order' => 'DESC'
			);
			
			$the_articles = new WP_Query($args_suite);
			
		?>	
		<ul class="content-list-articles--max-2-cols">
			
			<?php
				while( $the_articles->have_posts() ){
					$the_articles->the_post();
				//foreach( $regarder as $article ){
			?>
				<li>
					<?php include( locate_template( '/template-parts/modules/element-article.php', false, false ) ); ?>
				</li>									
			<?php		
				}
				wp_reset_query(  );
			?>

		</ul>
		<?php endif; ?>
	
	
</div><!-- section--element -->