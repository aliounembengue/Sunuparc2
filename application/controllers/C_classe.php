<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_classe extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_classe', 'classe');
    }

	public function index()
	{
        //Recuperation de la liste des eleves
		$data['list_classe']  = $this->classe->list_classe();
		
        //Appel de la vue V_eleve en lui envoyant la liste des eleves contenus dans le tableau $data 
		$this->load->view('V_classe', $data);
    }

    
    public function add_classe()
    {
        $id_classe = $this->input->post('id_classe','');
        //Recupération des informations postées dans un tableauz
        $t_niveau = array(
            
            "libelle"            =>$this->input->post('libelle'),
        );


        // Enregistrement des informations provenant du formulaire
        // On stock les informations retournées par la methode add_eleve dans $result.
        
        //
        //On verifie si l'enregistrement a reussi
        if ( $id_niveau == null) 
        {
            $result = $this->niveau->add_niveau($t_niveau);
        }
        else 
        {
            $result = $this->niveau->update_niveau($id_niveau, $t_niveau);
        }

            echo json_encode($result, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    }

  public function delete_niveau($id_niveau)
    {
        
         //Chargement du modele
        // $this->load->model('eleve');

         //Recupération d'un enregistrement
         $result = $this->niveau->delete_niveau($id_niveau);

        echo json_encode( $result,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    }

public function recup_niveau($id_niveau)
    {
        
         //Chargement du modele
        // $this->load->model('eleve');

         //Recupération d'un enregistrement
         $result = $this->niveau->recup_niveau($id_niveau);

        echo json_encode( $result,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    }   

}
