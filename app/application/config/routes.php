<?php
defined('BASEPATH') OR exit('No direct script access allowed');



//$route['default_controller'] = 'welcome';
//$route['404_override'] = '';
//$route['translate_uri_dashes'] = FALSE;

$route['default_controller'] = 'welcome';
$route['sign-in'] 			= 'Welcome/index';
$route['auth'] 				= 'C_connexions/authentication';
$route['deconnexion'] 	    = 'C_connexions/deconnexion';
$route['dashboard'] 	    = 'Accueil/home';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
