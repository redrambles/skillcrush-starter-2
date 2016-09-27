<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-entry' ); ?> > <!-- Added post_class for theme check - included 'post-entry' -->
	<figure class="blog-index-img"><?php the_post_thumbnail( 'blog-page' ); ?></figure>
	<div class="entry-wrap">
		<header class="entry-header">
			<div class="entry-meta">
				<h3 class="entry-time"><?php the_time('F j, Y');?></h3><!-- Modified the_date to be the_time  -->
			</div>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php //the_post_thumbnail(); ?>
		</header>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
			<p class="more"><a href="<?php the_permalink(); ?>"><?php _e( 'Read more' ); ?></a></p>
		</div>
		<footer class="entry-footer">
			<div class="entry-meta">
				<span class="entry-terms comments author">
						
					Written by <?php the_author_posts_link(); ?>
					|
					Posted in <?php the_category(', '); ?>
					<?php $tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'skillcrushstarter' ) );
					if ( $tags_list ) {
						echo '| ';
						printf( '<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
							_x( 'Tagged ', 'Used before tag names.', 'skillcrushstarter' ),
							$tags_list
						);
					} ?>
					|
					<a href="<?php comments_link(); ?>"><?php comments_number( 'No comments yet!', '1 comment', '% comments' ); ?></a>
					<?php skillcrushstarter_show_some_love(); ?>
				</span>
			</div>
		</footer>
	</div>
</article>