<?php
/**
 * @package WordPress
 * @subpackage GuillemAndreu.com
 * @since GuillemAndreu.com 3.0.0
 */



/*
 * Theme setup
 */

function gp3_setup(){
	// Localization
	load_theme_textdomain('gp3', get_template_directory() . '/lang');
	// Images
	add_theme_support('post-thumbnails', 'project');
	add_image_size('project-frontpage', 1440, 500, true);
	add_image_size('project-thumbnail', 300, 200, true); // Remember to change to the final size when defined !!!
}

add_action('after_setup_theme', 'gp3_setup');



/*
 * Theme version number
 */

$theme = wp_get_theme();
$theme_version_number = $theme->Version;