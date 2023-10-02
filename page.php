<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">
				
				
				
<?php  $taxonomy = 'pays';?>
<?php $nomFiltre='Afrique';?>

<?php $taxonomy= 'forme_creation';?>
<?php $nomFiltre='Forme';?>

<?php $taxonomy= 'enjeu_environnemental';?>
<?php $nomFiltre='Enjeu';?>



<?php $terms = get_terms($taxonomy);
console_maison($terms)?>

<!-- cases à cocher ('#filtre') -->
<span id="filtre" class="<?php echo("filtre-".$taxonomy)?>">
    <option value="<?php echo($nomFiltre)?>"><?php echo($nomFiltre)?></option> <!-- Titre du filtre -->
    <?php foreach ($terms as $term) : ?>
     <div>
    	<label for="<?php echo $term->slug; ?>"> <input type="checkbox" name="valeur" value="<?php echo $term->slug; ?>" id="<?php echo $term->slug; ?>" onclick="myFunction()"><?php echo $term->name;  ?></label>
  	</div>
    <?php endforeach; ?>	
</span>
				
<p> Valeurs de <?php echo($taxonomy)?></p>
    </p>
 <script>
 
 
 
        const btn = document.querySelector('#filtre');
        btn.addEventListener('click', (event) => {
            let checkboxes = document.querySelectorAll('input[name="valeur"]:checked');
            let values = [];
            checkboxes.forEach((checkbox) => {
                values.push(checkbox.value);
            });
            alert(values);
        });    
         
 </script>

 <?php
 
 
 $texte_query="";
 $texte_query=$texte_query."\$query = new WP_Query( array(". PHP_EOL; # query générale (avec des "OR")
        $texte_query=$texte_query."'post_type' => 'post',". PHP_EOL;
        $texte_query=$texte_query."'tax_query' => array(". PHP_EOL;
        $texte_query=$texte_query."'relation' => 'OR',". PHP_EOL;
            $texte_query=$texte_query."array (". PHP_EOL;       # taxonomie 1 
                $texte_query=$texte_query." 'taxonomy' => 'enjeu_environnemental',". PHP_EOL;
                $texte_query=$texte_query."'post_status'            => array('publish'),". PHP_EOL;
                $texte_query=$texte_query."'field' => 'slug',". PHP_EOL;
                $texte_query=$texte_query."'terms' => array('nucleaire')". PHP_EOL;     #ici la liste des termes taxonomie 1
            $texte_query=$texte_query."),". PHP_EOL;
            $texte_query=$texte_query."array (". PHP_EOL;   # taxonomie 2
                $texte_query=$texte_query."'taxonomy' => 'pays',". PHP_EOL;
                $texte_query=$texte_query."'post_status'            => array('publish'),". PHP_EOL;
                $texte_query=$texte_query."'field' => 'slug',". PHP_EOL;
                $texte_query=$texte_query."'terms' => array('algerie')". PHP_EOL;     #ici la liste des termes taxonomie 1
        $texte_query=$texte_query.")". PHP_EOL;
    $texte_query=$texte_query."),". PHP_EOL;
 $texte_query=$texte_query.") );". PHP_EOL;
 
 

//eval($texte_query);

echo("\$texte_query : ".$texte_query)."\n";
 
 
eval($GLOBALS['understrap-child-main']['string_query'])

?>



 <?php $co=0;?>
 <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); $co=$co+1?>
 <div class="post">
 
 <!-- Display the Title as a link to the Post's permalink. -->
 <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php echo($co.'  '.the_title()); ?></a></h2>

 <?php endwhile; 
 else : ?>
 <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
 <?php endif; ?>

 wp_reset_postdata();



</main>
			<?php
			// Do the right sidebar check and close div#primary.
			get_template_part( 'global-templates/right-sidebar-check' );
			?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

