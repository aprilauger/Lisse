<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lisse
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<?php lisse_post_thumbnail(); ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php lisse_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
