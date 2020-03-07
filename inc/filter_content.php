<?php

function return_post_excerpt( $content, $post, $member = false ){
		$content_strip = strip_tags($post->post_content);
		$content_total_length = str_word_count($content_strip);
		$words = $content_total_length / 5 ;
		$more = '…';
		 
		$excerpt = wp_trim_words( $content, $words, $more );
		
		if( !$member ){
			ob_start();
?>
			
			<div class="restrited-content-message please-subscribe">
				
				<h3><a href="#">Abonnez-vous</a> ou <a href="#">connectez-vous</a> afin d'accéder à la totalité du contenu</h3>
				
			</div>
			
<?php
			$excerpt .= ob_get_clean();
			return $excerpt;
		}	

		ob_start();
?>
			
			<div class="restrited-content-message already-subscribe">
				<h3>Vous avez atteint votre limite de 5 articles gratuits</h3>
				<p>Text</p>
			</div>
			
<?php
			$excerpt .= ob_get_clean();
			return $excerpt;

}


function return_nombre_de_posts_consultes( $viewed_posts ){
		ob_start();
?>
			
			<div id="nombre-posts-consultes already-subscribe">
				<p>Vous avez consulté {X} articles</p>
				<h3>Il vous reste {X} articles à consulter</h3>
				<p>Votre</p>
			</div>
			
<?php
			$excerpt .= ob_get_clean();
			return $excerpt;	
}


add_filter( 'the_content', 'filter_the_content_in_the_main_loop' );


function filter_the_content_in_the_main_loop( $content ) {

	global $post;
	$user_id = get_current_user_id();
	
	$user_premium = is_user_membership_premium( $user_id );
	
	$viewed_posts = get_user_meta( $user_id , 'viewed_posts', false );
	

	
	// l'utilisateur est un abonné premium
	// ou on est sur une page 
	// full accès au contenu
	if( is_page() || $user_premium ){
		return $content;
	}
	
	// on est sur une page single
	// l'utilisateur n'est pas un abonné premium ou gratuit
	// restricted accès au contenu	
	if( $user_id == 0 && !is_page() && is_main_query() && in_the_loop() ){
		
		return return_post_excerpt( $content, $post );
	}
	
	// on est sur une page single
	// l'utilisateur est un abonné gratuit
	// il a le droit a 5 article par periode de renouvellement (/mois)
			
	if( $user_id > 0 && !is_page() && is_main_query() && in_the_loop() ) {
		
		if( empty( $viewed_posts ) ){
			increase_user_viewed_posts( $user_id, $post->ID );
			return $content;
		
		}
		
		$date_renouvellement = next_payment_user_viewed_posts( $user_id );
		$today = date("Y-m-d H:i:s");		
		
		// nombre d'article maximum autorisé
		// todo: créer l'option dans l'admin
		$max_posts = 5;
		
		// on regarde combien d'articles l'utilisateur a lu
		// et si la date du prochain renouvellement d'abonnement
		// est dans le futur
		
		// nombre d'articles lus
		$total_viewed_posts = count( $viewed_posts );		
		
		// il faut que la date de renouvellement soit supérieur à aujourd'hui
		// et que le nombre d'articles lus soit inférieur au maximum autorisé
			
		if( $total_viewed_posts < $max_posts && $date_renouvellement > $today ){
			add_user_meta( $user_id, 'viewed_posts',  $post->ID, false);
			return $content;
		}
		
		return return_post_excerpt( $content, $post, true );
		
		
	}
	
}

