 *ancien fichier
<?php
/**
 * 
 * *ancien fichier.
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ecopoetique2
 */
?>

<?php
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


?>


<?php
if ($GLOBALS["tableauLiensInitialisé"] == false) {
    console_maison("Initialisation faite pour la visualisation de l'article " . $id . ". "); ?>

                                                        <!-- 1. Initialisation liens enjeux situés  -->
    
                                                        <!--  1.1 execution de la requête : articles description -->
                                                        <?php
                                                        $args = array(
                                                            'post_status' => 'publish',
                                                            'orderby' => 'name',
                                                            'order' => 'ASC',
                                                            'tax_query' => array(
                                                                array(
                                                                    'taxonomy' => 'type_article',
                                                                    'field' => 'slug',
                                                                    'terms' => array('description')
                                                                )
                                                            )
                                                        );

                                                        $query = new WP_Query($args); ?>
            
        
                                                            <!--  1.2 énumération des enjeux situés et initialistion de la liste des créations pour chacun -->		
                                                        <?php
                                                        // The Loop
                                                        $resu = "";
                                                        while ($query->have_posts()) {
                                                            $query->the_post();
                                                            $id = get_the_ID();
                                                            $resu = "<li>";
                                                            $resu = $resu . "<span class=\"" . classeCSS($lenjeu) . "\">";
                                                            $resu = $resu . "O</span><a href=\"https://ecopoetique.huma-num.fr/wp-admin/post.php?post=" . $id . "&action=edit";
                                                            $resu = $resu . "\"> (" . $id . ") " . get_the_title($id);
                                                            $resu = $resu . "</a></li><br>";

                                                            // initialisation du nb de créations([0]) des id pour cet enjeu
                                                            $GLOBALS['ecopoetique2'][$id] = array();
                                                            $GLOBALS['ecopoetique2'][$id][0] = 0;
                                                        }
                                                        wp_reset_postdata();
                                                        ?>  
                                                          <!-- enumération des articles publiés  -->
                                                            <?php
                                                            // the query
                                                            $wpb_all_query = new WP_Query(
                                                                array(
                                                                    'post_type' => 'post',
                                                                    'post_status' => 'publish',
                                                                    'posts_per_page' => -1
                                                                )
                                                            );
                                                            ?>
                                                            <!-- the loop -->
                                                             <?php
                                                             while ($wpb_all_query->have_posts()):
                                                                 $wpb_all_query->the_post();
                                                                 $id = get_the_ID();
                                                                 $idEnjeuSitué = get_post_meta($id, 'num_enjeu_situé', true);
                                                                 $titreEnjeuSitué = get_the_title($idEnjeuSitué);
                                                                 $lePermalien = get_permalink($idEnjeuSitué);
                                                                 $type = get_the_terms($id, "type_article");
                                                                 if (!($type)) {
                                                                     $type = array("non renseigné");
                                                                 }
                                                                 foreach ($type as $obj) {
                                                                     $r = ($obj->slug);
                                                                     // si $obj->est pas renseigné
                                                                     if (isset($r)) {
                                                                         ;
                                                                     } else {
                                                                         $r = "non renseigné";
                                                                     }
                                                                 }

                                                                 ?>
                                                                                                                    <?php
                                                                                                                    if ($id != $idEnjeuSitué) {
                                                                                                                        // si le $id correspondant à l'enjeu est déjà initialisé, on incrémente la case 0 et on ajoute l'$id de la création dans la dernière case.
                                                                                                                        if (isset($GLOBALS['ecopoetique2'][$idEnjeuSitué][0])) {
                                                                                                                            $GLOBALS['ecopoetique2'][$idEnjeuSitué][0] = $GLOBALS['ecopoetique2'][$idEnjeuSitué][0] + 1;
                                                                                                                            $GLOBALS['ecopoetique2'][$idEnjeuSitué][$GLOBALS['ecopoetique2'][$idEnjeuSitué][0]] = $id;
                                                                                                                        }
                                                                                                                        //sinon 
                                                                                                                        else {
                                                                                                                            $GLOBALS['ecopoetique2'][$idEnjeuSitué][0] = 1;
                                                                                                                            $GLOBALS['ecopoetique2'][$idEnjeuSitué][1] = $id;
                                                                                                                        }

                                                                                                                    } ?>
                                                        <?php
                                                             endwhile;
                                                             ?>
                                                             </table>
        
                                                            <br>
                                                                        <!-- end of the loop -->
    
                                                        <!--  Fin de l'initialisation liens enjeux situés  -->
    
                                                        <?php
                                                        $GLOBALS["tableauLiensInitialisé"] = true;
                                                        console_maison("les liens ont été réinitialisés (page single.php) !");

} else {
    console_maison("pas besoin de réinitialiser cette fois !");
}
;

?>
<div class="main">

<section>
    <div class="rowProjet">
        <div class="leftText">
            <h4 class="<?php echo $GLOBALS['ecopoetique2']['enjeu'] . "_texte" ?>">
                <?php echo $titreArticle; ?>
            </h4>
            <div class="dotArticleTitle">                
                <?php
                while (have_posts()):
                    the_post();
                    get_template_part('template-parts/content', get_post_type());
                endwhile; // End of the loop.
                ?> 
            
            </div>
<div class="textAndLink">
    <p></p>
</div>
                
        </div>
        <div class="rightSidebar">
            <div class="single-Pays">
            <h4>Afrique> <strong><?php echo nomPays($id) ?></strong></h4>
            </div>
                <?php get_sidebar('f3'); ?>
            <!-- <div class="greyDiv">
                <h4>Formes littéraires et artistiques
                    mobilisées</h4>
                    <div class="divOeuvre">
                        <img class="iconOeuvre" src="https://res.cloudinary.com/cloud-renaud/image/upload/v1656689981/ecopoetique/icones_layer_cartes_art_perf_shztkl.png" alt="icon">
                        <div class="infoOeuvre">
                            <p class="typeOeuvre">Chanson</p>
                            <p class="nomOeuvre">Daara J Family(rap)</p>
                            <p class="nomArtiste">Sabadola</p>
    
                        </div>
                    </div>
            </div> -->
        </div>
    </div>
   
</section>

    </div>


<?php
get_footer('ecopoetique2'); ?>
