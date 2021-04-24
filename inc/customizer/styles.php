<?php
/**
 * Outputs classes into the body and styles into the head.
 *
 * @package Lisse
 */

if ( ! function_exists( 'lisse_head_styles' ) ) {
	/**
	 * Outputs inline head styles.
	 */
	function lisse_head_styles() {
		$top_enable      = esc_attr( get_theme_mod( 'lisse_header_top_enable', true ) );
		$hdr_title       = esc_attr( get_theme_mod( 'lisse_header_general_title_frgd', '#FFFFFF' ) );
		$hdr_case        = esc_attr( get_theme_mod( 'lisse_header_general_case', 'capitalize' ) );
		$color_primary   = esc_attr( get_theme_mod( 'lisse_color_scheme_primary', '#0088DB' ) );
		$styles          = '';

		if ( $top_enable ) {
			$top_bkgd  = esc_attr( get_theme_mod( 'lisse_header_top_bkgd', '#212121' ) );
			$top_bdr   = esc_attr( get_theme_mod( 'lisse_header_top_bdr', '#FFFFFF' ) );
			$top_link  = esc_attr( get_theme_mod( 'lisse_header_top_link', '#FFFFFF' ) );
			$top_hover = esc_attr( get_theme_mod( 'lisse_header_top_hover', '#3698FF' ) );

			if ( true === lisse_hex_check( $top_bkgd ) ) {
				$top_bkgd = lisse_hex2rgba( $top_bkgd ); // Converts a hex value to RGBA.
			}

			$styles .= '
				.bm-horizontal .top-bar {background-color: ' . $top_bkgd . '; border-bottom: 1px solid ' . $top_bdr . ';}
				.bm-horizontal .top-bar a:link {color:' . $top_link . '}
				.bm-horizontal .top-bar a:visited {color:' . $top_link . '}
				.bm-horizontal .top-bar a:visited:hover {color:' . $top_hover . '}
				.bm-horizontal .top-bar a:link:hover {color: ' . $top_hover . '}
				.bm-horizontal .top-bar a:link:active {color: ' . $top_hover . '}
				.bm-horizontal .top-bar .cta {background-color: ' . $color_primary . '}
				.bm-horizontal .top-bar .cta a:hover {color: ' . $top_link . '}
				.bm-horizontal .top-bar .cta:hover {color: ' . $top_link . '; background-color:' . $color_primary . ';filter: brightness(120%);}';
		}

		$hdr_link        = esc_attr( get_theme_mod( 'lisse_header_primary_link', '#212121' ) );
		$hdr_visited     = esc_attr( get_theme_mod( 'lisse_header_primary_visited', '#212121' ) );
		$hdr_hover       = esc_attr( get_theme_mod( 'lisse_header_primary_hover', '#3698FF' ) );
		$hdr_active      = esc_attr( get_theme_mod( 'lisse_header_primary_active', '#0088DB' ) );
		$hdr_bkgd        = esc_attr( get_theme_mod( 'lisse_header_primary_bkgd', '#FFFFFF' ) );
		$hdr_bkgd_scroll = esc_attr( get_theme_mod( 'lisse_header_primary_bkgd_scroll', '#FFFFFF' ) );

		$color_secondary = esc_attr( get_theme_mod( 'lisse_color_scheme_secondary', '#0088DB' ) );
		$color_text      = esc_attr( get_theme_mod( 'lisse_color_scheme_text', '#333333' ) );
		$color_link      = esc_attr( get_theme_mod( 'lisse_color_scheme_link', '#3698FF' ) );
		$color_visited   = esc_attr( get_theme_mod( 'lisse_color_scheme_link_visited', '#0088DB' ) );
		$color_hover     = esc_attr( get_theme_mod( 'lisse_color_scheme_link_hover', '#3698FF' ) );
		$color_active    = esc_attr( get_theme_mod( 'lisse_color_scheme_link_active', '#0088DB' ) );

		$footer_bkgd      = esc_attr( get_theme_mod( 'lisse_footer_bkgd', '#212121' ) );
		$footer_copy_bkgd = esc_attr( get_theme_mod( 'lisse_footer_copy_bkgd', '#181818' ) );
		$footer_frgd      = esc_attr( get_theme_mod( 'lisse_footer_frgd', '#aaaaaa' ) );
		$footer_header    = esc_attr( get_theme_mod( 'lisse_footer_header', '#ffffff' ) );
		$footer_link      = esc_attr( get_theme_mod( 'lisse_footer_link', '#aaaaaa' ) );
		$footer_visited   = esc_attr( get_theme_mod( 'lisse_footer_visited', '#aaaaaa' ) );
		$footer_hover     = esc_attr( get_theme_mod( 'lisse_footer_hover', '#3698FF' ) );
		$footer_bkgd_img  = esc_url( get_theme_mod( 'lisse_footer_general_image' ) );

		if ( true === lisse_hex_check( $hdr_bkgd ) ) {
			$hdr_bkgd = lisse_hex2rgba( $hdr_bkgd );
		}

		$styles .= '
			body {color:' . $color_text . '}

			.step h3 {color:' . $color_primary . '}
			.tb-content h1, .tb-content {color: ' . $hdr_title . '}
			h3, h5 {color: ' . $color_secondary . '}
			a.post-page-numbers, a.post-page-numbers:visited {color: ' . $color_text . ' !important}
			h3.widget-title::after, .separator h2::after { background-color: ' . $color_primary . ';}

			a:link, .btn.btn-light:hover::after, .card .card-body h2 a:hover, .card .card-body h3 a:hover {color: ' . $color_link . '}
			a:visited {color: ' . $color_visited . '}
			a:hover, .excerpt h2 a:hover, .excerpt h4 a:hover, .entry-meta a:hover {color: ' . $color_hover . ';}
			.cat-links a:hover, .tags-links a:hover { color:#ffffff; background-color: ' . $color_hover . '}
			a:active {color: ' . $color_active . '}

			.img-wrapper .item-icon::after, .entry-meta::before { background-color: ' . $color_primary . '}
			.col-md-6.left.primary-color.bkg-image::after {background-color: ' . $color_primary . '; border: ' . $color_primary . '}
			.col-md-6.left .buttons a.button, .col-md-6.left .buttons a.button:visited {color: ' . $color_primary . '}
			.bg-light {background-color: ' . $hdr_bkgd . ' !important;}
			.bg-light.scroll-on {background-color: ' . $hdr_bkgd_scroll . ' !important;}
			.more-link:link, .more-link:visited, .more-link:active {color: ' . $color_primary . '; border: 1px solid ' . $color_primary . ' }

			.btn-default {border: ' . $color_primary . '}
			.btn-primary, button, button[type=submit] {background-color: ' . $color_primary . '; border: ' . $color_primary . ';color: #ffffff;}
			.btn-primary:link, .btn-primary:visited, button, .button:visited {color: #ffffff;}
			.btn-primary:hover, button {background-color: ' . $color_hover . '; color: #ffffff;}
			.btn-primary:active, button:active {color: #ffffff;}
			.btn-outline-primary:link {color: ' . $color_primary . '; border: 1px solid ' . $color_primary . ';}
			.btn-outline-primary:visited {color: ' . $color_visited . '; background: none; border: 1px solid ' . $color_visited . ';}
			.btn-outline-primary:hover {color: ' . $color_hover . '; background: none; border: 1px solid ' . $color_hover . ';}
			.btn-outline-primary:active {color: ' . $color_active . '; background: none; border: 1px solid ' . $color_active . ';}
			.secondary-color {background: ' . $color_secondary . ';}

			#content blockquote {border-left-color: ' . $color_primary . '}
			#content blockquote::after {color: ' . $color_primary . '}

			#footer {color: ' . $footer_frgd . '; background: ' . $footer_bkgd . '}
			#footer .h4 {color: ' . $footer_header . '}
			#footer a:link {color: ' . $footer_link . '}
			#footer a:visited {color: ' . $footer_visited . '}
			#footer a:hover, #footer a:active {color: ' . $footer_hover . '}
			#footer blockquote {color: ' . $footer_frgd . '; border:0; border-left:1px solid ' . $footer_link . ';}
			#footer .ft-copy {color: ' . $footer_frgd . ';background:' . $footer_copy_bkgd . ';}
			';

		if ( ! empty( $footer_bkgd_img ) ) {
			$styles .= '#footer {background-image: url(' . $footer_bkgd_img . ');
				background-size: cover;
				background-position: center;}';
		}

		$styles .= '
		.bm-horizontal .navbar {text-transform: ' . $hdr_case . '}
		.bm-horizontal .nav-link {color: ' . $hdr_link . ';}

		.bm-horizontal .navbar-toggler-icon::after,
		.bm-horizontal .navbar-toggler-icon::before {background-color: ' . $hdr_link . ';}

		.bm-horizontal .menu-item::after,
		.bm-horizontal .navbar-toggler-icon::before {background-color: ' . $hdr_hover . ';}

		.bm-horizontal .navbar-toggler-icon {border-color: ' . $hdr_link . ';}

		@media (max-width: 767px){
			.bm-horizontal .bg-light {background-color: #ffffff;}
			.bm-horizontal .menu-item::after,
			.bm-horizontal .navbar-toggler-icon::before {background-color:' . $hdr_link . '}
		}

		@media (min-width: 768px){
			.bm-horizontal .nav-item.menu-item-has-children.dropdown::before{color:' . $hdr_link . '}
		}

		.bm-horizontal .active>.nav-link,
		.bm-horizontal .nav-link.show,
		.bm-horizontal .show>.nav-link {color: ' . $hdr_active . ';}
		.bm-horizontal a.dropdown-item:link,
		.bm-horizontal a.dropdown-item:visited,
		.bm-horizontal a.dropdown-item:active{color: ' . $hdr_visited . ';}

		.bm-horizontal .nav-link:hover,
		.bm-horizontal .menu-item::before,
		.bm-horizontal a.dropdown-item:hover,
		.bm-horizontal .dropdown-item:focus {
			color: ' . $hdr_hover . ';
		}

		.bm-horizontal li > a.nav-link:hover,
		.bm-horizontal li > a.nav-link:active {
			color:' . $hdr_hover . ';
		}

		.bm-horizontal .navbar .menu-item::after,
		.bm-horizontal ul li ul .nav-item.show::before {
			background-color:' . $hdr_hover . ';
		}

		aside.widget ul li::before {color: ' . $color_primary . ';}

		input[type="radio"]:checked, input[type="checkbox"]:checked {background-color: ' . $color_primary . '; }
		input[type=submit], div.wpforms-container-full .wpforms-form input[type=submit], div.wpforms-container-full .wpforms-form button[type=submit], div.wpforms-container-full .wpforms-form .wpforms-page-button{ background:' . $color_primary . '; border-color:' . $color_primary . '}
		input[type=submit]:hover, div.wpforms-container-full .wpforms-form button[type=submit]:hover {background:' . $color_hover . '; border-color:' . $color_hover . '}
		';

		return $styles;
	}
}

if ( ! function_exists( 'lisse_jumbotron_styles' ) ) {
	/**
	 * Outputs jumbotron styles.
	 */
	function lisse_jumbotron_styles() {
		$image                = esc_url( get_theme_mod( 'lisse_jumbotron_image' ) );
		$enable_first_btn     = esc_attr( get_theme_mod( 'lisse_jumbotron_first_btn_enable', true ) );
		$first_btn_color      = esc_attr( get_theme_mod( 'lisse_jumbotron_first_btn_frgd', '#FFFFFF' ) );
		$first_btn_bkgd       = esc_attr( get_theme_mod( 'lisse_jumbotron_first_btn_bkgd', '#0088DB' ) );
		$first_btn_bkg_hover  = esc_attr( get_theme_mod( 'lisse_jumbotron_first_btn_bkgd_hover', '#3698FF' ) );
		$first_btn_bdr        = esc_attr( get_theme_mod( 'lisse_jumbotron_first_btn_bdr', '#0088DB' ) );
		$enable_second_btn    = esc_attr( get_theme_mod( 'lisse_jumbotron_second_btn_enable', true ) );
		$second_btn_color     = esc_attr( get_theme_mod( 'lisse_jumbotron_second_btn_frgd', '#FFFFFF' ) );
		$second_btn_bkgd      = esc_attr( get_theme_mod( 'lisse_jumbotron_second_btn_bkgd', 'rgba(255,255,255,0)' ) );
		$second_btn_bkg_hover = esc_attr( get_theme_mod( 'lisse_jumbotron_second_btn_bkgd_hover', 'rgba(255,255,255,0.2)' ) );
		$second_btn_bdr       = esc_attr( get_theme_mod( 'lisse_jumbotron_second_btn_bdr', '#FFFFFF' ) );
		$title_frgd           = esc_attr( get_theme_mod( 'lisse_jumbotron_title_frgd', '#FFFFFF' ) );
		$description_frgd     = esc_attr( get_theme_mod( 'lisse_jumbotron_description_frgd', '#FFFFFF' ) );
		$overlay              = esc_attr( get_theme_mod( 'lisse_jumbotron_overlay', 'rgba(0,0,0,0.50)' ) );
		$content_alignment    = esc_attr( get_theme_mod( 'lisse_jumbotron_content_alignment', 'center' ) );
		$enable_parallax      = esc_attr( get_theme_mod( 'lisse_jumbotron_enable_parallax', true ) );
		$bkg_position_x       = esc_attr( get_theme_mod( 'lisse_jumbotron_bkg_position_x', 'center' ) );
		$bkg_position_y       = esc_attr( get_theme_mod( 'lisse_jumbotron_bkg_position_y', 'center' ) );
		$bkg_repeat           = esc_attr( get_theme_mod( 'lisse_jumbotron_bkg_repeat', 'no-repeat' ) );
		$bkg_size             = esc_attr( get_theme_mod( 'lisse_jumbotron_bkg_size', 'cover' ) );
		$styles               = '';

		$styles  = '.jumbotron {
			background-position: ' . $bkg_position_x . ' ' . $bkg_position_y . ';
			background-repeat: ' . $bkg_repeat . ';
			background-size: ' . $bkg_size . ';';
		$styles .= ( $enable_parallax ) ? 'background-attachment: fixed;' : '';

		if ( ! empty( $image ) ) {
			$styles .= 'background-image: url(' . $image . ');';
		} elseif ( ! empty( get_header_image() ) ) {
			$styles .= 'background-image: url(' . esc_url( get_header_image() ) . ')';
		} else {
			$styles .= 'background-image: url(' . get_template_directory_uri() . '/assets/img/lisse-wordpress-theme.jpg)';
		}

		$styles .= '}';
		$styles .= '.home .jumbotron::after  {background-color: ' . $overlay . ' !important}';

		if ( $enable_first_btn ) {
			$styles .= '
			.jumbotron-container .buttons .button-one {color: ' . $first_btn_color . ';background-color: ' . $first_btn_bkgd . ';border: 1px solid ' . $first_btn_bdr . '}
			.jumbotron-container .buttons .button-one:visited {background-color: ' . $first_btn_bkgd . '}
			.jumbotron-container .buttons .button-one:hover {background-color: ' . $first_btn_bkg_hover . '}';
		}

		if ( $enable_second_btn ) {
			$styles .= '
				.jumbotron-container .buttons .button-two {color:' . $second_btn_color . ';background-color: ' . $second_btn_bkgd . ';border: 1px solid ' . $second_btn_bdr . '}
				.jumbotron-container .buttons .button-two:visited {background-color: ' . $second_btn_bkgd . '}
				.jumbotron-container .buttons .button-two:hover {background-color: ' . $second_btn_bkg_hover . '}';
		}

		$styles .= ( $content_alignment ) ? '.jumbotron-container {text-align: ' . $content_alignment . ';}' : '';
		$styles .= ( $title_frgd ) ? '.jumbotron-container h1 {color: ' . $title_frgd . ';}.divider-separator {border-color: ' . $title_frgd . ';}' : '';
		$styles .= ( $description_frgd ) ? '.jumbotron-container .section-description {color: ' . $description_frgd . ';}' : '';

		return $styles;
	}
}

if ( ! function_exists( 'lisse_styles' ) ) {
	/**
	 * Outputs jumbotron styles
	 */
	function lisse_styles() { ?>
		<style type="text/css" id="lisse-header-styles">
			<?php echo lisse_head_styles();  // WPCS: XSS OK. ?>
		</style>

		<?php if ( true === (bool) get_theme_mod( 'lisse_front_jumbotron_enable', true ) && is_front_page() ) : ?>
			<style type="text/css" id="lisse-jumbotron-styles">
				<?php echo lisse_jumbotron_styles(); // WPCS: XSS OK. ?>
			</style>
			<?php
		endif;
	}

	add_action( 'wp_head', 'lisse_styles' );
}

/**
 * Outputs title block on posts and pages.
 */
function lisse_title_block() {
	$hdr_title_bkgd       = esc_attr( get_theme_mod( 'lisse_header_title_bkgd', '#0088DB' ) );
	$hdr_title_alignment  = esc_attr( get_theme_mod( 'lisse_header_title_content_alignment', 'left' ) );
	$blog_enable_parallax = get_theme_mod( 'lisse_blog_enable_parallax', true );
	$blog_parallax        = ( $blog_enable_parallax ) ? 'background-attachment:fixed' : '';
	$styles               = 'text-align:' . $hdr_title_alignment . ';';
	$styles              .= $blog_parallax . ';';

	global $post;

	// Set background image or color.
	if ( is_home() ) {
		$image_id  = attachment_url_to_postid( get_theme_mod( 'lisse_blog_image' ) );
		$image_url = wp_get_attachment_image_src( $image_id, 'lisse-post-banner' );

		if ( $image_url ) {
			$styles .= 'background-image: url(' . esc_url( $image_url[0] ) . ');background-size:cover;background-position:center center;';
		} else {
			$styles .= 'background-image: url(' . get_template_directory_uri() . '/assets/img/lisse-wordpress-blog-header.jpg);background-size:cover;background-position:center center;';
		}
	} elseif ( is_singular() ) {

		if ( has_post_thumbnail( $post->ID ) ) {
			$styles .= 'background-image:url(' . get_the_post_thumbnail_url( $post->ID, 'lisse-post-banner' ) . ');background-size:cover;background-position:center center;';
		} else {
			$styles .= 'background-color:' . $hdr_title_bkgd . ';';
		}
	} else {
		$styles .= ' background-color:' . $hdr_title_bkgd . ';';
	}

	echo esc_attr( $styles );
}
add_action( 'lisse_title_block', 'lisse_title_block' );


/**
 * Outputs classes to the title block.
 */
function lisse_title_block_classes() {
	$blog_image = esc_url( get_theme_mod( 'lisse_blog_image', get_template_directory_uri() . '/assets/img/lisse-wordpress-blog-header.jpg' ) );
	$classes    = '';
	global $post;

	if ( isset( $blog_image ) && is_home() || has_post_thumbnail( $post->ID ) ) {
		$classes = 'bkg-image';
	} elseif ( ! has_post_thumbnail( $post->ID ) ) {
		$classes = 'no-bkg-img';
	}

	echo esc_attr( $classes );
}
add_action( 'lisse_title_block_classes', 'lisse_title_block_classes' );
