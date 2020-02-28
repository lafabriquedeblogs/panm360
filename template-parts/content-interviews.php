<?php
/**
 * Template part for displaying interviews content in single.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package panm360
 */

/*

*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-interview'); ?>>
<?php /* ?>
	<header class="entry-header section">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
<?php */ ?>

	<?php //panm360_post_thumbnail(); ?>

	<div class="entry-content">
		<?php the_content();?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
