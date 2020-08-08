<div id="liste-des-genres">
	<div id="slider-genres">
			<?php
				$genres = wp_list_categories(array(
    			    'depth'               => 1,
    			    'echo'                => 0,
    			    'hide_empty'          => 1,
    			    'hide_title_if_empty' => false,
    			    'hierarchical'        => true,
    			    'separator'           => '*',
    			    'show_option_all'     => '',
    			    'show_option_none'    => '',
    			    'style'               => '',
    			    'taxonomy'            => 'genre')
    			);
    			
    			$genres_array = explode('*', $genres);
    			$last = array_pop($genres_array);
    			
    			$splits = array_chunk( $genres_array, 8);
    			
    			foreach( $splits as $a ){
	    			?>
	    			<ul class="liste-des-genres--ul">
	    			<?php
    				foreach( $a as $b ){
	    				?>
	    					<li><?php echo $b;?></li>
	    				<?php
    				}	    			
 	    			?>
	    			</ul>
	    			<?php
    			}
    			
			?>
		
	</div> <!-- /#slider-genres -->
</div> <!-- /#liste-des-genres -->