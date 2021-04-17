<?php
/**
 * Custom control to add section headers to the customizer.
 *
 * @package Lisse
 */

if ( class_exists( 'WP_Customize_Control' ) ) {
	/**
	 * Lisse Subheader Custom Control
	 */
	class Lisse_Subheader_Custom_Control extends WP_Customize_Control {
		/**
		 * Control type
		 *
		 * @var string
		 */
		public $label;

		/**
		 * Control method
		 *
		 * @since 1.0.0
		 */
		public function render_content() {
			if ( ! empty( $this->label ) ) {
				echo '<div class="customizer-section-subheader">' . esc_html( $this->label ) . '</div>';
			}
		}
	}
}
