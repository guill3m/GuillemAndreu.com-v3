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
	wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js", false, null, true);
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
	// wp_register_script('footer', get_template_directory_uri() . "/js/footer.min.js", array('jquery'), $theme_version_number, true);
	// Page specific scripts
	wp_register_script('unslider', get_template_directory_uri() . "/js/src/unslider.js", array('jquery'), $theme_version_number, true);
	// Load generic scripts
	// wp_enqueue_script('footer');
	// Load page specific scripts
	if (is_front_page()) {
		wp_enqueue_script('unslider');
	}
}

add_action('wp_enqueue_scripts', 'gp3_js_enqueue', 13);



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