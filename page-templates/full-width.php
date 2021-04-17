<?php
/**
 * Template for displaying a page without sidebars even if a sidebar widget is published.
 *
 * @package Lisse
 */

get_header();
?>

<div id="full-width-page">
	<div id="content" class="<?php echo esc_attr( get_theme_mod( 'lisse_container_type', 'container' ) ); ?>">
		<div class="row">
			<div id="primary" class="col-md-12 content-area">
				<main id="main" class="site-main" role="main">

					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content/content', 'page-full' );

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
</div><!-- #full-width-page -->

<?php get_footer(); ?>
