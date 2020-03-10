<?php
	
	$post_type = get_post_type( $interview->ID );

?>

<?php if( $post_type == 'interviews'): ?>

<?php

	$title = $interview->post_title;

	$genre = get_genre( $interview->ID ); 
	$permalien = get_permalink( $interview->ID );
	
	$image = get_the_post_thumbnail_url( $interview->ID ,'panm360_home_slider' );//$image_data['sizes']['medium_large'];

	$content = get_field('lead', $interview->ID);
	$author = get_the_author();
	
	//$auteur_id = get_the_author_meta($interview->post_author);
	$Author = get_the_author_meta('display_name', $interview->post_author);
	$auteur_link =  get_author_posts_url( $interview->post_author );	
?>

<div class="article element article-interview">
	<div class="picture">
		<a href="<?php echo $permalien;?>"><img src="<?php echo $image; ?>" width="530" height="500"  alt="title"/></a>
	</div>
	<div class="details">
		<span class="element-title album-title"><a href="<?php echo $permalien;?>"><?php echo $title;?></a></span>
		<a class="author article-author" href="<?php echo $auteur_link;?>"><?php _e('Interview réalisé par','panm360'); ?>: <?php echo $Author;?></a>

		<?php echo $content;?>
		
		<?php if( !empty($genre)): ?>
			<?php echo $genre;?>
		<?php endif; ?>
		
		<p class="lire-la-suite"><a href="<?php echo $permalien;?>"><?php _e('Lire l\'interview','panm360'); ?></a></p>

		
	</div>
</div>

<?php else: ?>

<div class="article element">
	<div class="picture">
		<a href="<?php echo $permalien;?>"><img src="<?php echo $image_src; ?>" width="530" height="500"  alt="title"/></a>
	</div>
	<div class="details">
		<span class="element-title album-title"><a href="<?php echo $permalien;?>"><?php echo $title;?></a></span>
		<p><?php echo $content;?></p>
		
		<?php if( !empty($genre)): ?>
			<?php echo $genre;?>
		<?php endif; ?>
		
		<a class="author article-author" href="<?php echo $auteur_link;?>"><?php _e('par','panm360'); ?>: <?php echo $Author;?></a>
		
		<p class="lire-la-suite"><a href="<?php echo $permalien;?>"><?php _e('Lire la suite','panm360'); ?></a></p>
	</div>
</div>

<?php endif; ?>