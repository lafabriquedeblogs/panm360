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
	
	$pochette = get_the_post_thumbnail_url( $album_id, array(500,500) );
	
	if( !$pochette ) $pochette =  get_template_directory_uri()."/src/img/sample-album.png";
	
?>

<li class="album element" data-filter="<?php echo $data_genre." ".$data_annee." ".$auteur;?>">
	<div class="picture">
		<a href="<?php echo $lien;?>"><img class="lozad" data-src="<?php echo $pochette; ?>" alt="<?php echo $titre;?>"/></a>
	</div>
	<div class="details">
		<span class="element-title album-title"><a href="<?php echo $lien;?>"><?php echo $titre;?></a></span>
		<span class="artiste album-artiste"><?php echo $artiste;?></span>
		<span class="artiste album-annee"><?php echo $annee;?></span>
		<span class="genre album-genre"><?php echo $genres;?></span>
		<a class="author album-author" href="<?php echo $auteur_link;?>"><?php _e('par','panm360'); ?> <?php echo $auteur;?></a>
	</div>
</li>