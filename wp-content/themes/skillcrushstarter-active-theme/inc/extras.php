<?php 

// Additional functions for skillcrushstarter

// Custom function for entry footer in content-quote
function skillcrushstarter_quote_footer(){ ?>
  
  Posted in <?php the_category(', '); ?>
  <?php $tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'skillcrushstarter' ) );
  if ( $tags_list ) {
    echo '| ';
    printf( '<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
      _x( '  Tagged ', 'Used before tag names.', 'skillcrushstarter' ),
      $tags_list
    );
  } 
  skillcrushstarter_show_some_love();
}


//If this is the blog page, display the content of the editor at the top - if the user has entered something there.
function skillcrushstarter_blog_intro(){
if ( is_home() ) { 
	$page_for_posts_id = get_option('page_for_posts');
  $blog_content = get_post_field( 'post_content', $page_for_posts_id);
	// don't print unnecessary markup - check for content first
	if ( !empty ($blog_content ) )  {
    
    $output = "";
		$output .= '<div class="blog-intro">';
		$output .= get_post_field( 'post_content', $page_for_posts_id ); 
		$output .= '</div>';
    
    return $output;
		  } //end check for if empty field
	 } // end check for if is_home
 } 
 
 // Social icons
 function skillcrushstarter_social_icons() {
   $social_icons = "";
   $social_icons .= '<div class="social-btns">';
   $social_icons .=   '<a href="http://www.twitter.com" class="soc-icon tw"></a>';
   $social_icons .=   '<a href="" class="soc-icon fb"></a>';
   $social_icons .=   '<a href="" class="soc-icon ln"></a>';
   $social_icons .=   '<a href="" class="soc-icon db"></a>';
   $social_icons .=   '<a href="http://www.github.com/redrambles" class="soc-icon gh"></a>';
   $social_icons .= '</div>';
   
   return $social_icons;
 }
 
 // Custom Pagination 
 function skillcrushstarter_custom_pagination() {
     global $wp_query;
     $max = $wp_query->max_num_pages; 
     $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
     $class = "";
     $output = "";
     if ( $paged == 1 )  { $class = "middle-right"; } if ( $paged == $max ) { $class = "middle-left"; }

     $output .= '<div class="middle-pages '. $class . '">';
     $output .= 'Page ' . $paged . ' of ' . $max . '</div>'; 
     
     return $output;   
 }
 
 // AJAXFor the 'show some love' button 
 function skillcrushstarter_show_some_love() {
   
   global $post;
   
   $love = get_post_meta( $post->ID, 'show_some_love', true );
   $love = ( empty( $love ) ) ? 0 : $love;
   echo '<div class="love-me"><span data-id="'. $post->ID .'" class="love-button"> <img width="28" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgaGVpZ2h0PSI0MHB4IiBpZD0iTGF5ZXJfMSIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDAgNDA7IiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCA0MCA0MCIgd2lkdGg9IjQwcHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxwYXRoIGQ9Ik0xOS45NzkwMDAxLDkuMTk1MzAwMSAgQzI1LjYzOTIwMDItMS44ODY3LDM4LjUxMTY5OTcsMy4zOTU5OTk5LDM3Ljk0OTE5OTcsMTMuMzAyN0MzNy4zNjM4LDIzLjYxNjE5OTUsMjIuODc0NTAwMywyNy4xNzM3OTk1LDE5Ljk3OTAwMDEsMzQuOTgxODk5MyAgQzE3LjA4MzAwMDIsMjYuOTc5MDAwMSwyLjc4OTU5OTksMjMuODExNTAwNSwyLjAwODMwMDEsMTMuMzAyN0MxLjI3MzksMy40MDc3MDAxLDE0LjkzNTk5OTktMS45MzEyLDE5Ljk3OTAwMDEsOS4xOTUzMDAxeiIgc3R5bGU9ImZpbGwtcnVsZTpldmVub2RkO2NsaXAtcnVsZTpldmVub2RkO2ZpbGw6I0ZGNTk0RjsiLz48L3N2Zz4="><span class="number">' . $love . '</span></span></div>';
 }
 
add_action( 'wp_ajax_add_love', 'ajax_heart_add_love' );
add_action( 'wp_ajax_nopriv_add_love', 'ajax_heart_add_love' );

function ajax_heart_add_love() {
    $love = get_post_meta( $_POST['post_id'], 'show_some_love', true );
    //$love = 0; //Use to reset - comment next two lines
    $love = ( empty( $love ) ) ? 0 : $love;
    $love++;
    update_post_meta( $_POST['post_id'], 'show_some_love', $love );
    echo $love;
    die();
}

// Remove the extra 10px around image captions - credit Justin Tadlock
// CAPTION remove the extra 10 px of horror
add_filter( 'img_caption_shortcode', 'cleaner_caption', 10, 3 );

function cleaner_caption( $output, $attr, $content ) {

	/* We're not worried abut captions in feeds, so just return the output here. */
	if ( is_feed() )
		return $output;

	/* Set up the default arguments. */
	$defaults = array(
		'id' => '',
		'align' => 'alignnone',
		'width' => '',
		'caption' => ''
	);

	/* Merge the defaults with user input. */
	$attr = shortcode_atts( $defaults, $attr );

	/* If the width is less than 1 or there is no caption, return the content wrapped between the [caption]< tags. */
	if ( 1 > $attr['width'] || empty( $attr['caption'] ) )
		return $content;

	/* Set up the attributes for the caption <div>. */
	$attributes = ( !empty( $attr['id'] ) ? ' id="' . esc_attr( $attr['id'] ) . '"' : '' );
	$attributes .= ' class="wp-caption ' . esc_attr( $attr['align'] ) . '"';
	$attributes .= ' style="width: ' . esc_attr( $attr['width'] ) . 'px"';

	/* Open the caption <div>. */
	$output = '<div' . $attributes .'>';

	/* Allow shortcodes for the content the caption was created for. */
	$output .= do_shortcode( $content );

	/* Append the caption text. */
	$output .= '<p class="wp-caption-text">' . $attr['caption'] . '</p>';

	/* Close the caption </div>. */
	$output .= '</div>';

	/* Return the formatted, clean caption. */
	return $output;
}


// Connect with Open Movie API for a 'Currently Watching' feature using an Options page and ACF Pro - to use in Text Widget
// shortcode: [recently_watched]
add_shortcode('recently_watched', 'my_recently_watched_shortcode');

function my_recently_watched_shortcode() {
    
    $movie_title = get_option('options_movie_title');
    $movie_comment = get_option('options_movie_comment');
    $api_url = 'http://www.omdbapi.com/?i=tt3896198&apikey=6af6885d&?t=';
    $api_url .= $movie_title;
    $api_url .= '&y=&plot=short&r=json';
    $response = wp_remote_get( $api_url );
    
    // If we don't have ACF active or we don't have something entered in the movie title field - bail.
    if ( !function_exists('get_field') || "" == $movie_title ) {
      return false;
    }
      // Is the API up? Do you have internet connection?
      if ( ! 200 == wp_remote_retrieve_response_code( $response ) ) {
        return false;
      }
      // Ok! We've got ACF, we've got a movie title, we've got a working API connection - let's do it!
      $movie = json_decode( wp_remote_retrieve_body( $response ), true );
      
      ob_start(); 
      //print_r( $movie );
      $output = '<h2 class = "widget-title movie_title_header"> Recently Watched </h2>';
      $output .= '<p><span class="movie_elements"> Title:</span> '.$movie["Title"].'</p>';
      $output .= '<p><span class="movie_elements">Year:</span> '.$movie["Year"].'</p>';
      $output .= '<p><span class="movie_elements"> IMDB Rating:</span> '.$movie["imdbRating"].'</p>';
      if ( $movie_comment ) {
        $output .= '<p><span class="movie_elements"> Thoughts: </span>'.$movie_comment.'</p>';
      }
      echo $output;
      return ob_get_clean();
}

	// Display post filter form if on the blog page
  // shortcode: [post_filter]
  add_shortcode('post_filter', 'red_filter_posts');
  function red_filter_posts(){
    if(is_home()) { 
      ob_start();
      echo '<div class="widget sidebar-filter">
        <h2>Filter Those Posts!</h2>
        <form action="'. site_url() . '/wp-admin/admin-ajax.php" method="POST" id="filter">';
        if( $terms = get_terms( 'category', 'orderby=name' ) ) :
            echo '<select name="categoryfilter"><option>Select category...</option>';
            foreach ( $terms as $term ) :
              echo '<option value="' . $term->term_id . '">' . $term->name . '</option>';
            endforeach;
            echo '</select>';
          endif;
        
          echo'<label>
            <input type="radio" name="date" value="ASC" /> Date: Ascending
          </label>
          <label>
            <input type="radio" name="date" value="DESC" checked="checked" /> Date: Descending
          </label>
          <button class="filter-button">Apply filters</button>
          <input type="hidden" name="action" value="customfilter">
        </form>
        <div id="response"></div>
      </div>';
      
        } 
        return ob_get_clean();
      }
