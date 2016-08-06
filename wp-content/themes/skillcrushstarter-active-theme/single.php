<?php
/**
 * The template for displaying single posts
 *
 * @package WordPress
 * @subpackage Skillcrush_Starter
 * @since Skillcrush Starter 1.0
 */

get_header(); ?>

<section class="single-page">		
	<div class="main-content">
		<?php while ( have_posts() ) : the_post(); ?>

		<?php $download = get_field('download'); ?>

			<?php the_post_thumbnail(); ?>

			<?php get_template_part('content', get_post_format()); ?>
			
			<?php //do_action('red_after_content'); ?>

			<?php if ( !empty( $download ) ) { ?>
				<p><a class="download-button" href="<?php echo $download["url"]; ?>" target="_blank" name="Spec Sheet">Random Download</a></p>
			<?php } ?>
			<?php //wp_list_authors(); ?>
			
			<?php comments_template(); ?>

		<?php endwhile; ?>
	</div>
	
	<?php get_sidebar(); ?>

</section>
<div id="navigation" class="container">
	<?php // testing - this should be used in the loop - according to the Codex - but it seems to work anyways
		// if ( is_attachment() ) :
		// 	previous_post_link( '%link', __( '<span>Published In</span>', 'skillcrushstarter' ) );
		// else :
		// 	previous_post_link( '%link', __( '<span>Previous Post</span>', 'skillcrushstarter' ) );
		// 	next_post_link( '%link', __( '<span>Next Post</span>', 'skillcrushstarter' ) );
		// endif;
	?>
	<div class="left"><a href="<?php echo site_url('/blog/') ?>">&larr; <span>Back to posts</span></a></div>
</div>

<?php get_footer(); ?>
