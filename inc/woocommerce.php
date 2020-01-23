<?php
	
	function remove_wc_memberships_the_restricted_content_message(){
		return false;
	}
	add_filter('wc_memberships_product_viewing_restricted_message' , 'remove_wc_memberships_the_restricted_content_message');