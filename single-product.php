<?php
	$abonnement_link = get_lien_page_abonnement();
    wp_redirect( $abonnement_link );
    exit(); // always call `exit()` after `wp_redirect`
    	
	get_header();
?>