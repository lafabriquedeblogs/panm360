<?php
	$count = 12;
	
	$start = date('Y/m/d');
	$end = date('Y/m/d', strtotime($start. ' + 15 days'));
	
	$year = date('Y');
	$month =  date('m');
	$nonce = wp_create_nonce("my_user_like_nonce");
	
	//$calendrier = get_post_meta( 6944, 'agenda_mini', true );
	
	$calendrier = get_transient( 'agenda-mini' );
	
	if( false === ( $calendrier = get_transient( 'agenda-mini' )) ){
		$calendrier = get_liste_concerts( $start, $end , $count );
		set_transient( 'agenda-mini',$calendrier, 1 * DAY_IN_SECONDS );
	}

?>
	
		
		<div class="title-calendrier">
			<h2><?php _e('Agenda','panm360'); ?> <span class="bold">360</span></h2>
			<form id="choix-style-musical">
				<div class="select-light">
					<select id="agenda-genre">
						<option value="0"><?php _e('Style musical','panm360'); ?></option>
						<?php $genres = get_main_genres( false ); ?>
						<?php foreach( $genres as $genre): ?>
							<option value="<?php echo $genre['id'];?>"><?php echo $genre['name'];?></option>
						<?php endforeach; ?>
					</select>
					<input type="hidden" id="agenda-start" value="<?php echo $start;?>"/>
					<input type="hidden" id="agenda-year" value="<?php echo $year;?>"/>
					<input type="hidden" id="agenda-month" value="<?php echo $month;?>"/>
					<input type="hidden" id="agenda-nonce" value="<?php echo $nonce;?>"/>
					<input type="hidden" id="agenda-count" value="<?php echo $count;?>"/>
				</div>
				<div class="loader-filtre-genre"><div></div><div></div><div></div></div>
			</form>
			
		</div>
		
		<?php lien_agenda_complet(); ?>									

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
		</div><!-- agenda_mini -->