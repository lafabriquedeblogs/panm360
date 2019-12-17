<?php

add_action( 'acf/init', 'register_panm360_hero_page');

function register_panm360_hero_page() {

    // register a testimonial block.
    acf_register_block_type(array(
        'name'              => 'hero_page',
        'title'             => __('Hero'),
        'description'       => __('Hero'),
        'render_callback'   => 'hero_page_render_callback',
        'category'          => 'panm360-blocks',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'Liste', 'menu' ),
    ));
}

function hero_page_render_callback( $block, $content = '', $is_preview = false ){

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
	
	$menus_hero_page = get_field("menus_hero_page");

	?>
		<ul id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
		

<div id="top-360-hero" class="single-page-hero">
	<h1><strong class="small">Top</strong> 360</h1>
	<p>De la décennie <strong class="blanc">2010-2019</strong></p>
</div>

			
<?php } ?>
