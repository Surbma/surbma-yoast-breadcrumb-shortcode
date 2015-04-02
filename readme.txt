=== Surbma - Yoast Breadcrumb Shortcode ===
Contributors: Surbma
Donate link: http://surbma.com/
Tags: yoast, shortcode, breadcrumb
Requires at least: 3.0
Tested up to: 4.1
Stable tag: 1.0.2
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A simple shortcode to include Yoast's breadcrumb function into WordPress.

== Description ==

A simple shortcode to include Yoast's breadcrumb function into WordPress. You have to install and activate the <a href="https://wordpress.org/plugins/wordpress-seo/" target="_blank">WordPress SEO by Yoast</a> plugin and enable breadcrumb option to use this shortcode.

With this shortcode you can put Yoast's fantastic breadcrumb feature manually into every post and page or even into custom post types. If your theme supports it, you can use this shortcode in your widget areas with the Text widget.

The shortcode:
`[yoast-breadcrumb]`

There are two parameters for this shortcode:

1. before - The code that your breadcrumb should be prefixed with. Default value: `<div class="breadcrumb" itemprop="breadcrumb">`
2. after - The code that should be added on the back of your breadcrumb. Default value: `</div>`

You can read more informations about Yoast's breadcrumb function here: <a href="https://yoast.com/wordpress/plugins/breadcrumbs/" target="_blank">Yoast Breadcrumbs – WordPress Breadcrumbs</a>

== Installation ==

1. Upload `surbma-yoast-breadcrumb-shortcode` folder to the `/wp-content/plugins/` directory
2. Activate the Surbma - Yoast's Breadcrumb Shortcode plugin through the 'Plugins' menu in WordPress
3. That's it. Now you can use the shortcode. :)

== Frequently Asked Questions ==

= What is Yoast Breadcrumb? =

You can read more informations about Yoast's breadcrumb function here: <a href="https://yoast.com/wordpress/plugins/breadcrumbs/" target="_blank">Yoast Breadcrumbs – WordPress Breadcrumbs</a>

= Can I customize the look of the breadcrumb? =

Yes, you can with css. The default class for this block is breadcrumb, but you can modify the prefix code, as you like.

= What does Surbma mean? =

It is the reverse version of my last name. ;)

== Changelog ==

= 1.0.2 =

- Fix localization.
- Prevent direct access to the plugin.

= 1.0.1 =

- Fixed typo.

= 1.0.0 =

- Initial release.
- Added localization.
- First commit to WordPress repo.