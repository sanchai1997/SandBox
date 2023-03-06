<?php 

class Curriculum_model  extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }

    public function insert_curriculum($curriculum) {    
       
        $result_curriculum = $this->db->insert('CURRICULUM', $curriculum);
        return $result_curriculum;

    }

    public function insert_curriculum_subject($CURRICULUM_SUBJECT) {

        $result_CURRICULUM_SUBJECT = $this->db->insert('curriculum_subject', $CURRICULUM_SUBJECT);
        return $result_CURRICULUM_SUBJECT;
    
    }

    public function insert_curriculum_school_competency($CURRICULUM_SCHOOl_COMPETENCY) {
        
        $result_CURRICULUM_SUBJECT = $this->db->insert('curriculum_school_competency', $CURRICULUM_SCHOOl_COMPETENCY);
        return $result_CURRICULUM_SUBJECT ;
   
    }

    public function get_Curriculum_All() {
        $query = $this->db->get('curriculum');
        return $query->result();
    }


    
}

?>