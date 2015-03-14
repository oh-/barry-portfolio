<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Barry Portfolio
 */

get_header(); ?>
	<aside id="secondary">
		<?php get_sidebar('worksbyyear'); ?>
	</aside>
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			</header><!-- /.page-header -->
			<section class="work-cat-table">
			 <?php foreach (get_terms('years') as $cat) : ?>
			 <div class="work-cat-img">
			<a href="<?php echo get_term_link($cat->slug, 'years'); ?>">
				<img src="<?php echo z_taxonomy_image_url($cat->term_id, index); ?>" title="<?php echo $cat->name; ?>" />
		 	</a>
			 </div><!-- /.work-cat-img -->
			 <?php endforeach; ?>
		 </section> <!-- /.work-cat-table -->
			<?php /* Start the Loop */ ?>


		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer(); ?>
