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

			<header class="page-header">
				<h1 class="page-title">
					<?php
						if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'barry-portfolio' ), '<span class="vcard">' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'barry-portfolio' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'barry-portfolio' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'barry-portfolio' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'barry-portfolio' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'barry-portfolio' ) ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'barry-portfolio' );

						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							_e( 'Galleries', 'barry-portfolio');

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'barry-portfolio');

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'barry-portfolio' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'barry-portfolio' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'barry-portfolio' );

						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							_e( 'Statuses', 'barry-portfolio' );

						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							_e( 'Audios', 'barry-portfolio' );

						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							_e( 'Chats', 'barry-portfolio' );

						else :
							_e( 'Works', 'barry-portfolio' );

						endif;
					?>
				</h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
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
