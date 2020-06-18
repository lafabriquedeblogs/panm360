<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package panm360
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php


				$page_id = get_the_id();
				$artiste = get_artiste( $page_id , false );
				//$image_data =  get_field('image');
				$image = get_the_post_thumbnail_url( get_the_id(),'medium_large' );//$image_data['sizes']['medium_large'];
				
				if( $image == false ){
					$image = get_replacement_image('panm360_square' );
				}				
				
				$author = get_the_author();
				$lead = get_field('lead');
				
				$genres = get_genre($page_id);
				
				if( $lead == false ):
					//$lead = get_first_paragraph($post_id);
					$lead = '';
				endif;
		?>

			<div id="header_interview">
				
				<div class="portrait"
						style="background-image: url('<?php echo $image;?>');background-size:cover; background-repeat: no-repeat;background-position: center center;"
				>
					<img src="<?php echo $image;?>" />
					
				</div>
				<div class="interview-header">
					<span class="genre"><?php echo $genres;?></span>
					<h1><?php the_title(); ?></h1>
					<div class="addthis_inline_share_toolbox"></div>
					<span class="author"><?php _e('par','panm360'); ?> <?php echo $author;?></span>
					<?php if( !empty($lead)): ?>
						<div class="lead"><?php echo $lead;?></div>
					<?php endif; ?>
					
				</div>
			</div><!-- wrap-new-featured-slider -->	

	
	
	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'panm360' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		if( is_user_logged_in( ) ){
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'panm360' ),
				'after'  => '</div>',
			) );			
		}
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php //panm360_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
