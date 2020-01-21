<li class="aside-item-calendrier element">
		
		<span class="date">
		<?php echo $date;?>
		<img class="vignette" src="<?php echo $vignette;?>" width="80px" height="80px" />
		</span>
		<div class="detail">
			<span class="element-title"><?php echo $artiste?></span>
			<span class="element-location"><?php echo $ville?> - <?php echo $salle;?> - <?php echo $heure;?></span>
			<span class="genre album-genre element-genre"><?php echo $genres?></span>
		</div>
		
		<?php if( $agenda_commente ): ?>
		<a href="<?php echo $permalien;?>"><svg class="icon bleu"><use xlink:href="#plus_cercle"></use></svg></a>
		<?php endif; ?>
</li>