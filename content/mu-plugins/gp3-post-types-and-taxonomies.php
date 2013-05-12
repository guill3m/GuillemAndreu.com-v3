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
		'name'                  => __('Project types', 'gp3-ptt'),
		'singular_name'         => __('Project type', 'gp3-ptt'),
		'menu_name'             => __('Project types', 'gp3-ptt'),
		'all_items'             => __('All project types', 'gp3-ptt'),
		'edit_item'             => __('Edit project type', 'gp3-ptt'),
		'view_item'             => __('View project type', 'gp3-ptt'),
		'update_item'           => __('Update project type', 'gp3-ptt'),
		'add_new_item'          => __('Add new project type', 'gp3-ptt'),
		'new_item_name'         => __('New project type name', 'gp3-ptt'),
		'parent_item'           => __('Parent project type', 'gp3-ptt'),
		'parent_item_colon'     => __('Parent project type:', 'gp3-ptt'),
		'search_items'          => __('Search project types', 'gp3-ptt'),
		'popular_items'         => __('Popular project types', 'gp3-ptt'),
		'add_or_remove_items'   => __('Add or remove project types', 'gp3-ptt'),
		'choose_from_most_used' => __('Choose from most used project types', 'gp3-ptt'),
		'not_found'             => __('No project types found', 'gp3-ptt')
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
 * Add custom post types and custom taxonomies to the “right now” dashboard widget
 */

function gp3_add_to_right_now_widget() {
	/* Post Types */
	$post_types = get_post_types(array('_builtin' => false), 'objects');
	foreach ($post_types as $post_type) {
		if ($post_type->name == 'acf') continue; // Don0t show the Advanced Custom Fields plugin’s custom type
		$num_posts = wp_count_posts($post_type->name);
		$num = number_format_i18n($num_posts->publish);
		$text = _n($post_type->labels->singular_name, $post_type->labels->name, $num_posts->publish);
		if (current_user_can('edit_posts')) {
			$num = '<a href="edit.php?post_type=' . $post_type->name . '">' . $num . '</a>';
			$text = '<a href="edit.php?post_type=' . $post_type->name . '">' . $text . '</a>';
		}
		echo '<td class="first b b-' . $post_type->name . 's">' . $num . '</td>';
		echo '<td class="t ' . $post_type->name . 's">' . $text . '</td>';
		echo '</tr>';

		if ($num_posts->pending > 0) {
			$num = number_format_i18n($num_posts->pending);
			$text = _n($post_type->labels->singular_name . ' Pendiente', $post_type->labels->name . ' Pendientes', $num_posts->pending);
			if (current_user_can('edit_posts')) {
				$num = '<a href="edit.php?post_status=pending&post_type=' . $post_type->name . '">' . $num . '</a>';
				$text = '<a href="edit.php?post_status=pending&post_type=' . $post_type->name . '">' . $text . '</a>';
			}
			echo '<td class="first b b-' . $post_type->name . 's">' . $num . '</td>';
			echo '<td class="t ' . $post_type->name . 's">' . $text . '</td>';
			echo '</tr>';
		}
	}
	/* Taxonomies */
	$taxonomies = get_taxonomies(array('_builtin' => false), 'objects');
	foreach ($taxonomies as $taxonomy) {
		$num_terms = wp_count_terms($taxonomy->name);
		$num = number_format_i18n($num_terms);
		$text = _n($taxonomy->labels->singular_name, $taxonomy->labels->name, $num_terms);
		$associated_post_type = $taxonomy->object_type;
		if (current_user_can('manage_categories')) {
			$num = '<a href="edit-tags.php?taxonomy=' . $taxonomy->name . '&post_type=' . $associated_post_type[0] . '">' . $num . '</a>';
			$text = '<a href="edit-tags.php?taxonomy=' . $taxonomy->name . '&post_type=' . $associated_post_type[0] . '">' . $text . '</a>';
		}
		echo '<td class="first b b-' . $taxonomy->name . 's">' . $num . '</td>';
		echo '<td class="t ' . $taxonomy->name . 's">' . $text . '</td>';
		echo '</tr><tr>';
	}
}

add_action('right_now_content_table_end', 'gp3_add_to_right_now_widget');



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