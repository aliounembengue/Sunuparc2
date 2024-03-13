<?php
class M_connexions extends MY_Model {


	public function get_db_table(){
		return '';
	}

	public function get_db_table_pk(){
		return '';
	}


	public function init_session ($login,$password)
	{
		if(!defined('GLPI_URL'))
		{
			define('GLPI_URL', "https://sunuparc.education.sn/apirest.php/");
			define('GLPI_APP_TOKEN', "sViUhaQQvlwyi8Ous5lmzYPhR3WwTzzVBblCdPo4");
			define('GLPI_AUTH_TYPE', "Basic");
		}

		//$params = "computer/?app_token=".GLPI_APP_TOKEN"&"$session_token;
		$params = "initSession/?get_full_session=true&app_token=".GLPI_APP_TOKEN;
		
		$credential = array(
			'login'=>$login,
			'password'=>$password,
			'auth_type'=>GLPI_AUTH_TYPE
		);
	
		//appel API connexion 
	  
		return apiGetData(GLPI_URL, $params, TRUE, $credential);
	
		
	}


	//Recupération année en cours
	public function get_annne_encours()
    {
	 	return  $this->dbm->select()
					->from('param_annee_scolaire')
					->where('etat_en_cours', '1')
					->get()
					->row();
    }
	
	
	public function code_annee()
    {
		return 2023;

        $result =  $this->dbm->select()
					->from('param_annee_scolaire')
					->where('etat_en_cours', '1')
					->get()
					->row();
		return $result->code_annee;
    }

	public function authentication($email, $pwd)
	{		
		$req = "SELECT user.id_utilisateur, prof.prenom, prof.nom , prof.sexe ,  pr.id_profil, pr.libelle_profil 
		FROM  utilisateur as user 
		INNER JOIN profil as pr ON pr.id_profil = user.id_profil
		INNER JOIN professeur as prof ON prof.id_professeur = user.id_professeur
                        where user.login = ?
                        AND user.pwd = ?";

		$query = $this->db->query($req, array($email, $pwd));
		return $query->row();
	}

}
