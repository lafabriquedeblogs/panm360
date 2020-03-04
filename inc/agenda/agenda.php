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
		$end->modify('+1 day');
		
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
		foreach ( $array as $key => $value ) {
			if ( is_array($value) ){
				$return = array_merge( $return , array_flatten( $value ) );
			} else {
				$return[$key] = $value;
			}
		}
	
		return $return;
	}	

	function my_posts_where( $where ) {
		
		$where = str_replace("meta_key = 'dates_$", "meta_key LIKE 'dates_%", $where);

		return $where;
	}
	
	function get_liste_concerts( $start, $end, $count , $genre = false ){
		

  	
	/*
    	$result = get_transient( 'liste_journaliere_des_concerts' );
		
    	if ( false === $result ) {
    	    set_transient( 'liste_journaliere_des_concerts', $result, DAY_IN_SECONDS );
    	}
	*/
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
			    'post_status' => 'publish',
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
			wp_reset_query();
		}
		
		remove_filter( 'posts_where','my_posts_where' );
		
		
		$result = array_filter($concerts);
		
		$_result = array_flatten($result);

    	
		return $result;//$events_query->posts;
	}
	
	function transform_time_to_langue( $time ){
			
			$my_current_lang = apply_filters( 'wpml_current_language', NULL );
				
			if( $my_current_lang == 'en' ){
					
				$h = new DateTime( $time . ' 01/01/1970');
				$h = $h->format('h:i a');
				
				return $h;	
			}
			
			return $time;		
	}
	
	function get_time_concert( $post_id, $date ){
		
		$row = get_field('dates',$post_id );
		
		if( !$row ) return '';
		
		foreach( $row as $c_date ){
			if( $c_date['date_concert'] = $date ){
				
				$heure = transform_time_to_langue( $c_date['heure_concert'] );

				return $heure;
			}
		}

	};
	
	function lien_agenda_complet(){
		
		$agenda_full_id = apply_filters( 'wpml_object_id', 6944, 'page', TRUE  );
		$agenda_full_permalien = get_permalink( $agenda_full_id );
		$lien_agenda_complet = '<a href="'.$agenda_full_permalien.'" class="plus-de">'. __('Agenda 360 complet','panm360').'<svg class="icone"><use xlink:href="#fleche-lien"></use></svg></a>';	

		echo $lien_agenda_complet;
	}
	
	function get_agendas_commentes(){
		
		
		$start = date('Y/m/d');
		$end = date('Y/m/d', strtotime("+30 days"));
		
		$dates = createDateRange( $start , $end );
					
		$concerts = array();
		$i = 0;
		
		add_filter( 'posts_where','my_posts_where' );
		
		// !!!!!!!
		
		//$dates = array_slice($dates, 10);
		// !!!!!!!
		
		while( $i <= count($dates)-1 ){
		
			$args = array(
			    'post_type' => 'agenda',
			    'posts_per_page' => -1,
			    'orderby' => 'meta_value',
			    'order' => 'ASC',
			    'suppress_filters' => false,
			    'post_status' => 'publish',
			    'meta_query' => array(
				    'relation' => 'AND',
			        array(
			            'key' => 'dates_$_date_concert',
			            'value' => $dates[$i],
			            'compare' => '=',
			        ),
			        array(
			            'key' => 'agenda_commente',
			            'value' => 1,
			            'compare' => '=',					        
			        )		        
			    ),
			    
			);	
			
			// Make the query
			$events_query = new WP_query( $args );
			$concerts[ $dates[$i] ] = $events_query->posts;
			$i++;
			
		}
		
		
		remove_filter( 'posts_where','my_posts_where' );
		
		wp_reset_query();
		
		$result = array_filter($concerts);
		
		$_result = array_flatten($result);
		
		$re_sult = array_unique($_result,SORT_REGULAR);
			
		return $re_sult;
	}