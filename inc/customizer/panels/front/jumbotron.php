<?php
/**
 * Jumbotron section in the front page customizer panel.
 *
 * This file contains all the settings and controls
 * for the jumbotron section.
 *
 * @package Lisse
 */

$wp_customize->add_section(
	'lisse_jumbotron_section',
	array(
		'title'    => __( 'Jumbotron', 'lisse' ),
		'priority' => 1,
		'panel'    => 'lisse_front_panel',
	)
);

$wp_customize->add_setting(
	'lisse_jumbotron_enable',
	array(
		'default'           => true,
		'sanitize_callback' => 'lisse_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'lisse_jumbotron_enable',
	array(
		'type'     => 'checkbox',
		'label'    => __( 'Enable Jumbotron', 'lisse' ),
		'priority' => 1,
		'section'  => 'lisse_jumbotron_section',
		'settings' => 'lisse_jumbotron_enable',
	)
);

$wp_customize->add_setting(
	'lisse_jumbotron_bkg_header',
	array(
		'sanitize_callback' => 'lisse_sanitize_html',
	)
);

$wp_customize->add_control(
	new Lisse_Header_Custom_Control(
		$wp_customize,
		'lisse_jumbotron_bkg_header',
		array(
			'label'           => __( 'Background Settings', 'lisse' ),
			'priority'        => 2,
			'section'         => 'lisse_jumbotron_section',
			'settings'        => 'lisse_jumbotron_bkg_header',
			'active_callback' => 'lisse_jumbotron_is_enabled',
		)
	)
);

$wp_customize->add_setting(
	'lisse_jumbotron_enable_parallax',
	array(
		'default'           => true,
		'sanitize_callback' => 'lisse_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'lisse_jumbotron_enable_parallax',
	array(
		'type'            => 'checkbox',
		'label'           => __( 'Enable Parallax Effect', 'lisse' ),
		'priority'        => 3,
		'section'         => 'lisse_jumbotron_section',
		'settings'        => 'lisse_jumbotron_enable_parallax',
		'active_callback' => 'lisse_jumbotron_is_enabled',
	)
);

$wp_customize->add_setting(
	'lisse_jumbotron_image',
	array(
		'default'           => get_template_directory_uri() . '/assets/img/lisse-wordpress-theme.jpg',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'lisse_jumbotron_image',
		array(
			'label'           => __( 'Image', 'lisse' ),
			'priority'        => 4,
			'section'         => 'lisse_jumbotron_section',
			'settings'        => 'lisse_jumbotron_image',
			'active_callback' => 'lisse_jumbotron_is_enabled',
		)
	)
);

$wp_customize->add_setting(
	'lisse_jumbotron_bkg_position_x',
	array(
		'default'           => 'center',
		'sanitize_callback' => 'esc_html',
	)
);

$wp_customize->add_setting(
	'lisse_jumbotron_bkg_position_y',
	array(
		'default'           => 'center',
		'sanitize_callback' => 'esc_html',
		'active_callback'   => 'lisse_jumbotron_is_enabled',
	)
);

$wp_customize->add_control(
	new WP_Customize_Background_Position_Control(
		$wp_customize,
		'lisse_jumbotron_bkg_position',
		array(
			'label'           => __( 'Position', 'lisse' ),
			'priority'        => 5,
			'section'         => 'lisse_jumbotron_section',
			'settings'        => array(
				'x' => 'lisse_jumbotron_bkg_position_x',
				'y' => 'lisse_jumbotron_bkg_position_y',
			),
			'active_callback' => 'lisse_jumbotron_is_enabled',
		)
	)
);

$wp_customize->add_setting(
	'lisse_jumbotron_bkg_size',
	array(
		'default'           => 'cover',
		'sanitize_callback' => 'lisse_sanitize_background_size',
	)
);

$wp_customize->add_control(
	'lisse_jumbotron_bkg_size',
	array(
		'type'            => 'select',
		'label'           => __( 'Image Size', 'lisse' ),
		'choices'         => array(
			'auto'    => __( 'Auto', 'lisse' ),
			'contain' => __( 'Fit to Screen', 'lisse' ),
			'cover'   => __( 'Fill Screen (Cover)', 'lisse' ),
		),
		'priority'        => 6,
		'section'         => 'lisse_jumbotron_section',
		'settings'        => 'lisse_jumbotron_bkg_size',
		'active_callback' => 'lisse_jumbotron_is_enabled',
	)
);

$wp_customize->add_setting(
	'lisse_jumbotron_bkg_repeat',
	array(
		'default'           => 'no-repeat',
		'sanitize_callback' => 'lisse_sanitize_background_repeat',
	)
);

$wp_customize->add_control(
	'lisse_jumbotron_bkg_repeat',
	array(
		'type'            => 'select',
		'label'           => __( 'Repeat', 'lisse' ),
		'choices'         => array(
			'no-repeat' => __( 'No Repeat', 'lisse' ),
			'repeat'    => __( 'Repeat', 'lisse' ),
			'repeat-x'  => __( 'Repeat X', 'lisse' ),
			'repeat-y'  => __( 'Repeat Y', 'lisse' ),
		),
		'priority'        => 7,
		'section'         => 'lisse_jumbotron_section',
		'settings'        => 'lisse_jumbotron_bkg_repeat',
		'active_callback' => 'lisse_jumbotron_is_enabled',
	)
);

$wp_customize->add_setting(
	'lisse_jumbotron_overlay',
	array(
		'default'           => 'rgba(0,0,0,0.50)',
		'sanitize_callback' => 'lisse_sanitize_color',
	)
);

$wp_customize->add_control(
	new lisse_Customize_Alpha_Color_Control(
		$wp_customize,
		'lisse_jumbotron_overlay',
		array(
			'label'           => __( 'Overlay Color', 'lisse' ),
			'priority'        => 8,
			'show_opacity'    => 'true',
			'palette'         => true,
			'section'         => 'lisse_jumbotron_section',
			'settings'        => 'lisse_jumbotron_overlay',
			'active_callback' => 'lisse_jumbotron_is_enabled',
		)
	)
);

$wp_customize->add_setting(
	'lisse_jumbotron_content_header',
	array(
		'sanitize_callback' => 'lisse_sanitize_html',
	)
);

$wp_customize->add_control(
	new Lisse_Header_Custom_Control(
		$wp_customize,
		'lisse_jumbotron_content_header',
		array(
			'label'           => __( 'Content', 'lisse' ),
			'priority'        => 9,
			'section'         => 'lisse_jumbotron_section',
			'settings'        => 'lisse_jumbotron_content_header',
			'active_callback' => 'lisse_jumbotron_is_enabled',
		)
	)
);

$wp_customize->add_setting(
	'lisse_jumbotron_title',
	array(
		'default'           => __( 'Lisse', 'lisse' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'lisse_jumbotron_title',
	array(
		'type'            => 'text',
		'label'           => __( 'Title', 'lisse' ),
		'priority'        => 10,
		'section'         => 'lisse_jumbotron_section',
		'settings'        => 'lisse_jumbotron_title',
		'active_callback' => 'lisse_jumbotron_is_enabled',
	)
);

$wp_customize->selective_refresh->add_partial(
	'lisse_jumbotron_title',
	array(
		'selector' => '.title',
	)
);

$wp_customize->add_setting(
	'lisse_jumbotron_description',
	array(
		'default'           => __( 'Turn your vision into reality.', 'lisse' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'lisse_jumbotron_description',
	array(
		'label'           => __( 'Description', 'lisse' ),
		'priority'        => 11,
		'section'         => 'lisse_jumbotron_section',
		'settings'        => 'lisse_jumbotron_description',
		'active_callback' => 'lisse_jumbotron_is_enabled',
	)
);

$wp_customize->selective_refresh->add_partial(
	'lisse_jumbotron_description',
	array(
		'selector' => '.description',
	)
);

$wp_customize->add_setting(
	'lisse_jumbotron_content_alignment',
	array(
		'default'           => 'center',
		'sanitize_callback' => 'lisse_sanitize_content_alignment',
	)
);

$wp_customize->add_control(
	'lisse_jumbotron_content_alignment',
	array(
		'type'            => 'select',
		'label'           => __( 'Alignment', 'lisse' ),
		'choices'         => array(
			'left'   => __( 'Left', 'lisse' ),
			'center' => __( 'Center', 'lisse' ),
			'right'  => __( 'Right', 'lisse' ),
		),
		'priority'        => 12,
		'section'         => 'lisse_jumbotron_section',
		'settings'        => 'lisse_jumbotron_content_alignment',
		'active_callback' => 'lisse_jumbotron_is_enabled',
	)
);

$wp_customize->add_setting(
	'lisse_jumbotron_title_frgd',
	array(
		'default'           => '#FFFFFF',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new lisse_Customize_Alpha_Color_Control(
		$wp_customize,
		'lisse_jumbotron_title_frgd',
		array(
			'label'           => __( 'Title Color', 'lisse' ),
			'priority'        => 13,
			'palette'         => true,
			'section'         => 'lisse_jumbotron_section',
			'settings'        => 'lisse_jumbotron_title_frgd',
			'active_callback' => 'lisse_jumbotron_is_enabled',
		)
	)
);

$wp_customize->add_setting(
	'lisse_jumbotron_description_frgd',
	array(
		'default'           => '#FFFFFF',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new lisse_Customize_Alpha_Color_Control(
		$wp_customize,
		'lisse_jumbotron_description_frgd',
		array(
			'label'           => __( 'Description Color', 'lisse' ),
			'priority'        => 14,
			'palette'         => true,
			'section'         => 'lisse_jumbotron_section',
			'settings'        => 'lisse_jumbotron_description_frgd',
			'active_callback' => 'lisse_jumbotron_is_enabled',
		)
	)
);

$wp_customize->add_setting(
	'lisse_jumbotron_button_one',
	array(
		'sanitize_callback' => 'lisse_sanitize_html',
	)
);

$wp_customize->add_control(
	new Lisse_Header_Custom_Control(
		$wp_customize,
		'lisse_jumbotron_button_one',
		array(
			'label'           => __( 'First Button', 'lisse' ),
			'priority'        => 15,
			'section'         => 'lisse_jumbotron_section',
			'settings'        => 'lisse_jumbotron_button_one',
			'active_callback' => 'lisse_jumbotron_is_enabled',
		)
	)
);

$wp_customize->add_setting(
	'lisse_jumbotron_first_btn_enable',
	array(
		'default'           => true,
		'sanitize_callback' => 'lisse_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'lisse_jumbotron_first_btn_enable',
	array(
		'type'            => 'checkbox',
		'label'           => __( 'Enable First Button', 'lisse' ),
		'priority'        => 16,
		'section'         => 'lisse_jumbotron_section',
		'settings'        => 'lisse_jumbotron_first_btn_enable',
		'active_callback' => 'lisse_jumbotron_is_enabled',
	)
);

$wp_customize->add_setting(
	'lisse_jumbotron_first_button_title',
	array(
		'default'           => __( 'Learn more', 'lisse' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'lisse_jumbotron_first_button_title',
	array(
		'label'           => __( 'Title', 'lisse' ),
		'priority'        => 17,
		'section'         => 'lisse_jumbotron_section',
		'settings'        => 'lisse_jumbotron_first_button_title',
		'active_callback' => 'lisse_first_button_is_enabled',
	)
);

$wp_customize->selective_refresh->add_partial(
	'lisse_jumbotron_first_button_title',
	array(
		'selector' => '.button-one',
	)
);

$wp_customize->add_setting(
	'lisse_jumbotron_first_button_url',
	array(
		'default'           => '#',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'lisse_jumbotron_first_button_url',
	array(
		'label'           => __( 'URL', 'lisse' ),
		'priority'        => 19,
		'section'         => 'lisse_jumbotron_section',
		'settings'        => 'lisse_jumbotron_first_button_url',
		'active_callback' => 'lisse_first_button_is_enabled',
	)
);

$wp_customize->add_setting(
	'lisse_jumbotron_first_btn_frgd',
	array(
		'default'           => '#FFFFFF',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new lisse_Customize_Alpha_Color_Control(
		$wp_customize,
		'lisse_jumbotron_first_btn_frgd',
		array(
			'label'           => __( 'Foreground Color', 'lisse' ),
			'priority'        => 20,
			'palette'         => true,
			'section'         => 'lisse_jumbotron_section',
			'settings'        => 'lisse_jumbotron_first_btn_frgd',
			'active_callback' => 'lisse_first_button_is_enabled',
		)
	)
);

$wp_customize->add_setting(
	'lisse_jumbotron_first_btn_bkgd',
	array(
		'default'           => '#0277BB',
		'sanitize_callback' => 'lisse_sanitize_color',
	)
);

$wp_customize->add_control(
	new lisse_Customize_Alpha_Color_Control(
		$wp_customize,
		'lisse_jumbotron_first_btn_bkgd',
		array(
			'label'           => __( 'Background Color', 'lisse' ),
			'priority'        => 21,
			'show_opacity'    => 'true',
			'palette'         => true,
			'section'         => 'lisse_jumbotron_section',
			'settings'        => 'lisse_jumbotron_first_btn_bkgd',
			'active_callback' => 'lisse_first_button_is_enabled',
		)
	)
);

$wp_customize->add_setting(
	'lisse_jumbotron_first_btn_bkgd_hover',
	array(
		'default'           => '#2e91d4',
		'sanitize_callback' => 'lisse_sanitize_color',
	)
);

$wp_customize->add_control(
	new lisse_Customize_Alpha_Color_Control(
		$wp_customize,
		'lisse_jumbotron_first_btn_bkgd_hover',
		array(
			'label'           => __( 'Hover Color', 'lisse' ),
			'priority'        => 22,
			'show_opacity'    => 'true',
			'palette'         => true,
			'section'         => 'lisse_jumbotron_section',
			'settings'        => 'lisse_jumbotron_first_btn_bkgd_hover',
			'active_callback' => 'lisse_first_button_is_enabled',
		)
	)
);

$wp_customize->add_setting(
	'lisse_jumbotron_first_btn_bdr',
	array(
		'default'           => '#0277BB',
		'sanitize_callback' => 'lisse_sanitize_color',
	)
);

$wp_customize->add_control(
	new lisse_Customize_Alpha_Color_Control(
		$wp_customize,
		'lisse_jumbotron_first_btn_bdr',
		array(
			'label'           => __( 'Border Color', 'lisse' ),
			'priority'        => 23,
			'show_opacity'    => 'true',
			'palette'         => true,
			'section'         => 'lisse_jumbotron_section',
			'settings'        => 'lisse_jumbotron_first_btn_bdr',
			'active_callback' => 'lisse_first_button_is_enabled',
		)
	)
);

$wp_customize->add_setting(
	'lisse_jumbotron_button_two',
	array(
		'sanitize_callback' => 'lisse_sanitize_html',
	)
);

$wp_customize->add_control(
	new Lisse_Header_Custom_Control(
		$wp_customize,
		'lisse_jumbotron_button_two',
		array(
			'label'           => __( 'Second Button', 'lisse' ),
			'priority'        => 24,
			'section'         => 'lisse_jumbotron_section',
			'settings'        => 'lisse_jumbotron_button_two',
			'active_callback' => 'lisse_jumbotron_is_enabled',
		)
	)
);

$wp_customize->add_setting(
	'lisse_jumbotron_second_btn_enable',
	array(
		'default'           => true,
		'sanitize_callback' => 'lisse_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'lisse_jumbotron_second_btn_enable',
	array(
		'type'            => 'checkbox',
		'label'           => __( 'Enable Second Button', 'lisse' ),
		'priority'        => 25,
		'section'         => 'lisse_jumbotron_section',
		'settings'        => 'lisse_jumbotron_second_btn_enable',
		'active_callback' => 'lisse_jumbotron_is_enabled',
	)
);

$wp_customize->add_setting(
	'lisse_jumbotron_second_button_title',
	array(
		'default'           => __( 'Sign up', 'lisse' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'lisse_jumbotron_second_button_title',
	array(
		'label'           => __( 'Title', 'lisse' ),
		'priority'        => 26,
		'section'         => 'lisse_jumbotron_section',
		'settings'        => 'lisse_jumbotron_second_button_title',
		'active_callback' => 'lisse_second_button_is_enabled',
	)
);

$wp_customize->selective_refresh->add_partial(
	'lisse_jumbotron_second_button_title',
	array(
		'selector' => '.button-two',
	)
);

$wp_customize->add_setting(
	'lisse_jumbotron_second_button_url',
	array(
		'default'           => '#',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'lisse_jumbotron_second_button_url',
	array(
		'label'           => __( 'URL', 'lisse' ),
		'priority'        => 27,
		'section'         => 'lisse_jumbotron_section',
		'settings'        => 'lisse_jumbotron_second_button_url',
		'active_callback' => 'lisse_second_button_is_enabled',
	)
);

$wp_customize->add_setting(
	'lisse_jumbotron_second_btn_frgd',
	array(
		'default'           => '#FFFFFF',
		'sanitize_callback' => 'lisse_sanitize_color',
	)
);

$wp_customize->add_control(
	new lisse_Customize_Alpha_Color_Control(
		$wp_customize,
		'lisse_jumbotron_second_btn_frgd',
		array(
			'label'           => __( 'Foreground Color', 'lisse' ),
			'priority'        => 28,
			'show_opacity'    => 'true',
			'palette'         => true,
			'section'         => 'lisse_jumbotron_section',
			'settings'        => 'lisse_jumbotron_second_btn_frgd',
			'active_callback' => 'lisse_second_button_is_enabled',
		)
	)
);

$wp_customize->add_setting(
	'lisse_jumbotron_second_btn_bkgd',
	array(
		'default'           => 'rgba(255,255,255,0)',
		'sanitize_callback' => 'lisse_sanitize_color',
	)
);

$wp_customize->add_control(
	new lisse_Customize_Alpha_Color_Control(
		$wp_customize,
		'lisse_jumbotron_second_btn_bkgd',
		array(
			'label'           => __( 'Background Color', 'lisse' ),
			'priority'        => 29,
			'show_opacity'    => 'true',
			'palette'         => true,
			'section'         => 'lisse_jumbotron_section',
			'settings'        => 'lisse_jumbotron_second_btn_bkgd',
			'active_callback' => 'lisse_second_button_is_enabled',
		)
	)
);

$wp_customize->add_setting(
	'lisse_jumbotron_second_btn_bkgd_hover',
	array(
		'default'           => 'rgba(255,255,255,0.1)',
		'sanitize_callback' => 'lisse_sanitize_color',
	)
);

$wp_customize->add_control(
	new lisse_Customize_Alpha_Color_Control(
		$wp_customize,
		'lisse_jumbotron_second_btn_bkgd_hover',
		array(
			'label'           => __( 'Hover Color', 'lisse' ),
			'priority'        => 30,
			'show_opacity'    => 'true',
			'palette'         => true,
			'section'         => 'lisse_jumbotron_section',
			'settings'        => 'lisse_jumbotron_second_btn_bkgd_hover',
			'active_callback' => 'lisse_second_button_is_enabled',
		)
	)
);

$wp_customize->add_setting(
	'lisse_jumbotron_second_btn_bdr',
	array(
		'default'           => '#FFFFFF',
		'sanitize_callback' => 'lisse_sanitize_color',
	)
);

$wp_customize->add_control(
	new lisse_Customize_Alpha_Color_Control(
		$wp_customize,
		'lisse_jumbotron_second_btn_bdr',
		array(
			'label'           => __( 'Border Color', 'lisse' ),
			'priority'        => 31,
			'show_opacity'    => 'true',
			'palette'         => true,
			'section'         => 'lisse_jumbotron_section',
			'settings'        => 'lisse_jumbotron_second_btn_bdr',
			'active_callback' => 'lisse_second_button_is_enabled',
		)
	)
);

/**
 * Active Callbacks
 */

if ( ! function_exists( 'lisse_jumbotron_is_enabled' ) ) {
	/**
	 * Checks if the jumbotron is enabled.
	 *
	 * @return bool Whether the jumbotron is enabled or not.
	 */
	function lisse_jumbotron_is_enabled() {
		$jumbotron_enabled = get_theme_mod( 'lisse_jumbotron_enable', true );

		if ( $jumbotron_enabled ) {
			return true;
		}
		return false;
	}
}

if ( ! function_exists( 'lisse_first_button_is_enabled' ) ) {
	/**
	 * Checks if the first button is enabled.
	 *
	 * @return bool Whether the first button is enabled or not.
	 */
	function lisse_first_button_is_enabled() {
		$jumbotron_enabled    = get_theme_mod( 'lisse_jumbotron_enable', true );
		$first_button_enabled = get_theme_mod( 'lisse_jumbotron_first_btn_enable', true );

		if ( $jumbotron_enabled && $first_button_enabled ) {
			return true;
		}
		return false;
	}
}

if ( ! function_exists( 'lisse_second_button_is_enabled' ) ) {
	/**
	 * Checks if the second button is enabled.
	 *
	 * @return bool Whether the second button is enabled or not.
	 */
	function lisse_second_button_is_enabled() {
		$jumbotron_enabled     = get_theme_mod( 'lisse_jumbotron_enable', true );
		$second_button_enabled = get_theme_mod( 'lisse_jumbotron_second_btn_enable', true );

		if ( $jumbotron_enabled && $second_button_enabled ) {
			return true;
		}
		return false;
	}
}

if ( ! function_exists( 'lisse_sanitize_background_size' ) ) {
	/**
	 * Checks if the background size is a valid option.
	 *
	 * @param string               $value      Slug to sanitize.
	 * @param WP_Customize_Setting $setting    Setting instance.
	 *
	 * @return string Sanitized slug if it is a valid choice; otherwise, a WP_Error.
	 */
	function lisse_sanitize_background_size( $value, $setting ) {
		if ( ! in_array( $value, array( 'auto', 'contain', 'cover' ), true ) ) {
			return new WP_Error( 'invalid_value', __( 'Invalid value entered for the background size.', 'lisse' ) );
		}
		return $value;
	}
}

if ( ! function_exists( 'lisse_sanitize_background_repeat' ) ) {
	/**
	 * Checks if the background repeat value is a valid option.
	 *
	 * @param string               $value      Slug to sanitize.
	 * @param WP_Customize_Setting $setting    Setting instance.
	 *
	 * @return string Sanitized slug if it is a valid choice; otherwise, a WP_Error.
	 */
	function lisse_sanitize_background_repeat( $value, $setting ) {
		if ( ! in_array( $value, array( 'no-repeat', 'repeat-x', 'repeat-y', 'repeat' ) ) ) {
			return new WP_Error( 'invalid_value', __( 'Invalid value for background repeat.', 'lisse' ) );
		}
		return $value;
	}
}

if ( ! function_exists( 'lisse_sanitize_content_alignment' ) ) {
	/**
	 * Checks if the content alignment value is a valid option.
	 *
	 * @param string               $value      Slug to sanitize.
	 * @param WP_Customize_Setting $setting    Setting instance.
	 *
	 * @return string Sanitized slug if it is a valid choice; otherwise, a WP_Error.
	 */
	function lisse_sanitize_content_alignment( $value, $setting ) {
		if ( ! in_array( $value, array( 'left', 'center', 'right' ) ) ) {
			return new WP_Error( 'invalid_value', __( 'Invalid value for content alignment.', 'lisse' ) );
		}
		return $value;
	}
}
