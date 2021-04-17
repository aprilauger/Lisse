<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lisse
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php
		the_content();
		?>

		<?php
		wp_link_pages(
			array(
				'before'         => '<nav class="post-nav-links text-center">',
				'after'          => '</nav>',
				'link_before'    => '',
				'link_after'     => '',
				'aria_current'   => 'page',
				'next_or_number' => 'number',
				'separator'      => ' ',
				'nextpagelink'   => __( 'Next page', 'lisse' ),
				/* translators: %: page number. */
				'pagelink'       => '%',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php
	if ( get_edit_post_link() ) :
		?>
		<footer class="entry-footer">
			<?php

			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'lisse' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>',
				0,
				'btn btn-primary',
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
