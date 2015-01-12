<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Barry Portfolio
 */

get_header(); ?>
	<aside id="secondary">
		<?php
			get_sidebar('blank');
		?>
	</aside>
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php barry_portfolio_post_nav(); ?>

			<?php
				// If comments are open or we  have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</section><!-- #primary -->
<?php get_footer(); ?>