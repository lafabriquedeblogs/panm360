<?php

/*
	Template name: Liste Genres Raw
*/

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php
					
/*
					$terms = get_terms( 'genre' );
					echo '<ul style="padding:50px 0;">';
					 
					foreach ( $terms as $term ) {
					 
					    // The $term is an object, so we don't need to specify the $taxonomy.
					    $term_link = get_term_link( $term );
					    
					    // If there was an error, continue to the next term.
					    if ( is_wp_error( $term_link ) ) {
					        continue;
					    }
					 
					    // We successfully got a link. Print it out.
					    echo '<li style="font-size: 13px;line-height:1.3;margin-bottom:15px;"><a href="' . esc_url( $term_link ) . '" target="_blank"><strong>Genre : ' . $term->name . '</strong><br>url : ' . esc_url( $term_link ) . '</a></li>';
					}
					 
					echo '</ul>';
*/


					echo wp_list_categories(array(
					    'show_option_all'    => '',
					    'orderby'            => 'name',
					    'order'              => 'ASC',
					    'style'              => 'list',
					    'show_count'         => 0,
					    'hide_empty'         => 1,
					    'use_desc_for_title' => 1,
					    'child_of'           => 0,
					    'feed'               => '',
					    'feed_type'          => '',
					    'feed_image'         => '',
					    'exclude'            => '',
					    'exclude_tree'       => '',
					    'include'            => '',
					    'hierarchical'       => 1,
					    'title_li'           => __( 'Genre' ),
					    'show_option_none'   => __( 'Pas de genre' ),
					    'number'             => null,
					    'echo'               => 1,
					    'depth'              => 1,
					    'current_category'   => 0,
					    'pad_counts'         => 0,
					    'taxonomy'           => 'genre',
					    'walker'             => null));
    
			?>
		</main><!-- #main -->
	</div><!-- #primary -->
	

<?php
get_footer();
