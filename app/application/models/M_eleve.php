<?php
class M_eleve extends MY_Model
{ 
	public $id_eleve;
    public $prenom;
    public $nom;
    public $sexe;
    public $date_naissance;
    public $lieu_naissance;
    public $tel_eleve;
    public $email_eleve_pro;


	
	public function get_db_table(){
		return 'eleve';
	}

	public function get_db_table_pk(){
		return 'id_eleve';
	}
	
	
	
	public function list_eleves()
	{
		$sql = "SELECT * FROM eleve";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function add_eleve($t_eleve)
	{
		//Verification si le tableau n'est pas vide
		if (!empty ($t_eleve)) 
		{
			$this->db->insert("eleve", $t_eleve);

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

	
	public function delete_eleve($id)
	{
		//ve($id);
		//supprimer une information
			//$sql = "DELETE FROM eleve WHERE id_eleve = $id ";
			//$this->db->query($sql);

			 $this->db->where('id_eleve', $id)
		     		->delete('eleve');

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
	
	
	public function update_eleve($id_eleve,$t_eleve)
	{

		$this->db->where('id_eleve',$id_eleve)
				  ->update('eleve',$t_eleve);

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

	public function recup_eleve($id_eleve)
	{
		/*
		$sql = "SELECT * FROM eleve WHERE id_eleve = $id_eleve";
		$query = $this->db->query($sql);
		return $query->row();
		*/

		$result = $this->db->select('*')
							->from("eleve")
							->where('id_eleve',$id_eleve)
							->get()
							->row();
		return $result;

	}

}

