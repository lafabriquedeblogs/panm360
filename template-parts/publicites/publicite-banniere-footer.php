<?php
	
	$from = strtotime("2020-02-19");
	$to = strtotime("2020-02-23");
	$to_day = date("Y-m-d");
	$today = strtotime($to_day);
	
	if( $from < $today && $to > $today && is_front_page() ):
		
?>

	<section class="publicite publicite-banniere">
		<a href="https://sixmedia.ca/" target="_blank">
			<img src="https://panm360.com/wp-content/uploads/2020/02/728X90.jpg" width="728" height="90" alt="publicite"/>
		</a> 
	</section>


<?php else: ?>

	<?php get_template_part( '/template-parts/publicites/publicite', 'banniere-google' ); ?>

<?php endif; ?>