<?php
/**
 * The file that defines the core plugin class.
 *
 * @package    WeatherMap
 * @subpackage WeatherMap/classes
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The core plugin class.
 *
 * @package    WeatherMap
 * @subpackage WeatherMap/classes
 */
class Weather_Map {

	/**
	 * The class constructor.
	 */
	public function __construct() {
		add_action( 'widgets_init', array( $this, 'setup_widget' ) );
		$this->setup_shortcode();
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_css' ) );
	}

	/**
	 * Register the widget.
	 */
	public function setup_widget() {
		require plugin_dir_path( dirname( __FILE__ ) ) . 'classes/class-weather-map-widget.php';
		register_widget( 'Weather_Map_Widget' );
	}

	/**
	 * Instantiate the shortcode class.
	 */
	public function setup_shortcode() {
		require plugin_dir_path( dirname( __FILE__ ) ) . 'classes/class-weather-map-shortcode.php';
		new Weather_Map_Shortcode();
	}

	/**
	 * Load the admin stylesheet.
	 */
	public function admin_css() {
		wp_enqueue_style( 'weather-map-admin-css', plugins_url( 'css/admin.css', dirname( __FILE__ ) ), array(), WEATHER_MAP_WIDGET_VERSION );
	}
}
