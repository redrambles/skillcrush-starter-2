<?php
/**
 * The template for displaying pages
 *
 * @package WordPress
 * @subpackage Skillcrush_Starter
 * @since Skillcrush Starter 1.0
 */

get_header(); ?>
<pre><?php //print_r($wp_query->posts); exit; ?></pre>

<section class="default-page">		
	<div class="full-main-content"> <!-- used to be 'main-content' -->

		<?php while ( have_posts() ) : the_post(); ?>			

			<article class="post-entry page-entry">
				<!-- Added the post thumbnail as my 'own touch' as per the freedom to experiment here in the lessons -->
				<?php the_post_thumbnail('full-page'); ?>

				<h2 class="entry-title"><?php the_title(); ?></h2>
				
				<!-- Added .entry-summary div to benefit from styling already present in blog, archive and single post pages. -->
				<div class="entry-summary">
					<?php the_content(); ?>
				</div>
				
				<!-- testing -->
				<?php wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'skillcrushstarter' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'skillcrushstarter' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );?>
			</article>

		<?php endwhile; ?>

	</div>
	
	<?php //get_sidebar(); ?>
</section>

<?php get_footer(); ?>
