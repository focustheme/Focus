<?php
/**
 * @package WordPress
 * @subpackage Toolbox
 */
?>

	</div><!-- #main -->

	<footer id="colophon" role="contentinfo">
			<div id="site-generator">
				<a href="http://wordpress.org/" rel="generator">Proudly powered by WordPress</a><span class="sep"> | </span><?php printf( __( 'Theme: %1$s by %2$s.', 'toolbox' ), 'Toolbox', '<a href="http://automattic.com/" rel="designer">Automattic</a>' ); ?>
			</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<!-- JavaScript at the bottom for fast page loading -->

<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.6.1.min.js"><\/script>')</script>


<!-- scripts concatenated and minified via ant build script-->
<script src="js/plugins.js"></script>
<script src="js/script.js"></script>
<!-- end scripts-->


<!-- mathiasbynens.be/notes/async-analytics-snippet Change UA-XXXXX-X to be your site's ID -->
<script>
  var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview'],['_trackPageLoadTime']];
  (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
  g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
  s.parentNode.insertBefore(g,s)}(document,'script'));
</script>


<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
     chromium.org/developers/how-tos/chrome-frame-getting-started -->
<!--[if lt IE 7 ]>
  <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script>
  <script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script>
<![endif]-->

<?php wp_footer(); ?>

</body>
</html>