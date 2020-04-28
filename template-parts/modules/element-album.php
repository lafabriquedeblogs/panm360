<?php
	
	$album_id = get_the_id();
	$titre = get_the_title();;
	$lien = get_permalink( );
	$annee =  get_annee($album_id);
	$data_annee =  get_annee($album_id, true);
	
	$artiste = get_artiste( $album_id , false );

	$genres = get_genre($album_id);
	
	$data_genre = get_genre($album_id, true );
	
	
	$auteur_id = get_the_author_meta('ID');
	$auteur = get_the_author_meta('display_name');
	$auteur_link =  get_author_posts_url($auteur_id) ;
	
	$pochette = get_the_post_thumbnail_url( $album_id, 'panm360_square_200' );
	//$pochette_200 = get_the_post_thumbnail_url( $album_id, 'panm360_square_200' );
	$pochette_300 = get_the_post_thumbnail_url( $album_id, 'panm360_square_300' );
	$pochette_400 = get_the_post_thumbnail_url( $album_id, 'panm360_square_400' );
	$pochette_500 = get_the_post_thumbnail_url( $album_id, 'panm360_square' );
	
	if( !$pochette ) $pochette =  get_template_directory_uri()."/assets/img/default/sample-album.png";
	
	$free = get_field('rendre_ce_contenu_accessible_dans_abonnement',$album_id);
	$iam_free = ($free == '1') ? '<div class="iam-free">'.__('gratuit','panm360').'</div>' : '';
	

?>

<li id="album-<?php echo $album_id;?>" class="album element" data-filter="<?php echo $data_genre." ".$data_annee." ".$auteur;?>">
	<div class="picture">
		<a href="<?php echo $lien;?>">
<!--
			<img
			class="lozad"
			data-src="<?php echo $pochette; ?>" 
			data-srcset="<?php echo $pochette_400;?> 400w, <?php echo $pochette_300;?> 300w, <?php echo $pochette_500;?> 500w, <?php echo $pochette_400;?> 768w,<?php echo $pochette_400;?> 780w"
			alt="<?php echo $titre;?>"
			width="100%"
			height="auto" /><?php //echo $iam_free;?>
-->
			<img
			class="--lozad"
			srcset="
					<?php echo $pochette_300; ?> 375w,
					<?php echo $pochette_400; ?> 400w,
					<?php echo $pochette_500; ?> 500w,
					<?php echo $pochette; ?> 980w,
			"
			sizes="(max-width:400px) 400px,
					(max-width:768px) 300px,
					(min-width: 980px) 200px"
			src="<?php echo $pochette_400; ?>" 
			alt="<?php echo $titre;?>"
			width="100%"
			height="auto" /><?php //echo $iam_free;?>
		</a>
		
	</div>
	<div class="details">
		<span class="element-title album-title"><a href="<?php echo $lien;?>"><?php echo $titre;?></a></span>
		<span class="artiste album-artiste"><?php echo $artiste;?></span>
		
		<?php if(!empty($annee)): ?>
			<span class="artiste album-annee"><?php echo $annee;?></span>
		<?php endif; ?>
		<?php if(!empty($genres)): ?>
			<span class="genre album-genre"><?php echo $genres;?></span>
		<?php endif; ?>
		
		<a class="author album-author" href="<?php echo $auteur_link;?>"><?php _e('par','panm360'); ?> <?php echo $auteur;?></a>
	</div>
</li>