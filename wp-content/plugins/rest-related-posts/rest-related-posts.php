<?php namespace Red_Plugins;
/*
* Plugin Name: Rest Related Posts
* Description: Related Posts section using the WP-API and AJAX
* Author: Ann Cascarano
* Author URI: redrambles.com
* Version: 1.0
*/


// TODO: This function below breaks the ajax for related posts - must find out what's going on
// // Add extra fields to the JSON output
//   function related_posts_register_fields() {
//     // Add author name
//     register_rest_field( 'post',
//         'author_name',
//         array(
//             'get_callback'  => 'related_posts_get_author_name',
//             'update_callback' => null,
//             'schema'          => null,
//         )
//     );    
//   }
//   
// function related_posts_get_author_name( $object, $field_name, $request ){
//       return get_the_author_meta( $object['id'], $field_name, true );
//     }
//   add_action( 'rest_api_init', __NAMESPACE__ . '\\related_posts_register_fields' );


add_filter( 'wp_enqueue_scripts', __NAMESPACE__ . '\\related_posts_scripts' );
function related_posts_scripts( ) {
  if ( is_single() && is_main_query() ) {
    wp_enqueue_style( 'related-posts-styles', plugin_dir_url( __FILE__ ). 'css/related-posts-styles.css' );
    wp_enqueue_script( 'related-posts-ajax-script', plugin_dir_url( __FILE__ ). 'js/related-posts.ajax.js', array('jquery'), '0,1', true);
    
    global $post;
    $post_id = $post->ID;
    
    // Use this function to pass data from PHP to JS
    wp_localize_script( 'related-posts-ajax-script', 'postdata', 
      array (
        'post_id' => $post_id,
        'json_url' => rest_related_posts_json_query()
      )
    );
  }
}

// Create REST API url 
function rest_related_posts_json_query() {
  $cats = get_the_category();
  $cat_ids = array();
  
  foreach ( $cats as $category ) {
    $cat_ids[] = $category->term_id;
  }
  
  $url_args = array(
    'categories' => implode( ",", $cat_ids),
    'per_page' => 3
  );
  
  $url = add_query_arg( $url_args, rest_url('wp/v2/posts?') );
  return $url;
}

// Create the HTML output for the related post button - will be pulled in the related_posts display function
function related_post_structure() {
  $output = '<section id="related-posts" class="related-posts">';
  $output .= '<a href="#" class="get-related-posts">Get related posts</a>';
  //$output .= rest_related_posts_json_query(); // test the url
  $output .= '<div class="ajax-loader"><img src="' . plugin_dir_url(__FILE__) .'css/spinner.svg"></div>';
  $output .= '</section><!-- .related-posts -->';
  return $output;
}


add_filter( 'the_content', __NAMESPACE__ . '\\related_posts' );

// Display the related posts right after the post content on single posts only
function related_posts( $content ) {
  
  if ( is_single() && is_main_query() ) {
    return $content . related_post_structure();
  }
  return $content;
}