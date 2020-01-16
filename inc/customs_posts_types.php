<?php

// Register Custom Post Type
function panm360_customs_posts_types() {

	$labels = array(
		'name'                  => _x( 'Artistes', 'Post Type General Name', 'panm360' ),
		'singular_name'         => _x( 'Artiste', 'Post Type Singular Name', 'panm360' ),
		'menu_name'             => __( 'Artistes', 'panm360' ),
		'name_admin_bar'        => __( 'Artiste', 'panm360' ),
		'archives'              => __( 'Item Archives', 'panm360' ),
		'attributes'            => __( 'Item Attributes', 'panm360' ),
		'parent_item_colon'     => __( 'Parent Item:', 'panm360' ),
		'all_items'             => __( 'All Items', 'panm360' ),
		'add_new_item'          => __( 'Add New Item', 'panm360' ),
		'add_new'               => __( 'Add New', 'panm360' ),
		'new_item'              => __( 'New Item', 'panm360' ),
		'edit_item'             => __( 'Edit Item', 'panm360' ),
		'update_item'           => __( 'Update Item', 'panm360' ),
		'view_item'             => __( 'View Item', 'panm360' ),
		'view_items'            => __( 'View Items', 'panm360' ),
		'search_items'          => __( 'Search Item', 'panm360' ),
		'not_found'             => __( 'Not found', 'panm360' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'panm360' ),
		'featured_image'        => __( 'Featured Image', 'panm360' ),
		'set_featured_image'    => __( 'Set featured image', 'panm360' ),
		'remove_featured_image' => __( 'Remove featured image', 'panm360' ),
		'use_featured_image'    => __( 'Use as featured image', 'panm360' ),
		'insert_into_item'      => __( 'Insert into item', 'panm360' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'panm360' ),
		'items_list'            => __( 'Items list', 'panm360' ),
		'items_list_navigation' => __( 'Items list navigation', 'panm360' ),
		'filter_items_list'     => __( 'Filter items list', 'panm360' ),
	);
	
	$args = array(
		'label'                 => __( 'Artiste', 'panm360' ),
		'description'           => __( 'Artiste', 'panm360' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats','author' ),
		'taxonomies'            => array( 'category', 'post_tag', 'pays', 'genre' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);
	register_post_type( 'artiste', $args );
	
	$labels = array(
		'name'                  => _x( 'Albums', 'Post Type General Name', 'panm360' ),
		'singular_name'         => _x( 'Album', 'Post Type Singular Name', 'panm360' ),
		'menu_name'             => __( 'Albums', 'panm360' ),
		'name_admin_bar'        => __( 'Album', 'panm360' ),
		'archives'              => __( 'Item Archives', 'panm360' ),
		'attributes'            => __( 'Item Attributes', 'panm360' ),
		'parent_item_colon'     => __( 'Parent Item:', 'panm360' ),
		'all_items'             => __( 'All Items', 'panm360' ),
		'add_new_item'          => __( 'Add New Item', 'panm360' ),
		'add_new'               => __( 'Add New', 'panm360' ),
		'new_item'              => __( 'New Item', 'panm360' ),
		'edit_item'             => __( 'Edit Item', 'panm360' ),
		'update_item'           => __( 'Update Item', 'panm360' ),
		'view_item'             => __( 'View Item', 'panm360' ),
		'view_items'            => __( 'View Items', 'panm360' ),
		'search_items'          => __( 'Search Item', 'panm360' ),
		'not_found'             => __( 'Not found', 'panm360' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'panm360' ),
		'featured_image'        => __( 'Featured Image', 'panm360' ),
		'set_featured_image'    => __( 'Set featured image', 'panm360' ),
		'remove_featured_image' => __( 'Remove featured image', 'panm360' ),
		'use_featured_image'    => __( 'Use as featured image', 'panm360' ),
		'insert_into_item'      => __( 'Insert into item', 'panm360' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'panm360' ),
		'items_list'            => __( 'Items list', 'panm360' ),
		'items_list_navigation' => __( 'Items list navigation', 'panm360' ),
		'filter_items_list'     => __( 'Filter items list', 'panm360' ),
	);
	$args = array(
		'label'                 => __( 'Album', 'panm360' ),
		'description'           => __( 'Album', 'panm360' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats','author' ),
		'taxonomies'            => array( 'category', 'post_tag', 'pays', 'genre' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);
	register_post_type( 'records', $args );	

	$labels = array(
		'name'                  => _x( 'Agenda', 'Post Type General Name', 'panm360' ),
		'singular_name'         => _x( 'Agenda', 'Post Type Singular Name', 'panm360' ),
		'menu_name'             => __( 'Agenda', 'panm360' ),
		'name_admin_bar'        => __( 'Agenda', 'panm360' ),
		'archives'              => __( 'Agenda Archives', 'panm360' ),
		'attributes'            => __( 'Agenda Attributes', 'panm360' ),
		'parent_item_colon'     => __( 'Parent Agenda:', 'panm360' ),
		'all_items'             => __( 'All Agenda', 'panm360' ),
		'add_new_item'          => __( 'Add New Agenda', 'panm360' ),
		'add_new'               => __( 'Add New', 'panm360' ),
		'new_item'              => __( 'New Agenda', 'panm360' ),
		'edit_item'             => __( 'Edit Agenda', 'panm360' ),
		'update_item'           => __( 'Update Agenda', 'panm360' ),
		'view_item'             => __( 'View Agenda', 'panm360' ),
		'view_items'            => __( 'View Agendas', 'panm360' ),
		'search_items'          => __( 'Search Agenda', 'panm360' ),
		'not_found'             => __( 'Not found', 'panm360' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'panm360' ),
		'featured_image'        => __( 'Featured Image', 'panm360' ),
		'set_featured_image'    => __( 'Set featured image', 'panm360' ),
		'remove_featured_image' => __( 'Remove featured image', 'panm360' ),
		'use_featured_image'    => __( 'Use as featured image', 'panm360' ),
		'insert_into_item'      => __( 'Insert into Agenda', 'panm360' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Agenda', 'panm360' ),
		'items_list'            => __( 'Agendas list', 'panm360' ),
		'items_list_navigation' => __( 'Agendas list navigation', 'panm360' ),
		'filter_items_list'     => __( 'Filter Agendas list', 'panm360' ),
	);
	$args = array(
		'label'                 => __( 'Agenda', 'panm360' ),
		'description'           => __( 'Agenda', 'panm360' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats','author' ),
		'taxonomies'            => array( 'category', 'post_tag', 'pays', 'genre','salle' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);
	register_post_type( 'agenda', $args );	
	
	unset($labels);
	unset($args);

/**/
	$labels = array(
		'name'                  => _x( 'Critique de concert', 'Post Type General Name', 'panm360' ),
		'singular_name'         => _x( 'Critique de concert', 'Post Type Singular Name', 'panm360' ),
		'menu_name'             => __( 'Critique de concert', 'panm360' ),
		'name_admin_bar'        => __( 'Critique de concert', 'panm360' ),
		'archives'              => __( 'Critique de concert Archives', 'panm360' ),
		'attributes'            => __( 'Critique de concert Attributes', 'panm360' ),
		'parent_item_colon'     => __( 'Parent Critique de concert:', 'panm360' ),
		'all_items'             => __( 'All Critique de concert', 'panm360' ),
		'add_new_item'          => __( 'Add New Critique de concert', 'panm360' ),
		'add_new'               => __( 'Add New', 'panm360' ),
		'new_item'              => __( 'New Critique de concert', 'panm360' ),
		'edit_item'             => __( 'Edit Critique de concert', 'panm360' ),
		'update_item'           => __( 'Update Critique de concert', 'panm360' ),
		'view_item'             => __( 'View Critique de concert', 'panm360' ),
		'view_items'            => __( 'View Critique de concert', 'panm360' ),
		'search_items'          => __( 'Search Critique de concert', 'panm360' ),
		'not_found'             => __( 'Not found', 'panm360' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'panm360' ),
		'featured_image'        => __( 'Featured Image', 'panm360' ),
		'set_featured_image'    => __( 'Set featured image', 'panm360' ),
		'remove_featured_image' => __( 'Remove featured image', 'panm360' ),
		'use_featured_image'    => __( 'Use as featured image', 'panm360' ),
		'insert_into_item'      => __( 'Insert into Critique de concert', 'panm360' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Critique de concert', 'panm360' ),
		'items_list'            => __( 'Critique de concert list', 'panm360' ),
		'items_list_navigation' => __( 'Critique de concert list navigation', 'panm360' ),
		'filter_items_list'     => __( 'Filter Critique de concert list', 'panm360' ),
	);
	$args = array(
		'label'                 => __( 'Critique de concert', 'panm360' ),
		'description'           => __( 'Critique de concert', 'panm360' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats','author' ),
		'taxonomies'            => array( 'category', 'post_tag', 'pays', 'genre','salle' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);
	register_post_type( 'gig_review', $args );
/**/
	unset($labels);
	unset($args);
	
	$labels = array(
		'name'                  => _x( 'Publicités', 'Post Type General Name', 'panm360' ),
		'singular_name'         => _x( 'Publicité', 'Post Type Singular Name', 'panm360' ),
		'menu_name'             => __( 'Publicités', 'panm360' ),
		'name_admin_bar'        => __( 'Publicité', 'panm360' ),
		'archives'              => __( 'Item Archives', 'panm360' ),
		'attributes'            => __( 'Item Attributes', 'panm360' ),
		'parent_item_colon'     => __( 'Parent Item:', 'panm360' ),
		'all_items'             => __( 'All Items', 'panm360' ),
		'add_new_item'          => __( 'Add New Item', 'panm360' ),
		'add_new'               => __( 'Add New', 'panm360' ),
		'new_item'              => __( 'New Item', 'panm360' ),
		'edit_item'             => __( 'Edit Item', 'panm360' ),
		'update_item'           => __( 'Update Item', 'panm360' ),
		'view_item'             => __( 'View Item', 'panm360' ),
		'view_items'            => __( 'View Items', 'panm360' ),
		'search_items'          => __( 'Search Item', 'panm360' ),
		'not_found'             => __( 'Not found', 'panm360' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'panm360' ),
		'featured_image'        => __( 'Featured Image', 'panm360' ),
		'set_featured_image'    => __( 'Set featured image', 'panm360' ),
		'remove_featured_image' => __( 'Remove featured image', 'panm360' ),
		'use_featured_image'    => __( 'Use as featured image', 'panm360' ),
		'insert_into_item'      => __( 'Insert into item', 'panm360' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'panm360' ),
		'items_list'            => __( 'Items list', 'panm360' ),
		'items_list_navigation' => __( 'Items list navigation', 'panm360' ),
		'filter_items_list'     => __( 'Filter items list', 'panm360' ),
	);
	$args = array(
		'label'                 => __( 'Publicité', 'panm360' ),
		'description'           => __( 'Publicité', 'panm360' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats','author' ),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => false,
		'menu_position'         => 20,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);
	register_post_type( 'panm360_ads', $args );
}
add_action( 'init', 'panm360_customs_posts_types', 0 );


function set_default_object_terms( $post_id, $post ) {
	
        if ( 'publish' === $post->post_status && $post->post_type === 'agenda' ) {
            $defaults = array(
                'generale' => array( 'lire' ),
                //'generale' => array( 'albums' ),
                //'category' => array( 'albums' ),
             );
            $taxonomies = get_object_taxonomies( $post->post_type );
            foreach ( (array) $taxonomies as $taxonomy ) {
                $terms = wp_get_post_terms( $post_id, $taxonomy );
                if ( empty( $terms ) && array_key_exists( $taxonomy, $defaults ) ) {
                    wp_set_object_terms( $post_id, $defaults[$taxonomy], $taxonomy );
                }
            }
        }
    }
add_action( 'save_post', 'set_default_object_terms', 0, 2 );	
?>