<div class="main-item element">
	<div class="picture">
		<a href="<?php echo $permalien;?>"><img src="<?php echo $image; ?>" width="500" height="500"  alt="title"/></a>
	</div>
	<div class="details">
		<div class="liste-genres"><?php echo $genre;?></div>
		<h4 class="element-title album-title"><a href="<?php echo $permalien;?>"><?php echo $Title;?></a></h4>
		
		<?php if( $Sous_titre ): ?>
			<span class="sub-title"><?php echo $Sous_titre;?></span>
		<?php endif; ?>
		
		<p><?php echo $excerpt;?></p>
		<a class="author article-author" href="<?php echo $auteur_link;?>"><?php _e('par','panm360'); ?>: <?php echo $Author;?></a>
	</div>
</div>