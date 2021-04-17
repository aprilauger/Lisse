<?php
/**
 * Template Name: Full Width Layout
 * Template Post Type: post, page
 *
 * The full width layout applies the bootstrap "container"
 * class, which provides a responsive fixed width.
 *
 * @package Lisse
 */

get_header();
get_template_part( 'template-parts/header/title-block' );
?>

<div id="full-width-page">
	<div id="content" class="<?php echo esc_attr( get_theme_mod( 'lisse_container_type', 'container' ) ); ?>" tabindex="-1">
		<div class="row">
			<main id="main" class="site-main">

				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content/content', get_post_type() );

					// If comments are open or we have at least one comment, load the comments template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}

				endwhile;
				?>

			</main>

		</div><!-- .row -->
	</div><!-- #content -->
</div><!-- #full-width-page -->

<?php get_footer(); ?>
