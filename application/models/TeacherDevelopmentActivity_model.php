<?php

class TeacherDevelopmentActivity_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }

    public function insert_TeacherDevelopmentActivity($teacher_development_activity) {          
        $result = $this->db->insert('teacher_development_activity', $teacher_development_activity);
        return $result;

    }

    
}
?>