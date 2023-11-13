$id_niveau = $this->input->post('id_niveau');
        $str = $this->input->post('libelle');
        $libelle = my_trim($str,'strict');
       
         //Recupération des informations postées dans le tableau
         $t_niveau = array(
            "libelle"            =>$libelle,

        );


        if ( $id_niveau == null) // cas d'un ajout 
        {
             // Enregistrement des informations provenant du formulaire
            // On stock les informations retournées par la methode add_niveau dans $result.
            $result = $this->niveau->add_niveau($t_niveau);
        }
        else // cas d'une MAJ
        {
            $result = $this->niveau->update_niveau($id_niveau,$t_niveau);
        
        }