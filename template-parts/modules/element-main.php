<?php
	
	$post_type = get_post_type( $post_id );
	
?>

<?php if( $post_type == 'interviews'): ?>


<?php

	
	$title = $interview->post_title;

	$words = 50 ;
	$more = '…';
	$content = return_acf_block_content_interview_introduction_presentation( $interview->post_content, 'acf/header-interview', $interview->ID );
	$content = wp_trim_words( $content, $words, $more );
	
	$genre = get_genre( $interview->ID ); 
	$permalien = $interview->guid;
	
	$attachment_id = return_acf_block_content_interview_introduction_image( $interview->post_content, 'acf/header-interview', $interview->ID );
	
	$image_src_array = wp_get_attachment_image_src( $attachment_id, 'panm360_square' );
	$image_src = $image_src_array[0];
	
	$auteur_id = get_the_author_meta($interview->post_author);
	$Author = get_the_author_meta('display_name');
	$auteur_link =  get_author_posts_url($auteur_id) ;	
	
?>

<div class="main-item element main-interview">
	<div class="picture">
		<a href="<?php echo $permalien;?>"><img src="<?php echo $image_src;?>" width="530" height="530"  alt="title"/></a>
	</div>
	<div class="details">
		<!-- <a class="genre article-genre" href="">Genre</a> -->
		
		<?php if( !empty($genre)): ?>
			<?php echo $genre;?>
		<?php endif; ?>
		
		<h4 class="element-title album-title"><a href="<?php echo $permalien;?>"><?php echo $title;?></a></h4>
		<a class="author article-author" href="<?php echo $auteur_link;?>"><?php _e('Interview réalisé par','panm360'); ?>: <?php echo $Author;?></a>
		
		<p class="intro-interview"><?php echo $content;?></p>
		<p class="lire-la-suite"><a href="<?php echo $permalien;?>"><?php _e('Lire l\'interview','panm360'); ?></a></p>
	</div>
</div>

<?php else: ?>


<div class="main-item element">
	
	<div class="picture">
		<a href="<?php echo $permalien;?>"><img src="<?php echo $image; ?>" width="500" height="500"  alt="title"/></a>
	</div>
	
	<div class="details">
		
		<?php if( !empty($genre)): ?>
			<?php echo $genre;?>
		<?php endif; ?>
		
		<h4 class="element-title album-title"><a href="<?php echo $permalien;?>"><?php echo $Title;?></a></h4>
		
		<?php if( $Sous_titre ): ?>
			<span class="sub-title"><?php echo $Sous_titre;?></span>
		<?php endif; ?>
		
		<p><?php echo $excerpt;?></p>
		<a class="author article-author" href="<?php echo $auteur_link;?>"><?php _e('par','panm360'); ?>: <?php echo $Author;?></a>
		<p class="lire-la-suite"><a href="<?php echo $permalien;?>"><?php _e('Lire la suite','panm360'); ?></a></p>


	</div>
</div>


<?php endif; ?>
