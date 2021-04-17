<?php
/**
 * Lisse after theme setup settings.
 *
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @package Lisse
 */

if ( ! class_exists( 'Lisse_After_Setup_Theme' ) ) {

	/**
	 * Lisse After Setup Theme
	 */
	class Lisse_After_Setup_Theme {

		/**
		 * Instance
		 *
		 * @var $instance
		 */
		private static $instance;

		/**
		 * Initiator
		 *
		 * @return object
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			add_action( 'after_setup_theme', array( $this, 'lisse_after_setup_theme' ) );
		}

		/**
		 * Lisse after setup configurations.
		 *
		 * Note that this function is hooked into the after_setup_theme hook, which
		 * runs before the init hook. The init hook is too late for some features, such
		 * as indicating support for post thumbnails.
		 */
		public function lisse_after_setup_theme() {
			// Set the content width in pixels, based on the theme's design and stylesheet.
			$GLOBALS['content_width'] = apply_filters( 'content_width', 1200 );

			// Make theme available for translation.
			load_theme_textdomain( 'lisse', get_template_directory() . '/languages' );

			// Adds support for posts and comment RSS feed links.
			add_theme_support( 'automatic-feed-links' );

			// Add support for the title tag.
			add_theme_support( 'title-tag' );

			// Add support for post thumbnails.
			add_theme_support( 'post-thumbnails' );

			// Add custom image sizes.
			add_image_size( 'overlay-search', 100, 100, true );
			add_image_size( 'lisse-post-thumbnail-large', 800, 350, true );
			add_image_size( 'lisse-post-thumbnail-medium', 400, 250, true );
			add_image_size( 'lisse-post-banner', 1500, 700, true );

			// Add support for selective refresh for widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );

			// Add support for custom logo.
			add_theme_support(
				'custom-logo',
				array(
					'height'      => 120,
					'width'       => 90,
					'flex-height' => true,
					'flex-width'  => true,
				)
			);

			// Add custom background.
			add_theme_support(
				'custom-background',
				array(
					'default-color' => 'ffffff',
				)
			);

			// Add support for the custom header.
			add_theme_support(
				'custom-header',
				array(
					'default-image'    => '',
					'random-default'   => false,
					'width'            => 1500,
					'height'           => 700,
					'flex-height'      => false,
					'flex-width'       => false,
					'header-text'      => false,
					'wp-head-callback' => '',
				)
			);

			// Switch default core markup to output valid HTML5.
			add_theme_support(
				'html5',
				array(
					'comment-list',
					'comment-form',
					'search-form',
					'gallery',
					'caption',
				)
			);

			// Add support for editor styles.
			add_theme_support( 'editor-styles' );
			add_editor_style( CSS_URL . 'editor.css' );

			// Add excerpt support for pages.
			add_post_type_support( 'page', 'excerpt' );

			// Register a menu.
			register_nav_menu( 'primary', __( 'Primary Menu', 'lisse' ) );
		}
	}
}

/**
 * Call the 'get_instance()' method
 */
Lisse_After_Setup_Theme::get_instance();
