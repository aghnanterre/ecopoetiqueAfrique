
<?php
  // initialisation des variables en fonction du $id
    $id = get_the_id();
    $idEnjeuSitué=get_post_meta($id,'num_enjeu_situé',true);
    $titreEnjeuSitué=get_the_title($idEnjeuSitué);
    $lePermalien=get_permalink($idEnjeuSitué);
     /*$nbCréations=$GLOBALS['understrap-child-main'][$idEnjeuSitué][0];//*/
    $est_enjeu= ($id==$idEnjeuSitué);
    $créations= creations_pour_lenjeu($idEnjeuSitué);
    // le tableau $creations contient une case par création + 1 case pour leut enjeu situé
    $nbCréations=count($créations)-1
?>

<div class="voir">
    
 <!-- on affiche l'enjeu écopoétique situé.
seulement si l'article $id est une création. -->
<?php if ($id!=$idEnjeuSitué){?> 
		<p><b>ENJEU CONCERNÉ</b></p> 
    	<div class="enjeuIconeText">
    		<?php 
    		$source=puce($idEnjeuSitué); /*recupère l'image de la puce adéquate pour l'enjeu situé */
    		?>
    		<img class="iconeVoir" alt="" src="<?php echo $source?>"><a href="<?php echo $lePermalien?>" style="color: white"><?php echo $titreEnjeuSitué."<br>"?></a>
    	 </div>
    <?php }?>	 
    
	<p><b>
	<!-- Si c'est une création et il y a plus d'une création pour cet enjeu, on liste les autres créations ; si c'est un enjeu, on liste les créations -->
	
	<!-- d'abord, préparation du message en tête de la liste des créations 
	(selon qu'il y en ait plusieurs ou pas, et si l'article est une création)  -->
<?php 
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



<?php 


foreach ($créations as $x) {
    $lid=$x->ID;
    if (($lid !=  $idEnjeuSitué)) {
        if ($lid != $id) {
            $source=puce($x);
            echo("<img class=\"iconeVoir\" alt=\"* \" src=\"".$source."\"><a href=".get_permalink($x)." style=\"color: white\">".get_the_title($x)."<br></a>");
            
        }
    }
}

?>
    	 

</div> <!--  .voir -->
	
