<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends MY_Controller {

	public function home()
	{
		$this->load->view("template/layout");
	}
}


