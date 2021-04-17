<?php
/**
 * Customizer class for the Lisse Theme.
 *
 * Creates panels, settings, and controls for the theme and enqueues
 * scripts needed for the theme.
 *
 * @package Lisse
 */

if ( ! class_exists( 'Lisse_Customizer' ) ) {

	/**
	 * Lisse customizer class.
	 */
	class Lisse_Customizer {

		/**
		 * Directory
		 *
		 * @var string
		 */
		public $directory = INC_DIR . 'customizer/';

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
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
			add_action( 'customize_register', array( $this, 'customize_register' ) );
		}

		/**
		 * Admin scripts
		 */
		public function admin_scripts() {
			wp_enqueue_script( 'alpha-color-picker', INC_URL . 'customizer/controls/alpha-color-picker/alpha-color-picker.js', array( 'jquery', 'wp-color-picker' ), null, true );
			wp_enqueue_style( 'alpha-color-picker', INC_URL . 'customizer/controls/alpha-color-picker/alpha-color-picker.css', array( 'wp-color-picker' ) );
		}

		/**
		 * Modifies the theme's customizer.
		 *
		 * @param $wp_customize 	Instance of the WP_Customize_Manager class
		 */
		public function customize_register( $wp_customize ) {
			// Load additional controls.
			require_once $this->directory . 'controls/alpha-color-picker/alpha-color-picker.php';
			require_once $this->directory . 'controls/class-lisse-header-custom-control.php';
			require_once $this->directory . 'controls/class-lisse-subheader-custom-control.php';
			require_once $this->directory . 'controls/class-lisse-separator-custom-control.php';

			// Alter the custom logo settings to refresh in customizer.
			$wp_customize->add_setting(
				'custom_logo',
				array(
					'theme_supports'    => array( 'custom-logo' ),
					'transport'         => 'refresh',
					'sanitize_callback' => 'lisse_sanitize_html',
				)
			);

			// Add a partial to blogname.
			if ( isset( $wp_customize->selective_refresh ) ) {
				$wp_customize->selective_refresh->add_partial(
					'blogname',
					array(
						'selector'        => '.site-title a',
						'render_callback' => 'lisse_customize_partial_blogname',
					)
				);
			}

			// Add additional customizer Panels.
			require_once $this->directory . 'panels/general-options.php';
			require_once $this->directory . 'panels/header.php';
			require_once $this->directory . 'panels/front.php';
			require_once $this->directory . 'panels/layout.php';
			require_once $this->directory . 'panels/site-colors.php';
			require_once $this->directory . 'panels/blog.php';
			require_once $this->directory . 'panels/footer.php';
		}
	}
}

/**
 * Call the 'get_instance()' method
 */
Lisse_Customizer::get_instance();
