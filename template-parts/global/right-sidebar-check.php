<?php
/**
 * Right sidebar check.
 *
 * @package Lisse
 */

$lisse_sidebar_pos = get_theme_mod( 'lisse_sidebar_position', 'right' );
?>

</div><!-- #primary-->

<?php if ( 'right' === $lisse_sidebar_pos || 'both' === $lisse_sidebar_pos ) : ?>
	<?php get_template_part( 'template-parts/sidebars/sidebar', 'right' ); ?>
<?php endif; ?>
