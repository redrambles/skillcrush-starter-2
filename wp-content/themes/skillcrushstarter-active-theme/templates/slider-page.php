<?php
/**
 * The template for displaying arhives - Ann addition
 *
 * Template name: Slider Page
 *
 * @package WordPress
 * @subpackage Skillcrush_Starter
 * @since Skillcrush Starter 1.0
 */

get_header(); ?>

<section class="default-page">
	<div class="full-main-content">


		<?php
		if ( function_exists('get_field') ) { // Only do this if ACF is active
		//Fetch the slides
			$my_query = new WP_Query('post_type=slider'); ?>

			<div class="slick-slider clearfix">
				<?php if ( $my_query->have_posts() ) : while ( $my_query->have_posts() ) : $my_query->the_post();
					$slider_image = get_field('slider_image');
					$size = "full-page"; ?>

						<div class="slide">
							<?php	echo wp_get_attachment_image( $slider_image, $size ); ?>
						</div>
						
					<?php
						endwhile;
						endif;
						wp_reset_postdata(); ?>
			</div>
		<?php } //End ACF Check ?>
		<!-- End slider section -->

		<div>
				<?php while ( have_posts() ) : the_post(); ?>

					<article class="post-entry page-entry">
							<?php the_content(); ?>
						</article>

				<?php endwhile; ?>

		</div>

	</div>
</section>

<?php get_footer(); ?>
