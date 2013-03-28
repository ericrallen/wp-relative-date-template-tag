<?php
/*
Plugin Name: Relative Date Template Tag by InternetAlche.Me
Plugin URI: https://github.com/ericrallen/wp-relative-date-template-tag
Description: Add relative date template tags for retrieving how many seconds, minutes, hours, days, weeks, months, years, etc. ago a post was published
Version: 0.0.1
Author: Eric Allen
Author URI: http://internetalche.me/
License: MIT
*/

/*
--------------------------------------------------- Change Log -----------------------------------------------------

 + 2012-08-07  v0.0.1  Plug-in created.

--------------------------------------------------------------------------------------------------------------------
*/

	//CLASSES

	//include plugin classes
	require_once(WP_PLUGIN_DIR . '/' . basename(dirname(__FILE__)) . '/assets/classes/iaRelativeDate.class.php');

	//TEMPLATE TAGS

	/*--------------------------------------------------------------------------
		
	get the relative date for the post
		$type = level of relativity to return (seconds, minutes, hours, etc.)
		$id = post->ID to return relative date for
		
	--------------------------------------------------------------------------*/

	function get_the_relative_date($period = null, $id = null, $suffix = null) {
		$relative_date = new ia_Relative_Date($period, $id, $suffix);
		return $relative_date->output;
	}

	/*--------------------------------------------------------------------------
		
	display the relative date
		$type = level of relativity to return (seconds, minutes, hours, etc.)
		$id = post->ID to return relative date for
		
	--------------------------------------------------------------------------*/

	function the_relative_date($period = null, $id = null, $suffix = null) {
		echo get_the_relative_date($period, $id, $suffix);
	}


?>