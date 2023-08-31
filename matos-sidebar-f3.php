*ancien fichier.

<div class="voir">
         <?php
      // initialisation des variables en fonction du $id
      $idEnjeuSitué=get_post_meta($id,'num_enjeu_situé',true);
      $titreEnjeuSitué=get_the_title($idEnjeuSitué);
      $lePermalien=get_permalink($idEnjeuSitué);
      $nbCréations=$GLOBALS['ecopoetique2'][$idEnjeuSitué][0];//
      $est_enjeu= ($id==$idEnjeuSitué);
      
            ?>
   
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
              
              
?>
	   
	   <?php echo($messageCréations) ?></b></p>
	   <!-- Ici on liste les créations -->
		<?php  for ($i = 1; $i <= $nbCréations; $i++) {
		    // si l'article ($id) est différent de son enjeu situé ...
		              if ($GLOBALS['ecopoetique2'][$idEnjeuSitué][$i]!=$id) {
		    // ...alors on le listera (avec son lien précédé d'une puce)
		                  $leLien= get_permalink($GLOBALS['ecopoetique2'][$idEnjeuSitué][$i]);?>
	                      <div id="itemVoir">
	                <?php $art=$GLOBALS['ecopoetique2'][$idEnjeuSitué][$i];
	                /*recupère l'image de la puce adéquate */
	                      $source=puce($art,true); 	?>
	                <?php console_maison($source);?>
						   <img class="iconeVoir" alt="puce" src="<?php echo($source)?>">
					<?php console_maison("source dans src= ".$source);?>
	   						<a href="<?php echo $leLien ?>"><?php echo get_the_title($art) ?></a> </div>
	   						<?php if (1==1) {;  }
	                        }
	                  }
                           
	?>
	

 </div>
    
    
      <?php
      if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('f3') ) :
      /*echo "<b> type d'article </b>: ".nomType($id)."<br>";
      echo "<b> nom enjeu</b> : ".nomEnjeu($id)."<br>";
      echo "<b> forme </b>: ".nomForme($id)."<br>";
      echo "<b>  nom pays</b> : ".nomPays($id)."<br><br><br><br>";
      */?>
      
      <?php /*
      echo "<b>Enjeux existants</b> :<br>";
      $taxonomy='enjeu_environnemental';
      $terms = get_terms([
          'taxonomy' => $taxonomy,
          'hide_empty' => false,
      ]);
     
      foreach ($terms as $valeur) {
          echo ('<b>*</b> '.$valeur->name . "<br><br>");
      }
      */?>

      
      <?php 
      else:
      echo 'il y a une condition non respêctée';;
      endif; ?>
</div>