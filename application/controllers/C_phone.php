<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_phone extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_phone', 'phone');
    }

    public function index()
    {
        
        //$t_session              = init_session();
        $session_token          = $this->session->session_token;

        $range                  = "0-100";
        $data['telephone']    = $this->phone->list_telephone($session_token,$range);
       
        $this->load->view('V_phone',$data);

		//$this->session->set_userdata("session_token", $phone->session_token);
    }
}
