<?php

	$from = strtotime("2020-06-05");
	$to = strtotime("2021-07-31");
	$to_day = date("Y-m-d");
	$today = strtotime($to_day);
		
	if( $from <= $today && $to >= $today && is_front_page() ):
?>

<section class="publicite publicite-banniere" style="margin: -30px 0 90px 0;">
	<a href=" https://www.analekta.com/ecoutons-nous/?utm_source=PAN%20M%20360&utm_medium=Leaderboard&utm_campaign=%C3%89coutons-nous%20!" target="_blank">
		<img src="https://panm360.com/wp-content/uploads/2020/06/ecoutons-nous-pan.m.jpg" width="728" height="90" alt="publicite"/>
	</a> 
</section>

<?php endif; ?>