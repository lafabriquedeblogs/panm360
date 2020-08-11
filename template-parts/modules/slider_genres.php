<?php
	/*
	// home
	// interviews
	// Listes d'écoutes
	// Balados
	// Sessions 360
	// Quoi voir
	// Dossiers
	----------------------------------------
	// @$genre
	// @post_types
	*/	
	$taxonomy = 'genre';
?>

<div id="liste-des-genres">
	
	<p class="explore-genres">
		<?php _e('Explorer par genre','panm360'); ?> : 
		<?php
			
			if(!empty($genre)):
				$genre_name = get_term_by( 'id', absint( $genre ), $taxonomy );
				$parent_term_id = false;
				$term = get_term($genre, $taxonomy);
				if( $term->parent > 0 ):
					$parent_term = get_term( $term->parent, $taxonomy);
					$parent_term_id = $term->parent;
					//echo '<span class="current-genre-parent"> :  <a href="'.get_term_link( $term->parent, 'genre' ).'">'.$parent_term ->name.'</a></span>';
				endif;				
				
				if( !$direct_link ):
					//echo '<span class="current-genre"> :  '.$genre_name ->name.'</span>';
				endif;
			
			else: 
			
				$genre = false;
			
			endif;
		?>
	</p>
	
	<div id="slider-genres">
			<?php
						
    			$genres = get_terms(
					array(
						'hide_empty' => 0,
						'parent' => 0,
    			    	'taxonomy' => array($taxonomy),
    			    )	    			
    			);
				
				
    			$splits = array_chunk( $genres, 8);
    			
    			foreach( $splits as $a ){

	    			?>
	    			<ul class="liste-des-genres--ul">
	    			<?php
    				foreach( $a as $b ){
	    				$term_link = $direct_link ? get_term_link( $b->term_id, $taxonomy ) : '?genre='.$b->term_id;
	    				
	    				?>
	    					<li><a id="<?php echo $b->term_id;?>" <?php if( $genre == $b->term_id || $b->term_id == $parent_term_id) echo 'class="current-tax-genre"'?> href="<?php echo $term_link;?>"><?php echo $b->name;?></a></li>
	    				<?php
    				}	    			
 	    			?>
	    			</ul>
	    			<?php
    			}

                          			
			?>
		
	</div> <!-- /#slider-genres -->
</div> <!-- /#liste-des-genres -->