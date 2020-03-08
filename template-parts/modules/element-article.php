<?php
	
	$post_type = get_post_type( $post_id );
	
?>

<?php if( $post_type == 'interviews'): ?>

<?php

/*
	$title = $interview->post_title;
	$content = return_acf_block_content_interview_introduction_presentation( $interview->post_content, 'acf/header-interview', $interview->ID );
	$genre = get_genre( $interview->ID ); 
	$permalien = $interview->guid;
	
	$attachment_id = return_acf_block_content_interview_introduction_image( $interview->post_content, 'acf/header-interview', $interview->ID );
	
	$image_src_array = wp_get_attachment_image_src( $attachment_id, 'panm360_home_slider' );
	$image_src = $image_src_array[0];
	
	$auteur_id = get_the_author_meta($interview->post_author);
	$Author = get_the_author_meta('display_name', $auteur_id);
	$auteur_link =  get_author_posts_url( $auteur_id );	
*/
?>

<div class="article element article-interview">
	<div class="picture">
		<a href="<?php echo $permalien;?>"><img src="<?php echo $image_src; ?>" width="530" height="500"  alt="title"/></a>
	</div>
	<div class="details">
		<span class="element-title album-title"><a href="<?php echo $permalien;?>"><?php echo $title;?></a></span>
		<a class="author article-author" href="<?php echo $auteur_link;?>"><?php _e('Interview réalisé par','panm360'); ?>: <?php echo $Author;?></a>

		<p><?php echo $content;?></p>
		
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