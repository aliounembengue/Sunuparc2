<?php


//API Post generic

function apiPostData($base_url, $link_url, $array = array(), $type = 'json', $authorization = false, $credential = NULL)
    {
        $url = $base_url.$link_url;

        $content =  $type == 'json' ? json_encode($array) : $content = $array;

        if($authorization == true)
        {
            $auth_type  = $credential['auth_type'];
            $token      = $credential['token'];

            $options = array(
                'http' => array(
                    'method' => 'POST',
                    'content' => $content,
                    'header' => ["Content-Type: application/json\r\n" . "Accept: application/json\r\n" . "Authorization: ".$auth_type." ".$token]
                ),
                "ssl" => array("verify_peer"=>false, "verify_peer_name"=>false)
            );
        }
        else
        {
            $options = array(
                'http' => array(
                    'method' => 'POST',
                    'content' => $content,
                    'header' => "Content-Type: application/json\r\n" . "Accept: application/json\r\n"
                ),
                "ssl" => array("verify_peer"=>false,"verify_peer_name"=>false)
            );
        }
        //ve($options);
        try
        {
            if($type == 'array') //send array POST
            {
                try{
                    
                    $result = file_get_contents($url, false, stream_context_create($options));

                    $result = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $result);

                    return json_decode($result, true);
                }
                catch(Exception $e){
                     return [];
                }
            }
            else if($type == 'json') //send json POST
            {
                try{   
                                                     
                    $result = file_get_contents($url, true, stream_context_create($options));

                    $result = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $result);

                    return json_decode($result);
                }
                catch(Exception $e){
                    return [];
                }
            }
            else
                return [];
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }


function apiPostData_($base_url, $link_url, $array = array(), $type = 'json')
{
	
    try{
        $url = api_base_url($base_url).$link_url;
        if($type == 'array') //send array POST
        {
            try{
                $options = array(
                    'http' => array(
                        'method' => 'POST',
                        'content' => $type,
                        'header' => "Content-Type: application/json\r\n" .
                            "Accept: application/json\r\n"
                    ),
                    "ssl" => array(
                        "verify_peer"=>false,
                        "verify_peer_name"=>false
                    )
                );

                $result = file_get_contents($url, false, stream_context_create($options));

                $result = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $result);

                return json_decode($result, true);
            }
            catch(Exception $e){
                return [];
            }
        }
        else if($type == 'json') //send json POST
        {
            try{
                $json = json_encode($array);
                $options = array(
                    'http' => array(
                        'method' => 'POST',
                        'content' => $json,
                        'header' => "Content-Type: application/json\r\n" . "Accept: application/json\r\n"
                    ),
                    "ssl" => array(
                        "verify_peer"=>false,
                        "verify_peer_name"=>false
                    )
                );
				ve($base_url,$link_url,$array);

                $result = file_get_contents($url, false, stream_context_create($options));
				
				
                $result = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $result);

                return json_decode($result);
            }
            catch(Exception $e){
                return [];
            }
        }
        else
            return [];
    }
    catch(Exception $e){
        return [];
    }
}

function apiGetData($base_url, $params, $authorization = false, $credential = [])
{
	
    try{
        $url = $base_url . $params;
        
        $result = "";

        if($authorization == true)
        {
            $login      = $credential['login'];
            $password   = $credential['password'];
            $auth_type  = $credential['auth_type'];

            $context = stream_context_create(array(
                'http'  => array('header' => "Authorization: ".$auth_type." " . base64_encode($login.":".$password))
            ));
    
            $result = file_get_contents($url, false, $context);
        }
        else
        {
            $context = stream_context_create(array(
                "ssl"   => array("verify_peer" => false, "verify_peer_name" => false)
            ));

            $result = file_get_contents($url, false, $context);
        }
        
        $result = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $result);

        return json_decode($result);
    }
    catch(Exception $e){
        return [];
    }

}

//initialisation de la session 
function init_session()
{
    //$params = "initSession/?app_token=GLPI_APP_TOKEN";
    $params = "initSession/?app_token=".GLPI_APP_TOKEN;

   /* $credential['login']        = $glpi_user;
    $credential['password']     = $glpi_pwd;
    $credential['auth_type']    = $glpi_auth_type;
    */

    $credential = array(
        'login'=>GLPI_USER,
        'password'=>GLPI_PWD,
        'auth_type'=>GLPI_AUTH_TYPE
    );

    //appel API connexion 
  
    return apiGetData(GLPI_URL, $params, TRUE, $credential);
}

