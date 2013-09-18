<?php
/*
Plugin Name: Relative Date Template Tag by InternetAlche.Me
Plugin URI: https://github.com/ericrallen/wp-relative-date-template-tag
Description: Add relative date template tags for retrieving how many seconds, minutes, hours, days, weeks, months, years, etc. ago a post was published
Version: 1.0.6
Author: Eric Allen
Author URI: http://internetalche.me/
License: MIT
*/

/*
--------------------------------------------------- Change Log -----------------------------------------------------

 + 2013-04-10  v1.0.5  Updated de-pluralize function to work correctly.

 + 2013-03-28  v1.0.2  First Release: Converted function to use an optional parameter array instead 
					of several variables. Updated Documentation.

 + 2013-03-27  v0.0.1  Plug-in created.

--------------------------------------------------------------------------------------------------------------------
*/

	//CLASSES

	//include plugin classes
	require_once(WP_PLUGIN_DIR . '/' . basename(dirname(__FILE__)) . '/assets/classes/iaRelativeDate.class.php');

	//TEMPLATE TAGS

	/*--------------------------------------------------------------------------
		
	get the relative date for the post
		$params = (optional) array of options for date display

		possible keys:
		'period' => (string) level of relativity to return (seconds, minutes, hours, days, weeks, months, years, decades, centuries, millenia)
		'suffix' => (string) what to append to returned string (default: 'ago') a space character [" "] is prepended automatically
		'id' => (int) post->ID to retrieve relative date for
		
	--------------------------------------------------------------------------*/

	function get_the_relative_date(array $params = null) {
		$relative_date = new ia_Relative_Date($params);
		return $relative_date->output;
	}

	/*--------------------------------------------------------------------------
		
	display the relative date
		$params = (optional) array of options for date display

		possible keys:
		'period' => (string) level of relativity to return (seconds, minutes, hours, days, weeks, months, years, decades, centuries, millenia)
		'suffix' => (string) what to append to returned string (default: 'ago') a space character [" "] is prepended automatically
		'id' => (int) post->ID to retrieve relative date for
		
	--------------------------------------------------------------------------*/

	function the_relative_date(array $params = null) {
		echo get_the_relative_date($params);
	}


?>