<?php
 
/**
 * The field on the editing screens.
 *
 * @param $user WP_User user object
 
Mélomane
Professionnel industrie musicale
Amateur-e /Fan
Contributeur-trice
Fournisseur
Artiste
*/
 
// add the field to user's own profile editing screen
add_action('edit_user_profile','wporg_usermeta_form_field_social_user');
 
// add the field to user profile editing screen
add_action('show_user_profile','wporg_usermeta_form_field_social_user');

function wporg_usermeta_form_field_social_user($user) {
    ?>
    <h3><?php _e('Quel type d\'abonné êtes-vous?','panm360'); ?></h3>
    <table class="form-table">
        <tr>
            <th>
                <label for="melomane"><?php _e('Mélomane','panm360'); ?></label>
            </th>
            <td>
                <input type="checkbox"
                       class="regular-text ltr"
                       id="melomane"
                       name="melomane"
					   <?php if(get_the_author_meta('melomane', $user->ID)=='on' ){ echo "checked"; } ?>
				/>
            </td>
        </tr>
         <tr>
            <th>
                <label for="professionnel"><?php _e('Professionnel industrie musicale','panm360'); ?></label>
            </th>
            <td>
                <input type="checkbox"
                       class="regular-text ltr"
                       id="professionnel"
                       name="professionnel"
					   <?php if(get_the_author_meta('professionnel', $user->ID)=='on' ){ echo "checked"; } ?>
				/>
            </td>
        </tr>
         <tr>
            <th>
                <label for="amateur"><?php _e('Amateur','panm360'); ?></label>
            </th>
            <td>
                <input type="checkbox"
                       class="regular-text ltr"
                       id="amateur"
                       name="amateur"
					   <?php if(get_the_author_meta('amateur', $user->ID)=='on' ){ echo "checked"; } ?>
				/>
            </td>
        </tr>
         <tr>
            <th>
                <label for="contributeur"><?php _e('Contributeur','panm360'); ?></label>
            </th>
            <td>
                <input type="checkbox"
                       class="regular-text ltr"
                       id="contributeur"
                       name="contributeur"
					   <?php if(get_the_author_meta('contributeur', $user->ID)=='on' ){ echo "checked"; } ?>
				/>
            </td>
        </tr>
         <tr>
            <th>
                <label for="fournisseur"><?php _e('Fournisseur','panm360'); ?></label>
            </th>
            <td>
                <input type="checkbox"
                       class="regular-text ltr"
                       id="fournisseur"
                       name="fournisseur"
					   <?php if(get_the_author_meta('fournisseur', $user->ID)=='on' ){ echo "checked"; } ?>
				/>
            </td>
        </tr>
         <tr>
            <th>
                <label for="artiste"><?php _e('Artiste','panm360'); ?></label>
            </th>
            <td>
                <input type="checkbox"
                       class="regular-text ltr"
                       id="artiste"
                       name="artiste"
					   <?php if(get_the_author_meta('artiste', $user->ID)=='on' ){ echo "checked"; } ?>
				/>
            </td>
        </tr>
    </table>
    <?php
}
 
/**
 * The save action.
 *
 * @param $user_id int the ID of the current user.
 *
 * @return bool Meta ID if the key didn't exist, true on successful update, false on failure.
 */

// add the save action to user's own profile editing screen update
add_action('personal_options_update', 'wporg_usermeta_form_field_social_user_update');
 
// add the save action to user profile editing screen update
add_action('edit_user_profile_update', 'wporg_usermeta_form_field_social_user_update');

function wporg_usermeta_form_field_social_user_update( $user_id ) {
    // check that the current user have the capability to edit the $user_id
    if (!current_user_can('edit_user', $user_id)) {
        return false;
    }
	
    // create/update user meta for the $user_id
    update_user_meta( $user_id,'melomane', $_POST['melomane'] );
    update_user_meta( $user_id,'professionnel', $_POST['professionnel'] );
    update_user_meta( $user_id,'amateur', $_POST['amateur'] );
    update_user_meta( $user_id,'contributeur', $_POST['contributeur'] );
    update_user_meta( $user_id,'fournisseur', $_POST['fournisseur'] );
    update_user_meta( $user_id,'artiste', $_POST['artiste'] );
}

 
