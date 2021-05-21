<?php
/**
 * Featured section in the front page customizer panel.
 *
 * This file contains all the settings and controls
 * for the featured section.
 *
 * @package Lisse
 */

$wp_customize->add_section(
	'lisse_featured_section',
	array(
		'title'    => __( 'Featured', 'lisse' ),
		'panel'    => 'lisse_front_panel',
		'priority' => 2,
	)
);

$wp_customize->add_setting(
	'lisse_featured_show',
	array(
		'default'           => false,
		'sanitize_callback' => 'lisse_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'lisse_featured_show',
	array(
		'type'     => 'checkbox',
		'label'    => __( 'Show the Featured section', 'lisse' ),
		'priority' => 1,
		'section'  => 'lisse_featured_section',
		'settings' => 'lisse_featured_show',
	)
);

$wp_customize->add_setting(
	'lisse_featured_title',
	array(
		'default'           => __( 'Featured', 'lisse' ),
		'sanitize_callback' => 'lisse_sanitize_html',
	)
);

$wp_customize->add_control(
	'lisse_featured_title',
	array(
		'label'           => __( 'Title', 'lisse' ),
		'priority'        => 2,
		'section'         => 'lisse_featured_section',
		'settings'        => 'lisse_featured_title',
		'active_callback' => 'lisse_featured_is_enabled',
	)
);

$wp_customize->selective_refresh->add_partial(
	'lisse_featured_title',
	array(
		'selector' => '.featured-title',
	)
);

$wp_customize->add_setting(
	'lisse_featured_subtitle',
	array(
		'default'           => __( 'Lorem ipsum dolor sit amet', 'lisse' ),
		'sanitize_callback' => 'lisse_sanitize_html',
	)
);
$wp_customize->add_control(
	'lisse_featured_subtitle',
	array(
		'label'           => __( 'Subtitle', 'lisse' ),
		'priority'        => 3,
		'section'         => 'lisse_featured_section',
		'settings'        => 'lisse_featured_subtitle',
		'active_callback' => 'lisse_featured_is_enabled',
	)
);

$wp_customize->selective_refresh->add_partial(
	'lisse_featured_subtitle',
	array(
		'selector' => '.featured-subtitle',
	)
);

// Number of featured items.
$featured_num = 6;

for ( $i = 1; $i <= $featured_num; $i++ ) {
	// The read more button.
	if ( 1 === $i ) {
		$wp_customize->add_setting(
			'lisse_featured_first_read_more_' . $i,
			array(
				'default'           => 'Read More',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'lisse_featured_first_read_more_' . $i,
			array(
				'label'           => esc_html__( 'Button Text ', 'lisse' ),
				'section'         => 'lisse_featured_section',
				'active_callback' => 'lisse_featured_is_enabled',
			)
		);
	}

	// Featured Posts & Pages.
	$wp_customize->add_setting(
		'lisse_featured_post_' . $i,
		array(
			'sanitize_callback' => 'lisse_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'lisse_featured_post_' . $i,
		array(
			'type'            => 'select',
			'label'           => esc_html__( 'Featured Item ', 'lisse' ) . $i,
			'choices'         => lisse_get_posts(),
			'section'         => 'lisse_featured_section',
			'active_callback' => 'lisse_featured_is_enabled',
		)
	);
}

/**
 * Retrieves an array of posts and pages.
 *
 * @return array The featured posts and pages.
 */
function lisse_get_posts() {
	$choices = array( '' => esc_html__( 'Select', 'lisse' ) );
	$args    =
		array(
			'posts_per_page' => 40,
			'post_type'      => array( 'page', 'post' ),
			'post_status'    => array( 'publish' ),
			'orderby'        =>
				array(
					'type' => 'DESC',
					'date' => 'DESC',
				),
		);

	$query = new WP_Query( $args );

	foreach ( $query->posts as $post ) {
		$id             = $post->ID;
		$title          = $post->post_title;
		$choices[ $id ] = $title;
	}
	return $choices;
}

/**
 * Active Callbacks
 */

if ( ! function_exists( 'lisse_featured_is_enabled' ) ) {
	/**
	 * Checks if the featured section is enabled.
	 *
	 * @return bool Whether the featured section is enabled or not.
	 */
	function lisse_featured_is_enabled() {
		$featured_enable = get_theme_mod( 'lisse_featured_show', true );
		if ( $featured_enable ) {
			return true;
		}
		return false;
	}
}
