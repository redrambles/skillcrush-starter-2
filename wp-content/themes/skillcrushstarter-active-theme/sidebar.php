<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Skillcrush_Starter
 * @since Skillcrush Starter 1.0
 */
?>
<div id="sidebar" class="sidebar">

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div><!-- #primary-sidebar -->
	<?php endif; ?>

	<!-- Display post filter form if on the blog page-->
	<?php if(is_home()) { 
		echo '<div class="widget sidebar-filter">
			<h2>Filter Those Posts!</h2>
			<form action="'. site_url() . '/wp-admin/admin-ajax.php" method="POST" id="filter">';
			if( $terms = get_terms( 'category', 'orderby=name' ) ) :
					echo '<select name="categoryfilter"><option>Select category...</option>';
					foreach ( $terms as $term ) :
						echo '<option value="' . $term->term_id . '">' . $term->name . '</option>';
					endforeach;
					echo '</select>';
				endif;
			
				echo'<label>
					<input type="radio" name="date" value="ASC" /> Date: Ascending
				</label>
				<label>
					<input type="radio" name="date" value="DESC" checked="checked" /> Date: Descending
				</label>
				<button class="filter-button">Apply filters</button>
				<input type="hidden" name="action" value="customfilter">
			</form>
			<div id="response"></div>
		</div>';
			} ?>

</div><!-- #secondary -->