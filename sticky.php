<?php
/**
from header - trying to get the twitter scrape
*/
	if ( is_singular() ) :
		while ( have_posts() ) :
			if ( has_post_thumbnail() ):
				?>
				<meta content="photo" name="twitter:card">
				<meta content="<?php echo substr(the_title('', '', FALSE), 0, 40); ?>" name="twitter:description">
				<meta content="the_post_thumbnail('index')" name="twitter:image">
				<meta content="<?php echo get_permalink(); ?>" name="twitter:url">
				<?php 
			endif;
		endwhile;
	endif;
?>
