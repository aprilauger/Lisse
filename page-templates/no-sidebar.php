<?php
/**
 * Template for displaying a full width page with no sidebars.
 *
 * @package Lisse
 */

get_header();
?>

<div class="<?php echo esc_attr( get_theme_mod( 'lisse_container_type', 'container' ) ); ?>">
	<div class="row">
		<div class="col-md-12">
			<div id="primary" class="content-area">
				<main id="main" class="site-main">

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
		</div><!-- .col-md-12 -->
	</div><!-- .row -->
</div><!-- .container -->

<?php
get_footer();
