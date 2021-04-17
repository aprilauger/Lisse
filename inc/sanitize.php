<?php
/**
 * Customizer sanitization callbacks.
 *
 * Sanitization callback functions for various data types.
 *
 * @package Lisse
 */

if ( ! function_exists( 'lisse_sanitize_select' ) ) {
	/**
	 * Select sanitization callback.
	 *
	 * Sanitization callback for select and radio type controls.
	 * This callback sanitizes `$input` as a slug, and then validates
	 * `$input` against the choices defined for the control.
	 *
	 * @see sanitize_key()                https://developer.wordpress.org/reference/functions/sanitize_key/
	 * @see $wp_customize->get_control()  https://developer.wordpress.org/reference/classes/wp_customize_manager/get_control/
	 *
	 * @param string               $input      Slug to sanitize.
	 * @param WP_Customize_Setting $setting    Setting instance.
	 *
	 * @return string Sanitized slug if it is a valid choice; otherwise, the default setting.
	 */
	function lisse_sanitize_select( $input, $setting ) {
		// Sanitize the slug.
		$input = sanitize_key( $input );

		// Get the list of possible select options.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
}

if ( ! function_exists( 'lisse_sanitize_checkbox' ) ) {
	/**
	 * Checkbox sanitization callback.
	 *
	 * Sanitization callback for checkbox type controls. This callback
	 * sanitizes `$checked` as a boolean value.
	 *
	 * @param  bool $checked   The checkbox.
	 *
	 * @return bool            Whether the checkbox is checked.
	 */
	function lisse_sanitize_checkbox( $checked ) {
		// Check if the slug is boolean, then return the result.
		return ( ( isset( $checked ) && true === $checked ) ? true : false );
	}
}

if ( ! function_exists( 'lisse_sanitize_color' ) ) {
	/**
	 * Color sanitization callback.
	 *
	 * Sanitization callback for color values. This callback sanitizes
	 * `$color` as a valid RGB value.
	 *
	 * @see sanitize_hex_color() https://developer.wordpress.org/reference/functions/sanitize_hex_color/
	 *
	 * @param string $color     Color value to sanitize.
	 * @return string           Sanitized RGBA value.
	 */
	function lisse_sanitize_color( $color ) {
		// Checks if `$color` is empty; otherwise, returns a default value.
		if ( empty( $color ) || is_array( $color ) ) {
			return 'rgba(0,0,0,0)';
		}

		// If `$color` does not begin with 'rgba', then treat it as hex
		// and sanitize the value.
		if ( false === strpos( $color, 'rgba' ) ) {
			return sanitize_hex_color( $color );
		}

		$color = str_replace( ' ', '', $color );

		// Formats value to RGB.
		sscanf( $color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
		return 'rgba(' . $red . ',' . $green . ',' . $blue . ',' . $alpha . ')';
	}
}

if ( ! function_exists( 'lisse_sanitize_dropdown_pages' ) ) {
	/**
	 * Drop-down pages sanitization callback.
	 *
	 * @see absint()            https://developer.wordpress.org/reference/functions/absint/
	 * @see get_post_status()   https://developer.wordpress.org/reference/functions/get_post_status/
	 *
	 * @param int                  $page_id         Page ID to sanitize.
	 * @param WP_Customize_Setting $setting         Setting instance.
	 * @return int                 Sanitized page ID.
	 */
	function lisse_sanitize_dropdown_pages( $page_id, $setting ) {
		// Ensure $input is an absolute integer.
		$page_id = absint( $page_id );

		// If $page_id is an ID of a published page, return it; otherwise, return the default.
		return ( 'publish' === get_post_status( $page_id ) ? $page_id : $setting->default );
	}
}

if ( ! function_exists( 'lisse_sanitize_html' ) ) {
	/**
	 * HTML sanitization callback.
	 *
	 * Filters `$input` to strip out disallowed HTML.
	 *
	 * @see force_balance_tags() https://developer.wordpress.org/reference/functions/force_balance_tags/
	 * @see wp_kses()            https://developer.wordpress.org/reference/functions/wp_kses/
	 *
	 * @param  string $input     Input to sanitize.
	 * @return string            Sanitized value.
	 */
	function lisse_sanitize_html( $input ) {
		// Balances tags of string using a modified stack.
		$input = force_balance_tags( $input );

		// Allowed tags.
		$allowed_html = array(
			'a' => array(
				'href'  => array(),
				'title' => array(),
			),
			'br'     => array(),
			'em'     => array(),
			'img'    => array(
				'alt'    => array(),
				'src'    => array(),
				'srcset' => array(),
				'title'  => array(),
			),
			'strong' => array(),
		);

		// Filters content and strips out disallowed HTML.
		$output = wp_kses( $input, $allowed_html );

		return $output;
	}
}
