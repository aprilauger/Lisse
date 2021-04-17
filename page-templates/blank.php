<?php
/**
 * Template for displaying a blank page.
 *
 * @package Lisse
 */

get_header();
get_template_part( 'template-parts/header/title-block' );
?>

<body>
	<?php
	wp_body_open();
	?>

	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content/content', 'blank' );

	endwhile;
	?>
	<?php wp_footer(); ?>
</body>

</html>
