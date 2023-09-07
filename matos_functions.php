<?php
/**
 * ecopoetique2 functions and definitions
 *ancien fichier.
 *ancien fichier.
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ecopoetique2
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ecopoetique2_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on ecopoetique2, use a find and replace
		* to change 'ecopoetique2' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'ecopoetique2', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	//cette partie est d&ésactivée - il faut qu'elle corresponde à une à une sidebar existante.
/*	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'ecopoetique2' ),
		)
	);
	*/

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'ecopoetique2_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'ecopoetique2_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ecopoetique2_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ecopoetique2_content_width', 640 );
}
add_action( 'after_setup_theme', 'ecopoetique2_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ecopoetique2_widgets_init() {
/*
    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar-1', 'themeecopoetique' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here.', 'themeecopoetique' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
        );
        */
    /*
     register_sidebar( array(
        'name' => 'sidebar-2',
        'id' => 'sidebar-2',
        'description' => 'Appears in the footer area',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    register_sidebar( array(
        'name' => 'Footer Sidebar 2',
        'id' => 'footer-sidebar-2',
        'description' => 'Appears in the footer area',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    register_sidebar(array(
        'name' => 'F1',
        'id' => 'f1',
        'description' => 'sidebar f1',
        'before_widget' => '<div style="height: 280px"></div><li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => 'F2',
        'id' => 'f2',
        'description' => 'sidebar f2',
        'before_widget' => '<div style="height: 280px"></div><li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
    */
    register_sidebar(array(
        'name' => 'F3',
        'id' => 'f3',
        'description' => 'sidebar f3',
        'before_widget' => '<div style="height: 280px"></div><li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
 /*
  *    register_sidebar(array(
        'name' => 'F4',
        'id' => 'f4',
        'description' => 'sidebar f4',
        'before_widget' => '<div style="height: 280px"></div><li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => 'F5',
        'id' => 'f5',
        'description' => 'sidebar f5',
        'before_widget' => '<div style="height: 280px"></div><li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => 'F6',
        'id' => 'f6',
        'description' => 'sidebar f6',
        'before_widget' => '<div style="height: 280px"></div><li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => 'F7',
        'id' => 'f7',
        'description' => 'sidebar f7',
        'before_widget' => '<div style="height: 280px"></div><li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
    
    register_sidebar(array(
        'name' => 'Homepage Sidebar',
        'id' => 'homepage-sidebar',
        'description' => 'Appears as the sidebar on the custom homepage',
        'before_widget' => '<div style="height: 280px"></div><li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
    */
    
    register_sidebar( array(
        'name' => 'filtreEnjeux',
        'id' => 'filtre-enjeux',
        'description' => 'filtre des enjeux',
        'before_widget' => '<aside id="%1$s" class="filtre-enjeux"; style="text-align: left; }">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    
   
}

add_action( 'widgets_init', 'ecopoetique2_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function ecopoetique2_scripts() {
    //lignes copiées de la page https://itgiggs.in/create-wordpress-theme/#write-functions 
    // Mais ça ne marche pas : donc sur les templates, je fais appel 
    wp_enqueue_style( 'bootstrap-min', get_template_directory_uri().'/css/bootstrap.min.css' );
    wp_enqueue_script( 'jquery-local', get_template_directory_uri() . '/js/jquery.min.js', array(), '1.0.0', false );
    wp_enqueue_script( 'bootstrap-min', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'bootstrap-bundle', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array(), '1.0.0', true );
  
    
    wp_enqueue_style( 'ecopoetique2-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'ecopoetique2-style', 'rtl', 'replace' );

	wp_enqueue_script( 'ecopoetique2-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ecopoetique2_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/* thème ecopoetique2
 */


/*
 * création des Custom taxonomies
 */
/* Register the "enjeu environnemental" custom post type
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

/**
 * Register the "forme_creation" custom post type
 */

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


// ACF : Ajout d'un cusom field à la taxonomie forme_creation

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
		<input name="fichier_icone" id="fichier_icone" type="text" value="' . esc_attr( $value ) .'" />
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



//la fonction renvoie un seul slugenjeu associé à l'article $id,
// (le nom du dernier slug d'enjeu trouvé, si plusieurs lui sont associés)
function slugenjeu($id){
    $x=get_the_terms( $id, 'enjeu_environnemental');
    unset($r);
    $r="indefini";
 
    foreach ($x as $obj){
       $r= ($obj->slug);

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

// la fonction renvoie un seul nom forme_creation associée à l'article $id
function nameforme_creation($id){
    $x=get_the_terms( $id, 'forme_creation');
    unset($r);
    $r="indefini";
    foreach ($x as $obj){
        $r= ($obj->name);
    }
    return($r);
}


/* function technique pour indiquer 
 *l'enjeu à la fonction classeCSS */

 function lenjeu($slugcat){
 $lenjeu="pasDenjeu";
 if ($slugcat=='conservation_biodiversite'){
 $lenjeu= "conservation";
 };
 if ($slugcat=='minerais_combustibles_industrie'){
 $lenjeu= "minerais_combustibles_industrie";
 };
 if ($slugcat=='nucleaire'){
 $lenjeu= "nucleaire";
 };
 if ($slugcat=='infrastructure'){
 $lenjeu= "infrastructure";
 };
 if ($slugcat=='eau'){
 $lenjeu= "eau";
 };
 if ($slugcat=='terre_biomasse'){
 $lenjeu= "terre_biomasse";
 };
     
 return($lenjeu);
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
// la fonction classeCSS renvoie le nom de classe pertinent 
// qui correspond à l'enjeu (pour pareamétrer le CSS)
function classeCSS($cat){
    
    $classes = array(
        "conservation"=>"main-navigation-single-biodiversite",
        "infrastructure" => "main-navigation-single-infrastructure",
        "minerais_combustibles_industrie" => "main-navigation-single-minerais",
        "non_renseigné"=>"main-navigation-single-non-reneigne",
        "eau" => "main-navigation-single-eau",
        "nucleaire" => "main-navigation-single-nucleaire",
        "terre_biomasse" => "main-navigation-single-terre",
        );
    $ret = $classes[$cat];
    
     return $ret;   
    
  
}


/* fonction qui retourne des données récapitulatives sur un article 
 * Le lien qui suit le titre envoie à lapage de l'édition de l'article */
function var_dump_ret($mixed = null) {
    ob_start();
    var_dump($mixed);
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}


//la fonction puce attribue la puce adéquate :
//  - si $art est une création, 

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
    if ($art!=$artEnjeuSitué)/* si $art est une création */ {
            $type= get_the_terms($art,"forme_creation");
            }
    else {
           $type= get_the_terms($art,"enjeu_environnemental");
            }
            
   foreach ($type as $obj){
            $r= ($obj->slug);
   }
           switch ($r) {
            case "conservation":
                $resu="https://ecopoetique.huma-num.fr/wp-content/uploads/2021/05/enj_conservation_bio.png";
                break;
            case "minerais_combustibles_industrie":
                $resu="https://ecopoetique.huma-num.fr/wp-content/uploads/2022/06/minerais_fossiles_indus.png";
                break;
            case "infrastructure":
                $resu="https://ecopoetique.huma-num.fr/wp-content/uploads/2022/06/Bati.png";
                break;
            case "eau":
                $resu="https://ecopoetique.huma-num.fr/wp-content/uploads/2022/06/gestion_eau.png";
                break;
            case "terre_biomasse":
                $resu="https://ecopoetique.huma-num.fr/wp-content/uploads/2022/06/terre_biomasse.png";
                break;
            case "nucleaire":
                $resu="https://ecopoetique.huma-num.fr/wp-content/uploads/2022/06/nucleaire.png";
                break;
            case "art_visuel":
                $resu="https://ecopoetique.huma-num.fr/wp-content/uploads/2022/06/icones_layer_cartes_art_visuel.png";
                break;
            case "bd":
                $resu="https://ecopoetique.huma-num.fr/wp-content/uploads/2022/06/icones_layer_cartes_art_visuel.png";
                break;
            case "films":
                $resu="https://ecopoetique.huma-num.fr/wp-content/uploads/2022/06/icones_layer_cartes_art_visuel.png";
                break;
            case "peintures":
                $resu="https://ecopoetique.huma-num.fr/wp-content/uploads/2022/06/icones_layer_cartes_art_visuel.png";
                break;
            case "photographies":
                $resu="https://ecopoetique.huma-num.fr/wp-content/uploads/2022/06/icones_layer_cartes_art_visuel.png";
                break;
            case "sculpture":
                $resu="https://ecopoetique.huma-num.fr/wp-content/uploads/2022/06/icones_layer_cartes_art_visuel.png";
                break;
            case "ecrit":
                $resu="https://ecopoetique.huma-num.fr/wp-content/uploads/2022/06/icones_layer_cartes_texte_ecrit.png";
                break;
            case "essais_et_articles":
                $resu="https://ecopoetique.huma-num.fr/wp-content/uploads/2022/06/icones_layer_cartes_texte_ecrit.png";
                break;
            case "graffitis":
                $resu="https://ecopoetique.huma-num.fr/wp-content/uploads/2022/06/icones_layer_cartes_texte_ecrit.png";
                break;
            case "pancartes":
                $resu="https://ecopoetique.huma-num.fr/wp-content/uploads/2022/06/icones_layer_cartes_texte_ecrit.png";
                break;
            case "poemes":
                $resu="https://ecopoetique.huma-num.fr/wp-content/uploads/2022/06/icones_layer_cartes_texte_ecrit.png";
                break;
            case "romans":
                $resu="https://ecopoetique.huma-num.fr/wp-content/uploads/2022/06/icones_layer_cartes_texte_ecrit.png";
                break;
            case "tracts":
                $resu="https://ecopoetique.huma-num.fr/wp-content/uploads/2022/06/icones_layer_cartes_texte_ecrit.png";
                break;
            case "performance":
                $resu="https://ecopoetique.huma-num.fr/wp-content/uploads/2022/06/icones_layer_cartes_art_perf.png";
                break;
            case "performance_chants":
                $resu="https://ecopoetique.huma-num.fr/wp-content/uploads/2022/06/icones_layer_cartes_art_perf.png";
                break;
            case "performance_danse":
                $resu="https://ecopoetique.huma-num.fr/wp-content/uploads/2022/06/icones_layer_cartes_art_perf.png";
                break;
            case "performance_poesie_orale":
                $resu="https://ecopoetique.huma-num.fr/wp-content/uploads/2022/06/icones_layer_cartes_art_perf.png";
                break;
            case "performance_theatre":
                $resu="https://ecopoetique.huma-num.fr/wp-content/uploads/2022/06/icones_layer_cartes_art_perf.png";
                break;
        }
               return($resu);
}
/*
 $lenjeu= "nucleaire";
 };
 if ($slugcat=='infrastructure'){
 $lenjeu= "infrastructure";
 };
 if ($slugcat=='eau'){
 $lenjeu= "eau";
 };
 if ($slugcat=='terre_biomasse'){
 $lenjeu= "terre_biomasse";
 };
 */

/* la fonction etiquette() transforme 
*  un slugenjeu (court, en minuscules) en titre de 
*  fiche single présentant l'enjeu */

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


function recap($id) {
    $enjeu=slugenjeu($id);
        // based on original work from the PHP Laravel framework
    // (code récupéré pour que marche la fonction str_contains()
    if (!function_exists('str_contains')) {
        function str_contains($haystack, $needle) {
            return $needle !== '' && mb_strpos($haystack, $needle) !== false;
        }
    }
    $resu="<li>";
    $resu= $resu."<span class=\"".classeCSS(slugenjeu($id))."\">o o</span><br>" ;
    $resu= $resu."<a href=\"https://ecopoetique.huma-num.fr/wp-admin/post.php?post=".$id."&action=edit"; 
     $resu= $resu."\"> (".$id.") ".get_the_title($id);
     $resu= $resu."</a></li><br>"; 
     
    /* archivé
     //liste des catégories (ancienne classification)
     $listeCategories=get_the_category($id);
     $resu= $resu."(anciennes categories : ";
     $cc=1;
     foreach ($listeCategories as $cat) {
         $nom=$cat->name;
      
         $resu= $resu. $cc." - ".$nom."  ; ";
         // visuel ; crit ; performance
        /* if (str_contains($nom,"performance")) {
             $resu=$resu."** Ajouter forme de creation : ".$cat->slug." **";
             // à executer 1 fois : assigner forme
             //wp_set_object_terms($id,$cat->slug,forme_creation);
         } * /
        
         $cc= $cc+1;
     }
     $resu= $resu.")<br></span><br>";
     (/archivé) */
     
     //liste des taxonomies (pour réaffectation des catégories dans les custom taxonomies)
     $listeTaxonomies=array("enjeu_environnemental","pays","forme_creation","type_article");
     foreach ($listeTaxonomies as $tax) {
         $resu= $resu."&nbsp;"."&nbsp;".$tax."  : ";
         $type= get_the_terms($id,$tax); 
         if (!($type)){
             $type=array("non renseigné");
         }
         foreach ($type as $obj){
             $r= ($obj->slug);
             // si $obj->est pas renseigné
             if (isset($r)) {
                 ;
                }
                else{
                  $r="non renseigné";  
             }
             $resu= $resu.$r."&nbsp;";
             //réaffectation de taxonomies
            /* if ($r=="la catégorie à réaffecter") {
                 echo $r;
                 //wp_set_object_terms($id,"la nouvelle valeur de taxonomie",laTaxonomie);
                 
             }*/
         }
         $resu= $resu."<br>";
        }


        
        $resu=$resu."<br>"."description de l'enjeu écopoétique situé :"."<br>";
        $idpej=get_post_meta($id,'num_enjeu_situé',true);
        $resu= $resu."<a href=\"https://ecopoetique.huma-num.fr/wp-admin/post.php?post=".$idpej."&action=edit";
        $resu= $resu."\"> (".$idpej.") ".get_the_title($idpej);
        $resu= $resu."</a>";
        $resu=$resu."<br><br><br>";
        
        
      $resu= $resu."<br>";

      return($resu);
}

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

/*----------------------------------------------------------

/*
* Gestion des excerpts affichés dans les popovers
* (i.e. ce qui s'ouvre quand on pointe sur les repères)
*/


/*
 * si le filtre est appliqué à get_the_excerpt, et non pas à the_excerpt,
 * alors le contenu de la popover est bien donné par la fonction
 * contenuPopover(). En revanche, si le filtre est appliqué à get_the_excerpt,
 * alors le contenu de la popover est l'excerpt fourni par défaut, et on peut
 * régler sa taille avec le filtre wpdocs_custom_excerpt_length ci-dessous.
 */

// function liens() à supprimer ?
/*function liens(){
    $liens = new ArrayObject(array());
    //1. énumération des articles publiés qui sont des descriptions d'enjeu
    // (pour créer le tableau des créations associées, et l'intitialiser à 0)
    $args = array(
        'post_status' => 'publish',
        'orderby'           => 'name',
        'order'             => 'ASC',
  
    );
    
    $query = new WP_Query( $args );
    
    while ( $query->have_posts() ) {
        // The Loop
        $query->the_post();
        $id = get_the_ID();
        $idEnjeuSitué=get_post_meta($id,'num_enjeu_situé',true);
        
        if ($id==$idEnjeuSitué){
            echo ("On a l'enjeu".$id." ");
        }
        else{
            echo("création".$id." ");
        }
        echo("<br>");
       

    }
    console_maison("La fonction liens() a été exécutée");
    return liens;
}
*/


function texteHtmlPopover(){
    $id=get_the_ID();
    $idEnjeuSitué=get_post_meta($id,'num_enjeu_situé',true);
    $titreEnjeuSitué=get_the_title($idEnjeuSitué);
    $lienEnjeuSitué=get_permalink($idEnjeuSitué);
    $titre=get_the_title($id);
    $texteHtml='';
    
 

     
    // si le repère correspond à une création
    // c'est une erreur. Sinon, c'est un enjeu situé
    // et on afficbhe la liste des créations.
    if ($id!=$idEnjeuSitué){
                $texteHtml=$texteHtml."création :<br>";
                $source=puce($id,True);
                $texteHtml=$texteHtml."<img class=\"iconeVoir\" alt=\"\" src=\"".$source."\">";
                $texteHtml=$texteHtml.get_the_title($id)."<br>";
                
    }
    else {
        $source=puce($id,True);
        $texteHtml=$texteHtml."<img class=\"iconeVoir\" alt=\"\" src=\"".$source."\">";
        $texteHtml=$texteHtml.get_the_title($id)."<br>";

        $temp=creations_pour_lenjeu($id);
              
        for($i = 0; $i < count($temp); ++$i) {
            $idCreation= $temp[$i]->ID;
            $source=puce($idCreation,True);
            
            if ($idCreation!=$id) {
                $lien=get_permalink($idCreation);
                $texteHtml=$texteHtml."<img class=\"iconeVoir\" alt=\"\" src=\"".$source."\">";
                $leTitre=get_the_title($idCreation);
                $texteHtml=$texteHtml."<a href=\"".$lien."\">".$leTitre."</a><br>";
                
            }
        }
        
        
    }
    return($texteHtml);  
    }
    
    add_filter( 'get_the_excerpt', 'texteHtmlPopover' );
   
    /* function creations_pour_lenjeu($monId)
     * renvoie un tableau qui contient les objets posts dont le custom field
     * nom_enjeu_situé est $monId
     */
    function creations_pour_lenjeu($monId){
        
        // sélection des posts pour lesquels num_enjeu_situé = $monId
        console_maison("creations_pour_lenjeu:début exécution pour monId = ".$monId);
        $idEnjeuSitué=get_post_meta($id,'num_enjeu_situé',true);
        
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
        
            console_maison("creations_pour_lenjeu:fin exécution pour monId = ".$monId);
            return($mesposts);//ça retourne la liste des créations (tableau d'objets post)
    }
    

/*
 * s'avère inutile si filtre est mis sur get_the_excerpt (ci-dessus)
 * soit mis sur get_the_excerpt, et non sur the_excerpt)
 * Filter the except length to 0 word.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 0;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

/* ***************************************************************************************
 * PROGRAMME PRINCIPAL
/* ***************************************************************************************/

$GLOBALS['ecopoetique2'] = array();
$GLOBALS['ecopoetique2']['enjeu']='enjeu-indefini';




