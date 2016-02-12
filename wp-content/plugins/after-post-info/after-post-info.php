<?php namespace Red_Plugins;
/*
* Plugin Name: After Post Info
* Description: Add Extra Info to the bottom of Content - Customizable on post by post basis using a custom field and has default value. Set to be viewed on single posts only. Use the 'info_bottom_post' custom field to create custom content for your info box and use 'info_bottom_post_color' custom field to choose the color. Default content = "Thanks for Reading". Default color = "lemonchiffon".
* Author: Ann Cascarano
* Author URI: www.redrambles.com
* Version: 1.0
*/

define( 'RED01_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

// Let's include a little styling that is partially customizable 
include( RED01_PLUGIN_PATH . 'after-post-styles.php' );



add_filter( 'the_content', __NAMESPACE__ . '\\after_post_info' );

// Because we are calling this within the 'content' and that the content is running inside the loop - we can simply use 'get_the_ID()' when fetching our custom field
function after_post_info( $content ) {

	// testing this with ACF - but using the 'get_post_meta' call instead of 'get_field' just in case ACF is deactivated - will not break the front end.
	$after_info = get_post_meta( get_the_ID(), 'after_info_text', true );

	// If we aren't on a single post page - let's bail. We don't want this appearing on index / archive pages. 
	if (!is_single() ) {
		return $content;
	}
	
	// $args = func_get_args();

	// var_dump($args);

	if ( !empty( $after_info ) ) {
		$after_info = '<div class="after-info">' . esc_html($after_info) . '</div>';
		return $content . $after_info;
	}

	// If nothing is entered in the 'After Info Text' field - return the unaltered post content
	return $content;
}






