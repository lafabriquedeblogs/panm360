<?php
	
	$publicite_bottom_accueil = get_field("titre_accueil_bottom","option");
	$image_accueil_bottom = get_field("image_accueil_bottom","option");
	$lien_accueil_bottom = get_field("lien_accueil_bottom","option");
	$date_de_debut_accueil_bottom = get_field("date_de_debut_accueil_bottom","option");
	$date_de_fin_accueil_bottom = get_field("date_de_fin_accueil_bottom","option");
	
	$from = strtotime($date_de_debut_accueil_bottom);
	$to = strtotime($date_de_fin_accueil_bottom);

	$to_day = date("Y-m-d H:i:s");
	$today = strtotime($to_day);
	
	if( $from <= $today && $to >= $today && is_front_page() ):
?>	
		<section class="publicite publicite-banniere" style="margin: 40px 0;">
			<a href="<?php echo $lien_accueil_bottom;?>" target="_blank">
				<img src="<?php echo $image_accueil_bottom["url"];?>" width="728" height="90" alt="publicite"/>
			</a> 
		</section>

<?php endif; ?>