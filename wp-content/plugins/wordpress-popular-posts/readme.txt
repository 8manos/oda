=== WordPress Popular Posts ===
Contributors: hcabrera
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=hcabrerab%40gmail%2ecom&lc=GB&item_name=WordPress%20Popular%20Posts%20Plugin&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG_global%2egif%3aNonHosted
Tags: popular, posts, widget, popularity, top
Requires at least: 3.8
Tested up to: 4.3
Stable tag: 3.3.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

WordPress Popular Posts is a highly customizable widget that displays the most popular posts on your blog.

== Description ==

WordPress Popular Posts is a highly customizable widget that displays the most popular posts on your blog.

= Main Features =
* **Multi-widget capable**. That is, you can have several widgets of WordPress Popular Posts on your blog - each with its own settings!
* **Time Range** - list those posts of your blog that have been the most popular ones within a specific time range (eg. last 24 hours, last 7 days, last 30 days, etc.)!
* **Custom Post-type support**. Wanna show other stuff than just posts and pages?
* Display a **thumbnail** of your posts! (*see the [FAQ section](http://wordpress.org/extend/plugins/wordpress-popular-posts/faq/) for technical requirements*).
* Use **your own layout**! Control how your most popular posts are shown on your theme.
* **WPML** support!
* **WordPress Multisite** support!

= Other Features =
* Check the **statistics** on your most popular posts from wp-admin.
* Order your popular list by comments, views (default) or average views per day!
* **Shortcode support** - use the [wpp] shortcode to showcase your most popular posts on pages, too! For usage and instructions, please refer to the [installation section](http://wordpress.org/extend/plugins/wordpress-popular-posts/installation/).
* **Template tags** - Don't feel like using widgets? No problem! You can still embed your most popular entries on your theme using the *wpp_get_mostpopular()* template tag. Additionally, the *wpp_gets_views()* template tag allows you to retrieve the views count for a particular post. For usage and instructions, please refer to the [installation section](http://wordpress.org/extend/plugins/wordpress-popular-posts/installation/).
* **Localizable** to your own language (*See the [FAQ section](http://wordpress.org/extend/plugins/wordpress-popular-posts/faq/) for more info*).
* **[WP-PostRatings](http://wordpress.org/extend/plugins/wp-postratings/) support**. Show your visitors how your readers are rating your posts!

= Notices =
* Starting version 3.0.0, the way plugin tracks views count switched back to [AJAX](http://codex.wordpress.org/AJAX). The reason for this change is to prevent bots / spiders from inflating views count, so if you're using a caching plugin you should clear its cache after installing / upgrading the WordPress Popular Posts plugin so it can track your posts and pages normally.

**WordPress Popular Posts** is now also on [GitHub](https://github.com/cabrerahector/wordpress-popular-posts)!

== Installation ==

1. Download the plugin and extract its contents.
2. Upload the `wordpress-popular-posts` folder to the `/wp-content/plugins/` directory.
3. Activate **WordPress Popular Posts** plugin through the "Plugins" menu in WordPress.
4. In your admin console, go to Appearance > Widgets, drag the WordPress Popular Posts widget to wherever you want it to be and click on Save.
5. If you have a caching plugin installed on your site, flush its cache now so WPP can start tracking your site.
6. Go to Appearance > Editor. On "Theme Files", click on `header.php` and make sure that the `<?php wp_head(); ?>` tag is present (should be right before the closing `</head>` tag).
7. (optional, but recommended for large / high traffic sites) Enabling [Data Sampling](https://github.com/cabrerahector/wordpress-popular-posts/wiki/7.-Performance#data-sampling) and/or [Caching](https://github.com/cabrerahector/wordpress-popular-posts/wiki/7.-Performance#caching) is recommended. Check [here](https://github.com/cabrerahector/wordpress-popular-posts/wiki/7.-Performance) for more.

That's it!

= USAGE =

WordPress Popular Posts can be used in three different ways:

1. As a [widget](http://codex.wordpress.org/WordPress_Widgets), simply drag and drop it into your theme's sidebar and configure it.
2. As a template tag, you can place it anywhere on your theme with [wpp_get_mostpopular()](https://github.com/cabrerahector/wordpress-popular-posts/wiki/2.-Template-tags#wpp_get_mostpopular).
3. Via [shortcode](https://github.com/cabrerahector/wordpress-popular-posts/wiki/1.-Using-WPP-on-posts-&-pages), so you can embed it inside a post or a page.

Make sure to stop by the **[Wiki](https://github.com/cabrerahector/wordpress-popular-posts/wiki)** as well, you'll find even more info there!

== Frequently Asked Questions ==

The [FAQ section](https://github.com/cabrerahector/wordpress-popular-posts/wiki/5.-FAQ) is now hosted at [WPP's Github repo](https://github.com/cabrerahector/wordpress-popular-posts/).

== Screenshots ==

1. Widgets Control Panel.
2. WordPress Popular Posts Widget.
3. WordPress Popular Posts Widget on theme's sidebar.
4. WordPress Popular Posts Stats panel.

== Changelog ==
= 3.3.1 =
- Fixes undefined index notice.
- Makes sure legacy tables are deleted on plugin upgrade.

= 3.3.0 =
- Adds the ability to limit the amount of data logged by WPP (see Settings > WordPress Popular Posts > Tools for more).
- Adds Polylang support (thanks, [@Chouby](https://github.com/Chouby)!)
- Removes post data from DB on deletion.
- Fixes whitespaces from post_type argument (thanks, [@getdave](https://github.com/getdave)!)
- WPP now handles SSL detection for images.
- Removes legacy datacache and datacache_backup tables.
- Adds Settings page advertisement support.
- FAQ section has been moved over to Github.

= 3.2.3 =
**If you're using a caching plugin, flushing its cache after installing / upgrading to this version is highly recommended.**

- Fixes a potential bug that might affect other plugins & themes (thanks @pippinsplugins).
- Defines INNODB as default storage engine.
- Adds the wpp-no-data CSS class to style the "Sorry, no data so far" message.
- Adds a new index to summary table.
- Updates plugin's documentation.
- Other small bug fixes and improvements.

= 3.2.2 =
**If you're using a caching plugin, flushing its cache after installing / upgrading to this version is recommended.**

* Moves sampling logic into Javascript (thanks, [@kurtpayne](https://github.com/kurtpayne)!)
* Simplifies category filtering logic.
* Fixes list sorting issue that some users were experimenting (thanks, sponker!)
* Widget uses stock thumbnails when using predefined size (some conditions apply).
* Adds the ability to enable / disable responsive support for thumbails.
* Renames wpp_update_views action hook to wpp_post_update_views, **update your code!**
* Adds wpp_pre_update_views action hook.
* Adds filter wpp_render_image.
* Drops support for get_mostpopular() template tag.
* Fixes empty HTML tags (thumbnail, stats).
* Removes Japanese, French and Norwegian Bokmal translation files from plugin.
* Many minor bug fixes / enhancements.

= 3.2.1 =
* Fixes missing HTML decoding for custom HTML in widget.
* Puts LIMIT clause back to the outer query.

= 3.2.0 =
* Adds check for jQuery.
* Fixes invalid parameter in htmlspecialchars().
* Switches AJAX update to POST method.
* Removes href attribute from link when popular post is viewed.
* Removes unnecesary ORDER BY clause in views/comments subquery.
* Fixes Javascript console not working under IE8 (thanks, @[raphaelsaunier](https://github.com/raphaelsaunier)!)
* Fixes WPML compatibility bug storing post IDs as 0.
* Removes wpp-upload.js since it was no longer in use.
* Fixes undefined default thumbnail image (thanks, Lea Cohen!)
* Fixes rating parameter returning false value.
* Adds Data Sampling (thanks, @[kurtpayne](https://github.com/kurtpayne)!)
* Minor query optimizations.
* Adds {date} (thanks, @[matsuoshi](https://github.com/matsuoshi)!) and {thumb_img} tags to custom html.
* Adds minute time option for caching.
* Adds wpp_data_sampling filter.
* Removes jQuery's DOM ready hook for AJAX views update.
* Adds back missing GROUP BY clause.
* Removes unnecesary HTML decoding for custom HTML (thanks, Lea Cohen!)
* Translates category name when WPML is detected.
* Adds list of available thumbnail sizes to the widget.
* Other minor bugfixes and improvements.

= 3.1.1 =
* Adds check for exif extension availability.
* Rolls back check for user's default thumbnail.

See [full changelog](https://github.com/cabrerahector/wordpress-popular-posts/blob/master/changelog.md).

== Language support ==

All translations are community made: people who are nice enough to share their translations with me so I can distribute them with the plugin. If you spot an error, or feel like helping improve a translation, please check the [FAQ section](http://wordpress.org/plugins/wordpress-popular-posts/faq/ "FAQ section") for instructions.

* English (supported by Hector Cabrera).
* Spanish (supported by Hector Cabrera).
* German - 86% translated.

== Credits ==

* Flame graphic by freevector/Vecteezy.com.

== Upgrade Notice ==

= 3.2.3 =
If you're using a caching plugin, flushing its cache after upgrading is highly recommended.
