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
        ->where('s.DeleteStatus', 0)
        
        ;
       
        $query = $this->db->get();

       // $query = $this->db->get('curriculum');
        return $query->result();
    }

    public function get_Curriculum( $CurriculumID) {
        $this->db->select('c.*, s.SchoolNameThai')
        ->from('CURRICULUM c')
        ->join('SCHOOL s', 's.SchoolID   = c.SchoolID  ', 'LEFT') 
        ->where('CurriculumID', $CurriculumID )
        ->where('c.DeleteStatus', 0)
        ->where('s.DeleteStatus', 0)
        ;
        $query = $this->db->get();
    
        return $query->result();
    }

    public function get_Curriculum_by_school($SchoolID) {
        $this->db->select('c.*,c.SchoolID,s.SchoolNameThai, ct.CURRICULUM_NAME, e.EDUCATION_LEVEL_NAME, g.GRADE_LEVEL_NAME')
        ->from('CURRICULUM c')
        ->join('SCHOOL s', 's.SchoolID   = c.SchoolID  ', 'LEFT') 
        ->join('CLS_CURRICULUM ct', 'ct.CURRICULUM_CODE    = c.CurriculumCode   ', 'LEFT') 
        ->join('CLS_EDUCATION_LEVEL e', 'e.EDUCATION_LEVEL_CODE     = c.EducationLevelCode    ', 'LEFT') 
        ->join('CLS_GRADE_LEVEL g', 'g.GRADE_LEVEL_CODE    = c.GradeLevelCode   ', 'LEFT') 
        ->where('c.DeleteStatus', 0)
        ->where('s.DeleteStatus', 0)
        ->where_in('c.SchoolID', $SchoolID  ) 
        ;

        $query = $this->db->get();
        return $query->result();
        
    }

    public function update_curriculum($Old_CurriculumID, $curriculum) {
        $this->db->where('CurriculumID', $Old_CurriculumID);
        $result = $this->db->update('CURRICULUM', $curriculum);
        return $result;
    
    }

    public function delete_curriculum($CurriculumID){        
        $data = [
            'CurriculumID' => Date('YmdHis'),
            'DeleteStatus' => 1
        ];
        $this->db->where('CurriculumID', $CurriculumID);
            
        $result = $this->db->update('CURRICULUM', $data);
        return $result;
    }    


###################### curriculum_subject ################################
    public function insert_curriculum_subject($CURRICULUM_SUBJECT) {

        $result_CURRICULUM_SUBJECT = $this->db->insert('CURRICULUM_SUBJECT', $CURRICULUM_SUBJECT);
        return $result_CURRICULUM_SUBJECT;
    
    }

    public function get_CurriculumSubject_All($CurriculumID) {
        $this->db->select('cs.*,st.SUBJECT_TYPE_NAME, sg.SUBJECT_GROUP_NAME, ac.*, std.*')
        ->from('CURRICULUM_SUBJECT cs')
        ->join('CLS_SUBJECT_TYPE st', 'st.SUBJECT_TYPE_CODE   = cs.SubjectTypeCode  ', 'LEFT') 
        ->join('CLS_SUBJECT_GROUP sg', 'sg.SUBJECT_GROUP_CODE   = cs.SubjectGroupCode  ', 'LEFT') 
        ->join('ASSESSMENT_CRITERIA ac', 'ac.Id   = cs.SUBJECT_KPI_ID  ', 'LEFT') 
        ->join('SUBJECT_STD std', 'std.SUBJECT_STD_ID   = cs.SUBJECT_STD_ID  ', 'LEFT') 
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

    public function delete_curriculum_subject($CurriculumID, $SubjectCode){        
        $data = [
            'SubjectCode' => Date('YmdHis'),
            'DeleteStatus' => 1
        ];
        $this->db->where('CurriculumID', $CurriculumID)
                ->where('SubjectCode', $SubjectCode);
            
        $result = $this->db->update('CURRICULUM_SUBJECT', $data);
        return $result;
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

        $query = $this->db->get();
    
        return $query->result();
    }
    
    public function get_CurriculumCompetency( $CurriculumID, $SubjectCode, $CompetencyCode) {
        $this->db->select('cs.*, c.*')
        ->from('CURRICULUM_SCHOOL_COMPETENCY cs')
        ->join('CLS_COMPETENCY c', 'c.COMPETENCY_CODE  = cs.CompetencyCode ', 'LEFT') 
        ->where('CurriculumID', $CurriculumID )
        ->where('SubjectCode ', $SubjectCode  ) 
        ->where('c.COMPETENCY_CODE', $CompetencyCode )
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
    
    public function delete_curriculum_school_competency($CurriculumID, $SubjectCode, $CompetencyCode){        
        $data = [
            'DeleteStatus' => 1
        ];
        $this->db->where('CurriculumID', $CurriculumID)
                ->where('SubjectCode', $SubjectCode)
                ->where('CompetencyCode', $CompetencyCode);
            
        $result = $this->db->update('CURRICULUM_SCHOOL_COMPETENCY', $data);
        return $result;
    }
###################### curriculum_plan ################################

    public function insert_curriculum_plan($curriculum_plan) {
        $result_curriculum_plan = $this->db->insert('PLAN', $curriculum_plan);
        return $result_curriculum_plan;
    }
    public function get_Curriculum_plan_All( $CurriculumID, $SubjectCode) {
        $this->db->select('*')
        ->from('PLAN')
        ->where('DeleteStatus ', 0  ) 
        ->where('CurriculumID ', $CurriculumID  ) 
        ->where('SubjectCode ', $SubjectCode  ) ;
        $query = $this->db->get();
       
        return $query->result();
    }
    public function get_Curriculum_plan($PLAN_ID) {
        $this->db->from('PLAN')
        ->where('PLAN_ID', $PLAN_ID);

        $query = $this->db->get();
        return $query->result();
    }
    public function update_Curriculum_plan($PLAN_ID, $curriculum_plan){
        $this->db->where('PLAN_ID', $PLAN_ID);
        $result = $this->db->update('PLAN',  $curriculum_plan);
        return $result;
    }
    public function delete_Curriculum_plan($PLAN_ID){   
        $data = [
            'PLAN_ID' => Date('YmdHis'),
            'DeleteStatus' => 1
        ];
        $this->db->where('PLAN_ID', $PLAN_ID);
            
        $result = $this->db->update('PLAN', $data);
        return $result;
    }
###################### curriculum_activity ################################

    public function insert_curriculum_activity($curriculum_activity) {
        $result_curriculum_activity = $this->db->insert('ACTIVITY', $curriculum_activity);
        return $result_curriculum_activity;
    }
    public function get_curriculum_activity_All($PLAN_ID) {
        $this->db->select('*')
        ->from('ACTIVITY a')
        ->join('ASSESSMENT asm', 'asm.ASSESSMENT_ID  = a.ASSESSMENT_ID ', 'LEFT') 
        ->join('SCORE s', 's.SCORE_ID  = asm.SCORE_ID ', 'LEFT') 
        ->join('CLS_FUNDAMENTAL_SUBJECT_PASSING fsp', 'fsp.FUNDAMENTAL_SUBJECT_PASSING_CODE  = s.FUNDAMENTAL_SUBJECT_PASSING_CODE ', 'LEFT') 
        ->where('a.PLAN_ID ', $PLAN_ID  ) 
        ->where('a.DeleteStatus ', 0  ) ;
        $query = $this->db->get();

       
        return $query->result();
    }
    public function get_curriculum_activity($ACTIVITY_ID) {
        $this->db->select('*')
        ->from('ACTIVITY a')
        ->join('ASSESSMENT asm', 'asm.ASSESSMENT_ID  = a.ASSESSMENT_ID ', 'LEFT') 
        ->join('SCORE s', 's.SCORE_ID  = asm.SCORE_ID ', 'LEFT') 
        ->where('a.ACTIVITY_ID',$ACTIVITY_ID) ;
        $query = $this->db->get();

        if($query->result()==null || $query->result()==-1 || $query->result()==''){
            $this->db->select('*')
            ->from('ACTIVITY')
            ->where('ACTIVITY_ID',$ACTIVITY_ID) ;
            $query = $this->db->get();
        }

 
       
        return $query->result();
    }
    public function update_curriculum_activity($curriculum_activity,$ACTIVITY_ID){
        $this->db->where('ACTIVITY_ID', $ACTIVITY_ID);
        $result = $this->db->update('ACTIVITY',  $curriculum_activity);
        return $result;
    }
    public function delete_curriculum_activity($ACTIVITY_ID){   
        $data = [
            'ACTIVITY_ID' => Date('YmdHis'),
            'DeleteStatus' => 1
        ];
        $this->db->where('ACTIVITY_ID', $ACTIVITY_ID);
            
        $result = $this->db->update('ACTIVITY', $data);
        return $result;
    }
###################### curriculum_assessment ################################

public function insert_curriculum_assessment($curriculum_assessment) {
    $result_curriculum_activity = $this->db->insert('ASSESSMENT', $curriculum_assessment);
    if($result_curriculum_activity == 1){
        $result_activity_id = $this->db->insert_id();
        return $result_activity_id;
    }else{
        return -1;
    }
}    
public function get_assessment($ACTIVITY_ID) {
    $this->db->select('*')
    ->from('ASSESSMENT')
    ->where('ACTIVITY_ID',$ACTIVITY_ID);
    $query = $this->db->get();
    return $query->result();
}
public function get_CLS_FUNDAMENTAL_SUBJECT_PASSING() {
    $this->db->select('*')
    ->from('CLS_FUNDAMENTAL_SUBJECT_PASSING');
    $query = $this->db->get();
   
    return $query->result();
}

public function update_assessment($ASSESSMENT_ID,$curriculum_assessment){
    $this->db->where('ASSESSMENT_ID', $ASSESSMENT_ID);
    $result = $this->db->update('ASSESSMENT',$curriculum_assessment);

    
    return $result;
}
#############################score################
public function insert_score($SCORE) {
    $result_SCORE = $this->db->insert('SCORE', $SCORE);
    if($result_SCORE == 1){
        $result_score_id = $this->db->insert_id();
        return $result_score_id;
    }else{
        return -1;
    }
}
    public function update_score($SCORE_ID,$SCORE){
        $this->db->where('SCORE_ID', $SCORE_ID);
        $result = $this->db->update('SCORE',$SCORE);
        return $result;
    }
public function get_score($SCORE_ID) {
    $this->db->select('*')
    ->from('SCORE')
    ->where('SCORE_ID',$SCORE_ID);
    $query = $this->db->get();
    return $query->result();
}

    //ASSESSMENT_CRITERIA_All
    public function get_ASSESSMENT_CRITERIA_All(){
		$this->db->select('*');
		$this->db->from('ASSESSMENT_CRITERIA');
		$this->db->where('DeleteStatus ', 0  );
		$query = $this->db->get();
		return $query->result();

	}

  ################### STD  
    public function get_STD_All(){
		$this->db->select('*');
		$this->db->from('SUBJECT_STD');
		$this->db->where('DeleteStatus ', 0  );
		$query = $this->db->get();
		return $query->result();

	}

    public function get_STD_by_SUBJECT_GROUP($SUBJECT_GROUP_CODE){
		$this->db->select('*');
		$this->db->from('SUBJECT_STD');
		$this->db->where('DeleteStatus ', 0  );
        $this->db->where('SUBJECT_GROUP_CODE ', $SUBJECT_GROUP_CODE  );
		$query = $this->db->get();
		return $query->result();
	}

    public function insert_subject_std($SUBJECT_STD) {
        $result = $this->db->insert('SUBJECT_STD', $SUBJECT_STD);
        return $result;
    
    }

    public function get_SUBJECT_GROUP_CODE($SUBJECT_GROUP_CODE){
		$this->db->select('*');
		$this->db->from('CLS_SUBJECT_GROUP');
        $this->db->where('SUBJECT_GROUP_CODE ', $SUBJECT_GROUP_CODE  );
		$query = $this->db->get();

		return $query->result();
	}
    
}

?>