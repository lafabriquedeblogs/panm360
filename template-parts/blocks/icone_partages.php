<?php

add_action( 'acf/init', 'register_panm360_icones_partage');

function register_panm360_icones_partage() {

    // register a testimonial block.
    acf_register_block_type(array(
        'name'              => 'icones_partage',
        'title'             => __('Icônes de partage'),
        'description'       => __('Icônes de partage'),
        'render_callback'   => 'icones_partage_render_callback',
        'category'          => 'panm360-blocks',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'social', 'share' ),
    ));
}

function icones_partage_render_callback( $block, $content = '', $is_preview = false ){

	$id = 'icones-partage-' . $block['id'];
	if( !empty($block['anchor']) ) {
	    $id = $block['anchor'];
	}
	
	// Create class attribute allowing for custom "className" and "align" values.
	$className = 'icones-de-partage';
	if( !empty($block['className']) ) {
	    $className .= ' ' . $block['className'];
	}
	if( !empty($block['align']) ) {
	    $className .= ' align' . $block['align'];
	}
	
	?>
		
       <!-- Go to www.addthis.com/dashboard to customize your tools -->
       <div class="addthis_inline_share_toolbox"></div>
       
       
    <?php if( is_admin() ): ?>
    
    	<img src="<?php echo get_template_directory_uri(  );?>/assets/img/socials_admin_block.jpg" width="121px" height="57px"/>
    <?php endif; ?>		
<?php } ?>
