<?php
/**
 * Contact section in the front page customizer panel.
 *
 * This file contains all the settings and controls
 * for the contact section.
 *
 * @package Lisse
 */

$wp_customize->add_section(
	'lisse_contact_section',
	array(
		'title'    => __( 'Contact', 'lisse' ),
		'priority' => 5,
		'panel'    => 'lisse_front_panel',
	)
);

$wp_customize->add_setting(
	'lisse_contact_show',
	array(
		'default'           => false,
		'sanitize_callback' => 'lisse_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'lisse_contact_show',
	array(
		'type'     => 'checkbox',
		'label'    => __( 'Show the Contact section', 'lisse' ),
		'priority' => 1,
		'section'  => 'lisse_contact_section',
		'settings' => 'lisse_contact_show',
	)
);

$wp_customize->add_setting(
	'lisse_contact_title',
	array(
		'default'           => __( 'Contact Us', 'lisse' ),
		'sanitize_callback' => 'lisse_sanitize_html',
	)
);

$wp_customize->add_control(
	'lisse_contact_title',
	array(
		'label'           => __( 'Title', 'lisse' ),
		'priority'        => 2,
		'section'         => 'lisse_contact_section',
		'settings'        => 'lisse_contact_title',
		'active_callback' => 'lisse_contact_is_enabled',
	)
);

$wp_customize->selective_refresh->add_partial(
	'lisse_contact_title',
	array(
		'selector' => '.contact-title',
	)
);

$wp_customize->add_setting(
	'lisse_contact_subtitle',
	array(
		'default'           => __( 'We would love to hear from you!', 'lisse' ),
		'sanitize_callback' => 'lisse_sanitize_html',
	)
);

$wp_customize->add_control(
	'lisse_contact_subtitle',
	array(
		'label'           => __( 'Subtitle', 'lisse' ),
		'priority'        => 3,
		'section'         => 'lisse_contact_section',
		'settings'        => 'lisse_contact_subtitle',
		'active_callback' => 'lisse_contact_is_enabled',
	)
);

$wp_customize->selective_refresh->add_partial(
	'lisse_contact_subtitle',
	array(
		'selector' => '.contact-subtitle',
	)
);

$wp_customize->add_setting(
	'lisse_contact_entry',
	array(
		'default'           => __( 'Lorem ipsum dolor sit ametsed tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'lisse' ),
		'sanitize_callback' => 'wp_kses_post',
	)
);

$wp_customize->add_control(
	'lisse_contact_entry',
	array(
		'type'            => 'textarea',
		'label'           => __( 'Description', 'lisse' ),
		'priority'        => 4,
		'section'         => 'lisse_contact_section',
		'settings'        => 'lisse_contact_entry',
		'active_callback' => 'lisse_contact_is_enabled',
	)
);

$wp_customize->selective_refresh->add_partial(
	'lisse_contact_entry',
	array(
		'selector' => '.contact-entry',
	)
);


$wp_customize->add_setting(
	'lisse_contact_phone_header',
	array(
		'sanitize_callback' => 'lisse_sanitize_html',
	)
);

$wp_customize->add_control(
	new Lisse_Header_Custom_Control(
		$wp_customize,
		'lisse_contact_phone_header',
		array(
			'label'           => __( 'Phone', 'lisse' ),
			'priority'        => 5,
			'section'         => 'lisse_contact_section',
			'settings'        => 'lisse_contact_phone_header',
			'active_callback' => 'lisse_contact_is_enabled',
		)
	)
);

$wp_customize->add_setting(
	'lisse_contact_phone_enable',
	array(
		'default'           => true,
		'sanitize_callback' => 'lisse_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'lisse_contact_phone_enable',
	array(
		'type'            => 'checkbox',
		'label'           => __( 'Enable Phone Button', 'lisse' ),
		'priority'        => 5,
		'section'         => 'lisse_contact_section',
		'settings'        => 'lisse_contact_phone_enable',
		'active_callback' => 'lisse_contact_is_enabled',
	)
);

$wp_customize->add_setting(
	'lisse_contact_phone_title',
	array(
		'default'           => __( 'Call', 'lisse' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'lisse_contact_phone_title',
	array(
		'label'           => __( 'Title', 'lisse' ),
		'priority'        => 6,
		'section'         => 'lisse_contact_section',
		'settings'        => 'lisse_contact_phone_title',
		'active_callback' => 'lisse_contact_phone_button_is_enabled',
	)
);

$wp_customize->add_setting(
	'lisse_contact_phone',
	array(
		'default'           => __( '1-555-555-5555', 'lisse' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'lisse_contact_phone',
	array(
		'label'           => __( 'Phone Number', 'lisse' ),
		'priority'        => 7,
		'section'         => 'lisse_contact_section',
		'settings'        => 'lisse_contact_phone',
		'active_callback' => 'lisse_contact_phone_button_is_enabled',
	)
);

$wp_customize->selective_refresh->add_partial(
	'lisse_contact_phone',
	array(
		'selector' => '.contact-phone',
	)
);

$wp_customize->add_setting(
	'lisse_contact_email_header',
	array(
		'sanitize_callback' => 'lisse_sanitize_html',
	)
);

$wp_customize->add_control(
	new Lisse_Header_Custom_Control(
		$wp_customize,
		'lisse_contact_email_header',
		array(
			'label'           => __( 'Email', 'lisse' ),
			'priority'        => 8,
			'section'         => 'lisse_contact_section',
			'settings'        => 'lisse_contact_email_header',
			'active_callback' => 'lisse_contact_is_enabled',
		)
	)
);

$wp_customize->add_setting(
	'lisse_contact_email_enable',
	array(
		'default'           => true,
		'sanitize_callback' => 'lisse_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'lisse_contact_email_enable',
	array(
		'type'            => 'checkbox',
		'label'           => __( 'Enable Email Button', 'lisse' ),
		'priority'        => 9,
		'section'         => 'lisse_contact_section',
		'settings'        => 'lisse_contact_email_enable',
		'active_callback' => 'lisse_contact_is_enabled',
	)
);

$wp_customize->add_setting(
	'lisse_contact_email_title',
	array(
		'default'           => __( 'Email', 'lisse' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'lisse_contact_email_title',
	array(
		'label'           => __( 'Title', 'lisse' ),
		'priority'        => 10,
		'section'         => 'lisse_contact_section',
		'settings'        => 'lisse_contact_email_title',
		'active_callback' => 'lisse_contact_email_button_is_enabled',
	)
);

$wp_customize->add_setting(
	'lisse_contact_email',
	array(
		'default'           => __( 'info@yourwebsite.com', 'lisse' ),
		'sanitize_callback' => 'sanitize_email',
	)
);

$wp_customize->add_control(
	'lisse_contact_email',
	array(
		'label'           => __( 'Email', 'lisse' ),
		'priority'        => 11,
		'section'         => 'lisse_contact_section',
		'settings'        => 'lisse_contact_email',
		'active_callback' => 'lisse_contact_email_button_is_enabled',
	)
);

$wp_customize->selective_refresh->add_partial(
	'lisse_contact_email',
	array(
		'selector' => '.contact-email',
	)
);

$wp_customize->add_setting(
	'lisse_contact_image_header',
	array(
		'sanitize_callback' => 'lisse_sanitize_html',
	)
);

$wp_customize->add_control(
	new Lisse_Header_Custom_Control(
		$wp_customize,
		'lisse_contact_image_header',
		array(
			'label'           => __( 'Image', 'lisse' ),
			'priority'        => 12,
			'section'         => 'lisse_contact_section',
			'settings'        => 'lisse_contact_image_header',
			'active_callback' => 'lisse_contact_is_enabled',
		)
	)
);

$wp_customize->add_setting(
	'lisse_contact_image',
	array(
		'default'           => get_template_directory_uri() . '/assets/img/contact.jpg',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'lisse_contact_image',
		array(
			'label'           => __( 'Image', 'lisse' ),
			'priority'        => 13,
			'section'         => 'lisse_contact_section',
			'settings'        => 'lisse_contact_image',
			'active_callback' => 'lisse_contact_is_enabled',
		)
	)
);

$wp_customize->selective_refresh->add_partial(
	'lisse_contact_image',
	array(
		'selector' => '.contact-image',
	)
);

/**
 * Active Callbacks
 */

if ( ! function_exists( 'lisse_contact_is_enabled' ) ) {
	/**
	 * Checks if the contact section is enabled.
	 *
	 * @return bool Whether the contact section is enabled or not.
	 */
	function lisse_contact_is_enabled() {
		$contact_enabled = get_theme_mod( 'lisse_contact_show', false );

		if ( $contact_enabled ) {
			return true;
		}
		return false;
	}
}

if ( ! function_exists( 'lisse_contact_phone_button_is_enabled' ) ) {
	/**
	 * Checks if the phone button is enabled.
	 *
	 * @return bool Whether the phone button is enabled or not.
	 */
	function lisse_contact_phone_button_is_enabled() {
		$contact_enabled              = get_theme_mod( 'lisse_contact_show', false );
		$contact_phone_button_enabled = get_theme_mod( 'lisse_contact_phone_enable', true );

		if ( $contact_enabled && $contact_phone_button_enabled ) {
			return true;
		}
		return false;
	}
}

if ( ! function_exists( 'lisse_contact_email_button_is_enabled' ) ) {
	/**
	 * Checks if the email button is enabled.
	 *
	 * @return bool Whether the email button is enabled or not.
	 */
	function lisse_contact_email_button_is_enabled() {
		$contact_enabled              = get_theme_mod( 'lisse_contact_show', false );
		$contact_email_button_enabled = get_theme_mod( 'lisse_contact_email_enable', true );

		if ( $contact_enabled && $contact_email_button_enabled ) {
			return true;
		}
		return false;
	}
}
