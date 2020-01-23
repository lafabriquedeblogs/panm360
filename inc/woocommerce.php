<?php
	
	function remove_wc_memberships_the_restricted_content_message(){
		return '';
	}
	add_filter('wc_memberships_content_restricted_message' , 'remove_wc_memberships_the_restricted_content_message');