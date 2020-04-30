<?php

add_filter( 'the_content', 'filter_the_content_in_the_main_loop' );


function filter_the_content_in_the_main_loop( $content ) {
	
	global $post;
	
	
	$is_good = get_field( 'rendre_ce_contenu_accessible_dans_abonnement', $post->ID);
	
	$user_id = get_current_user_id();
	$user_premium = is_user_membership_premium( $user_id );	
	
	$ok_by_cookie = true;


	if( is_single() && ! is_user_logged_in() ){
	
		$limit = 5;
		$cookie = $_COOKIE['wpb_visit_time'];
		
		if( isset( $cookie ) ):
			
			
			$cookie_array = explode(",", $cookie);
			
			$cookie_length = count($cookie_array)-1;

			
			if( $cookie_length >= $limit ){
				
				ob_start();
				$message = get_field('vous_avez_lu_les_5_messages_cookie','option');
				?>
		
			<div id="window-posts-consultes" class="message_cookie">
				<a href="#" id="close-window-posts-consultes">&times;</a>
				<div class="message_cookie--content">
					<?php echo $message;?>
				</div>
				<a href="<?php echo get_lien_abonnements();?>" class="bouton"><?php _e('Abonnez-vous','panm360'); ?></a>					

			</div>
				<?php
				$message_cookie = ob_get_clean();
				$content = return_post_excerpt( $content, $post );
				return $content.$message_cookie;
						
				$ok_by_cookie = false;
			
			} else {
			
				$visit_time = date($cookie_array[0]);
				$end_time =  strtotime($visit_time) + (30 * DAY_IN_SECONDS);
				$new_cookie_content = $cookie .",". $post->ID;
				setcookie( 'wpb_visit_time', $new_cookie_content, $end_time, COOKIEPATH, COOKIE_DOMAIN, is_ssl() );
				$cookie_array = explode(",",  $new_cookie_content);
					
				$ok_by_cookie = true;		
			}
			
		else:
		
				$visit_time = date('Y/m/d');
				setcookie( 'wpb_visit_time', $visit_time . ",". $post->ID, time() + (30 * DAY_IN_SECONDS), COOKIEPATH, COOKIE_DOMAIN, is_ssl() );		
				$cookie_array = explode(",",  $_COOKIE['wpb_visit_time']);
							
				$ok_by_cookie = true;
		
		endif;
		
		
		$nb = count($cookie_array)-1;
		if( $nb <= 0 ) $nb = 1;
		$message = get_field('vous_avez_lu_x_messages_cookie','option');
		$message = str_replace("{%x%}", $nb, $message);					
		ob_start();
		?>
			<div id="window-posts-consultes" class="message_cookie">
				<a href="#" id="close-window-posts-consultes">&times;</a>
				<div class="message_cookie--content">
					<?php echo $message;?>
				</div>
				<a href="<?php echo get_lien_abonnements();?>" class="bouton"><?php _e('Abonnez-vous','panm360'); ?></a>					

			</div>
		
		<?php
		$message_cookie = ob_get_clean();
				
		return 	$content.$message_cookie;
		$ok_by_cookie = true;
		
	}
	
	
	if( iam_admin() || iam_author_contributor() || $is_good == '1' || is_page() || $user_premium /*|| $ok_by_cookie*/ ){
				
		return $content;
	}
	

	
	$viewed_posts = get_user_meta( $user_id , 'viewed_posts', false );
	

	// l'utilisateur est un abonné premium
	// ou on est sur une page 
	// full accès au contenu
/*
	if( is_page() || $user_premium ){
		return $content;
	}
*/
	
		
	// on est sur une page single
	// l'utilisateur n'est pas un abonné premium ou gratuit et le cookie est plein
	// restricted accès au contenu	
	if( $user_id == 0 && !is_page() && is_main_query() && in_the_loop() ){
		
		//if( !$ok_by_cookie ){
			//return return_post_excerpt( $content, $post );
		//}
		return return_post_excerpt( $content, $post );
		
	}
	
	// on est sur une page single
	// l'utilisateur est un abonné gratuit
	// il a le droit a 5 article par periode de renouvellement (/mois)
			
	if( $user_id > 0 && !is_page() && is_main_query() && in_the_loop() ) {
		
		
		/*
		<!--/ a effacer pour css seulement /-->
		*/
		//return_nombre_de_posts_consultes( $viewed_posts );
		//return $content;
		/*
		<!--/--/-->
		*/
		
		
		if( empty( $viewed_posts ) ){
			increase_user_viewed_posts( $user_id, $post->ID );
			return $content;
		
		}
		
		$date_renouvellement = next_payment_user_viewed_posts( $user_id );
		$today = date("Y-m-d H:i:s");		
		
		// nombre d'article maximum autorisé
		// todo: créer l'option dans l'admin
		$max_posts = 10;
		
		// on regarde combien d'articles l'utilisateur a lu
		// et si la date du prochain renouvellement d'abonnement
		// est dans le futur
		
		// nombre d'articles lus
		$total_viewed_posts = count( $viewed_posts );		
		
		// il faut que la date de renouvellement soit supérieur à aujourd'hui
		// et que le nombre d'articles lus soit inférieur au maximum autorisé
			
		if( $total_viewed_posts < $max_posts && $date_renouvellement > $today ){
			increase_user_viewed_posts( $user_id, $post->ID );
			return $content;
		}
		
		return return_post_excerpt( $content, $post, true );
		
		
	}
	
}


function check_for_cookies_in_singles(){
	
	
	if( !isset( $_COOKIE['wpb_visit_time'] )){

		$visit_time = date('Y/m/d');
		setcookie( 'wpb_visit_time', $visit_time, time() + (30 * DAY_IN_SECONDS), COOKIEPATH, COOKIE_DOMAIN, is_ssl() );
		
	}	
}
add_action('init', 'check_for_cookies_in_singles');