<?php
/**
 * The header for single pages
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package understrap-child-main
 */
$id=$post->ID;
$enjeu=slugenjeu($id);
$classeenjeu="enjeu-".$enjeu;
$GLOBALS['understrap-child-main']['enjeu']=$classeenjeu

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<title>Écopoétique Afrique</title>
	<meta name="keywords" content="Écopoétique,Afrique,Créations,anthologie">
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> class="body-single">
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'ecopoetique2' ); ?></a>


	<header id="masthead" class="site-header <?php echo $GLOBALS['understrap-child-main']['enjeu']?>" style="height: 16vh"> 
		<div class="<?php echo($classeenjeu) ?>" >
			<?php
			$laClasse;
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title" ><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
            	<div class="<?php echo $classeenjeu?>"><a href="https://ecopoetique.huma-num.fr"><img id="logoTitre" src="https://ecopoetique.huma-num.fr/wp-content/uploads/2023/06/Titre_blanc_site_ecopoetique_seul_du8kyg-e1693219891345.png" alt="Titre_blanc_site_ecopoetique_seul.png"></a></div>
				<?php
			endif;
			$ecopoetique2_description = get_bloginfo( 'description', 'display' );
			if ( $ecopoetique2_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $understrap-child-main_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div>
		<!-- .site-branding -->


	<header id="masthead" class="site-header" "divLogoTitre">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if (is_front_page() && is_home()):
				?>
				<h1 class="site-title" ><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>														<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
				<?php
			else:
				?>
				<!-- <p class="site-title text-white"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><H1><span class="noir" style="color:white"><span class="lettrine">A</span>NTHOLOGIE ÉCOPOÉTIQUE AFRIQUE</span></H1></a></p> -->
				<?php
			endif;
			if ($ecopoetique2_description || is_customize_preview()):
				?>
																			<p class="site-description"><?php echo $understrap-child-main_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
			<div id="footer-liens">
				
			


 </div> 
</div>
		</div><!-- .site-branding -->
</div><!-- #page -->



	</header><!-- #masthead -->

	