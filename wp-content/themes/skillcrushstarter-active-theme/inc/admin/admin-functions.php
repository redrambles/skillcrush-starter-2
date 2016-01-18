<?php
/* Functions that apply to our Settings / Options Page */


function skillcrushstarter_add_admin_page(){

	// Generate admin page
     add_menu_page( 'Skillcrushstarter Theme Options', 'skillcrushstarter', 'manage_options', 'skillcrushstarter_options', 'skillcrushstarter_theme_create_page', 'dashicons-feedback', 110 );

     // Generate admin sub page
     add_submenu_page( 'skillcrushstarter_options', 'Skillcrushstarter Theme Options', 'General', 'manage_options', 'skillcrushstarter_options', 'skillcrushstarter_theme_create_page' );
     add_submenu_page( 'skillcrushstarter_options', 'Skillcrushstarter CSS Options', 'Custom CSS', 'manage_options', 'skillcrushstarter_custom_css', 'skillcrushstarter_theme_settings_page' );

     // Activate custom settings
     add_action( 'admin_init', 'skillcrushstarter_custom_settings' );
}
add_action( 'admin_menu', 'skillcrushstarter_add_admin_page');


function skillcrushstarter_custom_settings() {
	register_setting( 'skillcrushstarter-settings-group', 'first_name' );
  register_setting( 'skillcrushstarter-settings-group', 'last_name');
  register_setting( 'skillcrushstarter-settings-group', 'user_description');
  register_setting( 'skillcrushstarter-settings-group', 'twitter_handler', 'skillcrushstarter_sanitize_twitter');
  register_setting( 'skillcrushstarter-settings-group', 'facebook_handler');
  register_setting( 'skillcrushstarter-settings-group', 'google_handler');

	add_settings_section( 'skillcrushstarter-sidebar-options', 'Sidebar Options', 'skillcrushstarter_sidebar_options', 'skillcrushstarter_options' );

  add_settings_field( 'sidebar-name', 'Full Name', 'skillcrushstarter_sidebar_name', 'skillcrushstarter_options', 'skillcrushstarter-sidebar-options' );
  add_settings_field( 'sidebar-description', 'Description', 'skillcrushstarter_sidebar_description', 'skillcrushstarter_options', 'skillcrushstarter-sidebar-options' );
  add_settings_field( 'sidebar-twitter', 'Twitter handler', 'skillcrushstarter_sidebar_twitter', 'skillcrushstarter_options', 'skillcrushstarter-sidebar-options' );
  add_settings_field( 'sidebar-facebook', 'Facebook handler', 'skillcrushstarter_sidebar_facebook', 'skillcrushstarter_options', 'skillcrushstarter-sidebar-options' );
  add_settings_field( 'sidebar-google', 'Google handler', 'skillcrushstarter_sidebar_google', 'skillcrushstarter_options', 'skillcrushstarter-sidebar-options' );

}

function skillcrushstarter_sidebar_options() {
	echo 'Customize your Sidebar Information';
}

function skillcrushstarter_sidebar_name() {
	$firstName = esc_attr( get_option( 'first_name' ) );
  $lastName = esc_attr( get_option( 'last_name' ) );
	echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name" />
  <input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name" />';
}
function skillcrushstarter_sidebar_description() {
	$description = esc_attr( get_option( 'user_description' ) );
	echo '<input type="text" class="user_description" name="user_description" value="'.$description.'" placeholder="Description" />
  <p class="description">Share a little info about yourself.</p>';
}
function skillcrushstarter_sidebar_twitter() {
	$twitter = esc_attr( get_option( 'twitter_handler' ) );
	echo '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="Twitter handler" />
  <p class="description">Add your Twitter name without the "@" symbol</p>';
}
function skillcrushstarter_sidebar_facebook() {
	$facebook = esc_attr( get_option( 'facebook_handler' ) );
	echo '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="Facebook handler" />';
}
function skillcrushstarter_sidebar_google() {
	$google = esc_attr( get_option( 'google_handler' ) );
	echo '<input type="text" name="google_handler" value="'.$google.'" placeholder="Google handler" />';
}

// Sanitization
function skillcrushstarter_sanitize_twitter( $input ) {
  $output = sanitize_text_field( $input );
  $output = str_replace('@', '', $output);
  return $output;
}

function skillcrushstarter_theme_create_page() {
     //generation of our admin page
     require_once( get_template_directory(). '/inc/admin/skillcrushstarter-admin.php');
}

function skillcrushstarter_theme_settings_page() {
     //generation of our sub admin settings page
}
