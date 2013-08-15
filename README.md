# GuillemAndreu.com – V3

My professional website where I showcase my work. So, basically, this is a **web portfolio**. The CMS I’m using is [Wordpress](http://wordpress.org), this is just the theme, and maybe some plugins.

As it is also an element of my porfolio I thought it could be interesting to share the code and process.

**Feel free to use some bits of the code if it is useful to you,** that’s why I put the code here on GitHub. Or use all of it, I don’t really care if you copy it all (shame on you), but it will be best for you if you don’t just copy and try to understand what’s going on with the code, how it works, and make it suit better to your needs and not mine.


## Plugins I’m using

All the custom plugins I made for this are on the repo. This is the list of plugins that are not in the repo since I haven’t made, neither modified, them:

- [Advanced Custom Fields](http://www.advancedcustomfields.com) by [Elliot Condon](http://www.elliotcondon.com)
	- With *Flexible Content Field*, *Repeater Field*, and *Options Page* extensions.
- [Multisite Language Switcher](http://lloc.de/msls) by [Dennis Ploetner](http://lloc.de)
- [Wordpress SEO](http://yoast.com/wordpress/seo) by [Joost de Valk](http://yoast.com)
- [WP Retina 2x](http://www.meow.fr/wp-retina-2x-wordpress-plugin/) by [Jordy Meow](http://www.meow.fr/)


## Things about this repo to be aware of

- **I’m not supporting IE8-, only IE9+.** This is because the target of this website is most likely not going to be using that (stats from the current version prove that). Also, I want to play with some “modern” features and I don’t feel like using polyfills in this project right now. Maybe I’ll add support to IE8 in the future, but right now I’m more interested on keeping it lightweight and simple.

- **I’m using Wordpress as a CMS, without the “blog module”.** I don’t need that for the moment. If some day I want to start a blog under this domain and design, then, I’ll develop whatever I need for that (I’m using custom post types for the portfolio, so the blog part is still there untoched, I prefer to do it this way). Oh, by the way, I’ve changed the name of the content folder to just *content*, without the initial *wp-*, just because I can, it looks nicer also.