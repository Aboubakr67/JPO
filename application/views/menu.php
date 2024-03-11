<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url().'style/style.css'; ?>"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <table style="font-size: 18px;">
            <th id="menuCentre" style="border-left: 1px solid rgb(94, 0, 0); border-right: 1px solid rgb(140, 19, 19); border-top: 1px solid rgb(113, 0, 0); border-bottom: 1px solid rgb(53, 0, 0); box-shadow: inset 0 1px 0 rgb(192, 12, 12);"><a id="menuHaut" href="<?php echo site_url('welcome/contenu/accueil');?>">Accueil</a></th>
            <th id="menuCentre" style="border-left: 1px solid rgb(94, 0, 0); border-right: 1px solid rgb(140, 19, 19); border-top: 1px solid rgb(113, 0, 0); border-bottom: 1px solid rgb(53, 0, 0); box-shadow: inset 0 1px 0 rgb(192, 12, 12);"><a id="menuHaut" href="<?php echo site_url('welcome/contenu/visite');?>">Espace Visiteurs</a></th>
            <th id="menuCentre" style="border-left: 1px solid rgb(94, 0, 0); border-right: 1px solid rgb(140, 19, 19); border-top: 1px solid rgb(113, 0, 0); border-bottom: 1px solid rgb(53, 0, 0); box-shadow: inset 0 1px 0 rgb(192, 12, 12);"><a id="menuHaut" href="<?php echo site_url('welcome/contenu/connexion');?>">Connexion Statistiques</a></th>
    </table>
    <hr>
</body>
</html>
