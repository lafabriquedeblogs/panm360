<a href="<?php echo $agenda_full_permalien;?>" class="plus-de"><?php _e('Voir l\'agenda complet','panm360'); ?> <svg class="icone"><use xlink:href="#fleche-lien"></use></svg></a>	
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


