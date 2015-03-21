<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Barry Portfolio
 */
?>
<?php if ( ! dynamic_sidebar( 'sidebar-4' ) ) : ?>
	 <div id='worksbyyear'>
		 <ul>
		 <?php  
	  $args = array(
	 	'show_option_all'	=> '',
	 	'orderby'			=> 'name',
	 	'order'				=> 'DESC',
	 	'style'				=> 'list',
		'hide_empty'		=> '1',
		'hierarchical'		=> '0',
	 	'title_li'			=> '',
	 	'show_option_none'	=> __( 'No categories' ),
	 	'taxonomy'			=> 'years',
	 ); 
	 wp_list_categories( $args );
	 ?></ul></div>
<?php endif; // end sidebar widget area ?>

