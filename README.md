# GuillemAndreu.com

## Version 3

I'm redesigning my professional website where I showcase my work. So, basically, this is a web portfolio.

As it is also an element of my porfolio I thought it could be interesting to share the code and process. Feel free to use some bits of the code if it is useful to you. Look at the `.gitignore` to see the plugins (that are not custom made) I'm using.

The CMS I'm using is Wordpress, but this is not the usual folder structure for a Wordpress site, this structure makes more sense to me.


### Site structure

- `cms`
	- `lang` *(before `cms/wp-content/languages`)*
	- `wp-admin`
	- `wp-includes`
- `content` *(before `cms/wp-content`)*
	- `mu-plugins`
	- `plugins`
	- `themes`
	- `uploads`


#### wp-config.php

These are the lines I use on the `wp-config.php` (it's not on the repo, obviously) to achieve that structure:
```PHP
/**
 * Custom Wordpress folder structure
 */
define('WP_HOME',                'http://' . $_SERVER['HTTP_HOST']);
define('WP_SITEURL',             'http://' . $_SERVER['HTTP_HOST'] . '/cms');
define ('WP_CONTENT_FOLDERNAME', 'content');
define('WP_CONTENT_DIR',         $_SERVER['DOCUMENT_ROOT'] . WP_CONTENT_FOLDERNAME);
define('WP_CONTENT_URL',         'http://' . $_SERVER['HTTP_HOST'] . WP_CONTENT_FOLDERNAME);
define('WP_LANG_DIR',            $_SERVER['DOCUMENT_ROOT'] . '/cms/lang');
define('WP_LANG_URL',            'http://' . $_SERVER['HTTP_HOST'] . '/cms/lang');
```