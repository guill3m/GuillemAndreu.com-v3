<?php
/*
Plugin Name: GP3 Admin
Version: 1.0
Author: Guillem Andreu
Author URI: http://guillemandreu.com
Description: Some modifications to the WP-Admin
License: Proprietary - © 2013 Guillem Andreu
*/


/*
 * Reorder items on the admin menu
 */

function gp3_menu_order($menu_ord) {
	if (!$menu_ord) return true;
	return array(
		'index.php',                  // Dashboard Link
		'separator1',                 // Separator
		'edit.php?post_type=project', // Projects
		'edit.php?post_type=page',    // Pages
		'edit.php',                   // Posts
		'upload.php',                 // Media
		'edit-comments.php'           // Comments
	);
}

add_filter('custom_menu_order', 'gp3_menu_order');
add_filter('menu_order', 'gp3_menu_order');



/*
 * Hide the default “post” post type and comments from the menu, as well as the tools
 *
 * This just hides the menu item, there are still there if you use the correct url
 * And this does not remove the posts from the “right now” dashboard widget, I still need to figure out how to do that
 */

function gp3_remove_from_admin_menu() {
	remove_menu_page('edit.php');          // Hide default Posts
	remove_menu_page('edit-comments.php'); // Hide Comments
}

add_action('admin_menu','gp3_remove_from_admin_menu');



/*
 * Modifying the visual editor (simplify by removing icons I don't really use and reordering)
 */

function gp3_base_extended_editor_mce_buttons($buttons) {
	return array(
		'bold',
		'italic',
		'separator',
		'bullist',
		'numlist',
		'blockquote',
		'outdent',
		'indent',
		'separator',
		'formatselect',
		'separator',
		'link',
		'unlink',
		'separator',
		'wp_more',
		'separator',
		'undo',
		'redo',
		'separator',
		'pastetext',
		'removeformat',
		'separator',
		'fullscreen',
		'charmap',
	);
}

add_filter('mce_buttons', 'gp3_base_extended_editor_mce_buttons', 0);


function gp3_base_extended_editor_mce_buttons_2($buttons) {
	return array();
}

add_filter('mce_buttons_2', 'gp3_base_extended_editor_mce_buttons_2', 0);


function gp3_base_custom_mce_format($init) {
	$init['theme_advanced_blockformats'] = 'p,h2,h3,h4,h5,h6';
	return $init;
}

add_filter('tiny_mce_before_init', 'gp3_base_custom_mce_format');



/*
 * Different favicon for the WP-Admin
 */

function gp3_admin_favicon() {
	echo '<link rel="Shortcut Icon" type="image/x-icon" href="'. get_site_url() . '/content/mu-plugins/img/favicon-admin.ico" />';
}

add_action('admin_head', 'gp3_admin_favicon');



/*
 * WP-Admin footer text
 */

function gp3_admin_footer_text($default_text) {
	return '<span id="footer-thankyou">© 2010–' . date('Y') . ' <a href="http://guillemandreu.com">Guillem Andreu</a><span> | Managed with <a href="http://www.wordpress.org">WordPress</a></span></span>';
}

add_filter('admin_footer_text', 'gp3_admin_footer_text');



/*
 * Removing the WP logo and comments button from the admin bar
 */

function gp3_admin_bar() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_node('wp-logo');
	$wp_admin_bar->remove_node('comments');
}

add_action('wp_before_admin_bar_render', 'gp3_admin_bar');



/*
 * Removing “Screen Options” tab
 */

function gp3_remove_screen_options_tab() {
	return false;
}

add_filter('screen_options_show_screen', 'gp3_remove_screen_options_tab');



/*
 * Hability to use HTML on user descriptions
 */

remove_filter('pre_user_description', 'wp_filter_kses');