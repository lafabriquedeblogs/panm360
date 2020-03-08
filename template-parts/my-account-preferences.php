<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/*
/ Add the custom field "favorite_color"
add_action( 'woocommerce_edit_account_form', 'add_favorite_color_to_edit_account_form' );
function add_favorite_color_to_edit_account_form() {
    $user = wp_get_current_user();
    ?>
        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
        <label for="favorite_color"><?php _e( 'Favorite color', 'woocommerce' ); ?></label>
        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="favorite_color" id="favorite_color" value="<?php echo esc_attr( $user->favorite_color ); ?>" />
    </p>
    <?php
}

// Save the custom field 'favorite_color' 
add_action( 'woocommerce_save_account_details', 'save_favorite_color_account_details', 12, 1 );
function save_favorite_color_account_details( $user_id ) {
    // For Favorite color
    if( isset( $_POST['favorite_color'] ) )
        update_user_meta( $user_id, 'favorite_color', sanitize_text_field( $_POST['favorite_color'] ) );

    // For Billing email (added related to your comment)
    if( isset( $_POST['account_email'] ) )
        update_user_meta( $user_id, 'billing_email', sanitize_text_field( $_POST['account_email'] ) );
}	
*/


$user_id = get_current_user_id();
 	//if ( !empty( $_POST['melomane'] ) ) {
		update_user_meta( $user_id,'melomane', $_POST['melomane'] );
	//}
	//if ( !empty( $_POST['professionnel'] ) ) {
		update_user_meta( $user_id,'professionnel', $_POST['professionnel'] );
//	}
	//if ( !empty( $_POST['amateur'] ) ) {
		update_user_meta( $user_id,'amateur', $_POST['amateur'] );
	//}
	//if ( !empty( $_POST['contributeur'] ) ) {
		update_user_meta( $user_id,'contributeur', $_POST['contributeur'] );
	//}
	//if ( !empty( $_POST['fournisseur'] ) ) {
		update_user_meta( $user_id,'fournisseur', $_POST['fournisseur'] );
	//}
	//if ( !empty( $_POST['artiste'] ) ){
		update_user_meta( $user_id,'artiste', $_POST['artiste'] );
	//}
?>

<h3><?php _e('Type d\'abonné','panm360'); ?></h3>

<form method="post">

    <ul id="type-d-abonne">
        <li>
            <div>
                
                <input type="checkbox"
                       class="regular-text ltr"
                       id="melomane"
                       name="melomane"
					   <?php if( get_the_author_meta('melomane', $user_id)=='on' ){ echo "checked"; } ?>
				/>
				<label for="melomane" <?php if( get_the_author_meta('melomane', $user_id)=='on' ){ echo "class=\"selected\""; } ?>><?php _e('Mélomane','panm360'); ?></label>
            </div>
        </li>
         <li>
            <div>
               
                <input type="checkbox"
                       class="regular-text ltr"
                       id="professionnel"
                       name="professionnel"
					   <?php if( get_the_author_meta('professionnel', $user_id)=='on' ){ echo "checked"; } ?>
				/>
				 <label for="professionnel"  <?php if( get_the_author_meta('professionnel', $user_id)=='on' ){ echo "class=\"selected\""; } ?>><?php _e('Professionnel industrie musicale','panm360'); ?></label>
            </div>
        </li>
         <li>
            <div>
               
                <input type="checkbox"
                       class="regular-text ltr"
                       id="amateur"
                       name="amateur"
					   <?php if( get_the_author_meta('amateur', $user_id)=='on' ){ echo "checked"; } ?>
				/>
				 <label for="amateur" <?php if( get_the_author_meta('amateur', $user_id)=='on' ){ echo "class=\"selected\""; } ?>><?php _e('Amateur','panm360'); ?></label>
            </div>
        </li>
         <li>
            <div>
               
                <input type="checkbox"
                       class="regular-text ltr"
                       id="contributeur"
                       name="contributeur"
					   <?php if( get_the_author_meta('contributeur', $user_id)=='on' ){ echo "checked"; } ?>
				/>
				 <label for="contributeur" <?php if( get_the_author_meta('contributeur', $user_id)=='on' ){ echo "class=\"selected\""; } ?>><?php _e('Contributeur','panm360'); ?></label>
            </div>
        </li>
         <li>
            <div>
                
                <input type="checkbox"
                       class="regular-text ltr"
                       id="fournisseur"
                       name="fournisseur"
					   <?php if( get_the_author_meta('fournisseur', $user_id)=='on' ){ echo "checked"; } ?>
				/>
				<label for="fournisseur" <?php if( get_the_author_meta('fournisseur', $user_id)=='on' ){ echo "class=\"selected\""; } ?>><?php _e('Fournisseur','panm360'); ?></label>
            </div>
        </li>
         <li>
            <div>
                
                <input type="checkbox"
                       class="regular-text ltr"
                       id="artiste"
                       name="artiste"
					   <?php if(get_the_author_meta('artiste', $user_id)=='on' ){ echo "checked"; } ?>
				/>
				<label for="artiste" <?php if( get_the_author_meta('artiste', $user_id)=='on' ){ echo "class=\"selected\""; } ?>><?php _e('Artiste','panm360'); ?></label>
            </div>
        </li>
        <li>
        	<button type="submit" class="button" name="save_account_type_abonne" value="<?php _e('Enregistrer les modifications','panm360'); ?>"><?php _e('Enregistrer les modifications','panm360'); ?></button>		
        </li>
    </ul>
</form>

<?php
	
