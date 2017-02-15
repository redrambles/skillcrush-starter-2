<?php
/**
 * The template for displaying archives
 *
 * Template name: Masonry
 * Author: Ann Cascarano
 * Widget areas registered in inc/custom-archives-functions.php
 * CSS for this page in inc/custom-archive.css
 *
 * @package WordPress
 * @subpackage Skillcrush_Starter
 * @since Skillcrush Starter 1.0
 */


get_header(); ?>

<ul id="filters"> <!-- Outputs the list of categories that you can click on to filter your posts -->
    <li><a href="#" data-filter="*" class="selected">Everything</a></li> 
  <?php
  $terms = get_terms("category"); // get all the terms in the category taxonomy (so 'categories' in this case), but you can use any taxonomy
  $count = count($terms); //How many categories are there?
    if ( $count > 0 ){  
    foreach ( $terms as $term ) 
      //echo $term->count; //test for how many posts are assigned to each taxonomy term (each category)
      echo "<li><a href='#' data-filter='.".$term->slug."'>" . $term->name . "</a></li>\n";	
      //create a list item with the current term slug for sorting, and name for label
    } ?>
</ul>


<div class="row" id="ms-container">   
  <?php 
     $args = array (
        'post_type' => 'post',
        'posts_per_page' => 25,        
        'meta_query' => array( 
          array(
            'key' => '_thumbnail_id'
          )
        ), 
        'order' => 'DESC',
      ); 
      
      $my_query = new WP_Query($args);     
      $size = 'medium';
     
      if ( $my_query->have_posts() ) : while ( $my_query-> have_posts() ) : $my_query->the_post();
        $termsArray = get_the_terms( $post->ID, "category" );  //Get the terms in the category taxonomy for this particular item
        $termsString = ""; //initialize the string that will contain the terms
        foreach ( $termsArray as $term ) { // for each term
          $termsString .= $term->slug.' '; //add to the term slugs - separated by a space - to the termsString string
      }
    ?>      
    <div class="<?php echo $termsString; ?> ms-item">
        
        <?php if (has_post_thumbnail()) : ?>
            <figure class="article-preview-image">          
                <?php the_post_thumbnail($size); ?>    
            </figure>
        <?php endif; ?>
        
        <h2 class="post-title"><a href="<?php the_permalink(); ?>" class="post-title-link"><?php the_title(); ?></a></h2>
            
        <?php the_excerpt(); ?>
      
    <div class="clearfix"></div>
    
    <p class="more"><a href="<?php the_permalink(); ?>">Read More</a></p>

    <div class="clearfix"></div>
  </div> <!--.ms-item -->
                
  <?php endwhile; endif;
    wp_reset_postdata(); ?>
</div> <!--#ms-container -->

<?php get_footer(); ?>