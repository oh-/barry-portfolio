<?php
/**
 * @package Barry Portfolio
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->
 	<div id="full-post-meta">
 		<?php the_content(); ?>
		<?php
		  /**
		  the meta
		  */
	
		?>
		<p><?php
				$work_medium = get_post_meta( get_the_ID(), 'work_medium', true);
				$year_completed = get_post_meta( get_the_ID(), 'year_completed', true);
				$dimension_x = get_post_meta( get_the_ID(), 'dimension_x', true);
				$dimension_y = get_post_meta( get_the_ID(), 'dimension_y', true);
				printf( __('Mediums: %3$s <br/>%1$d mm x %2$d mm', 'barry-portfolio'), $dimension_x, $dimension_y, $work_medium); ?>
		</p>
 		<?php wp_link_pages( array(
 				'before' => '<div class="page-links">' . __( 'Pages:', 'barry-portfolio' ),
 				'after'  => '</div>',
 			) );
 		?>
 	</div><!-- #full-post-meta -->
	  <?php
	  if ( has_post_thumbnail() ) { ?>
		 	<div class='post-image'>
			   <?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
			      echo '<a href="' . $large_image_url[0] . '" rel="lightbox" title="' . the_title_attribute('echo=0') . '" >';
			      the_post_thumbnail('frontpage');
			      echo '</a>';?>
			</div>
	  <?php }
	  else {
	  	echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/thumbnail-default.jpg" />';
	  }
	  ?>
	  <div class="other-images">
		  <?php $other_works = get_post_meta( get_the_ID(), 'work_attached_media', true);
		  	echo $other_works;
		    $gallery_shortcode = '[gallery id="' . $other_works . '"]';
		       print apply_filters( 'the_content', $gallery_shortcode );
		   ?>

	
	

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'barry-portfolio' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
