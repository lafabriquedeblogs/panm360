<?php

add_action( 'acf/init', 'register_panm360_single_agenda');

function register_panm360_single_agenda() {

    // register a testimonial block.
    acf_register_block_type(array(
        'name'              => 'single_agenda',
        'title'             => __('Single Agenda'),
        'description'       => __('Single Agenda'),
        'render_callback'   => 'single_agenda_render_callback',
        'category'          => 'panm360-blocks',
        'icon'              => 'admin-comments',
        'mode'				=> 'edit',
        'keywords'          => array( 'social', 'share' ),
    ));
}

function single_agenda_render_callback( $block, $content = '', $is_preview = false ){

	$id = 'single-agenda-' . $block['id'];
	if( !empty($block['anchor']) ) {
	    $id = $block['anchor'];
	}
	
	// Create class attribute allowing for custom "className" and "align" values.
	$className = 'single-agenda';
	if( !empty($block['className']) ) {
	    $className .= ' ' . $block['className'];
	}
	if( !empty($block['align']) ) {
	    $className .= ' align' . $block['align'];
	}
	
    $selectionner_un_agenda = get_field('selectionner_un_agenda');
    $saisir_une_ou_plusieurs_id_dagendas = get_field('saisir_une_ou_plusieurs_id_dagenda');
    
    $agendas =  ( !empty( $selectionner_un_agenda )) ? $selectionner_un_agenda : explode(',', $saisir_une_ou_plusieurs_id_dagendas);
    
	$agendas_count = count($agendas);	
	
	$args = array(
		'post_type' => 'agenda',
		'posts_per_page' => $agendas_count,
		'post_status' => 'publish',
		'post__in' => $agendas
	);
	
	$agendas = new WP_Query($args);
	$elements = array();
	
	
	while( $agendas->have_posts() ){
		$agendas->the_post();

		$agenda_id = get_the_id();
		
		$titre = get_the_title( $agenda_id );
		$genres = get_genre_parents( $agenda_id , false );
		
		$ville =  get_ville( $agenda_id );
		$salle = get_salle( $agenda_id );
		
		$dates_data = get_field('dates', $agenda_id);
	
		
		
		$dates_str = $dates_data[0]['date_concert'];
		$date = str_replace('/', '-', $dates_str);
		$date =  date('Y-m-d', strtotime($date));
		$timestamp = strtotime($date);
		
		$date = date_i18n('D \<\s\p\a\n \c\l\a\s\s\=\"\m\e\d\i\u\m\"\>d M\<\/\s\p\a\n\> Y', $timestamp);
		
		$heure = get_time_concert( $agenda_id, date_i18n('Ymd', $timestamp) );
		
		$prix = get_field('prix',$agenda_id );
		$informations_supplementaires = get_field( 'informations_supplementaires' , $agenda_id );
		
		$agenda_commente = get_field('agenda_commente',$agenda_id);
		$permalien = get_permalink( $agenda_id );
		
		ob_start();
?>

	<li class="aside-item-calendrier element">
			<div class="detail <?php if( $agenda_commente ): ?>agenda-commente<?php endif; ?>">
				<span class="date"><?php echo $date;?> • <?php echo $heure;?></span>
				<!-- <span class="genre album-genre element-genre"><?php echo $genres?></span> -->
				<span class="element-title"><?php echo $titre?></span>
				<?php if( $informations_supplementaires ): ?>
					<span class="element-infos-supp"><?php echo implode(', ', $informations_supplementaires );?></span>
				<?php endif; ?>
				<span class="element-location"><span class="medium"><?php echo $salle;?></span> - <?php echo $ville?></span>
				<!-- <span class="element-prix"><?php echo $prix['montant'];?></span> -->
			</div>
	
			
			<?php if( $agenda_commente ): ?>
			<a href="<?php echo $permalien;?>" class="link-vignette"><svg class="icon bleu"><use xlink:href="#plus_cercle"></use></svg></a>
			<?php endif; ?>
	</li>			
<?php	
		$li = ob_get_clean();
		$elements[$timestamp] = $li;
		$agendas_count--;
	}
	
	wp_reset_query();
	
	ksort($elements);
	
	echo '<ul id="'.$id.'" class="single-agenda-list">';
	
	foreach( $elements as $element ){
		echo $element;
	}
	
	echo '</ul> <!--single-agenda-list-->';
}