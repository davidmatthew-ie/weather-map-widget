<?php
/**
 * The main plugin file.
 *
 * @package           WeatherMap
 * Plugin Name:       Weather Map Widget
 * Description:       Easily embed the windy.com widget as a native WordPress widget. Shortcodes also supported.
 * Version:           1.0.0
 * Author:            David Matthew
 * Author URI:        https://davidmatthew.ie
 * License:           GPL-3
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       weather-map
 * Domain Path:       /languages
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Current plugin version, manually defined for performance reasons.
define( 'WEATHER_MAP_WIDGET_VERSION', '1.0.0' );

// Load the core plugin class and create a plugin instance.
require plugin_dir_path( __FILE__ ) . 'classes/class-weather-map.php';
new Weather_Map();
