<?php
/**
 * Rest API for the Lisse theme.
 *
 * @package Lisse
 */

/**
 * Lisse Rest API.
 */
function lisse_rest_api() {
	register_rest_route(
		'lisse/v1',
		'search',
		array(
			'methods'             => WP_REST_Server::READABLE,
			'callback'            => 'lisse_search_results',
			'permission_callback' => '__return_true', // Public search.
		)
	);

	register_rest_field(
		'post',
		'author_name',
		array(
			'get_callback' => function () {
				return get_the_author();
			},
		)
	);
}
add_action( 'rest_api_init', 'lisse_rest_api' );

/**
 * Lisse Search Results
 *
 * @param  string $data     The keyword to search.
 * @return array  $results  The search results.
 */
function lisse_search_results( $data ) {
	// Query for posts and pages.
	$query = new WP_Query(
		array(
			'post_type'      => array( 'post', 'page' ),
			'posts_per_page' => 10,
			's'              => sanitize_text_field( $data['keyword'] ),
		)
	);

	// Store the results.
	$results = array(
		'posts' => array(),
		'pages' => array(),
	);

	while ( $query->have_posts() ) {
		$query->the_post();
		if ( get_post_type() === 'post' ) {
			$description = null;

			if ( has_excerpt() ) {
				$description = wp_trim_words( get_the_excerpt(), 20 );
			} else {
				$description = wp_trim_words( get_the_content(), 20 );
			}

			array_push(
				$results['posts'],
				array(
					'id'          => get_the_id(),
					'title'       => get_the_title(),
					'permalink'   => get_the_permalink(),
					'author_name' => get_the_author(),
					'image'       => get_the_post_thumbnail_url( 0, 'overlay-search' ),
					'date'        => get_the_date( 'm/d/Y' ),
					'description' => $description,
				)
			);
		} elseif ( get_post_type() === 'page' ) {
			array_push(
				$results['pages'],
				array(
					'id'        => get_the_id(),
					'title'     => get_the_title(),
					'permalink' => get_the_permalink(),
				)
			);
		}
	}
	return $results;
}
