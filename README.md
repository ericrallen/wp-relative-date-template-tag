wp-relative-date-template-tag
=============================

Coming soon to the Wordpress Plug-in Repository.

Using relative dates in WordPress templates instead of the post_date

Adds functionality for 2 template tags:  `the_relative_date()` and `get_the_relative_date()` to WordPress

These functions essentially work like the `the_date()` and `get_the_date()` template tags.

###Options

Each tag supports an array of completely optional parameters to allow developers to customize the returned value:

1. `period` - What to return relative time in, this will be de-pluralized automatically if necessary: (string) default is largest period that can be calulated >= 1 [acceptable values: 'seconds', 'minutes', 'hours', 'days', 'weeks', 'months', 'years', 'decades', 'centuries', 'millenia'
2. `suffix` - What to append to the returned value, a space character [" "] will be prepended automatically: (string) default is 'ago'
3. `id` - Send a post ID to retrieve the relative date outside of a WordPress loop or to retrieve the relative date of another post inside a Wordpress loop: (int) default is `null`

###Examples

Display relative date for specific post as "days before now":

	<?php //relative date vars for specific post
	$args = array(
		'period' => 'weeks',
		'suffix' => 'before now',
		'id' => 22
	);
	
	//display relative date for post $id
	$the_relative_date($args); ?>

Retrieve relative date for specific post as "seconds ago":

	<?php //relative date vars for specific post
	$args = array(
		'period' => 'seconds',
		'id' => 22
	);
	
	//retrieve relative date for post in seconds
	get_the_relative_date($args); ?>

Display relative date for current post as `n` time periods ago (where time periods is equal to the largest time period that can calculated for the current post with `n >= 1`):

	<?php the_relative_date(); ?>