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
        $this->db->select('c.*, s.SchoolNameThai, ct.CURRICULUM_NAME, e.EDUCATION_LEVEL_NAME, g.GRADE_LEVEL_NAME')
        ->from('CURRICULUM c')
        ->join('SCHOOL s', 's.SchoolID   = c.SchoolID  ', 'LEFT') 
        ->join('CLS_CURRICULUM ct', 'ct.CURRICULUM_CODE    = c.CurriculumCode   ', 'LEFT') 
        ->join('CLS_EDUCATION_LEVEL e', 'e.EDUCATION_LEVEL_CODE     = c.EducationLevelCode    ', 'LEFT') 
        ->join('CLS_GRADE_LEVEL g', 'g.GRADE_LEVEL_CODE    = c.GradeLevelCode   ', 'LEFT') 
        ->where('c.DeleteStatus', 0)
        ;
       
        $query = $this->db->get();

       // $query = $this->db->get('curriculum');
        return $query->result();
    }

    public function get_Curriculum( $CurriculumID) {
        $this->db->from('CURRICULUM')
        ->where('CurriculumID', $CurriculumID )
        ->where('DeleteStatus', 0)
        ;
        $query = $this->db->get();
    
        return $query->result();
    }

    public function update_curriculum($Old_CurriculumID, $curriculum) {
        $this->db->where('CurriculumID', $Old_CurriculumID);
        $result = $this->db->update('CURRICULUM', $curriculum);
        return $result;
    
    }



###################### curriculum_subject ################################
    public function insert_curriculum_subject($CURRICULUM_SUBJECT) {

        $result_CURRICULUM_SUBJECT = $this->db->insert('CURRICULUM_SUBJECT', $CURRICULUM_SUBJECT);
        return $result_CURRICULUM_SUBJECT;
    
    }

    public function get_CurriculumSubject_All($CurriculumID) {
        $this->db->select('cs.*,st.SUBJECT_TYPE_NAME, sg.SUBJECT_GROUP_NAME')
        ->from('CURRICULUM_SUBJECT cs')
        ->join('CLS_SUBJECT_TYPE st', 'st.SUBJECT_TYPE_CODE   = cs.SubjectTypeCode  ', 'LEFT') 
        ->join('CLS_SUBJECT_GROUP sg', 'sg.SUBJECT_GROUP_CODE   = cs.SubjectGroupCode  ', 'LEFT') 
        ->where('CurriculumID ', $CurriculumID  ) 
        ->where('cs.DeleteStatus', 0)
        ;
        
        //$this->db->from('curriculum_subject');
        //$this->db->where('CurriculumID', $CurriculumID );
        $query = $this->db->get();
    
        return $query->result();
    }

    public function get_CurriculumSubject( $CurriculumID, $SubjectCode) {
        $this->db->from('CURRICULUM_SUBJECT')
        ->where('CurriculumID', $CurriculumID )
        ->where('SubjectCode ', $SubjectCode  ) 
        ->where('DeleteStatus', 0);
        $query = $this->db->get();
    
        return $query->result();
    }

    public function update_curriculum_subject($CurriculumID, $SubjectCode, $CURRICULUM_SUBJECT) {
        $this->db->where('CurriculumID', $CurriculumID)
                ->where('SubjectCode ', $SubjectCode  ) ;
        $result_CURRICULUM_SUBJECT = $this->db->update('CURRICULUM_SUBJECT', $CURRICULUM_SUBJECT);
        return $result_CURRICULUM_SUBJECT;
    
    }

###################### CURRICULUM_SCHOOL_COMPETENCY ################################
    public function insert_curriculum_school_competency($CURRICULUM_SCHOOL_COMPETENCY) {
        
        $result_CURRICULUM_SUBJECT = $this->db->insert('CURRICULUM_SCHOOL_COMPETENCY', $CURRICULUM_SCHOOL_COMPETENCY);
        return $result_CURRICULUM_SUBJECT ;

    }

    public function get_CurriculumCompetency_All($CurriculumID, $SubjectCode ) {
        $this->db->select('cs.*, c.*')
        ->from('CURRICULUM_SCHOOL_COMPETENCY cs')
        ->join('CLS_COMPETENCY c', 'c.COMPETENCY_CODE  = cs.CompetencyCode ', 'LEFT') 
        ->where('CurriculumID ', $CurriculumID  ) 
        ->where('SubjectCode ', $SubjectCode  ) 
        ->where('cs.DeleteStatus', 0);

       // $this->db->from('CURRICULUM_SCHOOL_COMPETENCY');
      //  $this->db->where('SubjectCode ', $SubjectCode  );
        $query = $this->db->get();
    
        return $query->result();
    }
    
    public function get_CurriculumCompetency( $CurriculumID, $SubjectCode, $CompetencyCode) {
        $this->db->from('CURRICULUM_SCHOOL_COMPETENCY')
        ->where('CurriculumID', $CurriculumID )
        ->where('SubjectCode ', $SubjectCode  ) 
        ->where('CompetencyCode', $CompetencyCode )
        ->where('DeleteStatus', 0);
        $query = $this->db->get();
    
        return $query->result();
    }

    public function update_curriculum_school_competency($CurriculumID, $SubjectCode, $Old_CompetencyCode, $CURRICULUM_SCHOOL_COMPETENCY){
        $this->db->where('CurriculumID', $CurriculumID)
                ->where('SubjectCode ', $SubjectCode  ) 
                ->where('CompetencyCode ', $Old_CompetencyCode  );
        $result = $this->db->update('CURRICULUM_SCHOOL_COMPETENCY', $CURRICULUM_SCHOOL_COMPETENCY);
        return $result;
    
    }
    

    
}

?>