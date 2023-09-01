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

/*
 ************************************************************
 FONCTIONS UTILES POUR DETERMINER LES COULEURS DES BANNIERES
*/

//la fonction slugenjeu renvoie un seul slugenjeu associé à l'article $id,
// (le nom du dernier slug d'enjeu trouvé, si plusieurs lui sont associés)
//utilisée par single.php pour déterminer l'enjeu de l'article courant.


function slugenjeu($id){
    $x=get_the_terms( $id, 'enjeu_environnemental');
    unset($r);
    $r="indefini";
    
    foreach ($x as $obj){
        $r= ($obj->slug);
        
    }
    return($r);
}

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

    

/* ***************************************************************************************
 * PROGRAMME PRINCIPAL
 /* ***************************************************************************************/

$GLOBALS['understrap-child-main'] = array();
$GLOBALS['understrap-child-main']['enjeu']='enjeu-indefini';
