<?php
/*
Plugin Name: GP3 Post Types & Taxonomies
Version: 1.0
Author: Guillem Andreu
Author URI: http://guillemandreu.com
Description: Custom post types and custom taxonomies
License: Proprietary - © 2013 Guillem Andreu
Text Domain: gp3-ptt
*/


/*
 * Plugin localization
 */

function gp3_post_types_and_taxonomies_lang() {
	load_plugin_textdomain('gp3-ptt', false, basename(dirname(__FILE__)) . '/lang');
}

add_action('plugins_loaded', 'gp3_post_types_and_taxonomies_lang');



/*
 * Custom post types
 */

function gp3_custom_post_types() {
	$project_labels = array(
		'name'               => __('Projects', 'gp3-ptt'),
		'singular_name'      => __('Project', 'gp3-ptt'),
		'menu_name'          => __('Projects', 'gp3-ptt'),
		'all_items'          => __('All projects', 'gp3-ptt'),
		'add_new'            => __('Add new', 'gp3-ptt'),
		'add_new_item'       => __('Add new project', 'gp3-ptt'),
		'edit'               => __('Edit', 'gp3-ptt'),
		'edit_item'          => __('Edit project', 'gp3-ptt'),
		'new_item'           => __('New project', 'gp3-ptt'),
		'view_item'          => __('View project', 'gp3-ptt'),
		'items_archive'      => __('Projects archive', 'gp3-ptt'),
		'search_items'       => __('Search projects', 'gp3-ptt'),
		'not_found'          => __('No projects found', 'gp3-ptt'),
		'not_found_in_trash' => __('No projects found in the trash', 'gp3-ptt')
	);
	$project_supports = array(
		'title',
		'editor',
		'thumbnail',
		'trackbacks',
		'custom-fields'
	);
	$project_rewrite = array(
		'slug'       => __('portfolio', 'gp3-ptt'),
		'with_front' => false,
		'feeds'      => false
	);
	$project_args = array(
		'labels'          => $project_labels,
		'description'     => __('Portfolio items', 'gp3-ptt'),
		'public'          => true,
		'menu_icon'       => basename(dirname(__FILE__)) . '/img/projects-icon.png',
		'capability_type' => 'post',
		'hierarchical'    => false,
		'supports'        => $project_supports,
		'has_archive'     => true,
		'rewrite'         => $project_rewrite,
		'can_export'      => true
	);
	register_post_type('project', $project_args);
}

add_action('init', 'gp3_custom_post_types');



/*
 * Custom post types messages
 */

function gp3_custom_post_types_messages($messages) {
	global $post, $post_ID;
	$messages['project'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf(__('Project updated. <a href="%s">View project</a>', 'gp3-ptt'), esc_url(get_permalink($post_ID))),
		2 => __('Custom field updated.', 'gp3-ptt'),
		3 => __('Custom field deleted.', 'gp3-ptt'),
		4 => __('Project updated.', 'gp3-ptt'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf(__('Project restored to revision from %s', 'gp3-ptt'), wp_post_revision_title((int) $_GET['revision'], false)) : false,
		6 => sprintf(__('Project published. <a href="%s">View project</a>', 'gp3-ptt'), esc_url(get_permalink($post_ID))),
		7 => __('Project saved.', 'gp3-ptt'),
		8 => sprintf(__('Project submitted. <a target="_blank" href="%s">Preview project</a>', 'gp3-ptt'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
		9 => sprintf(__('Project scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview project</a>', 'gp3-ptt'),
			// translators: Publish box date format, see http://php.net/date
			date_i18n(__('M j, Y @ G:i'), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
		10 => sprintf(__('Project draft updated. <a target="_blank" href="%s">Preview project</a>', 'gp3-ptt'), esc_url(add_query_arg( 'preview', 'true', get_permalink($post_ID)))),
	);
	return $messages;
}

add_filter( 'post_updated_messages', 'gp3_custom_post_types_messages');



/*
 * Custom taxonomies
 */

function gp3_custom_taxonomies() {
	$type_labels = array(
		'name'                  => __('Types', 'gp3-ptt'),
		'singular_name'         => __('Type', 'gp3-ptt'),
		'menu_name'             => __('Types', 'gp3-ptt'),
		'all_items'             => __('All types', 'gp3-ptt'),
		'edit_item'             => __('Edit type', 'gp3-ptt'),
		'view_item'             => __('View type', 'gp3-ptt'),
		'update_item'           => __('Update type', 'gp3-ptt'),
		'add_new_item'          => __('Add new type', 'gp3-ptt'),
		'new_item_name'         => __('New type name', 'gp3-ptt'),
		'parent_item'           => __('Parent type', 'gp3-ptt'),
		'parent_item_colon'     => __('Parent type:', 'gp3-ptt'),
		'search_items'          => __('Search types', 'gp3-ptt'),
		'popular_items'         => __('Popular types', 'gp3-ptt'),
		'add_or_remove_items'   => __('Add or remove types', 'gp3-ptt'),
		'choose_from_most_used' => __('Choose from most used types', 'gp3-ptt'),
		'not_found'             => __('No types found', 'gp3-ptt')
	);
	$type_rewrite = array(
		'slug'         => __('type', 'gp3-ptt'),
		'with_front'   => false,
		'hierarchical' => true
	);
	$type_args = array(
		'labels'            => $type_labels,
		'public'            => true,
		'show_admin_column' => true,
		'hierarchical'      => true,
		'rewrite'           => $type_rewrite,
		'sort'              => false
	);
	register_taxonomy('project-type', 'project', $type_args);
}

add_action('init', 'gp3_custom_taxonomies');