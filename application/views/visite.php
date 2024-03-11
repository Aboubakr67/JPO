<!DOCTYPE HTML>
<html>
 
   <head> 
   <link rel="stylesheet" href="<?php echo base_url().'style/style.css'; ?>"/>
    <meta charset="UTF-8">
      <title>Espace Visiteurs</title> 
   </head>
	
   <body id="formulaire">

<div class="element">

  <form action = "formulaire" method = "POST">
      <?php echo validation_errors(); ?>  
         <?php echo form_open('form'); ?>  
         <h1>Choisissez une formation</h1> 
   
          <select name="sigleFormation">
              <?php 
                  foreach($resultat as $key) 
                      {
                      echo '<option name="sigleFormation"    value="'.$key['formationSigle'].'">'.$key['formationIntitule'].'</option>';
                      }
              ?>
          </select>
          <br><br>
  
                  <input type="submit" name="button" value="Sélectionner">  
      </form>


</div>

      


   </body>
	
</html>