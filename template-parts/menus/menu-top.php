<div id="menu-top-container">
	<ul id="menu-top" class="menu">
		<li id="panm-radio-bouton" class="menu-item">
			<a href="http://panm.test/panm360-radio/">
				<svg><use xlink:href="#microphone"></use></svg>
				<span><?php _e('Panm360 Radio','panm360'); ?></span>
			</a>
		</li>
		<?php if( is_user_logged_in()): ?>
			<li id="panm-account" class="menu-item">
				<a href="http://panm.test/mon-compte/">
					<svg><use xlink:href="#fingerprint"></use></svg>
					<span><?php _e('Mon compte','panm360'); ?></span>
				</a>
			</li>
			<li id="panm-deconnexion" class="menu-item">
				<a href="#">
					<svg><use xlink:href="#eject"></use></svg>
					<span><?php _e('Deconnexion','panm360'); ?></span>
				</a>
			</li>
		<?php else: ?>
			<li id="panm-connexion" class="menu-item">
				<a href="#">
					<svg><use xlink:href="#fingerprint"></use></svg>
					<?php _e('Connexion','panm360'); ?>
				</a>
			</li>
			<li id="panm-signin" class="menu-item">
				<a href="#">
					<svg><use xlink:href="#fingerprint"></use></svg>
					<span><?php _e('Devenir membre','panm360'); ?></span>
				</a>
			</li>
		<?php endif; ?>
		<li id="panm-search" class="menu-item"><a href="#"><?php _e('Chercher','panm360'); ?></a></li>
		<li id="panm-lang-switch" class="menu-item"><a href="#">EN</a></li>
	</ul>
</div>