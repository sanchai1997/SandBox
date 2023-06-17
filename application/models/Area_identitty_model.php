<?php
class Area_identitty_model extends CI_Model
{

    public function __construct()
    {

        $this->load->database();
        $this->load->helper('url');
    }

    public function get_RELIGION_All() {
        $query = $this->db->get('CLS_RELIGION');
        return $query->result();
    }

    public function get_OCCUPATION_All() {
        $query = $this->db->get('CLS_OCCUPATION');
        return $query->result();
    }

    public function get_AreaIdentity_by_school($SchoolID) {
        $this->db->select('ai.*, s.SchoolNameThai ')
        ->from('AREA_IDENTITY ai')
        ->join('SCHOOL s', 's.SchoolID   = ai.SchoolID    ', 'LEFT') 
        ->where('ai.DeleteStatus', 0 )
        ->where_in('ai.SchoolID', $SchoolID  )
        ;
        
        $query = $this->db->get();
        return $query->result();
        
    }

    public function insert_area_identitty($area_identitty) {
        
        $result_area_identitty = $this->db->insert('AREA_IDENTITY', $area_identitty);
      
        return $result_area_identitty;
        
    }

    public function delete_area_identitty($EducationYear, $Semester, $SchoolID){   
        $data = [
            'DeleteStatus' => 1,
            'EducationYear' => random_string('numeric', 4) ,
            'Semester' => 9 ,
        ];
         $this->db->where('EducationYear', $EducationYear )
                  ->where('Semester', $Semester )
                  ->where('SchoolID', $SchoolID )
         ;
        $result = $this->db->update('AREA_IDENTITY',  $data);
     
        return $result;
    }

    public function get_Area_identity($SchoolID, $EducationYear, $Semester) {
        $this->db->from('AREA_IDENTITY')
        ->where('SchoolID ', $SchoolID )
        ->where('EducationYear ', $EducationYear )
        ->where('Semester ', $Semester )
        ;
        
        $query = $this->db->get();
    
        return $query->result();
    }

    public function update_area_identity($SchoolID, $EducationYear, $Semester, $area_identity){
        $this->db->where('SchoolID', $SchoolID )
        ->where('EducationYear ', $EducationYear )
        ->where('Semester ', $Semester )
        ;
        $result = $this->db->update('AREA_IDENTITY',  $area_identity);

        //show_error($this->db->last_query());
        
        return $result;
    }

    //RELIGION
    public function get_RELIGION($SchoolID,$EducationYear,$Semester  ) {
        $this->db->select('ai.*, cr.RELIGION_NAME  ')
        ->from('AREA_IDENTITY_RELIGION ai')
        ->join('CLS_RELIGION cr', 'cr.RELIGION_CODE    = ai.AreaReligionCode    ', 'LEFT') 
        ->where('SchoolID ', $SchoolID )
        ->where('EducationYear ', $EducationYear )
        ->where('Semester ', $Semester )
        ->where('ai.DeleteStatus', 0 );
        
        ;
        
        $query = $this->db->get();
    
        return $query->result();
    }
    
    public function insert_area_Region($Region)    {
        
        $result = $this->db->insert('AREA_IDENTITY_RELIGION', $Region);
        return $result; 
    }

    public function get_Region_byCode($SchoolID, $EducationYear, $Semester,  $AreaReligionCode){
        $this->db->select('ai.*, cr.RELIGION_NAME  ')
        ->from('AREA_IDENTITY_RELIGION ai')
        ->join('CLS_RELIGION cr', 'cr.RELIGION_CODE    = ai.AreaReligionCode    ', 'LEFT') 
        ->where('SchoolID ', $SchoolID )
        ->where('EducationYear ', $EducationYear )
        ->where('Semester ', $Semester )
        ->where('ai.AreaReligionCode ', $AreaReligionCode )
        ->where('ai.DeleteStatus', 0 );

        ;
        
        $query = $this->db->get();
    
        return $query->result();
    }

    public function update_Region($SchoolID, $EducationYear, $Semester,$AreaReligionCode, $Region){
        $this->db->where('SchoolID', $SchoolID )
        ->where('EducationYear ', $EducationYear )
        ->where('Semester ', $Semester )
        ->where('AreaReligionCode ', $AreaReligionCode )
        ;
        $result = $this->db->update('AREA_IDENTITY_RELIGION',  $Region);        
        return $result;
    }

    public function delete_Region($EducationYear, $Semester, $SchoolID, $AreaReligionCode){   
        $data = [
            'EducationYear' => random_string('numeric', 4) ,
            'Semester' => 9 ,
            'DeleteStatus' => 1
        ];
         $this->db->where('EducationYear', $EducationYear )
                  ->where('Semester', $Semester )
                  ->where('SchoolID', $SchoolID )
                  ->where('AreaReligionCode', $AreaReligionCode )
         ;
        $result = $this->db->update('AREA_IDENTITY_RELIGION',  $data);
        return $result;
    }

    public function limit_AreaReligionPercentage($EducationYear, $Semester, $SchoolID) {
        $this->db->select(' 100-sum(AreaReligionPercentage) as limit_Percentage ')
        ->from('AREA_IDENTITY_RELIGION ')
        ->where('EducationYear ', $EducationYear )
        ->where('Semester ', $Semester )
        ->where('SchoolID', $SchoolID )
        ->where('DeleteStatus', 0 )
        ->group_by('EducationYear,Semester,SchoolID' );

        $query = $this->db->get();
        return $query->result();
    }

    public function limit_AreaReligionPercentage_without($EducationYear, $Semester, $SchoolID, $AreaReligionCode) {
        $this->db->select(' 100-sum(AreaReligionPercentage) as limit_Percentage ')
        ->from('AREA_IDENTITY_RELIGION ')
        ->where('EducationYear ', $EducationYear )
        ->where('Semester ', $Semester )
        ->where('SchoolID', $SchoolID )
        ->where('DeleteStatus', 0 )
        ->where_not_in('AreaReligionCode', $AreaReligionCode )
        ->group_by('EducationYear,Semester,SchoolID' );

        $query = $this->db->get();
        return $query->result();
    }

///////////////OCCUPATION ///////////////

    public function get_OCCUPATION($SchoolID,$EducationYear,$Semester  ) {
        $this->db->select('ai.*, cr.OCCUPATION_NAME  ')
        ->from('AREA_IDENTITY_OCCUPATION ai')
        ->join('CLS_OCCUPATION cr', 'cr.OCCUPATION_CODE     = ai.AreaOccupationCode     ', 'LEFT') 
        ->where('SchoolID ', $SchoolID )
        ->where('EducationYear ', $EducationYear )
        ->where('Semester ', $Semester )
        ->where('ai.DeleteStatus', 0 );
        
        ;
        
        $query = $this->db->get();
    
        return $query->result();
    }
   
    public function insert_area_OCCUPATION($OCCUPATION)    {
        
        $result = $this->db->insert('AREA_IDENTITY_OCCUPATION', $OCCUPATION);
        return $result; 
    }

    public function get_OCCUPATION_byCode($SchoolID, $EducationYear, $Semester,  $AreaOccupationCode){
        $this->db->select('ai.*, cr.OCCUPATION_NAME  ')
        ->from('AREA_IDENTITY_OCCUPATION ai')
        ->join('CLS_OCCUPATION cr', 'cr.OCCUPATION_CODE     = ai.AreaOccupationCode     ', 'LEFT') 
        ->where('SchoolID ', $SchoolID )
        ->where('EducationYear ', $EducationYear )
        ->where('Semester ', $Semester )
        ->where('ai.AreaOccupationCode ', $AreaOccupationCode )
        ->where('ai.DeleteStatus', 0 );

        ;
        
        $query = $this->db->get();
        return $query->result();
    }

    public function update_OCCUPATION($SchoolID, $EducationYear, $Semester,$AreaOccupationCode, $OCCUPATION){
        $this->db->where('SchoolID', $SchoolID )
        ->where('EducationYear ', $EducationYear )
        ->where('Semester ', $Semester )
        ->where('AreaOccupationCode ', $AreaOccupationCode )
        ;
        $result = $this->db->update('AREA_IDENTITY_OCCUPATION',  $OCCUPATION);        
        return $result;
    }

    public function delete_OCCUPATION($EducationYear, $Semester, $SchoolID, $AreaOccupationCode){   
        $data = [
            'EducationYear' => random_string('numeric', 4) ,
            'Semester' => 9 ,
            'DeleteStatus' => 1
        ];
         $this->db->where('EducationYear', $EducationYear )
                  ->where('Semester', $Semester )
                  ->where('SchoolID', $SchoolID )
                  ->where('AreaOccupationCode', $AreaOccupationCode )
         ;
        $result = $this->db->update('AREA_IDENTITY_OCCUPATION',  $data);
        return $result;
    }

    public function limit_AreaOccupationPercentage($EducationYear, $Semester, $SchoolID) {
        $this->db->select(' 100-sum(AreaOccupationPercentage) as limit_Percentage ')
        ->from('AREA_IDENTITY_OCCUPATION ')
        ->where('EducationYear ', $EducationYear )
        ->where('Semester ', $Semester )
        ->where('SchoolID', $SchoolID )
        ->where('DeleteStatus', 0 )
        ->group_by('EducationYear,Semester,SchoolID' );

        $query = $this->db->get();
        return $query->result();
    }

    public function limit_AreaOccupationPercentage_without($EducationYear, $Semester, $SchoolID, $AreaOccupationCode) {
        $this->db->select(' 100-sum(AreaOccupationPercentage) as limit_Percentage ')
        ->from('AREA_IDENTITY_OCCUPATION ')
        ->where('EducationYear ', $EducationYear )
        ->where('Semester ', $Semester )
        ->where('SchoolID', $SchoolID )
        ->where('DeleteStatus', 0 )
        ->where_not_in('AreaOccupationCode', $AreaOccupationCode )
        ->group_by('EducationYear,Semester,SchoolID' );

        $query = $this->db->get();
        return $query->result();
    }

}