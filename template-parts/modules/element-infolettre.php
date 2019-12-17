	<?php
		
		//$infolettre_page_id = 5573;
		$infolettre_page_id = apply_filters( 'wpml_object_id', 4508, 'page' );
		$infolettre_page_permalink = get_permalink( $infolettre_page_id );

	?>
	<section class="section infolettre">	
		<div class="panm360-infolettre">
			<span class="infolettre-titre"><?php _e('Abonnez-vous à l\'infolettre','panm360'); ?></span>
			<svg class="icon"><use xlink:href="#panm360"></use></svg>
			<button onclick="window.location.href = '<?php echo $infolettre_page_permalink;?>'"><?php _e('M\'abonner','panm360'); ?></button>
		</div>
	</section>