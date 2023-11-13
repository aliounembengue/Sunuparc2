<?php
class M_classe extends MY_Model
{ 
	public $id_niveau;
	public $libelle;
	/*public $id_eleve;
    public $prenom;
    public $nom;
    public $sexe;
    public $date_naissance;
    public $lieu_naissance;
    public $tel_eleve;
    public $email_eleve_pro;
	*/


	
	public function get_db_table(){
		return 'classe';
	}

	public function get_db_table_pk(){
		return 'id_classe';
	}
	
	
	
	public function list_classe()
	{
		$sql = "SELECT * FROM classe";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function add_niveau($t_niveau)
	{
		//Verification si le tableau n'est pas vide
			if(!empty ($t_niveau))
			{
				
				//Si l'insertion a reussi
				if ($this->db->insert('niveau', $t_niveau) > 0) 
				{
					return array(
						'status' => 'success',
						'message' => 'Suppression effectuée avec succès',
					);
				}
				else 
				{
					return array(
						'status' => 'error',
						'message' => 'Erreur lors dela suppression',
					);
				}

				}
				
	}

	
	public function delete_niveau($id)
	{

			 $this->db->where('id_niveau', $id)
		     		->delete('niveau');

			 	//Si la suppression a reussi
			if($this->db->affected_rows() > 0)
			{
				return array(
					'status' => 'success',
					'message' => 'Suppression effectuée avec succès',
				);
			}
			else 
			{
				return array(
					'status' => 'error',
					'message' => 'Erreur lors dela suppression',
				);
			}
	}
	
	
	public function update_niveau($id_niveau,$t_niveau)
	{
		
		$this->db->where('id_niveau',$id_niveau)
			 	 ->update('niveau',$t_niveau);

		if($this->db->affected_rows() >=0) 
		{
			return array(
				'status' => 'success',
				'message' => 'Suppression effectuée avec succès',
			);
		}
		else 
		{
			return array(
				'status' => 'error',
				'message' => 'Erreur lors dela suppression',
			);
		}
	}


		public function recup_niveau($id_niveau)
		{
	
		$result =	$this->db->select('*')
						 ->from('niveau')
						 ->where('id_niveau', $id_niveau)
						 ->get()
						 ->row();
		
		return $result;



	}


}

