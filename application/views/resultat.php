<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!doctype html>
<html lang="fr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <link rel="stylesheet" href="<?php echo base_url().'style/style.css'; ?>"/>
		<title>Formulaire rempli !</title>
	</head>
   <body>  
      <div class="elementResultat">
      <h2 style="text-align:center;">
         <?php 
            
            if ($texte=="Erreur d authentification,veuillez réessayer")
            {
               echo "Erreur d authentification,veuillez réessayer";
            }
            else
            {
               echo "Les informations ont bien été renseignées, merci pour votre visite !";
            }

           
         ?>
      </h2>  
      <img src="<?php echo base_url().'img/accueil3.jpg'; ?>" alt="Photo du lycée" style="width: 100%"/>
         </div>
   </body>
	
</html>