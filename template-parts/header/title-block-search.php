<?php
/**
 * Template for displaying the title block.
 *
 * @package Lisse
 */

?>
<div id="title-block" class="search hd-btm" style="<?php do_action( 'lisse_title_block' ); ?>">
	<div class="<?php echo esc_attr( get_theme_mod( 'lisse_container_type', 'container' ) ); ?>" tabindex="-1">
		<div class="row">
			<div class="col-sm-12">
				<header>
					<div class="tb-content <?php do_action( 'lisse_title_block_classes' ); ?>">
						<h1 class="entry-title"><?php echo esc_html__( 'Search Results for: ', 'lisse' ); ?><?php the_search_query(); ?></h1>
					</div><!-- .tb-content -->
					<div class="title-block-form">
						<?php
						// Search form.
						get_search_form();
						?>
					</div>
				</header>
			</div><!-- .col-sm-12 -->
		</div><!-- .row -->
	</div><!-- #content -->
</div><!-- #title-block -->
