<li class="aside-item element">
	<div class="picture">
		<a href="<?php echo $permalien;?>"><img src="<?php echo $image; ?>" width="500" height="500"  alt="title"/></a>
	</div>
	<div class="details">
		<div class="liste-genre"><?php echo $genre;?></div>
		<span class="element-title album-title"><a href="<?php echo $permalien;?>"><?php echo $Title;?></a></span>
		<a class="author article-author" href="<?php echo $auteur_link;?>"><?php _e('par','panm360'); ?>: <?php echo $Author;?></a>
	</div>
</li>