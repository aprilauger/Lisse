<?php
/**
 * Call to action section in the front page customizer panel.
 *
 * This file contains all the settings and controls
 * for the call to action section.
 *
 * @package Lisse
 */

$wp_customize->add_section(
	'lisse_cta_section',
	array(
		'title'    => __( 'Call to Action', 'lisse' ),
		'priority' => 4,
		'panel'    => 'lisse_front_panel',
	)
);

$wp_customize->add_setting(
	'lisse_cta_show',
	array(
		'default'           => true,
		'sanitize_callback' => 'lisse_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'lisse_cta_show',
	array(
		'type'     => 'checkbox',
		'label'    => __( 'Show the Call to Action section', 'lisse' ),
		'priority' => 1,
		'section'  => 'lisse_cta_section',
		'settings' => 'lisse_cta_show',
	)
);

$wp_customize->add_setting(
	'lisse_cta_left_panel_header',
	array(
		'sanitize_callback' => 'lisse_sanitize_html',
	)
);

$wp_customize->add_control(
	new Lisse_Header_Custom_Control(
		$wp_customize,
		'lisse_cta_left_panel_header',
		array(
			'label'           => __( 'Left Panel', 'lisse' ),
			'priority'        => 2,
			'section'         => 'lisse_cta_section',
			'settings'        => 'lisse_cta_left_panel_header',
			'active_callback' => 'lisse_cta_is_enabled',
		)
	)
);

$wp_customize->add_setting(
	'lisse_cta_title',
	array(
		'default'           => __( 'Design & Code', 'lisse' ),
		'sanitize_callback' => 'lisse_sanitize_html',
	)
);
$wp_customize->add_control(
	'lisse_cta_title',
	array(
		'label'           => __( 'Title', 'lisse' ),
		'priority'        => 3,
		'section'         => 'lisse_cta_section',
		'settings'        => 'lisse_cta_title',
		'active_callback' => 'lisse_cta_is_enabled',
	)
);

$wp_customize->selective_refresh->add_partial(
	'lisse_cta_title',
	array(
		'selector' => '.cta-title',
	)
);

$wp_customize->add_setting(
	'lisse_cta_subtitle',
	array(
		'default'           => __( 'Lorem ipsum dolor sit amet', 'lisse' ),
		'sanitize_callback' => 'lisse_sanitize_html',
	)
);

$wp_customize->add_control(
	'lisse_cta_subtitle',
	array(
		'label'           => __( 'Subtitle', 'lisse' ),
		'priority'        => 4,
		'section'         => 'lisse_cta_section',
		'settings'        => 'lisse_cta_subtitle',
		'active_callback' => 'lisse_cta_is_enabled',
	)
);

$wp_customize->selective_refresh->add_partial(
	'lisse_cta_subtitle',
	array(
		'selector' => '.cta-subtitle',
	)
);

$wp_customize->add_setting(
	'lisse_cta_entry_left',
	array(
		'default'           => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'lisse' ),
		'sanitize_callback' => 'wp_kses_post',
	)
);

$wp_customize->add_control(
	'lisse_cta_entry_left',
	array(
		'type'            => 'textarea',
		'label'           => __( 'Description', 'lisse' ),
		'priority'        => 5,
		'section'         => 'lisse_cta_section',
		'settings'        => 'lisse_cta_entry_left',
		'active_callback' => 'lisse_cta_is_enabled',
	)
);

$wp_customize->selective_refresh->add_partial(
	'lisse_cta_entry_left',
	array(
		'selector' => '.cta-left-entry',
	)
);

$wp_customize->add_setting(
	'lisse_cta_image',
	array(
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'lisse_cta_image',
		array(
			'label'           => __( 'Background Image', 'lisse' ),
			'priority'        => 6,
			'section'         => 'lisse_cta_section',
			'settings'        => 'lisse_cta_image',
			'active_callback' => 'lisse_cta_is_enabled',
		)
	)
);

$wp_customize->selective_refresh->add_partial(
	'lisse_cta_image',
	array(
		'selector' => '.cta-image',
	)
);

$wp_customize->add_setting(
	'lisse_cta_button_enable',
	array(
		'default'           => true,
		'sanitize_callback' => 'lisse_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'lisse_cta_button_enable',
	array(
		'type'            => 'checkbox',
		'label'           => __( 'Enable Button', 'lisse' ),
		'priority'        => 7,
		'section'         => 'lisse_cta_section',
		'active_callback' => 'lisse_cta_is_enabled',
	)
);

$wp_customize->add_setting(
	'lisse_cta_button_title',
	array(
		'default'           => __( 'Learn More', 'lisse' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'lisse_cta_button_title',
	array(
		'label'           => __( 'Button Title', 'lisse' ),
		'priority'        => 8,
		'section'         => 'lisse_cta_section',
		'settings'        => 'lisse_cta_button_title',
		'active_callback' => 'lisse_cta_button_is_enabled',
	)
);

$wp_customize->selective_refresh->add_partial(
	'lisse_cta_button_title',
	array(
		'selector' => '.learn-more',
	)
);

$wp_customize->add_setting(
	'lisse_cta_button_url',
	array(
		'default'           => '#',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'lisse_cta_button_url',
	array(
		'label'           => __( 'Button URL', 'lisse' ),
		'priority'        => 9,
		'section'         => 'lisse_cta_section',
		'settings'        => 'lisse_cta_button_url',
		'active_callback' => 'lisse_cta_button_is_enabled',
	)
);

$wp_customize->add_setting(
	'lisse_cta_right_panel_header',
	array(
		'sanitize_callback' => 'lisse_sanitize_html',
	)
);

$wp_customize->add_control(
	new Lisse_Header_Custom_Control(
		$wp_customize,
		'lisse_cta_right_panel_header',
		array(
			'label'           => __( 'Right Panel', 'lisse' ),
			'priority'        => 10,
			'section'         => 'lisse_cta_section',
			'settings'        => 'lisse_cta_right_panel_header',
			'active_callback' => 'lisse_cta_is_enabled',
		)
	)
);

$wp_customize->add_setting(
	'lisse_cta_entry_right',
	array(
		'sanitize_callback' => 'wp_kses_post',
	)
);

$wp_customize->add_control(
	'lisse_cta_entry_right',
	array(
		'type'            => 'textarea',
		'label'           => __( 'Description', 'lisse' ),
		'priority'        => 11,
		'section'         => 'lisse_cta_section',
		'settings'        => 'lisse_cta_entry_right',
		'active_callback' => 'lisse_cta_is_enabled',
	)
);

$wp_customize->add_setting(
	'lisse_cta_option_one_header',
	array(
		'sanitize_callback' => 'lisse_sanitize_html',
	)
);

$wp_customize->add_control(
	new Lisse_Subheader_Custom_Control(
		$wp_customize,
		'lisse_cta_option_one_header',
		array(
			'label'           => __( 'Option 1', 'lisse' ),
			'priority'        => 12,
			'section'         => 'lisse_cta_section',
			'settings'        => 'lisse_cta_option_one_header',
			'active_callback' => 'lisse_cta_is_enabled',
		)
	)
);

$wp_customize->add_setting(
	'lisse_cta_option_one',
	array(
		'default'           => __( 'Learn More', 'lisse' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'lisse_cta_option_one',
	array(
		'label'           => __( 'Title', 'lisse' ),
		'priority'        => 13,
		'section'         => 'lisse_cta_section',
		'settings'        => 'lisse_cta_option_one',
		'active_callback' => 'lisse_cta_is_enabled',
	)
);

$wp_customize->selective_refresh->add_partial(
	'lisse_cta_option_one',
	array(
		'selector' => '.option-one',
	)
);

$wp_customize->add_setting(
	'lisse_cta_option_one_desc',
	array(
		'default'           => __( 'Lorem ipsum dolor sit amet adipiscing elit, sed do eiusmod tempor incididunt utled laboreet dolore magna', 'lisse' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'lisse_cta_option_one_desc',
	array(
		'label'           => __( 'Description', 'lisse' ),
		'priority'        => 14,
		'section'         => 'lisse_cta_section',
		'settings'        => 'lisse_cta_option_one_desc',
		'active_callback' => 'lisse_cta_is_enabled',
	)
);

$wp_customize->selective_refresh->add_partial(
	'lisse_cta_option_one_desc',
	array(
		'selector' => '.option-one-desc',
	)
);

$wp_customize->add_setting(
	'lisse_cta_option_two_header',
	array(
		'sanitize_callback' => 'lisse_sanitize_html',
	)
);

$wp_customize->add_control(
	new Lisse_Subheader_Custom_Control(
		$wp_customize,
		'lisse_cta_option_two_header',
		array(
			'label'           => __( 'Option 2', 'lisse' ),
			'priority'        => 15,
			'section'         => 'lisse_cta_section',
			'settings'        => 'lisse_cta_option_two_header',
			'active_callback' => 'lisse_cta_is_enabled',
		)
	)
);

$wp_customize->add_setting(
	'lisse_cta_option_two',
	array(
		'default'           => __( 'Intuitive', 'lisse' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'lisse_cta_option_two',
	array(
		'label'           => __( 'Title', 'lisse' ),
		'priority'        => 16,
		'section'         => 'lisse_cta_section',
		'settings'        => 'lisse_cta_option_two',
		'active_callback' => 'lisse_cta_is_enabled',
	)
);

$wp_customize->selective_refresh->add_partial(
	'lisse_cta_option_two',
	array(
		'selector' => '.option-two',
	)
);

$wp_customize->add_setting(
	'lisse_cta_option_two_desc',
	array(
		'default'           => __( 'Lorem ipsum dolor sit amet adipiscing elit, sed do eiusmod tempor incididunt utled laboreet dolore magna', 'lisse' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'lisse_cta_option_two_desc',
	array(
		'label'           => __( 'Description', 'lisse' ),
		'priority'        => 17,
		'section'         => 'lisse_cta_section',
		'settings'        => 'lisse_cta_option_two_desc',
		'active_callback' => 'lisse_cta_is_enabled',
	)
);

$wp_customize->selective_refresh->add_partial(
	'lisse_cta_option_two_desc',
	array(
		'selector' => '.option-two-desc',
	)
);

$wp_customize->add_setting(
	'lisse_cta_option_three_header',
	array(
		'sanitize_callback' => 'lisse_sanitize_html',
	)
);

$wp_customize->add_control(
	new Lisse_Subheader_Custom_Control(
		$wp_customize,
		'lisse_cta_option_three_header',
		array(
			'label'           => __( 'Option 3', 'lisse' ),
			'priority'        => 18,
			'section'         => 'lisse_cta_section',
			'settings'        => 'lisse_cta_option_three_header',
			'active_callback' => 'lisse_cta_is_enabled',
		)
	)
);

$wp_customize->add_setting(
	'lisse_cta_option_three',
	array(
		'default'           => __( 'Optimized', 'lisse' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'lisse_cta_option_three',
	array(
		'label'           => __( 'Title', 'lisse' ),
		'priority'        => 19,
		'section'         => 'lisse_cta_section',
		'settings'        => 'lisse_cta_option_three',
		'active_callback' => 'lisse_cta_is_enabled',
	)
);

$wp_customize->selective_refresh->add_partial(
	'lisse_cta_option_three',
	array(
		'selector' => '.option-three',
	)
);

$wp_customize->add_setting(
	'lisse_cta_option_three_desc',
	array(
		'default'           => __( 'Lorem ipsum dolor sit amet adipiscing elit, sed do eiusmod tempor incididunt utled laboreet dolore magna', 'lisse' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'lisse_cta_option_three_desc',
	array(
		'label'           => __( 'Description', 'lisse' ),
		'priority'        => 20,
		'section'         => 'lisse_cta_section',
		'settings'        => 'lisse_cta_option_three_desc',
		'active_callback' => 'lisse_cta_is_enabled',
	)
);

$wp_customize->selective_refresh->add_partial(
	'lisse_cta_option_three_desc',
	array(
		'selector' => '.option-three-desc',
	)
);

$wp_customize->add_setting(
	'lisse_cta_option_four_header',
	array(
		'sanitize_callback' => 'lisse_sanitize_html',
	)
);

$wp_customize->add_control(
	new Lisse_Subheader_Custom_Control(
		$wp_customize,
		'lisse_cta_option_four_header',
		array(
			'label'           => __( 'Option 4', 'lisse' ),
			'priority'        => 21,
			'section'         => 'lisse_cta_section',
			'settings'        => 'lisse_cta_option_four_header',
			'active_callback' => 'lisse_cta_is_enabled',
		)
	)
);

$wp_customize->add_setting(
	'lisse_cta_option_four',
	array(
		'default'           => __( 'Translatable', 'lisse' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'lisse_cta_option_four',
	array(
		'label'           => __( 'Title', 'lisse' ),
		'priority'        => 22,
		'section'         => 'lisse_cta_section',
		'settings'        => 'lisse_cta_option_four',
		'active_callback' => 'lisse_cta_is_enabled',
	)
);

$wp_customize->selective_refresh->add_partial(
	'lisse_cta_option_four',
	array(
		'selector' => '.option-four',
	)
);

$wp_customize->add_setting(
	'lisse_cta_option_four_desc',
	array(
		'default'           => __( 'Lorem ipsum dolor sit amet adipiscing elit, sed do eiusmod tempor incididunt utled laboreet dolore magna', 'lisse' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'lisse_cta_option_four_desc',
	array(
		'label'           => __( 'Description', 'lisse' ),
		'priority'        => 23,
		'section'         => 'lisse_cta_section',
		'settings'        => 'lisse_cta_option_four_desc',
		'active_callback' => 'lisse_cta_is_enabled',
	)
);

$wp_customize->selective_refresh->add_partial(
	'lisse_cta_option_four_desc',
	array(
		'selector' => '.option-four-desc',
	)
);


/**
 * Active Callbacks
 */

if ( ! function_exists( 'lisse_cta_is_enabled' ) ) {
	/**
	 * Checks if the call to action section is enabled.
	 *
	 * @return bool Whether the call to action section is enabled or not.
	 */
	function lisse_cta_is_enabled() {
		$cta_enabled = get_theme_mod( 'lisse_cta_show', true );
		if ( $cta_enabled ) {
			return true;
		}
		return false;
	}
}

if ( ! function_exists( 'lisse_cta_button_is_enabled' ) ) {
	/**
	 * Checks if the about button is enabled.
	 *
	 * @return bool Whether the call to action button is enabled or not.
	 */
	function lisse_cta_button_is_enabled() {
		$cta_enabled        = get_theme_mod( 'lisse_cta_show', true );
		$cta_button_enabled = get_theme_mod( 'lisse_cta_button_enable', true );

		if ( $cta_enabled && $cta_button_enabled ) {
			return true;
		}
		return false;
	}
}
