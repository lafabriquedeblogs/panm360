<?php
	
function remove_wc_memberships_the_restricted_content_message($message, $args){
	$message = '';
	return $message;
}
add_filter('wc_memberships_the_restricted_content' , 'remove_wc_memberships_the_restricted_content_message',10,2);


function sv_wc_memberships_restricted_excerpt_length() {
	return 20;
}
add_filter( 'wc_memberships_restricted_excerpt_length', 'sv_wc_memberships_restricted_excerpt_length' );

require get_template_directory() . '/inc/woocommerce/custom_excerpt.php';
