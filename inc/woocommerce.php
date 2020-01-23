<?php
	
	function remove_wc_memberships_the_restricted_content_message($message, $args){
		$message = '';
		return $message;
	}
	add_filter('wc_memberships_content_restricted_message' , 'remove_wc_memberships_the_restricted_content_message');