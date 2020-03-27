

<?php if( !empty($interview->ID) && get_post_type( $interview->ID ) == 'interviews'): ?>

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
	
	$free = get_field('rendre_ce_contenu_accessible_dans_abonnement',$interview->ID);
	$iam_free = ($free == '1') ? '<div class="iam-free">'.__('gratuit','panm360').'</div>' : '';

?>
<div class="article element article-interview">
	<div class="picture">
		<a href="<?php echo $permalien;?>"><img src="<?php echo $image; ?>" width="530" height="500"  alt="title"/><?php echo $iam_free;?></a>
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

<?php
	
	$post_id = get_the_id();
	$image = get_the_post_thumbnail_url( $post_id ,'panm360_home_slider' );//$image_data['sizes']['medium_large'];
	$permalien = get_permalink( $post_id );
	$free = get_field('rendre_ce_contenu_accessible_dans_abonnement',$post_id);
	$iam_free = ($free == '1') ? '<div class="iam-free">'.__('gratuit','panm360').'</div>' : '';
	
	$title = get_the_title();
	$genre = get_genre( $post_id ); 	

	$author = get_the_author();
	$auteur_link =  esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );
	
	$content = return_post_excerpt_list_item( $post_id );
	
?>

<div class="article element">
	<div class="picture">
		<a href="<?php echo $permalien;?>"><img src="<?php echo $image; ?>" width="530" height="500"  alt="title"/><?php echo $iam_free;?></a>
	</div>
	<div class="details">
		<span class="element-title album-title"><a href="<?php echo $permalien;?>"><?php echo $title;?></a></span>
		<p><?php echo $content;?></p>
		
		<?php if( !empty($genre)): ?>
			<span class="genre album-genre"><?php echo $genre;?></span>
		<?php endif; ?>
		
		<a class="author article-author" href="<?php echo $auteur_link;?>"><?php _e('par','panm360'); ?>: <?php echo $author;?></a>
		
		<p class="lire-la-suite"><a href="<?php echo $permalien;?>"><?php _e('Lire la suite','panm360'); ?></a></p>
	</div>
</div>

<?php endif; ?>