<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lisse
 */

get_header();
?>

<div id="title-block" class="hd-btm" style="<?php do_action( 'lisse_title_block' ); ?>">
	<div class="overlay">
		<div class="<?php echo esc_attr( get_theme_mod( 'lisse_container_type', 'container' ) ); ?>" tabindex="-1">
			<div class="row">
				<div class="col-sm-12">

					<header>
						<div class="tb-content <?php do_action( 'lisse_title_block_classes' ); ?>">
							<?php
								the_archive_title( '<h1 class="entry-title">', '</h1>' );
								the_archive_description( '<div class="entry-description">', '</div>' );
							?>
						</div><!-- .tb-content -->
					</header>

				</div><!-- .col-sm-12 -->
			</div><!-- .row -->
		</div><!-- #content -->
	</div>
</div><!-- #title-block -->

<div id="archive" class="content-area">
	<div id="content" class="<?php echo esc_attr( get_theme_mod( 'lisse_container_type', 'container' ) ); ?>">
		<div class="row">

			<?php
				// Left sidebar check.
				get_template_part( 'template-parts/global/left-sidebar-check' );
			?>

			<main id="main" class="site-main">

				<?php if ( have_posts() ) : ?>

					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content/content', get_post_type() );

					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content/content', 'none' );

				endif;
				?>

			</main>

			<?php
				// Right sidebar check.
				get_template_part( 'template-parts/global/right-sidebar-check' );
			?>
		</div><!-- .row -->
	</div><!-- #content -->
</div><!-- #archive -->

<?php
get_sidebar();
get_footer();
