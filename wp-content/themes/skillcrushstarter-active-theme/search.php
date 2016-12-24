<?php
/**
 * The Search Results page
 *
 * Not part of the original theme - (Ann addition)
 * 
 * Still needs work- page results are being pulled in and trying to display category meta information as per the 'content-blog' partial
 * Perhaps we need to create a new partial with a conditional - or simply add a conditional to content-blog with an explanation
 * as to why we would need to exclude page results
 * 
 */

get_header(); ?>

<section class="index-page">		
	<div class="main-content">
		<?php if ( have_posts() ): ?>

		<header class="search-header">
			<h2 class="entry-title"><?php printf( __( 'Search Results for "<span>%s</span>"', 'skillcrushstarter' ), get_search_query() ); ?></h1>
		</header><!-- .page-header -->
		
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part('content-blog', get_post_format()); ?> <!-- We want the excerpts - so we'll go with content-blog -->
		<?php endwhile; 
		else: ?>
		<article>
			<h2 class="entry-title new-search">No posts found!</h2>
			<p>Can I interest you in another search?</p>
			<?php get_search_form(); ?>
		</article>

		<?php endif; ?>
	</div>
	
	<?php get_sidebar(); ?>
</section>

	<div id="navigation" class="navigation container">
		<div class="left"><?php next_posts_link('&larr; <span>Older Posts</span>'); ?></div>
			<?php echo skillcrushstarter_custom_pagination(); ?>
		<div class="right"><?php previous_posts_link('<span>Newer Posts</span> &rarr;'); ?></div>
	</div>



<?php get_footer(); ?>
