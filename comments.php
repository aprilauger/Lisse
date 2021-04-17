<?php
/**
 * The template for displaying comments and the comment form
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lisse
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password,
 * return without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			if ( '1' === get_comments_number() ) :
				?>
				<?php esc_html_e( '1 comment', 'lisse' ); ?>
			<?php else : ?>
				<?php
				printf(
					/* translators: %s: comment count number. */
					esc_html( _nx( '%s comment', '%s comments', get_comments_number(), 'Comments title', 'lisse' ) ),
					esc_html( number_format_i18n( esc_attr( get_comments_number() ) ) )
				);
				?>
			<?php endif; ?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note.
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'lisse' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	comment_form(
		array(
			'comment_field' => '
			<div class = "col_full">
				<label>Comment</label>
				<textarea name = "comment" cols = "58" rows = "7" class = "form-control"></textarea>
			</div>',
			'fields'        =>
				array(
					'author' =>
						'<div>
							<label>' . __( 'Name', 'lisse' ) . '</label>
							<input type = "text" name = "author" class = "form-control" />
						</div>',
					'email'  =>
						'<div>
							<label>' . __( 'Email', 'lisse' ) . '</label>
							<input type = "text" name = "email" class = "form-control" />
						</div>',
					'url'    =>
						'<div>
							<label>' . __( 'Website', 'lisse' ) . '</label>
							<input type = "text" name = "url" class = "form-control" />
						</div>',
				),
			'class_submit'  => 'btn btn-primary',
			'label_submit'  => __( 'Submit', 'lisse' ),
			'title_reply'   => __( 'Leave a <span>Comment</span>', 'lisse' ),
		)
	);

	?>
</div><!-- #comments -->
