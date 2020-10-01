
	<?php get_template_part( '/template-parts/publicites/publicite', 'banniere-footer' ); ?>
	
	
	<?php get_template_part( '/template-parts/modules/element', 'infolettre' ); ?>
	

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		
<!--
		<nav id="nav-footer-menu">
			<ul id="footer-menu" class="footer-top-360">
-->
				<?php
				/*
				echo wp_nav_menu( array(
					'menu' => 291,
					'container' => '',
					'echo' => false,
					'items_wrap' => '%3$s',
				) );	
				*/		
					
				?>

			<?php
					//Footer Site
/*
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
*/	
						
			?>
<!--
			</ul>			
		</nav>
-->
		
		<div id="panm_360_infos">
			
			<a id="logo-footer" href="<?php echo get_site_url();?>">
			<!-- <img src="<?php echo get_template_directory_uri( );?>/assets/img/panm360.png"  alt="panm360"/> -->
				<svg class="icon"><use xlink:href="#panm360-bleu"></use></svg>
			</a>
			
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
				<li class="facebook">
					<a href="https://www.facebook.com/panm360/" target="_blank">
						<svg class="icon"><use xlink:href="#facebook"></use></svg>
						<span class="screen-reader-text">facebook</span>
					</a>
				</li>
				<li class="instagram">
					<a href="https://www.instagram.com/panm360/" target="_blank">
						<svg class="icon"><use xlink:href="#instagram"></use></svg>
						<span class="screen-reader-text">Instagram</span>
					</a>
				</li>
				<li class="twitter">
					<a href="https://twitter.com/PANM360" target="_blank">
						<svg class="icon"><use xlink:href="#twitter"></use></svg>
						<span class="screen-reader-text">Twitter</span>
					</a>
				</li>
				<li class="youtube">
					<a href="https://www.youtube.com/channel/UCHEFHd3UhIrV6EJ3ltzVKOA?view_as=subscriber" target="_blank">
						<svg class="icon"><use xlink:href="#youtube"></use></svg>
						<span class="screen-reader-text">Youtube</span>
					</a>
				</li>
				<li class="linkedin">
					<a href="https://www.linkedin.com/company/panm360/" target="_blank">
						<svg class="icon"><use xlink:href="#linkedin"></use></svg>
						<span class="screen-reader-text">Linkedin</span>
					</a>
				</li>
				<?php /* ?>
				<li class="rss">
					<a href="#">
						<svg class="icon"><use xlink:href="#rss"></use></svg>
						<span class="screen-reader-text">RSS</span>
					</a>
				</li>
				
				<li class="vimeo">
					<a href="#">
						<svg class="icon"><use xlink:href="#vimeo"></use></svg>
						<span class="screen-reader-text">Vimeo</span>
					</a>
				</li>
				
				<li class="soundcloud">
					<a href="#">
						<svg class="icon"><use xlink:href="#soundcloud"></use></svg>
						<span class="screen-reader-text">Soundcloud</span>
					</a>
				</li>
				
				<li class="spotify">
					<a href="#">
						<svg class="icon"><use xlink:href="#spotify"></use></svg>
						<span class="screen-reader-text">Spotify</span>
					</a>
				</li>
				<?php */ ?>
			</ul>
			
		</div>
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
