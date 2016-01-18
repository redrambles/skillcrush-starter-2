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

<section class="related-posts">
	<?php
			$tags = wp_get_post_terms( get_the_ID() );
			if ( $tags ) {
				echo 'Related Posts';

				$tagcount = count( $tags );
				for ( $i = 0; $i < $tagcount; $i++ ) {
					$tagIDs[$i] = $tags[$i]->term_id;
				}
			}

			$args=array(
				'tag_in' => $tagIDs,
				'post_not_in' => array( $post->ID ),
				'posts_per_page' => 3,
				'ignore_sticky_posts' => 1
			);
			$relatedPosts = new WP_Query( $args );
			if ( $relatedPosts->have_posts() ) {
				//loop through related posts based on the tag
				while ( $relatedPosts->have_posts() ) :
					$relatedPosts->the_post(); ?>
					<p><a href="<?php the_permalink(); ?>"><?php the_title();?></a></p>
				<?php endwhile; wp_reset_postdata();
			}?>
</section>
<?php get_footer(); ?>
