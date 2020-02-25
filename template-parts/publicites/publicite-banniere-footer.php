<?php
	
	$footer_to_day = date("Y-m-d");
	$footer_today = strtotime($footer_to_day);
?>


<?php
	if( is_front_page() ){
	
	$from = strtotime("2020-02-19");
	$to = strtotime("2020-02-23");
	
	if( $from < $footer_today && $to > $footer_today ):
		
?>

	<section class="publicite publicite-banniere">
		<a href="https://sixmedia.ca/" target="_blank">
			<img src="wp-content/uploads/2020/02/728X90.jpg" width="728" height="90" alt="publicite"/>
		</a> 
	</section>


	<?php else: ?>
	
		<?php get_template_part( '/template-parts/publicites/publicite', 'banniere-google' ); ?>
	
	<?php endif; ?>

<?php } ?>


<?php
	
	unset($from);
	unset($to);
	
	if( is_page( 2691) || is_page(5750) ){
	
	$from_2 = strtotime("2020-02-23");
	$to_2 = strtotime("2020-03-01");
	
	
		if( $from_2 < $footer_today && $to_2 > $footer_today ):
		
?>
			<section class="publicite publicite-banniere">
				<a href="https://sixmedia.ca/" target="_blank">
					<img src="/wp-content/uploads/2020/02/728X90.jpg" width="728" height="90" alt="publicite"/>
				</a> 
			</section>
		
		<?php else: ?>
		
			<?php get_template_part( '/template-parts/publicites/publicite', 'banniere-google' ); ?>
		
		<?php endif; ?>
	
<?php } ?>