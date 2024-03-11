<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
 

class Model extends CI_Model
{
    
    public function construct()
    {
        parent:: construct();
    }
    
    public function getClients()
    {
        $search = "SELECT * FROM formation";
        $result = $this->db->conn_id->prepare($search);
        $result->execute();
        return $query_result = $result->fetchAll(PDO::FETCH_ASSOC);

    }


    public function getNomFormations()
    {
        $search = "SELECT formationSigle, formationIntitule FROM formation";
        $result = $this->db->conn_id->prepare($search);
        $result->execute();
        return $query_result = $result->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function setEtudiant($nom,$prenom,$etabOrigine,$formActuelle,$mail)
	// remplir la table visiteur
 {
	 $search = "INSERT INTO visiteur(visiteurNom,visiteurPrenom,visiteurEtabOrigine,visiteurFormActuelle,visiteurMail)
      VALUES(:visiteurNom,:visiteurPrenom,:visiteurEtabOrigine,:visiteurFormActuelle,:visiteurMail);";
	 $result = $this->db->conn_id->prepare($search);
	 $result->bindParam(':visiteurNom', $nom, PDO::PARAM_STR);
	 $result->bindParam(':visiteurPrenom', $prenom, PDO::PARAM_STR);
	 $result->bindParam(':visiteurEtabOrigine', $etabOrigine, PDO::PARAM_STR);
	 $result->bindParam(':visiteurFormActuelle', $formActuelle, PDO::PARAM_STR);
	 $result->bindParam(':visiteurMail', $mail, PDO::PARAM_STR);
	 $result->execute();
 }

 public function setInteresse($visiteurNum,$visiteurSigle,$visiteurInteret,$visiteurPostule,$remarque)
 {
	 $search = "INSERT INTO interesser(visiteurNum,formationSigle,formationInteresse,formationPostule,visiteurHoraire,visiteurRemarque)
      VALUES(:visiteurNum,:formationSigle,:formationInteresse,:formationPostule,NOW(),:visiteurRemarque);";
	 $result = $this->db->conn_id->prepare($search);
	 $result->bindParam(':visiteurNum', $visiteurNum, PDO::PARAM_INT);
	 $result->bindParam(':formationSigle', $visiteurSigle, PDO::PARAM_STR);
	 $result->bindParam(':formationInteresse', $visiteurInteret, PDO::PARAM_STR);
	 $result->bindParam(':formationPostule', $visiteurPostule, PDO::PARAM_STR);
	 $result->bindParam(':visiteurRemarque', $remarque, PDO::PARAM_STR);

	// echo "INSERT INTO interesser(visiteurNum,formationSigle,formationInteresse,formationPostule,visiteurHoraire,visiteurRemarque)
	// VALUES($visiteurNum,'$visiteurSigle','$visiteurInteret','$visiteurPostule',NOW(),'$remarque');";

	//INSERT INTO interesser(visiteurNum,formationSigle,formationInteresse,formationPostule,visiteurHoraire,
	// visiteurRemarque) VALUES(2,"BTS Banque","jnjnj","njnjnjn",NOW(),"njnjn")

	 
	 $result->execute();
	 $query_result = $result->fetchAll(PDO::FETCH_ASSOC);
	 //$this->db = null ;
	 return $query_result;      
 }

public function recupNumVisiteur($nom,$prenom,$etabOrigine,$formActuelle,$mail)
// $nom,$prenom,$etabOrigine,$formActuelle,$mail
 {
    
	 $search = "SELECT visiteurNum FROM visiteur WHERE visiteurNom='$nom' AND visiteurPrenom='$prenom' AND visiteurEtabOrigine='$etabOrigine' AND visiteurFormActuelle='$formActuelle' AND visiteurMail='$mail';";
	 // SELECT visiteurNum FROM visiteur ORDER BY visiteurNum DESC LIMIT 0,1;
	 // SELECT visiteurNum FROM visiteur WHERE visiteurNom=$nom AND visiteurPrenom=$prenom AND visiteurEtabOrigine=$etabOrigine AND visiteurFormActuelle=$formActuelle AND visiteurMail=$mail;
	 $result = $this->db->conn_id->prepare($search);
	 $result->execute();

	 $query_result = $result->fetchAll(PDO::FETCH_ASSOC);
	 //$this->db = null ;
	 
	 return $query_result; 

 }


public function afficheToutNum()
 {
    
	 $search = "SELECT visiteurNum FROM visiteur ;";
	 // SELECT visiteurNum FROM visiteur ORDER BY visiteurNum DESC LIMIT 0,1;
	 // SELECT visiteurNum FROM visiteur WHERE visiteurNom=$nom AND visiteurPrenom=$prenom AND visiteurEtabOrigine=$etabOrigine AND visiteurFormActuelle=$formActuelle AND visiteurMail=$mail;
	 $result = $this->db->conn_id->prepare($search);
	 $result->execute();

	 $query_result = $result->fetchAll(PDO::FETCH_ASSOC);
	 //$this->db = null ;
	 
	 return $query_result; 

 }


public function verifIdStatstest()
{

	$search = "SELECT COUNT(*) as 'nbUser' FROM user WHERE userId='$nom' AND visiteurPrenom='$prenom' AND visiteurEtabOrigine='$etabOrigine' AND visiteurFormActuelle='$formActuelle' AND visiteurMail='$mail';";
	 // SELECT visiteurNum FROM visiteur ORDER BY visiteurNum DESC LIMIT 0,1;
	 // SELECT visiteurNum FROM visiteur WHERE visiteurNom=$nom AND visiteurPrenom=$prenom AND visiteurEtabOrigine=$etabOrigine AND visiteurFormActuelle=$formActuelle AND visiteurMail=$mail;
	 $result = $this->db->conn_id->prepare($search);
	 $result->execute();

	 $query_result = $result->fetchAll(PDO::FETCH_ASSOC);
	 //$this->db = null ;
	 
	 return $query_result; 

}

public function verifIdStats($identifiant,$mdp)
{
	$search = "SELECT COUNT(*) as 'nombre' FROM user WHERE userId=:identifiant AND userPassword=:mdp;";
	$result = $this->db->conn_id->prepare($search);
	
    $result -> bindValue(':identifiant', $identifiant, PDO::PARAM_STR);
	$result -> bindValue(':mdp', $mdp, PDO::PARAM_STR);
	$result -> execute(); // EXECUTE LA REQUETE
	
	$query_result = $result -> fetchAll(PDO::FETCH_ASSOC); // VA RECUPERER LE RESULTAT, fetchAll PEUT AUSSI ETRE UTILISE voir php.net
	return $query_result;
}


public function procedureAfficheTableau()
 {
	 $search = "SELECT visiteur.visiteurNum, visiteur.visiteurNom, visiteur.visiteurPrenom, visiteur.visiteurEtabOrigine, visiteur.visiteurFormActuelle, visiteur.visiteurMail, interesser.formationSigle, interesser.formationInteresse, interesser.formationPostule, interesser.visiteurHoraire, interesser.visiteurRemarque FROM jpozennir.visiteur, jpozennir.interesser WHERE visiteur.visiteurNum = interesser.visiteurNum ORDER BY visiteur.visiteurNum;";
	 $result = $this->db->conn_id->prepare($search);
	 $result->execute();

	 $query_result = $result->fetchAll(PDO::FETCH_ASSOC);
	 echo '<!DOCTYPE HTML><html lang="fr"><head><meta charset="utf-8"><title>Formulaire d\'appréciation</title><link rel="stylesheet" href="style.css"/>'."</head><table border = '1' border-collapse='seperate'><th>Numéro du visiteur</th><th>Nom du visiteur</th><th>Prénom du visiteur</th><th>Établissement d'origine du visiteur</th><th>Formation actuelle du visiteur</th><th>Mail du visiteur</th><th>Formation visitée</th><th>Intérêt du visiteur</th><th>Postulation du visiteur</th><th>Horaire de passage</th><th>Remarque du visiteur</th>";
	 if (is_array($search) || is_object($search))
	 {
		 foreach($search as $ligne)
			 {
				 echo '<tr><td>'.$ligne['visiteurNum'].'</td><td>'.$ligne['visiteurNom'].'</td><td>'.$ligne['visiteurPrenom'].'</td><td>'.$ligne['visiteurEtabOrigine'].'</td><td>'.$ligne['visiteurFormActuelle'].'</td><td>'.$ligne['visiteurMail'].'</td><td>'.$ligne['formationSigle'].'</td><td>'.$ligne['formationInteresse'].'</td><td>'.$ligne['formationPostule'].'</td><td>'.$ligne['visiteurHoraire'].'</td><td>'.$ligne['visiteurRemarque'].'</td></tr>';
			 }
		 echo '</table></body></html>';
		 mysqli_free_result($search);
	 }
 }

public function viewauction()
{
	 $query = $this->db->select('visiteur.visiteurNum, visiteur.visiteurNom, visiteur.visiteurPrenom, visiteur.visiteurEtabOrigine, visiteur.visiteurFormActuelle, visiteur.visiteurMail, interesser.formationSigle, interesser.formationInteresse, interesser.formationPostule, interesser.visiteurHoraire, interesser.visiteurRemarque')->from('jpozennir.visiteur, jpozennir.interesser')->where('visiteur.visiteurNum = interesser.visiteurNum')->order_by('visiteur.visiteurNum')->get();
	 return $query->result();
}

}

?>