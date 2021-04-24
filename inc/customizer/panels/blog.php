<?php
/**
 * Blog section in the WordPress customizer.
 *
 * This file contains all the settings and controls
 * for the blog section.
 *
 * @package Lisse
 */

$wp_customize->add_section(
	'lisse_blog_section',
	array(
		'title'       => __( 'Blog', 'lisse' ),
		'description' => __( 'Controls the blog.', 'lisse' ),
		'priority'    => 5,
	)
);

$wp_customize->add_setting(
	'lisse_blog_title',
	array(
		'default'           => __( 'Blog', 'lisse' ),
		'sanitize_callback' => 'lisse_sanitize_html',
	)
);

$wp_customize->add_control(
	'lisse_blog_title',
	array(
		'label'    => __( 'Blog Title', 'lisse' ),
		'priority' => 1,
		'section'  => 'lisse_blog_section',
		'settings' => 'lisse_blog_title',
	)
);

$wp_customize->add_setting(
	'lisse_blog_image',
	array(
		'default'           => get_template_directory_uri() . '/assets/img/lisse-wordpress-blog-header.jpg',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'lisse_blog_image',
		array(
			'label'    => __( 'Blog Photo', 'lisse' ),
			'priority' => 2,
			'section'  => 'lisse_blog_section',
			'settings' => 'lisse_blog_image',
		)
	)
);
