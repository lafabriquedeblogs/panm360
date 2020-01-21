<?php
	$artiste = get_the_title( $item->ID );
	$genres = get_genre_parents( $item->ID );
	
	$ville =  get_ville( $item->ID );
	$salle = get_salle( $item->ID );
	$timestamp = strtotime($_date);
	$date = date_i18n('d M\.', $timestamp);
	$year = date_i18n('Y', $timestamp);
	$heure = get_time_concert( $item->ID, date_i18n('Ymd', $timestamp) );
	
	$agenda_commente = get_field('agenda_commente',$item->ID);
	$permalien = get_permalink( $item->ID );
	
	$vignette = get_the_post_thumbnail_url( $item->ID, array(50,50) );
	if( !$vignette ) $vignette =  get_template_directory_uri()."/assets/img/panm-icones/100x100/m-blanc-sur-bleu.jpg";
	
?>
<li class="aside-item-calendrier element">
		
		<span class="date">
		<?php echo $date;?>
		<img class="vignette" src="<?php echo $vignette;?>" width="80px" height="80px" />
		</span>
		<div class="detail">
			<span class="element-title"><?php echo $artiste?></span>
			<span class="element-location"><?php echo $ville?> - <?php echo $salle;?> - <?php echo $heure;?></span>
			<span class="genre album-genre element-genre"><?php echo $genres?></span>
		</div>
		
		<?php if( $agenda_commente ): ?>
		<a href="<?php echo $permalien;?>"><svg class="icon bleu"><use xlink:href="#plus_cercle"></use></svg></a>
		<?php endif; ?>
</li>