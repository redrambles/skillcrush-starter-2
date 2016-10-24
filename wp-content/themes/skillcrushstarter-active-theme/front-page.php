<?php
/**
 * The template for the homepage
 *
 * @package WordPress
 * @subpackage Skillcrush_Starter
 * @since Skillcrush Starter 1.0
 */

get_header(); ?>
		
<section class="home-page">
	<div class="main-content">
		<div class="content">
			<?php while ( have_posts() ): the_post(); ?>

				<h1><?php the_title(); ?></h1>

				<?php the_content(); ?>
				
				<?php //echo skillcrushstarter_social_icons(); ?>
				
				<a href="<?php echo esc_attr( site_url('/blog/') ); ?>" class="btn">Come on in, there's coffee</a>
			<?php endwhile; ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>