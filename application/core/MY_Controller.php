<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$temp = $this->the_session_expired();

		//base url des API
		if(!defined('GLPI_URL'))
		{
			define('GLPI_URL', "https://sunuparc.education.sn/apirest.php/");
			//define('GLPI_USER', "simen");
			//define('GLPI_PWD', "simen@123");
			define('GLPI_APP_TOKEN', "sViUhaQQvlwyi8Ous5lmzYPhR3WwTzzVBblCdPo4");
			define('GLPI_AUTH_TYPE', "Basic");
		}

	}

	private function the_session_expired()
	{

		$id_utilisateur	= $this->session->id_utilisateur;

		//si la session n'existe pas 
		if(empty($id_utilisateur))
		{
			$this->session->sess_destroy();

			$message= "Votre session est expirée";
			$this->session->set_flashdata("message",$message);
			header("Location:".base_url());
			exit();
		}
		//sinon on retourne true
		else
		{
			return 1;
		}
	}
}

