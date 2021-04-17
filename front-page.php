<?php
/**
 * The template for displaying the front page
 *
 * @package Lisse
 */

get_header();

// Front page sections.
get_template_part( 'template-parts/frontpage/frontpage-sections' );

?>
<div id="front-page" class="content-area">
	<div id="content" class="<?php echo esc_attr( get_theme_mod( 'lisse_container_type', 'container' ) ); ?>" tabindex="-1">
		<div class="row">
			<main id="main" class="site-main">

				<?php
				if ( have_posts() ) :

					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content/content', 'content' );

					endwhile;
				endif;
				?>

			</main>
		</div><!-- .row -->
	</div><!-- #content -->
</div><!-- front-page -->

<?php get_footer(); ?>
