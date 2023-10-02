<?php
/**
 * Template Name: Blank Page Template
 *
 * Template for displaying a blank page.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body class="noir">
	<?php
	get_header('blank');?>
	<a href="https://ecopoetique.huma-num.fr/">
	<img class="noir img-fluid"  src="https://ecopoetique.huma-num.fr/wp-content/uploads/2023/08/LOGO_ECOPOETIQUE_STAR-e1693303056864.png" ">
	</a>
	<?php 
	eval($GLOBALS['understrap-child-main']['string_query']);
		while ( have_posts() ) {
		the_post();
		get_template_part( 'loop-templates/content', 'blank' );
	}
	?>
	<p style="font-color=white">
	<?php console_maison("sting query :".$GLOBALS['understrap-child-main']['string_query'])?>
	</p>
	
	<?php 
	wp_footer();
	?>
</body>
</html>
