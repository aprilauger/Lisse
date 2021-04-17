<?php
/**
 * The template for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Lisse
 */

get_header();
get_template_part( 'template-parts/header/title-block' );
?>

<div id="single-wrapper" class="content-area">
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

					<!-- Post Navigation -->
					<div class="post-navigation d-flex justify-content-between">
						<div><?php previous_post_link(); ?></div>
						<div><?php next_post_link(); ?></div>
					</div>

					<?php
					// If comments are open or we have at least one comment, load the comments template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile;
				?>

			</main>

			<?php
			if ( is_singular( 'post' ) ) :
				?>

				<!-- Related posts -->
				<?php
				// Current post categories.
				$categories    = get_the_category();
				$related_query = new WP_Query(
					array(
						'posts_per_page' => 4,
						'post__not_in'   => array( $post->ID ),
						'cat'            => ! empty( $categories ) ? $categories[0]->term_id : null,
					)
				);
				if ( $related_query->have_posts() ) :
					?>
					<section class="related-posts excerpt">
						<h2><?php echo esc_html__( 'Related Posts', 'lisse' ); ?></h2>
						<?php
						while ( $related_query->have_posts() ) :
							$related_query->the_post();
							?>

							<div class="mpost row">
								<div class="
								<?php if ( has_post_thumbnail() ) : ?>
									col-sm-2 col-lg-2 col-lg-2
								<?php else : ?>
									col-sm-12 col-md-12 col-lg-12
								<?php endif; ?>">

								<?php if ( has_post_thumbnail() ) : ?>
									<div class="post-thumbnail">
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
											<?php the_post_thumbnail( 'thumbnail' ); ?>
										</a>
									</div>
								<?php endif; ?>
							</div>

							<div class="col-sm-12 col-md-12
								<?php if ( has_post_thumbnail() ) : ?>
									col-sm-10 col-lg-10 col-lg-10
								<?php else : ?>
									col-lg-12
								<?php endif; ?>">

								<div class="entry">
									<div class="entry-title">
										<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
									</div>
									<div class="entry-content">
										<?php the_excerpt(); ?>
									</div>
								</div>
							</div>

						</div><!-- mpost -->

							<?php
						endwhile;
						wp_reset_postdata();
						?>
					</section><!-- .related-posts -->

					<?php
				endif;
			endif;
			?>

			<?php
				// Right sidebar check.
				get_template_part( 'template-parts/global/right-sidebar-check' );
			?>

		</div><!-- .row -->
	</div><!-- #content -->
</div><!-- #single-wrapper -->

<?php get_footer(); ?>
