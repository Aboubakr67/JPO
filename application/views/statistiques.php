<!DOCTYPE HTML>
<html>
 
   <head> 
      <link rel="stylesheet" href="<?php echo base_url().'style/style.css'; ?>"/>
      <meta charset="UTF-8">
      <title>Statistiques des visiteurs</title> 
   </head>
	
   <body> 

   <h1 style="text-align: center;">Statistiques des visiteurs de la JPO 2022</h1>

   <table id="tableau">
      <th style="width: 5%">Numéro</th>
      <th style="width: 10%">Nom</th>
      <th style="width: 10%">Prénom</th>
      <th style="width: 10%">Établissement</th>
      <th style="width: 5%">Formation</th>
      <th style="width: 10%">Mail</th>
      <th style="width: 10%">Formation visitée</th>
      <th style="width: 5%">Intérêt</th>
      <th style="width: 5%">Postulation</th>
      <th style="width: 10%">Horaire de passage</th>
      <th>Remarque</th>
      <?php
				$dataQ['query'] = $this->requetes->viewauction();

				foreach($dataQ['query'] as $row)
				{
					$row = json_decode(json_encode($row), true);
					  echo "<tr>";
                      echo "<td>" . $row['visiteurNum'] . "</td>";
                      echo "<td>" . $row['visiteurNom'] . "</td>";
                      echo "<td>" . $row['visiteurPrenom'] . "</td>";
                      echo "<td>" . $row['visiteurEtabOrigine'] . "</td>";
                      echo "<td>" . $row['visiteurFormActuelle'] . "</td>";
                      echo "<td>" . $row['visiteurMail'] . "</td>";
                      echo "<td>" . $row['formationSigle'] . "</td>";
                      echo "<td>" . $row['formationInteresse'] . "</td>";
                      echo "<td>" . $row['formationPostule'] . "</td>";
                      echo "<td>" . $row['visiteurHoraire'] . "</td>";
                      echo "<td>" . $row['visiteurRemarque'] . "</td>";
                      echo "</tr>";	
				}
?>
</table>            
</body>
</html>