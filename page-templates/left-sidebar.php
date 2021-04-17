<?php
/**
 * Template for displaying a left sidebar layout.
 *
 * @package Lisse
 */

get_header();
?>

<div id="page-wrapper" class="left-sidebar-only">
	<div id="content" class="<?php echo esc_attr( get_theme_mod( 'lisse_container_type', 'container' ) ); ?>">
		<div class="row">
			<?php get_template_part( 'sidebar-templates/sidebar', 'left' ); ?>

			<div class="
				<?php
				if ( is_active_sidebar( 'left-sidebar' ) ) :
					?>
					col-md-8
					<?php
				else :
					?>
					col-md-12
					<?php
				endif;
				?>
					content-area" id="primary">

					<main class="site-main" id="main" role="main">

					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content/content', 'page' );

						// If comments are open or we have at least one comment, load the comments template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile;
					?>

				</main>
			</div><!-- #primary -->
		</div><!-- .row -->
	</div><!-- #content -->
</div><!-- #page-wrapper -->

<?php get_footer(); ?>
