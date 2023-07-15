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

        $this->db->from('CLS_EDUCATION_LEVEL')
        ->where('ACTION', 1 );
        
        $query = $this->db->get();
    
        return $query->result();
    }

    public function get_GradeLevel_All() {
        $this->db->from('CLS_GRADE_LEVEL')
        ->where('ACTION=1 OR ACTION=2' );
        
        $query = $this->db->get();
    
        return $query->result();
    }

    public function get_GradeLevel_All_LC() {
        $year = array('211', '212', '213','214', '215', '216','311', '312', '313','411', '412', '413');

        $this->db->from('CLS_GRADE_LEVEL')
        ->where_in('GRADE_LEVEL_CODE', $year);
        
        $query = $this->db->get();
    
        return $query->result();
    }

    public function get_GradeLevel($GRADE_LEVEL_CODE) {
        $this->db->from('CLS_GRADE_LEVEL')
        ->where('GRADE_LEVEL_CODE',$GRADE_LEVEL_CODE );
        
        $query = $this->db->get();
    
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