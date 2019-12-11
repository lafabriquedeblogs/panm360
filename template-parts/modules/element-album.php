<?php
	
	$album_id = get_the_id();
	$titre = get_the_title();;
	$lien = get_permalink( );
	$annee =  get_annee($album_id);
	
	$artiste = get_artiste( $album_id , false );
	$genres = get_genre($album_id);
	
	$auteur = get_the_author_meta('display_name');
	$auteur_link =  get_the_author_meta('user_url');
	
	$pochette = get_the_post_thumbnail_url( $album_id, array(500,500) );
	if( !$pochette ) $pochette =  get_template_directory_uri()."/src/img/sample-album.png";
	
?>

<li class="album element">
	<div class="picture">
		<a href="<?php echo $lien;?>"><img src="<?php echo $pochette; ?>" width="500" height="500" alt="<?php echo $titre;?>"/></a>
	</div>
	<div class="details">
		<span class="element-title album-title"><a href="<?php echo $lien;?>"><?php echo $titre;?></a></span>
		<span class="artiste album-artiste"><?php echo $artiste;?></span>
		<span class="artiste album-artiste"><?php echo $annee;?></span>
		<span class="genre album-genre"><?php echo $genres;?></span>
		<a class="author album-author" href="<?php echo $auteur_link;?>"><?php _e('par','panm360'); ?>: <?php echo $auteur;?></a>
	</div>
</li>