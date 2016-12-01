<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Skillcrush_Starter
 * @since Skillcrush Starter 1.0
 */

get_header(); ?>

<!-- If this is the blog page, display the content of the editor at the top - if the user has entered something there. -->
<?php echo skillcrushstarter_blog_intro(); ?>

<section class="index-page">
<?php global $paged; ?>
		<?php if ( have_posts() ): ?>
			<div class="main-content">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php if ( ( 0 == $wp_query->current_post ) && ( $paged < 2 ) ){
							// if this is the first blog entry on the first blog page - display full content
							get_template_part('content', get_post_format());
						} else {
							// otherwise display excerpt
					    get_template_part('content-blog', get_post_format()); } ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</div><!-- .main-content -->

	<?php get_sidebar(); ?>

</section> <!-- I closed the section here instead of encompassing the navigation - which allowed me to use 'display:flex' on the element to allow the both the content and the sidebar to have equal height - making the border follow all the way down. -->

<div id="navigation" class="container">
	<div class="left"><?php next_posts_link('&larr; <span>Older Posts</span>'); ?></div>
		<?php echo skillcrushstarter_custom_pagination(); ?>
	<div class="right"><?php previous_posts_link('<span>Newer Posts</span> &rarr;'); ?></div>
</div>

<?php get_footer(); ?>