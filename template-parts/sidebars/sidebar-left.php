<?php
/**
 * Template part for displaying the left sidebar main widget area
 *
 * @package Lisse
 */

if ( ! is_active_sidebar( 'left-sidebar' ) ) {
	return;
}

?>
<?php // When there are two sidebars, reduce the col size from 4 to 3. ?>
<?php if ( 'both' === esc_attr( get_theme_mod( 'lisse_sidebar_position' ) ) ) : ?>
	<div  id="left-sidebar" class="col-md-3 widget-area " role="complementary">
<?php else : ?>
	<div  id="left-sidebar" class="col-md-4 widget-area sidebar" role="complementary">
	<?php endif; ?>
<?php dynamic_sidebar( 'left-sidebar' ); ?>
</div><!-- #left-sidebar -->
