
<?php if( !empty($article->ID) && get_post_type( $article->ID ) == 'interviews'): ?>


<?php

	
	$title = $article->post_title;
	
	$image = get_the_post_thumbnail_url( $article->ID ,'medium_large' );//$image_data['sizes']['medium_large'];

	$content = get_field('lead', $article->ID);
	
	$genre = get_genre( $article->ID ); 
	$permalien = get_permalink( $article->ID );


	$author = get_the_author_meta('display_name', $article->post_author);
	$auteur_link =  get_author_posts_url( $article->post_author );
		
	
	$free = get_field('rendre_ce_contenu_accessible_dans_abonnement',$article->ID);
	$iam_free = ($free == '1') ? '<div class="iam-free">'.__('gratuit','panm360').'</div>' : '';	
?>

<div class="main-item element main-interview">
	<div class="picture" style="background: url(<?php echo $image;?>) center center no-repeat;background-size:cover;">
		<a href="<?php echo $permalien;?>"><img class="hidden" src="<?php echo $image;?>" width="530" height="530"  alt="title"/><?php echo $iam_free;?></a>
	</div>
	<div class="details">
		<!-- <a class="genre article-genre" href="">Genre</a> -->
		
		<?php if( !empty($genre)): ?>
			<?php echo $genre;?>
		<?php endif; ?>
		
		<h4 class="element-title album-title"><a href="<?php echo $permalien;?>"><?php echo $title;?></a></h4>
		<a class="author article-author" href="<?php echo $auteur_link;?>"><?php _e('Interview réalisé par','panm360'); ?>: <?php echo $author;?></a>
		
		<div class="intro-interview"><?php echo $content;?></div>
		<p class="lire-la-suite"><a href="<?php echo $permalien;?>"><?php _e('Lire l\'interview','panm360'); ?></a></p>
	</div>
</div>

<?php else:
	
	$post_id = get_the_id();
	$title = get_the_title();
	
	$image = get_the_post_thumbnail_url( $post_id ,'medium_large' );//$image_data['sizes']['medium_large'];

	$content = return_post_excerpt_list_item( $post_id );
	
	//$genre = get_genre( $post_id ); 
	$genre = get_genre( $post_id ,true ); 

	$permalien = get_permalink( $post_id );
	
	$author = get_the_author_meta('display_name', $article->post_author);
	$auteur_link =  get_author_posts_url( $article->post_author );
		
	$free = get_field('rendre_ce_contenu_accessible_dans_abonnement',$article->ID);
	$iam_free = ($free == '1') ? '<div class="iam-free">'.__('gratuit','panm360').'</div>' : '';		
	
	
?>


<div id="main-element-<?php echo $post_id;?>" class="main-item element">
	
	<div class="picture"  style="background: url(<?php echo $image;?>) center center no-repeat;background-size:cover;">
		<a href="<?php echo $permalien;?>"><img class="hidden" src="<?php echo $image; ?>" width="500" height="500"  alt="title"/><?php echo $iam_free;?></a>
	</div>
	
	<div class="details">
		
		<?php if( !empty($genre)): ?>
			<span class="genre album-genre"><?php echo $genre;?></span>
		<?php endif; ?>
		
		<h4 class="element-title album-title"><a href="<?php echo $permalien;?>"><?php echo $title;?></a></h4>
		
		<?php if( $Sous_titre ): ?>
			<span class="sub-title"><?php echo $Sous_titre;?></span>
		<?php endif; ?>
		
		<p><?php echo $content;?></p>
		<a class="author article-author" href="<?php echo $auteur_link;?>"><?php _e('par','panm360'); ?>: <?php echo $author;?></a>
		<p class="lire-la-suite"><a href="<?php echo $permalien;?>"><?php _e('Lire la suite','panm360'); ?></a></p>


	</div>
</div>


<?php endif; ?>
