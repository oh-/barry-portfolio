<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Barry Portfolio
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php
			 $sitename = get_bloginfo(name);
			 $siteurl = home_url();
			 $sitelink = "<a href='".$siteurl."' title='".$sitename."'>".$sitename."</a>";
			 $sitedate = date("Y");
			 $authlink = "<a href='http://made-so.tumblr.com' rel='designer'>madeso</a>";
			 $format = 'Copyright &copy; %1$s, %2$d. All rights reserved. Site: %3$s';
			 printf($format , $sitelink, $sitedate, $authlink);
			 ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
