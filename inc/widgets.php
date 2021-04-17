<?php
/**
 * Declaring widgets.
 *
 * @package Lisse
 */

/**
 * Adds a filter to the parameters passed to a widget display callback.
 * The filter is evaluated on both the front and back end.
 *
 * @link https://developer.wordpress.org/reference/hooks/dynamic_sidebar_params/
 */
add_filter( 'dynamic_sidebar_params', 'lisse_widget_classes' );

if ( ! function_exists( 'lisse_widget_classes' ) ) {
	/**
	 * Count number of visible widgets in a sidebar and add classes to widgets accordingly,
	 * so widgets can be displayed one, two, three or four per row.
	 *
	 * @global array $lisse_sidebars_widgets
	 *
	 * @param array $params {
	 *     @type array $args  {
	 *         An array of widget display arguments.
	 *
	 *         @type string $name          Name of the sidebar the widget is assigned to.
	 *         @type string $id            ID of the sidebar the widget is assigned to.
	 *         @type string $description   The sidebar description.
	 *         @type string $class         CSS class applied to the sidebar container.
	 *         @type string $before_widget HTML markup to prepend to each widget in the sidebar.
	 *         @type string $after_widget  HTML markup to append to each widget in the sidebar.
	 *         @type string $before_title  HTML markup to prepend to the widget title when displayed.
	 *         @type string $after_title   HTML markup to append to the widget title when displayed.
	 *         @type string $widget_id     ID of the widget.
	 *         @type string $widget_name   Name of the widget.
	 *     }
	 *     @type array $widget_args {
	 *         An array of multi-widget arguments.
	 *
	 *         @type int $number Number increment used for multiples of the same widget.
	 *     }
	 * }
	 * @return array $params
	 */
	function lisse_widget_classes( $params ) {

		global $lisse_sidebars_widgets;

		/*
		 * When the corresponding filter is evaluated on the front end
		 * this takes into account that there might have been made other changes.
		 */
		$lisse_sidebars_widgets_count = apply_filters( 'lisse_sidebars_widgets', $lisse_sidebars_widgets );

		// Only apply changes if sidebar ID is set and the widget's classes depend on the number of widgets in the sidebar.
		if ( isset( $params[0]['id'] ) && strpos( $params[0]['before_widget'], 'dynamic-classes' ) ) {
			$sidebar_id   = $params[0]['id'];
			$widget_count = count( $lisse_sidebars_widgets_count[ $sidebar_id ] );

			$widget_classes = 'widget-count-' . $widget_count;
			if ( 0 === $widget_count % 4 || $widget_count > 6 ) {
				// Four widgets per row if there are exactly four or more than six.
				$widget_classes .= ' col-md-3';
			} elseif ( 6 === $widget_count ) {
				// If two widgets are published.
				$widget_classes .= ' col-md-2';
			} elseif ( $widget_count >= 3 ) {
				// Three widgets per row if there's three or more widgets.
				$widget_classes .= ' col-md-4';
			} elseif ( 2 === $widget_count ) {
				// If two widgets are published.
				$widget_classes .= ' col-md-6';
			} elseif ( 1 === $widget_count ) {
				// If just on widget is active.
				$widget_classes .= ' col-md-12';
			}

			// Replace the placeholder class 'dynamic-classes' with the classes stored in $widget_classes.
			$params[0]['before_widget'] = str_replace( 'dynamic-classes', $widget_classes, $params[0]['before_widget'] );
		}

		return $params;
	}
}
add_action( 'widgets_init', 'lisse_widgets_init' );

if ( ! function_exists( 'lisse_widgets_init' ) ) {
	/**
	 * Initializes themes widgets.
	 */
	function lisse_widgets_init() {

		// Right Sidebar.
		register_sidebar(
			array(
				'name'          => __( 'Right Sidebar', 'lisse' ),
				'id'            => 'right-sidebar',
				'description'   => __( 'Right sidebar widget area', 'lisse' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);

		// Left Sidebar.
		register_sidebar(
			array(
				'name'          => __( 'Left Sidebar', 'lisse' ),
				'id'            => 'left-sidebar',
				'description'   => __( 'Left sidebar widget area', 'lisse' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);

		// Page Sidebar.
		register_sidebar(
			array(
				'name'          => __( 'Page Sidebar', 'lisse' ),
				'id'            => 'page-sidebar',
				'description'   => __( 'The widgets added in this sidebar will appear on single pages.', 'lisse' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="widget-title"><h5>',
				'after_title'   => '</h5></div>',
			)
		);
	}
}

if ( ! function_exists( 'lisse_edit_link' ) ) :
	/**
	 * Returns an accessibility-friendly link to edit a post or page.
	 *
	 * This also gives us a little context about what exactly we're editing
	 * (post or page?) so that users understand a bit more where they are in terms
	 * of the template hierarchy and their content. Helpful when/if the single-page
	 * layout with multiple posts/pages shown gets confusing.
	 */
	function lisse_edit_link() {
		edit_post_link(
			sprintf(
				/* translators: %s: Post title. */
				__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'lisse' ),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;
