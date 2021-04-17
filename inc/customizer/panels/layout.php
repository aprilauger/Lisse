<?php
/**
 * Layout section in the WordPress customizer.
 *
 * This file contains all the settings and controls
 * for the layout section.
 *
 * @package Lisse
 */

$wp_customize->add_section(
	'lisse_theme_layout_options',
	array(
		'title'    => __( 'Layout', 'lisse' ),
		'priority' => 4,
	)
);

$wp_customize->add_setting(
	'lisse_container_type',
	array(
		'default'           => 'container',
		'sanitize_callback' => 'lisse_sanitize_select',
	)
);

$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'lisse_container_type',
		array(
			'type'        => 'select',
			'label'       => __( 'Container Width', 'lisse' ),
			'description' => __( 'Choose between Bootstrap\'s container and container-fluid', 'lisse' ),
			'priority'    => '10',
			'choices'     => array(
				'container'       => __( 'Fixed width container', 'lisse' ),
				'container-fluid' => __( 'Full width container', 'lisse' ),
			),
			'section'     => 'lisse_theme_layout_options',
			'settings'    => 'lisse_container_type',
		)
	)
);

$wp_customize->add_setting(
	'lisse_sidebar_position',
	array(
		'default'           => 'right',
		'sanitize_callback' => 'lisse_sanitize_select',
	)
);

$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'lisse_sidebar_position',
		array(
			'type'        => 'radio',
			'label'       => __( 'Sidebar Positioning', 'lisse' ),
			'description' => __( 'Sidebar positioning can be overridden on individual pages.', 'lisse' ),
			'choices'     => array(
				'right' => __( 'Right sidebar', 'lisse' ),
				'left'  => __( 'Left sidebar', 'lisse' ),
				'both'  => __( 'Left & Right sidebars', 'lisse' ),
				'none'  => __( 'No sidebar', 'lisse' ),
			),
			'priority'    => '20',
			'section'     => 'lisse_theme_layout_options',
			'settings'    => 'lisse_sidebar_position',
		)
	)
);
