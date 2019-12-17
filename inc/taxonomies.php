<?php

// Register Custom Taxonomy
function panm360_taxonomies() {
	
	$labels_generale = array(
		'name'                       => _x( 'Générales', 'Taxonomy General Name', 'panm360' ),
		'singular_name'              => _x( 'Générale', 'Taxonomy Singular Name', 'panm360' ),
		'menu_name'                  => __( 'Générale', 'panm360' ),
		'all_items'                  => __( 'All Items', 'panm360' ),
		'parent_item'                => __( 'Parent Item', 'panm360' ),
		'parent_item_colon'          => __( 'Parent Item:', 'panm360' ),
		'new_item_name'              => __( 'New Item Name', 'panm360' ),
		'add_new_item'               => __( 'Add New Item', 'panm360' ),
		'edit_item'                  => __( 'Edit Item', 'panm360' ),
		'update_item'                => __( 'Update Item', 'panm360' ),
		'view_item'                  => __( 'View Item', 'panm360' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'panm360' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'panm360' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'panm360' ),
		'popular_items'              => __( 'Popular Items', 'panm360' ),
		'search_items'               => __( 'Search Items', 'panm360' ),
		'not_found'                  => __( 'Not Found', 'panm360' ),
		'no_terms'                   => __( 'No items', 'panm360' ),
		'items_list'                 => __( 'Items list', 'panm360' ),
		'items_list_navigation'      => __( 'Items list navigation', 'panm360' ),
	);
	$args_generale = array(
		'labels'                     => $labels_generale,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'generale', array(  'post','artiste','records' , 'concerts' ), $args_generale );
	
	$labels_genre = array(
		'name'                       => _x( 'Genres', 'Taxonomy General Name', 'panm360' ),
		'singular_name'              => _x( 'Genre', 'Taxonomy Singular Name', 'panm360' ),
		'menu_name'                  => __( 'Genre', 'panm360' ),
		'all_items'                  => __( 'All Items', 'panm360' ),
		'parent_item'                => __( 'Parent Item', 'panm360' ),
		'parent_item_colon'          => __( 'Parent Item:', 'panm360' ),
		'new_item_name'              => __( 'New Item Name', 'panm360' ),
		'add_new_item'               => __( 'Add New Item', 'panm360' ),
		'edit_item'                  => __( 'Edit Item', 'panm360' ),
		'update_item'                => __( 'Update Item', 'panm360' ),
		'view_item'                  => __( 'View Item', 'panm360' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'panm360' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'panm360' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'panm360' ),
		'popular_items'              => __( 'Popular Items', 'panm360' ),
		'search_items'               => __( 'Search Items', 'panm360' ),
		'not_found'                  => __( 'Not Found', 'panm360' ),
		'no_terms'                   => __( 'No items', 'panm360' ),
		'items_list'                 => __( 'Items list', 'panm360' ),
		'items_list_navigation'      => __( 'Items list navigation', 'panm360' ),
	);
	$args_genre = array(
		'labels'                     => $labels_genre,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'genre', array(  'post','artiste','records' , 'concerts' ), $args_genre );


	$annee_album_labels = array(
		'name'                       => _x( 'Années', 'Taxonomy General Name', 'panm360' ),
		'singular_name'              => _x( 'Année', 'Taxonomy Singular Name', 'panm360' ),
		'menu_name'                  => __( 'Année', 'panm360' ),
		'all_items'                  => __( 'All Items', 'panm360' ),
		'parent_item'                => __( 'Parent Item', 'panm360' ),
		'parent_item_colon'          => __( 'Parent Item:', 'panm360' ),
		'new_item_name'              => __( 'New Item Name', 'panm360' ),
		'add_new_item'               => __( 'Add New Item', 'panm360' ),
		'edit_item'                  => __( 'Edit Item', 'panm360' ),
		'update_item'                => __( 'Update Item', 'panm360' ),
		'view_item'                  => __( 'View Item', 'panm360' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'panm360' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'panm360' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'panm360' ),
		'popular_items'              => __( 'Popular Items', 'panm360' ),
		'search_items'               => __( 'Search Items', 'panm360' ),
		'not_found'                  => __( 'Not Found', 'panm360' ),
		'no_terms'                   => __( 'No items', 'panm360' ),
		'items_list'                 => __( 'Items list', 'panm360' ),
		'items_list_navigation'      => __( 'Items list navigation', 'panm360' ),
	);
	$args_annee_album = array(
		'labels'                     => $annee_album_labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'annee', array(  'post','artiste','records' , 'concerts' ), $args_annee_album );

	$pays_labels = array(
		'name'                       => _x( 'Pays', 'Taxonomy General Name', 'panm360' ),
		'singular_name'              => _x( 'Pays', 'Taxonomy Singular Name', 'panm360' ),
		'menu_name'                  => __( 'Pays', 'panm360' ),
		'all_items'                  => __( 'All Items', 'panm360' ),
		'parent_item'                => __( 'Parent Item', 'panm360' ),
		'parent_item_colon'          => __( 'Parent Item:', 'panm360' ),
		'new_item_name'              => __( 'New Item Name', 'panm360' ),
		'add_new_item'               => __( 'Add New Item', 'panm360' ),
		'edit_item'                  => __( 'Edit Item', 'panm360' ),
		'update_item'                => __( 'Update Item', 'panm360' ),
		'view_item'                  => __( 'View Item', 'panm360' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'panm360' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'panm360' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'panm360' ),
		'popular_items'              => __( 'Popular Items', 'panm360' ),
		'search_items'               => __( 'Search Items', 'panm360' ),
		'not_found'                  => __( 'Not Found', 'panm360' ),
		'no_terms'                   => __( 'No items', 'panm360' ),
		'items_list'                 => __( 'Items list', 'panm360' ),
		'items_list_navigation'      => __( 'Items list navigation', 'panm360' ),
	);
	$args_pays = array(
		'labels'                     => $pays_labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'pays', array( 'post','artiste','records' , 'concerts' ), $args_pays );

	$label_labels = array(
		'name'                       => _x( 'Labels', 'Taxonomy General Name', 'panm360' ),
		'singular_name'              => _x( 'Label', 'Taxonomy Singular Name', 'panm360' ),
		'menu_name'                  => __( 'Label', 'panm360' ),
		'all_items'                  => __( 'All Items', 'panm360' ),
		'parent_item'                => __( 'Parent Item', 'panm360' ),
		'parent_item_colon'          => __( 'Parent Item:', 'panm360' ),
		'new_item_name'              => __( 'New Item Name', 'panm360' ),
		'add_new_item'               => __( 'Add New Item', 'panm360' ),
		'edit_item'                  => __( 'Edit Item', 'panm360' ),
		'update_item'                => __( 'Update Item', 'panm360' ),
		'view_item'                  => __( 'View Item', 'panm360' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'panm360' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'panm360' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'panm360' ),
		'popular_items'              => __( 'Popular Items', 'panm360' ),
		'search_items'               => __( 'Search Items', 'panm360' ),
		'not_found'                  => __( 'Not Found', 'panm360' ),
		'no_terms'                   => __( 'No items', 'panm360' ),
		'items_list'                 => __( 'Items list', 'panm360' ),
		'items_list_navigation'      => __( 'Items list navigation', 'panm360' ),
	);
	$args_label = array(
		'labels'                     => $label_labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'label', array( 'artiste','records' , 'concerts' ), $args_label );
}
add_action( 'init', 'panm360_taxonomies', 0 );
	
?>