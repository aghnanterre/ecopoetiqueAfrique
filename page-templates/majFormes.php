<?php
/**
 * Template Name: majFormes Template
 *
 * Template pour mettre à jour les termes des formes recensées associées à un enjeu écopoétique
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>


<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>


<body >





	<?php
	get_header('');?>
	<a href="https://ecopoetique.huma-num.fr/">
	<img class=" img-fluid"  src="https://ecopoetique.huma-num.fr/wp-content/uploads/2023/08/LOGO_ECOPOETIQUE_STAR-e1693303056864.png" ">
	</a>

	<?php 
	
		//$term_obj_list = get_the_terms( get_the_ID(), 'forme_creation' );
		//puis pour chacun des termes de $term_obj_list
		
	echo(get_the_ID()." ; ".get_the_title()."<br>");
	
	
	$args = array(
	    'post_type'=> 'post',
	    'orderby'    => 'ID',
	    'post_status' => 'publish',
	    'order'    => 'DESC',
	    'posts_per_page' => -1 // this will retrive all the post that is published
	);
	$result = new WP_Query( $args );
	if ( $result-> have_posts() ) : 

	     
         while ( $result->have_posts() ) : $result->the_post(); 
         $id=get_the_ID();
         $idEnjeuSitué=get_post_meta($id,"num_enjeu_situé",true);
         $titreEnjeuSitué=get_the_title($idEnjeuSitué);
         echo("id : ".$id." ; ".get_the_title()."<br>");
         echo("numEnjeu_situé : ".$idEnjeuSitué." ; ".$titreEnjeuSitué."<br>");
         $term_obj_list = get_the_terms( $id, 'forme_creation' )[0]->slug;
        
         echo(var_dump($term_obj_list));
         // initialisation de la taxonomie forme_recensee
         if (is_null ($term_obj_list)){
             echo("<br> C'est null");
         }
         else{
            // pour que soit mis à jour la liste des termes de la taxonomie "forme_recensee",
            // à partir des formes effectivement affectées aux articles
            //wp_insert_term( $term_obj_list,"forme_recensee"); // à décommenter pour MAJ des valeurs de forme_recensee
            //echo("la chaine ".$term_obj_list." a été ajoutée à la taxonomie "."forme_recensée<br>");
            
            // attribution effective du terme de la forme de création à forme_recensée de sa description d'enjeu
             echo("Ici il faut ajouter le terme ".$term_obj_list." à la taxonomie forme_recensee de l'id n° ".$idEnjeuSitué."(".$titreEnjeuSitué.")"."<br>");
            //wp_set_object_terms($idEnjeuSitué,$term_obj_list,'forme_recensee',true);
            
         }
         
         echo("<br><br>");
         endwhile; 
    endif; wp_reset_postdata(); 
		
	?>
	<p style="  font-color=white">
	</p>
	
	<?php 
	wp_footer();
	?>
</body>
</html>
