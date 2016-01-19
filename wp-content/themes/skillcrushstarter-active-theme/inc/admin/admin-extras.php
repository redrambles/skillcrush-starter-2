<?php
/*
*
* Extras for Options pages
*
*/

function skillcrushstarter_load_admin_scripts( $page_hook ){

  if ( 'toplevel_page_skillcrushstarter_options' != $page_hook) {
    return;
  }
  wp_register_style( 'skillcrushstarter-admin', get_template_directory_uri() . '/css/skillcrushstarter-admin.css', array(), '1.0.0', 'all' );
  wp_enqueue_style( 'skillcrushstarter-admin' );

  wp_register_script( 'skillcrushstarter-admin-script', get_template_directory_uri().'/js/skillcrushstarter-admin.js', array('jquery'), '20160118', true);
  wp_enqueue_script( 'skillcrushstarter-admin-script' );

}
add_action( 'admin_enqueue_scripts', 'skillcrushstarter_load_admin_scripts' );
