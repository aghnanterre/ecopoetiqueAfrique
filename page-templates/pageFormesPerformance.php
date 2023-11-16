<?php
/**
 * Template Name: pageFormePerformance
 *
 * Template for displaying a blank page.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$taxonomy = 'pays';
$nomFiltre='Afrique';

$taxonomy= 'forme_creation';
$nomFiltre='FORMES';

$taxonomy= 'enjeu_environnemental';
$nomFiltre='ENJEUX';

$terms = get_terms($taxonomy);
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
	get_header('blankFormes');?>
	<a href="https://ecopoetique.huma-num.fr/">
	<img class="noir img-fluid"  src="https://ecopoetique.huma-num.fr/wp-content/uploads/2023/08/LOGO_ECOPOETIQUE_STAR-e1693303056864.png" ">
	</a>

	
	<?php 
	// eval($GLOBALS['understrap-child-main']['string_query']);
		while ( have_posts() ) {
		the_post();
		//get_template_part( 'loop-templates/content', 'blank' ); // cette ligne lorsque le shortcode était dans l'interface admin, sa valeur pour mémoire est stockée ci-dessous en commentaire.
		
		// pour mémoire, le shortcode sans échappements :
		//[travelers-map minzoom=3 width=100% height=80vh post_types=post custom_tax="type_article=description" disable_clustering=true post_types=post page tileurl="https://{s}.tile.jawg.io/jawg-dark/{z}/{x}/{y}{r}.png?access-token=EDiK4LQEjFpT2p7S06fbibeGK6KTsbSPR7hYkaMQYj9VfeswuOoxJOFXlL9NkI6E" subdomains="abc" attribution='<a title="Tiles Courtesy of Jawg Maps" href="http://jawg.io" target="_blank" rel="noopener">© <b>Jawg</b>Maps</a> © <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors']
		//<div class="divLogoTitre"></div>
		
		// ci-dessous avec les échappements(pour pouvoir faire do_shortcode()) :
		//$shortcode='[travelers-map minzoom=3 width=100% height=80vh post_types=post open_link_in_new_tab=true custom_tax=\"type_article=description\" disable_clustering=true post_types=post page tileurl=\"https://{s}.tile.jawg.io/jawg-dark/{z}/{x}/{y}{r}.png?access-token=EDiK4LQEjFpT2p7S06fbibeGK6KTsbSPR7hYkaMQYj9VfeswuOoxJOFXlL9NkI6E\" subdomains=\"abc\" attribution=\'<a title=\"Tiles Courtesy of Jawg Maps\" href=\"http://jawg.io\" target=\"_blank\" rel=\"noopener\">© <b>Jawg</b>Maps</a> © <a href=\"https://www.openstreetmap.org/copyright\">OpenStreetMap</a> contributors\']';
		$GLOBALS['understrap-child-main']['shortcodePageArchive']='[travelers-map minzoom=3 maxzoom=8 width=100% height=80vh post_types=post open_link_in_new_tab=true custom_tax=forme_recensee=performance_theatre&type_article=description disable_clustering=true post_types=post page tileurl=\"https://{s}.tile.jawg.io/jawg-dark/{z}/{x}/{y}{r}.png?access-token=EDiK4LQEjFpT2p7S06fbibeGK6KTsbSPR7hYkaMQYj9VfeswuOoxJOFXlL9NkI6E\" subdomains=\"abc\" attribution=\'<a title=\"Tiles Courtesy of Jawg Maps\" href=\"http://jawg.io\" target=\"_blank\" rel=\"noopener\">© <b>Jawg</b>Maps</a> © <a href=\"https://www.openstreetmap.org/copyright\">OpenStreetMap</a> contributors\']';
		//
		// ici, c'est l'option où on exécute le shortcode qui est dans le custom field ecopoetique_query pour afficher la carte.
		// Le shortcode en cours est le contenu du champ qui est dans la page d'accueil (id 708)
		//$shortcode=get_field('ecopoetique_query',708);
		//echo do_shortcode($shortcode);
		echo do_shortcode($GLOBALS['understrap-child-main']['shortcodePageArchive']);
		}
	?>
	<p style="font-color=white">
	<?php //console_maison("sting query :".$GLOBALS['understrap-child-main']['string_query'])?>
	</p>
	
	<?php 
	wp_footer();
	?>
	<?php //echo(get_field('ecopoetique_query',708));?>
</body>
</html>
