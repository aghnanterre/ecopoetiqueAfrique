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
$query = new WP_Query( array(
    'post_type' => 'post',
    'tax_query' => array(
        array (
            'taxonomy' => 'enjeu_environnemental',
            'field' => 'slug',
            'terms' => array('nucleaire','eau','infrastructure','terre_biomasse')
        )
    ),
) );


?>



 <?php $co=0;?>
 <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); $co=$co+1?>
 <div class="post">
 
 <!-- Display the Title as a link to the Post's permalink. -->
 <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php echo($co.'  '.the_title()); ?></a></h2>


 <?php endwhile; 
 wp_reset_postdata();
 else : ?>
 <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
 <?php endif; ?>




</main>
			<?php
			// Do the right sidebar check and close div#primary.
			get_template_part( 'global-templates/right-sidebar-check' );
			?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

