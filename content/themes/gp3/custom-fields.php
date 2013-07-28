<?php
/**
 * @package WordPress
 * @subpackage GuillemAndreu.com
 * @since GuillemAndreu.com 3.0.0
 */



/*
 * Options Page Title
 */

acf_set_options_page_title(__('Theme Options'));
acf_set_options_page_menu(__('Theme Options'));



/*
 *  Register Field Groups
 */

// Theme Options

register_field_group(array (
	'id' => 'acf_home-slide',
	'title' => 'Home Slide',
	'fields' => array (
		array (
			'key' => 'field_51f48e6017897',
			'label' => 'Slide Items',
			'name' => 'home_slide',
			'type' => 'repeater',
			'sub_fields' => array (
				array (
					'key' => 'field_51f48e6f17898',
					'label' => 'Project',
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
			'button_label' => 'Add Item',
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
	'id' => 'acf_social',
	'title' => 'Social',
	'fields' => array (
		array (
			'key' => 'field_51f4978eebbc1',
			'label' => 'Social Links',
			'name' => 'social_links',
			'type' => 'repeater',
			'sub_fields' => array (
				array (
					'key' => 'field_51f4979febbc2',
					'label' => 'Icon',
					'name' => 'social_icon',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
				array (
					'key' => 'field_51f497aaebbc3',
					'label' => 'Name',
					'name' => 'social_name',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
				array (
					'key' => 'field_51f497b1ebbc4',
					'label' => 'URL',
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
			'button_label' => 'Add Link',
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

// Bio

register_field_group(array (
	'id' => 'acf_bio-basic-info',
	'title' => 'Bio Basic Info',
	'fields' => array (
		array (
			'key' => 'field_51f482d677524',
			'label' => 'Name',
			'name' => 'bio_name',
			'type' => 'text',
			'default_value' => '',
			'formatting' => 'none',
		),
		array (
			'key' => 'field_51f482e177525',
			'label' => 'Lastname',
			'name' => 'bio_lastname',
			'type' => 'text',
			'default_value' => '',
			'formatting' => 'none',
		),
		array (
			'key' => 'field_51f482e977526',
			'label' => 'Picture',
			'name' => 'bio_picture',
			'type' => 'image',
			'save_format' => 'url',
			'preview_size' => 'thumbnail',
			'library' => 'all',
		),
		array (
			'key' => 'field_51f482fb77527',
			'label' => 'Birthday',
			'name' => 'bio_birthday',
			'type' => 'text',
			'default_value' => '',
			'formatting' => 'none',
		),
		array (
			'key' => 'field_51f4830f77528',
			'label' => 'Location',
			'name' => 'bio_location',
			'type' => 'text',
			'default_value' => '',
			'formatting' => 'none',
		),
		array (
			'key' => 'field_51f4832177529',
			'label' => 'Country',
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
	'title' => 'Bio CV',
	'fields' => array (
		array (
			'key' => 'field_51f4838e2bd86',
			'label' => 'Experience',
			'name' => 'bio_experience',
			'type' => 'repeater',
			'sub_fields' => array (
				array (
					'key' => 'field_51f483bb2bd87',
					'label' => 'Company',
					'name' => 'bio_job_company',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
				array (
					'key' => 'field_51f483c82bd88',
					'label' => 'Company URL',
					'name' => 'bio_job_company_url',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
				array (
					'key' => 'field_51f483de2bd89',
					'label' => 'Job Title',
					'name' => 'bio_job_title',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
				array (
					'key' => 'field_51f483ed2bd8a',
					'label' => 'Job Description',
					'name' => 'bio_job_description',
					'type' => 'textarea',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
				array (
					'key' => 'field_51f4843bcb27a',
					'label' => 'Started',
					'name' => 'bio_job_lenght_from',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
				array (
					'key' => 'field_51f48442cb27b',
					'label' => 'Ended',
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
			'button_label' => 'Add Job',
		),
		array (
			'key' => 'field_51f484b886052',
			'label' => 'Studies',
			'name' => 'bio_studies',
			'type' => 'repeater',
			'sub_fields' => array (
				array (
					'key' => 'field_51f484b886055',
					'label' => 'Career',
					'name' => 'bio_career_name',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
				array (
					'key' => 'field_51f484b886057',
					'label' => 'Career Center',
					'name' => 'bio_career_center',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
				array (
					'key' => 'field_51f4852886059',
					'label' => 'Career Center URL',
					'name' => 'bio_career_center_url',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
				array (
					'key' => 'field_51f484b886058',
					'label' => 'Year Ended',
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
			'button_label' => 'Add Studies',
		),
		array (
			'key' => 'field_51f4856e8605a',
			'label' => 'Courses',
			'name' => 'bio_courses',
			'type' => 'repeater',
			'sub_fields' => array (
				array (
					'key' => 'field_51f4856e8605b',
					'label' => 'Course',
					'name' => 'bio_course_name',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
				array (
					'key' => 'field_51f4856e8605c',
					'label' => 'Course Center',
					'name' => 'bio_course_center',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
				array (
					'key' => 'field_51f4856e8605d',
					'label' => 'Course Center URL',
					'name' => 'bio_course_center_url',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
				array (
					'key' => 'field_51f4856e8605e',
					'label' => 'Course Lenght',
					'name' => 'bio_course_lenght',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
				array (
					'key' => 'field_51f485ca8605f',
					'label' => 'Course Date',
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
			'button_label' => 'Add Course',
		),
		array (
			'key' => 'field_51f486a540ab2',
			'label' => 'Others',
			'name' => 'bio_others',
			'type' => 'repeater',
			'sub_fields' => array (
				array (
					'key' => 'field_51f486a540ab3',
					'label' => 'Name',
					'name' => 'bio_other_name',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
				array (
					'key' => 'field_51f486a540ab7',
					'label' => 'Description',
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
			'button_label' => 'Add Other',
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
	'title' => 'Bio Skills',
	'fields' => array (
		array (
			'key' => 'field_51f487335716f',
			'label' => 'Languages',
			'name' => 'bio_languages',
			'type' => 'repeater',
			'sub_fields' => array (
				array (
					'key' => 'field_51f4874d57170',
					'label' => 'Language',
					'name' => 'bio_language',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
				array (
					'key' => 'field_51f4876657171',
					'label' => 'Language Level',
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
					'label' => 'Language Level (Title)',
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
			'button_label' => 'Add Language',
		),
		array (
			'key' => 'field_51f488c3979dd',
			'label' => 'Skillset',
			'name' => 'bio_skillset',
			'type' => 'repeater',
			'sub_fields' => array (
				array (
					'key' => 'field_51f488c3979de',
					'label' => 'Title',
					'name' => 'bio_skillset_title',
					'type' => 'text',
					'column_width' => '',
					'default_value' => '',
					'formatting' => 'none',
				),
				array (
					'key' => 'field_51f48903979e1',
					'label' => 'Skills',
					'name' => 'bio_skillset_skills',
					'type' => 'repeater',
					'column_width' => '',
					'sub_fields' => array (
						array (
							'key' => 'field_51f4892a979e2',
							'label' => 'Skill',
							'name' => 'bio_skill',
							'type' => 'text',
							'column_width' => 50,
							'default_value' => '',
							'formatting' => 'none',
						),
						array (
							'key' => 'field_51f4894f979e3',
							'label' => 'Skill Level',
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
					'button_label' => 'Add Skill',
				),
			),
			'row_min' => 0,
			'row_limit' => '',
			'layout' => 'row',
			'button_label' => 'Add Skillset',
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
	'title' => 'Project Info',
	'fields' => array (
		array (
			'key' => 'field_51f4794d407b1',
			'label' => 'Subtitle',
			'name' => 'project_subtitle',
			'type' => 'text',
			'default_value' => '',
			'formatting' => 'none',
		),
		array (
			'key' => 'field_51f4797e407b2',
			'label' => 'Date',
			'name' => 'project_date',
			'type' => 'text',
			'default_value' => '',
			'formatting' => 'none',
		),
		array (
			'key' => 'field_51f47c9e33841',
			'label' => 'Client',
			'name' => 'project_client',
			'type' => 'text',
			'default_value' => '',
			'formatting' => 'none',
		),
		array (
			'key' => 'field_51f47cca33842',
			'label' => 'Client URL',
			'name' => 'project_client_url',
			'type' => 'text',
			'default_value' => '',
			'formatting' => 'none',
		),
		array (
			'key' => 'field_51f47d6a57b8b',
			'label' => 'Collaborator/s',
			'name' => 'project_collab',
			'type' => 'text',
			'default_value' => '',
			'formatting' => 'html',
		),
		array (
			'key' => 'field_51f47d8d57b8c',
			'label' => 'Collaborators plural',
			'name' => 'project_collab_plural',
			'type' => 'true_false',
			'message' => 'Are there more than one collaborators on this project?',
			'default_value' => 0,
		),
		array (
			'key' => 'field_51f47ced33843',
			'label' => 'Extra',
			'name' => 'project_extra',
			'type' => 'text',
			'default_value' => '',
			'formatting' => 'html',
		),
		array (
			'key' => 'field_51f47cfc33844',
			'label' => 'Extra Icon',
			'name' => 'project_extra_icon',
			'type' => 'text',
			'default_value' => '',
			'formatting' => 'none',
		),
		array (
			'key' => 'field_51f47d3957b89',
			'label' => 'Extra 2',
			'name' => 'project_extra_2',
			'type' => 'text',
			'default_value' => '',
			'formatting' => 'html',
		),
		array (
			'key' => 'field_51f47d5257b8a',
			'label' => 'Extra 2 Icon',
			'name' => 'project_extra_2_icon',
			'type' => 'text',
			'default_value' => '',
			'formatting' => 'html',
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
	'title' => 'Project Content',
	'fields' => array (
		array (
			'key' => 'field_51f47df623860',
			'label' => 'Content',
			'name' => 'project_content',
			'type' => 'flexible_content',
			'layouts' => array (
				array (
					'label' => 'IMG Full',
					'name' => 'img_full',
					'display' => 'table',
					'sub_fields' => array (
						array (
							'key' => 'field_51f47e1d23861',
							'label' => 'IMG',
							'name' => 'project_img',
							'type' => 'image',
							'column_width' => 50,
							'save_format' => 'id',
							'preview_size' => 'project-thumbnail',
							'library' => 'all',
						),
						array (
							'key' => 'field_51f47e5e23862',
							'label' => 'IMG Alt',
							'name' => 'project_img_alt',
							'type' => 'text',
							'column_width' => 50,
							'default_value' => '',
							'formatting' => 'none',
						),
					),
				),
				array (
					'label' => 'IMG Half',
					'name' => 'img_half',
					'display' => 'table',
					'sub_fields' => array (
						array (
							'key' => 'field_51f47e8523864',
							'label' => 'IMG',
							'name' => 'project_img',
							'type' => 'image',
							'column_width' => 50,
							'save_format' => 'id',
							'preview_size' => 'project-thumbnail',
							'library' => 'all',
						),
						array (
							'key' => 'field_51f47e9723865',
							'label' => 'IMG Alt',
							'name' => 'project_img_alt',
							'type' => 'text',
							'column_width' => 50,
							'default_value' => '',
							'formatting' => 'none',
						),
					),
				),
				array (
					'label' => 'Video',
					'name' => 'video',
					'display' => 'table',
					'sub_fields' => array (
						array (
							'key' => 'field_51f47eb923867',
							'label' => 'Video ID (Vimeo)',
							'name' => 'project_video_id',
							'type' => 'text',
							'column_width' => 50,
							'default_value' => '',
							'formatting' => 'none',
						),
						array (
							'key' => 'field_51f47ed523868',
							'label' => 'Aspect Ratio',
							'name' => 'project_video_aspectratio',
							'type' => 'select',
							'column_width' => 50,
							'choices' => array (
								'16:9' => 'Widescreen (16:9)',
								'5:4' => 'PAL (5:4)',
							),
							'default_value' => '16:9 : Widescreen (16:9)',
							'allow_null' => 0,
							'multiple' => 0,
						),
					),
				),
				array (
					'label' => 'ISSUU',
					'name' => 'issuu',
					'display' => 'table',
					'sub_fields' => array (
						array (
							'key' => 'field_51f47f382386a',
							'label' => 'ISSUU ID',
							'name' => 'project_issuu_id',
							'type' => 'text',
							'column_width' => '',
							'default_value' => '',
							'formatting' => 'none',
						),
					),
				),
				array (
					'label' => 'Flash',
					'name' => 'flash',
					'display' => 'table',
					'sub_fields' => array (
						array (
							'key' => 'field_51f47f5b2386c',
							'label' => 'File',
							'name' => 'project_flash',
							'type' => 'file',
							'column_width' => 50,
							'save_format' => 'id',
							'library' => 'all',
						),
						array (
							'key' => 'field_51f47f9c2386f',
							'label' => 'Aspect Ratio',
							'name' => 'project_flash_aspectratio',
							'type' => 'text',
							'instructions' => 'Aspect Ratio in number (Eg.: 16:9 would be 1.77778)',
							'column_width' => 50,
							'default_value' => '',
							'formatting' => 'none',
						),
					),
				),
			),
			'button_label' => 'Add Content',
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
