<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url().'style/style.css'; ?>"/>
</head>
<body>
    <hr>
    <footer>
    <table id="piedPageTotal" style="font-size: 17px;">
        <th>
            <p><img src="<?php echo base_url().'img/logo_footer.png'; ?>" alt="logo footer" style="margin-bottom: 5px; margin-left: 10px; float: left;" /></p>
        </th>

        <th id="piedPage">
            <h2 id="piedPageAdresse">Adresse</h2>
            <p>4 rue Schoch - BP 67<br/>
            67046 Strasbourg cedex</p>
            <p>Tél : 03 88 45 54 54</p>

            <a href="<?php echo site_url('welcome/contenu/mentions-legales');?>" style="color: #f67c1a;">Mentions légales</a>
            <br/>
            <span >&copy;</span> <span> 2022</span> <span> Le lycée des métiers René Cassin de Strasbourg </span>
        </th>
    </table>
</footer>

</body>
</html>