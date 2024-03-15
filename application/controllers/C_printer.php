<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_printer extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_printer', 'printer');
    }

    public function index()
    {
        
        //$t_session              = init_session();
        $session_token          = $this->session->session_token;
        $range                  = "0-200";
        $data['printers']    = $this->printer->list_printer($session_token,$range);

       
        $this->load->view('V_printer',$data);

		//$this->session->set_userdata("session_token", $printer->session_token);
    }
}
