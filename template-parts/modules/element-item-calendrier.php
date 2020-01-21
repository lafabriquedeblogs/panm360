<li class="aside-item-calendrier element">
		
		<span class="date"><span style="font-size: 10px;font-weight: 700;"><?php echo $year;?></span><br><?php echo $date;?></span>
		<div class="detail">
			<span class="element-title"><?php echo $artiste?></span>
			<span class="element-location"><?php echo $ville?> - <?php echo $salle;?> - <?php echo $heure;?></span>
			<span class="genre album-genre element-genre"><?php echo $genres?></span>
		</div>
		
		<?php if( $agenda_commente ): ?>
		<a href="<?php echo $permalien;?>"><svg class="icon bleu"><use xlink:href="#plus_cercle"></use></svg></a>
		<?php endif; ?>
</li>