<?php
/**
 * Template for displaying the front page sections.
 *
 * @package Lisse
 */

/*
 * Action hook to output the front page sections. To control visability of
 * each section, refer to the "Front Page" panel in the WordPress customizer.
 *
 * 1: Jumbotron Section
 * 2: Featured Section
 * 3: About Section
 * 4: Call to Action Section
 * 5: Contact Section
 */
do_action( 'lisse_action_front_page_sections' );
