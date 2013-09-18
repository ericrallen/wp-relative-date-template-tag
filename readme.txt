=== Relative Date Template Tag ===
Contributors: ericrallen
Tags: template tag, relative date, dates
Requires at least: 3.5.0
Tested up to: 3.5.1
Stable tag: 1.0.6
License: MIT
License URI: http://opensource.org/licenses/mit-license.php

Gives developers two template tags for retrieving a relative date instead of an exact date for posts.

== Description ==

Adds `the_relative_date()` and `get_the_relative_date()` template tags to your arsenal of template tags.

These template tags will return the relative time passed since the post was published, like "12 hours ago" or "3 weeks ago."

Tag to Print Relative Time:

	<?php the_relative_date(); ?>

Tag to Retrieve Relative Time:

	<?php get_the_relative_date(); ?>

== Options ==

When calling either template tag you can pass a few optional parameters via an array to customize the value that is returned.

Example:

	<?php //print relative date as "X periods ago"
	//where periods is the largest time period that can be calculated for the current post where X >= 1
	the_relative_date(); ?>

Example:

	<?php //retrieve relative date as "X periods ago"
	//where periods is the largest time period that can be calculated for the current post where X >= 1
	get_the_relative_date(); ?>

Example:

	<?php //relative date args
	$params = array(
		'period' => 'minutes'
	);

	//get relative date as "X minutes ago"
	get_the_relative_date($params);

Example:

	$params = array(
		'period' => 'days',
		'suffix' => 'before now',
		'id' => 22
	);

	//prints relative date for post with ID 22 as "X days before now"
	the_relative_date($params);

== Relative Time ==

The template tags will return the time relative to the timezone set in Wordpress' General Settings and will return the largest time period that it can, unless the $period parameter is set. If the $period parameter is set, but the post wasn't posted at least 1 $period ago, the template tag will return the largest time period that it can calculate for the post.

Acceptable `'period'` values (the returned string will be de-pluralized if needed):

- `'seconds'`
- `'minutes'`
- `'hours'`
- `'days'`
- `'weeks'`
- `'months'`
- `'years'`
- `'decades'`
- `'centuries'`
- `'millenia'`

== Installation ==

1. Upload `wp-relative-date-template-tag` to your plug-in directory or install it from the Wordpress Plug-in Repository
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Change `the_date()` to the `the_relative_date()` wherever you would prefer the relative date to show up

== Frequently Asked Questions ==

Please use the Plug-in's [github page](https://github.com/ericrallen/wp-relative-date-template-tag/issues) for more information

== Changelog ==

= 1.0.5 =
 + Updated de-pluralize function to work correctly.

= 1.0.0 =
* First Release. Switched parameters to be an array instead of explicitly-defined parameters to make it easier for developers to only pass the values they need.

= 0.0.1 =
* Initial set up. Getting it ready for the WP Plug-in repo and github duality.

== Support ==

Please use the Plug-in's [github page](https://github.com/ericrallen/wp-relative-date-template-tag/issues) for reporting any issues or asking questions.