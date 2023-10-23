<?php
/**
 * Understrap Child main Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;



/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function understrap_remove_scripts() {
	wp_dequeue_style( 'understrap-styles' );
	wp_deregister_style( 'understrap-styles' );

	wp_dequeue_script( 'understrap-scripts' );
	wp_deregister_script( 'understrap-scripts' );
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );



/**
 * Enqueue our stylesheet and javascript file
 */

function theme_enqueue_styles() {

	// Get the theme data.
	$the_theme     = wp_get_theme();
	$theme_version = $the_theme->get( 'Version' );

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	// Grab asset urls.
	$theme_styles  = "/css/child-theme{$suffix}.css";
	$theme_scripts = "/js/child-theme{$suffix}.js";
	
	$css_version = $theme_version . '.' . filemtime( get_stylesheet_directory() . $theme_styles );

	wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $css_version );
	wp_enqueue_script( 'jquery' );
	
	$js_version = $theme_version . '.' . filemtime( get_stylesheet_directory() . $theme_scripts );
	
	wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $js_version, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );



/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain() {
	load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );



/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @return string
 */
function understrap_default_bootstrap_version() {
	return 'bootstrap5';
}
add_filter( 'theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20 );



/**
 * Loads javascript for showing customizer warning dialog.
 */
function understrap_child_customize_controls_js() {
	wp_enqueue_script(
		'understrap_child_customizer',
		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
		array( 'customize-preview' ),
		'20130508',
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js' );

/**
 * Ecopoetique
 */


/* fonction pour écrire sur la console javascript (débogage) */
function console_maison($var){
    
    $var = json_encode($var,JSON_UNESCAPED_UNICODE);
    
    $output = <<<EOT
    <script>
        console.log($var);
    </script>
EOT;
    
    echo $output;
    
}



// Taxonomie enjeu environnemental
function taxonomies_ecopoetique_setup_enjeu_environnemental() {
    $labels = array(
        'name' => 'enjeu environnemental',
        'all_items' => 'Tous les enjeux environnementaux',  // affiché dans le sous menu
        'singular_name' => 'enjeu environnemental',
        'parent_item' => 'enjeu parent',
        'parent_item_colon' => 'enjeu parent:',
        'search_items' => 'Chercher un enjeu environnemental',
        'add_new_item' => 'Ajouter un enjeu environnemental',
        'view_item' => 'Voir l\'enjeu environnemental',
        'edit_item' => 'Modifier un enjeu environnemental',
        'menu_name' => 'enjeu environnemental',
        'new_item_name' => 'nouvel enjeu environnemental',
        'update_item' => 'Mise à jour de l\'enjeu environnemental'
        
        
        
    );
    
    $args = array(
        'labels' => $labels,
        'description' => 'principaux enjeux environnementaux de l\'anthologie',
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' =>true,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite'           => [ 'slug' => 'enjeu_environnemental' ],
    );
    
    register_taxonomy( 'enjeu_environnemental', [ 'post' ], $args );
}

add_action( 'init', 'taxonomies_ecopoetique_setup_enjeu_environnemental' );

// Taxonomie forme de création
function taxonomies_ecopoetique_setup_forme_creation() {
    $labels = array(
        'name' => 'forme de creation',
        'all_items' => 'Toutes les formes de création',  // affiché dans le sous menu
        'singular_name' => 'forme de création',
        'parent_item' => 'forme de création parente',
        'parent_item_colon' => 'forme parente:',
        'search_items' => 'Chercher une forme de création',
        'add_new_item' => 'ajouter une forme de création',
        'view_item' => 'Voir la forme de création',
        'edit_item' => 'Modifier une forme de création',
        'menu_name' => 'Forme de création'
        
        
    );
    
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_admin_column' => true,
        'show_ui' => true,
        'show_in_menu' =>true,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'query_var' => true,
        'rewrite'           => [ 'slug' => 'forme_creation' ],
    );
    
    register_taxonomy( 'forme_creation', [ 'post' ], $args );
}
add_action( 'init', 'taxonomies_ecopoetique_setup_forme_creation' );


// Taxonomie pays
function taxonomies_ecopoetique_setup_pays() {
    $labels = array(
        'name' => 'pays',
        'all_items' => 'Tous les pays',  // affiché dans le sous menu
        'singular_name' => 'pays',
        'search_items' => 'Chercher un pays',
        'add_new_item' => 'ajouter un pays',
        'edit_item' => 'Modifier une pays',
        'menu_name' => 'Pays',
        'parent_item' => 'pays parent',
        'parent_item_colon' => 'pays:',
    );
    
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_in_menu' =>true,
        'show_admin_column' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'query_var' => true,
        'rewrite'           => [ 'slug' => 'pays' ],
    );
    
    register_taxonomy( 'pays', [ 'post' ], $args );
}
add_action( 'init', 'taxonomies_ecopoetique_setup_pays' );


// Taxonomie TypeArticle
function taxonomies_ecopoetique_setup_type_article() {
    $labels = array(
        'name' => 'type_article',
        'all_items' => 'Tous les types d\'article',  // affiché dans le sous menu
        'singular_name' => 'type d\'article (création ou description d\'enjeu écopoétique)',
        'search_items' => 'Chercher un enjeu environnemental',
        'add_new_item' => 'Ajouter un type d\'article',
        'view_item' => 'Voir le type d\'article',
        'edit_item' => 'Modifier un type d\'article',
        'menu_name' => 'type d\'article',
        'new_item_name' => 'nouveau type d\'article',
        'update_item' => 'Mise à jour du type d\'article'
        
        
        
    );
    
    $args = array(
        'labels' => $labels,
        'description' => 'types d\'article de l\'anthologie : création ou description de l\'enjeu',
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' =>true,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite'           => [ 'slug' => 'type_article' ],
    );
    
    register_taxonomy( 'type_article', [ 'post' ], $args );
}
add_action( 'init', 'taxonomies_ecopoetique_setup_type_article' );




// ACF 1 : ajout d'un champ dans l'écran d'édition de la taxonomie

add_action( 'forme_creation_add_form_fields', 'ecopoetique_add_term_fields' );

function ecopoetique_add_term_fields( $taxonomy ) {
    
    echo '<div class="form-field">
	<label for="fichier_icone">Fichier icône</label>
	<input type="text" name="fichier_icone" id="fichier_icone" />
	<p>url du fichier image de l\'icône pour cette forme de création </p>
	</div>';
    
}

// ACF 2 : même chose dans l'écran d'édition de la taxonomie
//          (il faut remplir le champ avec la valeur existante)

add_action( 'forme_creation_edit_form_fields', 'ecopoetique_edit_term_fields', 10, 2 );

function ecopoetique_edit_term_fields( $term, $taxonomy ) {
    
    $value = get_term_meta( $term->term_id, 'fichier_icone', true );
    
    echo '<tr class="form-field">
	<th>
		<label for="fichier_icone">Fichier icône</label>
	</th>
	<td>
		<input name="fichier_icone" id="
fichier_icone" type="text" value="' . esc_attr( $value ) .'" />
		<p class="description">url du fichier image de l\'icône pour cette forme de création</p>
	</td>
	</tr>';
}

// ACF 3 : enregistrement du champ
add_action( 'created_forme_creation', 'ecopoetique_save_term_fields' );
add_action( 'edited_forme_creation', 'ecopoetique_save_term_fields' );

function ecopoetique_save_term_fields( $term_id ) {
    
    update_term_meta(
        $term_id,
        'fichier_icone',
        sanitize_text_field( $_POST[ 'fichier_icone' ] )
        );
    
}



/*
 ************************************************************
 FONCTIONS UTILES POUR DETERMINER LES COULEURS DES BANNIERES
*/

//la fonction slugenjeu renvoie un seul slugenjeu associé à l'article $id,
// (le nom du dernier slug d'enjeu trouvé, si plusieurs lui sont associés)
//utilisée par single.php pour déterminer l'enjeu de l'article courant.



/*
 ************************************************************
 FONCTIONS UTILES POUR FORMULER LES ENJEUX
 */

function  etiquette($lenjeu) {
    $correspondance=Array(
        "eau" => "gestion de l’eau",
        "conservation" => "conservation de la biodiversité",
        "minerais_combustibles_industrie" => "extraction de minerais, combustibles fossiles et projets industriels",
        "infrastructure" => "infrastructure et environnement bâti (aéroports, ports, décharges, sites touristiques…)",
        "nucleaire" => "nucléaire (extraction d’uranium et essais nucléaires)",
        "terre_biomasse" => "terre et biomasse (agriculture, zones de pêche, gestion du bétail)"
    );
    
 
    $c=$correspondance[$lenjeu];
    return $c;

}



/****************************************************
FONTIONS FORME,PAYS,ENJEU,TYPE
*/

//la fonction renvoie le nom de l'enjeu auquel correspond l'article
// (le nom du dernier enjeu trouvé, si plusieurs lui sont associés) */
function slugenjeu($id){
    $x=get_the_terms( $id, 'enjeu_environnemental');
    unset($r);
    $r="indefini";
    
    if (is_array($x)==true){
        foreach ($x as $obj){
            $r= ($obj->slug);    
            }
    }
            return($r);
}

//la fonction renvoie le nom de l'enjeu associé à l'article
// (le nom du dernier enjeu trouvé, si plusieurs lui sont associés)
function nomEnjeu($id){
    $x=get_the_terms( $id, 'enjeu_environnemental');
    unset($r);
    $r="indefini";
    foreach ($x as $obj){
        $r= ($obj->name);
    }
    return($r);
}

//la fonction renvoie le nom du pays associé à l'article
// (le nom du dernier pays trouvé, si plusieurs lui sont associés)
function nomPays($id){
    $x=get_the_terms( $id, 'pays');
    unset($r);
    $r="pays indefini";
    foreach ($x as $obj){
        $r= ($obj->name);
    }
    return($r);
}


//la fonction renvoie le nom de la forme associée à l'article
// (le nom de la derniere forme trouvée, si plusieurs lui sont associées)
function nomForme($id){
    $x=get_the_terms( $id, 'forme_creation');
    unset($r);
    $r="forme indefinie";
    foreach ($x as $obj){
        $r= ($obj->name);
    }
    return($r);
}

// la fonction renvoie un seul slug forme_creation associée à l'article $id
function slugforme_creation($id){
    $x=get_the_terms( $id, 'forme_creation');
    unset($r);
    $r="indefini";
    foreach ($x as $obj){
        $r= ($obj->slug);
    }
    return($r);
}

//la fonction renvoie le nom du type d'article
// (création ou enjeu)
function nomType($id){
    $x=get_the_terms( $id, 'type_article');
    unset($r);
    $r="type d'article indefini";
    foreach ($x as $obj){
        $r= ($obj->name);
    }
    return($r);
}

// la fonction renvoie un seul type d'article associé à l'article $id
function slugtype($id){
    $x=get_the_terms( $id, 'type_article');
    unset($r);
    $r="indefini";
    foreach ($x as $obj){
        $r= ($obj->slug);
    }
    return($r);
    
}

/******************************************
 * Fonction qui renvoie le nombre de créations pour un enjeuSitué
 */



/****************************************
 * FONCTIONS POUR LES PUCES
 */

function texte_forme($slugforme) {
    // renvoie le texte à mettre en haut à gauche des créations
    // en fonction du slug rencoyé par slugforme
    switch ($slugforme) {
        case "conservation":
            $resu="conservation de la biodiversité";
            break;
        case "minerais_combustibles_industrie":
            $resu="extraction de minerais, combustibles fossiles et projets industriels";
            break;
        case "infrastructure":
            $resu="	infrastructure et environnement bâti";
            break;
        case "eau":
            $resu="eau";
            break;
        case "terre_biomasse":
            $resu="terre et biomasse";
            break;
        case "nucleaire":
            $resu="nucléaire";
            break;
        case "art_visuel":
            $resu="art visuel";
            break;
        case "bd":
            $resu="bande dessinée";
            break;
        case "films":
            $resu="film";
            break;
        case "peintures":
            $resu="peinture";
            break;
        case "photographies":
            $resu="photographie";
            break;
        case "sculpture":
            $resu="sculpture";
            break;
        case "ecrit":
            $resu="écrit";
            break;
        case "essais_et_articles":
            $resu="essais et articles";
            break;
        case "graffitis":
            $resu="graffitis";
            break;
        case "pancartes":
            $resu="pancartes";
            break;
        case "poemes":
            $resu="poème";
            break;
        case "romans":
            $resu="roman";
            break;
        case "tracts":
            $resu="tract";
            break;
        case "performance":
            $resu="performance";
            break;
        case "performance_chants":
            $resu="chant";
            break;
        case "performance_danse":
            $resu="danse";
            break;
        case "performance_poesie_orale":
            $resu="poésie orale";
            break;
        case "performance_theatre":
            $resu="théâtre";
            break;
    }
    return ($resu);
}


function puce($art) {
    // renvoie l'adresse de l'image de puce adéquate, selon la taxonomie de l'article
    //  - si $art est un enjeu, un point coloré
    //  - si $art est une création, l'icône associée à la forme
    $type=slugtype($art);
    $artEnjeuSitué=get_post_meta($art,'num_enjeu_situé',true);
    // urls des icones
    $urlArtsVisuels="https://ecopoetique.huma-num.fr/wp-content/uploads/2023/09/arts_visuels_contour_BL.png";
    $urlTexte="https://ecopoetique.huma-num.fr/wp-content/uploads/2023/09/icones_layer_cartes_texte_ecrit.png";
    $urlPerformance="https://ecopoetique.huma-num.fr/wp-content/uploads/2023/09/arts_perf_contour_BL.png";
    
    if ($art!=$artEnjeuSitué)/* si $art est une création */ {
        $type= get_the_terms($art,"forme_creation");
    }
    else {
        $type= get_the_terms($art,"enjeu_environnemental");
    }
    
    $r=$type[0]->slug;
  
    switch ($r) {
        case "conservation":
            $resu="https://ecopoetique.huma-num.fr/wp-content/uploads/2023/06/enj_conservation_bio.png";
            break;
        case "minerais_combustibles_industrie":
            $resu="https://ecopoetique.huma-num.fr/wp-content/uploads/2023/06/minerais_fossiles_indus-e1695728664967.png";
            break;
        case "infrastructure":
            $resu="https://ecopoetique.huma-num.fr/wp-content/uploads/2023/09/Bati.png";
            break;
        case "eau":
            $resu="https://ecopoetique.huma-num.fr/wp-content/uploads/2023/09/gestion_eau.png";
            break;
        case "terre_biomasse":
            $resu="https://ecopoetique.huma-num.fr/wp-content/uploads/2023/06/terre_biomasse.png";
            break;
        case "nucleaire":
            $resu="https://ecopoetique.huma-num.fr/wp-content/uploads/2023/06/nucleaire.png";
            break;
        case "art_visuel":
            $resu=$urlArtsVisuels;
            break;
        case "bd":
            $resu=$urlArtsVisuels;
            break;
        case "films":
            $resu=$urlArtsVisuels;
            break;
        case "peintures":
            $resu=$urlArtsVisuels;
            break;
        case "photographies":
            $resu=$urlArtsVisuels;
            break;
        case "sculpture":
            $resu=$urlArtsVisuels;
            break;
        case "ecrit":
            $resu=$urlTexte;
            break;
        case "essais_et_articles":
            $resu=$urlTexte;
            break;
        case "graffitis":
            $resu=$urlTexte;
            break;
        case "pancartes":
            $resu=$urlTexte;
            break;
        case "poemes":
            $resu=$urlTexte;
            break;
        case "romans":
            $resu=$urlTexte;
            break;
        case "tracts":
            $resu=$urlTexte;
            break;
        case "performance":
            $resu=$urlPerformance;
            break;
        case "performance_chants":
            $resu=$urlPerformance;
            break;
        case "performance_danse":
            $resu=$urlPerformance;
            break;
        case "performance_poesie_orale":
            $resu=$urlPerformance;
            break;
        case "performance_theatre":
            $resu=$urlPerformance;
            break;
    }
    
    return($resu);
    
}

/* function creations_pour_lenjeu($monId)
 * renvoie un tableau qui contient les objets posts dont le custom field
 * nom_enjeu_situé est $monId
 */
function creations_pour_lenjeu($monId){
    
    // sélection des posts pour lesquels num_enjeu_situé = $monId
    //console_maison("creations_pour_lenjeu:début exécution pour monId = ".$monId);
    $idEnjeuSitué=get_post_meta($monId,'num_enjeu_situé',true);
    
    $args = array(
        'post_status' => 'publish',
        'numberposts' => -1,
        //'num_enjeu_situé' => $monId, //ceinture et bretelles ?
        'orderby'           => 'name', //il faudra classer par forme
        'order'             => 'ASC',
        'meta_query' => array(
            array(
                'key'   => 'num_enjeu_situé',
                'value' => $monId,
            )
        )
    );
    
    $mesposts = get_posts($args);
    
    //console_maison("creations_pour_lenjeu:fin exécution pour monId = ".$monId);
    return($mesposts);//ça retourne la liste des créations (tableau d'objets post)
}




/* Gestion des excerpts affichés dans les popovers
* (i.e. ce qui s'ouvre quand on pointe sur les repères)
*/
    
    
/*
 * si le filtre est appliqué à get_the_excerpt, et non pas à the_excerpt,
 * alors le contenu de la popover est bien donné par la fonction
 * contenuPopover(). En revanche, si le filtre est appliqué à the_excerpt,
 * alors le contenu de la popover est l'excerpt fourni par défaut, et on peut
    * régler sa taille avec le filtre wpdocs_custom_excerpt_length ci-dessous.
    */





function texteHtmlPopover(){
    $id=get_the_ID();
    $idEnjeuSitué=get_post_meta($id,'num_enjeu_situé',true);
    $titreEnjeuSitué=get_the_title($idEnjeuSitué);
    $lienEnjeuSitué=get_permalink($idEnjeuSitué);
    $titre=get_the_title($id);
    $texteHtml='';
    $nomEnjeu= nomEnjeu($id);
    
    
    
    
    // si le repère correspond à une création
    // c'est une erreur. Sinon, c'est un enjeu situé
    // et on afficbhe la liste des créations.
    if ($id!=$idEnjeuSitué){
        $texteHtml=$texteHtml."création :<br>";
        $source=puce($id);
        $texteHtml=$texteHtml."<img class=\"iconeVoir\" alt=\"\" src=\"".$source."\">";
        $texteHtml=$texteHtml."(C)".get_the_title($id)."<br>";
        
    }
    //si c'est un enjeu (ce qui est attendu)
    else {
        // nom de l'enjeu
        $source=puce($id);
        $texteHtml=$texteHtml."<img class=\"iconeVoir\" alt=\"\" src=\"".$source."\">";
        $texteHtml=$texteHtml.get_the_title($id)."<br><br>";
        
        $temp=creations_pour_lenjeu($id);
        //on liste les créations pour cet enjeu
        for($i = 0; $i < count($temp); ++$i) {
            $idCreation= $temp[$i]->ID;
            $source=puce($idCreation);
            
            if ($idCreation!=$id) {
                $lien=get_permalink($idCreation);
                $texteHtml=$texteHtml."<a href=\"".$lien."\">"."<img class=\"iconeVoir\" alt=\"\" src=\"".$source."\">";
                $leTitre=get_the_title($idCreation);
                $texteHtml=$texteHtml.$leTitre."</a><br>";
                
            }
        }
        
        
    }
    return($texteHtml);
}

add_filter( 'get_the_excerpt', 'texteHtmlPopover' );

function majShortcode($s="aucasoù"){
    if (isset($s)){
        echo(""."$s");
        }
    }

// appel de fonction
// sans argument : c'est l'argument par défaut qui est affecté
// chaîne vide :
 majShortcode("");


/* ***************************************************************************************
 * PROGRAMME PRINCIPAL
 /* ***************************************************************************************/


$GLOBALS['understrap-child-main'] = array();
$GLOBALS['understrap-child-main']['enjeu']='enjeu-indefini';

$GLOBALS['understrap-child-main']['shortcodeParDefaut']='[travelers-map minzoom=3 width=100% height=80vh post_types=post custom_tax=\"type_article=description\" disable_clustering=true post_types=post page tileurl=\"https://{s}.tile.jawg.io/jawg-dark/{z}/{x}/{y}{r}.png?access-token=EDiK4LQEjFpT2p7S06fbibeGK6KTsbSPR7hYkaMQYj9VfeswuOoxJOFXlL9NkI6E\" subdomains=\"abc\" attribution=\'<a title=\"Tiles Courtesy of Jawg Maps" href=\"http://jawg.io\" target=\"_blank\" rel=\"noopener\">© <b>Jawg</b>Maps</a> © <a href=\"https://www.openstreetmap.org/copyright\">OpenStreetMap</a> contributors \"]';
