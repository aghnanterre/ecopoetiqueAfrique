<?php
/**
 * The template for displaying search results pages
 *
 * @package Understrap
 */


$taxonomy= 'enjeu_environnemental';
$nomFiltre='Enjeu';
$terms = get_terms($taxonomy);
console_maison($terms);


// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header('blank');

$container = get_theme_mod( 'understrap_container_type' );

?>
<body class="noir" >
	<?php
	get_header('blank');?>
	<img class="noir img-fluid"  src="https://ecopoetique.huma-num.fr/wp-content/uploads/2023/08/LOGO_ECOPOETIQUE_STAR-e1693303056864.png" ">
		<?php echo do_shortcode( ' [travelers-map minzoom=3 maxzoom=3 current_query_markers=false width=100% height=100vh disable_clustering=true post_types=post,page tileurl="https://{s}.tile.jawg.io/jawg-dark/{z}/{x}/{y}{r}.png?access-token=EDiK4LQEjFpT2p7S06fbibeGK6KTsbSPR7hYkaMQYj9VfeswuOoxJOFXlL9NkI6E" subdomains="abc" attribution=\'<a href="http://jawg.io>\' title="Tiles Courtesy of Jawg Maps" target="_blank" ] ' );
		
		
		//		get_template_part( 'loop-templates/content', 'blank' );
	
	?>
	<?php 
	wp_footer();
	?>
</body>

<!-- cases à cocher ('#filtre') -->
<span id="filtre" class="<?php echo("filtre-".$taxonomy)?>">
    <option value="<?php echo($nomFiltre)?>"><?php echo($nomFiltre)?></option> <!-- Titre du filtre -->
    <?php foreach ($terms as $term) : ?>
     <div>
    	<label for="<?php echo $term->slug; ?>"> <input type="checkbox" name="valeur" value="<?php echo $term->slug; ?>" id="<?php echo $term->slug; ?>" onclick="myFunction()"><?php echo $term->name;  ?></label>
  	</div>
    <?php endforeach; ?>	
</span>

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
get_footer('empty');
