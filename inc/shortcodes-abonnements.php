<?php
	// Add Shortcode
function abos_panm_st( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'type' => 'mensuel-1',
		),
		$atts,
		'abonnement'
	);
	
	if( $atts['type'] == 'gratuit' ){
		ob_start();
		?>
			<div class="abo-bloc abo-bloc-gratuit">
				<div>
					<span class="abo-prix"><?php _e('Gratuit','panm360-abonnement'); ?></span>
				</div>
				<div>
					<span class="abo-asset"><?php _e('L’abonnement gratuit permet','panm360-abonnement'); ?> <span class="cap"><?php _e('CHAQUE MOIS','panm360-abonnement'); ?></span>:</span>
				</div>
				<ul id="abonnement-gratuit" class="ul-abonnement">
					<li class="item-titre"><strong><?php _e('LIRE','panm360-abonnement'); ?></strong> </li>
					<li class="item-abo">- <?php _e('Le calendrier quotidien des concerts','panm360-abonnement'); ?></li>
					<li class="item-abo">- <strong>2</strong> <?php _e('critiques d’albums','panm360-abonnement'); ?></li>
					<li class="item-abo">- <strong>2</strong> <?php _e('comptes rendus de concerts','panm360-abonnement'); ?></li>
					<li class="item-abo">- <strong>1</strong> <?php _e('interview','panm360-abonnement'); ?></li>
					<li class="item-abo">- <strong>1</strong> <?php _e('chronique','panm360-abonnement'); ?></li>
					<li class="item-abo">- <strong>1</strong> <?php _e('conversation entre artistes ou spécialistes de différents genres sur un sujet ayant trait à la musique','panm360-abonnement'); ?></li>
					
					<li class="item-titre"><strong><?php _e('ÉCOUTER','panm360-abonnement'); ?></strong></li>
					<li class="item-abo">- <strong>1</strong> <?php _e('liste d’écoute','panm360-abonnement'); ?></li>
					<li class="item-abo">- <strong>1</strong> <?php _e('balado','panm360-abonnement'); ?></li>
					
					<li class="item-titre"><strong><?php _e('VISIONNER','panm360-abonnement'); ?></strong></li>
					<li class="item-abo">- <strong>1</strong> <?php _e('interview-performance PAN.M@SAT','panm360-abonnement'); ?></li>
				</ul>
				<div>
					<!-- <button class=""><?php _e('Je m\'inscris','panm360-abonnement'); ?></button> -->
				</div>
			</div><!-- abo-bloc abo-bloc-gratuit -->		
		<?php
		$abo = ob_get_clean();
	} else {
		ob_start();
		?>
			<div class="abo-bloc abo-bloc-mensuel-1">
				<div>
					<span class="abo-prix">3<span class="cents">.50$</span> <span class="frequence">/<?php _e('par mois','panm360-abonnement'); ?></span></span>
				</div>
				<div>
					<span class="abo-asset"><?php _e('L’abonnement payant permet','panm360-abonnement'); ?> <span class="cap"><?php _e('CHAQUE SEMAINE','panm360-abonnement'); ?></span>:</span>
				</div>
				<ul id="abonnement-mensuel-1" class="ul-abonnement">
					
					<li class="item-titre"><strong><?php _e('LIRE','panm360-abonnement'); ?></strong> </li>
					<li class="item-abo">- <?php _e('Le calendrier quotidien des concerts','panm360-abonnement'); ?></li>
					<li class="item-abo">- <strong><?php _e('Toutes','panm360-abonnement'); ?></strong> <?php _e('les critiques d’albums','panm360-abonnement'); ?></li>
					<li class="item-abo">- <strong><?php _e('Tous','panm360-abonnement'); ?></strong> <?php _e('les comptes rendus de concerts','panm360-abonnement'); ?></li>
					<li class="item-abo">- <strong><?php _e('Toutes','panm360-abonnement'); ?></strong> <?php _e('les interviews','panm360-abonnement'); ?></li>
					<li class="item-abo">- <strong><?php _e('Toutes','panm360-abonnement'); ?></strong> <?php _e('les chroniques','panm360-abonnement'); ?></li>
					<li class="item-abo">- <strong><?php _e('Tous','panm360-abonnement'); ?></strong> <?php _e('nos reportages','panm360-abonnement'); ?></li>
					<li class="item-abo">- <strong><?php _e('Toutes','panm360-abonnement'); ?></strong>  <?php _e('les conversations entre artistes ou spécialistes de différents genres sur un sujet ayant trait à la musique','panm360-abonnement'); ?></li>
					<li class="item-abo">- <strong><?php _e('Tous','panm360-abonnement'); ?></strong> <?php _e('les textes de vulgarisation','panm360-abonnement'); ?></li>
					<li class="item-abo">- <strong><?php _e('Toutes','panm360-abonnement'); ?></strong> <?php _e('nos archives','panm360-abonnement'); ?></li>
					
					<li class="item-titre"><strong><?php _e('ÉCOUTER','panm360-abonnement'); ?></strong></li>
					<li class="item-abo">- <strong><?php _e('Toutes','panm360-abonnement'); ?></strong> <?php _e('nos listes d’écoute','panm360-abonnement'); ?></li>
					<li class="item-abo">- <strong><?php _e('Tous','panm360-abonnement'); ?></strong> <?php _e('nos balados','panm360-abonnement'); ?></li>
					
					<li class="item-titre"><strong><?php _e('VISIONNER','panm360-abonnement'); ?></strong></li>
					<li class="item-abo">- <strong><?php _e('Toutes','panm360-abonnement'); ?></strong> <?php _e('nos interviews-performances PAN.M@SAT','panm360-abonnement'); ?></li>
				</ul>
				<div>
					<!-- <button class=""><?php _e('Je m\'abonne','panm360-abonnement'); ?></button> -->
				</div>
			</div><!-- abo-bloc abo-bloc-gratuit -->		
		<?php
		$abo = ob_get_clean();		
	}
	return $abo;

}
add_shortcode( 'abonnement', 'abos_panm_st' );
	
?>