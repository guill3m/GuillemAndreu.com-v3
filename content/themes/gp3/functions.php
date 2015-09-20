<?php
/**
 * @package WordPress
 * @subpackage GuillemAndreu.com
 * @since GuillemAndreu.com 3.0.0
 */



/*
 * Theme setup
 */

// Localization
load_theme_textdomain('gp3', get_template_directory() . '/lang');

function gp3_setup(){
	// Enable post thumbnails
	add_theme_support('post-thumbnails', array('project'));
	// Image sizes (yes, a lot of breakpoints, and with retina too)
	// Front Page
	add_image_size('project-frontpage-xxxl', 1440, 500, true);
	add_image_size('project-frontpage-xxxl-2x', 2880, 1000, true);
	add_image_size('project-frontpage-xxl', 1280, 450, true);
	add_image_size('project-frontpage-xxl-2x', 2560, 900, true);
	add_image_size('project-frontpage-xl', 1099, 400, true);
	add_image_size('project-frontpage-xl-2x', 2198, 800, true);
	add_image_size('project-frontpage-l', 1010, 400, true);
	add_image_size('project-frontpage-l-2x', 2010, 800, true);
	add_image_size('project-frontpage-m', 899, 350, true);
	add_image_size('project-frontpage-m-2x', 1798, 700, true);
	add_image_size('project-frontpage-s', 770, 350, true);
	add_image_size('project-frontpage-s-2x', 1540, 700, true);
	add_image_size('project-frontpage-xs', 650, 300, true);
	add_image_size('project-frontpage-xs-2x', 1300, 600, true);
	add_image_size('project-frontpage-xxs', 580, 300, true);
	add_image_size('project-frontpage-xxs-2x', 1160, 600, true);
	add_image_size('project-frontpage-xxxs', 320, 200, true);
	add_image_size('project-frontpage-xxxs-2x', 640, 400, true);
	// Content
	add_image_size('project-content-xxxl', 1080, 9999);
	add_image_size('project-content-xxxl-2x', 2160, 9999);
	add_image_size('project-content-xxl', 959, 9999);
	add_image_size('project-content-xxl-2x', 1918, 9999);
	add_image_size('project-content-xl', 714, 9999);
	add_image_size('project-content-xl-2x', 1428, 9999);
	add_image_size('project-content-l', 657, 9999);
	add_image_size('project-content-l-2x', 1080, 9999);
	add_image_size('project-content-m', 899, 9999);
	add_image_size('project-content-m-2x', 1798, 9999);
	add_image_size('project-content-s', 770, 9999);
	add_image_size('project-content-s-2x', 1540, 9999);
	add_image_size('project-content-xs', 650, 9999);
	add_image_size('project-content-xs-2x', 1300, 9999);
	add_image_size('project-content-xxs', 580, 9999);
	add_image_size('project-content-xxs-2x', 1160, 9999);
	add_image_size('project-content-xxxs', 320, 9999);
	add_image_size('project-content-xxxs-2x', 640, 9999);
	// Content Half
	add_image_size('project-content-half-xxxl', 534, 9999);
	add_image_size('project-content-half-xxxl-2x', 1068, 9999);
	add_image_size('project-content-half-xxl', 474, 9999);
	add_image_size('project-content-half-xxl-2x', 948, 9999);
	add_image_size('project-content-half-xl', 351, 9999);
	add_image_size('project-content-half-xl-2x', 702, 9999);
	add_image_size('project-content-half-l', 323, 9999);
	add_image_size('project-content-half-l-2x', 646, 9999);
	add_image_size('project-content-half-m', 444, 9999);
	add_image_size('project-content-half-m-2x', 888, 9999);
	add_image_size('project-content-half-s', 379, 9999);
	add_image_size('project-content-half-s-2x', 758, 9999);
	// Project Thumbnail (there is no need to make this responsive)
	add_image_size('project-thumbnail', 335, 175, true);
}

add_action('after_setup_theme', 'gp3_setup');



/*
 * Theme version number
 */

$theme = wp_get_theme();
$theme_version_number = $theme['Version'];



/*
 * Options Page Title
 */

if(function_exists('acf_add_options_page')) {
	acf_add_options_page();
}
if(function_exists('acf_set_options_page_title')) {
	acf_set_options_page_title(__('Global Content', 'gp3'));
	acf_set_options_page_menu(__('Global Content', 'gp3'));
}



/*
 *  Register Custom Fields Groups
 */

// Global Content

register_field_group(array (
	'id' => 'acf_home-slide',
	'title' => __('Home Slide', 'gp3'),
	'fields' => array (
		array (
			'key' => 'field_51f48e6017897',
			'label' => __('Slide Items', 'gp3'),
			'name' => 'home_slide',
			'type' => 'repeater',
			'sub_fields' => array (
				array (
					'key' => 'field_51f48e6f17898',
					'label' => __('Project', 'gp3'),
					'name' => 'home_slide_item',
					'type' => 'post_object',
					'column_width' => '',
					'post_type' => array (
						0 => 'project',
					),
					'taxonomy' => array (
						0 => 'all',
					),
					'allow_null' => 0,
					'multiple' => 0,
				),
			),
			'row_min' => 0,
			'row_limit' => '',
			'layout' => 'row',
			'button_label' => __('Add Item', 'gp3'),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options',
				'order_no' => 0,
				'group_no' => 0,
			),
		),
	),
	'options' => array (
		'position' => 'normal',
		'layout' => 'default',
		'hide_on_screen' => array (
		),
	),
	'menu_order' => 0,
));

register_field_group(array (
	'id' => 'acf_home-quotes',
	'title' => __('Home Quotes', 'gp3'),
	'fields' => array (
		array (
			'key' => 'field_51f5620fb294b',
			'label' => __('Quotes', 'gp3'),
			'name' => 'home_quotes',
			'type' => 'repeater',
			'sub_fields' => array (
				array (
					'key' => 'field_51f56222b294c',
					'label' => __('Quote', 'gp3'),
					'name' => 'home_quote',
					'type' => 'textarea',
					'column_width' => 65,
					'default_value' => '',
					'formatting' => 'html',
				),
				array (
					'key' => 'field_51f56236b294d',
					'label' => __('Quote Author', 'gp3'),
					'name' => 'home_quote_author',
					'type' => 'text',
					'column_width' => 35,
					'default_value' => '',
					'formatting' => 'none',
				),
			),
			'row_min' => 0,
			'row_limit' => 2,
			'layout' => 'table',
			'button_label' => __('Add Quote', 'gp3'),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options',
				'order_no' => 0,
				'group_no' => 0,
			),
		),
	),
	'options' => array (
		'position' => 'normal',
		'layout' => 'default',
		'hide_on_screen' => array (
		),
	),
	'menu_order' => 1,
));

register_field_group(array (
	'id' => 'acf_social',
	'title' => __('Social', 'gp3'),
	'fields' => array (
		array (
			'key' => 'field_51f4978eebbc1',
			'label' => __('Social Links', 'gp3'),
			'name' => 'social_links',
			'type' => 'repeater',
			'sub_fields' => array (
				array (
					'key' => 'field_51f4979febbc2',
					'label' => __('Icon', 'gp3'),
					'name' => 'social_icon',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
				array (
					'key' => 'field_51f497aaebbc3',
					'label' => __('Name', 'gp3'),
					'name' => 'social_name',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
				array (
					'key' => 'field_51f497b1ebbc4',
					'label' => __('URL', 'gp3'),
					'name' => 'social_url',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
			),
			'row_min' => 0,
			'row_limit' => '',
			'layout' => 'row',
			'button_label' => __('Add Social Link', 'gp3'),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options',
				'order_no' => 0,
				'group_no' => 0,
			),
		),
	),
	'options' => array (
		'position' => 'normal',
		'layout' => 'default',
		'hide_on_screen' => array (
		),
	),
	'menu_order' => 2,
));

// Bio

register_field_group(array (
	'id' => 'acf_bio-basic-info',
	'title' => __('Bio Basic Info', 'gp3'),
	'fields' => array (
		array (
			'key' => 'field_51f482d677524',
			'label' => __('Name', 'gp3'),
			'name' => 'bio_name',
			'type' => 'text',
			'default_value' => '',
			'formatting' => 'none',
		),
		array (
			'key' => 'field_51f482e177525',
			'label' => __('Lastname', 'gp3'),
			'name' => 'bio_lastname',
			'type' => 'text',
			'default_value' => '',
			'formatting' => 'none',
		),
		array (
			'key' => 'field_51f482e977526',
			'label' => __('Picture', 'gp3'),
			'name' => 'bio_picture',
			'type' => 'image',
			'return_format' => 'url',
			'preview_size' => 'thumbnail',
			'library' => 'all',
		),
		array (
			'key' => 'field_51f482fb77527',
			'label' => __('Birthday', 'gp3'),
			'name' => 'bio_birthday',
			'type' => 'text',
			'default_value' => '',
			'formatting' => 'none',
		),
		array (
			'key' => 'field_51f4830f77528',
			'label' => __('Location', 'gp3'),
			'name' => 'bio_location',
			'type' => 'text',
			'default_value' => '',
			'formatting' => 'none',
		),
		array (
			'key' => 'field_51f4832177529',
			'label' => __('Country', 'gp3'),
			'name' => 'bio_country',
			'type' => 'text',
			'default_value' => '',
			'formatting' => 'none',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page-bio.php',
				'order_no' => 0,
				'group_no' => 0,
			),
		),
	),
	'options' => array (
		'position' => 'normal',
		'layout' => 'default',
		'hide_on_screen' => array (
		),
	),
	'menu_order' => 0,
));

register_field_group(array (
	'id' => 'acf_bio-cv',
	'title' => __('Bio CV', 'gp3'),
	'fields' => array (
		array (
			'key' => 'field_51f4838e2bd86',
			'label' => __('Experience', 'gp3'),
			'name' => 'bio_experience',
			'type' => 'repeater',
			'sub_fields' => array (
				array (
					'key' => 'field_51f483bb2bd87',
					'label' => __('Company', 'gp3'),
					'name' => 'bio_job_company',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
				array (
					'key' => 'field_51f483c82bd88',
					'label' => __('Company URL', 'gp3'),
					'name' => 'bio_job_company_url',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
				array (
					'key' => 'field_51f483de2bd89',
					'label' => __('Job Title', 'gp3'),
					'name' => 'bio_job_title',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
				array (
					'key' => 'field_51f483ed2bd8a',
					'label' => __('Job Description', 'gp3'),
					'name' => 'bio_job_description',
					'type' => 'textarea',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
				array (
					'key' => 'field_51f4843bcb27a',
					'label' => __('Started', 'gp3'),
					'name' => 'bio_job_lenght_from',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
				array (
					'key' => 'field_51f48442cb27b',
					'label' => __('Ended', 'gp3'),
					'name' => 'bio_job_lenght_ended',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
			),
			'row_min' => 0,
			'row_limit' => '',
			'layout' => 'row',
			'button_label' => __('Add Job', 'gp3'),
		),
		array (
			'key' => 'field_51f484b886052',
			'label' => __('Studies', 'gp3'),
			'name' => 'bio_studies',
			'type' => 'repeater',
			'sub_fields' => array (
				array (
					'key' => 'field_51f484b886055',
					'label' => __('Career', 'gp3'),
					'name' => 'bio_career_name',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
				array (
					'key' => 'field_51f484b886057',
					'label' => __('Career Center', 'gp3'),
					'name' => 'bio_career_center',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
				array (
					'key' => 'field_51f4852886059',
					'label' => __('Career Center URL', 'gp3'),
					'name' => 'bio_career_center_url',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
				array (
					'key' => 'field_51f484b886058',
					'label' => __('Year Ended', 'gp3'),
					'name' => 'bio_career_ended',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
			),
			'row_min' => 0,
			'row_limit' => '',
			'layout' => 'row',
			'button_label' => __('Add Studies', 'gp3'),
		),
		array (
			'key' => 'field_51f4856e8605a',
			'label' => __('Courses', 'gp3'),
			'name' => 'bio_courses',
			'type' => 'repeater',
			'sub_fields' => array (
				array (
					'key' => 'field_51f4856e8605b',
					'label' => __('Course', 'gp3'),
					'name' => 'bio_course_name',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
				array (
					'key' => 'field_51f4856e8605c',
					'label' => __('Course Center', 'gp3'),
					'name' => 'bio_course_center',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
				array (
					'key' => 'field_51f4856e8605d',
					'label' => __('Course Center URL', 'gp3'),
					'name' => 'bio_course_center_url',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
				array (
					'key' => 'field_51f4856e8605e',
					'label' => __('Course Lenght', 'gp3'),
					'name' => 'bio_course_lenght',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
				array (
					'key' => 'field_51f485ca8605f',
					'label' => __('Course Date', 'gp3'),
					'name' => 'bio_course_date',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
			),
			'row_min' => 0,
			'row_limit' => '',
			'layout' => 'row',
			'button_label' => __('Add Course', 'gp3'),
		),
		array (
			'key' => 'field_51f486a540ab2',
			'label' => __('Others', 'gp3'),
			'name' => 'bio_others',
			'type' => 'repeater',
			'sub_fields' => array (
				array (
					'key' => 'field_51f486a540ab3',
					'label' => __('Name', 'gp3'),
					'name' => 'bio_other_name',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
				array (
					'key' => 'field_51f486a540ab7',
					'label' => __('Description', 'gp3'),
					'name' => 'bio_other_description',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
			),
			'row_min' => 0,
			'row_limit' => '',
			'layout' => 'row',
			'button_label' => __('Add Other', 'gp3'),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page-bio.php',
				'order_no' => 0,
				'group_no' => 0,
			),
		),
	),
	'options' => array (
		'position' => 'normal',
		'layout' => 'default',
		'hide_on_screen' => array (
		),
	),
	'menu_order' => 1,
));

register_field_group(array (
	'id' => 'acf_bio-skills',
	'title' => __('Bio Skills', 'gp3'),
	'fields' => array (
		array (
			'key' => 'field_51f487335716f',
			'label' => __('Languages', 'gp3'),
			'name' => 'bio_languages',
			'type' => 'repeater',
			'sub_fields' => array (
				array (
					'key' => 'field_51f4874d57170',
					'label' => __('Language', 'gp3'),
					'name' => 'bio_language',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
				array (
					'key' => 'field_51f4876657171',
					'label' => __('Language Level', 'gp3'),
					'name' => 'bio_language_level',
					'type' => 'radio',
					'column_width' => '',
					'choices' => array (
						1 => 1,
						2 => 2,
						3 => 3,
						4 => 4,
						5 => 5,
					),
					'other_choice' => 0,
					'save_other_choice' => 0,
					'default_value' => '',
					'layout' => 'horizontal',
				),
				array (
					'key' => 'field_51f4878557172',
					'label' => __('Language Level (Title)', 'gp3'),
					'name' => 'bio_language_level_txt',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'html',
				),
			),
			'row_min' => 0,
			'row_limit' => '',
			'layout' => 'row',
			'button_label' => __('Add Language', 'gp3'),
		),
		array (
			'key' => 'field_51f488c3979dd',
			'label' => __('Skillset', 'gp3'),
			'name' => 'bio_skillset',
			'type' => 'repeater',
			'sub_fields' => array (
				array (
					'key' => 'field_51f488c3979de',
					'label' => __('Title', 'gp3'),
					'name' => 'bio_skillset_title',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
				array (
					'key' => 'field_51f48903979e1',
					'label' => __('Skills', 'gp3'),
					'name' => 'bio_skillset_skills',
					'type' => 'repeater',
					'column_width' => '',
					'sub_fields' => array (
						array (
							'key' => 'field_51f4892a979e2',
							'label' => __('Skill', 'gp3'),
							'name' => 'bio_skill',
							'type' => 'text',
							'column_width' => 50,
							'default_value' => '',
							'formatting' => 'none',
						),
						array (
							'key' => 'field_51f4894f979e3',
							'label' => __('Skill Level', 'gp3'),
							'name' => 'bio_skill_level',
							'type' => 'radio',
							'column_width' => 50,
							'choices' => array (
								1 => 1,
								2 => 2,
								3 => 3,
								4 => 4,
								5 => 5,
							),
							'other_choice' => 0,
							'save_other_choice' => 0,
							'default_value' => '',
							'layout' => 'horizontal',
						),
					),
					'row_min' => 0,
					'row_limit' => '',
					'layout' => 'table',
					'button_label' => __('Add Skill', 'gp3'),
				),
			),
			'row_min' => 0,
			'row_limit' => '',
			'layout' => 'row',
			'button_label' => __('Add Skillset', 'gp3'),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page-bio.php',
				'order_no' => 0,
				'group_no' => 0,
			),
		),
	),
	'options' => array (
		'position' => 'normal',
		'layout' => 'default',
		'hide_on_screen' => array (
		),
	),
	'menu_order' => 2,
));

// Project

register_field_group(array (
	'id' => 'acf_project-info',
	'title' => __('Project Info', 'gp3'),
	'fields' => array (
		array (
			'key' => 'field_51f4794d407b1',
			'label' => __('Subtitle', 'gp3'),
			'name' => 'project_subtitle',
			'type' => 'text',
			'default_value' => '',
			'formatting' => 'none',
		),
		array (
			'key' => 'field_51f4797e407b2',
			'label' => __('Date', 'gp3'),
			'name' => 'project_date',
			'type' => 'text',
			'default_value' => '',
			'formatting' => 'none',
		),
		array (
			'key' => 'field_51f47c9e33841',
			'label' => __('Client', 'gp3'),
			'name' => 'project_client',
			'type' => 'text',
			'default_value' => '',
			'formatting' => 'none',
		),
		array (
			'key' => 'field_51f47cca33842',
			'label' => __('Client URL', 'gp3'),
			'name' => 'project_client_url',
			'type' => 'text',
			'default_value' => '',
			'formatting' => 'none',
		),
		array (
			'key' => 'field_51f47d6a57b8b',
			'label' => __('Collaborator/s', 'gp3'),
			'name' => 'project_collab',
			'type' => 'text',
			'default_value' => '',
			'formatting' => 'html',
		),
		array (
			'key' => 'field_51f47d8d57b8c',
			'label' => __('Collaborators plural', 'gp3'),
			'name' => 'project_collab_plural',
			'type' => 'true_false',
			'message' => __('Are there more than one collaborators for this project?', 'gp3'),
			'default_value' => 0,
		),
		array (
			'key' => 'field_51f6b02928e58',
			'label' => __('Extra', 'gp3'),
			'name' => 'project_extra',
			'type' => 'repeater',
			'sub_fields' => array (
				array (
					'key' => 'field_51f6b03028e59',
					'label' => __('Title', 'gp3'),
					'name' => 'project_extra_title',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
				array (
					'key' => 'field_51f6b04e28e5a',
					'label' => __('Icon', 'gp3'),
					'name' => 'project_extra_icon',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
				array (
					'key' => 'field_51f6b05928e5b',
					'label' => __('Content', 'gp3'),
					'name' => 'project_extra_content',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'html',
				),
			),
			'row_min' => 0,
			'row_limit' => '',
			'layout' => 'row',
			'button_label' => __('Add Extra', 'gp3'),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'project',
				'order_no' => 0,
				'group_no' => 0,
			),
		),
	),
	'options' => array (
		'position' => 'normal',
		'layout' => 'default',
		'hide_on_screen' => array (
		),
	),
	'menu_order' => 0,
));

register_field_group(array (
	'id' => 'acf_project-content',
	'title' => __('Project Content', 'gp3'),
	'fields' => array (
		array (
			'key' => 'field_51f47df623860',
			'label' => __('Content', 'gp3'),
			'name' => 'project_content',
			'type' => 'flexible_content',
			'layouts' => array (
				array (
					'label' => __('IMG Full', 'gp3'),
					'name' => 'img_full',
					'display' => 'table',
					'sub_fields' => array (
						array (
							'key' => 'field_51f47e1d23861',
							'label' => __('IMG', 'gp3'),
							'name' => 'project_img',
							'type' => 'image',
							'column_width' => 50,
							'return_format' => 'id',
							'preview_size' => 'project-thumbnail',
							'library' => 'all',
						),
						array (
							'key' => 'field_51f47e5e23862',
							'label' => __('IMG Alt', 'gp3'),
							'name' => 'project_img_alt',
							'type' => 'text',
							'column_width' => 50,
							'default_value' => '',
							'formatting' => 'none',
						),
					),
				),
				array (
					'label' => __('IMG Half', 'gp3'),
					'name' => 'img_half',
					'display' => 'table',
					'sub_fields' => array (
						array (
							'key' => 'field_51f47e8523864',
							'label' => __('IMG', 'gp3'),
							'name' => 'project_img',
							'type' => 'image',
							'column_width' => 50,
							'return_format' => 'id',
							'preview_size' => 'project-thumbnail',
							'library' => 'all',
						),
						array (
							'key' => 'field_51f47e9723865',
							'label' => __('IMG Alt', 'gp3'),
							'name' => 'project_img_alt',
							'type' => 'text',
							'column_width' => 50,
							'default_value' => '',
							'formatting' => 'none',
						),
					),
				),
				array (
					'label' => __('Video', 'gp3'),
					'name' => 'video',
					'display' => 'table',
					'sub_fields' => array (
						array (
							'key' => 'field_51f47eb923867',
							'label' => __('Video ID (Vimeo)', 'gp3'),
							'name' => 'project_video_id',
							'type' => 'text',
							'column_width' => 50,
							'default_value' => '',
							'formatting' => 'none',
						),
						array (
							'key' => 'field_51f47ed523868',
							'label' => __('Aspect Ratio', 'gp3'),
							'name' => 'project_video_aspectratio',
							'type' => 'select',
							'column_width' => 50,
							'choices' => array (
								'16:9' => __('Widescreen (16:9)', 'gp3'),
								'5:4' => __('PAL (5:4)', 'gp3'),
							),
							'default_value' => __('16:9 : Widescreen (16:9)', 'gp3'),
							'allow_null' => 0,
							'multiple' => 0,
						),
					),
				),
				array (
					'label' => __('ISSUU', 'gp3'),
					'name' => 'issuu',
					'display' => 'table',
					'sub_fields' => array (
						array (
							'key' => 'field_51f47f382386a',
							'label' => __('ISSUU ID', 'gp3'),
							'name' => 'project_issuu_id',
							'type' => 'text',
							'column_width' => '',
							'default_value' => '',
							'formatting' => 'none',
						),
					),
				),
				array (
					'label' => __('Flash', 'gp3'),
					'name' => 'flash',
					'display' => 'table',
					'sub_fields' => array (
						array (
							'key' => 'field_51f47f5b2386c',
							'label' => __('File', 'gp3'),
							'name' => 'project_flash',
							'type' => 'file',
							'column_width' => 50,
							'return_format' => 'id',
							'library' => 'all',
						),
						array (
							'key' => 'field_51f47f9c2386f',
							'label' => __('Aspect Ratio', 'gp3'),
							'name' => 'project_flash_aspectratio',
							'type' => 'text',
							'instructions' => __('Aspect Ratio, number (Eg.: 16:9 is 1.77778)', 'gp3'),
							'column_width' => 50,
							'default_value' => '',
							'formatting' => 'none',
						),
					),
				),
			),
			'button_label' => __('Add Content', 'gp3'),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'project',
				'order_no' => 0,
				'group_no' => 0,
			),
		),
	),
	'options' => array (
		'position' => 'normal',
		'layout' => 'default',
		'hide_on_screen' => array (
		),
	),
	'menu_order' => 1,
));



/*
 * Load CSS, before the JS
 */

function gp3_css_enqueue() {
	global $theme_version_number;
	// Generic styles
	wp_register_style('style', get_template_directory_uri() . "/style.css", false, $theme_version_number, 'all');
	// Load generic styles
	wp_enqueue_style('style');
}

add_action('wp_enqueue_scripts', 'gp3_css_enqueue', 11);



/*
 * Loading jQuery from Google Hosted Libraries, on the footer, and not in the admin panel
 */

function gp3_jquery_enqueue() {
	wp_deregister_script('jquery');
	wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js", false, null, true);
	wp_enqueue_script('jquery');
}

if (!is_admin()) add_action('wp_enqueue_scripts', 'gp3_jquery_enqueue', 12);



/*
 * Loading the rest of the JS, after jQuery and CSS
 * (this will actually be compressed and minified on production, but I keep it separated for development)
 */

function gp3_js_enqueue() {
	global $theme_version_number;
	// Generic scripts
	wp_register_script('scripts', get_template_directory_uri() . "/js/scripts.js", array('jquery'), $theme_version_number, true);
	// Load generic scripts
	wp_enqueue_script('scripts');
}

add_action('wp_enqueue_scripts', 'gp3_js_enqueue', 13);



/*
 * Language Switcher Output
 */

function gp3_multisite_language_switcher_output($url, $link, $current) {
	if($current) {
		return sprintf(
			'<li class="current">%s</li>',
			$link->txt
		);
	} else {
		return sprintf(
			'<li><a href="%s" rel="alternate" hreflang="%s">%s</a></li>',
			$url,
			$link->txt,
			$link->txt
		);
	}
}

add_filter('msls_output_get', 'gp3_multisite_language_switcher_output', 10, 3);



/*
 * Archive page for project post type shows all posts in one page
 */

function gp3_show_all_projects_on_project_archive($query) {
	if ($query->is_post_type_archive('project') && $query->is_main_query()) {
		$query->set('posts_per_page', '-1');
	}
}

add_action('pre_get_posts', 'gp3_show_all_projects_on_project_archive');



/*
 * Change the Twitter Cards type for Wordpress SEO plugin
 */

function gp3_change_twitter_card_type() {
	return 'summary_large_image';
}

add_filter('wpseo_twitter_card_type', 'gp3_change_twitter_card_type', 20);
