<?php
/**
 * Custom control to add an hr to the customizer.
 *
 * @package Lisse
 */

if ( class_exists( 'WP_Customize_Control' ) ) {
	/**
	 * Lisse Separator Custom Control
	 */
	class Lisse_Separator_Custom_Control extends WP_Customize_Control {
		/**
		 * Control type
		 *
		 * @var string
		 */
		public $type = 'lisse-separator';

		/**
		 * Control method
		 *
		 * @since 1.0.0
		 */
		public function render_content() { ?>
			<div>
				<hr style="border-color: #ddd">
			</div>
			<?php
		}
	}
}
