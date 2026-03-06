<?php
class M_personnel extends CI_Model
{ 

	//generation du session token


	//appel la liste du personnel
	public function list_personnel($code_str)
	{

	//ve($code_str);
		
		//$base_url = "https://apps.education.sn/";
		$base_url = "apps";
		$link_url = "C_personnel_api/getIENlist_by_struct";
		$array = ["code_str" =>$code_str, "type"=>"personnel"];
		
		//ve($array);
		return apiPostData($base_url, $link_url, $array);
		//ve($array);
		
	}

	public function recup_personnel($code_str)
	{

	//ve($code_str);
		
		//$base_url = "https://apps.education.sn/";
		$base_url = "apps";
		$link_url = "C_personnel_api/getIENlist_by_struct";
		$array = ["code_str" =>$code_str, "type"=>"personnel"];
		
		//recuperation de la liste du personnel via l'api
		$personnel = apiPostData($base_url, $link_url, $array);

		//Stockage des données dans un tableau
		$t_personnel = array();
		foreach ($personnel as $perso) 
		{ 
			$t_personnel[] = array(
			'ien' => $perso->ien_ens,
			'nom' => $perso->nom_ens,
			'prenom' => $perso->prenom_ens,
			'tel' => $perso->tel_ens,
			'mail' => $perso->email_ens_pro,
			'sexe' => $perso->sexe_ens );
				
		}
		ve($t_personnel);
		
	}


}

