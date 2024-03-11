<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage</title>
</head>
<body>
    <h1>Authentification</h1>

    <form action="" method="" class="centrage">
          
        <p>Sigle de la formation:</p>
        <select name="sigleFormation">
            <?php 
                foreach($resultat as $key) 
                    {
                    echo '<option name="sigleFormation"    value="'.$key['formationSigle'].'">'.$key['formationIntitule'].'</option>';
                    }
            ?>
        </select>
        <br><br>
    <label>Mot de passe</label>
        <br/>   
            <input type="password" name="mdpFormation" required class="form-control" placeholder="Entrez votre mot de passe">
                <br/><br/>

                <input type="submit" name="button" value="Connexion">  
    </form>
   
    <hr>
</body>
</html>
