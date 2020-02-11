<?php 

function fn_display_agenda(){
	
	if ( !wp_verify_nonce( $_POST['nonce'], "my_user_like_nonce")) {
		exit("Wesh!");
	}
	
	$year = $_POST['year'];
	$month = $_POST['month'];
	$genre = $_POST['genre'];
	$count = intval( $_POST['count'] );
	$agenda_mini = $_POST['agenda_mini'];
	
	$agenda_start_date = $_POST['agenda_start_date'];
	
	$response['year'] = $year;
	$response['month'] = $month;
	$response['genre'] = $genre;
	$response['count'] = $count;
	$response['agenda_mini'] = $agenda_mini;
	$response['agenda_start_date'] = $agenda_start_date;

	
	$response['type'] = 'success';
	
	$today = date('Y/m/d');
	$today_timestamp = strtotime($today);
	
	$lastDayThisMonth = date("Y/m/t", strtotime($year."/".$month."/01"));
	
	$response['yop'] = $lastDayThisMonth;
	
	
	$start = ( !empty( $agenda_start_date ) ) ? $agenda_start_date : $year.'/'.$month.'/01';
	$end = $lastDayThisMonth;
	
	$month_string = date_i18n('F',  strtotime($start) );
	$year_string = date_i18n('Y',  strtotime($start) );
	

	$events = get_liste_concerts( $start, $end, $count, $genre );


	$counter = 1;
	$timeout = true;
	
	if( count($events) > 0 ):
	
		foreach( $events as $_date => $items ){
			foreach( $items as $item ){
				if( $counter <= $count ){
					ob_start();
					
					include( locate_template( '/template-parts/modules/element-item-calendrier.php', false, false ) );		
					$inside .= ob_get_clean();					
				}

				$counter++;
			}
		}
	
	else:
		//$response['type'] = 'noresult';
		$inside = '<h3>'.__( 'Aucun résultat', 'panm360' ).'</h3>';

	endif;
	
	$genre_nom = ( $genre == 0 ) ? __('Tous les styles','panm360') : get_term( $genre, 'genre' )->name;
	
	$events_list = '<div class="full-month-agenda">';
	$events_list .= '<h4><span class="regular">'.$month_string.'</span> '.$year_string.' <span class="genre-nom">'.$genre_nom.'</span></h4>';
	$events_list .= '<ul class="calendrier-ul-container">';
	$events_list .= $inside;
	$events_list .= '</ul>';
	$events_list .= '</div>';
	
	if( $agenda_mini == 'true' ) $events_list = $inside;
	
	$response['events'] = $events_list;
		
	$response = json_encode( $response );
	
	// response output
	header( "Content-Type: application/json" );
	echo $response;

	die();
}

add_action("wp_ajax_display_agenda", "fn_display_agenda");
add_action("wp_ajax_nopriv_display_agenda", "fn_display_agenda");
?>