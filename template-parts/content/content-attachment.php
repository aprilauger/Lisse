<?php
/**
 * Template part for displaying attachments
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lisse
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<div class="entry-meta">
			<span class="dashicons dashicons-calendar-alt"></span> <?php lisse_posted_on(); ?><span class="divider">/</span>
			<span class="dashicons dashicons-admin-users"></span> <?php lisse_posted_by(); ?><span class="divider">/</span>
			<span class="dashicons dashicons-admin-comments"></span> <?php comments_number(); ?>
		</div><!-- .entry-meta -->
		<?php
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		?>
	</header>

	<div class="entry-content">
		<a class="btn btn-outline-primary mb-4" href="<?php echo esc_url( $post->guid ); ?>" title="<?php the_title(); ?>">Direct Download</a>

		<?php
		if ( wp_attachment_is( 'image' ) ) :
			?>
			<img src="<?php echo esc_url( $post->guid ); ?>" alt="<?php the_title(); ?>" />
			<?php
		elseif ( wp_attachment_is( 'video' ) ) :
			?>
			<video controls="controls" class="wp-video-shortcode" preload="metadata" width="100%" height="auto">
				<source type="video/quicktime" src="<?php echo esc_url( $post->guid ); ?>">
			</video>
			<?php

		endif;

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
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php lisse_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
