<article id="post-<?php the_ID(); ?>" class="post-entry">
	<div class="entry-wrap">
		<header class="entry-header">
			<h2 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
		</header>
		<div class="entry-summary">
			<?php the_content() ?>
		</div>
		<footer class="entry-footer">
			<div class="entry-meta">
				<span class="entry-terms comments"><?php echo get_comments_number() ?> comments</span>
			</div>
		</footer>
	</div>
</article>