<?php

/*
	Template name: Dev new
	
*/

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			
		<?php
			 $args = array(
				 "post_type" => "records",
				 "posts_per_page" => -1,
				 "suppress_filters" => false,
				 "meta_key" =>  "id_import_top_200",
				 "orderby" => 'meta_value_num',
				//"meta_value" => "top-250-356"
			 );
			 
			$records_query = new WP_Query($args);
			while( $records_query->have_posts() ){
				  $records_query->the_post();
				  
				  $auteur_id = get_the_author_meta('ID');
				  $auteur = get_the_author_meta('display_name');
				  $id_import_top_200 = get_field('id_import_top_200');
				  echo '<p>'.$id_import_top_200." - ".get_the_title().' - '.$auteur_id.'</p>';
			  }
			
			
		?>	
			
			
		</main><!-- #main -->
	</div><!-- #primary -->
	

<?php
get_footer();
