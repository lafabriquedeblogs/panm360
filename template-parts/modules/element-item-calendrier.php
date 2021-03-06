<?php
	
	
	$titre = get_the_title( $item->ID );
	$genres = get_genre_parents( $item->ID , false );
	
	$ville =  get_ville( $item->ID );
	$salle = get_salle( $item->ID );
	
	$timestamp = strtotime($_date);
	
	$date = date_i18n('D \<\s\p\a\n \c\l\a\s\s\=\"\m\e\d\i\u\m\"\>d M\<\/\s\p\a\n\> Y', $timestamp);
	$year = date_i18n('Y', $timestamp);
	$heure = get_time_concert( $item->ID, date_i18n('Ymd', $timestamp) );
	
	$prix = get_field('prix',$item->ID );
	$informations_supplementaires = get_field( 'informations_supplementaires' , $item->ID );

	$agenda_commente = get_field('agenda_commente',$item->ID);
	$permalien = get_permalink( $item->ID );
	
	$vignette_featured = get_the_post_thumbnail_url( $item->ID, array(50,50) );
	$vignette_comment =  get_template_directory_uri()."/assets/img/panm-icones/50x50/m-gris-sur-gris.jpg";
	$vignette_uncomment = get_template_directory_uri()."/assets/img/panm-icones/icon-agenda.png";
	$vignette =  $agenda_commente ? get_template_directory_uri()."/assets/img/panm-icones/icon-agenda.png" : get_template_directory_uri()."/assets/img/panm-icones/50x50/m-gris-sur-gris.jpg";
	
	$class = array();
	//$class[] = $timeout ? "hide-me" : "";
	$class[] = ( $timestamp < $today_timestamp ) ? "out-dated" : "";

	$free = get_field('rendre_ce_contenu_accessible_dans_abonnement',$item->ID);
	$iam_free = ($free == '1') ? '<div class="iam-free"><a href="'.$permalien.'">'.__('gratuit','panm360').'</a></div>' : '';
		
?>

<li class="aside-item-calendrier element <?php echo implode(" ", $class);?>">
		
		<?php if( $agenda_commente ): ?> <a href="<?php echo $permalien;?>" class="link-vignette"><?php endif; ?>
			<img class="vignette" src="<?php echo $vignette;?>" width="30px" height="30px" />
		<?php if( $agenda_commente ): ?></a><?php endif; ?>
		
		<div class="detail <?php if( $agenda_commente ): ?>agenda-commente<?php endif; ?>">
			<span class="date"><?php echo $date;?> • <?php echo $heure;?></span>
			<span class="genre album-genre element-genre"><?php echo $genres?></span>
			<span class="element-title"><?php echo $titre?></span>
			<?php if( $informations_supplementaires ): ?>
			<span class="element-infos-supp"><?php echo implode(', ', $informations_supplementaires );?></span>
			<?php endif; ?>
			<span class="element-location"><span class="medium"><?php echo $salle;?></span> - <?php echo $ville?></span>
			<span class="element-prix"><?php echo $prix['montant'];?></span>
			<?php echo $iam_free;?>
		</div>

		
		<?php if( $agenda_commente ): ?>
		<a href="<?php echo $permalien;?>" class="link-vignette">
			<svg class="icon bleu"><use xlink:href="#plus_cercle"></use></svg>
			
		</a>
		<?php endif; ?>
</li>