<?php

get_header();
    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<article>
				<header class="entry-header section">
					<h1 clas="entry-title"><?php echo $curauth->first_name; ?> <span class="light"><?php echo $curauth->last_name; ?></span></h1>
				</header>
			
				<div class="entry-content">
					<?php echo $curauth->user_description; ?>
				</div><!-- .entry-content -->

<section class="section">
	<div class="section-inner">
	
		<div class="section-content-c">
			<ul class="section-content--has-6-columns">
				<?php
						$albums_count = 54;	
						
						$args = array(
							'post_type' => array('post','records','gig_review'),
							'posts_per_page' => $albums_count,
							'post_status' => 'publish',
							'orderby' => 'rand',
							'author' => $curauth->ID,
						);
						
						$albums = new WP_Query($args);
						
						while($albums->have_posts() ){
								$albums->the_post();
								
								include( locate_template( '/template-parts/modules/element-album.php', false, false ) );			
							$albums_count--;
						}
				?>
					<li id="pages-liste-navigation" >
						<?php
								the_posts_pagination( array(
								'mid_size'  => 4,
								'prev_text' => __( 'Précédente', 'panm360' ),
								'next_text' => __( 'Suivante', 'panm360' ),
							) );
						?>
					</li>
				</ul><!-- section-content--has-6-columns -->
			
		</div><!-- section-content-c -->
		
	</div><!-- section-inner -->
</section><!-- section -->

			</article>
		</main><!-- #main -->
	</div><!-- #primary -->	

<?php
get_footer();
