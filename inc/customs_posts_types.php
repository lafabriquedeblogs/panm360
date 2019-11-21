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
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats' ),
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
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'artiste', $args );
	
	$labels = array(
		'name'                  => _x( 'Albums', 'Post Type General Name', 'panm360' ),
		'singular_name'         => _x( 'Album', 'Post Type Singular Name', 'panm360' ),
		'menu_name'             => __( 'Albums', 'panm360' ),
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
		'label'                 => __( 'Album', 'panm360' ),
		'description'           => __( 'Album', 'panm360' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats' ),
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
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'records', $args );	

}
add_action( 'init', 'panm360_customs_posts_types', 0 );
	
?>