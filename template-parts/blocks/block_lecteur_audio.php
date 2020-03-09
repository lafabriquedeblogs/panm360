<?php

add_action( 'acf/init', 'register_panm360_lecteur_audio');

function register_panm360_lecteur_audio() {

    // register a testimonial block.
    acf_register_block_type(array(
        'name'              => 'lecteur_audio',
        'title'             => __('Lecteur audio Panm 360'),
        'description'       => __('Lecteur audio Panm 360'),
        'render_callback'   => 'lecteur_audio_render_callback',
        'category'          => 'panm360-blocks',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'Liste', 'menu' ),
    ));
}

function lecteur_audio_render_callback( $block, $content = '', $is_preview = false ){

	$id = 'lecteur-ausio-panm360-' . $block['id'];
	if( !empty($block['anchor']) ) {
	    $id = $block['anchor'];
	}
	
	// Create class attribute allowing for custom "className" and "align" values.
	$className = 'lecteur-ausio-panm360';
	if( !empty($block['className']) ) {
	    $className .= ' ' . $block['className'];
	}
	if( !empty($block['align']) ) {
	    $className .= ' align' . $block['align'];
	}
	$className .=" --panm360-lecteur-audio-embed-container";
	
	$lecteur = get_field("choisir_lorigine_");
	$url = get_field("url_du_lecteur");
	$output = "";
	
	switch($lecteur){
		case 'Spotify':
			$output = '<iframe src="'.$url.'" width="100%" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>';
			break;
		case 'Deezer':
			$output = '<iframe scrolling="no" frameborder="0" allowTransparency="true" src="'.$url.'" width="100%" height="380"></iframe>';
			break;
		case 'Soundcloud':
			$output = "";
			break;
		case 'Bandcamp':
			$output = "";
			break;
	}
	
	?>

		
	<div id="<?php echo $id;?>" class="<?php echo $className;?>">
		<?php echo $output;?>
	</div>
			
<?php } ?>
