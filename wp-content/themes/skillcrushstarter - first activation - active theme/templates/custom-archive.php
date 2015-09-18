<?php
/**
 * The template for displaying arhives - Ann addition
 *
 * Template name: Custom Archive
 * 
 * @package WordPress
 * @subpackage Skillcrush_Starter
 * @since Skillcrush Starter 1.0
 */

get_header(); ?>

<section class="default-page">		
	<div class="full-main-content"> 
		<?php while ( have_posts() ) : the_post(); ?>			

			<article class="post-entry page-entry">

				<div class="archive-top">
				
					<?php the_post_thumbnail('full-page'); ?>

					<h2 class="entry-title"><?php the_title(); ?></h2>

					<?php the_content(); ?>

				</div>

				<div class="archive-widgets">

					<?php /* Enabling the widget areas for the archive page. */ ?>

					<?php if ( is_active_sidebar('archives-left') ) dynamic_sidebar( 'archives-left' ); ?>
					<?php if ( is_active_sidebar('archives-right') ) dynamic_sidebar( 'archives-right' ); ?>

					<div style="clear: both; margin-bottom: 30px;"></div><!-- clears the floating -->
				
				</div>
				
		  <?php
		  	
		  	$how_many_last_posts = intval(get_post_meta($post->ID, 'archive-num-posts', true));
		  
		  	if ( $how_many_last_posts > 200 || $how_many_last_posts < 2 ) $how_many_last_posts = 15;

		  	$my_query = new WP_Query('post_type=post&nopaging=1');

		  	if ( $my_query->have_posts() ) : ?>

		    	<h1 class="widget-title">Last <?php $how_many_last_posts ?> Posts <i class="fa fa-bullhorn" style="vertical-align: baseline;"></i></h1>&nbsp;
		    	<div class="archives-latest-section">
		    		<ol>
		    	
				    	<?php $counter = 1;
				    
				    	while ( $my_query->have_posts() && $counter <= $how_many_last_posts ) : $my_query->the_post(); ?>
 
				      	<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
				      
				      <?php
				      $counter++;
				    	endwhile; ?>
		    
		    	</ol>
		    </div>
		    
		   	<?php wp_reset_postdata();
		  		endif;
		  	?>

		  	  <h1 class="widget-title">Our Authors <i class="fa fa-user" style="vertical-align: baseline;"></i></h1>&nbsp;
			  <div class="archives-authors-section">
			    <ul>
			      <?php wp_list_authors('exclude_admin=0&optioncount=1'); ?>
			    </ul>
			  </div>

			  <h1 class="widget-title">By Month <i class="fa fa-calendar" style="vertical-align: baseline;"></i></h1>&nbsp;
			  <div class="archives-by-month-section">
			    <p><?php wp_get_archives('type=monthly&format=custom&after= |'); ?></p>
			  </div>

		</article>

		<?php endwhile; ?>

		</div>
</section>

<?php get_footer(); ?>