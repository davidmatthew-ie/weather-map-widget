<?php
/**
 * The file containing the shortcode.
 *
 * @package    WeatherMap
 * @subpackage WeatherMap/classes
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The shortcode class.
 *
 * @package    WeatherMap
 * @subpackage WeatherMap/classes
 */
class Weather_Map_Shortcode {

	/**
	 * The class constructor.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'add_the_shortcode' ) );
	}

	/**
	 * Add the shortcode.
	 */
	public function add_the_shortcode() {
		add_shortcode( 'weather-map', array( $this, 'create_the_shortcode' ) );
	}

	/**
	 * Create the shortcode.
	 *
	 * @param array $attributes The shortcode attributes.
	 */
	public function create_the_shortcode( $attributes ) {

		// Initialize the output.
		$output = '';

		// Initialize the attributes and their default values.
		$atts = shortcode_atts(
			array(
				'width'  => '100%',
				'height' => '350px',
				'lat'    => '53.199',
				'lon'    => '-7.603',
				'zoom'   => '5',
				'layer'  => 'wind',
				'scale'  => 'C',
			),
			$attributes,
			'weather-map'
		);

		// Start the iframe.
		$output .= '<iframe ';

		// Style the iframe.
		$output .= 'style="width: ' . esc_attr( $atts['width'] ) . '; height: ' . esc_attr( $atts['height'] ) . '" ';

		// The iframe source URL.
		$output .= 'src="https://embed.windy.com/embed2.html?';

		// Latitude and longitude.
		$output .= 'lat=' . esc_attr( $atts['lat'] ) . '&lon=' . esc_attr( $atts['lon'] );

		// Zoom level.
		$output .= '&zoom=' . esc_attr( $atts['zoom'] );

		// The weather layer (overlay).
		$output .= '&overlay=' . esc_attr( $atts['layer'] );

		// Detail latitude and longitude.
		$output .= '&detailLat=' . esc_attr( $atts['lat'] ) . '&detailLon=' . esc_attr( $atts['lon'] );

		// The temperature scale.
		$output .= '&metricTemp=°' . esc_attr( strtoupper( $atts['scale'] ) );

		// Complete the iframe.
		$output .= '&metricWind=default&level=surface&menu=&message=true&marker=&calendar=&pressure=&type=map&location=coordinates&detail=&radarRange=-1" frameborder="0"></iframe>';

		// Return the complete output.
		return $output;
	}

}
