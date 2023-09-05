<?php
/**
 * The template for displaying all single posts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header('single');

// mise à jour de l'enjeu courant (lié à l'article)
$id = get_the_id();
$idEnjeuSitué = get_post_meta($id, 'num_enjeu_situé', true);
$titreEnjeuSitué = get_the_title($idEnjeuSitué);
$lePermalien = get_permalink($id);
$lenjeu = slugenjeu($id);

/* Mise à jour de la valeur courante de l'enjeu, dont
 * dépendra la couleur du de l'enjeu et du titre */
$GLOBALS['ecopoetique2']['enjeu'] = "enjeu-" . $lenjeu;

$nomClasseEnjeu = $GLOBALS['ecopoetique2']['enjeu'] . "_texte"; // pour que les titres soient de la bonne couleur selon l'enjeu


/* Si l'article courant est un enjeu situé ($idEnjeuSitué==$id),
 * alors on met l'enjeu en première ligne ($enjeuOuForme). 
 * Sinon, on écrit la forme de la création.
 */
if ($idEnjeuSitué == $id) {
    $enjeuOuForme = etiquette(slugenjeu($id));
} else {
    $enjeuOuForme = texte_forme(slugforme_creation($id));
}

$titreArticle=get_the_title($id);

//$container = get_theme_mod( 'understrap_container_type' );
?>



<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1" >

		<h4 class="<?php echo $nomClasseEnjeu." titreEnjeu" ?>">
    	<?php echo($enjeuOuForme); ?>
		</h4>
		
		<div class="container containerProjet">
 			 <div class="row">
   				 <div class="col-sm-8 leftText">
     				 <div id="enjeuArticleSingle" class="<?php echo $nomClasseEnjeu." titreEnjeu" ?>"> 	<?php echo get_the_title($id); ?>
     				 </div> <!-- #enjeuArticleSingle -->
     				<?php echo(get_the_content($id)); ?>
      				<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
   				 </div>  
   				  <div class="col-sm-1"></div>
   				 <div class="col-sm-3">
     				 Liste éventuelles autres créations
   				 </div>     			
   			</div>
		</div>
		
       

			<?php
			// Do the right sidebar check and close div#primary.
			get_template_part( 'global-templates/right-sidebar-check' );
			?>


	</div><!-- #content -->

</div><!-- #single-wrapper -->
<?php
//get_footer('single');
