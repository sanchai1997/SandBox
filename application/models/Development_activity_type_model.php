<?php

class Development_activity_type_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }

    public function insert_DevelopmentActivityType($teacher_development_activity) {          
        $result_Development_activity_type = $this->db->insert('development_activity_type', $teacher_development_activity);
        return $result_Development_activity_type;

    }
    public function get_DevelopmentActivityType_All() {
        $query = $this->db->get('development_activity_type');
        return $query->result();
    }
    
}
?>