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
	// Enable post thumbnails
	add_theme_support('post-thumbnails', 'project');
	// Image sizes
	add_image_size('project-frontpage', 1440, 500, true);
	add_image_size('project-content', 1078, 9999);
	add_image_size('project-content-half', 539, 9999);
	add_image_size('project-thumbnail', 300, 200, true); // Remember to change to the final size when defined !!!
}

add_action('after_setup_theme', 'gp3_setup');



/*
 * Theme version number
 */

$theme = wp_get_theme();
$theme_version_number = $theme['Version'];



/*
 * Language Switcher
 */

function gp3_language_selector() {
	$languages = icl_get_languages('skip_missing=1');
	if (1 < count($languages)) : ?>
		<li data-icon="lang" class="language-selector">
			<a href="#"><?php _e('Language', 'gp3') ?></a>
			<ul class="language-submenu">
				<?php foreach($languages as $lang) : ?><li><a href="<?php echo $lang['url']; ?>" title="<?php echo $lang['native name']; ?>"><?php echo $lang['language code']; ?></a></li><?php endforeach; ?>
			</ul>
		</li>
	<?php endif;
}