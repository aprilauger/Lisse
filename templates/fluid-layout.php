<?php
/**
 * Template Name: Fluid Layout (No Breakpoints)
 * Template Post Type: post, page
 *
 * The fluid layout applies the bootstrap "container-fluid"
 * class, which spans the entire width of the viewport.
 *
 * @package Lisse
 */

get_header();
get_template_part( 'template-parts/header/title-block' );
?>

<div id="full-width-page">
	<div id="content" class="container-fluid" tabindex="-1">
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
