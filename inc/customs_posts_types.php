<?php

// Register Custom Post Type
function panm360_customs_posts_types() {

	$labels = array(
		'name'                  => _x( 'Artistes', 'Post Type General Name', 'panm360' ),
		'singular_name'         => _x( 'Artiste', 'Post Type Singular Name', 'panm360' ),
		'menu_name'             => __( 'Artistes', 'panm360' ),
		'name_admin_bar'        => __( 'Artiste', 'panm360' ),
		'archives'              => __( 'Item Archives', '' ),
		'attributes'            => __( 'Item Attributes', '' ),
		'parent_item_colon'     => __( 'Parent Item:', '' ),
		'all_items'             => __( 'All Items', '' ),
		'add_new_item'          => __( 'Add New Item', '' ),
		'add_new'               => __( 'Add New', '' ),
		'new_item'              => __( 'New Item', '' ),
		'edit_item'             => __( 'Edit Item', '' ),
		'update_item'           => __( 'Update Item', '' ),
		'view_item'             => __( 'View Item', '' ),
		'view_items'            => __( 'View Items', '' ),
		'search_items'          => __( 'Search Item', '' ),
		'not_found'             => __( 'Not found', '' ),
		'not_found_in_trash'    => __( 'Not found in Trash', '' ),
		'featured_image'        => __( 'Featured Image', '' ),
		'set_featured_image'    => __( 'Set featured image', '' ),
		'remove_featured_image' => __( 'Remove featured image', '' ),
		'use_featured_image'    => __( 'Use as featured image', '' ),
		'insert_into_item'      => __( 'Insert into item', '' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', '' ),
		'items_list'            => __( 'Items list', '' ),
		'items_list_navigation' => __( 'Items list navigation', '' ),
		'filter_items_list'     => __( 'Filter items list', '' ),
	);
	
	$args = array(
		'label'                 => __( 'Artiste', 'panm360' ),
		'description'           => __( 'Artiste', 'panm360' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats','author','excerpt' ),
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
		'archives'              => __( 'Item Archives', '' ),
		'attributes'            => __( 'Item Attributes', '' ),
		'parent_item_colon'     => __( 'Parent Item:', '' ),
		'all_items'             => __( 'All Items', '' ),
		'add_new_item'          => __( 'Add New Item', '' ),
		'add_new'               => __( 'Add New', '' ),
		'new_item'              => __( 'New Item', '' ),
		'edit_item'             => __( 'Edit Item', '' ),
		'update_item'           => __( 'Update Item', '' ),
		'view_item'             => __( 'View Item', '' ),
		'view_items'            => __( 'View Items', '' ),
		'search_items'          => __( 'Search Item', '' ),
		'not_found'             => __( 'Not found', '' ),
		'not_found_in_trash'    => __( 'Not found in Trash', '' ),
		'featured_image'        => __( 'Featured Image', '' ),
		'set_featured_image'    => __( 'Set featured image', '' ),
		'remove_featured_image' => __( 'Remove featured image', '' ),
		'use_featured_image'    => __( 'Use as featured image', '' ),
		'insert_into_item'      => __( 'Insert into item', '' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', '' ),
		'items_list'            => __( 'Items list', '' ),
		'items_list_navigation' => __( 'Items list navigation', '' ),
		'filter_items_list'     => __( 'Filter items list', '' ),
	);
	$args = array(
		'label'                 => __( 'Album', 'panm360' ),
		'description'           => __( 'Album', 'panm360' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats','author','excerpt' ),
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
		'archives'              => __( 'Agenda Archives', '' ),
		'attributes'            => __( 'Agenda Attributes', '' ),
		'parent_item_colon'     => __( 'Parent Agenda:', '' ),
		'all_items'             => __( 'All Agenda', '' ),
		'add_new_item'          => __( 'Add New Agenda', '' ),
		'add_new'               => __( 'Add New', '' ),
		'new_item'              => __( 'New Agenda', '' ),
		'edit_item'             => __( 'Edit Agenda', '' ),
		'update_item'           => __( 'Update Agenda', '' ),
		'view_item'             => __( 'View Agenda', '' ),
		'view_items'            => __( 'View Agendas', '' ),
		'search_items'          => __( 'Search Agenda', '' ),
		'not_found'             => __( 'Not found', '' ),
		'not_found_in_trash'    => __( 'Not found in Trash', '' ),
		'featured_image'        => __( 'Featured Image', '' ),
		'set_featured_image'    => __( 'Set featured image', '' ),
		'remove_featured_image' => __( 'Remove featured image', '' ),
		'use_featured_image'    => __( 'Use as featured image', '' ),
		'insert_into_item'      => __( 'Insert into Agenda', '' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Agenda', '' ),
		'items_list'            => __( 'Agendas list', '' ),
		'items_list_navigation' => __( 'Agendas list navigation', '' ),
		'filter_items_list'     => __( 'Filter Agendas list', '' ),
	);
	$args = array(
		'label'                 => __( 'Agenda', 'panm360' ),
		'description'           => __( 'Agenda', 'panm360' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats','author','excerpt' ),
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
		'archives'              => __( 'Critique de concert Archives', '' ),
		'attributes'            => __( 'Critique de concert Attributes', '' ),
		'parent_item_colon'     => __( 'Parent Critique de concert:', '' ),
		'all_items'             => __( 'All Critique de concert', '' ),
		'add_new_item'          => __( 'Add New Critique de concert', '' ),
		'add_new'               => __( 'Add New', '' ),
		'new_item'              => __( 'New Critique de concert', '' ),
		'edit_item'             => __( 'Edit Critique de concert', '' ),
		'update_item'           => __( 'Update Critique de concert', '' ),
		'view_item'             => __( 'View Critique de concert', '' ),
		'view_items'            => __( 'View Critique de concert', '' ),
		'search_items'          => __( 'Search Critique de concert', '' ),
		'not_found'             => __( 'Not found', '' ),
		'not_found_in_trash'    => __( 'Not found in Trash', '' ),
		'featured_image'        => __( 'Featured Image', '' ),
		'set_featured_image'    => __( 'Set featured image', '' ),
		'remove_featured_image' => __( 'Remove featured image', '' ),
		'use_featured_image'    => __( 'Use as featured image', '' ),
		'insert_into_item'      => __( 'Insert into Critique de concert', '' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Critique de concert', '' ),
		'items_list'            => __( 'Critique de concert list', '' ),
		'items_list_navigation' => __( 'Critique de concert list navigation', '' ),
		'filter_items_list'     => __( 'Filter Critique de concert list', '' ),
	);
	$args = array(
		'label'                 => __( 'Critique de concert', 'panm360' ),
		'description'           => __( 'Critique de concert', 'panm360' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats','author','excerpt' ),
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
		'archives'              => __( 'Item Archives', '' ),
		'attributes'            => __( 'Item Attributes', '' ),
		'parent_item_colon'     => __( 'Parent Item:', '' ),
		'all_items'             => __( 'All Items', '' ),
		'add_new_item'          => __( 'Add New Item', '' ),
		'add_new'               => __( 'Add New', '' ),
		'new_item'              => __( 'New Item', '' ),
		'edit_item'             => __( 'Edit Item', '' ),
		'update_item'           => __( 'Update Item', '' ),
		'view_item'             => __( 'View Item', '' ),
		'view_items'            => __( 'View Items', '' ),
		'search_items'          => __( 'Search Item', '' ),
		'not_found'             => __( 'Not found', '' ),
		'not_found_in_trash'    => __( 'Not found in Trash', '' ),
		'featured_image'        => __( 'Featured Image', '' ),
		'set_featured_image'    => __( 'Set featured image', '' ),
		'remove_featured_image' => __( 'Remove featured image', '' ),
		'use_featured_image'    => __( 'Use as featured image', '' ),
		'insert_into_item'      => __( 'Insert into item', '' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', '' ),
		'items_list'            => __( 'Items list', '' ),
		'items_list_navigation' => __( 'Items list navigation', '' ),
		'filter_items_list'     => __( 'Filter items list', '' ),
	);
	$args = array(
		'label'                 => __( 'Publicité', 'panm360' ),
		'description'           => __( 'Publicité', 'panm360' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats','author','excerpt' ),
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