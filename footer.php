<?php
/**
 * The template for displaying the footer
 *
 * Contains the footer content and closing #page div.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lisse
 */

$footer_enable       = get_theme_mod( 'lisse_footer_enable', true );
$show_copyright      = get_theme_mod( 'lisse_footer_copyright_show', true );
$enable_social_icons = get_theme_mod( 'lisse_footer_social_icons_enable', true );
?>

<?php if ( true === (bool) $footer_enable ) : ?>
	<div id="footer">
		<footer>

			<div class="<?php echo esc_attr( get_theme_mod( 'lisse_container_type', 'container' ) ); ?>">

				<div class="row">
					<div class="col-md-4">
						<div class="col-one">
							<?php
							// Retrieve content for the first column.
							do_action( 'lisse_footer_col_one' );
							?>
						</div><!-- .col-one -->
					</div><!-- .col-md-4 -->

					<div class="col-md-4">
						<div class="col-two">
							<?php
							// Retrieve content for the second column.
							do_action( 'lisse_footer_col_two' );
							?>
						</div><!-- .col-two -->
					</div><!-- .col-md-4 -->

					<div class="col-md-4">
						<div class="col-three">
							<?php
							// Retrieve content for the third column.
							do_action( 'lisse_footer_col_three' );
							?>
						</div><!-- .col-three -->
					</div><!-- .col-md-4 -->
				</div><!-- .row -->
			</div><!-- .container -->

		</footer>

		<?php if ( true === (bool) $show_copyright || true === (bool) $enable_social_icons ) : ?>
			<div class="ft-copy">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="copyright">
								<?php
								// Retrieve copyright information.
								do_action( 'lisse_footer_copyright' );
								?>
							</div><!-- .copyright -->
						</div><!-- .col-md-6 -->
						<div class="col-md-6">
							<div class="social">
								<?php
								// Retrieve social icons.
								do_action( 'lisse_footer_social_icons' );
								?>
							</div><!-- .social -->
						</div><!-- .col-md-6 -->
					</div><!-- .row -->
				</div><!-- .container -->
			</div><!-- .ft-copy -->
		<?php endif; ?>
	</div><!-- #footer -->
<?php endif; ?>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
