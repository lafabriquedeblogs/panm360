
<div id="main-menu-mobile">
	<?php
		
		$menu = wp_nav_menu( array(
		'menu' => 3910,
		'menu_id' => 'menu-mobile',
		'menu_class' => 'main-menu-mobile',
		'echo' => false
	) );
/*

	$menu = wp_nav_menu( array(
		'menu' => 290,
		'menu_id'        => 'nos-choix-menu-mobile',
		'menu_class'	=> 'main-menu-level-1',
		'depth' => 0,
		'echo' => false
	) );
	$menu .= wp_nav_menu( array(
		'menu' => 2,
		'menu_id'        => 'lire-menu-mobile',
		'menu_class'	=> 'main-menu-level-1',
		'depth' => 0,
		'echo' => false
	) );
	$menu .= wp_nav_menu( array(
		'menu' => 286,
		'menu_id'        => 'ecouter-menu-mobile',
		'menu_class'	=> 'main-menu-level-1',
		'depth' => 0,
		'echo' => false
	) );
	$menu .= wp_nav_menu( array(
		'menu' => 284,
		'menu_id'        => 'visionner-menu-mobile',
		'menu_class'	=> 'main-menu-level-1',
		'depth' => 0,
		'echo' => false
	) );
	$menu .= wp_nav_menu( array(
		'menu' => 287,
		'menu_id'        => 'apprendre-menu-mobile',
		'menu_class'	=> 'main-menu-level-1',
		'depth' => 0,
		'echo' => false
	) );
	$menu .= wp_nav_menu( array(
		'menu' => 285,
		'menu_id'        => 'participer-menu-mobile',
		'menu_class'	=> 'main-menu-level-1',
		'depth' => 0,
		'echo' => false
	) );
*/
	
	echo $menu;		
	?>
</div><!-- #desktop -->