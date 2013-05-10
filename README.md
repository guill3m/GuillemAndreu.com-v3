# GuillemAndreu.com

## Version 3

I'm redesigning my professional website where I showcase my work. So, basically, this is a web portfolio.

As it is also an element of my porfolio I thought it could be interesting to share the code and process. Feel free to use some bits of the code if it is useful to you. Look at the `.gitignore` to see the plugins (that are not custom made) I'm using.

The CMS I'm using is Wordpress, but this is not the usual folder structure for a Wordpress site, this structure makes more sense to me.


### Site structure

- `cms`
	- `wp-admin`
	- `wp-includes`
- `content` *(before `cms/wp-content`)*
	- `mu-plugins`
	- `plugins`
	- `themes`
- `lang` *(before `cms/wp-content/languages`)*
- `uploads` *(before `cms/wp-content/uploads`)*


#### wp-config.php

These are the lines I use on the `wp-config.php` to achieve that structure (easy):
```PHP
/**
 * Custom Wordpress folder structure
 */
define('WP_SITEURL',     'http://guillemandreu.com');
define('WP_HOME',        'http://guillemandreu.com/cms');
define('WP_CONTENT_DIR', $_SERVER['DOCUMENT_ROOT'] . '/content');
define('WP_PLUGIN_DIR',  $_SERVER['DOCUMENT_ROOT'] . '/content/plugins');
define('WP_LANG_DIR',    $_SERVER['DOCUMENT_ROOT'] . '/lang');
define('UPLOADS',        '/uploads');
```