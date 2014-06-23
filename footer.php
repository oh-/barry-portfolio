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
			 printf( __( 'Copyright &copy; Barry Thompson %1$s . Theme: %2$s by %3$s.', 'barry-portfolio' ), '2014' ,  'Portfolio', '<a href="http://made-so.tumblr.com" rel="designer">madeso</a>' );
			 ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>