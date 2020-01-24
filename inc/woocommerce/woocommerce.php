<?php
	
function remove_wc_memberships_the_restricted_content_message($message, $args){
	$message = '';
	return $message;
}
add_filter('wc_memberships_the_restricted_content' , 'remove_wc_memberships_the_restricted_content_message',10,2);