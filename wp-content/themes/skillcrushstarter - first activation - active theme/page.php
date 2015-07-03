<?php
/**
 * The template for displaying pages
 *
 * @package WordPress
 * @subpackage Skillcrush_Starter
 * @since Skillcrush Starter 1.0
 */

get_header(); ?>

<section class="default-page">		
	<div class="main-content">
		<?php while ( have_posts() ) : the_post(); ?>
			<h2 class="entry-title"><?php the_title(); ?></h2>
			<article class="post-entry">
				<!-- Added the post thumbnail as my 'own touch' as per the freedom to experiment here in the lessons -->
				<?php the_post_thumbnail(); ?>
				<?php the_content(); ?>
				
				<!-- testing -->
				<?php wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );?>
			</article>
		<?php endwhile; ?>
	</div>
	
	<?php //get_sidebar(); ?>
</section>

<?php get_footer(); ?>
