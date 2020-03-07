<?php
// Add Shortcode
function abos_panm_st( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'type' => 'Premium',
		),
		$atts,
		'abonnement'
	);
		
		if( have_rows('abonnements','options')){
			
			while(have_rows('abonnements','options')){
				the_row();
				
				if ( get_sub_field('nom_abonnement') != $atts['type'] ) {
					continue;
				}
				
				$nom_abonnement = get_sub_field("nom_abonnement","options");
				$description = get_sub_field("description","options");
				$type_dabonnement = get_sub_field("type_dabonnement","options");
				$prix_abonnement = get_sub_field("prix_abonnement","options");
				$dollars = $prix_abonnement["dollars"];//get_field("dollars");
				$cents = $prix_abonnement["cents"];//get_field("cents");
				
				$prefix_class = strtolower($atts['type']);
		
				ob_start();
				
				?>
					<div class="abo-bloc abo-bloc-<?php echo $prefix_class;?>">
						<div>
							<?php if( $prefix_class == 'gratuit' or $prefix_class == 'free'): ?>
								<span class="abo-prix"><?php echo $nom_abonnement;?></span>
							<?php else:  ?>
								<span class="abo-prix"><?php echo $nom_abonnement;?></span>
								<span class="abo-prix"><?php echo $dollars;?><span class="cents">.<?php echo $cents;?>$</span> <span class="frequence">/<?php _e('par mois','panm360-abonnement'); ?></span></span>
							<?php endif; ?>
						</div>
						<div>
							<span class="abo-asset"><?php echo $description;?></span>
						</div>
						<ul id="abonnement-<?php echo $prefix_class;?>" class="ul-abonnement">
							<?php
								if(have_rows('section')){
									while( have_rows('section') ){
										the_row();
										echo '<li class="item-titre"><strong>'.get_sub_field("titre_section").'</strong> </li>';
										if( have_rows('assets') ){
											while( have_rows('assets') ){
												the_row();
												echo '<li class="item-abo">- '.get_sub_field("asset").'</li>';
											}
										}
									}
								}
							?>
						</ul>
						<?php /* ?>
						<div>
							
							<?php
								
								$my_current_lang = apply_filters( 'wpml_current_language', NULL );	
								
								$abo_id = ( $prefix_class == 'gratuit') ? "6972" : "6973";
								
								if( $my_current_lang == 'en' ){
									$abo_id = ( $prefix_class == 'free') ? "10201" : "10200";
								}
								
							?>
							
							<a href="?add-to-cart=<?php echo $abo_id;?>" data-quantity="1" class="bouton product_type_subscription add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo $abo_id;?>" data-product_sku="" aria-label="<?php _e('Ajouter “Abonnement '.$prefix_class.'” à votre panier','panm360'); ?>" rel="nofollow"><?php _e('Je m\'abonne','panm360'); ?></a>
							<!-- <button class=""><?php _e('Je m\'abonne','panm360-abonnement'); ?></button> -->
						</div>
						<?php */ ?>
					</div><!-- abo-bloc abo-bloc-gratuit -->		
				<?php
			}	
		}
		$abo = ob_get_clean();
	return $abo;

}
add_shortcode( 'abonnement', 'abos_panm_st' );
	
?>