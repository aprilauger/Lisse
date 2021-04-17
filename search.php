<?php
/**
 * The template for displaying search result pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Lisse
 */

get_header();
get_template_part( 'template-parts/header/title-block-search' );
?>

<div id="search-wrapper" class="content-area">
	<div id="content" class="<?php echo esc_attr( get_theme_mod( 'lisse_container_type', 'container' ) ); ?>" tabindex="-1">
		<div class="row">

			<?php
				// Left sidebar check.
				get_template_part( 'template-parts/global/left-sidebar-check' );
			?>

			<section id="primary" class="content-area">
				<main id="main" class="site-main">

					<?php
					if ( have_posts() ) :

						while ( have_posts() ) :
							the_post();

							/**
							 * Run the loop for the search and output the results.
							 * If you want to override this in a child theme then include a
							 * file called content-search.php and that will be used instead.
							 */
							get_template_part( 'template-parts/content/content', 'search' );

						endwhile;

						the_posts_navigation();

					else :

						get_template_part( 'template-parts/content/content', 'none' );

					endif;
					?>

				</main><!-- #main -->
			</section><!-- #primary -->

			<?php
				// Right sidebar check.
				get_template_part( 'template-parts/global/right-sidebar-check' );
			?>

		</div><!-- .row -->
	</div><!-- #content -->
</div><!-- #search-wrapper -->

<?php get_footer(); ?>
