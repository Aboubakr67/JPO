<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="fr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="<?php echo base_url().'style/style.css'; ?>"/>
		<title>Formulaire <?php echo $_POST['sigleFormation'] ;?></title>
	</head>

<body id="formulaire">

	<?php $sigle=$_POST['sigleFormation']; ?>
	<h1>Formulaire <?php echo $sigle ;?></h1>

<?php

    echo form_open('welcome/validation',array('method'=>'post'));

	$sigle= array('name'=>'sigleFormation','id'=>'sigleFormation','placeholder'=>'SigleFormation','value'=>set_value('sigleFormation'), 'type'=>'hidden');
	echo form_input($sigle);
?>
	<fieldset id="fieldset">
	<legend>Informations obligatoires</legend>
	<table id="tableForm">
		<tr id="cancel">
		<td id="cancel" style="text-align: left;">
<?php

	$nom= array('name'=>'nom','id'=>'nom', 'value'=>set_value('nom'), 'required'=>'required', 'maxlength'=>'128', 'style'=>'width: 95%;');
	echo "<label>Nom :</label>";
?>

</td>
<td id="cancel">

<?php
	
    echo form_input($nom);
?>
</td>
</tr>

<tr id="cancel">
<td id="cancel" style="text-align: left;">
<?php
	
	//echo form_checkbox($nom);

	$prenom= array('name'=>'prenom','id'=>'prenom', 'value'=>set_value('prenom'), 'required'=>'required', 'maxlength'=>'128', 'style'=>'width: 95%;');
	echo "<label>Prénom :</label>";
?>
</td>
<td id="cancel">
<?php
    echo form_input($prenom);
?>
</td>
</tr>

<tr>
<td id="cancel" style="text-align: left;">

<?php

	$etabOrigine= array('name'=>'etabOrigine','id'=>'etabOrigine', 'value'=>set_value('etabOrigine'), 'required'=>'required', 'maxlength'=>'128', 'style'=>'width: 95%;');
	echo "<label>Établissement d'origine :</label>";
?>
</td>
<td id="cancel">
<?php
    echo form_input($etabOrigine);
?>
</td>
</tr>

<tr id="cancel">
<td  id="cancel"style="text-align: left;">
<?php
	$formActuelle= array('name'=>'formActuelle','id'=>'formActuelle', 'value'=>set_value('formActuelle'), 'required'=>'required', 'maxlength'=>'128', 'style'=>'width: 95%;');
	echo "<label>Formation actuelle :</label>";
?>
</td>
<td id="cancel">
<?php
	echo form_input($formActuelle);
?>
</tr>
</td id="cancel">

<tr id="cancel">
<td id="cancel" style="text-align: left;">
<?php
	$mail= array('name'=>'mail','id'=>'mail', 'value'=>set_value('mail'), 'type'=>'email', 'required'=>'required', 'maxlength'=>'128', 'style'=>'width: 95%;');
    echo "<label>Mail :</label>";
?>
</td>
<td id="cancel">
<?php
	echo form_input($mail);
?>
</td>
</tr>
</table>
</fieldset>
<fieldset id="fieldset">
	<legend>Informations complémentaires</legend>

	<table id="tableForm">
		<tr id="cancel">
		<td id="cancel">

<label>Êtes-vous intéressé(e) par cette formation ?</label>

<table id="radiobuttons">
	<td id="cancel" style="width: 29%;">
<?php
	$interesse = array('name'=>'interresse', 'id'=>'interresseO', 'value'=>'O', 'checked'=>FALSE);
	echo form_radio($interesse); echo form_label('Oui', 'interresseO', array('style'=>'cursor: pointer; margin-top: 7px; margin-left: -5px;'));
?>
	<!-- <label name='interesse' id='interesseO', style='cursor: pointer;'>Oui</label> -->
	</td>
	<td id="cancel" style="width: 29%;">
<?php
	$interesse = array('name'=>'interresse', 'id'=>'interresseN', 'value'=>'N', 'checked'=>FALSE);
	echo form_radio($interesse); echo form_label('Non', 'interresseN', array('style'=>'cursor: pointer; margin-top: 7px; margin-left: -5px;'));
?>
	</td>
	<td id="cancel" style="width: 42%;">
<?php
	$interesse = array('name'=>'interresse', 'id'=>'interresseS', 'value'=>'S', 'checked'=>TRUE);
	echo form_radio($interesse); echo form_label('Sans avis', 'interresseS', array('style'=>'cursor: pointer; margin-top: 7px; margin-left: -5px;'));
?>
	</td>
</table>

</tr>
</td>

</td>
</tr>


<tr id="cancel">
<td id="cancel">


<label>Voulez-vous postuler pour cette formation ?</label> 

<table id="radiobuttons">
	<td id="cancel" style="width: 29%;">
<?php
	$voulez_vous = array('name'=>'voulez_vous', 'id'=>'voulez_vousO', 'value'=>'O', 'checked'=>FALSE);
	echo form_radio($voulez_vous); echo form_label('Oui', 'voulez_vousO', array('style'=>'cursor: pointer; margin-top: 7px; margin-left: -5px;'));
?>
	</td>
	<td id="cancel" style="width: 29%;">
<?php
	$voulez_vous = array('name'=>'voulez_vous', 'id'=>'voulez_vousN', 'value'=>'N', 'checked'=>FALSE);
	echo form_radio($voulez_vous); echo form_label('Non', 'voulez_vousN', array('style'=>'cursor: pointer; margin-top: 7px; margin-left: -5px;'));
?>
	</td>
	<td id="cancel" style="width: 42%;">
<?php
	$voulez_vous = array('name'=>'voulez_vous', 'id'=>'voulez_vousS', 'value'=>'S', 'checked'=>TRUE);
	echo form_radio($voulez_vous); echo form_label('Sans avis', 'voulez_vousS', array('style'=>'cursor: pointer; margin-top: 7px; margin-left: -5px;'));
?>
	</td>
</table>




</td>
</tr>
<tr id="cancel">
<td id="cancel">
<?php

	$remarque= array('name'=>'remarque','id'=>'remarque','placeholder'=>'(256 caractères maximum)','value'=>set_value('remarque'), 'maxlength'=>'256', 'style'=>'width: 97%;');
    echo "<label>Remarque : </label>";
	echo "<br/><hr>";
	echo form_textarea($remarque);

?>
</td>
</tr>
</table>
</fieldset>

<?php

	echo form_submit('envoi', 'Valider');
 
    echo form_close();
?>

</body>
</html>