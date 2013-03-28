wp-relative-date-template-tag
=============================

Coming soon to the Wordpress Plug-in Repository:

Using relative dates in WordPress templates instead of the post_date

Adds functionality for 2 template tags:  `the_relative_date()` and `get_the_relative_date()` to WordPress

These functions essentially work like the `the_date()` and `get_the_date()` template tags.

###Options

Each tag supports 3 completely optional parameters to allow developers to customize the returned value:

1. `$period` - What to return relative time in:  seconds, minutes, hours, days, weeks, months, years, decades, centuries, millenia
2. `$suffix` - What to append to the returned value (default is 'ago'). A space will automatically be inserted between the period and the suffix.
3. `$id` - If you need to pull in the relative date for a post that isn't the current post, pass it's ID into the template tag.

###Examples

Display relative date for specific post as "days before now":

	<?php //relative date vars for specific post
	$period = 'weeks';
	$suffix = 'before now';
	$id = 22;
	
	//display relative date for post $id
	$the_relative_date($period, $suffix, $id); ?>

Retrieve relative date for specific post as "seconds ago":

	<?php get_the_relative_date('seconds', '', 22); ?>

Display relative date for current post as n time intervals ago (where time intervals is equal to the largest time period that can calculated for the current post):

	<?php the_relative_date(); ?>