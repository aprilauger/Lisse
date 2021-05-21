<?php
/**
 * Header section in the WordPress customizer.
 *
 * This file contains all the settings and controls
 * for the header section.
 *
 * @package Lisse
 */

// Set panel ID.
$lisse_panel_id = 'lisse_header_panel';

/**
 * Site Identity Section
 *
 * Places the WordPress Site Identity section into the header panal
 */
$lisse_site_title        = $wp_customize->get_section( 'title_tagline' );
$lisse_site_title->panel = $lisse_panel_id;

$wp_customize->add_panel(
	$lisse_panel_id,
	array(
		'title'    => __( 'Header', 'lisse' ),
		'priority' => 2,
	)
);

$wp_customize->add_section(
	'lisse_header_general_section',
	array(
		'title'    => __( 'General', 'lisse' ),
		'priority' => 1,
		'panel'    => $lisse_panel_id,
	)
);

$wp_customize->add_setting(
	'lisse_header_general_sticky_enable',
	array(
		'default'           => false,
		'sanitize_callback' => 'lisse_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'lisse_header_general_sticky_enable',
	array(
		'type'        => 'checkbox',
		'label'       => __( 'Enable sticky header', 'lisse' ),
		'description' => __( 'If checked, the menu will always be visible as your users scroll the page.', 'lisse' ),
		'priority'    => 1,
		'section'     => 'lisse_header_general_section',
		'settings'    => 'lisse_header_general_sticky_enable',
	)
);

$wp_customize->add_setting(
	'lisse_header_general_case',
	array(
		'default'           => 'capitalize',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'lisse_header_general_case',
	array(
		'type'     => 'select',
		'label'    => __( 'Letter Case', 'lisse' ),
		'choices'  => array(
			'capitalize' => __( 'Capitalize', 'lisse' ),
			'uppercase'  => __( 'Uppercase', 'lisse' ),
			'lowercase'  => __( 'Lowercase', 'lisse' ),
		),
		'priority' => 2,
		'section'  => 'lisse_header_general_section',
		'settings' => 'lisse_header_general_case',
	)
);

$wp_customize->add_section(
	'lisse_header_top_section',
	array(
		'title'    => __( 'Top Menu Bar', 'lisse' ),
		'priority' => 2,
		'panel'    => $lisse_panel_id,
	)
);

$wp_customize->add_setting(
	'lisse_header_top_enable',
	array(
		'default'           => false,
		'sanitize_callback' => 'lisse_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'lisse_header_top_enable',
	array(
		'type'     => 'checkbox',
		'label'    => __( 'Enable Top Bar', 'lisse' ),
		'priority' => 1,
		'section'  => 'lisse_header_top_section',
		'settings' => 'lisse_header_top_enable',
	)
);

$wp_customize->selective_refresh->add_partial(
	'lisse_header_top_enable',
	array(
		'selector' => '.top',
	)
);

$wp_customize->add_setting(
	'lisse_header_top_account_link_enable',
	array(
		'default'           => false,
		'sanitize_callback' => 'lisse_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'lisse_header_top_account_link_enable',
	array(
		'type'            => 'checkbox',
		'label'           => __( 'Enable login/logout link', 'lisse' ),
		'priority'        => 2,
		'section'         => 'lisse_header_top_section',
		'settings'        => 'lisse_header_top_account_link_enable',
		'active_callback' => 'lisse_header_top_enabled',
	)
);

$wp_customize->add_setting(
	'lisse_header_top_social_icons_header',
	array(
		'sanitize_callback' => 'lisse_sanitize_html',
	)
);

$wp_customize->add_control(
	new Lisse_Header_Custom_Control(
		$wp_customize,
		'lisse_header_top_social_icons_header',
		array(
			'label'           => __( 'Social Media', 'lisse' ),
			'priority'        => 3,
			'section'         => 'lisse_header_top_section',
			'settings'        => 'lisse_header_top_social_icons_header',
			'active_callback' => 'lisse_header_top_enabled',
		)
	)
);

$wp_customize->add_setting(
	'lisse_header_top_social_icons_enable',
	array(
		'default'           => false,
		'sanitize_callback' => 'lisse_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'lisse_header_top_social_icons_enable',
	array(
		'type'            => 'checkbox',
		'label'           => __( 'Display Social Icons?', 'lisse' ),
		'priority'        => 4,
		'section'         => 'lisse_header_top_section',
		'settings'        => 'lisse_header_top_social_icons_enable',
		'active_callback' => 'lisse_header_top_enabled',
	)
);

// Social media links.
$sm_urls[] = array(
	'slug'     => 'facebook',
	'label'    => __( 'Facebook', 'lisse' ),
	'default'  => '#',
	'priority' => 5,
);

$sm_urls[] = array(
	'slug'     => 'twitter',
	'label'    => __( 'Twitter', 'lisse' ),
	'default'  => '#',
	'priority' => 6,
);

$sm_urls[] = array(
	'slug'     => 'linkedin',
	'label'    => __( 'LinkedIn', 'lisse' ),
	'default'  => '#',
	'priority' => 7,
);

$sm_urls[] = array(
	'slug'     => 'instagram',
	'label'    => __( 'Instagram', 'lisse' ),
	'default'  => '',
	'priority' => 8,
);

$sm_urls[] = array(
	'slug'     => 'pinterest',
	'label'    => __( 'Pinterest', 'lisse' ),
	'default'  => '',
	'priority' => 9,
);

$sm_urls[] = array(
	'slug'     => 'google',
	'label'    => __( 'Google', 'lisse' ),
	'default'  => '',
	'priority' => 10,
);

$sm_urls[] = array(
	'slug'     => 'vimeo',
	'label'    => __( 'Vimeo', 'lisse' ),
	'default'  => '',
	'priority' => 11,
);

// Settings and controls for social media links.
foreach ( $sm_urls as $sm_url ) {
	$wp_customize->add_setting(
		'lisse_header_top_' . $sm_url['slug'],
		array(
			'default'           => $sm_url['default'],
			'transport'         => 'refresh',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'lisse_header_top_' . $sm_url['slug'],
		array(
			'label'           => $sm_url['label'],
			'priority'        => $sm_url['priority'],
			'section'         => 'lisse_header_top_section',
			'settings'        => 'lisse_header_top_' . $sm_url['slug'],
			'active_callback' => 'lisse_header_top_enabled',
		)
	);
}

$wp_customize->add_setting(
	'lisse_header_top_contact_header',
	array(
		'sanitize_callback' => 'lisse_sanitize_html',
	)
);

$wp_customize->add_control(
	new Lisse_Header_Custom_Control(
		$wp_customize,
		'lisse_header_top_contact_header',
		array(
			'label'           => __( 'Contact Information', 'lisse' ),
			'priority'        => 12,
			'section'         => 'lisse_header_top_section',
			'settings'        => 'lisse_header_top_contact_header',
			'active_callback' => 'lisse_header_top_enabled',
		)
	)
);

$wp_customize->add_setting(
	'lisse_header_top_phone',
	array(
		'default'           => '(916) 222-3333',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'lisse_header_top_phone',
	array(
		'label'           => __( 'Phone', 'lisse' ),
		'priority'        => 13,
		'section'         => 'lisse_header_top_section',
		'settings'        => 'lisse_header_top_phone',
		'active_callback' => 'lisse_header_top_enabled',
	)
);

$wp_customize->add_setting(
	'lisse_header_top_email',
	array(
		'default'           => 'info@yourwebsite.com',
		'sanitize_callback' => 'sanitize_email',
	)
);

$wp_customize->add_control(
	'lisse_header_top_email',
	array(
		'label'           => __( 'Email', 'lisse' ),
		'priority'        => 14,
		'section'         => 'lisse_header_top_section',
		'settings'        => 'lisse_header_top_email',
		'active_callback' => 'lisse_header_top_enabled',
	)
);

$wp_customize->add_setting(
	'lisse_header_top_cta_header',
	array(
		'sanitize_callback' => 'lisse_sanitize_html',
	)
);

$wp_customize->add_control(
	new Lisse_Header_Custom_Control(
		$wp_customize,
		'lisse_header_top_cta_header',
		array(
			'label'           => __( 'Call to Action', 'lisse' ),
			'priority'        => 15,
			'section'         => 'lisse_header_top_section',
			'settings'        => 'lisse_header_top_cta_header',
			'active_callback' => 'lisse_header_top_enabled',
		)
	)
);

$wp_customize->add_setting(
	'lisse_header_top_cta_btn',
	array(
		'default'           => 'Sign Up',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'lisse_header_top_cta_btn',
	array(
		'label'           => __( 'Button Text', 'lisse' ),
		'priority'        => 16,
		'section'         => 'lisse_header_top_section',
		'settings'        => 'lisse_header_top_cta_btn',
		'active_callback' => 'lisse_header_top_enabled',
	)
);

$wp_customize->add_setting(
	'lisse_header_top_cta_btn_url',
	array(
		'default'           => '#',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'lisse_header_top_cta_btn_url',
	array(
		'label'           => __( 'URL', 'lisse' ),
		'priority'        => 17,
		'section'         => 'lisse_header_top_section',
		'settings'        => 'lisse_header_top_cta_btn_url',
		'active_callback' => 'lisse_header_top_enabled',
	)
);

$wp_customize->add_setting(
	'lisse_header_top_colors_header',
	array(
		'sanitize_callback' => 'lisse_sanitize_html',
	)
);

$wp_customize->add_control(
	new Lisse_Header_Custom_Control(
		$wp_customize,
		'lisse_header_top_colors_header',
		array(
			'label'           => __( 'Colors', 'lisse' ),
			'priority'        => 18,
			'section'         => 'lisse_header_top_section',
			'settings'        => 'lisse_header_top_cta_header',
			'active_callback' => 'lisse_header_top_enabled',
		)
	)
);

// Top header colors.
$top_header_colors[] = array(
	'slug'     => 'bkgd',
	'label'    => __( 'Background', 'lisse' ),
	'default'  => '#212121',
	'priority' => 19,
);

$top_header_colors[] = array(
	'slug'     => 'bdr',
	'label'    => __( 'Border', 'lisse' ),
	'default'  => '#FFFFFF',
	'priority' => 20,
);

$top_header_colors[] = array(
	'slug'     => 'link',
	'label'    => __( 'Link', 'lisse' ),
	'default'  => '#FFFFFF',
	'priority' => 21,
);

$top_header_colors[] = array(
	'slug'     => 'hover',
	'label'    => __( 'Hover', 'lisse' ),
	'default'  => '#2e91d4',
	'priority' => 22,
);

// Top header color settings and controls.
foreach ( $top_header_colors as $top_header_color ) {
	$wp_customize->add_setting(
		'lisse_header_top_' . $top_header_color['slug'],
		array(
			'default'           => $top_header_color['default'],
			'sanitize_callback' => 'lisse_sanitize_color',
		)
	);

	$wp_customize->add_control(
		new lisse_Customize_Alpha_Color_Control(
			$wp_customize,
			'lisse_header_top_' . $top_header_color['slug'],
			array(
				'label'           => $top_header_color['label'],
				'priority'        => $top_header_color['priority'],
				'section'         => 'lisse_header_top_section',
				'settings'        => 'lisse_header_top_' . $top_header_color['slug'],
				'active_callback' => 'lisse_header_top_enabled',
			)
		)
	);
}

$wp_customize->add_section(
	'lisse_header_primary_section',
	array(
		'title'    => __( 'Primary Menu', 'lisse' ),
		'priority' => 3,
		'panel'    => $lisse_panel_id,
	)
);

// Primary header colors.
$primary_header_colors[] = array(
	'slug'     => 'bkgd',
	'label'    => __( 'Background Color', 'lisse' ),
	'default'  => '#FFFFFF',
	'priority' => 1,
);

$primary_header_colors[] = array(
	'slug'     => 'bkgd_scroll',
	'label'    => __( 'Scroll Background Color', 'lisse' ),
	'default'  => '#FFFFFF',
	'priority' => 2,
);

$primary_header_colors[] = array(
	'slug'     => 'link',
	'label'    => __( 'Link Color', 'lisse' ),
	'default'  => '#212121',
	'priority' => 3,
);

$primary_header_colors[] = array(
	'slug'     => 'visited',
	'label'    => __( 'Visited Color', 'lisse' ),
	'default'  => '#212121',
	'priority' => 4,
);

$primary_header_colors[] = array(
	'slug'     => 'hover',
	'label'    => __( 'Hover Color', 'lisse' ),
	'default'  => '#0277BB',
	'priority' => 5,
);

$primary_header_colors[] = array(
	'slug'     => 'active',
	'label'    => __( 'Active Color', 'lisse' ),
	'default'  => '#0277BB',
	'priority' => 6,
);

// Primary navigation color settings and controls.
foreach ( $primary_header_colors as $primary_header_color ) {
	$wp_customize->add_setting(
		'lisse_header_primary_' . $primary_header_color['slug'],
		array(
			'default'           => $primary_header_color['default'],
			'sanitize_callback' => 'lisse_sanitize_color',
		)
	);

	$wp_customize->add_control(
		new lisse_Customize_Alpha_Color_Control(
			$wp_customize,
			'lisse_header_primary_' . $primary_header_color['slug'],
			array(
				'label'        => $primary_header_color['label'],
				'priority'     => $primary_header_color['priority'],
				'show_opacity' => 'TRUE',
				'palette'      => true,
				'section'      => 'lisse_header_primary_section',
				'settings'     => 'lisse_header_primary_' . $primary_header_color['slug'],
			)
		)
	);
}

$wp_customize->add_section(
	'lisse_header_title_section',
	array(
		'title'    => __( 'Title Block', 'lisse' ),
		'priority' => 4,
		'panel'    => $lisse_panel_id,
	)
);

$wp_customize->add_setting(
	'lisse_blog_enable_parallax',
	array(
		'default'           => true,
		'sanitize_callback' => 'lisse_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'lisse_blog_enable_parallax',
	array(
		'type'     => 'checkbox',
		'label'    => __( 'Enable Parallax Effect', 'lisse' ),
		'priority' => 1,
		'section'  => 'lisse_header_title_section',
		'settings' => 'lisse_blog_enable_parallax',
	)
);

$wp_customize->add_setting(
	'lisse_header_title_content_alignment',
	array(
		'default'           => 'left',
		'sanitize_callback' => 'lisse_sanitize_content_alignment',
	)
);

$wp_customize->add_control(
	'lisse_header_title_content_alignment',
	array(
		'type'     => 'select',
		'label'    => __( 'Content Alignment', 'lisse' ),
		'priority' => 2,
		'choices'  =>
			array(
				'left'   => __( 'Left', 'lisse' ),
				'center' => __( 'Center', 'lisse' ),
				'right'  => __( 'Right', 'lisse' ),
			),
		'section'  => 'lisse_header_title_section',
		'settings' => 'lisse_header_title_content_alignment',
	)
);

$wp_customize->add_setting(
	'lisse_header_title_bkgd',
	array(
		'default'           => '#0277BB',
		'sanitize_callback' => 'lisse_sanitize_color',
	)
);

$wp_customize->add_control(
	new lisse_Customize_Alpha_Color_Control(
		$wp_customize,
		'lisse_header_title_bkgd',
		array(
			'label'        => __( 'Background Color', 'lisse' ),
			'priority'     => 3,
			'show_opacity' => 'TRUE',
			'palette'      => true,
			'section'      => 'lisse_header_title_section',
			'settings'     => 'lisse_header_title_bkgd',
		)
	)
);

$wp_customize->add_setting(
	'lisse_header_general_title_frgd',
	array(
		'default'           => '#FFFFFF',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new lisse_Customize_Alpha_Color_Control(
		$wp_customize,
		'lisse_header_general_title_frgd',
		array(
			'label'        => __( 'Foreground Color', 'lisse' ),
			'priority'     => 4,
			'show_opacity' => 'FALSE',
			'palette'      => true,
			'section'      => 'lisse_header_title_section',
			'settings'     => 'lisse_header_general_title_frgd',
		)
	)
);

/**
 * Active Callbacks
 */

if ( ! function_exists( 'lisse_header_top_enabled' ) ) {
	/**
	 * Checks if the top menu is enabled.
	 *
	 * @return bool Whether the top menu is enabled or not.
	 */
	function lisse_header_top_enabled() {
		$top_enabled = get_theme_mod( 'lisse_header_top_enable', true );
		if ( $top_enabled ) {
			return true;
		}
		return false;
	}
}
