<?php
/**
 * @package Barry Portfolio
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h3 class="entry-title"><?php the_title(); ?></h3>
	 	<div id="full-post-meta">
			
	 		<?php the_content(); ?>
			
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
			   <?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
			      echo '<a href="' . $large_image_url[0] . '" rel="lightbox" title="' . the_title_attribute('echo=0') . '" >';
			      the_post_thumbnail('frontpage');
			      echo '</a>';
				  ?>
			  	<!--begin attachments html and php -->
<?php $attachments = new Attachments( 'barry_attached_media' ); ?>
<?php if( $attachments->exist() ) : ?>
  <?php $my_index = 0; ?>
  <?php if( $attachment = $attachments->get_single( $my_index ) ) : ?>
    <h3>Attachment at index 0:</h3>
    <pre><?php print_r( $attachment ); ?></pre>
    <ul>
      <li>
        ID: <?php echo $attachments->id( $my_index ); ?><br />
        Type: <?php echo $attachments->type( $my_index ); ?><br />
        Subtype: <?php echo $attachments->subtype( $my_index ); ?><br />
        URL: <?php echo $attachments->url( $my_index ); ?><br />
        Image: <?php echo $attachments->image( 'thumbnail', $my_index ); ?><br />
        Source: <?php echo $attachments->src( 'full', $my_index ); ?><br />
        Size: <?php echo $attachments->filesize( $my_index ); ?><br />'
        Width: <?php echo $attachments->width('thumbnail', $my_index ); ?><br />
        Height: <?php echo $attachments->height('thumbnail', $my_index ); ?><br />
        Title Field: <?php echo $attachments->field( 'title', $my_index ); ?><br />
        Caption Field: <?php echo $attachments->field( 'caption', $my_index ); ?>
      </li>
    </ul>
  <?php endif; ?>
<?php endif; ?>
			  	<!--end attachments html and php -->
			</div>
	  <?php }
	  else {
	  	echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/thumbnail-default.jpg" />';
	  }
	  ?>
	<div class="other-images">
		<?php
		// $imgs = get_current_post_meta('work_attached_media');
// 		$gallery_shortcode = '[gallery include="' . $imgs . '"]';
// 		    print apply_filters( 'the_content', $gallery_shortcode );
		?>
	</div>
	

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'barry-portfolio' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
