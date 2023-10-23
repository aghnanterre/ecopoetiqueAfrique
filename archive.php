<?php
/**
 * The template for displaying search results pages
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header('blank');

$container = get_theme_mod( 'understrap_container_type' );

?>
<body class="noir">
	<?php
	get_header('blank');?>
	<a href= "https://ecopoetique.huma-num.fr/"><img class="noir img-fluid"  src="https://ecopoetique.huma-num.fr/wp-content/uploads/2023/08/LOGO_ECOPOETIQUE_STAR-e1693303056864.png" "></a>
		<?php echo do_shortcode( ' [travelers-map minzoom=3 maxzoom=3 current_query_markers=false width=100% height=80vh disable_clustering=true post_types=post tileurl="https://{s}.tile.jawg.io/jawg-dark/{z}/{x}/{y}{r}.png?access-token=EDiK4LQEjFpT2p7S06fbibeGK6KTsbSPR7hYkaMQYj9VfeswuOoxJOFXlL9NkI6E" subdomains="abc" attribution=\'<a href="http://jawg.io>\' title="Tiles Courtesy of Jawg Maps" target="_blank" ] ' );
		
		
		//		get_template_part( 'loop-templates/content', 'blank' );	
	?>
	<?php 
	wp_footer();
	?>
</body>


<?php
get_footer('empty');
