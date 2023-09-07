
<?php
  // initialisation des variables en fonction du $id
    $id = get_the_id();
    $idEnjeuSitué=get_post_meta($id,'num_enjeu_situé',true);
    $titreEnjeuSitué=get_the_title($idEnjeuSitué);
    $lePermalien=get_permalink($idEnjeuSitué);
     /*$nbCréations=$GLOBALS['understrap-child-main'][$idEnjeuSitué][0];//*/
    $est_enjeu= ($id==$idEnjeuSitué);
    $nbCréations= creations_pour_lenjeu($idEnjeuSitué);
?>

<div class="voir">
    
 <!-- on affiche l'enjeu écopoétique situé.
seulement si l'article $id est une création. -->
<?php if ($id!=$idEnjeuSitué){?> 
		<p><b>ENJEU CONCERNÉ</b></p> 
    	<div class="enjeuIconeText">
    		<?php 
    		//$art=$GLOBALS['ecopoetique2'][$idEnjeuSitué][$i]; // À SUPPRIMER
    		$source=puce($idEnjeuSitué,True); /*recupère l'image de la puce adéquate pour l'enjeu situé */
    		?>
    		<img class="iconeVoir" alt="" src="<?php echo $source?>"><a href="<?php echo $lePermalien?>"><?php echo $titreEnjeuSitué."<br>"?></a>
    	 </div>
    <?php }?>	 
    
	<p><b>
	<!-- Si c'est une création et il y a plus d'une création pour cet enjeu, on liste les autres créations ; si c'est un enjeu, on liste les créations -->
	
	<!-- d'abord, préparation du message en tête de la liste des créations 
	(selon qu'il y en ait plusieurs ou pas, et si l'article est une création)  -->
<?php 
$messageCréations = $nbCréations;
if ($id==$idEnjeuSitué){
   if ($nbCréations>1){
       $messageCréations="CRÉATIONS MOBILISÉES";
   }
   elseif ($nbCréations==1){
         $messageCréations="CRÉATION MOBILISÉE";
   }
}
elseif ($nbCréations==1) {
$messageCréations="PAS D'AUTRE CRÉATION MOBILISÉE";
}
elseif ($nbCréations==2) {
  $messageCréations="AUTRE CRÉATION MOBILISÉE";
}
elseif ($nbCréations>2) {
  $messageCréations="AUTRES CRÉATIONS MOBILISÉES";
}  

echo($messageCréations); ?> </b></p>



<?php echo("nb creations : ".strval(count($nbCréations)-1));
?>
    	 

</div> <!--  .voir -->
	
