<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Barry Portfolio
 */

get_header(); ?>
		<?php get_sidebar('blank'); ?>
	</aside>
	<section id="primary" class="content-area front-page">
		<main id="main" class="site-main" role="main">

			<?php
			$args = array( 'posts_per_page' => 1, 'orderby' => 'rand', 'post_type' => 'work' );
			$rand_posts = get_posts( $args );
			foreach ( $rand_posts as $post ) : 
			  setup_postdata( $post ); ?>

			  <?php if ( has_post_thumbnail()) {
			    $large_image_url = get_permalink( get_the_id());
			    echo '<a href="' . $large_image_url . '" title="' . the_title_attribute('echo=0') . '" >';
			    the_post_thumbnail('frontpage');
			    echo '</a>';
			  }
			  else {
			  	echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/thumbnail-default.jpg" />';
			  }
			  ?>
	
			<?php endforeach; 
			wp_reset_postdata(); ?>

		</main><!-- #main -->
	</section><!-- #primary -->


<?php get_footer(); ?>
