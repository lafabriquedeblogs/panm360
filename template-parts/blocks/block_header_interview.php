<?php

add_action( 'acf/init', 'register_panm360_header_interview');

function register_panm360_header_interview() {

    // register a testimonial block.
    acf_register_block_type(array(
        'name'              => 'header_interview',
        'title'             => __('header interview'),
        'description'       => __('header interview'),
        'render_callback'   => 'header_interview_render_callback',
        'category'          => 'panm360-blocks',
        'icon'              => 'admin-comments',
        'mode'				=> 'edit',
        'keywords'          => array( 'hero', 'interview', 'panm360' ),
    ));
}

function header_interview_render_callback( $block, $content = '', $is_preview = false ){

	$id = 'header_interview_' . $block['id'];
	if( !empty($block['anchor']) ) {
	    $id = $block['anchor'];
	}
	
	// Create class attribute allowing for custom "className" and "align" values.
	$className = 'header_interview';
	if( !empty($block['className']) ) {
	    $className .= ' ' . $block['className'];
	}
	if( !empty($block['align']) ) {
	    $className .= ' align' . $block['align'];
	}
	$image_data =  get_field('image');
	$image = $image_data['sizes']['medium'];
	$introduction_presentation = get_field('introduction_presentation');
	$author = get_the_author();
	?>
			<div id="header_interview">
				
				<div>
					<img src="<?php echo $image;?>" />
				</div>
				<div>
					<h2><?php the_title(); ?></h2>
					<span><?php echo $author;?></span>
					<p><?php echo $introduction_presentation;?></p>
				</div>
			</div><!-- wrap-new-featured-slider -->						
	<?php

}