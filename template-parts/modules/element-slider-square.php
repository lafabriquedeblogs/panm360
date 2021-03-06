<?php
	
	$post_type = get_post_type( $item->ID );
	
	
	if( $post_type == 'agenda'):
	
	$titre = get_the_title( $item->ID );
	$genres = get_genre_parents( $item->ID , false );
	
	$ville =  get_ville( $item->ID );
	$salle = get_salle( $item->ID );
	
	$dates_arrays = get_field('dates', $item->ID);

	$dates = array();
	
	$my_current_lang = apply_filters( 'wpml_current_language', NULL );
	
	if( is_array($dates_arrays)){
		foreach( $dates_arrays as $date ){
			
			$ddate = str_replace('/', '-', $date['date_concert']);
			$jour = date_i18n('D\&\n\b\s\p\;d\&\n\b\s\p\;M\&\n\b\s\p\;Y', strtotime($ddate));
			
			if( !empty($jour) && !empty($date['heure_concert'])){

				$heure = transform_time_to_langue(  $date['heure_concert'] );
				$dates[] = $jour.'&nbsp;•&nbsp;'.$heure;
			}
			
		}
	}
	//$heure = get_time_concert( $item->ID, date_i18n('Ymd', $timestamp) );
	
	$prix = get_field('prix',$item->ID );
	$informations_supplementaires = get_field( 'informations_supplementaires' , $item->ID );

	$permalien = get_permalink( $item->ID );
	
	$vignette_featured = get_the_post_thumbnail_url( $item->ID, 'panm360_square' );
	
?>
<li class="square-featured-slider--slide">
	<div class="square-featured-slider--slide--row">
		
		<div class="square-featured-slider--slide--picture" style="background-image:url('<?php echo $vignette_featured; ?>'); background-size: cover;background-repeat: no-repeat; background-position: center center;">
<!-- 			<img src="<?php echo $vignette_featured; ?>"  class="hidden" alt="title" width="300" height ="300" /> -->
		</div>		
		
		<div class="square-featured-slider--slide--content">
			<div class="slide-content">
				<span class="date"><?php echo implode(' /&nbsp;' ,$dates )?></span>
				<span class="genre album-genre element-genre"><?php echo $genres?></span>
				<?php if( $informations_supplementaires ): ?>
				<span class="element-infos-supp"><?php echo implode(', ', $informations_supplementaires );?></span>
				<?php endif; ?>
				<span class="element-title"><?php echo $titre?></span>
				<span class="element-location"><span class="medium"><?php echo $salle;?></span> - <?php echo $ville?></span>
				<span class="element-prix"><?php echo $prix['montant'];?></span>
				<a href="<?php echo $permalien;?>" class="bouton"><?php _e('Plus de détails','panm360'); ?></a>
			</div>
		</div>
		

	</div><!-- new-featured-slider--slide--row -->
</li><!-- new-featured-slider--slide -->

<?php else: ?>

<?php

	$titre = get_the_title( $item->ID );
	$genres = get_genre_parents( $item->ID , false );
	$permalien = get_permalink( $item->ID );
	$artiste = get_artiste( $item->ID , false );
	$vignette_featured = get_the_post_thumbnail_url( $item->ID, 'panm360_square_400' );
	
	$artiste = get_artiste( $item->ID , false );
?>

<li class="square-featured-slider--slide">
	<div class="square-featured-slider--slide--row">
		
		<div class="square-featured-slider--slide--picture slide--picture--carre">
			<img src="<?php echo $vignette_featured; ?>"  alt="title" width="300" height ="300" />
		</div>		
		
		<div class="square-featured-slider--slide--content">
			<div class="slide-content">
				<span class="genre album-genre element-genre"><?php echo $genres?></span>
				<span class="element-title"><?php echo $titre?></span>
				<span class="artiste album-artiste"><?php echo $artiste;?></span>
				<a href="<?php echo $permalien;?>" class="bouton"><?php _e('Plus de détails','panm360'); ?></a>
			</div>
		</div>
		

	</div><!-- new-featured-slider--slide--row -->
</li><!-- new-featured-slider--slide -->

<?php endif; ?>