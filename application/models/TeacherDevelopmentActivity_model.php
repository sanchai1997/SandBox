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

    
    public function get_TeacherDevelopmentActivityAll() {
        $query = $this->db->get('teacher_development_activity');
        return $query->result();
    }

    public function get_TeacherDevelopmentActivity($TeacherDevelopmentActivityName) {
        $this->db->from('teacher_development_activity');
        $this->db->where('DevelopmentActivityName', $TeacherDevelopmentActivityName);
        $query = $this->db->get();
        
        return $query->result();
    }
    

    
}
?>