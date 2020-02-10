<?php

add_action( 'acf/init', 'register_panm360_agenda_360');

function register_panm360_agenda_360() {

    // register a testimonial block.
    acf_register_block_type(array(
        'name'              => 'agenda_360',
        'title'             => __('Agenda 360'),
        'description'       => __('Agenda 360'),
        'render_callback'   => 'agenda_360_render_callback',
        'category'          => 'panm360-blocks',
        'icon'              => 'admin-comments',
        'mode'				=> 'edit',
        'keywords'          => array( 'agenda', 'menu' ),
    ));
}

function agenda_360_render_callback( $block, $content = '', $is_preview = false ){

	$id = 'agenda_360_' . $block['id'];
	if( !empty($block['anchor']) ) {
	    $id = $block['anchor'];
	}
	
	// Create class attribute allowing for custom "className" and "align" values.
	$className = 'agenda_360';
	if( !empty($block['className']) ) {
	    $className .= ' ' . $block['className'];
	}
	if( !empty($block['align']) ) {
	    $className .= ' align' . $block['align'];
	}
	
	$genre = false;
	$count = get_field('nombre_de_spectacle');
	$genre_musical = get_field('genre_musical');

	if( $genre_musical || !empty($genre_musical ) ){
		$genre = $genre_musical;
	}

	
	$start = date('Y/m/d');
	$end = '2020/06/30';

	$agenda_full_id = apply_filters( 'wpml_object_id', 6944, 'page', TRUE  );
	$agenda_full_permalien = get_permalink( $agenda_full_id );
	
	$year = date('Y');
	$month =  date('m');
	$nonce = wp_create_nonce("my_user_like_nonce");
								
	$post_start = 1;

	$timeout = false;
	$today_timestamp = strtotime($start);
	
	
	$calendrier = get_liste_concerts( $start, $end , $count, $genre );
	
?>

<div class="<?php echo esc_attr($className); ?>" id="<?php echo esc_attr($id); ?>">
	
	<div class="title-calendrier">
		<h2>Agenda <span class="bold">360</span></h2>
		<form id="choix-style-musical">
			<div class="select-light">
				<select id="agenda-genre">
					<?php $genres = get_main_genres( false ); ?>
					<?php foreach( $genres as $ge):
					
						$selected = ( $ge['id'] == $genre ) ? 'selected' : '';
						
					?>
						
						<option value="<?php echo $ge['id'];?>" <?php echo $selected;?>><?php echo $ge['name'];?></option>
					<?php endforeach; ?>
				</select>
				<input type="hidden" id="agenda-start" value="<?php echo $start;?>"/>
				<input type="hidden" id="agenda-year" value="<?php echo $year;?>"/>
				<input type="hidden" id="agenda-month" value="<?php echo $month;?>"/>
				<input type="hidden" id="agenda-nonce" value="<?php echo $nonce;?>"/>
				<input type="hidden" id="agenda-count" value="<?php echo $count;?>"/>
			</div>
			<div class="lds-facebook"><div></div><div></div><div></div></div>
		</form>
	</div>
	
	<a href="<?php echo $agenda_full_permalien;?>" class="plus-de"><?php _e('Voir l\'agenda complet','panm360'); ?> <svg class="icone"><use xlink:href="#fleche-lien"></use></svg></a>	
	<div id="agenda_mini">
		<ul class="calendrier-ul-container">
			<?php
		
			if( count($calendrier) > 0 ):
			
			foreach( $calendrier as $_date => $items ){
				foreach( $items as $item ){
		
					if( $post_start > $count ) break;
					$post_start++;
						
					include( locate_template( '/template-parts/modules/element-item-calendrier.php', false, false ) );
						
					}
			}
			
			else:
			?>
				<li class="no-result">
					<h3><?php _e('Aucun résultat','panm360'); ?></h3>
				</li>
			<?php
			endif;
			?>
		</ul>
	</div><!-- #agenda_mini -->
</div>
			
<?php } ?>
