<?php 

class Curriculum_model  extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }

    public function add_curriculum($curriculum) {    
       
        $result_curriculum = $this->db->insert('CURRICULUM', $curriculum);
        if( $result_curriculum == 1 ){
            $CURRICULUM_ID = $this->db->insert_id(); 
            return  $CURRICULUM_ID ;
        }else{
            return -1;
        }
    }

    public function add_curriculum_subject($CURRICULUM_SUBJECT) {

        $result_CURRICULUM_SUBJECT = $this->db->insert('curriculum_subject', $CURRICULUM_SUBJECT);
        return $result_CURRICULUM_SUBJECT;
    
    }

    public function add_curriculum_school_competency($CURRICULUM_SCHOOl_COMPETENCY) {
        
        $result_CURRICULUM_SUBJECT = $this->db->insert('curriculum_school_competency', $CURRICULUM_SCHOOl_COMPETENCY);
        return $result_CURRICULUM_SUBJECT ;
   
    }


    
}

?>