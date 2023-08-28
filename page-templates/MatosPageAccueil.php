<span class="titreDuSite"><?php get_header("accueil");?>
<!-- IMAGE-TITRE 
	<p class="site-title text-white"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"></a></p> 
            	<img src="https://ecopoetique.huma-num.fr/wp-content/uploads/2022/05/Titre_blanc_site_ecopoetique_seul.png" alt="Titre_blanc_site_ecopoetique_seul.png" ">
-->
</span>
<main id="primary" class="site-main">
  
<?php
// le loop est supprimé, ça a l'air de marcher quand même	
	get_template_part( 'template-parts/content', 'page' );
?>  
	</main><!-- #main -->
<?php
$tableauRécupéré = creations_pour_lenjeu(390);
echo(var_dump($tableauRécupéré));
echo (count($tableauRécupéré));
echo('**** énumération des posts récupérés<br>');
for($i = 0; $i < count($tableauRécupéré); ++$i) {
    echo("__CASE NUMERO ".$i."__<br>");
    echo( "printr de la case :".print_r($tableauRécupéré[$i],true)."<br>");
    $c=$tableauRécupéré[$i];
    echo "VVV".$c->ID."WWW".$c->post_title."XXX"; 
}?>

<?php
get_footer('accueil');
?>
