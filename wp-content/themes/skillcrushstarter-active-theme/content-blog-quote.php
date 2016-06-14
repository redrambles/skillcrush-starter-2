<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-entry' ); ?> > 
	
	<div class="entry-wrap">
		
		<header class="entry-header">
			<div class="quote">
				<h1 class="quote-content"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo get_the_content(); ?></a></h1>
				<h2 class="quote-author">- <?php the_title(); ?> -</h2>
			</div>
		</header>
		
		<footer class="entry-footer">
			<div class="entry-meta entry-terms">
				<?php skillcrushstarter_quote_footer(); ?>
			</div>
		</footer>
</article>