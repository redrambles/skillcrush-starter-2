<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Skillcrush_Starter
 * @since Skillcrush Starter 1.0
 */
?>


		</div><!-- #main -->

		<?php if (!is_front_page() ) { ?>
			<!-- Ann addition -->

			<!-- Testing Footer Widget Area  -->
			<div class="footer-widget-area">
				<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
				<div class="footer-widgets" role="complementary">
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</div>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
				<div class="footer-widgets" role="complementary">
					<?php dynamic_sidebar( 'footer-2' ); ?>
				</div>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
				<div class="footer-widgets" role="complementary">
					<?php dynamic_sidebar( 'footer-3' ); ?>
				</div>
				<?php endif; ?>
			</div>

			<footer id="colophon" class="site-footer">

				<!-- dont have this menu built in yet -->
				<?php if ( has_nav_menu ( 'social' ) ) : ?>
					<?php wp_nav_menu( array( 'theme_location' => 'social', 'depth' => 1, 'link_before' => '<span class="screen-reader-text">', 'link_after' => '</span>', 'container_class' => 'social-links', ) ); ?>
				<?php endif; ?>

				<div class="site-info"  role="contentinfo">
					<a href="http://wordpress.org/" title="<?php esc_attr_e( 'An Awesome Starter Theme', 'skillcrushstarter' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'skillcrushstarter' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>
					<?php printf( __( 'Theme: %1$s by %2$s.', 'skillcrushstarter' ), 'skillcrushstarter', '<a href="http://www.skillcrush.com">Skillcrush.com</a>' ); ?>
				</div><!-- .site-info -->
			</footer><!-- #colophon -->
		<?php } ?>

	</div><!-- #page -->

	<?php wp_footer(); ?>

</body>
</html>