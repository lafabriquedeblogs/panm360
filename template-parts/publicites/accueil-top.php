<?php
	
	$publicite_top_accueil = get_field("titre_accueil_top","option");
	$image_accueil_top = get_field("image_accueil_top","option");
	$lien_accueil_top = get_field("lien_accueil_top","option");
	$date_de_debut_accueil_top = get_field("date_de_debut_accueil_top","option");
	$date_de_fin_accueil_top = get_field("date_de_fin_accueil_top","option");
	
	$from = strtotime($date_de_debut_accueil_top);
	$to = strtotime($date_de_fin_accueil_top);

	$to_day = date("Y-m-d H:i:s");
	$today = strtotime($to_day);
	
	if( $from <= $today && $to >= $today && is_front_page() ):
?>	
		<section class="publicite publicite-banniere" style="margin: 40px 0;">
			<a href="<?php echo $lien_accueil_top;?>" target="_blank">
				<img src="<?php echo $image_accueil_top["url"];?>" width="728" height="90" alt="publicite"/>
			</a> 
		</section>

<?php endif; ?>