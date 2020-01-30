<?php
	
	$titre = get_the_title( $item->ID );
	$genres = get_genre_parents( $item->ID , false );
	//$genres = get_main_genres($item->ID);
	
	$ville =  get_ville( $item->ID );
	$salle = get_salle( $item->ID );
	$timestamp = strtotime($_date);
	$date = date_i18n('d M\.', $timestamp);
	$year = date_i18n('Y', $timestamp);
	$heure = get_time_concert( $item->ID, date_i18n('Ymd', $timestamp) );
	
	$prix = get_field('prix',$item->ID );
	$informations_supplementaires = get_field( 'informations_supplementaires' , $item->ID );

	$agenda_commente = get_field('agenda_commente',$item->ID);
	$permalien = get_permalink( $item->ID );
	
	$vignette = get_the_post_thumbnail_url( $item->ID, array(50,50) );
	if( !$vignette ) $vignette =  get_template_directory_uri()."/assets/img/panm-icones/100x100/m-gris-sur-gris.jpg";
	
?>
<li class="aside-item-calendrier element">
		
		
		<img class="vignette" src="<?php echo $vignette;?>" width="80px" height="80px" />
		
		<div class="detail">
			<span class="date"><?php echo $date;?></span>
			<span class="genre album-genre element-genre"><?php echo $genres?></span>
			<span class="element-title"><?php echo $titre?></span>
			<?php if( $informations_supplementaires ): ?>
			<span class="element-infos-supp"><?php echo implode(', ', $informations_supplementaires );?></span>
			<?php endif; ?>
			<span class="element-location"><?php echo $salle;?> - <?php echo $ville?> - <?php echo $heure;?></span>
			<span class="element-prix"><?php echo $prix['montant'];?></span>
		</div>
		
		<?php if( $agenda_commente ): ?>
		<a href="<?php echo $permalien;?>"><svg class="icon bleu"><use xlink:href="#plus_cercle"></use></svg></a>
		<?php endif; ?>
</li>