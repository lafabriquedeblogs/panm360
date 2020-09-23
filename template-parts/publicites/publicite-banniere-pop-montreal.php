<?php

	$from = strtotime("2020-09-23");
	$to = strtotime("2020-10-02");
	$to_day = date("Y-m-d");
	$today = strtotime($to_day);
		
	if( $from <= $today && $to >= $today && is_front_page() ):
?>

<section class="publicite publicite-banniere" style="margin:40px 0;">
	<a href="https://lefunhouse.ca/" target="_blank">
		<img src="https://panm360.com/wp-content/uploads/2020/09/POP20_web_728x90_Generique_fr.gif" width="728" height="90" alt="publicite"/>
	</a> 
</section>

<?php endif; ?>