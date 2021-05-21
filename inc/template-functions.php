<?php
/**
 * Functions which enhance the theme by hooking into WordPress.
 *
 * @package Lisse
 */

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function lisse_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'lisse_pingback_header' );

/**
 * Filter the excerpt length to 25 words.
 *
 * @param int $length Excerpt length.
 * @return int        Modified excerpt length.
 */
function lisse_slug_excerpt_length( $length ) {

	if ( is_admin() ) {
		return $length;
	}

	return 25;
}
add_filter( 'excerpt_length', 'lisse_slug_excerpt_length', 100 );

/**
 * Filters the "read more" excerpt link.
 *
 * @param  string $more    "Read more" excerpt string.
 * @return string modified "read more" excerpt string.
 */
function lisse_excerpt_more( $more ) {

	if ( is_admin() ) {
		return $more;
	}

	return '<div class="btn btn-light btn-arrow"><a href="' . esc_url( get_the_permalink() ) . '" rel="nofollow" title="' . __( 'Read More', 'lisse' )  . '">' . __( 'Read More', 'lisse' ) . '</a></div>';
}
add_filter( 'excerpt_more', 'lisse_excerpt_more' );
