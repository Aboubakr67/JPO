<!DOCTYPE HTML>
<html>
 
<head> 
   <link rel="stylesheet" href="<?php echo base_url().'style/style.css'; ?>"/>
   <meta charset="UTF-8">
   <title>Statistiques Connexion</title> 
</head>
	
<body id="formulaire">

<div class="elementStats">
  <!-- <form action = "statistiques" method = "POST">-->

      <h1>Connexion</h1>
      <fieldset id="fieldset" style="border: 0px;">
      <table id="tableForm" style="margin-bottom: -5px; margin-left: -5px;">
         <tr id="cancel">
            <td id="cancel" style="width: 33%;">
               <label style="text-align: left;">Identifiant :</label>
            </td>
            <td id="cancel">
               <?php
               echo form_open('welcome/statistiques',array('method'=>'post'));

               $identifiant = array('name'=>'idStats','id'=>'idStats', 'value'=>set_value('idStats'), 'required'=>'required', 'style'=>'width: 100%;');
	            echo form_input($identifiant);
               ?>
            </td>
         </tr>
         <tr id="cancel">
            <td id="cancel" style="width: 33%;">
               <label style="text-align: left;">Mot de passe :</label>
            </td>
            <td id="cancel">
               <?php
               $mdp = array('name'=>'mdpStats','id'=>'mdpStats', 'value'=>set_value('mdpStats'), 'type'=>'password', 'required'=>'required', 'style'=>'width: 100%;');
               echo form_input($mdp);
               ?>
            </td>
         </tr>
      </table>
</fieldset>
      <br>
      <?php
         echo form_submit('button', 'Connexion');
 
         echo form_close();
      ?>  
   <!-- </form> -->
</div>
</body>
</html>