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
		'menu_icon'				=> 'data:image/svg+xml;base64,' . base64_encode('<svg version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 20 20" style="enable-background:new 0 0 20 20;" xml:space="preserve"><path fill="#5BC6E8" d="M16,9.8c-0.4,0-0.7-0.3-0.9-0.7c-0.3-0.8-0.3-1.6-0.6-2.3C14.3,6.4,14,6,13.6,5.9 c-0.4-0.1-0.7,0-1,0.3c-0.7,0.6-0.8,1.7-0.9,2.5c-0.1,0.9-0.1,1.9-0.5,2.7c-0.1,0.1-0.2,0.2-0.4,0.2c-0.5-0.2-0.7-1.1-0.7-1.7 C10,9.1,10,8.2,9.8,7.4c-0.2-1-0.5-2.5-1.5-2.9C7.8,4.2,7.2,4.3,6.7,4.7c-0.4,0.4-0.7,1-0.8,1.5C5.7,6.9,5.6,7.6,5.5,8.4 c-0.1,0.9-0.3,1.8-0.4,2.7c-0.1,0.7-0.2,1.4-0.5,2C4.5,13.5,4.3,14,4,14.2c-0.1,0.1-0.1,0.1-0.2,0.2c-0.1,0.1-0.1,0.1-0.2,0.2 c0,0,0,0.1,0,0.1c0.1,0.4,0.4,0.7,0.6,1.1c0,0,0,0,0,0c1.2-0.8,1.5-2.4,1.7-3.7c0.2-1.5,0.3-3,0.7-4.4C6.7,7.2,6.8,6.9,7,6.5 c0.1-0.3,0.3-0.6,0.6-0.8c0.9-0.5,1.3,1.7,1.4,2.2c0.2,1.3,0.2,2.6,0.7,3.8c0.2,0.5,0.5,1,1,1.1c0.4,0.1,0.9,0,1.2-0.3 c0.4-0.4,0.5-1.1,0.6-1.7c0.1-0.7,0.1-1.3,0.2-2c0.1-0.4,0.3-2,1-1.5c0.3,0.2,0.4,0.7,0.4,1c0.1,0.4,0.1,0.8,0.2,1.2 c0.1,0.5,0.3,1.1,0.8,1.3c0.4,0.2,0.9,0.2,1.3,0l0-1.2C16.3,9.8,16.2,9.8,16,9.8z"/><path fill="#5BC6E8" d="M10,0C4.5,0,0,4.5,0,10s4.5,10,10,10s10-4.5,10-10S15.5,0,10,0z M10,18.9c-4.9,0-8.9-4-8.9-8.9 s4-8.9,8.9-8.9s8.9,4,8.9,8.9S14.9,18.9,10,18.9z"/></svg>'),
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
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats','author','excerpt', 'comments' ),
		'taxonomies'            => array( 'category', 'post_tag', 'pays', 'genre' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'				=> 'data:image/svg+xml;base64,' . base64_encode('<svg version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 20 20" style="enable-background:new 0 0 20 20;" xml:space="preserve"><path fill="#5BC6E8" d="M16,9.8c-0.4,0-0.7-0.3-0.9-0.7c-0.3-0.8-0.3-1.6-0.6-2.3C14.3,6.4,14,6,13.6,5.9 c-0.4-0.1-0.7,0-1,0.3c-0.7,0.6-0.8,1.7-0.9,2.5c-0.1,0.9-0.1,1.9-0.5,2.7c-0.1,0.1-0.2,0.2-0.4,0.2c-0.5-0.2-0.7-1.1-0.7-1.7 C10,9.1,10,8.2,9.8,7.4c-0.2-1-0.5-2.5-1.5-2.9C7.8,4.2,7.2,4.3,6.7,4.7c-0.4,0.4-0.7,1-0.8,1.5C5.7,6.9,5.6,7.6,5.5,8.4 c-0.1,0.9-0.3,1.8-0.4,2.7c-0.1,0.7-0.2,1.4-0.5,2C4.5,13.5,4.3,14,4,14.2c-0.1,0.1-0.1,0.1-0.2,0.2c-0.1,0.1-0.1,0.1-0.2,0.2 c0,0,0,0.1,0,0.1c0.1,0.4,0.4,0.7,0.6,1.1c0,0,0,0,0,0c1.2-0.8,1.5-2.4,1.7-3.7c0.2-1.5,0.3-3,0.7-4.4C6.7,7.2,6.8,6.9,7,6.5 c0.1-0.3,0.3-0.6,0.6-0.8c0.9-0.5,1.3,1.7,1.4,2.2c0.2,1.3,0.2,2.6,0.7,3.8c0.2,0.5,0.5,1,1,1.1c0.4,0.1,0.9,0,1.2-0.3 c0.4-0.4,0.5-1.1,0.6-1.7c0.1-0.7,0.1-1.3,0.2-2c0.1-0.4,0.3-2,1-1.5c0.3,0.2,0.4,0.7,0.4,1c0.1,0.4,0.1,0.8,0.2,1.2 c0.1,0.5,0.3,1.1,0.8,1.3c0.4,0.2,0.9,0.2,1.3,0l0-1.2C16.3,9.8,16.2,9.8,16,9.8z"/><path fill="#5BC6E8" d="M10,0C4.5,0,0,4.5,0,10s4.5,10,10,10s10-4.5,10-10S15.5,0,10,0z M10,18.9c-4.9,0-8.9-4-8.9-8.9 s4-8.9,8.9-8.9s8.9,4,8.9,8.9S14.9,18.9,10,18.9z"/></svg>'),
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
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats','author','excerpt', 'comments'  ),
		'taxonomies'            => array( 'category', 'post_tag', 'pays', 'genre','salle' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'				=> 'data:image/svg+xml;base64,' . base64_encode('<svg version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 20 20" style="enable-background:new 0 0 20 20;" xml:space="preserve"><path fill="#5BC6E8" d="M16,9.8c-0.4,0-0.7-0.3-0.9-0.7c-0.3-0.8-0.3-1.6-0.6-2.3C14.3,6.4,14,6,13.6,5.9 c-0.4-0.1-0.7,0-1,0.3c-0.7,0.6-0.8,1.7-0.9,2.5c-0.1,0.9-0.1,1.9-0.5,2.7c-0.1,0.1-0.2,0.2-0.4,0.2c-0.5-0.2-0.7-1.1-0.7-1.7 C10,9.1,10,8.2,9.8,7.4c-0.2-1-0.5-2.5-1.5-2.9C7.8,4.2,7.2,4.3,6.7,4.7c-0.4,0.4-0.7,1-0.8,1.5C5.7,6.9,5.6,7.6,5.5,8.4 c-0.1,0.9-0.3,1.8-0.4,2.7c-0.1,0.7-0.2,1.4-0.5,2C4.5,13.5,4.3,14,4,14.2c-0.1,0.1-0.1,0.1-0.2,0.2c-0.1,0.1-0.1,0.1-0.2,0.2 c0,0,0,0.1,0,0.1c0.1,0.4,0.4,0.7,0.6,1.1c0,0,0,0,0,0c1.2-0.8,1.5-2.4,1.7-3.7c0.2-1.5,0.3-3,0.7-4.4C6.7,7.2,6.8,6.9,7,6.5 c0.1-0.3,0.3-0.6,0.6-0.8c0.9-0.5,1.3,1.7,1.4,2.2c0.2,1.3,0.2,2.6,0.7,3.8c0.2,0.5,0.5,1,1,1.1c0.4,0.1,0.9,0,1.2-0.3 c0.4-0.4,0.5-1.1,0.6-1.7c0.1-0.7,0.1-1.3,0.2-2c0.1-0.4,0.3-2,1-1.5c0.3,0.2,0.4,0.7,0.4,1c0.1,0.4,0.1,0.8,0.2,1.2 c0.1,0.5,0.3,1.1,0.8,1.3c0.4,0.2,0.9,0.2,1.3,0l0-1.2C16.3,9.8,16.2,9.8,16,9.8z"/><path fill="#5BC6E8" d="M10,0C4.5,0,0,4.5,0,10s4.5,10,10,10s10-4.5,10-10S15.5,0,10,0z M10,18.9c-4.9,0-8.9-4-8.9-8.9 s4-8.9,8.9-8.9s8.9,4,8.9,8.9S14.9,18.9,10,18.9z"/></svg>'),
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
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats','author','excerpt', 'comments'  ),
		'taxonomies'            => array( 'category', 'post_tag', 'pays', 'genre','salle' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'				=> 'data:image/svg+xml;base64,' . base64_encode('<svg version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 20 20" style="enable-background:new 0 0 20 20;" xml:space="preserve"><path fill="#5BC6E8" d="M16,9.8c-0.4,0-0.7-0.3-0.9-0.7c-0.3-0.8-0.3-1.6-0.6-2.3C14.3,6.4,14,6,13.6,5.9 c-0.4-0.1-0.7,0-1,0.3c-0.7,0.6-0.8,1.7-0.9,2.5c-0.1,0.9-0.1,1.9-0.5,2.7c-0.1,0.1-0.2,0.2-0.4,0.2c-0.5-0.2-0.7-1.1-0.7-1.7 C10,9.1,10,8.2,9.8,7.4c-0.2-1-0.5-2.5-1.5-2.9C7.8,4.2,7.2,4.3,6.7,4.7c-0.4,0.4-0.7,1-0.8,1.5C5.7,6.9,5.6,7.6,5.5,8.4 c-0.1,0.9-0.3,1.8-0.4,2.7c-0.1,0.7-0.2,1.4-0.5,2C4.5,13.5,4.3,14,4,14.2c-0.1,0.1-0.1,0.1-0.2,0.2c-0.1,0.1-0.1,0.1-0.2,0.2 c0,0,0,0.1,0,0.1c0.1,0.4,0.4,0.7,0.6,1.1c0,0,0,0,0,0c1.2-0.8,1.5-2.4,1.7-3.7c0.2-1.5,0.3-3,0.7-4.4C6.7,7.2,6.8,6.9,7,6.5 c0.1-0.3,0.3-0.6,0.6-0.8c0.9-0.5,1.3,1.7,1.4,2.2c0.2,1.3,0.2,2.6,0.7,3.8c0.2,0.5,0.5,1,1,1.1c0.4,0.1,0.9,0,1.2-0.3 c0.4-0.4,0.5-1.1,0.6-1.7c0.1-0.7,0.1-1.3,0.2-2c0.1-0.4,0.3-2,1-1.5c0.3,0.2,0.4,0.7,0.4,1c0.1,0.4,0.1,0.8,0.2,1.2 c0.1,0.5,0.3,1.1,0.8,1.3c0.4,0.2,0.9,0.2,1.3,0l0-1.2C16.3,9.8,16.2,9.8,16,9.8z"/><path fill="#5BC6E8" d="M10,0C4.5,0,0,4.5,0,10s4.5,10,10,10s10-4.5,10-10S15.5,0,10,0z M10,18.9c-4.9,0-8.9-4-8.9-8.9 s4-8.9,8.9-8.9s8.9,4,8.9,8.9S14.9,18.9,10,18.9z"/></svg>'),
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
		'menu_icon'				=> 'data:image/svg+xml;base64,' . base64_encode('<svg version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 20 20" style="enable-background:new 0 0 20 20;" xml:space="preserve"><path fill="#5BC6E8" d="M16,9.8c-0.4,0-0.7-0.3-0.9-0.7c-0.3-0.8-0.3-1.6-0.6-2.3C14.3,6.4,14,6,13.6,5.9 c-0.4-0.1-0.7,0-1,0.3c-0.7,0.6-0.8,1.7-0.9,2.5c-0.1,0.9-0.1,1.9-0.5,2.7c-0.1,0.1-0.2,0.2-0.4,0.2c-0.5-0.2-0.7-1.1-0.7-1.7 C10,9.1,10,8.2,9.8,7.4c-0.2-1-0.5-2.5-1.5-2.9C7.8,4.2,7.2,4.3,6.7,4.7c-0.4,0.4-0.7,1-0.8,1.5C5.7,6.9,5.6,7.6,5.5,8.4 c-0.1,0.9-0.3,1.8-0.4,2.7c-0.1,0.7-0.2,1.4-0.5,2C4.5,13.5,4.3,14,4,14.2c-0.1,0.1-0.1,0.1-0.2,0.2c-0.1,0.1-0.1,0.1-0.2,0.2 c0,0,0,0.1,0,0.1c0.1,0.4,0.4,0.7,0.6,1.1c0,0,0,0,0,0c1.2-0.8,1.5-2.4,1.7-3.7c0.2-1.5,0.3-3,0.7-4.4C6.7,7.2,6.8,6.9,7,6.5 c0.1-0.3,0.3-0.6,0.6-0.8c0.9-0.5,1.3,1.7,1.4,2.2c0.2,1.3,0.2,2.6,0.7,3.8c0.2,0.5,0.5,1,1,1.1c0.4,0.1,0.9,0,1.2-0.3 c0.4-0.4,0.5-1.1,0.6-1.7c0.1-0.7,0.1-1.3,0.2-2c0.1-0.4,0.3-2,1-1.5c0.3,0.2,0.4,0.7,0.4,1c0.1,0.4,0.1,0.8,0.2,1.2 c0.1,0.5,0.3,1.1,0.8,1.3c0.4,0.2,0.9,0.2,1.3,0l0-1.2C16.3,9.8,16.2,9.8,16,9.8z"/><path fill="#5BC6E8" d="M10,0C4.5,0,0,4.5,0,10s4.5,10,10,10s10-4.5,10-10S15.5,0,10,0z M10,18.9c-4.9,0-8.9-4-8.9-8.9 s4-8.9,8.9-8.9s8.9,4,8.9,8.9S14.9,18.9,10,18.9z"/></svg>'),
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

	
	$labels_interviews = array(
		'name'                  => _x( 'Interviews', 'Post Type General Name', 'panm360' ),
		'singular_name'         => _x( 'Interview', 'Post Type Singular Name', 'panm360' ),
		'menu_name'             => __( 'Interviews', 'panm360' ),
		'name_admin_bar'        => __( 'Interviews', 'panm360' ),
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
	$rewrite_interviews = array(
		'slug'                  => 'interviews-panm360',
		'with_front'            => false,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args_interviews = array(
		'label'                 => __( 'Interviews', 'panm360' ),
		'description'           => __( 'Interviews', 'panm360' ),
		'labels'                => $labels_interviews,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats','author','excerpt', 'comments'  ),
		'taxonomies'            => array( 'category', 'post_tag', 'pays', 'genre','salle' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'				=> 'data:image/svg+xml;base64,' . base64_encode('<svg version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 20 20" style="enable-background:new 0 0 20 20;" xml:space="preserve"><path fill="#5BC6E8" d="M16,9.8c-0.4,0-0.7-0.3-0.9-0.7c-0.3-0.8-0.3-1.6-0.6-2.3C14.3,6.4,14,6,13.6,5.9 c-0.4-0.1-0.7,0-1,0.3c-0.7,0.6-0.8,1.7-0.9,2.5c-0.1,0.9-0.1,1.9-0.5,2.7c-0.1,0.1-0.2,0.2-0.4,0.2c-0.5-0.2-0.7-1.1-0.7-1.7 C10,9.1,10,8.2,9.8,7.4c-0.2-1-0.5-2.5-1.5-2.9C7.8,4.2,7.2,4.3,6.7,4.7c-0.4,0.4-0.7,1-0.8,1.5C5.7,6.9,5.6,7.6,5.5,8.4 c-0.1,0.9-0.3,1.8-0.4,2.7c-0.1,0.7-0.2,1.4-0.5,2C4.5,13.5,4.3,14,4,14.2c-0.1,0.1-0.1,0.1-0.2,0.2c-0.1,0.1-0.1,0.1-0.2,0.2 c0,0,0,0.1,0,0.1c0.1,0.4,0.4,0.7,0.6,1.1c0,0,0,0,0,0c1.2-0.8,1.5-2.4,1.7-3.7c0.2-1.5,0.3-3,0.7-4.4C6.7,7.2,6.8,6.9,7,6.5 c0.1-0.3,0.3-0.6,0.6-0.8c0.9-0.5,1.3,1.7,1.4,2.2c0.2,1.3,0.2,2.6,0.7,3.8c0.2,0.5,0.5,1,1,1.1c0.4,0.1,0.9,0,1.2-0.3 c0.4-0.4,0.5-1.1,0.6-1.7c0.1-0.7,0.1-1.3,0.2-2c0.1-0.4,0.3-2,1-1.5c0.3,0.2,0.4,0.7,0.4,1c0.1,0.4,0.1,0.8,0.2,1.2 c0.1,0.5,0.3,1.1,0.8,1.3c0.4,0.2,0.9,0.2,1.3,0l0-1.2C16.3,9.8,16.2,9.8,16,9.8z"/><path fill="#5BC6E8" d="M10,0C4.5,0,0,4.5,0,10s4.5,10,10,10s10-4.5,10-10S15.5,0,10,0z M10,18.9c-4.9,0-8.9-4-8.9-8.9 s4-8.9,8.9-8.9s8.9,4,8.9,8.9S14.9,18.9,10,18.9z"/></svg>'),
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
		'rewrite'				=> $rewrite_interviews
		);
		
	register_post_type( 'interviews', $args_interviews );

	$labels_ecoutes = array(
		'name'                  => _x( 'Liste d\'écoutes', 'Post Type General Name', 'panm360' ),
		'singular_name'         => _x( 'Liste d\'écoute', 'Post Type Singular Name', 'panm360' ),
		'menu_name'             => __( 'Liste d\'écoute', 'panm360' ),
		'name_admin_bar'        => __( 'Liste d\'écoute', 'panm360' ),
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
	$rewrite_ecoutes = array(
		'slug'                  => 'ecoutes-panm360',
		'with_front'            => false,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args_ecoutes = array(
		'label'                 => __( 'Liste d\'écoute', 'panm360' ),
		'description'           => __( 'Liste d\'écoute', 'panm360' ),
		'labels'                => $labels_ecoutes,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats','author','excerpt', 'comments'  ),
		'taxonomies'            => array( 'category', 'post_tag', 'pays', 'genre' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'				=> 'data:image/svg+xml;base64,' . base64_encode('<svg version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 20 20" style="enable-background:new 0 0 20 20;" xml:space="preserve"><path fill="#5BC6E8" d="M16,9.8c-0.4,0-0.7-0.3-0.9-0.7c-0.3-0.8-0.3-1.6-0.6-2.3C14.3,6.4,14,6,13.6,5.9 c-0.4-0.1-0.7,0-1,0.3c-0.7,0.6-0.8,1.7-0.9,2.5c-0.1,0.9-0.1,1.9-0.5,2.7c-0.1,0.1-0.2,0.2-0.4,0.2c-0.5-0.2-0.7-1.1-0.7-1.7 C10,9.1,10,8.2,9.8,7.4c-0.2-1-0.5-2.5-1.5-2.9C7.8,4.2,7.2,4.3,6.7,4.7c-0.4,0.4-0.7,1-0.8,1.5C5.7,6.9,5.6,7.6,5.5,8.4 c-0.1,0.9-0.3,1.8-0.4,2.7c-0.1,0.7-0.2,1.4-0.5,2C4.5,13.5,4.3,14,4,14.2c-0.1,0.1-0.1,0.1-0.2,0.2c-0.1,0.1-0.1,0.1-0.2,0.2 c0,0,0,0.1,0,0.1c0.1,0.4,0.4,0.7,0.6,1.1c0,0,0,0,0,0c1.2-0.8,1.5-2.4,1.7-3.7c0.2-1.5,0.3-3,0.7-4.4C6.7,7.2,6.8,6.9,7,6.5 c0.1-0.3,0.3-0.6,0.6-0.8c0.9-0.5,1.3,1.7,1.4,2.2c0.2,1.3,0.2,2.6,0.7,3.8c0.2,0.5,0.5,1,1,1.1c0.4,0.1,0.9,0,1.2-0.3 c0.4-0.4,0.5-1.1,0.6-1.7c0.1-0.7,0.1-1.3,0.2-2c0.1-0.4,0.3-2,1-1.5c0.3,0.2,0.4,0.7,0.4,1c0.1,0.4,0.1,0.8,0.2,1.2 c0.1,0.5,0.3,1.1,0.8,1.3c0.4,0.2,0.9,0.2,1.3,0l0-1.2C16.3,9.8,16.2,9.8,16,9.8z"/><path fill="#5BC6E8" d="M10,0C4.5,0,0,4.5,0,10s4.5,10,10,10s10-4.5,10-10S15.5,0,10,0z M10,18.9c-4.9,0-8.9-4-8.9-8.9 s4-8.9,8.9-8.9s8.9,4,8.9,8.9S14.9,18.9,10,18.9z"/></svg>'),
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
		'rewrite'				=> $rewrite_ecoutes
		);
		
	register_post_type( 'ecoutes', $args_ecoutes );

	$labels_podcasts = array(
		'name'                  => _x( 'Podcasts', 'Post Type General Name', 'panm360' ),
		'singular_name'         => _x( 'Podcast', 'Post Type Singular Name', 'panm360' ),
		'menu_name'             => __( 'Podcast', 'panm360' ),
		'name_admin_bar'        => __( 'Podcast', 'panm360' ),
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
	$rewrite_podcasts = array(
		'slug'                  => 'podcasts360',
		'with_front'            => false,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args_podcasts = array(
		'label'                 => __( 'Podcast', 'panm360' ),
		'description'           => __( 'Podcast', 'panm360' ),
		'labels'                => $labels_podcasts,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats','author','excerpt', 'comments'  ),
		'taxonomies'            => array( 'category', 'post_tag', 'pays', 'genre' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'				=> 'data:image/svg+xml;base64,' . base64_encode('<svg version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 20 20" style="enable-background:new 0 0 20 20;" xml:space="preserve"><path fill="#5BC6E8" d="M16,9.8c-0.4,0-0.7-0.3-0.9-0.7c-0.3-0.8-0.3-1.6-0.6-2.3C14.3,6.4,14,6,13.6,5.9 c-0.4-0.1-0.7,0-1,0.3c-0.7,0.6-0.8,1.7-0.9,2.5c-0.1,0.9-0.1,1.9-0.5,2.7c-0.1,0.1-0.2,0.2-0.4,0.2c-0.5-0.2-0.7-1.1-0.7-1.7 C10,9.1,10,8.2,9.8,7.4c-0.2-1-0.5-2.5-1.5-2.9C7.8,4.2,7.2,4.3,6.7,4.7c-0.4,0.4-0.7,1-0.8,1.5C5.7,6.9,5.6,7.6,5.5,8.4 c-0.1,0.9-0.3,1.8-0.4,2.7c-0.1,0.7-0.2,1.4-0.5,2C4.5,13.5,4.3,14,4,14.2c-0.1,0.1-0.1,0.1-0.2,0.2c-0.1,0.1-0.1,0.1-0.2,0.2 c0,0,0,0.1,0,0.1c0.1,0.4,0.4,0.7,0.6,1.1c0,0,0,0,0,0c1.2-0.8,1.5-2.4,1.7-3.7c0.2-1.5,0.3-3,0.7-4.4C6.7,7.2,6.8,6.9,7,6.5 c0.1-0.3,0.3-0.6,0.6-0.8c0.9-0.5,1.3,1.7,1.4,2.2c0.2,1.3,0.2,2.6,0.7,3.8c0.2,0.5,0.5,1,1,1.1c0.4,0.1,0.9,0,1.2-0.3 c0.4-0.4,0.5-1.1,0.6-1.7c0.1-0.7,0.1-1.3,0.2-2c0.1-0.4,0.3-2,1-1.5c0.3,0.2,0.4,0.7,0.4,1c0.1,0.4,0.1,0.8,0.2,1.2 c0.1,0.5,0.3,1.1,0.8,1.3c0.4,0.2,0.9,0.2,1.3,0l0-1.2C16.3,9.8,16.2,9.8,16,9.8z"/><path fill="#5BC6E8" d="M10,0C4.5,0,0,4.5,0,10s4.5,10,10,10s10-4.5,10-10S15.5,0,10,0z M10,18.9c-4.9,0-8.9-4-8.9-8.9 s4-8.9,8.9-8.9s8.9,4,8.9,8.9S14.9,18.9,10,18.9z"/></svg>'),
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
		'rewrite'				=> $rewrite_podcasts
		);
		
	register_post_type( 'podcasts', $args_podcasts );
			
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
            
			delete_transient( 'agenda-mini' );
			$count = 12;
			$start = date('Y/m/d');
			$end = date('Y/m/d', strtotime($start. ' + 15 days'));			
			$calendrier = get_liste_concerts( $start, $end , $count );
			set_transient( 'agenda-mini',$calendrier, 1 * DAY_IN_SECONDS );      
        }
    }
add_action( 'save_post', 'set_default_object_terms', 0, 2 );	
?>