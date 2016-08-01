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