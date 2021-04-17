<?php
/**
 * Front page customizer panel.
 *
 * This file contains all the sections in the
 * front page customizer panel.
 *
 * @package Lisse
 */

$wp_customize->add_panel(
	'lisse_front_panel',
	array(
		'title'    => __( 'Front Page', 'lisse' ),
		'priority' => 3,
	)
);

// Front page panels.
require_once 'front/jumbotron.php';
require_once 'front/featured.php';
require_once 'front/about.php';
require_once 'front/cta.php';
require_once 'front/contact.php';
