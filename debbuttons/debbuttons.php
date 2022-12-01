<?php
/*
Plugin Name: DebButtons
Plugin URI: http://debonairtraining.com
Description: The best WordPress button generator. This is the free version; the Pro version <a href="http://debonairtraining.com/?ref=mbfree">can be found here</a>.
Version: 9.4
Author: Abbas Umaru
Author URI: http://debonairtraining.com
Text Domain: DebButtons
Domain Path: /languages

Copyright 2022 Max Foundry, LLC (http://maxfoundry.com)
*/
namespace Debbuttons;

if (! defined('DEBBUTTONS_ROOT_FILE'))
	define("DEBBUTTONS_ROOT_FILE", __FILE__);
if (! defined('DEBBUTTONS_VERSION_NUM'))
	define('DEBBUTTONS_VERSION_NUM', '9.4');

define('DEBBUTTONS_RELEASE',"14 September 2022");

if (! function_exists('Debbuttons\debbutton_double_load'))
{
	function debbutton_double_load()
	{
		$message =  __("Already found an instance of DebButtons running. Please check if you are trying to activate two DebButtons plugins and deactivate one. ","debbuttons" );
		echo "<div class='error'><h4>$message</h4></div>";
		return;
	}
}

if (function_exists("DebButtons\MB"))
{
	add_action('admin_notices', 'DebButtons\debbutton_double_load');
	return;
}

if (! function_exists('DebButtons\debbuttons_php56_nono'))
{
	function debbuttons_php56_nono()
	{
		$message = sprintf( __("DebButtons requires at least PHP 7 . You are running version: %s ","debbuttons"), PHP_VERSION);
		echo"<div class='error'> <h4>$message</h4></div>";
		return;
	}
}
if ( version_compare(PHP_VERSION, '7', '<' ) ) {

	add_action( 'admin_notices', 'DebButtons\debbuttons_php56_nono' );
	return;
}

// In case of development, copy this to wp-config.php
// define("DEBBUTTONS_DEBUG", true);
// define("DEBBUTTONS_BENCHMARK",true);

require_once( trailingslashit(dirname(DEBBUTTONS_ROOT_FILE)) . "classes/debbuttons-class.php");

// runtime.
if (! function_exists("DebButtons\MB"))	{
	function MB()
	{

		return debButtonsPlugin::getInstance();
	}
}
$debbuttons = new debButtonsPlugin();


do_action('debbuttons/plugin/init' , $debbuttons);

// Activation / deactivation
register_activation_hook(__FILE__, array(maxUtils::namespaceit("maxInstall"),'activation_hook') );
register_deactivation_hook(__FILE__,array(maxUtils::namespaceit("maxInstall"), 'deactivation_hook') );
