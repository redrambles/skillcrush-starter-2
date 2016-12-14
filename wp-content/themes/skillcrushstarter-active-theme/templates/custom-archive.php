<?php
/**
 * The template for displaying archives
 *
 * Template name: Custom Archive
 * Author: Ann Cascarano
 * Widget areas registered in inc/custom-archives-functions.php
 * CSS for this page in inc/custom-archive.css
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

					<h2 class="entry-title archive-title"><?php the_title(); ?></h2>

					<?php the_content(); ?>

				</div>
				<?php endwhile; ?>

				<div class="archive-widgets clearfix">

					<?php if ( is_active_sidebar('archives-left') ) dynamic_sidebar( 'archives-left' ); ?>
					<?php if ( is_active_sidebar('archives-right') ) dynamic_sidebar( 'archives-right' ); ?>

				</div>
				
			<div class="latest-posts">

			  <?php // Check to see whether ACF is active and that there is something in the field
			  	if( ! function_exists('the_field') ||  empty( get_field('how_many_last_posts' ) ) ) {
							
							$how_many_last_posts = 5;
					
					} else { 
			  		
						$how_many_last_posts = intval(get_field('how_many_last_posts'));
			  		
					}
					// Make sure that a number between 2 and 50 has been assigned - otherwise default to 12
			  	if ( $how_many_last_posts > 50 || $how_many_last_posts < 2 ) $how_many_last_posts = 12;
					
					 $args = array (
							'post_type' => 'post',
							'posts_per_page' => $how_many_last_posts,
							'order' => 'DESC',
						); 
						
						$my_query = new WP_Query($args);

			  	  if ( $my_query->have_posts() ) : ?>

			    	<h1 class="how-many widget-title">Last <?php echo $how_many_last_posts ?> Posts <i class="fa fa-bullhorn" style="vertical-align: baseline;"></i></h1>&nbsp;
			    	<div class="archives-latest-section">
			    		<ol>
			    	
					    <?php while ( $my_query->have_posts()) : $my_query->the_post(); ?>
	 
					      	<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
					      
					    <?php	endwhile; ?>
			    
			    	</ol>
			    </div>
			    
			   	<?php wp_reset_postdata();
			  		endif;
			  	?>
				</div> <!-- .latest-posts -->

				<div class="custom-archive-footer">
					<div class="archives-authors-section">
		  	  	<h1 class="widget-title">Our Authors <i class="fa fa-user"></i></h1>&nbsp;
				    <ul>
				      <?php wp_list_authors('exclude_admin=0&optioncount=1'); ?>
				    </ul>
				  </div>

					<div class="archives-by-month-section">
				  	<h1 class="widget-title">By Month <i class="fa fa-calendar"></i></h1>&nbsp;
				    <p><?php wp_get_archives('type=monthly&format=custom'); ?></p>
				  </div>
				</div>

		</article>

	</div>	<!-- .full-main-content -->
</section>

<?php get_footer(); ?>
