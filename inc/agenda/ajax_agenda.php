<?php 

function fn_display_agenda(){
	
	if ( !wp_verify_nonce( $_POST['nonce'], "my_user_like_nonce")) {
		exit("Wesh!");
	}
	
	$year = $_POST['year'];
	$month = $_POST['month'];
	$genre = $_POST['genre'];
	
	$response['year'] = $year;
	$response['month'] = $month;
	$response['genre'] = $genre;
	$response['type'] = 'success';
	
	$lastDayThisMonth = date("Y/m/t", strtotime($year."/".$month."/01"));
	
	$response['yop'] = $lastDayThisMonth;
	
	$count = 1000;
	$start = $year.'/'.$month.'/01';
	$end = $lastDayThisMonth;
	
	$month_string = date_i18n('F',  strtotime($start) );
	$year_string = date_i18n('Y',  strtotime($start) );
	
	$events = get_liste_concerts( $start, $end, $count, $genre );

	if( count($events) > 0 ):
	
		foreach( $events as $_date => $items ){
			foreach( $items as $item ){
				ob_start();
					include( locate_template( '/template-parts/modules/element-item-calendrier.php', false, false ) );		
				$inside .= ob_get_clean();
			}
		}
	
	else:
		
		$inside = '<li class="no-result"><h3>'.__( 'Aucun résultat', 'panm360' ).'</h3></li>';

	endif;
	
	$genre_nom = get_term( $genre, 'genre' );
	
	$events_list = '<div class="full-month-agenda">';
	$events_list .= '<h4><span class="regular">'.$month_string.'</span> '.$year_string.' - '.$genre_nom->name.'</h4>';
	$events_list .= '<ul class="calendrier-ul-container">';
	$events_list .= $inside;
	$events_list .= '</ul>';
	$events_list .= '</div>';
	
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