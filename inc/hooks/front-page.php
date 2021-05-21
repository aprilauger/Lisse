<?php
/**
 * Custom hooks for the front page.
 *
 * @package Lisse
 */

if ( ! function_exists( 'lisse_jumbotron' ) ) {

	/**
	 * Lisse jumbotron section.
	 */
	function lisse_jumbotron() {
		$title                = get_theme_mod( 'lisse_jumbotron_title', 'Lisse' );
		$description          = get_theme_mod( 'lisse_jumbotron_description', 'Turn your vision into reality.' );
		$enable_first_button  = get_theme_mod( 'lisse_jumbotron_first_btn_enable', true );
		$enable_second_button = get_theme_mod( 'lisse_jumbotron_second_btn_enable', true );
		$first_button_title   = get_theme_mod( 'lisse_jumbotron_first_button_title', 'Learn more' );
		$second_button_title  = get_theme_mod( 'lisse_jumbotron_second_button_title', 'Sign up' ); ?>

		<div class="<?php echo esc_attr( get_theme_mod( 'lisse_container_type', 'container' ) ); ?>">
			<div class="row">
				<div class="col-md-12">
					<div class="jumbotron-container">
							<?php if ( ! empty( $title ) ) : ?>
								<h1 class="title title animated fadeInDownBig slower"><?php echo esc_html( $title ); ?></h1>
								<div class="divider">
									<div class="divider-separator animated fadeInLeft slower delay-1s"></div>
								</div>
							<?php endif; ?>
							<?php if ( ! empty( $description ) ) : ?>
								<div class="description section-description animated fadeIn slower delay-2s"><?php echo esc_html( $description ); ?></div>
							<?php endif; ?>
							<?php if ( true === (bool) $enable_first_button || true === (bool) $enable_second_button ) : ?>
								<div class="buttons animated fadeIn slower delay-3s">
									<?php if ( ! empty( $enable_first_button ) ) : ?>
										<?php if ( ! empty( $first_button_title ) ) : ?>
											<a class="button button-one" href="<?php echo esc_url( get_theme_mod( 'lisse_jumbotron_first_button_url', '#' ) ); ?>" title="<?php echo esc_html( $first_button_title ); ?>"><?php echo esc_html( $first_button_title ); ?></a>
										<?php endif; ?>
									<?php endif; ?>
									<?php if ( ! empty( $enable_second_button ) ) : ?>
										<?php if ( ! empty( $second_button_title ) ) : ?>
											<a class="button button-two" href="<?php echo esc_url( get_theme_mod( 'lisse_jumbotron_second_button_url', '#' ) ); ?>" title="<?php echo esc_html( $second_button_title ); ?>"><?php echo esc_html( $second_button_title ); ?></a>
										<?php endif; ?>
									<?php endif; ?>
								</div><!-- .buttons -->
							<?php endif; ?>
					</div><!-- .jumbotron-container -->
				</div><!-- .col-md-12 -->
			</div><!-- .row -->
		</div><!-- .container -->
		<?php
	}
}
add_action( 'lisse_action_jumbotron', 'lisse_jumbotron' );

if ( ! function_exists( 'lisse_featured' ) ) {

	/**
	 * Lisse featured section.
	 */
	function lisse_featured() {

		if ( (bool) get_theme_mod( 'lisse_featured_show', false ) === true ) {
			$featured_title    = get_theme_mod( 'lisse_featured_title', 'Featured' );
			$featured_subtitle = get_theme_mod( 'lisse_featured_subtitle', 'Lorem ipsum dolor sit amet' );
			$featured_num      = 6;
			?>

			<section id="featured" class="frontpage-section gray">
				<div class="<?php echo esc_attr( get_theme_mod( 'lisse_container_type', 'container' ) ); ?>">
					<div class="separator">
						<?php if ( $featured_title ) : ?>
							<h2 class="featured-title"><?php echo esc_html( $featured_title ); ?></h2>
						<?php endif; ?>
						<?php if ( $featured_subtitle ) : ?>
							<h3 class="featured-subtitle"><?php echo esc_html( $featured_subtitle ); ?></h3>
						<?php endif; ?>
					</div><!-- .separator -->
					<div class="row">
						<?php
						// Array to store featured posts.
						$post_id = array();

						// Retrieve featured posts.
						for ( $item = 1; $item <= $featured_num; $item++ ) {
							$post_id[] = get_theme_mod( 'lisse_featured_post_' . $item );
						}

						// Set WP_Query arguments.
						$args = array(
							'post_type'           => array( 'post', 'page' ),
							'post__in'            => (array) $post_id,
							'orderby'             => 'post__in',
							'posts_per_page'      => absint( $featured_num ),
							'ignore_sticky_posts' => true,
						);

						// Query WordPress for featured posts.
						$query = new WP_Query( $args );
						$item  = 1;

						if ( $query->have_posts() ) :
							while ( $query->have_posts() ) :
								$query->the_post();
								?>
								<div class="col-md-12 col-md-4 col-lg-4">
									<article class="animated animate-featured-<?php echo esc_attr( $item ); ?>">
										<div class="card excerpt">
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
												<div class="img-wrapper">
													<?php
													if ( has_post_thumbnail() ) :
														the_post_thumbnail( 'lisse-post-thumbnail-medium' );
													endif;
													?>
													<div class="details">
														<div class="item-icon"></div>
													</div>
												</div>
											</a>
											<div class="card-body white">
												<header>
													<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
												</header>
												<div class="entry-content">
													<?php
													if ( has_excerpt() ) {
														echo esc_html( the_excerpt() );
													} else {
														echo esc_html( wp_trim_words( get_the_content(), 35 ) );
													}
													?>
												</div><!-- .entry-content -->

												<?php
												$btn_txt = ( get_theme_mod( 'lisse_featured_first_read_more_' . $item, 'Read More' ) );
												if ( ! empty( $btn_txt ) ) :
													?>
													<div class="btn btn-light btn-arrow"><a href="<?php the_permalink(); ?>" title="Read More"><?php echo esc_html( $btn_txt ); ?></a></div>
												<?php endif; ?>
											</div><!-- .card-body -->
										</div><!-- .card -->
									</article>
								</div><!-- .col -->
								<?php
								$item++;
							endwhile;
							wp_reset_postdata();
						endif;
						?>
					</div><!-- .row -->
				</div><!-- .container -->
			</section><!-- #featured -->
			<?php
		}
	}
}
add_action( 'lisse_action_featured', 'lisse_featured' );

if ( ! function_exists( 'lisse_about' ) ) {

	/**
	 * Lisse about section.
	 */
	function lisse_about() {
		if ( (bool) get_theme_mod( 'lisse_about_show', true ) === true ) {
			$title      = get_theme_mod( 'lisse_about_title', 'About' );
			$subtitle   = get_theme_mod( 'lisse_about_subtitle', 'Lorem ipsum dolor sit amet' );
			$entry      = get_theme_mod( 'lisse_about_entry', 'Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.' );
			$btn_enable = get_theme_mod( 'lisse_about_button_enable', true );
			$image      = get_theme_mod( 'lisse_about_image', get_template_directory_uri() . '/assets/img/about.jpg' );
			?>

			<section id="about" class="frontpage-section">
				<div class="<?php echo esc_attr( get_theme_mod( 'lisse_container_type', 'container' ) ); ?>">
					<div class="row">

						<div class="<?php echo ( ! empty( $image ) ) ? 'col-md-6' : 'col-md-12'; ?> left">
							<div class="separator">
								<?php if ( ! empty( $title ) ) : ?>
									<h2 class="about-title"><?php echo esc_html( $title ); ?></h2>
								<?php endif; ?>
								<?php if ( ! empty( $subtitle ) ) : ?>
									<h3 class="about-subtitle"><?php echo esc_html( $subtitle ); ?></h3>
								<?php endif; ?>
							</div><!-- .separator -->
							<?php if ( ! empty( $entry ) ) : ?>
								<div class="about-entry section-description"><?php echo wp_kses_post( $entry ); ?></div>
							<?php endif; ?>
							<?php
							if ( true === (bool) $btn_enable ) :
									$button_text = get_theme_mod( 'lisse_about_button_title', 'Learn More' );
									$button_url  = get_theme_mod( 'lisse_about_button_url', '#' );
								if ( ! empty( $button_text ) && ! empty( $button_url ) ) :
									?>
									<div class="cta about-btn">
										<a class="btn btn-primary btn-arrow" href="<?php echo esc_url( $button_url ); ?>" role="button" title="<?php echo esc_attr( $button_text ); ?>">
											<?php echo esc_attr( $button_text ); ?>
										</a>
									</div>
								<?php endif; ?>
							<?php endif; ?>
						</div>

						<?php
						if ( ! empty( $image ) ) {
							$image_id  = attachment_url_to_postid( $image );
							$image_url = wp_get_attachment_image_src( $image_id, 'frontpage-sections' );

							if ( $image_url ) {
								$img_src = $image_url[0];
							} else {
								$img_src = IMG_URL . 'about.jpg';
							}
							?>

							<div class="col-md-6 right img">
								<span class="about-image"><img class="animated animate-about" alt="<?php echo esc_html( $title ); ?>" src="<?php echo esc_url( $img_src ); ?>" /></span>
							</div>
						<?php } ?>
					</div><!-- .row -->
				</div><!-- .container -->
			</section><!-- #about -->
			<?php
		}
	}
}
add_action( 'lisse_action_about', 'lisse_about' );

if ( ! function_exists( 'lisse_cta' ) ) {
	/**
	 * Lisse call to action section.
	 */
	function lisse_cta() {
		$cta_show = get_theme_mod( 'lisse_cta_show', true );

		if ( true === (bool) $cta_show ) {
			$btn_enable  = get_theme_mod( 'lisse_cta_button_enable', true );
			$title       = get_theme_mod( 'lisse_cta_title', 'Design & Code' );
			$subtitle    = get_theme_mod( 'lisse_cta_subtitle', 'Deserunt mollit anim adipiscing' );
			$entry_left  = get_theme_mod( 'lisse_cta_entry_left', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.' );
			$entry_right = get_theme_mod( 'lisse_cta_entry_right', 'Lorem ipsum dolor sit amet adipiscing elit, sed do eiusmod tempor incididunt.' );
			$one         = get_theme_mod( 'lisse_cta_option_one', 'Responsive' );
			$one_desc    = get_theme_mod( 'lisse_cta_option_one_desc', 'Lorem ipsum dolor sit amet adipiscing elit, sed do eiusmod tempor incididunt utled laboreet dolore magna.' );
			$two         = get_theme_mod( 'lisse_cta_option_two', 'Intuitive' );
			$two_desc    = get_theme_mod( 'lisse_cta_option_two_desc', 'Lorem ipsum dolor sit amet adipiscing elit, sed do eiusmod tempor incididunt utled laboreet dolore magna.' );
			$three       = get_theme_mod( 'lisse_cta_option_three', 'Optimized' );
			$three_desc  = get_theme_mod( 'lisse_cta_option_three_desc', 'Lorem ipsum dolor sit amet adipiscing elit, sed do eiusmod tempor incididunt utled laboreet dolore magna.' );
			$four        = get_theme_mod( 'lisse_cta_option_four', 'Translatable' );
			$four_desc   = get_theme_mod( 'lisse_cta_option_four_desc', 'Lorem ipsum dolor sit amet adipiscing elit, sed do eiusmod tempor incididunt utled laboreet dolore magna.' );
			?>

			<section id="cta" class="frontpage-section fluid">
				<div class="container-fluid">
					<div class="row">
						<?php
						$image_id  = attachment_url_to_postid( get_theme_mod( 'lisse_cta_image' ) );
						$image_url = wp_get_attachment_image_src( $image_id, 'frontpage-sections' );
						?>

						<div class="col-md-6 left primary-color bkg-image cta-left-wrapper animated animate-cta-left" style="background-image: url(<?php echo ( $image_url ) ? esc_url( $image_url[0] ) : ''; // WPCS: XSS OK. ?>)">
							<div class="separator">
								<?php if ( ! empty( $title ) ) : ?>
									<h2 class="cta-title white"><?php echo esc_html( $title ); ?></h2>
								<?php endif; ?>

								<?php if ( ! empty( $subtitle ) ) : ?>
									<h3 class="cta-subtitle"><?php echo esc_html( $subtitle ); ?></h3>
								<?php endif; ?>
							</div><!-- .separator -->

							<?php if ( ! empty( $entry_left ) ) : ?>
								<p class="cta-left-entry"><?php echo esc_html( $entry_left ); ?></p>
							<?php endif; ?>

							<?php
							if ( true === (bool) $btn_enable ) :
								$button     = get_theme_mod( 'lisse_cta_button_title', 'Learn More' );
								$button_url = get_theme_mod( 'lisse_cta_button_url', '#' );

								if ( ! empty( $button ) && ! empty( $button_url ) ) :
									?>
									<div class="buttons">
										<div class="cta-button"><a class="button btn btn-arrow" href="<?php echo esc_url( $button_url ); ?>" role="button" title="<?php echo esc_html( $button ); ?>"><?php echo esc_html( $button ); ?></a></div>
									</div>
								<?php endif; ?>
							<?php endif; ?>
						</div><!-- .col-md-6.left -->

						<div class="col-md-6 right animated animate-cta-right">
							<?php if ( ! empty( $entry_right ) ) : ?>
								<p class="cta-right-wrapper"><?php echo esc_html( $entry_right ); ?></p>
							<?php endif; ?>

							<div class="cta-right-wrapper">
								<div class="row">
									<div class="col-md-6 step">
										<?php if ( ! empty( $one ) ) : ?>
											<h3 class="option-one"><?php echo esc_html( $one ); ?></h3>
										<?php endif; ?>

										<?php if ( ! empty( $one_desc ) ) : ?>
											<p class="option-one-desc"><?php echo esc_html( $one_desc ); ?></p>
										<?php endif; ?>
									</div><!-- .col-md-6 -->

									<div class="col-md-6 step">
										<?php if ( ! empty( $two ) ) : ?>
											<h3 class="option-two"><?php echo esc_html( $two ); ?></h3>
										<?php endif; ?>

										<?php if ( ! empty( $two_desc ) ) : ?>
											<p class="option-two-desc"><?php echo esc_html( $two_desc ); ?></p>
										<?php endif; ?>
									</div><!-- .col-md-6 -->
								</div><!-- .row -->

								<div class="row">
									<div class="col-md-6 step">
										<?php if ( ! empty( $three ) ) : ?>
											<h3 class="option-three"><?php echo esc_html( $three ); ?></h3>
										<?php endif; ?>

										<?php if ( ! empty( $three_desc ) ) : ?>
											<p class="option-three-desc"><?php echo esc_html( $three_desc ); ?></p>
										<?php endif; ?>
									</div><!-- .col-md-6 -->
									<div class="col-md-6 step">
										<?php if ( ! empty( $four ) ) : ?>
											<h3 class="option-four"><?php echo esc_html( $four ); ?></h3>
										<?php endif; ?>

										<?php if ( ! empty( $four_desc ) ) : ?>
											<p class="option-four-desc"><?php echo esc_html( $four_desc ); ?></p>
										<?php endif; ?>
									</div><!-- .col-md-6 -->
								</div><!-- .row -->
							</div><!-- .cta-right-wrapper -->
						</div><!-- .col-md-6.right -->
					</div><!-- .row -->
				</div><!-- .container-fluid -->
			</section><!-- #cta -->
			<?php
		}
	}
}
add_action( 'lisse_action_cta', 'lisse_cta' );

if ( ! function_exists( 'lisse_contact' ) ) {

	/**
	 * Lisse contact section.
	 */
	function lisse_contact() {
		if ( true === (bool) get_theme_mod( 'lisse_contact_show', true ) ) {
			$title        = get_theme_mod( 'lisse_contact_title', 'Contact' );
			$subtitle     = get_theme_mod( 'lisse_contact_subtitle', 'We would love to hear from you!' );
			$entry        = get_theme_mod( 'lisse_contact_entry', 'Lorem ipsum dolor sit ametsed tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.' );
			$phone_enable = get_theme_mod( 'lisse_contact_phone_enable', true );
			$email_enable = get_theme_mod( 'lisse_contact_email_enable', true );
			?>

			<section id="contact" class="frontpage-section">
				<div class="<?php echo esc_attr( get_theme_mod( 'lisse_container_type', 'container' ) ); ?>">
					<div class="row">
						<?php $image = esc_url( get_theme_mod( 'lisse_contact_image', get_template_directory_uri() . '/assets/img/contact.jpg' ) ); ?>

							<?php
							if ( ! empty( $image ) ) :
								$image_id  = attachment_url_to_postid( $image );
								$image_url = wp_get_attachment_image_src( $image_id, 'frontpage-sections' );
								?>
							<div class="col-md-6 left img">
								<span class="contact-image"><img class="animated animate-contact" src="<?php echo ( $image_url ) ? esc_url( $image_url[0] ) : esc_url( IMG_URL . 'contact.jpg' ); ?>" alt="<?php echo esc_html( $title ); ?>" /></span>
							</div><!-- .col-md-6.left -->
							<?php endif; ?>

						<div class="<?php echo ( ! empty( $image ) ) ? 'col-md-6' : 'col-md-12'; ?> right">
							<div class="separator">
								<?php if ( ! empty( $title ) ) : ?>
									<h2 class="contact-title"><?php echo esc_html( $title ); ?></h2>
								<?php endif; ?>

								<?php if ( ! empty( $subtitle ) ) : ?>
									<h3 class="contact-subtitle"><?php echo wp_kses_post( $subtitle ); ?></h3>
								<?php endif; ?>
							</div><!-- .separator -->

							<?php if ( ! empty( $entry ) ) : ?>
								<p class="contact-entry"><?php echo wp_kses_post( $entry ); ?></p>
							<?php endif; ?>

							<?php
							if ( true === (bool) $phone_enable ) :
								$phone_title = get_theme_mod( 'lisse_contact_phone_title', 'Call' );
								$phone       = get_theme_mod( 'lisse_contact_phone', '555-555-5555' );

								if ( ! empty( $phone_title ) && ! empty( $phone ) ) :
									?>
									<a class="btn btn-primary btn-arrow contact-phone" href="tel:<?php echo esc_attr( $phone ); ?>" role="button" title="<?php echo esc_attr( $phone_title ); ?>"><?php echo esc_html( $phone_title ); ?></a>
								<?php endif; ?>
							<?php endif; ?>

							<?php
							if ( true === (bool) $email_enable ) :
								$email_title = get_theme_mod( 'lisse_contact_email_title', 'Email' );
								$email       = get_theme_mod( 'lisse_contact_email', 'info@yourwebsite.com' );

								if ( ! empty( $email_title ) && ! empty( $email ) ) :
									?>
									<a class="btn btn-primary btn-arrow secondary-color contact-email" href="mailto:<?php echo esc_attr( $email ); ?>" role="button" title="<?php echo esc_attr( $email_title ); ?>"><?php echo esc_html( $email_title ); ?></a>
								<?php endif; ?>
							<?php endif; ?>
						</div>
					</div><!-- .row -->
				</div><!-- .container -->
			</section><!-- #contact.frontpage-section -->
			<?php
		}
	}
}
add_action( 'lisse_action_contact', 'lisse_contact' );

if ( ! function_exists( 'lisse_front_page_sections' ) ) {

	/**
	 * Lisse front page sections
	 */
	function lisse_front_page_sections() {
		$featured_show = get_theme_mod( 'lisse_featured_show', true );
		$about_show    = get_theme_mod( 'lisse_about_show', true );
		$cta_show      = get_theme_mod( 'lisse_cta_show', true );
		$contact_show  = get_theme_mod( 'lisse_contact_show', true );

		if ( true === (bool) $featured_show ) {
			get_template_part( 'template-parts/frontpage/frontpage', 'featured' );
		}

		if ( true === (bool) $about_show ) {
			get_template_part( 'template-parts/frontpage/frontpage', 'about' );
		}

		if ( true === (bool) $cta_show ) {
			get_template_part( 'template-parts/frontpage/frontpage', 'cta' );
		}

		if ( true === (bool) $contact_show ) {
			get_template_part( 'template-parts/frontpage/frontpage', 'contact' );
		}
	}
}
add_action( 'lisse_action_front_page_sections', 'lisse_front_page_sections' );
