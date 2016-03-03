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

			<?php if ( !empty( $download ) ) { ?>
				<p><a class="download-button" href="<?php echo $download["url"]; ?>" target="_blank" name="Spec Sheet">Random Download</a></p>
			<?php } ?>
			<?php //wp_list_authors(); ?>

			<?php comments_template(); ?>

		<?php endwhile; ?>
	</div>

	<?php get_sidebar(); ?>

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
</section>
<section>
	<?php
	if ( function_exists('get_field') ) { // Only do this if ACF is active
		
			$posts = get_field('related_posts');
			$posts_count = count($posts);
			$posts_width = array ( // change the styling according to number of posts. Max 3.
				'',
				'full',
				'half',
				'third'
			);
			$post_class = $posts_width[$posts_count]; // Set the width class according to the number of related posts

			if ($posts) { // Check first to see if any related posts were set for this particular post
	     echo '<h1 class="related-posts-title">More Goodness</h1>';
	     echo '<ul class="related-list clearfix">';
	     foreach ($posts as $post):
	          setup_postdata($post);
	          echo '<li class="'.$post_class.'"><a href="' . get_the_permalink() .'">';
	          echo '<h3 class="related-individual-title">' . get_the_title() . '</h3>';
	          the_post_thumbnail('related-images');
	          echo '</a></li>';
	     endforeach;
	     echo '</ul>';
	     wp_reset_postdata();

		 } // end related posts loop
	 } // end ACF check
	 ?>
</section>
<?php get_footer(); ?>
