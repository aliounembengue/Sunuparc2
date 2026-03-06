 <?php
    class queries extends CI_Model{
        
        public function getPosts(){
           $query = $this->db->get('tbl_posts');
#            if($query->num_row() > 0){
                return $query->result();
            }
        }
    # }
 ?>

