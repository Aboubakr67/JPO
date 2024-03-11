<?php //traitement.php
include_once 'librairie.php';

$loginForm = $_POST['sigleFormation'];
$loginMdpForm = $_POST['mdpFormation'];

$lienBDD=connexionBDD();

$verifStats = $loginForm == "stats" AND $loginMdpForm == "mdpstats";

if ($lienBDD -> connect_errno)
{
	echo "Erreur de connexion: $lienBDD -> connect_errno";
}
else
{
	$nombre = verifieResultat($loginForm,$loginMdpForm,$lienBDD);
	$nombreForm = verifieFormation($loginForm,$lienBDD);
	if ($nombre == 0 AND $verifStats == FALSE)
	{
		?>
		<!DOCTYPE HTML>
		<html lang="fr">
			<head>
				<meta charset="utf-8">
				<title>Ren&eacute; Cassin - Erreur</title>
				<link rel="stylesheet" href="style.css"/>
			</head>
			<body>
			<div class="centrage">
				<a href="http://www.lyceecassin-strasbourg.eu/">
					<img src="images/logo.png" alt="Lyc�e Ren� Cassin" border="0"/>	
				</a>
			</div>
			<br/>
			<p class="centrage">Identifiant et/ou mot de passe invalide(s).</p>
			</body>
		</html>
		<?php
	}
	else
	{
		if($verifStats)
		{
			?>
			<!DOCTYPE HTML>
			<html lang="fr">
				<head>
					<meta charset="utf-8">
					<title>Ren&eacute; Cassin - Statistiques</title>
					<link rel="stylesheet" href="style.css"/>
				</head>
				<body>
				<div class="centrage">
					<a href="http://www.lyceecassin-strasbourg.eu/">
						<img src="images/logo.png" alt="Lyc�e Ren� Cassin" border="0"/>	
					</a>
				</div>
					<h1 class="centrage">Statistiques des entr&eacute;es des visiteurs de la Journ&eacute;e Portes Ouvertes</h1>
					<?php procedureAfficheTableau($lienBDD); ?>
				</div>
				</body>
			</html>
			<?php
		}
		else
		{
			fermetureBDD($lienBDD);
			?>
			<!DOCTYPE HTML>
			<html lang="fr">
				<head>
					<meta charset="utf-8">
					<title>Formulaire de visite</title>
					<link rel="stylesheet" href="style.css"/>
				</head>
				<body>
					<div class="centrage">
						<a href="http://www.lyceecassin-strasbourg.eu/">
							<img src="images/logo.png" alt="Lyc�e Ren� Cassin" border="0"/>
						</a>
					</div>
					<br/>
					<h1 class="centrage"><?php echo $loginForm ?></h1>
					<form action="validation.php" method="POST" class="centrage">
						<br/>
						<input type="hidden" name="sigleFormation2" value="<?php echo $loginForm;?>">
							<fieldset>
								<legend>Informations</legend>
									<label>Nom:</label>
										<input type="text" name="nomV" required class="form-control">
									<br/><br/>
									<label>Pr&eacute;nom:</label>
										<input type="text" name="prenomV" required class="form-control">
									<br/><br/>
									<label>&Eacute;tablissement d'origine:</label>
										<input type="text" name="etabOrigineV" required class="form-control">
									<br/><br/>
									<label>Formation actuelle:</label>
										<input type="text" name="formActuelleV" required class="form-control">
									<br/><br/>
									<label>Adresse mail:</label>
										<input type="text" name="mailV" required class="form-control">
									<br/><br/>
							</fieldset>
							<fieldset>
								<legend>Informations compl&eacute;mentaires</legend>
								<label for="isInteret">&Ecirc;tes-vous int&eacute;ress&eacute;.e par cette formation ?</label>
									<input type="checkbox" id="isInteret" name="interetV">
								<br/><br/>
								<label for="isPostule">Voulez-vous postuler pour cette formation ?</label>
									<input type="checkbox" id="isPostule" name="postuleV">
								<br/><br/>
								<label>Donnez votre remarque sur cette formation:</label>
									<textarea name="remarque" id="remarque"></textarea>
							</fieldset>
						<input type="submit" name="button" value="Valider">
					</form>
				</body>
			</html>
			<?php
		}
	}
}
?>