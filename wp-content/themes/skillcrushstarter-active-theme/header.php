<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Skillcrush_Starter
 * @since Skillcrush Starter 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>> <!-- Added for theme check - but would need a language folder and .po / .pot files -->
<head>
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="viewport" content="width=device-width" initial-scale="1">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<header class="page-header container">
			<a href="<?php echo site_url(); ?>" class="top-logo">
				<span class="title"><?php bloginfo('name'); ?></span>
				<!-- <img src="<?php //echo get_template_directory_uri()?>/img/facebook-icon.png" width="25" height="25" alt="" /> -->
				<span class="sub-title"><?php bloginfo('description'); ?></span>
			</a>
			<nav class="top-nav">
				<?php wp_nav_menu(array('theme_location' => 'primary-menu')); ?> 
			</nav>
		</header>

		<div id="main" class="site-main">