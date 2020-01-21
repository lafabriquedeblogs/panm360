<div class="title-calendrier">
	<h2><?php _e('Agenda <span>DES CONCERTS</span>','panm360'); ?></h2>
</div>
<ul>
	<?php

	$post_start = 1;
	
	$calendrier = get_liste_concerts( $start, $end , $count );	
	
	
	foreach( $calendrier as $_date => $items ){
		foreach( $items as $item ){
	
			if( $post_start > $count ) break;
			$post_start++;
				
			include( locate_template( '/template-parts/modules/element-item-calendrier.php', false, false ) );
				
			}
	}
	?>
</ul>

<?php
	$agenda_full_id = apply_filters( 'wpml_object_id', 6864, 'page', TRUE  );
	$agenda_full_permalien = get_permalink( $agenda_full_id );
?>
<a href="<?php echo $agenda_full_permalien;?>" class="plus-de"><?php _e('Voir l\'agenda complet','panm360'); ?> <svg class="icone"><use xlink:href="#fleche-lien"></use></svg></a>
