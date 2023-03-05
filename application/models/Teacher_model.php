<?php

class Teacher_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }

    public function get_teacher_All() {
        $query = $this->db->get('teacher');
        return $query->result();
    }
    
}
?>