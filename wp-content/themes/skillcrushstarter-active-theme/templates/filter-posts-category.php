<?php
/**
 * The template for displaying filtered posts by Category
 *
 * Template name: Category Filter
 */ 

get_header(); ?>

<div class="full-main-content">

	<ul id="filters"> <!-- Outputs the list of categories that you can click on to filter your posts -->
	    <li><a href="#" data-filter="*" class="selected">Everything</a></li> 
		<?php
		$terms = get_terms("category"); // get all the terms in the category taxonomy (so 'categories' in this case), but you can use any taxonomy
		$count = count($terms); //How many are taxonomy terms (categories) are there?
		if ( $count > 0 ){  //If there is at least one 
			foreach ( $terms as $term ) {  //for each term:
				//echo $term->count; //test for how many posts are assigned to each taxonomy term (each category)
				echo "<li><a href='#' data-filter='.".$term->slug."'>" . $term->name . "</a></li>\n";	
				//create a list item with the current term slug for sorting, and name for label
			}
		}
		?>
	</ul>


	<?php $the_query = new WP_Query( 'posts_per_page=25' ); //Check the WP_Query docs to see how you can limit which posts to display ?>

	<?php if ( $the_query->have_posts() ) : ?>

	    <div id="isotope-section">
	    <?php while ( $the_query->have_posts() ) : $the_query->the_post();
			$termsArray = get_the_terms( $post->ID, "category" );  //Get the terms in the category taxonomy for this particular item
			$termsString = ""; //initialize the string that will contain the terms
			foreach ( $termsArray as $term ) { // for each term
				$termsString .= $term->slug.' '; //add to the term slugs - separated by a space - to the termsString string
			}
		?>
			<div class="<?php echo $termsString; ?> item"> <?php // add the contents of the termString as classes AND 'item' is used as an identifier and is common to all posts ?>
		        <?php if ( has_post_thumbnail() ) { ?>
		                      <figure><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'filter-page' ); ?><figcaption><h3 class="filter-title"><?php the_title(); ?></h3></figcaption></a></figure>
		                <?php } ?>
			</div> <!-- end item -->
		    
		    <?php endwhile;  ?>

	    </div> <!-- end isotope-list -->
	<?php endif; ?>

</div><!-- .full-main-content -->

<?php get_footer(); ?>