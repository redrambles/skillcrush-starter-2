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
