<?php
/**
 * Custom functions
 *
 * @package Lisse
 */

/**
 * Checks if a value is hex
 *
 * @param string $hex  The hex value to check.
 *
 * @return boolean     Whether the value was hex or not.
 */
function lisse_hex_check( $hex ) {
	if ( '#' === $hex[0] ) {
		return true;
	}
	return false;
}

/**
 * Converts a hex value to RGB
 *
 * @param string $hex  A hex value.
 *
 * @return string      An RGB value.
 */
function lisse_hex2rgba( $hex ) {

	// Removes the hash from the hex value.
	$hex_value = str_replace( '#', '', $hex );

	if ( strlen( $hex_value ) === 3 ) {
		$r = hexdec( substr( $hex_value, 0, 1 ) . substr( $hex_value, 0, 1 ) );
		$g = hexdec( substr( $hex_value, 1, 1 ) . substr( $hex_value, 1, 1 ) );
		$b = hexdec( substr( $hex_value, 2, 1 ) . substr( $hex_value, 2, 1 ) );
	} else {
		$r = hexdec( substr( $hex_value, 0, 2 ) );
		$g = hexdec( substr( $hex_value, 2, 2 ) );
		$b = hexdec( substr( $hex_value, 4, 2 ) );
	}

	$rgba = 'rgba( ' . $r . ',' . $g . ',' . $b . ',1 )';

	return $rgba;
}
