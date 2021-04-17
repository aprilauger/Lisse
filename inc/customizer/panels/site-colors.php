<?php
/**
 * Site Colors section in the WordPress customizer
 *
 * This file contains all the settings and controls
 * for the site colors section.
 *
 * @package Lisse
 */

$color           = $wp_customize->get_section( 'colors' );
$color->title    = __( 'Color Scheme', 'lisse' );
$color->priority = 5;

$site_colors[] = array(
	'slug'     => 'primary',
	'default'  => '#0088DB',
	'label'    => __( 'Primary Color', 'lisse' ),
	'priority' => 1,
);

$site_colors[] = array(
	'slug'     => 'secondary',
	'default'  => '#3698ff',
	'label'    => __( 'Secondary Color', 'lisse' ),
	'priority' => 2,
);

$site_colors[] = array(
	'slug'     => 'text',
	'default'  => '#333333',
	'label'    => __( 'Text Color', 'lisse' ),
	'priority' => 3,
);

$site_colors[] = array(
	'slug'     => 'link',
	'default'  => '#0088DB',
	'label'    => __( 'Link Color', 'lisse' ),
	'priority' => 4,
);

$site_colors[] = array(
	'slug'     => 'link_hover',
	'default'  => '#3698FF',
	'label'    => __( 'Hover Color', 'lisse' ),
	'priority' => 5,
);

$site_colors[] = array(
	'slug'     => 'link_active',
	'default'  => '#0088DB',
	'label'    => __( 'Active Color', 'lisse' ),
	'priority' => 6,
);

$site_colors[] = array(
	'slug'     => 'link_visited',
	'default'  => '#0088DB',
	'label'    => __( 'Visited Color', 'lisse' ),
	'priority' => 7,
);

// Settings and controls for each color.
foreach ( $site_colors as $site_color ) {
	$wp_customize->add_setting(
		'lisse_color_scheme_' . $site_color['slug'],
		array(
			'default'           => $site_color['default'],
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new lisse_Customize_Alpha_Color_Control(
			$wp_customize,
			'lisse_color_scheme_' . $site_color['slug'],
			array(
				'label'        => $site_color['label'],
				'section'      => 'colors',
				'show_opacity' => 'true',
				'palette'      => true,
				'priority'     => $site_color['priority'],
				'settings'     => 'lisse_color_scheme_' . $site_color['slug'],
			)
		)
	);
}
