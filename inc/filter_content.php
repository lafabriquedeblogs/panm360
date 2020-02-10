<?php

//add_filter( 'the_content', 'filter_the_content_in_the_main_loop' );
 
function filter_the_content_in_the_main_loop( $content ) {
		
	$user_id = get_current_user_id();
	
	// Page abonnement 
	if( is_page() ){
		return $content;
	}
	
	if( $user_id == 0 && !is_page() && is_main_query() && in_the_loop() ){
		
		global $post;
		
		$content_strip = strip_tags($post->post_content);
		$content_total_length = str_word_count($content_strip);
		$words = $content_total_length / 5 ;
		$more = '…';
		 
		$excerpt = wp_trim_words( $content, $words, $more );
		echo $excerpt;
		
		?>
		
		<div>
			
			<h2>Abonnez vous pour accéder au contenu</h2>
			
		</div>
		
		<?php
		
	} else {
		
		$args = array( 
			'status' => array( 'active', 'complimentary', 'pending','free_trial' ),
		);  
		
		$active_memberships = wc_memberships_get_user_memberships( $user_id, $args );
		$active_subscriptions = wcs_get_users_subscriptions($user_id);
		
		$active_memberships_names = array();
		
		foreach( $active_memberships as $membership){
			$active_memberships_names[] = $membership->plan->name;
		}
		
		if( in_array('Premium', $active_memberships_names ) ){
			return $content;
		}
		
		$viewed_interviews = get_user_meta( $user_id , 'viewed_interviews', true );
		$viewed_albums = get_user_meta( $user_id , 'viewed_albums', true );
		$viewed_review = get_user_meta( $user_id , 'viewed_review', true );
		$viewed_chronique = get_user_meta( $user_id , 'viewed_chronique', true );
		
		
	}
	return;
}