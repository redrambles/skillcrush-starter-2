<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-entry' ); ?> > <!-- Added post_class for theme check  and added several semi-colons to template tags-->
	
<?php if( is_home() && has_post_thumbnail() ){ // if this is the first post on the blog page - pull in the featured image ?>
	<figure class="blog-index-img"><?php the_post_thumbnail( 'blog-page' ); ?></figure>
<?php } ?>
	<div class="entry-wrap">
		<header class="entry-header">
			<div class="entry-meta">
				<h3 class="entry-time"><?php the_time('F j, Y');?><?php //echo human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ); _e( ' ago.' );?></h3>
			</div>

			<?php if ( is_home() ) { ?>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php } else { ?>
				<h2 class="entry-title"><?php the_title(); ?></h2>
			<?php } ?>
		</header>

		<div class="entry-summary">
			
			<?php the_content(); 
			
			if ( function_exists( 'get_field' ) ) {
				// For Code Snippets - Custom Fields - if they exist
				$snippet_1_title = get_field('snippet_1_title');
				$snippet_1 = get_field('snippet_1');
				$snippet_2_title = get_field('snippet_2_title');
				$snippet_2 = get_field('snippet_2');
				$snippet_3_title = get_field('snippet_3_title');			
				$snippet_3 = get_field('snippet_3');
				
				
				if ( !empty( $snippet_1 ) ) { ?>
					<div class="snippet-block">
						<h3 class="code-button"><?php echo $snippet_1_title; ?></h3>
						<div class="snippet">
							<?php echo $snippet_1; ?>
						</div>
					</div>
				
				<?php } 
				
				if ( !empty( $snippet_2 ) ) { ?>
					
						<div class="snippet-block">
							<h3 class="code-button"><?php echo $snippet_2_title; ?></h3>
							<div class="snippet">
								<?php echo $snippet_2; ?>
							</div>
						</div>
						
				<?php } 
				if ( !empty( $snippet_3) ) { ?>
				
					<div class="snippet-block">
						<h3 class="code-button"><?php echo $snippet_3_title; ?></h3>
						<div class="snippet">
							<?php echo $snippet_3; ?>
						</div>
					</div>
		
			<?php 
				} 
			} // ACF check?>
		</div>

		<footer class="entry-footer">
			<div class="entry-meta">
				<span class="entry-terms comments author">
					Written by <?php the_author_posts_link(); ?><?php //the_author(); ?>
					/
					Posted in <?php the_category(', '); ?> 
					/
					<a href="<?php comments_link(); ?>"><?php comments_number( 'No comments yet!', '1 comment', '% comments' ); ?></a>
					<?php skillcrushstarter_show_some_love(); ?>
				</span>
			</div>
		</footer>

	</div>
</article>