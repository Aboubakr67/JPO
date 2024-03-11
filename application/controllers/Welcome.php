<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// définion d’une classe en PHP qui va être associée à un héritage
class Welcome extends CI_Controller
{
 	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url_helper');
		$this->load->model('model','requetes');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}

	public function index()
	{
		// $this->load->helper('url_helper');// Charger des foncons pour gérer les URL
		$this->load->view('entete'); // créer entete.php dans le dossier views
		$this->load->view('menu'); // créer menu.php dans le dossier views
		$this->load->view('accueil');
		//$dataF['resultat'] = $this->requetes->getNomFormations();
		//$this->load->view('formulaire',$dataF); // créer affichage.php dans le dossier views
		$dataC['clients'] = $this->requetes->getClients();
		$this->load->view('piedpage',$dataC); // créer piedpage.php dans le dossier views
	}

	public function contenu($id)
	{
		//$dataF['resultat'] = $this->requetes->getNomFormations();
		$this->load->helper('url_helper');// Charger des foncons pour gérer les URL
		$this->load->view('entete');
		$this->load->view('menu');

		if($id=="accueil")
		{
			$this->load->view('accueil');
		}
		
		if($id=='visite')
		{
			$dataF['resultat'] = $this->requetes->getNomFormations();
			$this->load->view('visite',$dataF);
		}

		if ($id=="formulaire")
		{
			$this->load->view('formulaire');
		}

		if($id=='connexion')
		{
			$this->load->view('Connexion');
		}

		if($id=='mentions-legales')
		{
			$this->load->view('mentions-legales');
		}

		// if($id=='statistiques')
		// {
		// 	$dataS['model'] = $this->requetes->afficheVisiteurs();
		// 	$this->load->view('statistiques', $dataS);
		// }


				// if($id=="Accueil")
				// 	$this->load->view('entete'); // Créer une vue entete.php dans VIEWS
				// else
				// 	$this->load->view('formulaire',$dataF);
		$dataC['clients'] = $this->requetes->getClients();
		$this->load->view('piedpage',$dataC);  
	}



	public function validation() 
	{	 
	  $this->form_validation->set_rules('sigleFormation', '"Le sigle"', '');
	  $this->form_validation->set_rules('nom', '"Le Nom"', 'trim|required');//|xss_clean');
	  $this->form_validation->set_rules('prenom', '"Le prenom"', 'trim|required');
	  $this->form_validation->set_rules('etabOrigine', '"L etablissement origine"', 'trim|required');
	  $this->form_validation->set_rules('formActuelle', '"La formation actuelle"', 'trim|required');
	  $this->form_validation->set_rules('mail', '"Le mail"', 'trim|required|valid_email');
	  $this->form_validation->set_rules('interresse', '"interresse"');
	  $this->form_validation->set_rules('voulez_vous', '"Le voulez_vous"');
	  $this->form_validation->set_rules('remarque', '"La remarque"');


		$this->load->view('enTete'); // créer un fichier enTete.php dans le répertoire views
		$this->load->view('menu'); // créer un fichier menu.php dans le répertoire views
		
		if ($this->form_validation->run() == FALSE)
		{ 
			$data['texte']='Erreur dans le formulaire, veuillez réessayer';
			$this->load->view('resultat',$data); // créer resultat.php dans le répertoire views
        } 
        else
		{ 
			// 1ere insertion
			$sigle=strip_tags($this->input->post('sigleFormation'));
			$nom = strip_tags($this->input->post('nom'));
			$prenom = strip_tags($this->input->post('prenom'));
			$etabOrigine = strip_tags($this->input->post('etabOrigine'));
			$formActuelle = strip_tags($this->input->post('formActuelle'));
			$mail = strip_tags($this->input->post('mail'));

				// 2 eme insertion
			$interresse = strip_tags($this->input->post('interresse'));
			$voulez_vous = strip_tags($this->input->post('voulez_vous'));
			$remarque = strip_tags($this->input->post('remarque'));

			$this->requetes->setEtudiant($nom,$prenom,$etabOrigine,$formActuelle,$mail);
			
			$vNum = $this->requetes->recupNumVisiteur($nom,$prenom,$etabOrigine,$formActuelle,$mail);

			foreach($vNum as $row)
			{
				$visiteurNum= $row['visiteurNum'];
			}

			$this->requetes->setInteresse($visiteurNum,$sigle,$interresse,$voulez_vous,$remarque);

			$data['texte']='Authentification réussi, merci !';
			$this->load->view('resultat',$data); // créer resultat.php dans le répertoire views
        }

		$data['clients']= $this->requetes->getClients();
		$this->load->view('piedPage',$data); // Vue piedPage à créer dans le dossier VIEWS 
 	 
	}

	public function statistiques()
	{
		$this->form_validation->set_rules('idStats', '"Le Id"', 'trim|required');
	  	$this->form_validation->set_rules('mdpStats', '"Le Mdp"', 'trim|required');

		$this->load->view('enTete'); // créer un fichier enTete.php dans le répertoire views
		$this->load->view('menu'); // créer un fichier menu.php dans le répertoire views


		if ($this->form_validation->run() == FALSE)
		{ 
			//$mdp = $this->input->post('mdp');
			$data['texte']='Erreur dans la saisie, veuillez réessayer';
        } 
        else
		{
			$identifiant = $this->input->post('idStats');
			$mdp = $this->input->post('mdpStats');

			$dataS['statistiques'] = $this->requetes->verifIdStats($identifiant,$mdp);

			foreach($dataS['statistiques'] as $row)
			{
				$num = $row['nombre'];
			}

			if ($num == 0)
			{
				$this->load->view('connexion');
				$this->load->view('connexionWrong');
			}
			else
			{
				$this->load->view('statistiques',$dataS);
			}

		}

		$this->load->view('piedPage'); // Vue piedPage à créer dans le dossier VIEWS 

	}

}

?>