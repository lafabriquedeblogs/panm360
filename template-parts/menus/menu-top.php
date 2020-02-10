<?php
	// devenir membre page ID
	$devenir_membre_page_id = 113;
	if ( function_exists('icl_object_id') ) {
	     //something
	     $devenir_membre_page_id = apply_filters( 'wpml_object_id', $devenir_membre_page_id, 'page', TRUE );
	}	
?>
<div id="menu-top-container">
	<ul id="menu-top" class="menu">
		<?php
		/*
		<li id="panm-radio-bouton" class="menu-item">
			<a href="http://panm.test/panm360-radio/">
				<svg class="icon"><use xlink:href="#microphone"></use></svg>
				<span><?php _e('Panm360 Radio','panm360'); ?></span>
			</a>
		</li>
		*/
		?>
		<?php /* if( is_user_logged_in()): ?>
			<li id="panm-account" class="menu-item">
				<a href="http://panm.test/mon-compte/">
					<svg class="icon"><use xlink:href="#fingerprint"></use></svg>
					<span><?php _e('Mon compte','panm360'); ?></span>
				</a>
			</li>
			<li id="panm-deconnexion" class="menu-item">
				<a href="#">
					<svg class="icon"><use xlink:href="#eject"></use></svg>
					<span><?php _e('Deconnexion','panm360'); ?></span>
				</a>
			</li>
		<?php else: ?>
			<li id="panm-connexion" class="menu-item">
				<a href="#">
					<svg class="icon"><use xlink:href="#fingerprint"></use></svg>
					<span><?php _e('Connexion','panm360'); ?></span>
				</a>
			</li>
			<li id="panm-signin" class="menu-item">
				<a href="<?php echo get_permalink( $devenir_membre_page_id );?>">
					<svg class="icon"><use xlink:href="#fingerprint"></use></svg>
					<span><?php _e('Devenir membre','panm360'); ?></span>
				</a>
			</li>
		<?php endif; */?>
		
		<li id="menu-toggle-mobile">
			<a class="bouton-menu-toggle-mobile">
				<svg class="icon"><use xlink:href="#buenu"></use></svg>
			</a>			
		</li>
		<li id="logo-mobile" >
				<a href="<?php echo get_site_url();?>">
					<?php /*<img src="<?php echo get_template_directory_uri( );?>/assets/img/panm360.png"  alt="Panm360"/>*/ ?>
					<svg class="icon"><use xlink:href="#panm360"></use></svg>
				</a>
		</li>
		<li id="menu-panm" >
			<a class="cross">
				<svg class="icon"><use xlink:href="#closemenupanm"></use></svg>
			</a>
			<a class="burger active">
				<svg class="icon"><use xlink:href="#buenu"></use></svg>
			</a>
			<ul id="top-sub-menu">
		<?php
				$menu_lire = apply_filters( 'wpml_object_id', 291, 'nav_menu', TRUE  );
				echo wp_nav_menu( array(
					'menu' => $menu_lire,
					'container' => '',
					'echo' => false,
					'items_wrap' => '%3$s',
				) );			
			?>	
			</ul>
		</li>	
		<li id="panm-signin" class="menu-item">
			<a href="<?php echo get_permalink( $devenir_membre_page_id );?>">
				<svg class="icon"><use xlink:href="#fingerprint"></use></svg>
				<span><?php _e('S\'abonner','panm360'); ?></span>
			</a>
		</li>
		<li id="panm-search" class="menu-item">
			<a href="#">
				<svg class="icon"><use xlink:href="#search"></use></svg>
				<span class="hidden"><?php _e('Chercher','panm360'); ?></span>
			</a>
			</li>
		<li id="panm-lang-switch" class="menu-item">
		<?php
			$others_l = ( ICL_LANGUAGE_CODE == 'en' ) ? 'fr' : 'en';
			$yop = icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str');
		?>
		<a href="<?php echo $yop[$others_l]['url'];?>"><?php echo strtoupper( $others_l );?></a></li>
	</ul>
</div>
