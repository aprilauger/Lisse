<?php
/**
 * Custom hooks for the Lisse theme.
 *
 * @package Lisse
 */

if ( ! function_exists( 'lisse_body_classes' ) ) {

	/**
	 * Adds custom classes to the array of body classes.
	 */
	function lisse_body_classes() {
		if ( true === (bool) get_theme_mod( 'lisse_header_general_sticky_enable', true ) ) {
			if ( true === (bool) get_theme_mod( 'lisse_header_top_enable', true ) ) {
				body_class( array( 'menu-100', 'sticky-menu' ) );
			} else {
				body_class( array( 'menu-70', 'sticky-menu' ) );
			}
		}
	}
}
add_action( 'lisse_body_classes', 'lisse_body_classes' );

if ( ! function_exists( 'lisse_header_classes' ) ) {

	/**
	 * Lisse Header Classes
	 */
	function lisse_header_classes() {
		$enable_parallax      = get_theme_mod( 'lisse_jumbotron_enable_parallax', true );
		$sticky_header_enable = get_theme_mod( 'lisse_header_general_sticky_enable', true );

		if ( is_front_page() ) {
			$header_class = 'header-front-page';
		} else {
			$header_class = 'header';
		}

		if ( true === (bool) $enable_parallax ) {
			$header_class .= ' parallax ';
		}

		if ( true === (bool) $sticky_header_enable ) {
			$header_class .= ' fixed-menu ';
		}

		global $post;
		if ( $post ) {
			if ( ! has_post_thumbnail( $post->ID ) ) {
				$header_class .= ' no-img';
			}
		}

		echo esc_html( trim( $header_class ) );
	}
}
add_action( 'lisse_header_classes', 'lisse_header_classes' );

if ( ! function_exists( 'lisse_top_bar' ) ) {

	/**
	 * Lisse Top Bar
	 */
	function lisse_top_bar() {

		$enable_top_bar = get_theme_mod( 'lisse_header_top_enable', true );

		if ( true === (bool) $enable_top_bar ) {
			$email          = get_theme_mod( 'lisse_header_top_email', 'info@yourwebsite.com' );
			$phone          = get_theme_mod( 'lisse_header_top_phone', '916-222-3333' );
			$cta_button     = get_theme_mod( 'lisse_header_top_cta_btn', 'Sign Up' );
			$cta_button_url = get_theme_mod( 'lisse_header_top_cta_btn_url', '#' );
			$social_icons   = get_theme_mod( 'lisse_header_top_social_icons_enable', 'true' );
			$icons          = '';

			if ( true === (bool) $social_icons ) {
				$facebook  = get_theme_mod( 'lisse_header_top_facebook', '#' );
				$twitter   = get_theme_mod( 'lisse_header_top_twitter', '#' );
				$linkedin  = get_theme_mod( 'lisse_header_top_linkedin', '#' );
				$instagram = get_theme_mod( 'lisse_header_top_instagram' );
				$pinterest = get_theme_mod( 'lisse_header_top_pinterest' );
				$google    = get_theme_mod( 'lisse_header_top_google' );
				$vimeo     = get_theme_mod( 'lisse_header_top_vimeo' );

				$icons .= ( ! empty( $facebook ) ? '<a href="' . esc_url( $facebook ) . '" class="t-element" title="Facebook"><i class="fab fa-facebook-f"></i></a>' : '' );
				$icons .= ( ! empty( $twitter ) ? '<a href="' . esc_url( $twitter ) . '" class="t-element" title="Twitter"><i class="fab fa-twitter"></i></a>' : '' );
				$icons .= ( ! empty( $linkedin ) ? '<a href="' . esc_url( $linkedin ) . '" class="t-element" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>' : '' );
				$icons .= ( ! empty( $instagram ) ? '<a href="' . esc_url( $instagram ) . '" class="t-element" title="Instagram"><i class="fab fa-instagram"></i></a>' : '' );
				$icons .= ( ! empty( $pinterest ) ? '<a href="' . esc_url( $pinterest ) . '" class="t-element" title="Pinterest"><i class="fab fa-pinterest-p"></i></a>' : '' );
				$icons .= ( ! empty( $google ) ? '<a href="' . esc_url( $google ) . '" class="t-element" title="Google"><i class="fab fa-google-plus-g"></i></a>' : '' );
				$icons .= ( ! empty( $vimeo ) ? '<a href="' . esc_url( $vimeo ) . '" class="t-element" title="Vimeo"><i class="fab fa-vimeo-v"></i></a>' : '' );
			} ?>

			<div class="top-bar">
				<div class="<?php echo esc_attr( get_theme_mod( 'lisse_container_type', 'container' ) ); ?>">
					<div class="row">
						<div class="col-md-12">
							<div class="top-bar-content customize-top">

								<?php
								if ( ! empty( $icons ) ) :
									?>
									<div class="contact-value-wrap">
										<?php echo $icons; // WPCS: XSS OK. ?>
									</div>
								<?php endif; ?>

								<?php
								if ( ! empty( $phone ) ) :
									?>
									<div class="contact-value-wrap t-element sm-hide">
										<a href="<?php echo esc_attr( 'tel:' . $phone ); ?>" title="<?php echo esc_attr__( 'Call', 'lisse' ); ?>">
											<i class="fas fa-phone"></i><span class="contact"><?php echo esc_html__( 'Call', 'lisse' ); ?></span>
										</a>
									</div>
								<?php endif; ?>

								<?php
								if ( ! empty( $email ) ) :
									?>
									<div class="contact-value-wrap t-element sm-hide">
										<a href="<?php echo esc_attr( 'mailto:' . $email ); ?>" title="<?php echo esc_attr__( 'Email', 'lisse' ); ?>">
											<i class="fas fa-envelope"></i><span class="contact"><?php echo esc_html__( 'Email', 'lisse' ); ?></span>
										</a>
									</div>
								<?php endif; ?>

								<?php
								if ( true === (bool) get_theme_mod( 'lisse_header_top_account_link_enable' ) ) :
									?>
									<?php
									if ( is_user_logged_in() ) :
										?>
										<div class="contact-value-wrap"><a href="<?php echo esc_url( wp_logout_url( get_permalink() ) ); ?>" title="<?php echo esc_attr__( 'Logout', 'lisse' ); ?>"><i class="fas fa-sign-out-alt"></i> <?php echo esc_html__( 'Logout', 'lisse' ); ?></a></div>
									<?php else : ?>
										<div class="contact-value-wrap"><a href="<?php echo esc_url( wp_login_url( get_permalink() ) ); ?>" title="<?php echo esc_attr__( 'Login', 'lisse' ); ?>"><i class="fas fa-user"></i> <?php echo esc_html__( 'Login', 'lisse' ); ?></a></div>
									<?php endif; ?>
								<?php endif; ?>

								<?php
								if ( ! empty( $cta_button ) ) :
									?>
									<div class="cta contact-value-wrap t-element">
										<a href="<?php echo esc_url( $cta_button_url ); ?>" title="<?php echo esc_attr( $cta_button ); ?>"><?php echo esc_html( $cta_button ); ?></a>
									</div>
								<?php endif; ?>

							</div><!-- .top-bar-content -->
						</div><!-- .col-md-12 -->
					</div><!-- .row -->
				</div><!-- .container -->
			</div><!-- .top-bar -->
			<?php
		}
	}
}
add_action( 'lisse_top_bar', 'lisse_top_bar' );

if ( ! function_exists( 'lisse_navigation' ) ) {

	/**
	 * Lisse Navigation
	 */
	function lisse_navigation() {
		?>
		<nav id="site-navigation" class="navbar navbar-expand-md navbar-light">
			<div class="<?php echo esc_attr( get_theme_mod( 'lisse_container_type', 'container' ) ); ?>">

				<?php do_action( 'lisse_site_branding' ); ?>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'menu_id'         => 'menu',
						'container'       => 'div',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarSupportedContent',
						'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
						'menu_class'      => 'navbar navbar-light ms-auto',
						'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
						'walker'          => new WP_Bootstrap_Navwalker(),
					)
				);
				?>
			</div><!-- .container -->
		</nav>
		<?php
	}
}
add_action( 'lisse_navigation', 'lisse_navigation' );

if ( ! function_exists( 'lisse_site_branding' ) ) {

	/**
	 * Lisse Site Branding
	 */
	function lisse_site_branding() {
		?>
		<div class="custom-logo">
			<?php if ( has_custom_logo() ) : ?>
				<div class="site-logo">
					<?php the_custom_logo(); ?>
				</div>
			<?php else : ?>
				<?php
				$title = get_bloginfo( 'name', 'display' );
				if ( $title ) :
					?>
					<div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
					<?php
				endif;
			endif;
			?>
		</div>

		<?php
		$description = get_bloginfo( 'description', 'display' );

		if ( display_header_text() === true && $description ) :
			?>
			<div class="site-description"><?php echo esc_html( $description ); ?></div>
			<?php
		endif;
	}
}
add_action( 'lisse_site_branding', 'lisse_site_branding' );

if ( ! function_exists( 'lisse_footer_col_one' ) ) {

	/**
	 * Lisse Footer Column One */
	function lisse_footer_col_one() {
		$col_one_title    = get_theme_mod( 'lisse_footer_col_one_title', 'Contact' );
		$col_one_logo_url = get_theme_mod( 'lisse_footer_col_one_logo' );
		$col_one_address  = get_theme_mod( 'lisse_footer_col_one_address', '12854 Broadway, Sacramento, CA 95818' );
		$email            = get_theme_mod( 'lisse_header_top_email', 'info@yourwebsite.com' );
		$phone            = get_theme_mod( 'lisse_header_top_phone', '916-222-3333' );
		$col_one_entry    = get_theme_mod( 'lisse_footer_col_one_entry' );

		if ( ! empty( $col_one_title ) || ! empty( $col_one_entry ) ) :
			?>
			<div class="col-one">
				<div class="h4"><?php echo esc_html( $col_one_title ); ?></div>
			</div><!-- .col-one -->
			<div><?php echo wp_kses_post( $col_one_entry ); ?></div>
		<?php endif; ?>

		<address>
			<?php if ( ! empty( $col_one_address ) ) : ?>
				<div class="contact-value-wrap">
					<i class="fas fa-map-marker-alt"></i><?php echo esc_html( $col_one_address ); ?>
				</div>
			<?php endif; ?>

			<?php if ( ! empty( $phone ) ) : ?>
				<div class="contact-value-wrap">
					<a href="<?php echo esc_url( 'tel:' . $phone ); ?>" title="<?php echo esc_attr__( 'Call', 'lisse' ); ?>">
						<i class="fas fa-phone"></i><span class="contact"><?php echo esc_html__( 'Call', 'lisse' ); ?></span>
					</a>
				</div>
			<?php endif; ?>

			<?php if ( ! empty( $email ) ) : ?>
				<div class="contact-value-wrap">
					<a href="<?php echo esc_url( 'mailto:' . $email ); ?>" title="<?php echo esc_attr__( 'Email', 'lisse' ); ?>">
						<i class="fas fa-envelope"></i><span class="contact"><?php echo esc_html__( 'Email', 'lisse' ); ?></span>
					</a>
				</div>
			<?php endif; ?>
		</address>

		<?php if ( $col_one_logo_url ) : ?>
			<img class="footer-logo" src="<?php echo esc_url( $col_one_logo_url ); ?>" alt="<?php bloginfo( 'name' ); ?>">
		<?php endif; ?>
		<?php
	}
}
add_action( 'lisse_footer_col_one', 'lisse_footer_col_one' );

if ( ! function_exists( 'lisse_footer_col_two' ) ) {

	/**
	 * Lisse Footer Column Two
	 */
	function lisse_footer_col_two() {
		$col_two_title = get_theme_mod( 'lisse_footer_col_two_title', 'Resources' );
		$col_two_entry = get_theme_mod( 'lisse_footer_col_two_entry', '<ul><li><a href="/#" title="About">About</a></li><li><a href="/#" title="Terms & Conditions">Terms & Conditions</a></li><li><a href="/#" title="Privacy Policy">Privacy Policy</a></li></ul>' );

		if ( ! empty( $col_two_title ) ) :
			?>
			<div class="col-two">
				<div class="h4"><?php echo esc_html( $col_two_title ); ?></div>
				<div><?php echo wp_kses_post( $col_two_entry ); ?></div>
			</div><!-- .col-two -->
		<?php endif; ?>
		<?php
	}
}
add_action( 'lisse_footer_col_two', 'lisse_footer_col_two' );


if ( ! function_exists( 'lisse_footer_col_three' ) ) {

	/**
	 * Lisse Footer Column Three
	 */
	function lisse_footer_col_three() {
		$col_three_title = get_theme_mod( 'lisse_footer_col_three_title' );
		$col_three_entry = get_theme_mod( 'lisse_footer_col_three_entry', '<blockquote>It is not in the stars to hold our destiny but in ourselves.<cite>– William Shakespeare</cite></blockquote>' );
		?>
		<div class="col-three">
			<div class="h4"><?php echo esc_html( $col_three_title ); ?></div>
			<div><?php echo wp_kses_post( $col_three_entry ); ?></div>
		</div><!-- .col-three -->
		<?php
	}
}
add_action( 'lisse_footer_col_three', 'lisse_footer_col_three' );

if ( ! function_exists( 'lisse_footer_copyright' ) ) {

	/**
	 * Lisse Footer Copyright
	 */
	function lisse_footer_copyright() {
		echo esc_html( get_theme_mod( 'lisse_footer_copyright', __(  '&copy; 2021 Lisse. All Rights Reserved.', 'lisse' ) ) );
	}
}
add_action( 'lisse_footer_copyright', 'lisse_footer_copyright' );

if ( ! function_exists( 'lisse_footer_social_icons' ) ) {
	/**
	 * Lisse Footer Social Icons
	 */
	function lisse_footer_social_icons() {

		$enable_social = get_theme_mod( 'lisse_footer_social_icons_enable', true );

		if ( true === (bool) $enable_social ) {
			$facebook  = get_theme_mod( 'lisse_header_top_facebook', '#' );
			$twitter   = get_theme_mod( 'lisse_header_top_twitter', '#' );
			$linkedin  = get_theme_mod( 'lisse_header_top_linkedin', '#' );
			$instagram = get_theme_mod( 'lisse_header_top_instagram' );
			$pinterest = get_theme_mod( 'lisse_header_top_pinterest' );
			$google    = get_theme_mod( 'lisse_header_top_google' );
			$vimeo     = get_theme_mod( 'lisse_header_top_vimeo' );

			$icons  = '';
			$icons .= ( ! empty( $facebook ) ? '<a href="' . esc_url( $facebook ) . '" class="t-element" title="Facebook"><i class="fab fa-facebook-f"></i></a>' : '' );
			$icons .= ( ! empty( $twitter ) ? '<a href="' . esc_url( $twitter ) . '" class="t-element" title="Twitter"><i class="fab fa-twitter"></i></a>' : '' );
			$icons .= ( ! empty( $linkedin ) ? '<a href="' . esc_url( $linkedin ) . '" class="t-element" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>' : '' );
			$icons .= ( ! empty( $instagram ) ? '<a href="' . esc_url( $instagram ) . '" class="t-element" title="Instagram"><i class="fab fa-instagram"></i></a>' : '' );
			$icons .= ( ! empty( $pinterest ) ? '<a href="' . esc_url( $pinterest ) . '" class="t-element" title="Pinterest"><i class="fab fa-pinterest-p"></i></a>' : '' );
			$icons .= ( ! empty( $google ) ? '<a href="' . esc_url( $google ) . '" class="t-element" title="Google"><i class="fab fa-google-plus-g"></i></a>' : '' );
			$icons .= ( ! empty( $vimeo ) ? '<a href="' . esc_url( $vimeo ) . '" class="t-element" title="Vimeo"><i class="fab fa-vimeo-v"></i></a>' : '' );
		}

		if ( ! empty( $icons ) ) : ?>
			<div class="footer-social">
				<div class="contact-value-wrap">
					<?php echo $icons; // WPCS: XSS OK. ?>
				</div>
			</div><!-- .footer-social -->
			<?php
		endif;
	}
}
add_action( 'lisse_footer_social_icons', 'lisse_footer_social_icons' );
