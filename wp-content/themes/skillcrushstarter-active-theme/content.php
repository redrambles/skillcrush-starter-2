<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-entry' ); ?> > <!-- Added post_class for theme check  and added several semi-colons to template tags-->

	<div class="entry-wrap">
		<header class="entry-header">
			<div class="entry-meta">
				<h3 class="entry-time"><?php the_time('F j, Y');?><?php //echo human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ); _e( ' ago.' );?></h3>
				
				
			</div>

			<h2 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
			
		</header>

		<div class="entry-summary">
			
			<?php the_content(); ?>

		</div>

		<footer class="entry-footer">
			<div class="entry-meta">
				<span class="entry-terms comments author">
					Written by <?php the_author_posts_link(); ?><?php //the_author(); ?>
					/
					Posted in <?php the_category(', '); ?> 
					/
					<?php comments_number( 'No comments yet!', '1 comment', '% comments' ); ?>
				</span>
			</div>
		</footer>

	</div>
</article>