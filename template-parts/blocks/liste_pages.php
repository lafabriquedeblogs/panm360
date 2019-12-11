<?php

add_action( 'acf/init', 'register_panm360_liste_pages');

function register_panm360_liste_pages() {

    // register a testimonial block.
    acf_register_block_type(array(
        'name'              => 'liste_pages',
        'title'             => __('Liste pages'),
        'description'       => __('Liste pages'),
        'render_callback'   => 'liste_pages_render_callback',
        'category'          => 'panm360-blocks',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'Liste', 'menu' ),
    ));
}

function liste_pages_render_callback( $block, $content = '', $is_preview = false ){

	$id = 'liste-pages-' . $block['id'];
	if( !empty($block['anchor']) ) {
	    $id = $block['anchor'];
	}
	
	// Create class attribute allowing for custom "className" and "align" values.
	$className = 'liste-pages';
	if( !empty($block['className']) ) {
	    $className .= ' ' . $block['className'];
	}
	if( !empty($block['align']) ) {
	    $className .= ' align' . $block['align'];
	}
	
	$menus_liste_pages = get_field("menus_liste_pages");

	?>
		<ul id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
		
		<?php  foreach($menus_liste_pages as $page ){  ?>
			<li><a href="<?php echo get_permalink( $page['ajouter_une_page'] );?>"><?php echo get_the_title( $page['ajouter_une_page'] );?></a></li>	
		<?php } ?>			
			
			
		</ul>
			
<?php } ?>
