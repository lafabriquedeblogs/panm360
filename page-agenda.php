<?php

/*
	Template name: Agenda Full
*/

get_header();

$today = date('Y/m/d');
$year = date('Y');
$month =  date('m');
$day = date('d');


$lastDayThisMonth = date("Y/m/t");

$years = array('2020','2021','2022','2023','2024','2025','2026','2027','2028','2029','2030');

$months = get_months_list();
$genres = get_main_genres( false );

$dt = new DateTime($today);
$dt->format('Y/m/d');
$dday = $dt->format('j');
$dt->modify('first day of +1 month');
$dt->modify('+' . (min($dday, $dt->format('t')) - 1) . ' days');
$next_month = $dt->format('Y/m/d');
$next_month_month = $dt->format("m");


$next_month_number_of_days = cal_days_in_month(CAL_GREGORIAN, $next_month_month, $year);
$lastDaynextMonth = date("Y/m/t", strtotime($year."/".$next_month_month."/01"));

$next_month_string = date_i18n('F Y',  strtotime($next_month) );

$count = 1000;

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<article>
				<header class="entry-header section">
					<h1 class="entry-title has-text-align-center"><?php the_title(); ?></h1>
				</header>
			
				<div class="entry-content">
					<?php the_content();?>
				</div><!-- .entry-content -->
				
				<section class="section">
					<form id="agenda-filtres">
						<select id="agenda-year">
							<option value=""><?php _e('Année','panm360'); ?></option>
							<?php
								
								foreach( $years as $cyear ): 
								$selected = ($cyear == $year) ? 'selected' : ''; 
							?>
								
								<option value="<?php echo $cyear;?>" <?php echo $selected;?>><?php echo $cyear;?></option>
							<?php endforeach; ?>
						</select>
						<select id="agenda-month">
							<option value=""><?php _e('Mois','panm360'); ?></option>
							<?php foreach( $months as $m => $string):
								$selected = ($m == $month) ? 'selected' : ''; 
							?>
								<option value="<?php echo $m;?>" <?php echo $selected;?>><?php echo $string;?></option>
							<?php endforeach; ?>
						</select>
						<select id="agenda-genre">
							<option value="0"><?php _e('Genre','panm360'); ?> - <?php _e('Tous','panm360'); ?></option>
							<?php foreach( $genres as $genre): ?>
								<option value="<?php echo $genre['id'];?>"><?php echo $genre['name'];?></option>
							<?php endforeach; ?>							
						</select>
						<?php $nonce = wp_create_nonce("my_user_like_nonce"); ?>
						<input type="hidden" id="agenda-nonce" value="<?php echo $nonce;?>" />
						<button type="submit"><?php _e('Chercher','panm360'); ?></button>
					</form>
				</section>
				
				<section class="section">
					<div id="agenda" class="section-inner">
						
						<div class="full-month-agenda current-month">
							<h4><?php echo date_i18n('F Y'); ?></h4>
							<?php
								$start = $year.'/'.$month.'/01';
								$end = $lastDayThisMonth;
								include( locate_template( '/template-parts/modules/element-aside-calendrier.php', false, false ) );
							?>					
						</div>
						
						<div class="full-month-agenda next-month">
							<h4><?php echo $next_month_string; ?></h4>
							<?php
								$start = $year.'/'.$next_month_month.'/01';
								$end = $lastDaynextMonth;

								include( locate_template( '/template-parts/modules/element-aside-calendrier.php', false, false ) );
							?>					
						</div>
					
					</div>
					
				</section>	

			</article>
		</main><!-- #main -->
	</div><!-- #primary -->	

<?php
get_footer();