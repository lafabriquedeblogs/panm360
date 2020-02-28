<?php
	$agenda_full_id = apply_filters( 'wpml_object_id', 6944, 'page', TRUE  );
	$agenda_full_permalien = get_permalink( $agenda_full_id );	
?>

<a href="<?php echo $agenda_full_permalien;?>" class="plus-de"><?php _e('Voir l\'agenda complet','panm360'); ?> <svg class="icone"><use xlink:href="#fleche-lien"></use></svg></a>

<ul class="calendrier-ul-container">
	<?php
	$post_start = 1;
	$calendrier = get_liste_concerts( $start, $end , $count );	
	$count = 1000;
	
	if( count($calendrier) > 0 ):
	
		foreach( $calendrier as $_date => $items ){
			
			foreach( $items as $item ){
	
				if( $post_start > $count ) break;
					
/*
				if( $is_pub && $post_start-1 == $count/2 ) {
					?>
						<li class="full-row">
					<?php
						include( locate_template( '/template-parts/publicites/publicite-banniere.php', false, false ) );
					?>
						</li>
					<?php
					}
*/
					include( locate_template( '/template-parts/modules/element-item-calendrier.php', false, false ) );
					$post_start++;
				}
		}
	
	else: ?>
	
		<li class="no-result">
			<h3><?php _e('Aucun résultat','panm360'); ?></h3>
		</li>
	
	<?php endif; ?>
</ul>

<button id="bouton-load-more" ><?php _e('En voir plus','panm360'); ?></button>
