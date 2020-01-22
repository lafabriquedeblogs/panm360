<?php
	
	//dates
	//date_concert
	//heure_concert
	//_date_concert

	/**
	 * Returns every date between two dates as an array
	 * @param string $startDate the start of the date range
	 * @param string $endDate the end of the date range
	 * @param string $format DateTime format, default is Y-m-d
	 * @return array returns every date between $startDate and $endDate, formatted as "Y-m-d"
	 */
	function createDateRange($startDate, $endDate, $format = "Ymd")
	{
	    $begin = new DateTime($startDate);
	    $end = new DateTime($endDate);
	
	    $interval = new DateInterval('P1D'); // 1 Day
	    $dateRange = new DatePeriod($begin, $interval, $end);
	
	    $range = [];
	    foreach ($dateRange as $date) {
	        $range[] = $date->format($format);
	    }
	
	    return $range;
	}

	function array_flatten($array) {
	
	   $return = array();
	   foreach ($array as $key => $value) {
	       if (is_array($value)){ $return = array_merge($return, array_flatten($value));}
	       else {$return[$key] = $value;}
	   }
	   return $return;
	
	}	

	function my_posts_where( $where ) {
		
		$where = str_replace("meta_key = 'dates_$", "meta_key LIKE 'dates_%", $where);

		return $where;
	}
	
	function get_liste_concerts( $start, $end, $count , $genre = false ){
		
		$dates = createDateRange( $start , $end );
		
		$concerts = array();
		$i = 0;
		
		add_filter( 'posts_where','my_posts_where' );

		
		while( $i <= count($dates)-1 ){
		
			$args = array(
			    'post_type' => 'agenda',
			    'posts_per_page' => -1,
			    'orderby' => 'meta_value',
			    'order' => 'ASC',
			    'suppress_filters' => false,
			    'post_status' => 'any',
			    'meta_query' => array(
			        array(
			            'key' => 'dates_$_date_concert',
			            'value' => $dates[$i],
			            'compare' => '=',
			        ),		        
			    ),
			    
			);
			
			if( $genre ){
				$args['tax_query'][] = array(
					'taxonomy' => 'genre',
					'field'    => 'term_id',
					'terms'    => $genre,
				);
			}
			
			
			// Make the query
			$events_query = new WP_query( $args );
			$concerts[$dates[$i]] = $events_query->posts;
			$i++;
			
		}
		remove_filter( 'posts_where','my_posts_where' );
		
		$result = array_filter($concerts);
		
		$_result = array_flatten($result);

		return $result;//$events_query->posts;
	}
	
	function get_time_concert( $post_id, $date ){
		
		$row = get_field('dates',$post_id );
		
		foreach( $row as $c_date ){
			if( $c_date['date_concert'] = $date ){
				$heure = $c_date['heure_concert'];
				return $heure;
			}
		}
		//$time = get_sub_field();
		
		//return $time;
	};
	
	