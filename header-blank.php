<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ecopoetique2
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<title>Écopoétique Afrique</title>
	<meta name="keywords" content="Écopoétique,Afrique,Créations,anthologie">
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://kit.fontawesome.com/6a76ca265f.js" crossorigin="anonymous"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class() ; ?> "noir">
<!--  L'image titre du site n'est pas dans le header (c'est pourquoi elle est décommentée), mais dans la page d'accueil, blank.php
<img class="noir img-fluid"  src="https://ecopoetique.huma-num.fr/wp-content/uploads/2023/06/Titre_blanc_site_ecopoetique_seul_du8kyg-e1693219891345.png" alt="Titre_blanc_site_ecopoetique_seul.png" "><?php wp_body_open(); ?>
 -->
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'ecopoetique2'); ?></a>

	<header id="masthead" class="site-header" "divLogoTitre">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if (is_front_page() && is_home()):
				?>
																			<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home">BUBU<?php bloginfo('name'); ?></a></h1>
				<?php
			else:
				?>
															<!-- 				<p class="site-title text-white"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><H1><span class="noir" style="color:white"><span class="lettrine">A</span>NTHOLOGIE ÉCOPOÉTIQUE AFRIQUE</span></H1></a></p> -->
				<?php
			endif;
			$ecopoetique2_description = get_bloginfo('description', 'display');
			if ($ecopoetique2_description || is_customize_preview()):
				?>
																			<p class="site-description"><?php echo $ecopoetique2_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
			<div id="footer-liens">
				
			

<div id="bottomNavbarHome" class="noir">
		<div id="logosBottomNavBar">
		<style>background-color:black;</style>
			<a href="http://www.univ-paris3.fr/"><img class="logoHomePage" src="https://ecopoetique.huma-num.fr/wp-content/uploads/2023/06/sorbonne-nouvelle-devise-trapezes-blanc-2-e1686321670285.png" alt="logo Bonne Nouvelle"></a>
			<a href="https://www.thalim.cnrs.fr/"><img class="logoHomePage" src="https://ecopoetique.huma-num.fr/wp-content/uploads/2023/06/cropped-logo-THALIM21_jkq3hr-e1692879395521.png" alt="logo Thalim"></a>
			<a href="https://www.iufrance.fr/"><img class="logoHomePage" src="https://ecopoetique.huma-num.fr/wp-content/uploads/2023/08/IUF-LOGO-COMPLET-Blanc-e1692878880628.png" alt="logo iuf"></a>  
			<a href="https://www.cnrs.fr/fr"><img class="logoHomePage" src="https://ecopoetique.huma-num.fr/wp-content/uploads/2023/06/logo_CNRS_blanc-e1686321566204.png" alt="logo cnrs"></a>
			<a href="https://www.huma-num.fr/"><img class="logoHomePage" src="https://ecopoetique.huma-num.fr/wp-content/uploads/2023/06/logo-petit-hn-netb-e1686321489296.jpg" alt="huma-num" style="border:2px solid #fff" ></a>
		</div>
		
		<div id="liens" class="noir">
			<a style="text-decoration:none; margin-right:20px" href="https://ecopoetique.huma-num.fr/le-projet">*Le Projet <i class="fa-solid fa-caret-right"></i></a>
			<a href="https://ecopoetique.huma-num.fr/le-projet">Contact <i class="fa-solid fa-caret-right"></i></a>
		</div>
 </div> 
</div>
		</div><!-- .site-branding -->
</div><!-- #page -->
	<!-- Matomo --> 
<script>
  var _paq = window._paq = window._paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
	var u="https://analyseweb.huma-num.fr/";
	_paq.push(['setTrackerUrl', u+'piwik.php']);
	_paq.push(['setSiteId', '427']);
	var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
	g.async=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Matomo Code -->


	</header><!-- #masthead -->

	