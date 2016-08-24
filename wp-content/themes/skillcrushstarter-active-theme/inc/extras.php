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
	// don't print unnecessary markup - check for content first
	if ( !empty (get_post_field( 'post_content', $page_for_posts_id ) ) ) {
    
    $output = "";
		$output .= '<div class="blog-intro">';
		$output .= get_post_field( 'post_content', $page_for_posts_id ); 
		$output .= '</div>';
    
    return $output;
		  } //end check for if empty field
	 } // end check for if is_home
 } 
 
 // AJAXFor the 'show some love' button 
 function skillcrushstarter_show_some_love() {
   $love = get_post_meta( get_the_ID(), 'show_some_love', true );
   $love = ( empty( $love ) ) ? 0 : $love;
   echo '<span class="love-button"> <img width="28" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgaGVpZ2h0PSI0MHB4IiBpZD0iTGF5ZXJfMSIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDAgNDA7IiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCA0MCA0MCIgd2lkdGg9IjQwcHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxwYXRoIGQ9Ik0xOS45NzkwMDAxLDkuMTk1MzAwMSAgQzI1LjYzOTIwMDItMS44ODY3LDM4LjUxMTY5OTcsMy4zOTU5OTk5LDM3Ljk0OTE5OTcsMTMuMzAyN0MzNy4zNjM4LDIzLjYxNjE5OTUsMjIuODc0NTAwMywyNy4xNzM3OTk1LDE5Ljk3OTAwMDEsMzQuOTgxODk5MyAgQzE3LjA4MzAwMDIsMjYuOTc5MDAwMSwyLjc4OTU5OTksMjMuODExNTAwNSwyLjAwODMwMDEsMTMuMzAyN0MxLjI3MzksMy40MDc3MDAxLDE0LjkzNTk5OTktMS45MzEyLDE5Ljk3OTAwMDEsOS4xOTUzMDAxeiIgc3R5bGU9ImZpbGwtcnVsZTpldmVub2RkO2NsaXAtcnVsZTpldmVub2RkO2ZpbGw6I0ZGNTk0RjsiLz48L3N2Zz4="><span class="number">' . $love . '</span></span>';
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