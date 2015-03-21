<?php
/**
  Barry Portfolio functions and definitions
 
  @package Barry Portfolio
 */

/**
  Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'barry_portfolio_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function barry_portfolio_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Barry Portfolio, use a find and replace
	 * to change 'barry-portfolio' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'barry-portfolio', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/**
	  Enable support for Post Thumbnails on posts and pages.
	 
	  @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'barry-portfolio' ),
	) );
	
	if ( function_exists( 'add_image_size' ) ) { 
		add_image_size( 'index', 180, 180, false ); 
		add_image_size( 'frontpage', 450, 450, false );
		add_image_size('work_page', 700, 760, false);
	}
	


	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'barry_portfolio_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
}
endif; // barry_portfolio_setup
add_action( 'after_setup_theme', 'barry_portfolio_setup' );

/**
  Register widgetized area and update sidebar with default widgets.
  The three areas create are as follows
		1 sidebar.php > sidebar default
		2 sidebar-blank > empty sidebar
		3 sidebar-admin.php > Admin sidebar
		4 sidebar-worksbyyear > Works by year sidebar (menu)
 */
function barry_portfolio_widgets_init() {
	register_sidebars( 4, array(
		'name'          =>  __( 'Sidebar %d' ),
		'id'            => "sidebar-$i",
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'barry_portfolio_widgets_init' );


/**
  Enqueue scripts and styles.
 */
function barry_portfolio_scripts() {
	wp_enqueue_style( 'barry-portfolio-style', get_stylesheet_uri() );

	wp_enqueue_script( 'barry-portfolio-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'barry-portfolio-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'barry_portfolio_scripts' );

/**
  Register Category Nav Menus

<?php register_nav_menu( $location, $description ); ?> 
Parameters

$location
    (string) (required) Menu location identifier, like a slug.

        Default: None 

$description
    (string) (required) Menu description - for identifying the menu in the dashboard.

        Default: None 
*/
function register_portfolio_cat_nav_menu() {
  register_nav_menu('portfolio-cat-menu',__( 'Portfolio Category Navigation Menu' ));
}
add_action( 'init', 'register_portfolio_cat_nav_menu' );

/**
  Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
  Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
  Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
  Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
  Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
	remove post type

if ( ! function_exists( 'unregister_post_type' ) ) :
function unregister_post_type( $works ) {
    global $wp_post_types;
    if ( isset( $wp_post_types[ $works ] ) ) {
        unset( $wp_post_types[ $works ] );
        return true;
    }
    return false;
}
endif;
*/

/**
  Custom Post types
 */


add_action('init', 'works_register');
 
function works_register() {
 
	$labels = array(
		'name' => _x('Works', 'post type general name'),
		'singular_name' => _x('Work', 'post type singular name'),
		'add_new' => _x('Add New', 'portfolio item'),
		'add_new_item' => __('Add New Work'),
		'edit_item' => __('Edit Work'),
		'new_item' => __('New Work'),
		'view_item' => __('View Work'),
		'search_items' => __('Search Works'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => get_stylesheet_directory_uri() . '/article16.png',
		'rewrite' => array('slug' => 'work', 'with_front' => 'true' ),
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail'),
		'has_archive' => true,
		

	  ); 
 
	register_post_type( 'work' , $args );
}
/**
Flushing Rewrite on Activation

add_action('init', 'my_rewrite');
function my_rewrite() {
    global $wp_rewrite;
    $wp_rewrite->add_permastruct('typename', 'typename/%year%/%postname%/', true, 1);
    add_rewrite_rule('typename/([0-9]{4})/(.+)/?$', 'index.php?typename=$matches[2]', 'top');
    $wp_rewrite->flush_rules(); // !!!
}

function my_rewrite_flush() {
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'my_rewrite_flush' );
*/


/**
part 2
<?php register_taxonomy	(	$taxonomy,
							$object_type,
							$args
						);
?> 

*/


register_taxonomy	(	"years",
						array("work"),
						array("hierarchical" => true,
							 	"label" => "Years",
								"singular_label" => "Year",
								'query_var' => "work_tax",
								"rewrite" => array("slug" => "work/all")
							)
						);

/*part 3*/

add_action("admin_init", "admin_init");
 
function admin_init(){
// add_meta_box( $id, $title, $callback, $post_type, $context (main or sidebar), $priority, $callback_args );
	add_meta_box("work_details", "Details about the works", "work_details", "work", "normal", "low");
	add_meta_box("work_attached_media", "Attached media files for the works", "work_attached_media", "work", "normal", "low");
}


function work_attached_media(){
  global $post;
  $custom = get_post_custom($post->ID);
  $work_attached_media = $custom["work_attached_media"][0];
  ?>
  <p><label>Enter here the attached media IDs to make a gallery:</label> <textarea cols="30" rows="5" name="work_attached_media"><?php echo $work_attached_media; ?></textarea></p>
  <?php
}
 
function work_details() {
  global $post;
  $custom = get_post_custom($post->ID);
  $dimension_x = $custom["dimension_x"][0];
  $dimension_y = $custom["dimension_y"][0];
  $pdimension_x = $custom["pdimension_x"][0];
  $pdimension_y = $custom["pdimension_y"][0];
  $work_medium = $custom["work_medium"][0];
  $year_completed = $custom["year_completed"][0];
  ?> 
  <p><label>Year:</label> <textarea cols="5" rows="1" name="year_completed"><?php echo $year_completed; ?></textarea></p>
  <p><label>Dimensions of work in mm: (leangth x height )</label><textarea cols="3" rows="1" name="dimension_x"><?php echo $dimension_x; ?></textarea> x <textarea cols="3" rows="1" name="dimension_y"><?php echo $dimension_y; ?></textarea><br /></p>
  <p><label>Dimensions of paper in mm: (leangth x height )</label><textarea cols="3" rows="1" name="pdimension_x"><?php echo $pdimension_x; ?></textarea> x <textarea cols="3" rows="1" name="pdimension_y"><?php echo $pdimension_y; ?></textarea><br /></p>
  <p><label>Mediums: </label><textarea cols="30" rows="5" name="work_medium"><?php echo $work_medium; ?></textarea></p>
  <?php
}


add_action('save_post', 'save_details');

function save_details(){
  global $post;
  update_post_meta($post->ID, "work_attached_media", $_POST["work_attached_media"]);
  update_post_meta($post->ID, "dimension_x", $_POST["dimension_x"]);
  update_post_meta($post->ID, "dimension_y", $_POST["dimension_y"]);
  update_post_meta($post->ID, "pdimension_x", $_POST["pdimension_x"]);
  update_post_meta($post->ID, "pdimension_y", $_POST["pdimension_y"]);
  update_post_meta($post->ID, "work_medium", $_POST["work_medium"]);
  update_post_meta($post->ID, "year_completed", $_POST["year_completed"]);
}

/**
Gallery features function. Made global, so that I can move to seperate plugin
*/
function get_cuurent_post_meta($key){
	global $post;
	return get_post_meta($post->ID,$key,true);
};