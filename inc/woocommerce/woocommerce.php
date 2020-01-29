<?php
	
function remove_wc_memberships_the_restricted_content_message($message, $args){
	$message = '';
	return $message;
}
add_filter('wc_memberships_the_restricted_content' , 'remove_wc_memberships_the_restricted_content_message',10,2);


// Hook in
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
     unset($fields['order']['order_comments']);
     unset($fields['billing']['billing_address_1']);
	 unset($fields['billing']['billing_address_2']);
	 unset($fields['billing']['billing_phone']);
	 unset($fields['billing']['billing_company']);
     return $fields;
}