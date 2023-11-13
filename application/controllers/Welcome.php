<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		//charger vue sign-in.php qui se trouve dans le dossier views / 
		$this->load->view('sign-in');
	}
}
