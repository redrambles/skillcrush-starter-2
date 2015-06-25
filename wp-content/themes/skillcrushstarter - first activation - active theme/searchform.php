<!-- <form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="search" />
	<input type="submit" id="searchsubmit" value="" />
</form> -->

<form action="<?php echo site_url(); ?>" class="search-form" method="get">
     <form>
         <!-- <label for="s" class="screen-reader-text">Search for:</label> --> 
         <input type="text" class="search-box-text" placeholder="Search <?php esc_attr_x( 'Search &hellip;', 'placeholder' ) ?>" value="<?php get_search_query() ?>" name="s" title="<?php esc_attr_x( 'Search for:', 'label' )?>" />
		<input type="submit" id="searchsubmit" class="input-btn" value="<?php esc_attr_x( '', 'submit button' ) ?>" />
     </form>
</form>