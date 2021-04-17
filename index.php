<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lisse
 */

get_header();
get_template_part( 'template-parts/header/title-block' );
?>

<div id="index-wrapper" class="content-area">
	<div id="content" class="<?php echo esc_attr( get_theme_mod( 'lisse_container_type', 'container' ) ); ?>" tabindex="-1">
		<div class="row">
			<?php
				// Left sidebar check.
				get_template_part( 'template-parts/global/left-sidebar-check' );
			?>

			<main id="main" class="site-main">
				<?php

				if ( have_posts() ) :

					while ( have_posts() ) :
						the_post();
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
</div><!-- #index-wrapper -->

<?php
get_footer();
