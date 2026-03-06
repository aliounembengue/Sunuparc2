<?php
class M_phone extends CI_Model
{ 

	//generation du session token


	//appel la liste des ordinateurs
	public function list_telephone($session_token,$range)
	
	{
		//$params = "computer/?app_token=".GLPI_APP_TOKEN"&"$session_token;
		$params = "phone/?app_token=".GLPI_APP_TOKEN."&session_token=".$session_token."&range=".$range;
		
		return apiGetData(GLPI_URL, $params);

		
	}


}

