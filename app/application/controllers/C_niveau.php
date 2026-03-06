<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_niveau extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_niveau', 'niveau');
    }

	public function index()
	{
        //Recuperation de la liste des niveaus
		$data['list_niveau']  = $this->niveau->list_niveau();
		
        
        //Appel de la vue V_niveau en lui envoyant la liste des niveaus contenus dans le tableau $data 
		//ve($data);
        $this->load->view('V_niveau',$data);

    
    }

    
    public function add_niveau()
    {
      $id_niveau = $this->input->post('id_niveau');
      $str = $this->input->post('libelle');

      //suppression des espaces
      $libelle = my_trim($str, 'strict');

      $t_niveau = array(
        "libelle" => $libelle
      );


      //si le champs id_niveau n'est pas null alors c'est une modification
      //if(!empty($id_niveau))
      if($id_niveau != null)
      {
          // Enregistrement des informations provenant du formulaire
            // On stock les informations retournées par la methode add_niveau dans $result.
            $result = $this->niveau->update_niveau($id_niveau,$t_niveau);
      }
      else
      {
            $result = $this->niveau->add_niveau($t_niveau);
      }


       
      
        echo json_encode($result, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    }

       
    public function recup_niveau($id_niveau)
    {
        $result = $this->niveau->recup_niveau($id_niveau);
        
        echo json_encode($result, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);     
    }


  public function delete_niveau($id_niveau)
    {
        $result = $this->niveau->delete_niveau($id_niveau);
        
        echo json_encode($result, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
      
    }
    



   
    
   

}
