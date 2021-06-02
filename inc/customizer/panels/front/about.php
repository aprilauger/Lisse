<?php
/**
 * About section in the front page customizer panel.
 *
 * This file contains all the settings and controls
 * for the about section.
 *
 * @package Lisse
 */

$wp_customize->add_section(
	'lisse_about_section',
	array(
		'title'    => __( 'About', 'lisse' ),
		'priority' => 3,
		'panel'    => 'lisse_front_panel',
	)
);

$wp_customize->add_setting(
	'lisse_about_show',
	array(
		'default'           => false,
		'sanitize_callback' => 'lisse_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'lisse_about_show',
	array(
		'type'     => 'checkbox',
		'label'    => __( 'Show the About section', 'lisse' ),
		'priority' => 1,
		'section'  => 'lisse_about_section',
		'settings' => 'lisse_about_show',
	)
);

$wp_customize->add_setting(
	'lisse_about_title',
	array(
		'default'           => __( 'About', 'lisse' ),
		'sanitize_callback' => 'lisse_sanitize_html',
	)
);

$wp_customize->add_control(
	'lisse_about_title',
	array(
		'label'           => __( 'Title', 'lisse' ),
		'priority'        => 2,
		'section'         => 'lisse_about_section',
		'settings'        => 'lisse_about_title',
		'active_callback' => 'lisse_about_is_enabled',
	)
);

$wp_customize->selective_refresh->add_partial(
	'lisse_about_title',
	array(
		'selector' => '.about-title',
	)
);

$wp_customize->add_setting(
	'lisse_about_subtitle',
	array(
		'default'           => __( 'Lorem ipsum dolor sit amet', 'lisse' ),
		'sanitize_callback' => 'lisse_sanitize_html',
	)
);
$wp_customize->add_control(
	'lisse_about_subtitle',
	array(
		'label'           => __( 'Subtitle', 'lisse' ),
		'priority'        => 2,
		'section'         => 'lisse_about_section',
		'settings'        => 'lisse_about_subtitle',
		'active_callback' => 'lisse_about_is_enabled',
	)
);

$wp_customize->selective_refresh->add_partial(
	'lisse_about_subtitle',
	array(
		'selector' => '.about-subtitle',
	)
);

$wp_customize->add_setting(
	'lisse_about_entry',
	array(
		'default'           => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'lisse' ),
		'sanitize_callback' => 'wp_kses_post',
	)
);

$wp_customize->add_control(
	'lisse_about_entry',
	array(
		'type'            => 'textarea',
		'label'           => __( 'Description', 'lisse' ),
		'priority'        => 3,
		'section'         => 'lisse_about_section',
		'settings'        => 'lisse_about_entry',
		'active_callback' => 'lisse_about_is_enabled',
	)
);

$wp_customize->selective_refresh->add_partial(
	'lisse_about_entry',
	array(
		'selector' => '.about-entry',
	)
);

$wp_customize->add_setting(
	'lisse_about_button_header',
	array(
		'sanitize_callback' => 'lisse_sanitize_html',
	)
);

$wp_customize->add_control(
	new Lisse_Header_Custom_Control(
		$wp_customize,
		'lisse_about_button_header',
		array(
			'label'           => __( 'Button', 'lisse' ),
			'priority'        => 4,
			'section'         => 'lisse_about_section',
			'settings'        => 'lisse_about_button_header',
			'active_callback' => 'lisse_about_is_enabled',
		)
	)
);

$wp_customize->add_setting(
	'lisse_about_button_enable',
	array(
		'default'           => true,
		'sanitize_callback' => 'lisse_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'lisse_about_button_enable',
	array(
		'type'            => 'checkbox',
		'label'           => __( 'Enable Button', 'lisse' ),
		'priority'        => 5,
		'section'         => 'lisse_about_section',
		'active_callback' => 'lisse_about_is_enabled',
	)
);

$wp_customize->add_setting(
	'lisse_about_button_title',
	array(
		'default'           => __( 'Read more', 'lisse' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'lisse_about_button_title',
	array(
		'label'           => __( 'Title', 'lisse' ),
		'priority'        => 6,
		'section'         => 'lisse_about_section',
		'settings'        => 'lisse_about_button_title',
		'active_callback' => 'lisse_about_button_is_enabled',
	)
);

$wp_customize->selective_refresh->add_partial(
	'lisse_about_button_title',
	array(
		'selector' => '.about-btn',
	)
);

$wp_customize->add_setting(
	'lisse_about_button_url',
	array(
		'default'           => '#',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'lisse_about_button_url',
	array(
		'label'           => __( 'URL', 'lisse' ),
		'priority'        => 7,
		'section'         => 'lisse_about_section',
		'settings'        => 'lisse_about_button_url',
		'active_callback' => 'lisse_about_button_is_enabled',
	)
);

$wp_customize->add_setting(
	'lisse_about_image_header',
	array(
		'sanitize_callback' => 'lisse_sanitize_html',
	)
);

$wp_customize->add_control(
	new Lisse_Header_Custom_Control(
		$wp_customize,
		'lisse_about_image_header',
		array(
			'label'           => __( 'Image', 'lisse' ),
			'priority'        => 8,
			'section'         => 'lisse_about_section',
			'settings'        => 'lisse_about_image_header',
			'active_callback' => 'lisse_about_is_enabled',
		)
	)
);

$wp_customize->add_setting(
	'lisse_about_image',
	array(
		'default'           => get_template_directory_uri() . '/assets/img/about.jpg',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'lisse_about_image',
		array(
			'priority'        => 9,
			'section'         => 'lisse_about_section',
			'settings'        => 'lisse_about_image',
			'active_callback' => 'lisse_about_is_enabled',
		)
	)
);

$wp_customize->selective_refresh->add_partial(
	'lisse_about_image',
	array(
		'selector' => '.about-image',
	)
);

/**
 * Active Callbacks
 */

if ( ! function_exists( 'lisse_about_is_enabled' ) ) {

	/**
	 * Checks if the about section is enabled.
	 *
	 * @return bool Whether the about section is enabled or not.
	 */
	function lisse_about_is_enabled() {
		$about_enabled = get_theme_mod( 'lisse_about_show', true );
		if ( $about_enabled ) {
			return true;
		}
		return false;
	}
}

if ( ! function_exists( 'lisse_about_button_is_enabled' ) ) {
	/**
	 * Checks if the about button is enabled.
	 *
	 * @return bool Whether the about button is enabled or not.
	 */
	function lisse_about_button_is_enabled() {
		$about_enabled        = get_theme_mod( 'lisse_about_show', false );
		$about_button_enabled = get_theme_mod( 'lisse_about_button_enable', true );

		if ( $about_enabled && $about_button_enabled ) {
			return true;
		}
		return false;
	}
}
