<?php

/*
	Template name: Agenda Full
*/

get_header();

$today = date('Y/m/d');
$year = date('Y');
$month =  date('m');
$day = date('d');

$today_timestamp = strtotime($today);

$lastDayThisMonth = date("Y/m/t");

$years = array('2020','2021',/*'2022','2023','2024','2025','2026','2027','2028','2029','2030'*/);

$months = get_months_list();
$_genres = get_main_genres( false );


$dt = new DateTime($today);
$dt->format('Y/m/d');
$dday = $dt->format('j');
$dt->modify('first day of +1 month');
$dt->modify('+' . (min($dday, $dt->format('t')) - 1) . ' days');

$next_month = $dt->format('Y/m/d');
$next_month_month = $dt->format("m");


$next_month_number_of_days = cal_days_in_month(CAL_GREGORIAN, $next_month_month, $year);
$lastDaynextMonth = date("Y/m/t", strtotime($year."/".$next_month_month."/01"));

$next_month_name_string = date_i18n('F',  strtotime($next_month) );
$next_year_name_string = date_i18n('Y',  strtotime($next_month) );

$count = 24;

$is_pub = false;
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<article>
			<?php
				$agendas_commentes = get_agendas_commentes();
				if( count($agendas_commentes) > 0 ):
			?>
			<div id="wrap-square-featured-slider">
				<ul id="square-featured-slider">
					<?php
						
						
						$agendas_commentes = array_slice($agendas_commentes,0, 10);
						foreach( $agendas_commentes as $item ){
							include( locate_template( '/template-parts/modules/element-slider-square.php', false, false ) );
						}
					?>
				</ul><!-- new-featured-slider -->
			</div><!-- wrap-new-featured-slider -->
			<?php endif; ?>
			
							
				<header class="entry-header">
					<h1 class="entry-title has-text-align-center entry-title-agenda"><?php _e('Agenda','panm360'); ?> <span class="bold">360</span></h1>
				</header>
			
				<div class="entry-content">
					<?php the_content();?>
				</div><!-- .entry-content -->
				<section class="wide-screen" id="agenda-filtres-section">
					<form id="agenda-filtres-date">		
						<div class="icon-text">
							<svg class="icon blanc"><use xlink:href="#M_panm"></use></svg>
							<p class="blanc no-margins upper"><?php _e('Recherche','panm360'); ?>:</p>
						</div>
						<p><input class="start" type="text" id="agenda-start" data-date="" placeholder="Du:"></p>
						<p><input class="end" type="text" id="agenda-end"  data-date="" placeholder="Au:"></p>
						<div class="select-light">
							<select id="agenda-genre">
							   <option value="0"><?php _e('Style musical','panm360'); ?></option>
							   <?php foreach( $_genres as $genre): ?>
							   	<option value="<?php echo $genre['id'];?>"><?php echo $genre['name'];?></option>
							   <?php endforeach; ?>							
							</select>
						</div>
						
						<?php $nonce = wp_create_nonce("my_user_like_nonce"); ?>
						<input type="hidden" id="agenda-nonce" value="<?php echo $nonce;?>" />
						<input type="hidden" id="agenda-count" value="1000" />
						<button id="date_search" type="submit" ><?php _e('Chercher','panm360'); ?></button>							
					</form>
					<div id="date_search_message" class="panm360_message">
							<?php _e('Veuillez choisir une date de début et une date de fin pour votre recherche','panm360'); ?>
					</div>
					<div class="loader-filtre-genre"><div></div><div></div><div></div></div>
				</section>
				
				<section>
					<div id="agenda" class="section-inner">
							
						<div class="full-month-agenda current-month">
							<h4><span class="regular"><?php echo date_i18n('F'); ?></span> <?php echo date_i18n('Y'); ?></h4>
					
							<ul class="calendrier-ul-container">
								<?php
									
									
								$trans_calendrier = get_transient( 'agenda_panm' );	
								
								if ( ( false !== $trans_calendrier ) ) {
		
									// Return the array stored in the transient.
									$calendrier = $trans_calendrier;
								
								} else {
									$post_start = 1;
									
									$start = $today;//$year.'/'.$month.'/01';
									//$end = $lastDayThisMonth;
									$end = date('Y/m/d', strtotime("+30 days"));
									
									$calendrier = get_liste_concerts( $start, $end , $count );	
									$count = 1000;
									
									set_site_transient( 'agenda_panm', $calendrier, 1 * DAY_IN_SECONDS );								
								}
									

								
								if( count($calendrier) > 0 ):
								
									foreach( $calendrier as $_date => $items ){
										
										foreach( $items as $item ){
								
											if( $post_start > $count ) break;
												
											if( $is_pub && $post_start-1 == $count/2 ) {
												?>
													<li class="full-row">
												<?php
													include( locate_template( '/template-parts/publicites/publicite-banniere.php', false, false ) );
												?>
													</li>
												<?php
												}
												include( locate_template( '/template-parts/modules/element-item-calendrier.php', false, false ) );
												$post_start++;
											}
									}
								
								else: ?>
								
									<li class="no-result">
										<h3><?php _e('Aucun résultat','panm360'); ?></h3>
									</li>
								
								<?php endif; ?>
							</ul>
							
							<button id="bouton-load-more" ><?php _e('En voir plus','panm360'); ?></button>
			
						</div>
						
						<?php /* ?>
						<div class="full-month-agenda next-month">
							<h4><span class="regular"><?php echo $next_month_name_string; ?></span> <?php echo $next_year_name_string; ?></h4>
							<?php
								$start = $year.'/'.$next_month_month.'/01';
								$end = $lastDaynextMonth;

								include( locate_template( '/template-parts/modules/element-aside-calendrier.php', false, false ) );
							?>					
						</div>
						<?php */ ?>
					</div>
					
				</section>	

			</article>
		</main><!-- #main -->
	</div><!-- #primary -->	


<?php
get_footer();