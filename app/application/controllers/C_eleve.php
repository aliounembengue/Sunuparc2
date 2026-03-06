<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_eleve extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_eleve', 'eleve');
    }

	public function index()
	{
        //Recuperation de la liste des eleves
		$data['list_eleves']  = $this->eleve->list_eleves();
		
        //Appel de la vue V_eleve en lui envoyant la liste des eleves contenus dans le tableau $data 
		$this->load->view('V_eleve', $data);
    }

    
    public function add_eleve()
    {
        $id_eleve = $this->input->post('id_eleve');

         //Recupération des informations postées dans un tableauz
         $t_eleve = array(
            "prenom"            =>$this->input->post('prenom'),
            "nom"               =>$this->input->post('nom'),
            "lieu_naissance"    =>$this->input->post('lieu_naissance'),
            "date_naissance"    =>$this->input->post('date_naissance'),
            "sexe"              =>$this->input->post('sexe'),
            "email_eleve_pro"   =>$this->input->post('email_eleve_pro'),
            "tel_eleve"         =>$this->input->post('tel_eleve'),
        );


        if ( $id_eleve == null) // cas d'un ajout 
        {
             // Enregistrement des informations provenant du formulaire
            // On stock les informations retournées par la methode add_eleve dans $result.
            $result = $this->eleve->add_eleve($t_eleve);
        }
        else // cas d'une MAJ
        {
            $result = $this->eleve->update_eleve($id_eleve,$t_eleve);
        
        }
       


      
        echo json_encode($result, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    }

       
    public function recup_eleve($id_eleve)
    {
        $result = $this->eleve->recup_eleve($id_eleve);
        
        echo json_encode($result, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);     
    }


  public function delete_eleve($id_eleve)
    {
        $result = $this->eleve->delete_eleve($id_eleve);
        
        echo json_encode($result, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
      
    }
}
