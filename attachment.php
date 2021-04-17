<?php
/**
 * The template for displaying media posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#attachment
 *
 * @package Lisse
 */

get_header();
get_template_part( 'template-parts/header/title-block' );
?>

<div id="attachment-wrapper" class="content-area">
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
					get_template_part( 'template-parts/content/content', get_post_type() );
					?>

					<?php
					// If comments are open or we have at least one comment, load the comments template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile;
				?>
			</main>

			<?php
				// Right sidebar check.
				get_template_part( 'template-parts/global/right-sidebar-check' );
			?>

		</div><!-- .row -->
	</div><!-- #content -->
</div><!-- #attachment-wrapper -->

<?php get_footer(); ?>
