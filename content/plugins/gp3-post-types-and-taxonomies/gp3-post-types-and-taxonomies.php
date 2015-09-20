<?php
/*
Plugin Name: GP3 Post Types & Taxonomies
Version: 1.1
Author: Guillem Andreu
Author URI: http://guillemandreu.com
Description: Custom post types and custom taxonomies
License: Proprietary - © 2013 Guillem Andreu
Text Domain: gp3ptt
*/


/*
 * Plugin localization
 */


$plugin_path = dirname(plugin_basename( __FILE__ )) . '/lang';
load_plugin_textdomain('gp3ptt', false, $plugin_path);



/*
 * Custom post types
 */

function gp3_custom_post_types() {
	$project_labels = array(
		'name'               => __('Projects', 'gp3ptt'),
		'singular_name'      => __('Project', 'gp3ptt'),
		'menu_name'          => __('Projects', 'gp3ptt'),
		'all_items'          => __('All projects', 'gp3ptt'),
		'add_new'            => __('Add new', 'gp3ptt'),
		'add_new_item'       => __('Add new project', 'gp3ptt'),
		'edit'               => __('Edit', 'gp3ptt'),
		'edit_item'          => __('Edit project', 'gp3ptt'),
		'new_item'           => __('New project', 'gp3ptt'),
		'view_item'          => __('View project', 'gp3ptt'),
		'items_archive'      => __('Projects archive', 'gp3ptt'),
		'search_items'       => __('Search projects', 'gp3ptt'),
		'not_found'          => __('No projects found', 'gp3ptt'),
		'not_found_in_trash' => __('No projects found in the trash', 'gp3ptt')
	);
	$project_supports = array(
		'title',
		'editor',
		'thumbnail',
		'custom-fields',
		'comments'
	);
	$project_rewrite = array(
		'slug'       => __('portfolio', 'gp3ptt'),
		'with_front' => false,
		'feeds'      => false
	);
	$project_args = array(
		'labels'          => $project_labels,
		'description'     => __('Portfolio items', 'gp3ptt'),
		'public'          => true,
		// 'menu_icon'       => basename(dirname(__FILE__)) . '/img/projects-icon.png',
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
		1 => sprintf(__('Project updated. <a href="%s">View project</a>', 'gp3ptt'), esc_url(get_permalink($post_ID))),
		2 => __('Custom field updated.', 'gp3ptt'),
		3 => __('Custom field deleted.', 'gp3ptt'),
		4 => __('Project updated.', 'gp3ptt'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf(__('Project restored to revision from %s', 'gp3ptt'), wp_post_revision_title((int) $_GET['revision'], false)) : false,
		6 => sprintf(__('Project published. <a href="%s">View project</a>', 'gp3ptt'), esc_url(get_permalink($post_ID))),
		7 => __('Project saved.', 'gp3ptt'),
		8 => sprintf(__('Project submitted. <a target="_blank" href="%s">Preview project</a>', 'gp3ptt'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
		9 => sprintf(__('Project scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview project</a>', 'gp3ptt'),
			// translators: Publish box date format, see http://php.net/date
			date_i18n(__('M j, Y @ G:i'), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
		10 => sprintf(__('Project draft updated. <a target="_blank" href="%s">Preview project</a>', 'gp3ptt'), esc_url(add_query_arg( 'preview', 'true', get_permalink($post_ID)))),
	);
	return $messages;
}

add_filter('post_updated_messages', 'gp3_custom_post_types_messages');



/*
 * Custom taxonomies
 */

function gp3_custom_taxonomies() {
	$type_labels = array(
		'name'                  => __('Project types', 'gp3ptt'),
		'singular_name'         => __('Project type', 'gp3ptt'),
		'menu_name'             => __('Project types', 'gp3ptt'),
		'all_items'             => __('All project types', 'gp3ptt'),
		'edit_item'             => __('Edit project type', 'gp3ptt'),
		'view_item'             => __('View project type', 'gp3ptt'),
		'update_item'           => __('Update project type', 'gp3ptt'),
		'add_new_item'          => __('Add new project type', 'gp3ptt'),
		'new_item_name'         => __('New project type name', 'gp3ptt'),
		'parent_item'           => __('Parent project type', 'gp3ptt'),
		'parent_item_colon'     => __('Parent project type:', 'gp3ptt'),
		'search_items'          => __('Search project types', 'gp3ptt'),
		'popular_items'         => __('Popular project types', 'gp3ptt'),
		'add_or_remove_items'   => __('Add or remove project types', 'gp3ptt'),
		'choose_from_most_used' => __('Choose from most used project types', 'gp3ptt'),
		'not_found'             => __('No project types found', 'gp3ptt')
	);
	$type_rewrite = array(
		'slug'         => __('portfolio-cat', 'gp3ptt'),
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



/*
 * Add custom post types to the “at a glance” dashboard widget
 */

function gp3_custom_post_types_to_at_a_glance_widget() {
	$post_types = get_post_types(array('_builtin' => false), 'objects');
	foreach ($post_types as $post_type) {
		if ($post_type->name == 'acf-field') continue; // Don’t show the Advanced Custom Fields plugin’s custom type
		if ($post_type->name == 'acf-field-group') continue; // Don’t show the Advanced Custom Fields plugin’s custom type
		$num_posts = wp_count_posts($post_type->name);
		$num = number_format_i18n($num_posts->publish);
		$text = _n($post_type->labels->singular_name, $post_type->labels->name, $num_posts->publish);
		if (current_user_can('edit_posts')) {
			echo '<li class="post-count"><a href="edit.php?post_type=' . $post_type->name . '">' . $num . ' ' . $text . '</a></li>';
		}
	}
}

add_action('dashboard_glance_items', 'gp3_custom_post_types_to_at_a_glance_widget');



/*
 * Hability to filter custom post types by custom taxonomies on the “all posts” admin page
 */

function gp3_taxonomy_filter_restrict_manage_posts() {
	global $typenow;
	$post_types = get_post_types(array('_builtin' => false));
	if (in_array($typenow, $post_types)) {
		$filters = get_object_taxonomies($typenow);
		foreach ($filters as $tax_slug) {
			$tax_obj = get_taxonomy($tax_slug);
			wp_dropdown_categories(array(
				'show_option_all' => $tax_obj->label,
				'taxonomy' => $tax_slug,
				'name' => $tax_obj->name,
				'orderby' => 'name',
				'selected' => $_GET[$tax_slug],
				'hierarchical' => $tax_obj->hierarchical,
				'show_count' => false,
				'hide_empty' => true
			));
		}
	}
}

add_action('restrict_manage_posts', 'gp3_taxonomy_filter_restrict_manage_posts');

function gp3_taxonomy_filter_post_type_request($query) {
	global $pagenow, $typenow;
	if ('edit.php' == $pagenow) {
		$filters = get_object_taxonomies($typenow);
		foreach ($filters as $tax_slug) {
			$var = &$query->query_vars[$tax_slug];
			if (isset($var)) {
				$term = get_term_by('id', $var, $tax_slug);
				$var = $term->slug;
			}
		}
	}
}

add_filter('parse_query', 'gp3_taxonomy_filter_post_type_request');
