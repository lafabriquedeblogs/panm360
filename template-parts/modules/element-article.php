<div class="article element">
	<div class="picture">
		<a href="<?php echo $permalien;?>"><img src="<?php echo get_template_directory_uri(); ?>/src/img/sample-article.png" width="500" height="500"  alt="title"/></a>
	</div>
	<div class="details">
		<span class="element-title album-title"><a href="<?php echo $permalien;?>"><?php echo $Title;?></a></span>
		<p>Maecenas ex diam, tempor viverra eros id, mattis ornare diam aenean.</p>
		<?php echo $genre;?>
		<a class="author article-author" href="<?php echo $auteur_link;?>"><?php _e('par','panm360'); ?>: <?php echo $Author;?></a>
	</div>
</div>