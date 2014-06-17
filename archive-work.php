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
			</header><!-- .page-header -->
			<?php
			$args = array(
			  'orderby' => 'name',
			  'order' => 'ASC',
			  'taxonomy' => 'years'
			  );
			$categories = get_categories($args);
			  foreach($categories as $category) { 
			    echo '<p>Category: <a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </p> ';
			    echo '<p> Description:'. $category->description . '</p>';
			    echo '<p> Post Count: '. $category->count . '</p>';  } 
			?>
				
			
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				
				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', 'work' );
				?>

			<?php endwhile; ?>

			<?php barry_portfolio_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer(); ?>
