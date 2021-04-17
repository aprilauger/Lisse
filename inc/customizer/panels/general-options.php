<?php
/**
 * General Options section in the WordPress customizer.
 *
 * This file contains all the settings and controls
 * for the general options section.
 *
 * @package Lisse
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$lisse_panel_id = 'lisse_general_panel';

$wp_customize->add_panel(
	$lisse_panel_id,
	array(
		'priority' => 1,
		'title'    => __( 'General', 'lisse' ),
	)
);

$wp_customize->add_section(
	'lisse_general_settings_section',
	array(
		'title'    => __( 'Settings', 'lisse' ),
		'priority' => 1,
		'panel'    => $lisse_panel_id,
	)
);

$wp_customize->add_setting(
	'lisse_general_animation_enable',
	array(
		'default'           => true,
		'sanitize_callback' => 'lisse_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'lisse_general_animation_enable',
	array(
		'label'    => __( 'Enable Animation', 'lisse' ),
		'section'  => 'lisse_general_settings_section',
		'priority' => 1,
		'type'     => 'checkbox',
		'settings' => 'lisse_general_animation_enable',
	)
);

$wp_customize->add_section(
	'lisse_general_404_page',
	array(
		'title'       => __( '404 Page Settings', 'lisse' ),
		'priority'    => 2,
		'description' => __( 'From this section, you can change your 404 page settings.', 'lisse' ),
		'panel'       => $lisse_panel_id,
	)
);

$wp_customize->add_setting(
	'lisse_general_404_title',
	array(
		'default'           => __( 'Page not found', 'lisse' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'lisse_general_404_title',
	array(
		'label'    => __( '404 Page Title', 'lisse' ),
		'section'  => 'lisse_general_404_page',
		'priority' => 1,
		'settings' => 'lisse_general_404_title',
	)
);

$wp_customize->add_setting(
	'lisse_general_404_content',
	array(
		'default'           => __( 'Sorry, the page you were looking for could not be found.', 'lisse' ),
		'sanitize_callback' => 'wp_kses_post',
	)
);

$wp_customize->add_control(
	'lisse_general_404_content',
	array(
		'label'       => __( '404 Page', 'lisse' ),
		'description' => __( 'Custom textarea', 'lisse' ),
		'section'     => 'lisse_general_404_page',
		'priority'    => 2,
		'type'        => 'textarea',
		'settings'    => 'lisse_general_404_content',
	)
);

$wp_customize->add_setting(
	'lisse_general_404_button_label',
	array(
		'default'           => __( 'Home', 'lisse' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'lisse_general_404_button_label',
	array(
		'label'    => __( '404 Page Button Label', 'lisse' ),
		'section'  => 'lisse_general_404_page',
		'priority' => 3,
		'settings' => 'lisse_general_404_button_label',
	)
);
