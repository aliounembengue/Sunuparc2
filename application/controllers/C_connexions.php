<?php
class C_connexions extends CI_Controller {
	public function __construct()
	{		
		parent::__construct();	
	    //initialisation de la session	
		$this->load->library('session');
		$this->load->helper('url');
		
		$this->load->model('M_connexions', 'conn');
	}
	
	
	public function __authentication()
	{
		//si le email et le pwd ne sont pas vides 
		if(!empty($this->input->post('email')) && !empty($this->input->post('password')))
		{
			
			//ve($this->input->post('email'));
			//authentification de l'utilisateur
			$user = $this->conn->authentication($this->input->post('email'), $this->input->post('password'));
			//var_dump($user);
			//exit;
		
			//si le couple login et pwd ne sont pas dans la Base il renvoie null
			if($user == NULL)
			{
				//message d'alerte pour indique login & MDP incorrect 
				$message= "Login ou Mot de Passe incorrect";
				$this->session->set_flashdata("message",$message);
				//renvoie dans le page par defaut
				header("Location:".base_url());
			}
			   else
			{
			
				//recuperation avatar 

				if ($user->sexe == 'F')
				{
					$photo = "images/f.png";

				}else
				{
					$photo = "images/jules.png";
				}

				// creation de la session 

			
				$this->session->set_userdata("id_utilisateur", $user->id_utilisateur);
				$this->session->set_userdata("nom", $user->nom);
				$this->session->set_userdata("prenom", $user->prenom);
				$this->session->set_userdata("id_profil", $user->id_profil);
				$this->session->set_userdata("photo", $photo);
				$this->session->set_userdata("libelle_profil", $user->libelle_profil);
				
				//on lance la page par defaut de l'application ie le dashboard 
				header("Location:".base_url()."dashboard");
			}			
		}
	}
	
	//Authentification via API

	public function authentication()
	{
		//si le email et le pwd ne sont pas vides 
		if(!empty($this->input->post('email')) && !empty($this->input->post('password')))
		{
			$login = $this->input->post('email');
			$pwd = $this->input->post('password');
			

			//ve($this->input->post('email'));
			//authentification de l'utilisateur
			$user = $this->conn->init_session($login, $pwd);
			//$user = $this->conn->authentication($login, $pwd);
			//ve($user);
			//exit;
		
			//si le couple login et pwd ne sont pas dans la Base il renvoie null
			if($user == NULL)
			{
				//message d'alerte pour indique login & MDP incorrect 
				$message= "Login ou Mot de Passe incorrect";
				$this->session->set_flashdata("message",$message);
				//renvoie dans le page par defaut
				header("Location:".base_url());
			}
			   else
			{
			
				//recuperation avatar 

				if ($user->sexe == 'F')
				{
					$photo = "images/f.png";

				}else
				{
					$photo = "images/jules.png";
				}

				// creation de la session 

			
				$this->session->set_userdata("id_utilisateur", $user->session->glpiID);
				$this->session->set_userdata("nom", $user->session->glpirealname);
				$this->session->set_userdata("prenom", $user->session->glpifirstname);
				$this->session->set_userdata("session_token", $user->session_token);

				//$this->session->set_userdata("id_profil", $user->id_profil);
				$this->session->set_userdata("photo", $photo);
				//$this->session->set_userdata("libelle_profil", $user->libelle_profil);
				
				//on lance la page par defaut de l'application ie le dashboard 
				header("Location:".base_url()."dashboard");
			}			
		}
	}
	
	//deconnexion
	public function deconnexion()
	{			
		// destruction des donnees de la session
		$this->session->sess_destroy();
		header("Location:".base_url());
	}

}
