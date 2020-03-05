<?php
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );

	
function remove_wc_memberships_the_restricted_content_message($message, $args){
	$message = '';
	return $message;
}
add_filter('wc_memberships_the_restricted_content' , 'remove_wc_memberships_the_restricted_content_message',10,2);


// Hook in
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
    unset( $fields['order']['order_comments']);
    unset( $fields['billing']['billing_address_1']);
	unset( $fields['billing']['billing_address_2']);
	unset( $fields['billing']['billing_phone']);
	unset( $fields['billing']['billing_company']);
    return $fields;
}
add_filter( 'woocommerce_billing_fields' , 'custom_override_billing_fields' );
function custom_override_billing_fields( $fields ) {
    unset( $fields['billing_address_1']);
	unset( $fields['billing_address_2']);
	unset( $fields['billing_phone']);
	unset( $fields['billing_company']);
    return $fields;
}

//add_filter( 'woocommerce_shipping_fields' , 'custom_override_checkout_fields' );

// -------------------------------
// 1. First, hide the tab that needs to be merged/moved (edit-address in this case)
 

add_filter( 'woocommerce_account_menu_items', 'bbloomer_remove_address_my_account', 999 );
  
function bbloomer_remove_address_my_account( $items ) {
	unset($items['dashboard']);
	unset($items['edit-address']);
	//unset($items['subscriptions']);
	unset($items['edit-account']);
	unset($items['payment-methods']);
	unset($items['lost-password']);
	return $items;
}
add_action( 'woocommerce_account_awards_endpoint', 'woocommerce_account_edit_address' );
add_action( 'woocommerce_account_awards_endpoint', 'woocommerce_account_edit_account' );
//add_action( 'woocommerce_account_awards_endpoint', 'woocommerce_myaccount_subscriptions', 999 );
add_action( 'woocommerce_account_subscriptions_endpoint', 'woocommerce_account_payment_methods' );
/**
 * @snippet       Redirect to Checkout Upon Add to Cart - WooCommerce
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    Woo 3.8
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
  
add_filter( 'woocommerce_add_to_cart_redirect', 'bbloomer_redirect_checkout_add_cart' );
 
function bbloomer_redirect_checkout_add_cart() {
   return wc_get_checkout_url();
}

/**
 * @snippet       WooCommerce Max 1 Product @ Cart
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WC 3.7
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
  
add_filter( 'woocommerce_add_to_cart_validation', 'bbloomer_only_one_in_cart', 99, 2 );
   
function bbloomer_only_one_in_cart( $passed, $added_product_id ) {
   wc_empty_cart();
   return $passed;
}

// hide coupon field on the cart page
function disable_coupon_field_on_cart( $enabled ) {
	if ( is_cart() ) {
		$enabled = false;
	}
	return $enabled;
}
add_filter( 'woocommerce_coupons_enabled', 'disable_coupon_field_on_cart' );

/**
 * Remove Select2 for WooCommerce
 */
function wc_disable_select2() {
    if ( class_exists('woocommerce') ) {
        wp_dequeue_style('select2');
        wp_deregister_style('select2');
 
        // WooCommerce 3.2.1.x and below
        wp_dequeue_script('select2');
        wp_deregister_script('select2');
 
        // WooCommerce 3.2.1+
        wp_dequeue_script('selectWoo');
        wp_deregister_script('selectWoo');
    } 
}
 
add_action('wp_enqueue_scripts', 'wc_disable_select2', 100);

/**
* @snippet       Display FREE if Price Zero or Empty - WooCommerce Single Product
* @how-to        Get CustomizeWoo.com FREE
* @author        Rodolfo Melogli
* @testedwith    WooCommerce 3.8
* @donate $9     https://businessbloomer.com/bloomer-armada/
*/
  
add_filter( 'woocommerce_subscriptions_product_price_string', 'bbloomer_price_free_zero_empty', 9999, 3 );
   
function bbloomer_price_free_zero_empty( $subscription_string, $product, $include ){
    if ( '' === $product->get_price() || 0 == $product->get_price() ) {
        $srting = __("Gratuit",'panm360');
        return $srting;
    }  
    return $subscription_string;
}

/**
 * Remove woocommerce_template_single_sharing
*/
function woocommerce_template_single_sharing(){
	return false;
	//wc_get_template( 'single-product/share.php' );
}
/**
 * Remove woocommerce_template_single_meta
*/
function woocommerce_template_single_meta() {
	return false;
    //wc_get_template( 'single-product/meta.php' );
}
/**
 * Remove woocommerce_template_single_title
*/
function woocommerce_template_single_title() {
	return false;
    //wc_get_template( 'single-product/meta.php' );
}
/**
 * Remove woocommerce_template_single_price
*/
function woocommerce_template_single_price() {
	return false;
    //wc_get_template( 'single-product/meta.php' );
}


/**
 * Remove related products output
 */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );


/**
 * Remove the breadcrumbs 
 */
add_action( 'init', 'woo_remove_wc_breadcrumbs' );
function woo_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}


// define the woocommerce_product_single_add_to_cart_text callback 
function filter_woocommerce_product_single_add_to_cart_text( $var, $instance ) { 
    // make filter magic happen here... 
    $var = __("Je m'abonne",'panm360');
    return $var; 
}; 
         
// add the filter 
add_filter( 'woocommerce_product_single_add_to_cart_text', 'filter_woocommerce_product_single_add_to_cart_text', 10, 2 );


/**************************************************************************************************************************************/


add_action( 'init', 'my_account_new_endpoints' );

function my_account_new_endpoints() {
	add_rewrite_endpoint( 'awards', EP_ROOT | EP_PAGES );
}

add_action( 'woocommerce_account_awards_endpoint', 'awards_endpoint_content' );

function awards_endpoint_content() {
    get_template_part('template-parts/my-account-awards');
    //get_template_part('woocommerce/myaccount/form-edit-address');
}

 function my_account_menu_order($menuOrder) {
 	$menuOrder['awards'] = __( 'Détails de mon compte', 'panm360' );
 	return $menuOrder;
 }
 add_filter ( 'woocommerce_account_menu_items', 'my_account_menu_order', 10, 1 );


/**************************************************************************************************************************************/
