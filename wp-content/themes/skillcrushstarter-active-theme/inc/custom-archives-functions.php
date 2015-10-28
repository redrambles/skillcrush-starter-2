<?php 

// Widget areas for Custom Archive Page Template

if(!function_exists('archives_page_widgets_init')) {

	function archives_page_widgets_init() {
	  /* First archive page widget, displayed to the LEFT. */
	  register_sidebar(array(
	    'name' => __('Custom archive page widget left', 'skillcrushstarter'),
	    'description' => __('This widget will be shown on the left side of your archive page.', 'skillcrushstarter'),
	    'id' => 'archives-left',
	    'before_widget' => '<div class="archives-widget-left">',
	    'after_widget' => '</div>',
	    'before_title' => '<h1 class="widget-title">',
	    'after_title' => '</h1>',
	  ));

	  /* Second archive page widget, displayed to the RIGHT. */
	  register_sidebar(array(
	    'name' => __('Custom Archive page widget Right', 'skillcrushstarter'),
	    'description' => __('This widget will be shown on the right side of your archive page.', 'skillcrushstarter'),
	    'id' => 'archives-right',
	    'before_widget' => '<div class="archives-widget-right">',
	    'after_widget' => '</div>',
	    'before_title' => '<h1 class="widget-title">',
	    'after_title' => '</h1>',
	  ));
	}
}
add_action('widgets_init', 'archives_page_widgets_init');