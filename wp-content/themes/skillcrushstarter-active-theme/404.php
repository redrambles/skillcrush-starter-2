<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Accelerate Marketing
 * @since Accelerate Marketing 1.0
 */

get_header(); ?>

<div id="primary" class="site-content">
	<div id="content" role="main">

		<div class="text_404">
			<h2>Oops! Looks like we took a wrong turn!</h2>
			<p> Would you like to try a search?</p>
		  <div class="search-404">
		    <?php get_search_form(); ?>
		  </div>
		</div>

		<div class="recentposts_404">
			<h2><a href="<?php echo esc_attr( site_url('/blog') );?>">Recent Posts</a></h2>
				<ul>
				<?php
					$args = array( 'numberposts' => '5', 'post_status' => 'publish' );
					$recent_posts = wp_get_recent_posts( $args );
					foreach( $recent_posts as $recent ){
						echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
					}
				?>
				</ul>
		</div>
</div>

<?php get_footer(); ?>
