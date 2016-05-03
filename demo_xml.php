<?php
/*
Plugin Name: Pix Demo Export
Plugin URI:  http://pixelgrade.com
Description: WordPress demo data export.
Version: 0.0.5
Author: Andrei Lupu
Author URI: http://andrei-lupu.com
Author Email: andrei-lupu@pixelgrade.com
Text Domain: pix-demo-export
License:     GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
Domain Path: /lang
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// ensure EXT is defined
if ( ! defined('EXT')) {
	define('EXT', '.php');
}

require 'core/bootstrap'.EXT;

$config = include 'plugin-config'.EXT;

// set textdomain
pix_demo_export::settextdomain($config['textdomain']);

// Ensure Test Data
// ----------------

$defaults = include 'plugin-defaults'.EXT;

$current_data = get_option($config['settings-key']);

if ($current_data === false) {
	add_option($config['settings-key'], $defaults);
}
else if (count(array_diff_key($defaults, $current_data)) != 0) {
	$plugindata = array_merge($defaults, $current_data);
	update_option($config['settings-key'], $plugindata);
}
# else: data is available; do nothing

// Load Callbacks
// --------------

$basepath = dirname(__FILE__).DIRECTORY_SEPARATOR;
$callbackpath = $basepath.'callbacks'.DIRECTORY_SEPARATOR;
pix_demo_export::require_all($callbackpath);

require_once( plugin_dir_path( __FILE__ ) . 'class-demo_xml.php' );

// Register hooks that are fired when the plugin is activated, deactivated, and uninstalled, respectively.
register_activation_hook( __FILE__, array( 'DemoXmlPlugin', 'activate' ) );
//register_deactivation_hook( __FILE__, array( 'PixTypesPlugin', 'deactivate' ) );

global $demo_xml_plugin;
$demo_xml_plugin = DemoXmlPlugin::get_instance();