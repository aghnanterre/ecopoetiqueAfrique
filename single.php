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

/* Si l'article courant est un enjeu situé ($idEnjeuSitué==$id),
 * alors on le met en première ligne. Sinon, on écrit la forme de la création.
 */
if ($idEnjeuSitué == $id) {
    $titreArticle = etiquette(slugenjeu($id));
} else {
    $titreArticle = texte_forme(slugforme_creation($id));
}


//$container = get_theme_mod( 'understrap_container_type' );
?>



<div class="wrapper" id="single-wrapper">




<!--  Ici commence -->

		<div class="row">

            		<h4 class="<?php echo $GLOBALS['ecopoetique2']['enjeu'] . "_texte" ?>">
                	<?php echo($titreArticle); ?>
            		</h4>
			<?php
			// Do the left sidebar check and open div#primary.
			//get_template_part( 'global-templates/left-sidebar-check' );
			?>

			<main class="site-main" id="main">

				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'loop-templates/content', 'single' );
					//understrap_post_nav();

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				}
				?>

			</main>
			<?php
			// Do the right sidebar check and close div#primary.
			get_template_part( 'global-templates/right-sidebar-check' );
			?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->
<?php
//get_footer('single');
