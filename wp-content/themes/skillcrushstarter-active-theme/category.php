<?php
/**
 * The template for displaying Category pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Skillcrush_Starter
 * @since Skillcrush Starter 1.0
 */

get_header(); ?>

<section class="category-page">
	<?php if ( have_posts() ): ?>
		<header class="page-header">
			<h1 class="page-title"><?php printf( __( 'Posts categorized as <span>%s</span>', 'skillcrushstarter' ), single_cat_title( '', false ) ); ?></h1>
		</header>
	<?php endif; ?>

	<div class="main-content">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content-blog', get_post_format() ); ?>
			<?php endwhile; ?>
		<?php else: ?>
			<article>
				<h4>No posts found!</h4>
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