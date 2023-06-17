<?php 

class Eportfolio_model  extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }

#######################eportfolio
    public function insert_eportfolio($eportfolio) {
       
        $result_eportfolio = $this->db->insert('EPORTFOLIO', $eportfolio);

        if($result_eportfolio == 1){
            $eportfolio_id = $this->db->insert_id();
            return $eportfolio_id;
        }else{
            return -1;
        }

    }
    
    public function get_EPORTFOLIO_ALL() {
        $this->db->select('*')
        ->where('DeleteStatus ', 0  ) 
        ->from('EPORTFOLIO');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_EPORTFOLIO($EPORTFOLIO_ID) {
        $this->db->select('*')
        ->from('EPORTFOLIO')
        ->where('EPORTFOLIO_ID',$EPORTFOLIO_ID);
        $query = $this->db->get();
        return $query->result();
    }
    public function update_EPORTFOLIO($EPORTFOLIO_ID,$eportfolio){
        $this->db->where('EPORTFOLIO_ID ', $EPORTFOLIO_ID);
        $result = $this->db->update('EPORTFOLIO',$eportfolio);
        return $result;
    }
    public function delete_eportfolio($EPORTFOLIO_ID){   
        $data = [
            'EPORTFOLIO_ID' => Date('YmdHis'),
            'DeleteStatus' => 1
        ];
        $this->db->where('EPORTFOLIO_ID', $EPORTFOLIO_ID);
            
        $result = $this->db->update('EPORTFOLIO', $data);
        show_error($this->db->last_query());

        return $result;
    }

    public function get_EPORTFOLIO_by_STUDENT_NO($STUDENT_NO) {
        $this->db->select('*')
        ->where('DeleteStatus ', 0  ) 
        ->where('STUDENT_NO ', $STUDENT_NO  ) 
        ->from('EPORTFOLIO');
        $query = $this->db->get();
        return $query->result();
    }

################ project
    public function insert_STUDENT_PROJECT($STUDENT_PROJECT) {
        $result = $this->db->insert('STUDENT_PROJECT', $STUDENT_PROJECT);
        return $result;
    }   
    
############### Goodness
    public function insert_STUDENT_GOODNESS($STUDENT_GOODNESS) {
        $result = $this->db->insert('STUDENT_GOODNESS', $STUDENT_GOODNESS);
        return $result;
    }  
    
}

?>