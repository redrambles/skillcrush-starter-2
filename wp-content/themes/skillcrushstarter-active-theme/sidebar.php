<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<div id="sidebar">

	<?php //if ( is_page() ) { // if this is a page, go ahead and display the second widget area (sidebar2) in the sidebar, provided there are widgets in it
		//if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
<!-- 		<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
 -->			<?php //dynamic_sidebar( 'sidebar-2' ); ?>
		<!-- </div> --><!-- #primary-sidebar -->
		<?php //endif; 

	 //} else { // if this is NOT a page, go ahead and display the regular sidebar ?>
		
		<?php if ( has_nav_menu( 'secondary' ) ) : ?>
		<nav role="navigation" class="navigation site-navigation secondary-navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>
		</nav>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- #primary-sidebar -->
		<?php endif; ?>

	<?php  //} ?> <!-- end else statement to check for page -->

</div><!-- #secondary -->