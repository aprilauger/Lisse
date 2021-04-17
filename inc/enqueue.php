<?php
/**
 * Engueues styles and scripts.
 *
 * @package Lisse
 */

if ( ! function_exists( 'lisse_assets' ) ) {

	/**
	 * Enqueue theme styles and scripts.
	 *
	 * @return void
	 */
	function lisse_assets() {

		// Enqueue global styles.
		wp_enqueue_style( 'lisse-google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600;700&display=swap', array(), '1.0.0', 'all' );
		wp_enqueue_style( 'lisse-fontawesome', CSS_URL . 'fontawesome.css', array(), '5.8.2', 'all' );
		wp_enqueue_style( 'lisse-style', CSS_URL . 'styles.css', array(), '1.0.0', 'all' );
		wp_enqueue_style( 'dashicons' );

		// Enqueue global scripts.
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'lisse-bootstrap', JS_URL . 'bootstrap.js', array( 'jquery' ), '5.0', true );
		wp_enqueue_script( 'lisse-scripts', JS_URL . 'scripts.js', array( 'jquery' ), '1.0.0', true );

		// If the custom search is enabled in customizer, enqueue the script.
		if ( true === (bool) get_theme_mod( 'lisse_header_top_enable', true ) ) {
			wp_enqueue_script( 'lisse-search', JS_URL . 'search.js', array(), '1.0.0', true );
		}

		// Allows PHP variables to be passed to JavaScript.
		wp_localize_script(
			'lisse-scripts',
			'lisseData',
			array(
				'root_url' => home_url(),
			)
		);

		// Enqueue comment-reply scripts.
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// If animation is enabled in the customizer, enqueue the styles and scripts.
		if ( true === (bool) get_theme_mod( 'lisse_general_animation_enable', true ) && ! is_customize_preview() ) {
			wp_enqueue_style( 'lisse-animate', CSS_URL . 'animate.css', array(), '3.7.2', 'all' );
			wp_enqueue_script( 'lisse-waypoints', JS_URL . 'waypoints.js', array( 'jquery' ), '4.0.0', true );
			wp_enqueue_script( 'lisse-scroll-animations', JS_URL . 'scroll-animations.js', array( 'jquery', 'lisse-waypoints' ), '1.0.0', true );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'lisse_assets' );

if ( ! function_exists( 'lisse_admin_assets' ) ) {

	/**
	 * Enqueue styles and scripts for admin area.
	 */
	function lisse_admin_assets() {
		wp_enqueue_style( 'lisse-admin', CSS_URL . 'admin.css', array(), '1.0.0', 'all' );
	}
}
add_action( 'admin_enqueue_scripts', 'lisse_admin_assets' );
