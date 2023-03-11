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
        $this->db->select('c.*, s.*, ct.*, e.*, g.*')
        ->from('curriculum c')
        ->join('school s', 's.SchoolID   = c.SchoolID  ', 'LEFT') 
        ->join('curriculum_type ct', 'ct.CurriculumCode    = c.CurriculumCode   ', 'LEFT') 
        ->join('education_level e', 'e.EducationLevelCode     = c.EducationLevelCode    ', 'LEFT') 
        ->join('grade_level g', 'g.GradeLevelCode    = c.GradeLevelCode   ', 'LEFT') ;
       
        $query = $this->db->get();

       // $query = $this->db->get('curriculum');
        return $query->result();
    }

###################### curriculum_subject ################################
    public function insert_curriculum_subject($CURRICULUM_SUBJECT) {

        $result_CURRICULUM_SUBJECT = $this->db->insert('curriculum_subject', $CURRICULUM_SUBJECT);
        return $result_CURRICULUM_SUBJECT;
    
    }

    public function get_CurriculumSubject_All($CurriculumID) {
        $this->db->select('cs.*, st.*, sg.*')
        ->from('curriculum_subject cs')
        ->join('subject_type st', 'st.SubjectTypeCode   = cs.SubjectTypeCode  ', 'LEFT') 
        ->join('subject_group sg', 'sg.SubjectGroupCode   = cs.SubjectGroupCode  ', 'LEFT') 
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
        ->join('competency c', 'c.CompetencyCode  = cs.CompetencyCode ', 'LEFT') 
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