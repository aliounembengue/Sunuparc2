<?php
class M_ordinateur extends CI_Model
{ 

	//generation du session token


	//appel la liste des ordinateurs
	public function list_ordinateur($session_token,$range)
	{
		//$params = "computer/?app_token=".GLPI_APP_TOKEN"&"$session_token;
		$params = "computer/?app_token=".GLPI_APP_TOKEN."&session_token=".$session_token."&range=".$range;



		return apiGetData(GLPI_URL, $params);

		
	}


}

