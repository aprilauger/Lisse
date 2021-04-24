<?php
/**
 * Footer section in the WordPress customizer.
 *
 * This file contains all the settings and controls
 * for the footer section.
 *
 * @package Lisse
 */

$lisse_panel_id = 'lisse_footer_panel';

$wp_customize->add_panel(
	$lisse_panel_id,
	array(
		'title'    => __( 'Footer', 'lisse' ),
		'priority' => 9,
	)
);

$wp_customize->add_section(
	'lisse_footer_general_section',
	array(
		'title'    => __( 'General Options', 'lisse' ),
		'priority' => 1,
		'panel'    => $lisse_panel_id,
	)
);

$wp_customize->add_setting(
	'lisse_footer_enable',
	array(
		'default'           => true,
		'sanitize_callback' => 'lisse_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'lisse_footer_enable',
	array(
		'type'        => 'checkbox',
		'label'       => __( 'Enable Footer', 'lisse' ),
		'description' => __( 'Displays the footer on all pages.', 'lisse' ),
		'priority'    => 1,
		'section'     => 'lisse_footer_general_section',
		'settings'    => 'lisse_footer_enable',
	)
);

$wp_customize->add_setting(
	'lisse_footer_social_icons_enable',
	array(
		'default'           => true,
		'sanitize_callback' => 'lisse_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'lisse_footer_social_icons_enable',
	array(
		'type'            => 'checkbox',
		'label'           => __( 'Display Social Icons', 'lisse' ),
		'description'     => __( 'If enabled, the social media links you added to the top menu bar will display in the footer.', 'lisse' ),
		'priority'        => 2,
		'section'         => 'lisse_footer_general_section',
		'settings'        => 'lisse_footer_social_icons_enable',
		'active_callback' => 'lisse_footer_enabled',
	)
);

$wp_customize->selective_refresh->add_partial(
	'lisse_footer_social_icons_enable',
	array(
		'selector' => '.footer-social',
	)
);

$wp_customize->add_setting(
	'lisse_footer_color_header',
	array(
		'sanitize_callback' => 'lisse_sanitize_html',
	)
);

$wp_customize->add_control(
	new Lisse_Header_Custom_Control(
		$wp_customize,
		'lisse_footer_color_header',
		array(
			'label'           => __( 'Colors', 'lisse' ),
			'priority'        => 3,
			'section'         => 'lisse_footer_general_section',
			'settings'        => 'lisse_footer_color_header',
			'active_callback' => 'lisse_footer_enabled',
		)
	)
);

$footer_colors[] = array(
	'slug'     => 'frgd',
	'label'    => __( 'Foreground', 'lisse' ),
	'default'  => '#aaaaaa',
	'priority' => 4,
);

$footer_colors[] = array(
	'slug'     => 'bkgd',
	'label'    => __( 'Background', 'lisse' ),
	'default'  => '#212121',
	'priority' => 5,
);

$footer_colors[] = array(
	'slug'     => 'copy_bkgd',
	'label'    => __( 'Copyright Background', 'lisse' ),
	'default'  => '#181818',
	'priority' => 6,
);

$footer_colors[] = array(
	'slug'     => 'header',
	'label'    => __( 'Header', 'lisse' ),
	'default'  => '#ffffff',
	'priority' => 7,
);

$footer_colors[] = array(
	'slug'     => 'link',
	'label'    => __( 'Link', 'lisse' ),
	'default'  => '#aaaaaa',
	'priority' => 8,
);

$footer_colors[] = array(
	'slug'     => 'visited',
	'label'    => __( 'Visited', 'lisse' ),
	'default'  => '#aaaaaa',
	'priority' => 9,
);

$footer_colors[] = array(
	'slug'     => 'hover',
	'label'    => __( 'Hover Color', 'lisse' ),
	'default'  => '#3698FF',
	'priority' => 10,
);

/**
 * Color settings and controls.
 */
foreach ( $footer_colors as $footer_colors ) {
	// Settings for each color.
	$wp_customize->add_setting(
		'lisse_footer_' . $footer_colors['slug'],
		array(
			'default'           => $footer_colors['default'],
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Controls for each color.
	$wp_customize->add_control(
		new lisse_Customize_Alpha_Color_Control(
			$wp_customize,
			'lisse_footer_' . $footer_colors['slug'],
			array(
				'label'           => $footer_colors['label'],
				'section'         => 'lisse_footer_general_section',
				'priority'        => $footer_colors['priority'],
				'settings'        => 'lisse_footer_' . $footer_colors['slug'],
				'active_callback' => 'lisse_footer_enabled',
			)
		)
	);
}

$wp_customize->add_setting(
	'lisse_footer_image_header',
	array(
		'sanitize_callback' => 'lisse_sanitize_html',
	)
);

$wp_customize->add_control(
	new Lisse_Header_Custom_Control(
		$wp_customize,
		'lisse_footer_image_header',
		array(
			'label'           => __( 'Background Image', 'lisse' ),
			'priority'        => 11,
			'section'         => 'lisse_footer_general_section',
			'settings'        => 'lisse_footer_image_header',
			'active_callback' => 'lisse_footer_enabled',
		)
	)
);

$wp_customize->add_setting(
	'lisse_footer_general_image',
	array(
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'lisse_footer_general_image',
		array(
			'priority'        => 12,
			'section'         => 'lisse_footer_general_section',
			'settings'        => 'lisse_footer_general_image',
			'active_callback' => 'lisse_footer_enabled',
		)
	)
);

$wp_customize->add_section(
	'lisse_footer_col_one_section',
	array(
		'title'    => __( 'Column One', 'lisse' ),
		'priority' => 1,
		'panel'    => $lisse_panel_id,
	)
);

$wp_customize->add_setting(
	'lisse_footer_col_one_title',
	array(
		'default'           => __( 'Contact', 'lisse' ),
		'sanitize_callback' => 'lisse_sanitize_html',
	)
);

$wp_customize->add_control(
	'lisse_footer_col_one_title',
	array(
		'label'           => __( 'Title', 'lisse' ),
		'priority'        => 1,
		'section'         => 'lisse_footer_col_one_section',
		'settings'        => 'lisse_footer_col_one_title',
		'active_callback' => 'lisse_footer_enabled',
	)
);

$wp_customize->selective_refresh->add_partial(
	'lisse_footer_col_one_title',
	array(
		'selector' => '.col-one',
	)
);

$wp_customize->add_setting(
	'lisse_footer_col_one_logo',
	array(
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'lisse_footer_col_one_logo',
		array(
			'label'           => __( 'Logo', 'lisse' ),
			'priority'        => 2,
			'section'         => 'lisse_footer_col_one_section',
			'settings'        => 'lisse_footer_col_one_logo',
			'active_callback' => 'lisse_footer_enabled',
		)
	)
);

$wp_customize->selective_refresh->add_partial(
	'lisse_footer_col_one_logo',
	array(
		'selector' => '.col-one',
	)
);

$wp_customize->add_setting(
	'lisse_footer_col_one_address',
	array(
		'default'           => __( '12 Broadway, Sacramento, CA 95818', 'lisse' ),
		'sanitize_callback' => 'lisse_sanitize_html',
	)
);

$wp_customize->add_control(
	'lisse_footer_col_one_address',
	array(
		'label'           => __( 'Address', 'lisse' ),
		'priority'        => 3,
		'section'         => 'lisse_footer_col_one_section',
		'settings'        => 'lisse_footer_col_one_address',
		'active_callback' => 'lisse_footer_enabled',
	)
);

$wp_customize->add_setting(
	'lisse_footer_col_one_entry',
	array(
		'sanitize_callback' => 'wp_kses_post',
	)
);

$wp_customize->add_control(
	'lisse_footer_col_one_entry',
	array(
		'type'            => 'textarea',
		'label'           => __( 'Description', 'lisse' ),
		'priority'        => 4,
		'section'         => 'lisse_footer_col_one_section',
		'settings'        => 'lisse_footer_col_one_entry',
		'active_callback' => 'lisse_footer_enabled',
	)
);

$wp_customize->add_setting(
	'lisse_footer_col_one_phone',
	array(
		'default'           => '(916) 222-3333',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'lisse_footer_col_one_phone',
	array(
		'label'           => __( 'Phone', 'lisse' ),
		'priority'        => 5,
		'section'         => 'lisse_footer_col_one_section',
		'settings'        => 'lisse_footer_col_one_phone',
		'active_callback' => 'lisse_footer_enabled',
	)
);

$wp_customize->add_setting(
	'lisse_footer_col_one_email',
	array(
		'default'           => 'info@yourwebsite.com',
		'sanitize_callback' => 'sanitize_email',
	)
);

$wp_customize->add_control(
	'lisse_footer_col_one_email',
	array(
		'label'           => __( 'Email', 'lisse' ),
		'priority'        => 6,
		'section'         => 'lisse_footer_col_one_section',
		'settings'        => 'lisse_footer_col_one_email',
		'active_callback' => 'lisse_footer_enabled',
	)
);

$wp_customize->add_section(
	'lisse_footer_col_two_section',
	array(
		'title'    => __( 'Column Two', 'lisse' ),
		'priority' => 2,
		'panel'    => $lisse_panel_id,
	)
);

$wp_customize->add_setting(
	'lisse_footer_col_two_title',
	array(
		'default'           => __( 'Resources', 'lisse' ),
		'sanitize_callback' => 'lisse_sanitize_html',
	)
);

$wp_customize->add_control(
	'lisse_footer_col_two_title',
	array(
		'label'           => __( 'Title', 'lisse' ),
		'priority'        => 1,
		'section'         => 'lisse_footer_col_two_section',
		'settings'        => 'lisse_footer_col_two_title',
		'active_callback' => 'lisse_footer_enabled',
	)
);

$wp_customize->selective_refresh->add_partial(
	'lisse_footer_col_two_title',
	array(
		'selector' => '.col-two',
	)
);

$wp_customize->add_setting(
	'lisse_footer_col_two_entry',
	array(
		'default'           => '<ul><li><a href="/#" title="About">About</a></li><li><a href="/#" title="Terms & Conditions">Terms & Conditions</a></li><li><a href="/#" title="Privacy Policy">Privacy Policy</a></li></ul>',
		'sanitize_callback' => 'wp_kses_post',
	)
);

$wp_customize->add_control(
	'lisse_footer_col_two_entry',
	array(
		'type'            => 'textarea',
		'label'           => __( 'Description', 'lisse' ),
		'priority'        => 2,
		'section'         => 'lisse_footer_col_two_section',
		'settings'        => 'lisse_footer_col_two_entry',
		'active_callback' => 'lisse_footer_enabled',
	)
);

$wp_customize->add_section(
	'lisse_footer_col_three_section',
	array(
		'title'    => __( 'Column Three', 'lisse' ),
		'priority' => 3,
		'panel'    => $lisse_panel_id,
	)
);

$wp_customize->add_setting(
	'lisse_footer_col_three_title',
	array(
		'sanitize_callback' => 'lisse_sanitize_html',
	)
);

$wp_customize->add_control(
	'lisse_footer_col_three_title',
	array(
		'label'           => __( 'Title', 'lisse' ),
		'priority'        => 1,
		'section'         => 'lisse_footer_col_three_section',
		'settings'        => 'lisse_footer_col_three_title',
		'active_callback' => 'lisse_footer_enabled',
	)
);

$wp_customize->selective_refresh->add_partial(
	'lisse_footer_col_three_title',
	array(
		'selector' => '.col-three',
	)
);

$wp_customize->add_setting(
	'lisse_footer_col_three_entry',
	array(
		'default'           => __( '<blockquote>It is not in the stars to hold our destiny but in ourselves.<cite>– William Shakespeare</cite></blockquote>', 'lisse' ),
		'sanitize_callback' => 'wp_kses_post',
	)
);

$wp_customize->add_control(
	'lisse_footer_col_three_entry',
	array(
		'label'           => __( 'Description', 'lisse' ),
		'type'            => 'textarea',
		'priority'        => 2,
		'section'         => 'lisse_footer_col_three_section',
		'settings'        => 'lisse_footer_col_three_entry',
		'active_callback' => 'lisse_footer_enabled',
	)
);

$wp_customize->add_section(
	'lisse_footer_copyright_section',
	array(
		'title'    => __( 'Copyright', 'lisse' ),
		'priority' => 4,
		'panel'    => $lisse_panel_id,
	)
);

$wp_customize->add_setting(
	'lisse_footer_copyright_show',
	array(
		'default'           => true,
		'sanitize_callback' => 'lisse_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'lisse_footer_copyright_show',
	array(
		'type'            => 'checkbox',
		'label'           => __( 'Show copyright', 'lisse' ),
		'priority'        => 1,
		'section'         => 'lisse_footer_copyright_section',
		'settings'        => 'lisse_footer_copyright_show',
		'active_callback' => 'lisse_footer_enabled',
	)
);

$wp_customize->add_setting(
	'lisse_footer_copyright',
	array(
		'sanitize_callback' => 'lisse_sanitize_html',
		// translators: copyright message.
		'default'           => esc_html( __( '&copy; 2021 Lisse. All Rights Reserved.', 'lisse' ) ),
	)
);

$wp_customize->add_control(
	'lisse_footer_copyright',
	array(
		'label'           => __( 'Footer Copyright', 'lisse' ),
		'priority'        => 2,
		'settings'        => 'lisse_footer_copyright',
		'section'         => 'lisse_footer_copyright_section',
		'active_callback' => 'lisse_footer_enabled',
	)
);

$wp_customize->selective_refresh->add_partial(
	'lisse_footer_copyright',
	array(
		'selector' => '.copyright',
	)
);

/**
 * Active Callbacks
 */

if ( ! function_exists( 'lisse_footer_enabled' ) ) {
	/**
	 * Checks if the footer is enabled.
	 *
	 * @return bool Whether the footer is enabled or not.
	 */
	function lisse_footer_enabled() {
		$footer_enabled = get_theme_mod( 'lisse_footer_enable', true );
		if ( $footer_enabled ) {
			return true;
		}
		return false;
	}
}

