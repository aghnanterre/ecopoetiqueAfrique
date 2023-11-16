<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package understrap-child-main
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

<body <?php body_class() ; ?>>
<!--  L'image titre du site n'est pas dans le header (c'est pourquoi elle est commentée ici), mais dans la page d'accueil, blank.php
<img class="noir img-fluid"  src="https://ecopoetique.huma-num.fr/wp-content/uploads/2023/06/Titre_blanc_site_ecopoetique_seul_du8kyg-e1693219891345.png" alt="Titre_blanc_site_ecopoetique_seul.png" "><?php wp_body_open(); ?>
 -->
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'understrap-child-main'); ?></a>

<?php
// R�cup�rer les termes de la taxonomie "enjeu-environnement"
$taxonomy= 'enjeu_environnemental';
$nomFiltre='ENJEUX';
$terms = get_terms($taxonomy);
?>
<select onChange="window.location.href=window.location.origin.concat('/',value)" id="filter-dropdown<?php echo("-".$taxonomy)?>" class="<?php echo("filtre-".$taxonomy)?> " >
    <option id="<?php echo($nomFiltre)?>"  value="">sélectionner un enjeu</option> <!-- Option pour afficher tous les termes -->
    <?php foreach ($terms as $term) : ?> 
    <?php 
    $stringlien="<option value=\"".$term->slug."\""."><a href=\"https://ecopoetique.huma-num.fr/".$taxonomy."/".$term->slug."\">".$term->slug."</a></option>";
    //echo($stringlien);
    ?>   
    
        <option value="<?php echo($taxonomy."/".$term->slug); ?>"><a href="https://ecopoetique.huma-num.fr/<?php echo("/".$taxonomy."/".$term->slug)?>"><?php echo $term->name; ?></a></option>
    <?php endforeach; ?>
</select>



<?php 
$taxonomy= 'forme_creation';
$nomFiltre='FORMES_CREATION';
$terms = get_terms($taxonomy);
?>
<select onChange="window.location.href=window.location.origin.concat('/',value)" id="filter-dropdown<?php echo("-".$taxonomy)?>" class="<?php echo("filtre-".$taxonomy)?> " >
    <option id="selection"  value="">sélectionner une forme</option>
    <option id="danse"  value="performance_danse">danse</option>
    <option id="chant"  value="performance_chants">chant</option>
    <option id="theatre"  value="performance_theatre">théâtre</option>
    <option id="photographies"  value="photographies">photographies</option>
    <option id="bd"  value="bd">bande dessinée</option>
    <option id="peintures"  value="peintures">peintures</option>
    <option id="sculptures"  value="sculpture">sculptures</option>
    <option id="films"  value="films">films</option>
    <option id="romans"  value="romans">romans</option>
    <option id="essais"  value="essais_et_articles">essais, articles</option>
    <option id="poemes"  value="poemes">poemes</option>
</select>


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
		<div id="liens" class="noir">
			<form  action="/" method="get">
				<input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
			</form>
			<a style=" text-decoration:none; margin-left:35px; margin-right:35px; color:white;" href="https://ecopoetique.huma-num.fr/le-projet">*Le Projet <i class="fa-solid fa-caret-right"></i></a>
			<a style="text-decoration:none; color:white;" href="https://ecopoetique.huma-num.fr/contact/">Contact <i class="fa-solid fa-caret-right"></i></a>


		</div>
		
		<div id="logosBottomNavBar">
		<style>background-color:black;</style>
			<a href="http://www.univ-paris3.fr/" target="_blank" rel="noopener noreferrer"><img class="logoHomePage" src="https://ecopoetique.huma-num.fr/wp-content/uploads/2023/06/sorbonne-nouvelle-devise-trapezes-blanc-2-e1686321670285.png" alt="logo Bonne Nouvelle"></a>
			<a href="https://www.thalim.cnrs.fr/" target="_blank" rel="noopener noreferrer"><img class="logoHomePage" src="https://ecopoetique.huma-num.fr/wp-content/uploads/2023/06/cropped-logo-THALIM21_jkq3hr-e1692879395521.png" alt="logo Thalim"></a>
			<a href="https://www.iufrance.fr/" target="_blank" rel="noopener noreferrer"><img class="logoHomePage" src="https://ecopoetique.huma-num.fr/wp-content/uploads/2023/06/IUF_logotype_blanc_hxq00f-e1686321614401.png" alt="logo iuf"></a>  
			<a href="https://www.cnrs.fr/fr" target="_blank" rel="noopener noreferrer"><img class="logoHomePage" src="https://ecopoetique.huma-num.fr/wp-content/uploads/2023/06/logo_CNRS_blanc-e1686321566204.png" alt="logo cnrs"></a>
			<a href="https://www.huma-num.fr/" target="_blank" rel="noopener noreferrer"><img class="logoHomePage" src="https://ecopoetique.huma-num.fr/wp-content/uploads/2023/06/logo-petit-hn-netb-e1693423147375.jpg" alt="huma-num"  ></a>
			<a href="https://zonezadir.hypotheses.org/" target="_blank" rel="noopener noreferrer"><img class="logoHomePage" src="https://ecopoetique.huma-num.fr/wp-content/uploads/2023/10/ZZ1-final-NB-e1697993221360.jpg" alt="huma-num"  ></a>
		</div>
		

 </div> 
</div>
		</div><!-- .site-branding -->
</div><!-- #page -->



	</header><!-- #masthead -->

	