<?php
class Area_identitty_model extends CI_Model
{

    public function __construct()
    {

        $this->load->database();
        $this->load->helper('url');
    }

    public function get_RELIGION() {
        $query = $this->db->get('CLS_RELIGION');
        return $query->result();
    }

    public function get_OCCUPATION() {
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
            'DeleteStatus' => 1
        ];
         $this->db->where('EducationYear', $EducationYear )
                  ->where('Semester', $Semester )
                  ->where('SchoolID', $SchoolID )
         ;
        $result = $this->db->update('AREA_IDENTITY',  $data);
     
        return $result;
    }

    

    
}