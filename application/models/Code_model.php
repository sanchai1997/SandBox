<?php 

class Code_model  extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }

    public function get_CurriculumType_All() {
        $query = $this->db->get('cls_curriculum');
        return $query->result();
    }

    public function get_EducationLevel_All() {
        $query = $this->db->get('cls_education_level');
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
        $query = $this->db->get('cls_competency');
        return $query->result();
    }

    /////Addschool_Model.php
    public function get_DevelopmentActivityType_All() {
        $query = $this->db->get('cls_teacher_development_activity_type');
        return $query->result();
    }

}

?>