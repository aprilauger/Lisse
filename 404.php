<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Lisse
 */

get_header();
?>

<div id="title-block" class="hd-btm" style="<?php do_action( 'lisse_title_block' ); ?>">
	<div class="<?php echo esc_attr( get_theme_mod( 'lisse_container_type', 'container' ) ); ?>" tabindex="-1">
		<div class="row">
			<div class="col-sm-12">
				<header>
					<div class="tb-content <?php do_action( 'lisse_title_block_classes' ); ?>">
						<h1><?php echo esc_html( get_theme_mod( 'lisse_general_404_title', __( 'Page Not Found', 'lisse' ) ) ); ?></h1>
					</div><!-- .tb-content -->
				</header>
			</div><!-- .col-sm-12 -->
		</div><!-- .row -->
	</div><!-- #content -->
</div><!-- #title-block -->


<div id="content" class="<?php echo esc_attr( get_theme_mod( 'lisse_container_type', 'container' ) ); ?>">
	<div class="row">
		<div id="primary" class="col-md-12 content-area">
			<main id="main" class="site-main">
				<section class="error-404 not-found">
					<div class="page-content">
						<div class="content-404">
							<?php echo esc_html( get_theme_mod( 'lisse_general_404_content', __( 'Sorry, the page you were looking for could not be found.', 'lisse' ) ) ); ?>
						</div><!-- .content-404 -->
					</div><!-- .page-content -->
				</section><!-- .error-404 -->
			</main>
		</div><!-- #primary -->
	</div><!-- .row -->
</div><!-- #content -->

<?php
get_footer();
