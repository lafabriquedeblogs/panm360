<?php

add_action( 'acf/init', 'register_panm360_banniere_pub');

function register_panm360_banniere_pub() {

    // register a testimonial block.
    acf_register_block_type(array(
        'name'              => 'banniere_pub',
        'title'             => __('Bannières publicitaires'),
        'description'       => __('Bannières publicitaires'),
        'render_callback'   => 'banniere_pub_render_callback',
        'category'          => 'panm360-blocks',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'pubs', 'menu' ),
    ));
}

function banniere_pub_render_callback( $block, $content = '', $is_preview = false ){

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
	
	$menus_banniere_pub = get_field("menus_banniere_pub");

	?>

<section id="<?php echo esc_attr($id); ?>" class="publicite publicite-banniere <?php echo esc_attr($className); ?>">
	<a href="">
		<img src="/wp-content/themes/panm360/src/img/publicite-banniere.png" width="728" height="90" alt="publicite"/>
	</a> 
</section>
			
<?php } ?>
