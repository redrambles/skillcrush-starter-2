<?php
/**
 * The template for the post index page
 *
 * Author: Ann Cascarano
 *
 * @package WordPress
 * @subpackage Skillcrush_Starter
 * @since Skillcrush Starter 1.0
 */

get_header(); ?>

<section class="default-page">		
	<div class="full-main-content"> 
		<div class="first-letters">
						<?php $args = array (
							'post_type' => 'post',
							'orderby' => 'title',
							'order' => 'ASC',
							'posts_per_page' => -1
						); 
				$index_letters = [];
				$index = get_posts($args);
				foreach ( $index as $post ) : setup_postdata( $post ); 
					$title = get_the_title();
					$first = $title[0]; 
					$first_letter = '<a href="#'.$title[0].'">' . $title[0] .'</a>';
					if (!is_numeric($first)) {
						if (!in_array($first_letter, $index_letters)) {
							array_push($index_letters, $first_letter);
						}
					} 
					?>
				<?php endforeach; 
				echo implode(" ", $index_letters);
			wp_reset_postdata();?>
		</div>

		<article class="index">
			<ul>
			<?php $args = array (
							'post_type' => 'post',
							'orderby' => 'title',
							'order' => 'ASC',
							'posts_per_page' => -1
						); 
				$index_letters = [];
				$index= get_posts($args);
				foreach ( $index as $post ) : setup_postdata( $post ); 
					$title = get_the_title(); 
					$first = $title[0]; 
					$first_letter = '<div id="'.$title[0].'" class="first-letter-index">'. $title[0] .'</div>';
					if (!is_numeric($first)) {
						if (!in_array($first_letter, $index_letters)) {
							array_push($index_letters, $first_letter);
							echo $first_letter;
						}
					} ?>
					<li>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</li>

				<?php endforeach; 
			wp_reset_postdata();?>
			</ul>
		</article> <!-- .index -->

	</div>	<!-- .full-main-content -->
</section>

<?php get_footer(); ?>
