<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Barry Portfolio
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'barry-portfolio' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<?php
					$args = array( 'posts_per_page' => 3, 'orderby' => 'rand', 'category' => '6', );
					$rand_posts = get_posts( $args );
					foreach ( $rand_posts as $post ) : 
					  setup_postdata( $post ); ?>
					  <?php
					  // Must be inside a loop.

					  if ( has_post_thumbnail() ) {
					  	 the_post_thumbnail('index');
					  }
					  else {
					  	echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/thumbnail-default.jpg" />';
					  }
					  ?>
	
					<?php endforeach; 
					wp_reset_postdata(); ?>
					
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'barry-portfolio' ); ?></p>

					<?php get_search_form(); ?>

				
					
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>