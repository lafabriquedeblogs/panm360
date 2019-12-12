<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package panm360
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="searchform" class="searchform">
	<?php get_search_form(); ?>
	<a id="close-searchform">&times;</a>
</div>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'panm360' ); ?></a>

	<header id="masthead" class="site-header">
		
		<?php get_template_part( 'template-parts/menus/menu','top' ); ?>
		
		<div id="branding-navigation">
			<div class="site-branding">
				<a href="<?php echo get_site_url();?>">
					<?php /*<img src="<?php echo get_template_directory_uri( );?>/assets/img/panm360.png"  alt="Panm360"/>*/ ?>
					<svg class="icon"><use xlink:href="#panm360"></use></svg>
				</a>
				
			</div><!-- .site-branding -->
			
			<nav id="site-navigation" class="main-navigation-desktop">
				<?php get_template_part( 'template-parts/menus/menu','main-mobile' ); ?>
				<?php get_template_part( 'template-parts/menus/menu','main-desktop' ); ?>
			</nav><!-- #site-navigation -->
			
			<?php /* <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'panm360' ); ?></button> */ ?>
		</div><!-- branding-navigation -->
		
		<?php //get_template_part( 'template-parts/menus/menu','submenu-desktop' ); ?>

	</header><!-- #masthead -->
	
	<div id="panm360-ghost"></div>

	<div id="content" class="site-content">
