<?php
class M_personnel extends CI_Model
{ 

	//generation du session token


	//appel la liste du personnel
	public function list_personnel($code_str)
	{

	//ve($code_str);
		//Affichage sans declaration de nom
		//$base_url = "https://apps.education.sn/"; 

		// l'url apps.education.sn a pour nom apps
		$base_url = "apps";
		$link_url = "C_personnel_api/getIENlist_by_struct";
		$array = ["code_str" =>$code_str, "type"=>"personnel"];
		
		//ve($array);
		return apiPostData($base_url, $link_url, $array);
		//ve($array);
		
	}


}

