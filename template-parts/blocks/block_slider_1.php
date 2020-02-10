<?php

add_action( 'acf/init', 'register_panm360_slider_1');

function register_panm360_slider_1() {

    // register a testimonial block.
    acf_register_block_type(array(
        'name'              => 'slider_1',
        'title'             => __('Slider 1'),
        'description'       => __('Slider 1'),
        'render_callback'   => 'slider_1_render_callback',
        'category'          => 'panm360-blocks',
        'icon'              => 'admin-comments',
        'mode'				=> 'edit',
        'keywords'          => array( 'slider', 'panm360' ),
    ));
}

function slider_1_render_callback( $block, $content = '', $is_preview = false ){

	$id = 'slider_1_' . $block['id'];
	if( !empty($block['anchor']) ) {
	    $id = $block['anchor'];
	}
	
	// Create class attribute allowing for custom "className" and "align" values.
	$className = 'slider_1';
	if( !empty($block['className']) ) {
	    $className .= ' ' . $block['className'];
	}
	if( !empty($block['align']) ) {
	    $className .= ' align' . $block['align'];
	}
		if( have_rows('slide') ){
	?>
			<div id="wrap-new-featured-slider">
				<ul id="new-featured-slider">					
					<?php
					while( have_rows('slide') ){
						the_row();
						$titre = get_sub_field('titre');
						$soustitre = get_sub_field( 'sous_titre' );
						$image_data = get_sub_field( 'image' );
						$content = get_sub_field( 'texte' );
						$cta = get_sub_field( 'bouton' );
						$cta_texte = $cta['titre'];
						$cta_lien = $cta['lien'];
						
						
						$image = get_template_directory_uri()."/src/img/image-featured-home-slider-dev.png";
						
						if( $image_data ){
							$image = $image_data['sizes']['shop_single'];
						}
						
						
						?>
						
						<li class="new-featured-slider--slide element">
							<div class="new-featured-slider--slide--row">
								
								<div class="new-featured-slider--slide--content">
									<div class="slide-content">
										<h2 class="element-title"><?php echo $titre;?></h2>
										<h3 class="sub-title"><?php echo $soustitre;?></h3>
										<p class="excerpt"><?php echo $content;?></p>
									</div>
								</div>
								
								<div class="new-featured-slider--slide--picture" style="background-image:url('<?php echo $image; ?>'); background-size: cover;background-repeat: no-repeat; background-position: center center;">
									<img src="<?php echo $image;?>"  class="hidden" alt="title"/>
								</div>
							</div><!-- new-featured-slider--slide--row -->
						</li><!-- new-featured-slider--slide -->
						
				<?php }	?>
				</ul><!-- new-featured-slider -->
			</div><!-- wrap-new-featured-slider -->						
		<?php
		}
}