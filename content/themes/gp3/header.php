<?php
/**
 * @package WordPress
 * @subpackage GuillemAndreu.com
 * @since GuillemAndreu.com 3.0.0
 */
?>


<!DOCTYPE html>

<html <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />

		<title><?php wp_title('-', true, 'right'); ?></title>

		<link rel="author" href="http://guillemandreu.com/humans.txt" />

		<?php wp_head(); ?>

		<link rel="shortcut icon" href="http://guillemandreu.com/favicon.ico" sizes="16x16 32x32" type="image/x-icon" />
		<link rel="apple-touch-icon-precomposed" href="http://guillemandreu.com/touch-icon-iphone.png" />
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://guillemandreu.com/touch-icon-ipad.png" />
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://guillemandreu.com/touch-icon-iphone-retina.png" />
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://guillemandreu.com/touch-icon-ipad-retina.png" />
		<meta name="application-name" content="<?php bloginfo('name'); ?>" />
		<meta name="msapplication-TileColor" content="#fff" />
		<meta name="msapplication-TileImage" content="http://guillemandreu.com/tile-image.png" />

	</head>

	<body class="no-icons">

		<header id="header" class="header">
			<div class="wrapper">
				<div class="logo">
					<a href="<?php echo home_url('/'); ?>">
						<img src="<?php bloginfo('template_directory'); ?>/img/guillem-andreu.svg" alt="Guillem Andreu" id="logo" />
					</a>
				</div>
				<nav id="menu" class="menu">
					<a href="#" data-icon="menu" id="menu-switch" class="menu-switch"><?php _e('Menu', 'gp3') ?></a>
					<ul id="menu-list" class="menu-list"><!--
						--><li data-icon="work"><a href="<?php echo home_url('/') . __('portfolio', 'gp3') . '/'; ?>"><?php _e('Work', 'gp3') ?></a></li><!--
						--><li data-icon="bio"><a href="<?php echo home_url('/') . __('bio', 'gp3') . '/'; ?>"><?php _e('Bio', 'gp3') ?></a></li><!--
						--><li data-icon="contact"><a href="<?php echo home_url('/') . __('contact', 'gp3') . '/'; ?>"><?php _e('Contact', 'gp3') ?></a></li><!--
						--><li data-icon="lang" class="language-selector">
							<ul id="language-submenu" class="language-submenu"><?php the_msls(); ?></ul>
						</li>
					</ul>
				</nav>
			</div>
		</header>

		<div class="wrapper">