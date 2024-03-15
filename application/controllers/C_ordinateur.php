<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_ordinateur extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_ordinateur', 'ordi');
    }

    public function index()
    {
        
       // $t_session              = init_session();
	    $session_token          = $this->session->session_token;
        $range                  = "0-200";
        $data['ordinateurs']    = $this->ordi->list_ordinateur($session_token,$range);
		
        

        $this->load->view('V_ordinateur',$data);

    }
}
