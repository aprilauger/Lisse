<?php
/**
 * Lisse functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Lisse
 */

// Theme version number.
if ( ! defined( 'LISSE_VERSION' ) ) {
	define( 'LISSE_VERSION', '1.0.0' );
}

// Directory constants.
define( 'BASE_DIR', get_template_directory() . '/' );
define( 'INC_DIR', BASE_DIR . 'inc/' );
define( 'LIB_DIR', BASE_DIR . 'lib/' );

// URL constants.
define( 'BASE_URL', get_template_directory_uri() . '/' );
define( 'ASSETS_URL', BASE_URL . 'assets/' );
define( 'INC_URL', BASE_URL . 'inc/' );
define( 'CSS_URL', ASSETS_URL . 'css/' );
define( 'JS_URL', ASSETS_URL . 'js/' );
define( 'IMG_URL', ASSETS_URL . 'img/' );

// PHP files to include.
$includes = array(
	'classes/class-lisse-after-setup-theme.php', // After theme setup settings.
	'classes/class-wp-bootstrap-navwalker.php',  // Custom WordPress nav walker class.
	'widgets.php',                               // Register widget area.
	'enqueue.php',                               // Enqueue theme scripts and styles.
	'template-tags.php',                         // Custom template tags.
	'template-functions.php',                    // Custom template functions.
	'sanitize.php',                              // Sanitize functions.
	'customizer/class-lisse-customizer.php',     // Customizer panels, settings, and controls.
	'customizer/styles.php',                     // Header inline styles.
	'custom.php',                                // Custom functions.
	'hooks/hooks.php',                           // Custom hooks.
	'hooks/front-page.php',                      // Front page hooks.
);

foreach ( $includes as $file ) {
	$filepath = locate_template( 'inc/' . $file );
	include_once $filepath;
}

// Load Jetpack compatibility file.
if ( defined( 'JETPACK__VERSION' ) ) {
	include get_template_directory() . '/inc/jetpack.php';
}
