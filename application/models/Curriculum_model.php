<?php 

class Curriculum_model  extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }

###################### curriculum ################################
    public function insert_curriculum($curriculum) {    
       
        $result_curriculum = $this->db->insert('CURRICULUM', $curriculum);
        return $result_curriculum;

    }

    public function get_Curriculum_All() {
        $this->db->select('c.*, s.SchoolNameThai, ct.CURRICULUM_NAME, e.EDUCATION_LEVEL_CODE, g.GRADE_LEVEL_NAME')
        ->from('curriculum c')
        ->join('school s', 's.SchoolID   = c.SchoolID  ', 'LEFT') 
        ->join('cls_curriculum ct', 'ct.CURRICULUM_CODE    = c.CurriculumCode   ', 'LEFT') 
        ->join('cls_education_level e', 'e.EDUCATION_LEVEL_CODE     = c.EducationLevelCode    ', 'LEFT') 
        ->join('CLS_GRADE_LEVEL g', 'g.GRADE_LEVEL_CODE    = c.GradeLevelCode   ', 'LEFT') ;
       
        $query = $this->db->get();

       // $query = $this->db->get('curriculum');
        return $query->result();
    }

    public function get_Curriculum( $CurriculumID) {
        $this->db->from('curriculum')
        ->where('CurriculumID', $CurriculumID );
        $query = $this->db->get();
    
        return $query->result();
    }

    public function update_curriculum($Old_CurriculumID, $curriculum) {
        $this->db->where('CurriculumID', $Old_CurriculumID);
        $result = $this->db->update('curriculum', $curriculum);
        return $result;
    
    }



###################### curriculum_subject ################################
    public function insert_curriculum_subject($CURRICULUM_SUBJECT) {

        $result_CURRICULUM_SUBJECT = $this->db->insert('curriculum_subject', $CURRICULUM_SUBJECT);
        return $result_CURRICULUM_SUBJECT;
    
    }

    public function get_CurriculumSubject_All($CurriculumID) {
        $this->db->select('cs.*,st.SUBJECT_TYPE_NAME, sg.SUBJECT_GROUP_NAME')
        ->from('curriculum_subject cs')
        ->join('CLS_SUBJECT_TYPE st', 'st.SUBJECT_TYPE_CODE   = cs.SubjectTypeCode  ', 'LEFT') 
        ->join('CLS_SUBJECT_GROUP sg', 'sg.SUBJECT_GROUP_CODE   = cs.SubjectGroupCode  ', 'LEFT') 
        ->where('CurriculumID ', $CurriculumID  ) ;
        
        //$this->db->from('curriculum_subject');
        //$this->db->where('CurriculumID', $CurriculumID );
        $query = $this->db->get();
    
        return $query->result();
    }

    public function get_CurriculumSubject( $CurriculumID, $SubjectCode) {
        $this->db->from('curriculum_subject')
        ->where('CurriculumID', $CurriculumID )
        ->where('SubjectCode ', $SubjectCode  ) ;
        $query = $this->db->get();
    
        return $query->result();
    }

    public function update_curriculum_subject($CurriculumID, $SubjectCode, $CURRICULUM_SUBJECT) {
        $this->db->where('CurriculumID', $CurriculumID)
                ->where('SubjectCode ', $SubjectCode  ) ;
        $result_CURRICULUM_SUBJECT = $this->db->update('curriculum_subject', $CURRICULUM_SUBJECT);
        return $result_CURRICULUM_SUBJECT;
    
    }

###################### curriculum_school_competency ################################
    public function insert_curriculum_school_competency($CURRICULUM_SCHOOl_COMPETENCY) {
        
        $result_CURRICULUM_SUBJECT = $this->db->insert('curriculum_school_competency', $CURRICULUM_SCHOOl_COMPETENCY);
        return $result_CURRICULUM_SUBJECT ;

    }

    public function get_CurriculumCompetency_All($CurriculumID, $SubjectCode ) {
        $this->db->select('cs.*, c.*')
        ->from('curriculum_school_competency cs')
        ->join('cls_competency c', 'c.COMPETENCY_CODE  = cs.CompetencyCode ', 'LEFT') 
        ->where('CurriculumID ', $CurriculumID  ) 
        ->where('SubjectCode ', $SubjectCode  ) ;

       // $this->db->from('curriculum_school_competency');
      //  $this->db->where('SubjectCode ', $SubjectCode  );
        $query = $this->db->get();
    
        return $query->result();
    }
    
    public function get_CurriculumCompetency( $CurriculumID, $SubjectCode, $CompetencyCode) {
        $this->db->from('curriculum_school_competency')
        ->where('CurriculumID', $CurriculumID )
        ->where('SubjectCode ', $SubjectCode  ) 
        ->where('CompetencyCode', $CompetencyCode );
        $query = $this->db->get();
    
        return $query->result();
    }

    public function update_curriculum_school_competency($CurriculumID, $SubjectCode, $Old_CompetencyCode, $CURRICULUM_SCHOOl_COMPETENCY){
        $this->db->where('CurriculumID', $CurriculumID)
                ->where('SubjectCode ', $SubjectCode  ) 
                ->where('CompetencyCode ', $Old_CompetencyCode  );
        $result = $this->db->update('curriculum_school_competency', $CURRICULUM_SCHOOl_COMPETENCY);
        return $result;
    
    }
    

    
}

?>