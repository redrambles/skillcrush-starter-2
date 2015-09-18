<?php
/* 
* Styles for the after-post-info plugin
*/


// We need some CSS to position the paragraph
function red01_after_info_css() {
	
	// Fetch the value of the 'info_bottom_post_color' custom field, if there is one
	// We don't need to use global $post here and then object -> method notation because we are running within the 'content' hook which is already in the loop. This is why 'get_the_ID()' works.

	$info_post_color_value = get_post_meta( get_the_ID(), 'info_post_color_value', true );

	// If the value isn't set - declare a default value
	if ( empty ( $info_post_color_value ) ) {
		$color = 'lemonchiffon'; 
	}

	else {
		$color = $info_post_color_value;
	}

	echo "<style type='text/css'>

		.after-info {
			padding: 1.5em 1em;
		    background-color: $color;
		    font-size: 14px;
		    font-style: oblique;
		    text-align: center;
		    margin-top: 50px;
		}

		</style>
	";
}

add_action( 'wp_enqueue_scripts', 'red01_after_info_css' );