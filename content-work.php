<?php
/**
 * @package Barry Portfolio
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<div class="work-cat-img">

		<a href="<?php the_permalink(); ?>" rel="bookmark"><?php // check if the post has a Post Thumbnail assigned to it.
			if ( has_post_thumbnail() ) {
				the_post_thumbnail('index');
			} 
			else
				 the_title( '<h3>', '</h3>' ); ?></a>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'barry-portfolio' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	
</article><!-- #post-## -->
