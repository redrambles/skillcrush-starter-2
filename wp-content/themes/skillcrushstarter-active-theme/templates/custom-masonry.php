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

<div class="row" id="ms-container">
     
  <?php // Check to see whether ACF is active and that there is something in the field
     $args = array (
        'post_type' => 'post',
        'posts_per_page' => 10,
        'order' => 'ASC',
      ); 
      
      $my_query = new WP_Query($args);     
     
    if ( $my_query->have_posts() ) : while ( $my_query-> have_posts() ) : $my_query->the_post(); ?>
      
                
    <div class="ms-item">
        
        <?php if (has_post_thumbnail()) : ?>
        
            <figure class="article-preview-image">
                
                <?php the_post_thumbnail(''); ?>
                
            </figure>

        <?php endif; ?>
        
            <h2 class="post-title"><a href="<?php the_permalink(); ?>" class="post-title-link"><?php the_title(); ?></a></h2>
            
        <?php the_excerpt(); ?>
      
    <div class="clearfix"></div>
    
<p class="more"><a href="<?php the_permalink(); ?>">Read More</a></p>

    <div class="clearfix"></div>
  </div>
                
  <?php endwhile; endif;
    wp_reset_postdata(); ?>
</div>

<?php get_footer(); ?>