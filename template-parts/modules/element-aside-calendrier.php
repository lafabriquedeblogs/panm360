<div class="title-calendrier">
	<h2>Agenda <span>DES CONCERTS</span></h2>
</div>
<ul>
	<?php
		
	$count = 8;
	$post_start = 1;
	
	$Agenda_start = '2020/01/01';
	$start = date('Y/m/d');
	$end = '2020/06/30';
	
	$calendrier = get_liste_concerts( $start, $end , $count );	
	
	
	foreach( $calendrier as $_date => $items ){
		

			foreach( $items as $item ){
				
				if( $post_start > $count ) break;
				$post_start++;
				
				$artiste = get_the_title( $item->ID );
				$genres = get_genre_parents( $item->ID );
				
				$ville =  get_ville( $item->ID );
				$salle = get_salle( $item->ID );
				$timestamp = strtotime($_date);
				$date = date_i18n('d M\.', $timestamp);
				$year = date_i18n('Y', $timestamp);
				$heure = get_time_concert( $item->ID, date_i18n('Ymd', $timestamp) );
				
				include( locate_template( '/template-parts/modules/element-item-calendrier.php', false, false ) );
				
				
			}
		
					
	}
	?>
</ul>	
<a href="" class="plus-de">Voir l'agenda complet <svg class="icone"><use xlink:href="#fleche-lien"></use></svg></a>

<?php

?>