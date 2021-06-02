<?php
/**
 * The template for displaying the header
 *
 * Displays the <head>, opening <body>, and <header>. The
 * <header> outputs the top bar, primary navigation, and the
 * jumbotron on the front page (if enabled in the customizer).
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lisse
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>

<body <?php do_action( 'lisse_body_classes' ); ?>>

	<?php wp_body_open(); ?>

	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'lisse' ); ?></a>
		<header id="header" class="bm-horizontal">
			<div id="navbar-wrapper" class="bg-light start-header start-style <?php do_action( 'lisse_header_classes' ); ?>" itemscope itemtype="https://schema.org/WebSite">
				<?php
				do_action( 'lisse_top_bar' );
				do_action( 'lisse_navigation' );
				?>
			</div>

			<?php
			// If enabled, show the jumbotron on the front page.
			if ( (bool) get_theme_mod( 'lisse_jumbotron_enable', false ) === true && is_front_page() ) {
				?>
				<div class="jumbotron">
					<?php get_template_part( 'template-parts/frontpage/frontpage-jumbotron-image' ); ?>
				</div>
				<?php
			}
			?>
		</header>
		<?php

