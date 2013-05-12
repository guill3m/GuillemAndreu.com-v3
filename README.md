# GuillemAndreu.com – V3

I’m redesigning my professional website where I showcase my work. So, basically, this is a web portfolio.

As it is also an element of my porfolio I thought it could be interesting to share the code and process.

Feel free to use some bits of the code if it is useful to you, that’s why I put the code here on GitHub. Or use all of it, I don’t really care if you copy it all (shame on you), but it will be best for you if you don’t just copy and try to understand what’s going on with the code, how it works, and make it suit better to your needs.

The CMS I’m using is [Wordpress](http://wordpress.org), but this is not the usual folder structure for a Wordpress site, this structure makes more sense to me.


## Site structure

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

These are the lines I use on the `wp-config.php` (it’s not on the repo, obviously) to achieve that structure:
```PHP
/**
 * Custom Wordpress folder structure
 */
define('WP_HOME',               'http://' . $_SERVER['HTTP_HOST']);
define('WP_SITEURL',            'http://' . $_SERVER['HTTP_HOST'] . '/cms');
define('WP_CONTENT_FOLDERNAME', 'content');
define('WP_CONTENT_DIR',        $_SERVER['DOCUMENT_ROOT'] . WP_CONTENT_FOLDERNAME);
define('WP_CONTENT_URL',        'http://' . $_SERVER['HTTP_HOST'] . WP_CONTENT_FOLDERNAME);
define('WP_LANG_DIR',           $_SERVER['DOCUMENT_ROOT'] . '/cms/lang');
define('WP_LANG_URL',           'http://' . $_SERVER['HTTP_HOST'] . '/cms/lang');
```


## Plugins I’m using

All the custom plugins I made for this are on the repo. This is the list of plugins that are not in the repo since I haven’t made, neither modified, them:

- [Advanced Custom Fields](http://www.advancedcustomfields.com) by [Elliot Condon](http://www.elliotcondon.com)
- [Advanced Custom Fields: qTranslate](http://github.com/funkjedi/acf-qtranslate) by [funkjedi](https://github.com/funkjedi)
- [qTranslate](http://www.qianqin.de/qtranslate) by [Qian Qin](http://www.qianqin.de)
- [Wordpress SEO](http://yoast.com/wordpress/seo) by [Joost de Valk](http://yoast.com)


## Things about this repo to be aware of

- **I’m not supporting IE8-, only IE9+.** This is because the target of this website is most likely not going to be using that (in the last year there where 9 visits from IE7 and 51 from IE8). Also, I want to play with some “modern” features and I don’t feel like using polyfills in this project right now. Maybe I’ll add support to IE8 in the future, but right now I’m more interested on keeping it simple.

- **I’m using Wordpress as a CMS, without the blog “module”.** I don’t need that for the moment. If some day I want to start a blog under this domain and design, then, I’ll develop whatever I need for that (I’m using custom post types for the portfolio, so the blog part is still there untoched).