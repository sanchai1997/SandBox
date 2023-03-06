<?php 

class Code_model  extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }

    public function get_CurriculumType_All() {
        $query = $this->db->get('curriculum_type');
        return $query->result();
    }

    public function get_EducationLevel_All() {
        $query = $this->db->get('Education_Level');
        return $query->result();
    }

    public function get_GradeLevel_All() {
        $query = $this->db->get('Grade_Level');
        return $query->result();
    }

    public function get_SubjectGroup_All() {
        $query = $this->db->get('Subject_Group');
        return $query->result();
    }

    public function get_Subject_Type_All() {
        $query = $this->db->get('subject_type');
        return $query->result();
    }

    public function get_Competency_Type_All() {
        $query = $this->db->get('Competency');
        return $query->result();
    }

    /////Addschool_Model.php
    public function get_DevelopmentActivityType_All() {
        $query = $this->db->get('development_activity_type');
        return $query->result();
    }

}

?>