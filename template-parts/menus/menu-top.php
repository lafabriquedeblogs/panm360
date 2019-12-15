<?php
	// devenir membre page ID
	$devenir_membre_page_id = 113;
	if ( function_exists('icl_object_id') ) {
	     //something
	     $devenir_membre_page_id = apply_filters( 'wpml_object_id', $devenir_membre_page_id, 'page', TRUE, $lang );
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
		<li id="panm-signin" class="menu-item">
			<a href="<?php echo get_permalink( $devenir_membre_page_id );?>">
				<svg class="icon"><use xlink:href="#fingerprint"></use></svg>
				<span><?php _e('Je m\'abonne','panm360'); ?></span>
			</a>
		</li>
		<li id="panm-search" class="menu-item">
			<a href="#">
				<svg class="icon"><use xlink:href="#search"></use></svg>
				<span class="hidden"><?php _e('Chercher','panm360'); ?></span>
			</a>
			</li>
		<li id="panm-lang-switch" class="menu-item"><a href="#">EN</a></li>
	</ul>
</div>
