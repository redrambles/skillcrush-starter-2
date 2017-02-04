<?php
// Custom logo goodness for Skillcrushstarter theme

/* Load CSS for custom login page */
function skillcrushstarter_custom_login() {
   wp_enqueue_style( 'login_styles', get_stylesheet_directory_uri() . '/css/custom-login-styles.css' );
}
add_action( 'login_enqueue_scripts', 'skillcrushstarter_custom_login');

// Change error message upon login
function skilcrushstarter_login_error_custom(){
    return 'Incorrect login details, my dear.';
}
add_filter('login_errors', 'skilcrushstarter_login_error_custom');

// Change the link for login page logo
function skillcrushstarter_login_url() {
    return 'http://localhost/skillcrush-starting-anew';
}
add_filter('login_headerurl', 'skillcrushstarter_login_url');

// Change the tooltip for login page logo
function skillcrushstarter_login_url_text() {
    return 'Hi! I\'m Ann. :)';
}
add_filter('login_headertitle', 'skillcrushstarter_login_url_text');