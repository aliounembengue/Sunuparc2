<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_absence extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_absence', 'abs');
    }

	public function index()
	{
		$data['abs_rtr']  = $this->abs->list_absence_retard($this->session->ien, $this->session->code_annee);
		
		$this->load->view('cours/V_absence_retard', $data);
	}
}