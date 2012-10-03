			<div class="clearfloat"></div>
			<div id="footer">
				<ul>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'container' => false,
						'items_wrap' => '%3$s',
						'depth' => 1,
					) );
					?>
					<li class="social-icon-footer first-social-icon"> <a href="#" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/icon_twitter.png" width="35" height="35" alt="twitter" title="síguenos en twitter"></a></li>
					<li class="social-icon-footer"> <a href="#" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/icon_facebook.png" alt="facebook" title="visítanos en facebook" width="35" height="35"></a></li>
					<li class="email-footer-link"><a href="#">EMAIL CORPORATIVO</a></li>
				</ul>
			</div> <!--termina #footer-->
		</div> <!--termina #main-wrapper-->

		<?php wp_footer(); ?>
		<script>
		var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
		(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
		g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g,s)}(document,'script'));
		</script>
	</body>
</html>
