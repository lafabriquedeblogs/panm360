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
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'panm360' ); ?></a>

	<header id="masthead" class="site-header">
		
		<div id="branding-navigation">
			<div class="site-branding">
				<a href="<?php echo get_site_url();?>"><img src="<?php echo get_template_directory_uri( );?>/assets/img/panm360.png" /></a>
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'panm360' ); ?></button>
			</div><!-- .site-branding -->
			
			<nav id="site-navigation" class="main-navigation-desktop">
				
				<div id="main-menu-mobile">
					<?php echo main_menu_mobile();	?>
				</div><!-- #desktop -->
			
				<div id="main-menu-desktop">
					<?php echo main_menu_desktop();?>
				</div><!-- #desktop -->
				
			</nav><!-- #site-navigation -->
		</div><!-- branding-navigation -->
		<div id="sub-nav-desktop">
			<?php echo main_sub_menu_desktop();?>
		</div>	
		
	</header><!-- #masthead -->
	<div id="panm360-ghost"></div>

	<div id="content" class="site-content">
