

<?php if( !empty($article->ID) && get_post_type( $article->ID ) == 'interviews'): ?>

<?php

	$title = $article->post_title;

	$genre = get_genre( $article->ID ); 
	$permalien = get_permalink( $article->ID );
	
	$image = get_the_post_thumbnail_url( $article->ID ,'panm360_home_slider' );//$image_data['sizes']['medium_large'];
	

	
	if( $image == false ){
		$image = get_replacement_image('panm360_home_slider' );
	}
	
	$content = get_field('lead', $article->ID);
	$author = get_the_author();
	
	$author = get_the_author_meta('display_name', $article->post_author);
	$auteur_link =  get_author_posts_url( $article->post_author );
	
	$free = get_field('rendre_ce_contenu_accessible_dans_abonnement',$article->ID);
	$iam_free = ($free == '1') ? '<div class="iam-free">'.__('gratuit','panm360').'</div>' : '';

?>
<div class="article element article-interview">
	<div class="picture">
		<a href="<?php echo $permalien;?>"><img src="<?php echo $image; ?>" width="530" height="500"  alt="title"/><?php echo $iam_free;?></a>
	</div>
	<div class="details">
		<span class="element-title album-title"><a href="<?php echo $permalien;?>"><?php echo $title;?></a></span>
		<a class="author article-author" href="<?php echo $auteur_link;?>"><?php _e('Interview réalisé par','panm360'); ?>: <?php echo $author;?></a>

		<?php echo $content;?>
		
		<?php if( !empty($genre)): ?>
			<span class="genre album-genre"><?php echo $genre;?></span>
		<?php endif; ?>
		
		<p class="lire-la-suite"><a href="<?php echo $permalien;?>"><?php _e('Lire l\'interview','panm360'); ?></a></p>

		
	</div>
</div>


<?php //elseif( !empty($article->ID) && get_post_type( $article->ID ) == 'post' && $regarder_args['category__in'][0] == 5104 ) : ?>



<?php else: ?>

<?php
	
	$post_id = get_the_id();

	$image = get_image_thumb_article( $post_id , 'panm360_home_slider'  );
	
	$permalien = get_permalink( $post_id );
	$free = get_field('rendre_ce_contenu_accessible_dans_abonnement',$post_id);
	$iam_free = ($free == '1') ? '<div class="iam-free">'.__('gratuit','panm360').'</div>' : '';
	
	$title = get_the_title();
	
	$genre = get_genre( $post_id ,true );
	
	$author = get_the_author_meta('display_name', $article->post_author);
	$author_nicename = get_the_author_meta('nicename', $article->post_author);
	$auteur_link =  get_author_posts_url( $article->post_author , $author_nicename);
	
	//$content = return_post_excerpt_list_item( $post_id );
	$content = return_post_excerpt_list_item( $post_id );
	$lead = get_field('lead');
	
	if( $lead == false ):
		//$lead = get_first_paragraph($post_id);
		$lead = $content;
	endif;		
?>

<div  id="article-element-<?php echo $post_id;?>" class="article element">
	<div class="picture">
		<a href="<?php echo $permalien;?>"><img src="<?php echo $image; ?>" width="530" height="500"  alt="title"/><?php echo $iam_free;?></a>
	</div>
	<div class="details">
		<span class="element-title album-title"><a href="<?php echo $permalien;?>"><?php echo $title;?></a></span>
		<div class="element-lead"><?php echo $lead;?></div>
		
		<?php if( !empty($genre)): ?>
			<span class="genre album-genre"><?php echo $genre;?></span>
		<?php endif; ?>
		
		<a class="author article-author" href="<?php echo $auteur_link;?>"><?php _e('par','panm360'); ?>: <?php echo $author;?></a>
		
		<p class="lire-la-suite"><a href="<?php echo $permalien;?>"><?php _e('Lire la suite','panm360'); ?></a></p>
	</div>
</div>

<?php endif; ?>