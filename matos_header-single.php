 <?php
/**.
 * The header for our theme
 *.
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ecopoetique2
 */


$id=$post->ID;
$enjeu=slugenjeu($id);
$classeenjeu="enjeu-".$enjeu;
 
?>
<!doctype html>

<html <?php language_attributes(); ?>>


<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> class="body-single">
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'ecopoetique2' ); ?></a>

	<header id="masthead" class="site-header <?php echo $GLOBALS['ecopoetique2']['enjeu']?>">
		<div class="site-branding">
			<?php
			$laClasse;
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title" ><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
            	<div class="<?php echo $classeenjeu?>"><a href="https://ecopoetique.huma-num.fr"><img id="logoTitre" src="https://res.cloudinary.com/cloud-renaud/image/upload/v1652365048/Titre_blanc_site_ecopoetique_seul_du8kyg.png" alt="Titre_blanc_site_ecopoetique_seul.png"></a></div>
				<?php
			endif;
			$ecopoetique2_description = get_bloginfo( 'description', 'display' );
			if ( $ecopoetique2_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $ecopoetique2_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div>
		<!-- .site-branding -->
		
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
