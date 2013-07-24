<?php
/*
Plugin Name: GP3 Remove Crap
Version: 1.0
Author: Guillem Andreu
Author URI: http://guillemandreu.com
Description: Remove automatic Wordpress crap that I don't want
License: Proprietary - © 2013 Guillem Andreu
*/


/*
 * Removing unwanted crap from the head
 */

remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');



/*
 * Removing “width” & “height” attributes from images
 */

function gp3_remove_width_and_height_attribute($html) {
	$html = preg_replace('/(width|height)="\d*"\s/', "", $html);
	return $html;
}

add_filter('get_image_tag',        'gp3_remove_width_and_height_attribute', 10);
add_filter('image_send_to_editor', 'gp3_remove_width_and_height_attribute', 10);
add_filter('post_thumbnail_html',  'gp3_remove_width_and_height_attribute', 10);



/*
 * Removing the “read more” link jump, I find it anoying and confusing
 */

function gp3_remove_more_jump_link($link) {
	$link = preg_replace('|#more-[0-9]+|', '', $link);
	return $link;
}

add_filter('the_content_more_link', 'gp3_remove_more_jump_link');