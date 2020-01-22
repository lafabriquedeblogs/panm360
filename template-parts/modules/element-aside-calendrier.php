
<ul class="calendrier-ul-container">
	<?php

	$post_start = 1;
	
	$calendrier = get_liste_concerts( $start, $end , $count );	
	
	if( count($calendrier) > 0 ):
	
	foreach( $calendrier as $_date => $items ){
		foreach( $items as $item ){

			if( $post_start > $count ) break;
			$post_start++;
				
			include( locate_template( '/template-parts/modules/element-item-calendrier.php', false, false ) );
				
			}
	}
	
	else:
	?>
		<li class="no-result">
			<h3>Aucun résultat</h3>
		</li>
	<?php
	endif;
	?>
</ul>


