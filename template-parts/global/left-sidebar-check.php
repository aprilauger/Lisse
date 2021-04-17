<?php

/**
 * Left sidebar check.
 *
 * @package Lisse
 */

$lisse_sidebar_pos = get_theme_mod( 'lisse_sidebar_position', 'right' );
?>

<?php if ( 'left' === $lisse_sidebar_pos || 'both' === $lisse_sidebar_pos ) : ?>
	<?php get_template_part( 'template-parts/sidebars/sidebar', 'left' ); ?>
<?php endif; ?>

<div id="primary" class="col-md content-area">
