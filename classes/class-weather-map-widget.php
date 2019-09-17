<?php
/**
 * The file containing the widget class.
 *
 * @package    WeatherMap
 * @subpackage WeatherMap/classes
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The widget class.
 *
 * @package    WeatherMap
 * @subpackage WeatherMap/classes
 */
class Weather_Map_Widget extends WP_Widget {

	/**
	 * The class constructor.
	 */
	public function __construct() {
		parent::__construct(
			'weather-map',
			__( 'Weather Map', 'weather-map' ),
			array(
				'classname'   => 'weather-map-widget',
				'description' => __( 'A customisable windy.com weather map widget.', 'weather-map' ),
			)
		);
	}

	/**
	 * Front-end widget display.
	 *
	 * @param array $args Widget arguments.
	 * @param array $instance Saved values from the database.
	 */
	public function widget( $args, $instance ) {
		$title  = ( isset( $instance['title'] ) ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
		$width  = ( isset( $instance['width'] ) ) ? $instance['width'] : '';
		$height = ( isset( $instance['height'] ) ) ? $instance['height'] : '';
		$lat    = ( isset( $instance['lat'] ) ) ? $instance['lat'] : '';
		$lon    = ( isset( $instance['lon'] ) ) ? $instance['lon'] : '';
		$zoom   = ( isset( $instance['zoom'] ) ) ? $instance['zoom'] : '';
		$layer  = ( isset( $instance['layer'] ) ) ? $instance['layer'] : '';
		$scale  = ( isset( $instance['scale'] ) ) ? $instance['scale'] : '';

		echo $args['before_widget'];

		if ( isset( $instance['title'] ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		// Start the iframe.
		echo '<iframe style="';

		// Set the width.
		echo ( isset( $instance['width'] ) ) ? 'width: ' . esc_attr( $width ) . '; ' : '100%; ';

		// Set the height.
		echo ( isset( $instance['height'] ) ) ? 'height: ' . esc_attr( $height ) . '" ' : '350px" ';

		// The iframe source URL.
		echo 'src="https://embed.windy.com/embed2.html?';

		// Set the latitude.
		echo ( isset( $instance['lat'] ) ) ? 'lat=' . esc_attr( $lat ) : 'lat=53.199';

		// Set the longitude.
		echo ( isset( $instance['lon'] ) ) ? '&lon=' . esc_attr( $lon ) : '&lon=-7.603';

		// Zoom level.
		echo ( isset( $instance['zoom'] ) ) ? '&zoom=' . esc_attr( $zoom ) : '&zoom=5';

		// The weather layer (overlay).
		echo ( isset( $instance['layer'] ) ) ? '&overlay=' . esc_attr( $layer ) : '&overlay=wind';

		// Detail latitude.
		echo ( isset( $instance['lat'] ) ) ? '&detailLat=' . esc_attr( $lat ) : '&detailLat=53.199';

		// Detail longitude.
		echo ( isset( $instance['lon'] ) ) ? '&detailLon=' . esc_attr( $lon ) : '&detailLon=-7.603';

		// The temperature scale.
		echo ( isset( $instance['scale'] ) ) ? '&metricTemp=°' . esc_attr( $scale ) : '&metricTemp=°C';

		// Complete the iframe.
		echo '&metricWind=default&level=surface&menu=&message=true&marker=&calendar=&pressure=&type=map&location=coordinates&detail=&radarRange=-1" frameborder="0"></iframe>';

		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @param array $instance Previously saved database values.
	 */
	public function form( $instance ) {
		$title  = ( isset( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'New title', 'weather-map' );
		$width  = ( isset( $instance['width'] ) ) ? $instance['width'] : '100%';
		$height = ( isset( $instance['height'] ) ) ? $instance['height'] : '350px';
		$lat    = ( isset( $instance['lat'] ) ) ? $instance['lat'] : '53.199';
		$lon    = ( isset( $instance['lon'] ) ) ? $instance['lon'] : '-7.603';
		$zoom   = ( isset( $instance['zoom'] ) ) ? $instance['zoom'] : '5';
		$layer  = ( isset( $instance['layer'] ) ) ? $instance['layer'] : 'wind';
		$scale  = ( isset( $instance['scale'] ) ) ? $instance['scale'] : 'C';
		?>
		<div class="weather-map-widget-admin">
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'weather-map' ); ?></label>
				<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>">
				<small><?php esc_html_e( 'Appears above the widget.', 'weather-map' ); ?></small>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'width' ) ); ?>"><?php esc_html_e( 'Width:', 'weather-map' ); ?></label> 
				<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'width' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'width' ) ); ?>" value="<?php echo esc_attr( $width ); ?>">
				<small><?php esc_html_e( 'Accepts any valid CSS values for width.', 'weather-map' ); ?></small>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'height' ) ); ?>"><?php esc_html_e( 'Height:', 'weather-map' ); ?></label> 
				<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'height' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'height' ) ); ?>" value="<?php echo esc_attr( $height ); ?>">
				<small><?php esc_html_e( 'Accepts any valid CSS values for height.', 'weather-map' ); ?></small>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'lat' ) ); ?>"><?php esc_html_e( 'Latitude:', 'weather-map' ); ?></label> 
				<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'lat' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'lat' ) ); ?>" value="<?php echo esc_attr( $lat ); ?>">
				<small>E.g. https://www.windy.com/?<strong>53.199</strong>,-7.603</small>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'lon' ) ); ?>"><?php esc_html_e( 'Longitude:', 'weather-map' ); ?></label> 
				<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'lon' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'lon' ) ); ?>" value="<?php echo esc_attr( $lon ); ?>">
				<small>E.g. https://www.windy.com/?53.199,<strong>-7.603</strong></small>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'zoom' ) ); ?>"><?php esc_html_e( 'Zoom Level:', 'weather-map' ); ?></label>
				<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'zoom' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'zoom' ) ); ?>">
					<option value="3" <?php echo ( '3' === $zoom ) ? 'selected' : ''; ?>>3</option>
					<option value="4" <?php echo ( '4' === $zoom ) ? 'selected' : ''; ?>>4</option>
					<option value="5" <?php echo ( '5' === $zoom ) ? 'selected' : ''; ?>>5</option>
					<option value="6" <?php echo ( '6' === $zoom ) ? 'selected' : ''; ?>>6</option>
					<option value="7" <?php echo ( '7' === $zoom ) ? 'selected' : ''; ?>>7</option>
					<option value="8" <?php echo ( '8' === $zoom ) ? 'selected' : ''; ?>>8</option>
					<option value="9" <?php echo ( '9' === $zoom ) ? 'selected' : ''; ?>>9</option>
					<option value="10" <?php echo ( '10' === $zoom ) ? 'selected' : ''; ?>>10</option>
					<option value="11" <?php echo ( '11' === $zoom ) ? 'selected' : ''; ?>>11</option>
				</select>
				<small><?php esc_html_e( 'The lower the number, the further out the zoom.', 'weather-map' ); ?></small>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'layer' ) ); ?>"><?php esc_html_e( 'Layer Type:', 'weather-map' ); ?></label>
				<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'layer' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'layer' ) ); ?>">
					<option value="clouds" <?php echo ( 'clouds' === $layer ) ? 'selected' : ''; ?>><?php esc_html_e( 'Clouds', 'weather-map' ); ?></option>	
					<option value="radar" <?php echo ( 'radar' === $layer ) ? 'selected' : ''; ?>><?php esc_html_e( 'Lightning', 'weather-map' ); ?></option>
					<option value="rain" <?php echo ( 'rain' === $layer ) ? 'selected' : ''; ?>><?php esc_html_e( 'Rain', 'weather-map' ); ?></option>
					<option value="temp" <?php echo ( 'temp' === $layer ) ? 'selected' : ''; ?>><?php esc_html_e( 'Temperature', 'weather-map' ); ?></option>
					<option value="wind" <?php echo ( 'wind' === $layer ) ? 'selected' : ''; ?>><?php esc_html_e( 'Wind', 'weather-map' ); ?></option>
				</select>
				<small><?php esc_html_e( 'Choose from different primary overlays/layers.', 'weather-map' ); ?></small>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'scale' ) ); ?>"><?php esc_html_e( 'Temperature Scale:', 'weather-map' ); ?></label>
				<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'scale' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'scale' ) ); ?>">
					<option value="C" <?php echo ( 'C' === $scale ) ? 'selected' : ''; ?>><?php esc_html_e( 'Celsius', 'weather-map' ); ?></option>
					<option value="F" <?php echo ( 'F' === $scale ) ? 'selected' : ''; ?>><?php esc_html_e( 'Fahrenheit', 'weather-map' ); ?></option>
				</select>
				<small><?php esc_html_e( 'Choose your preferred temperature scale.', 'weather-map' ); ?></small>
			</p>
		</div>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @param array $new_instance Values to save.
	 * @param array $old_instance Previously saved database values.
	 *
	 * @return array Updated safe values to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance           = array();
		$instance['title']  = ( isset( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['width']  = ( isset( $new_instance['width'] ) ) ? sanitize_text_field( $new_instance['width'] ) : '';
		$instance['height'] = ( isset( $new_instance['height'] ) ) ? sanitize_text_field( $new_instance['height'] ) : '';
		$instance['lat']    = ( isset( $new_instance['lat'] ) ) ? sanitize_text_field( $new_instance['lat'] ) : '';
		$instance['lon']    = ( isset( $new_instance['lon'] ) ) ? sanitize_text_field( $new_instance['lon'] ) : '';
		$instance['zoom']   = ( isset( $new_instance['zoom'] ) ) ? sanitize_text_field( $new_instance['zoom'] ) : '';
		$instance['layer']  = ( isset( $new_instance['layer'] ) ) ? sanitize_text_field( $new_instance['layer'] ) : '';
		$instance['scale']  = ( isset( $new_instance['scale'] ) ) ? sanitize_text_field( $new_instance['scale'] ) : '';

		return $instance;
	}
}
