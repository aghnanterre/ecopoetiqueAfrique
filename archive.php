<?php
/**
 * The template archives
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header('blankFormes');

$container = get_theme_mod( 'understrap_container_type' );

?>
<body class="noir">
	<?php
	get_header('blank');?>
	<a href= "https://ecopoetique.huma-num.fr/"><img class="noir img-fluid"  src="https://ecopoetique.huma-num.fr/wp-content/uploads/2023/08/LOGO_ECOPOETIQUE_STAR-e1693303056864.png" "></a>
		<?php 
		
		//echo do_shortcode( ' [travelers-map minzoom=3 maxzoom=3 current_query_markers=false width=100% height=80vh disable_clustering=true post_types=post open_link_in_new_tab=true custom_tax=\"type_article=description\" page tileurl="https://{s}.tile.jawg.io/jawg-dark/{z}/{x}/{y}{r}.png?access-token=EDiK4LQEjFpT2p7S06fbibeGK6KTsbSPR7hYkaMQYj9VfeswuOoxJOFXlL9NkI6E" subdomains="abc" attribution=\'<a href="http://jawg.io>\' title="Tiles Courtesy of Jawg Maps" target="_blank" ] ' );
		           $shortcode='[travelers-map minzoom=3 maxzoom=4 current_query_markers=false width=100% height=80vh disable_clustering=true post_types=post open_link_in_new_tab=true custom_tax=\"type_article=description\" post_types=post page tileurl=\"https://{s}.tile.jawg.io/jawg-dark/{z}/{x}/{y}{r}.png?access-token=EDiK4LQEjFpT2p7S06fbibeGK6KTsbSPR7hYkaMQYj9VfeswuOoxJOFXlL9NkI6E\" subdomains=\"abc\" attribution=\'<a title=\"Tiles Courtesy of Jawg Maps\" href=\"http://jawg.io\" target=\"_blank\" rel=\"noopener\">© <b>Jawg</b>Maps</a> © <a href=\"https://www.openstreetmap.org/copyright\">OpenStreetMap</a> contributors\']';
		echo do_shortcode($shortcode);
		
		
		//		get_template_part( 'loop-templates/content', 'blank' );	
	?>
	<?php 
	wp_footer();
	?>
</body>


<?php
get_footer('empty');
