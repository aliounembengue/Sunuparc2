<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_personnel extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_personnel', 'perso');
    }

    public function index()
    {
     
		$code_str = "1290902230";
		
        $data['personnel']    = $this->perso->list_personnel($code_str);
		
        $this->load->view('V_personnel',$data);

    }

   /*
	public function recup_personnel()
    {
     
		$code_str = "1290902230";
		
        $result    = $this->perso->recup_personnel($code_str);
		
        
        echo json_encode($result, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);

    }*/
}
