	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		
		<nav id="nav-footer-menu">
			<ul id="footer-menu">
			<?php
				echo wp_nav_menu( array(
					'menu' => 2,
					'container' => '',
					'echo' => false,
					'items_wrap' => '%3$s',
				) );
				echo wp_nav_menu( array(
					'menu' => 286,
					'container' => '',
					'echo' => false,
					'items_wrap' => '%3$s',
				) );
				echo wp_nav_menu( array(
					'menu' => 284,
					'container' => '',
					'items_wrap' => '%3$s',
				) );
				echo wp_nav_menu( array(
					'menu' => 287,
					'container' => '',
					'echo' => false,
					'items_wrap' => '%3$s',
				) );
				echo wp_nav_menu( array(
					'menu' => 285,
					'container' => '',
					'echo' => false,
					'items_wrap' => '%3$s',
				) );
				echo wp_nav_menu( array(
					'menu' => 291,
					'container' => '',
					'echo' => false,
					'items_wrap' => '%3$s',
				) );			
				echo wp_nav_menu( array(
					'menu' => 292,
					'container' => '',
					'echo' => false,
					'items_wrap' => '%3$s',
				) );				
			?>
			</ul>			
		</nav>
		
		<div id="panm_360_infos">
			
			<a id="logo-footer" href="<?php echo get_site_url();?>"><img src="<?php echo get_template_directory_uri( );?>/assets/img/panm360.png" /></a>
			
			<ul id="menu-infos">
				<?php
					wp_nav_menu( array(
						'menu' => 293,
						'container' => '',
						'items_wrap' => '%3$s',
					) );
				?>
			</ul>
			
			<ul id="menu-socials">
				<li id="twitter">
					<a href="https://twitter.com">
						<svg class="icon"><use xlink:href="#twitter"></use></svg>
					</a>
				</li>
				<li id="youtube">
					<a href="https://youtube.com">
						<svg class="icon"><use xlink:href="#youtube"></use></svg>
					</a>
				</li>
				<li id="rss">
					<a href="#">
						<svg class="icon"><use xlink:href="#rss"></use></svg>
					</a>
				</li>
				<li id="vimeo">
					<a href="#">
						<svg class="icon"><use xlink:href="#vimeo"></use></svg>
					</a>
				</li>
				<li id="soundcloud">
					<a href="#">
						<svg class="icon"><use xlink:href="#soundcloud"></use></svg>
					</a>
				</li>
				<li id="spotify">
					<a href="#">
						<svg class="icon"><use xlink:href="#spotify"></use></svg>
					</a>
				</li>
			</ul>
			
		</div>
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
