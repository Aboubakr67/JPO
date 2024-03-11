<?php //librairie.php

function connexionBDD()
{
	try {
		$db = new PDO('mysql:host=localhost;dbname=jpozennir;charset=utf8','root','root'); // Connexion PDO
		return $db;
	}
	catch(Exception $e){
		die ('Erreur :'. $e->getMessage()); // Va mettre fin au programme et afficher l'erreur
	}	
}
$connexionPDO= connexionBDD();
function fermetureBDD($connexionPDO)
{
	$connexionPDO -> close();
}

function procedureAfficheTableau($connexionPDO)
{
	$tableau = $connexionPDO -> query("SELECT visiteur.visiteurNum, visiteur.visiteurNom, visiteur.visiteurPrenom, visiteur.visiteurEtabOrigine, visiteur.visiteurFormActuelle, visiteur.visiteurMail, interesser.formationSigle, interesser.formationInteresse, interesser.formationPostule, interesser.visiteurHoraire, interesser.visiteurRemarque FROM jpozennir.visiteur, jpozennir.interesser WHERE visiteur.visiteurNum = interesser.visiteurNum ORDER BY visiteur.visiteurNum;");
	echo '<!DOCTYPE HTML><html lang="fr"><head><meta charset="utf-8"><title>Formulaire d\'appr&eacute;ciation</title><link rel="stylesheet" href="style.css"/>'."</head><table border = '1' border-collapse='seperate'><th>Num&eacute;ro du visiteur</th><th>Nom du visiteur</th><th>Pr&eacute;nom du visiteur</th><th>&Eacute;tablissement d'origine du visiteur</th><th>Formation actuelle du visiteur</th><th>Mail du visiteur</th><th>Formation visit&eacute;e</th><th>Int&eacute;r&ecirc;t du visiteur</th><th>Postulation du visiteur</th><th>Horaire de passage</th><th>Remarque du visiteur</th>";
	if (is_array($tableau) || is_object($tableau))
	{
		foreach($tableau as $ligne)
			{
				echo '<tr><td>'.$ligne['visiteurNum'].'</td><td>'.$ligne['visiteurNom'].'</td><td>'.$ligne['visiteurPrenom'].'</td><td>'.$ligne['visiteurEtabOrigine'].'</td><td>'.$ligne['visiteurFormActuelle'].'</td><td>'.$ligne['visiteurMail'].'</td><td>'.$ligne['formationSigle'].'</td><td>'.$ligne['formationInteresse'].'</td><td>'.$ligne['formationPostule'].'</td><td>'.$ligne['visiteurHoraire'].'</td><td>'.$ligne['visiteurRemarque'].'</td></tr>';
			}
		echo '</table></body></html>';
		mysqli_free_result($tableau);
	}
}

function verifieResultat($nomForm,$mdpForm,$connexionPDO)
{
	$valeur = 0;
	if($tableauResultat = $connexionPDO -> query("SELECT COUNT(*) as 'nombre' FROM jpozennir.formation WHERE formationSigle = '$nomForm' AND formationMdp = '$mdpForm';"))
	{
		$resultat = mysqli_fetch_array($tableauResultat);
		mysqli_free_result($tableauResultat);
		$valeur = $resultat['nombre'];
	}
	return $valeur;
}

function verifieFormation($nomForm,$connexionPDO)
{
	$valeurForm = 0;
	if($tableauResultat = $connexionPDO -> query("SELECT * as 'form' FROM jpozennir.formation WHERE formationSigle = '$nomForm';"))
	{
		$resultat = mysqli_fetch_array($tableauResultat);
		mysqli_free_result($tableauResultat);
		$valeurForm = $resultat['form'];
	}
	return $valeurForm;
}

function recupNumeroV($connexionPDO)
{
	$valeurNum = 0;
	if($numV = $connexionPDO -> query("SELECT visiteurNum as 'num' FROM visiteur ORDER BY visiteurNum DESC LIMIT 0,1;"))
	{
		$resultat = mysqli_fetch_array($numV);
		mysqli_free_result($numV);
		$valeurNum = $resultat['num'];
	}
	return $valeurNum+1;
}

function insereDonnees($nomV,$prenomV,$etabOrigineV,$formActuelleV,$mailV,$valeurNum,$formSigle,$interetV,$postuleV,$remarqueV,$connexionPDO)
{
	$resultatV = $connexionPDO -> query("INSERT INTO visiteur (visiteurNom, visiteurPrenom, visiteurEtabOrigine, visiteurFormActuelle, visiteurMail) VALUES ('$nomV', '$prenomV', '$etabOrigineV', '$formActuelleV', '$mailV');");
	$resultatI = $connexionPDO -> query("INSERT INTO interesser (visiteurNum, formationSigle, formationInteresse, formationPostule, visiteurHoraire, visiteurRemarque) VALUES ('$valeurNum', '$formSigle', '$interetV', '$postuleV', NOW(), '$remarqueV');");
	if ($resultatV == TRUE AND $resultatI == TRUE)
	{
		?>
		<!DOCTYPE HTML>
		<html lang="fr">
		<head>
			<meta charset="utf-8">
			<title>Ren&eacute; Cassin - Validation</title>
			<link rel="stylesheet" href="style.css"/>
		</head>
		<body>
			<div class="centrage">
				<a href="http://www.lyceecassin-strasbourg.eu/">
					<img src="images/logo.png" alt="Lyc�e Ren� Cassin" border="0"/>
				</a>
			</div>
			<br/>
			<p class="centrage">Les renseignements ont bien &eacute;t&eacute; re&ccedil;us, merci pour votre temps !</p>
		</body>
		</html>
		<?php
	}
	else
	{
		echo "Erreur: ".$connexionPDO -> error."<br/>";
	}
}
?>