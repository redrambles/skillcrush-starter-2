<?php
/*
* Plugin Name: Funny Title
* Description: This is a mostly useless plugin that will modify your site title temporarily based on the day.
* Author: Ann Cascarano
* Version: 0.1
*/


// Hilarious Joke Title
function funny_title($title) {

	$day = date( 'F j' ); 
	if ( $day === 'August 24') {
		$title = 'Bunny Foo Foo';
	}

	return $title;
}
add_filter( 'wp_title', 'funny_title', 10, 1 );

?>