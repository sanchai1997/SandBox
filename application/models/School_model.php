<?php

class School_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }

    public function get_school_All() {
        $query = $this->db->get('School');
        return $query->result();
    }
    
}
    
?>
