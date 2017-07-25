<?php
/**
 * General functions
 */

class Functions {

	public static function debug( $status, $data ) {

		if( $status ) {
			var_dump( $data );
			echo "<br><br>";
		}

	}

	// $defaults must be associative array
	public static function parse_args( $args = array(), $defaults = array() ) {

		$a = $defaults;
		foreach( $args as $name => $value ) {
			if( isset( $a[$name] ) ) {
				$a[$name] = $value;
			}
		}
		return $a;

	}

	// $params must be sequential array
	public static function parse_params( $args = array(), $params = array() ) {

		$a = array();
		foreach( $args as $name => $value ) {
			if( in_array( $name, $params ) ) {
				$a[$name] = $value;
			}
		}
		return $a;

	}

	public static function get_field_value( $field_name ) {

		return ( !empty( $_GET[$field_name] ) ) ? $_GET[$field_name] : '';

	}

	public static function get_field_error_class( $field_name ) {

		return ( !empty( $_GET['name'] ) && $_GET['name'] == $field_name ) ? ' error' : '';

	}

	public static function get_field_error( $field_name, $tag = 'span' ) {

		return ( !empty( $_GET['name'] ) && $_GET['name'] == $field_name && !empty( $_GET['display'] ) ) ? '<' . $tag . ' class="error-message">' . $_GET['display'] . '</' . $tag . '>' : '';

	}

}
