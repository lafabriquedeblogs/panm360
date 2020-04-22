<div id="menu-top-container">
	<ul id="menu-top" class="menu">

		
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

		<?php if( is_user_logged_in() ): ?>
			<li id="panm-account" class="menu-item">
				<a href="<?php echo get_lien_page_mon_compte();?>">
					<svg class="icon"><use xlink:href="#fingerprint"></use></svg>
					<span><?php _e('Mon compte','panm360'); ?></span>
				</a>
			</li>
			<li id="panm-deconnexion" class="menu-item">
				<a href="<?php echo wp_logout_url(); ?>">
					<svg class="icon"><use xlink:href="#eject"></use></svg>
					<span><?php _e('Deconnexion','panm360'); ?></span>
				</a>
			</li>
		<?php else: ?>
			<li id="panm-connexion" class="menu-item">
				<a href="<?php echo get_lien_page_mon_compte();?>">
					<svg class="icon"><use xlink:href="#fingerprint"></use></svg>
					<span><?php _e('Mon compte','panm360'); ?></span>
				</a>
			</li>
			<li id="panm-signin" class="menu-item">
				<a href="<?php echo get_lien_abonnements();?>">
					<svg class="icon"><use xlink:href="#fingerprint"></use></svg>
					<span><?php _e('S\'abonner','panm360'); ?></span>
				</a>
			</li>
		<?php endif; ?>

		
		<?php /*if( !is_user_logged_in() ): ?>
		<li id="panm-signin" class="menu-item">
				<a href="<?php echo get_lien_abonnements();?>">
					<svg class="icon"><use xlink:href="#fingerprint"></use></svg>
					<span><?php _e('S\'abonner','panm360'); ?></span>
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
					<span class="baseline"><?php _e('Les meilleures musiques de partout','panm360'); ?></span>
				</a>
		</li>
	

		<li id="panm-search" class="menu-item">
			<a href="#">
				<svg class="icon"><use xlink:href="#search"></use></svg>
				<span class="hidden"><?php _e('Chercher','panm360'); ?></span>
			</a>
		</li>
		<?php menu_langue(); ?>
	</ul>
</div>
