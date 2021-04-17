<?php
/**
 * The template for displaying single pages
 *
 * Displays all pages by default. Please note that this is the
 * WordPress construct of pages and that other 'pages' on your
 * WordPress site may use a different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Lisse
 */

get_header();
get_template_part( 'template-parts/header/title-block' );
?>

<div id="page">
	<div id="content" class="<?php echo esc_attr( get_theme_mod( 'lisse_container_type', 'container' ) ); ?>" tabindex="-1">
		<div class="row">
			<?php
				// Left sidebar check.
				get_template_part( 'template-parts/global/left-sidebar-check' );
			?>

			<main id="main" class="site-main">

				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content/content', 'page' );

					// If comments are open or we have at least one comment, load the comments template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}

				endwhile;
				?>

			</main>

			<?php
				// Right sidebar check.
				get_template_part( 'template-parts/global/right-sidebar-check' );
			?>

		</div><!-- .row -->
	</div><!-- #content -->
</div><!-- #page -->

<?php get_footer(); ?>
