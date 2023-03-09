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

    public function get_TeacherDevelopmentActivity() {
        $query = $this->db->get_where('teacher_development_activity', array('DevelopmentActivityName ' => 'ชื่อกิจ2'));
        return $query->result();
    }
    

    
}
?>