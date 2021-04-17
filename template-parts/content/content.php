<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lisse
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( ! is_single() && 'post' === get_post_type() ) : ?>
		<div class="excerpt card">
			<?php lisse_post_thumbnail(); ?>
	<?php elseif ( is_single() && 'post' === get_post_type() ) : ?>
		<div class="post-single">
	<?php endif; ?>

		<?php if ( ! is_single() && 'post' === get_post_type() ) : ?>
			<div class="card-body">
		<?php endif; ?>

			<div class="entry-body">
				<header class="entry-header">
					<?php
					if ( 'post' === get_post_type() ) :
						?>
						<div class="entry-meta">
							<span class="dashicons dashicons-calendar-alt"></span> <?php lisse_posted_on(); ?><span class="divider">/</span>
							<span class="dashicons dashicons-admin-users"></span> <?php lisse_posted_by(); ?><span class="divider">/</span>
							<span class="dashicons dashicons-admin-comments"></span> <?php comments_number(); ?>
						</div><!-- .entry-meta -->
					<?php endif; ?>
					<?php
					if ( ! is_singular() ) :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;
					?>
				</header>

				<div class="entry-content">
					<?php
					if ( is_singular() ) :
						the_content(
							sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__( 'Read more<span class="screen-reader-text"> "%s"</span>', 'lisse' ),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								get_the_title()
							)
						);
					else :
						the_excerpt();
					endif;

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
			</div><!-- .entry-body -->

	<?php if ( ! is_single() && 'post' === get_post_type() ) : ?>
			<footer class="entry-footer">
				<?php lisse_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		</div><!-- .card-body -->
	</div><!-- .card -->
	<?php elseif ( is_single() && 'post' === get_post_type() ) : ?>
		</div>
		<footer class="entry-footer">
			<?php lisse_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
