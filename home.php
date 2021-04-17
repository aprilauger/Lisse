<?php
/**
 * The template for displaying the latest blog posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#home-page-display
 *
 * @package Lisse
 */

get_header();
?>

<div id="title-block" class="hd-btm" style="<?php do_action( 'lisse_title_block' ); ?>">
	<div class="overlay">
		<div class="<?php echo esc_attr( get_theme_mod( 'lisse_container_type', 'container' ) ); ?>" tabindex="-1">
			<div class="row">
				<div class="col-sm-12">

					<header>
						<div class="tb-content <?php do_action( 'lisse_title_block_classes' ); ?>">
							<?php

							if ( ! is_front_page() && is_home() ) :
								$lisse_blog_title = get_theme_mod( 'lisse_blog_title', 'Blog' );
								?>

								<?php if ( $lisse_blog_title ) : ?>
									<h1><?php echo esc_html( $lisse_blog_title ); ?></h1>
								<?php endif; ?>

								<?php
							else :
								the_title( '<h1 class="entry-title">', '</h1>' );

							endif;

							?>
						</div><!-- .tb-content -->
					</header>

				</div><!-- .col-sm-12 -->
			</div><!-- .row -->
		</div>
	</div>
</div><!-- #title-block -->

<div id="home-wrapper" class="content-area">
	<div id="content" class="<?php echo esc_attr( get_theme_mod( 'lisse_container_type', 'container' ) ); ?>" tabindex="-1">
		<div class="row">
			<?php
				// Left sidebar check.
				get_template_part( 'template-parts/global/left-sidebar-check' );
			?>

			<main id="main" class="site-main">
				<?php

				$i = 0; // Counter loop for .row divs.

				// Output the posts in a grid format.
				if ( have_posts() ) :

					while ( have_posts() ) :

						if ( 0 === $i % 2 ) :
							?>
							<div class="row">
						<?php endif; ?>

						<div class="col-lg-6 col-md-12 col-sm-12">
							<?php
							the_post();
							get_template_part( 'template-parts/content/content', get_post_type() );
							?>
						</div>

						<?php

						$i++;

						if ( ( 0 !== $i ) && ( 0 === $i % 2 ) ) :
							?>
							</div><!-- .row-->
						<?php endif; ?>

					<?php endwhile; ?>

					<?php
					if ( ( 0 !== $i ) && ( 0 !== $i % 2 ) ) :
						// Close the row if it did not get closed.
						?>
						</div><!--/.row-->
					<?php endif; ?>

						<?php
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
</div><!-- #home-wrapper -->

<?php
get_footer();
