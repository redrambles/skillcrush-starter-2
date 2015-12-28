<?php
/**
 * Skillcrush Starter functions and definitions - meaningless comment addition here.
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Skillcrush_Starter
 * since Skillcrush Starter 1.0
 */

$skillcrushstarter_theme_data = wp_get_theme();
define( 'SKILLCRUSHSTARTER_THEME_URL', get_template_directory_uri() );
define( 'SKILLCRUSHSTARTER_THEME_TEMPLATE', get_template_directory() );
define( 'SKILLCRUSHSTARTER_THEME_VERSION', trim( $skillcrushstarter_theme_data->Version ) );
define( 'SKILLCRUSHSTARTER_THEME_NAME', $skillcrushstarter_theme_data->Name );

/**
 * Set the content width based on the theme's design and stylesheet.
 * In response to the theme checker
 */
if ( ! isset( $content_width ) ) {
	$content_width = 960;
}

// Theme support for post-thumbnails and menus
function skillcrushstarter_setup() {

	// Post thumbnails support
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size( 650, 510, true ); // Will leave this as default thumbnail size 
	add_image_size('filter-page', 300, 300, true); // For filter page



	add_image_size('full-page', 930, 400, true); // For full width page featured image
	add_image_size('blog-page', 200, 200, true); // For blog index page

	// Add default posts and comments RSS feed links to head. - In response to Theme Check
	add_theme_support( 'automatic-feed-links' );

	// Register Menus 
	register_nav_menus ( array (
		'primary-menu' => __( 'Primary Menu', 'skillcrushstarter' ),
		'secondary' => __( 'Secondary Menu', 'skillcrushstarter' ),
		'category-menu' => __( 'Category Menu', 'skillcrushstarter'), // optional addition  
	) );
}

add_action( 'after_setup_theme', 'skillcrushstarter_setup' );

/**
 * Register widget area 
 *
 */
function skillcrushstarter_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar 1', 'skillcrushstarter' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'skillcrushstarter' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 1', 'skillcrushstarter' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'skillcrushstarter' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
		register_sidebar( array(
		'name'          => __( 'Footer 2', 'skillcrushstarter' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'skillcrushstarter' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
		register_sidebar( array(
		'name'          => __( 'Footer 3', 'skillcrushstarter' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'skillcrushstarter' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'skillcrushstarter_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function skillcrushstarter_scripts() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_style( 'custom-archive-css', get_stylesheet_directory_uri(). '/inc/custom-archive.css' );
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
    wp_enqueue_style('skillcrushstarter-google-fonts', 'http://fonts.googleapis.com/css?family=Montserrat:400,700');
    wp_enqueue_style('skillcrushstarter-google-fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:300,700,400');
    
    	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// isotope stuff for filter page
	wp_register_script( 'isotope', '//cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.2/isotope.pkgd.min.js', array('jquery'),  true );
    wp_register_script( 'isotope-init', get_template_directory_uri().'/js/isotope.js', array('jquery', 'isotope'),  true );
    wp_register_style( 'isotope-css', get_stylesheet_directory_uri() . '/css/isotope.css' );

	wp_enqueue_script( 'isotope' );
    wp_enqueue_script('isotope-init');
    wp_enqueue_style('isotope-css');

}
add_action( 'wp_enqueue_scripts', 'skillcrushstarter_scripts' );


// defines custom markup for post comments
function skillcrush_comments($comment, $args, $depth) {
	$comment  = '<li class="comment">';
	$comment .=	'<header class="comment-head">';
	$comment .= '<span class="comment-author">' . get_comment_author() . '</span>';
	$comment .= '<span class="comment-meta">' . get_comment_date('m/d/Y') . '&emsp;|&emsp;' . get_comment_reply_link(array('depth' => $depth, 'max_depth' => 5)) . '</span>';
	$comment .= '</header>';
	$comment .= '<div class="comment-body">';
	$comment .= '<p>' . get_comment_text() . '</p>';
	$comment .= '</div>';
	$comment .= '</li>';
 
	echo $comment;
}

// changes excerpt symbol
function custom_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'custom_excerpt_more');

// add_filter( 'excerpt_more', 'new_excerpt_more' );
// function new_excerpt_more( $more ) {
//     return '... <a href="' . get_permalink() . '">More</a>';
// }

// Make the excerpt length smaller so that it fits my blog page design idea
function my_custom_excerpt_length( $length ) {
     return 25;
}
add_filter( 'excerpt_length', 'my_custom_excerpt_length', 999 );



// Remove automatic styling for the content area of the front-page that is messing with our social icons (otherwise have to line them up side by side)
add_filter( 'the_content', 'skillcrushstarter_no_wpautop_front_page', 9 );

function skillcrushstarter_no_wpautop_front_page( $content ) {

    if ( is_front_page() ) { 
        remove_filter( 'the_content', 'wpautop' );
        return $content;
    } else {
        return $content;
    }
}

//Adds custom classes to the array of post classes.
function skillcrushstarter_post_classes( $classes ) {

    if ( ! has_post_thumbnail() ) {
        $classes[] = 'without-featured-image';
    } else {
        $classes[] = 'with-featured-image';
    }

    return $classes;
}
add_filter( 'post_class', 'skillcrushstarter_post_classes' );


// Sweet admin notice
add_action( 'admin_notices', 'admin_notice_of_happiness' );
function admin_notice_of_happiness() {
  echo '<div class="updated">
          <p>Did I mention yet today that you are wonderful? Keep up the great work!</p>
        </div>';
}

// shortcode: [home]
add_shortcode('home', 'my_home_link_shortcode');

function my_home_link_shortcode() {

	$string = '<a href="' . get_home_url() .'">Home Page</a>';
	return $string;
}


// Hilarious Joke Title - IN PLUGIN (funny-title)

// After Post Info - IN PLUGIN (after-post-info)

/**
 * Custom archive template 
 *
 * Ann addition
 */
require get_template_directory() . '/inc/custom-archives-functions.php';