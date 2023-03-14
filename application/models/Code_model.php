<?php 

class Code_model  extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }

    public function get_CurriculumType_All() {
        $query = $this->db->get('CLS_CURRICULUM');
        return $query->result();
    }

    public function get_EducationLevel_All() {
        $query = $this->db->get('CLS_EDUCATION_LEVEL');
        return $query->result();
    }

    public function get_GradeLevel_All() {
        $query = $this->db->get('CLS_GRADE_LEVEL');
        return $query->result();
    }

    public function get_SubjectGroup_All() {
        $query = $this->db->get('CLS_SUBJECT_GROUP');
        return $query->result();
    }

    public function get_Subject_Type_All() {
        $query = $this->db->get('CLS_SUBJECT_TYPE');
        return $query->result();
    }

    public function get_Competency_Type_All() {
        $query = $this->db->get('CLS_COMPETENCY');
        return $query->result();
    }

    /////Addschool_Model.php
    public function get_DevelopmentActivityType_All() {
        $query = $this->db->get('CLS_TEACHER_DEVELOPMENT_ACTIVITY_TYPE');
        return $query->result();
    }

}

?>