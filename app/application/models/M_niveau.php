<?php
class M_niveau extends MY_Model
{ 
	public $id_niveau;
    public $libelle;

	
	public function get_db_table(){
		return 'niveau';
	}

	public function get_db_table_pk(){
		return 'id_niveau';
	}
	
	
	
	public function list_niveau()
	{
		$sql = "SELECT * FROM niveau";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function add_niveau($t_niveau)
	{
		//Verification si le tableau n'est pas vide
		if (!empty ($t_niveau)) 
		{
			$this->db->insert("niveau", $t_niveau);

			//Si l'insertion a reussi
			if($this->db->affected_rows() > 0)
			{
				return array(
					'status' => 'success',
					'message' => 'Enregistrement effectué avec succès',
				);
			}
			else 
			{
				return array(
					'status' => 'error',
					'message' => 'Erreur lors de l\'enregistrement'
				);
			}
		}
		
	}

	
	public function delete_niveau($id)
	{
		//ve($id);
		//supprimer une information
			//$sql = "DELETE FROM eleve WHERE id_eleve = $id ";
			//$this->db->query($sql);

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

		//Si la modification a reussi
		if($this->db->affected_rows() >= 0)
		{
			return array(
				'status' => 'success',
				'message' => 'modification effectuée avec succès',
			);
		}
		else 
		{
			return array(
				'status' => 'error',
				'message' => 'Erreur lors dela modification',
			);
		}

	}

	public function recup_niveau($id_niveau)
	{
		/*
		$sql = "SELECT * FROM eleve WHERE id_eleve = $id_eleve";
		$query = $this->db->query($sql);
		return $query->row();
		*/

		$result = $this->db->select('*')
							->from("niveau")
							->where('id_niveau',$id_niveau)
							->get()
							->row();
		return $result;

	}

}

