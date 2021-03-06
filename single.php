<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Barry Portfolio
 */

get_header(); ?>
	<aside id="secondary">
		<?php
		if ( is_tax( 'work' ) ):
			echo "single work";
			get_sidebar('worksbyyear');
		elseif ( is_tax( 'work_tax' ) ):
			echo "single work_tax";
			get_sidebar('worksbyyear');
		elseif ( is_tax( 'years' ) ):
			echo "single work_tax";
			get_sidebar('worksbyyear');
		else:
			echo "single blank";
			get_sidebar('blank');
		endif; ?>
	</aside>
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
			 
			<?php get_template_part( 'content', 'single' ); ?>
			
			<?php barry_portfolio_post_nav(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</section><!-- #primary -->
<?php get_footer(); ?>