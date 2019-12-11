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
					<span class="abo-prix">Gratuit</span>
				</div>
				<div>
					<span class="abo-asset">L’abonnement gratuit permet <span class="cap">CHAQUE MOIS</span></span>
				</div>
				<ul id="abonnement-gratuit" class="ul-abonnement">
					<li class="item-titre"><strong>LIRE</strong> </li>
					<li class="item-abo">- Le calendrier quotidien des concerts</li>
					<li class="item-abo">- <strong>2</strong> critiques d’albums</li>
					<li class="item-abo">- <strong>2</strong> comptes rendus de concerts</li>
					<li class="item-abo">- <strong>1</strong> interview</li>
					<li class="item-abo">- <strong>1</strong> chronique</li>
					<li class="item-abo unavailable">- reportage</li>
					<li class="item-abo">- <strong>1</strong> conversation entre artistes ou spécialistes de différents genres sur un sujet ayant trait à la musique</li>
					<li class="item-abo unavailable">- Texte de vulgarisation</li>
					<li class="item-abo unavailable">- archives</li>
					<li class="item-titre"><strong>ÉCOUTER</strong></li>
					<li class="item-abo">- <strong>1</strong> liste d’écoute</li>
					<li class="item-abo">- <strong>1</strong> balado</li>
					<li class="item-titre"><strong>VISIONNER</strong></li>
					<li class="item-abo">- <strong>1</strong> interview-performance PAN.M@SAT</li>
				</ul>
				<div>
					<button class="">Je m'inscris</button>
				</div>
			</div><!-- abo-bloc abo-bloc-gratuit -->		
		<?php
		$abo = ob_get_clean();
	} else {
		ob_start();
		?>
			<div class="abo-bloc abo-bloc-mensuel-1">
				<div>
					<span class="abo-prix">3<span class="cents">.50$</span> <span class="frequence">/par mois</span></span>
				</div>
				<div>
					<span class="abo-asset">L’abonnement payant permet <span class="cap">CHAQUE SEMAINE</span></span>
				</div>
				<ul id="abonnement-mensuel-1" class="ul-abonnement">
					<li class="item-titre"><strong>LIRE</strong> </li>
					<li class="item-abo">- Le calendrier quotidien des concerts</li>
					<li class="item-abo">- <strong>Toutes</strong> les critiques d’albums</li>
					<li class="item-abo">- <strong>Tous</strong> les comptes rendus de concerts</li>
					<li class="item-abo">- <strong>Toutes</strong> les interviews</li>
					<li class="item-abo">- <strong>Toutes</strong> les chroniques</li>
					<li class="item-abo">- <strong>Tous</strong> nos reportage</li>
					<li class="item-abo">- <strong>Toutes</strong>  les conversations entre artistes ou spécialistes de différents genres sur un sujet ayant trait à la musique</li>
					<li class="item-abo">- <strong>Tous</strong> les textes de vulgarisation</li>
					<li class="item-abo">- <strong>Toutes</strong> nos archives</li>
					<li class="item-titre"><strong>ÉCOUTER</strong></li>
					<li class="item-abo">- <strong>Toutes</strong> nos listes d’écoute</li>
					<li class="item-abo">- <strong>Tous</strong> nos balados</li>
					<li class="item-titre"><strong>VISIONNER</strong></li>
					<li class="item-abo">- <strong>Toutes</strong> nos interviews-performances PAN.M@SAT</li>
				</ul>
				<div>
					<button class="">Je m'abonne</button>
				</div>
			</div><!-- abo-bloc abo-bloc-gratuit -->		
		<?php
		$abo = ob_get_clean();		
	}
	return $abo;

}
add_shortcode( 'abonnement', 'abos_panm_st' );
	
?>