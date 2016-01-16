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
	add_settings_section( 'skillcrushstarter-sidebar-options', 'Sidebar Options', 'skillcrushstarter_sidebar_options', 'skillcrushstarter_options' );
	add_settings_field( 'sidebar-name', 'First Name', 'skillcrushstarter_sidebar_name', 'skillcrushstarter_options', 'skillcrushstarter-sidebar-options' );
}

function skillcrushstarter_sidebar_options() {
	echo 'Customize your Sidebar Information';
}

function skillcrushstarter_sidebar_name() {
	$firstName = esc_attr( get_option( 'first_name' ) );
	echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name" />';
}

function skillcrushstarter_theme_create_page() {
     //generation of our admin page
     require_once( get_template_directory(). '/inc/admin/skillcrushstarter-admin.php');
}

function skillcrushstarter_theme_settings_page() {
     //generation of our sub admin settings page
}
