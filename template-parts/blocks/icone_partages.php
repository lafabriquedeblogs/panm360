<?php
/*
	array (size=2)
      'icone_reseau_social' => 
        array (size=2)
          'ID' => string 'facebook' (length=8)
          '_file_url' => string 'http://fabrice-2.local:5757/wp-content/themes/panm360/assets/img/panm360_sprite.svg' (length=72)
      'url' => string 'https://facebook.com'	
*/
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
	
	$rows_icons = get_field("reseau_social",'options');
	
	//%permalink%
	
	
	
	if( is_admin() )
		include_once( get_template_directory() . "/assets/img/panm360_sprite.svg");
	
	?>
		
       <!-- Go to www.addthis.com/dashboard to customize your tools -->
       <div class="addthis_inline_share_toolbox"></div>
       
    <?php /* ?>        
		<ul id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
			
				<?php foreach( $rows_icons as $icon ){
					
					echo '<pre>';
						var_dump($icon);
					echo '</pre>';
				?>
				
						<li class="reseau-partage">
							<a href="" id="<?php echo $icon['icone_reseau_social']['ID'];?>">
								<svg class="icon"><use xlink:href="#<?php echo $icon['icone_reseau_social']['ID'];?>"></use></svg>
							</a>
						</li>
				<?php }	?>
			
		</ul>
	<?php */ ?>		
<?php } ?>
