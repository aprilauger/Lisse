<?php
/**
 * The search form template
 *
 * Used any time the get_search_form() is called.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_unique_id/
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 *
 * @package Lisse
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */
$lisse_unique_id = wp_unique_id( 'search-form-' );

$lisse_aria_label = ! empty( $args['aria_label'] ) ? 'aria-label="' . esc_attr( $args['aria_label'] ) . '"' : '';
?>

<form role="search" <?php echo esc_attr( $lisse_aria_label ); ?> method="get" class="search-form d-flex flex-row" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" id="<?php echo esc_attr( $lisse_unique_id ); ?>" class="search-field form-control" value="<?php echo get_search_query(); ?>" name="s" />
	<input type="submit" class="search-submit btn btn-primary" value="<?php echo esc_attr_x( 'Search', 'submit button', 'lisse' ); ?>" />
</form>
