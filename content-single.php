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
		  $custom_fields = get_post_custom();
		  $the_keys = get_post_custom_keys();
		  /**
		  below is the first try out to automatise adding the post_custom_keys to an array that would be printed along with the values. 
		  
		  foreach ( $the_key as $key => $value ) {
		  	$valuet = trim($value);
			if ( '_' == $valuet{0} )
				continue;
			$the_keys($value) = $key;
		  } 
		  var_dump($the_keys);
		  
		  echo '<br />---<br />';	  
		  */
		  $work_medium = $custom_fields['work_medium'];
		  $dimension_x = $custom_fields['dimension_x'];
		  $dimension_y = $custom_fields['dimension_y'];
		  $year_completed = $custom_fields['year_completed'];
		?>
		<p><?php print "Mediums: {$custom_fields['work_medium']}"; ?><br >
			<?php echo $dimension_x . " mm  X " . $dimension_y . " mm"; ?>
		</p>
 		<?php
 			wp_link_pages( array(
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

	
	

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'barry-portfolio' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
