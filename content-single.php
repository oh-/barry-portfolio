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

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<span><!--getting single  -->
<?php $attachments = new Attachments( 'work_attachments' ); ?>
<?php if( $attachments->exist() ) : ?>
  <?php $my_index = 0;
  		$my2index = 1;?>
  <?php if( $attachment = $attachments->get_single( $my_index ) ) : ?>
       <a class="fancybox" rel="gallery1" title="Gallery 1 - 1" href="<?php echo $attachments->src( 'page', $my_index ); ?>">	
		   <?php echo $attachments->image( 'page', $my_index ); ?></a><br />
		   <br />
	   <div class="hidden">
        <a class="fancybox" rel="gallery1" title="Gallery 1 - 2" href="<?php echo $attachments->src( 'page', $my_index ); ?>">
 		   <?php echo $attachments->image( 'page', $my2index ); ?></a>
	   </div>
  <?php endif; ?>
<?php endif; ?>
<!--end attachments html and php --></span>
		<?php // check if the post has a Post Thumbnail assigned to it.
			if ( has_post_thumbnail() ) {
				// the_post_thumbnail('index');
			}
		endif; ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'barry-portfolio' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	
</article><!-- #post-## -->
