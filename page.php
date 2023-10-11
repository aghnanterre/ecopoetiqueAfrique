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

get_header('blank');

$container = get_theme_mod( 'understrap_container_type' );


$taxonomy = 'pays';
$nomFiltre='Afrique';

$taxonomy= 'forme_creation';
$nomFiltre='Forme';

$taxonomy= 'enjeu_environnemental';
$nomFiltre='ENJEU';

$terms = get_terms($taxonomy);
 ?>
 
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

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

        <!-- cases à cocher ('#filtre') -->
        <span id="filtre" class="<?php echo("filtre-".$taxonomy)?>">
            <option value="<?php echo($nomFiltre)?>"><?php echo($nomFiltre)?></option> <!-- Titre du filtre -->
            <?php foreach ($terms as $term) : ?>
             <div>
            	<label for="<?php echo $term->slug; ?>"> <input type="checkbox" name="valeur" value="<?php echo $term->slug; ?>" id="<?php echo $term->slug; ?>" onclick="myFunction()"><?php echo $term->name;  ?></label>
          	</div>
            <?php endforeach; ?>	
        </span> <!--  #filtre -->
				



<?php

echo("<br> directement :");
echo do_shortcode("\$GLOBALS[\'understrap-child-main\'][\'shortcodeEnCours\']");

echo("<br>indirectement :");
$commande='do_shortcode("\$GLOBALS[\'understrap-child-main\'][\'shortcodeEnCours\']");';
eval($commande);


echo("<br>Tests<br>");
$cc='echo(\"\$GLOBALS[\'understrap-child-main\'][\'shortcodeEnCours\']';
echo("cc : ".$cc);
do_shortcode("\$GLOBALS[\'understrap-child-main\'][\'shortcodeEnCours\']");
;
?>








</main>
		

	</div><!-- #content -->

</div><!-- #page-wrapper -->

