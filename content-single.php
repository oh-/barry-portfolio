<?php
/**
 * @package Barry Portfolio
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	 	<div id="full-post-meta">
			<p class="entry-title"><?php the_title(); ?></p>
	 		<p><?php 
			global $post;
			$custom = get_post_custom();
			$mediums = $custom['work_medium'][0];
			$dimx = $custom['dimension_x'][0];
			$dimy = $custom['dimension_y'][0];
			$pdimx = $custom['pdimension_x'][0];
			$pdimy = $custom['pdimension_y'][0];
			$dims = array($dimx, $dimy, $pdimx, $pdimy);
			$format = '%1$d mm  x %2$d mm <br />
				(%3$d mm  x %4$d mm) <br />';
			echo vsprintf($format, $dims);
			echo $mediums;
			?></p><?php
			the_content(); ?>
			
			<?php
			  /**
			  the meta
			  */
			  wp_link_pages( array(
	 				'before' => '<div class="page-links">' . __( 'Pages:', 'barry-portfolio' ),
	 				'after'  => '</div>',
	 			) );
	 		?>
	 	</div><!-- #full-post-meta -->
	</header><!-- .entry-header -->
 	
	  <?php
	  if ( has_post_thumbnail() ) { ?>
		 	<div class='post-image'>
			   <?php 
			      the_post_thumbnail('frontpage');
				  ?>
			</div>
	  <?php }
	  else {
	  	echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/thumbnail-default.jpg" />';
	  }
	  ?>
	

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'barry-portfolio' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
