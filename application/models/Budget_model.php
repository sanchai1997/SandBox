<?php

class Budget_model extends CI_Model
{

    public function __construct()
    {

        $this->load->database();
        $this->load->helper('url');
    }

    public function get_budget_type() {
        $query = $this->db->get('CLS_BUDGET_TYPE');
        return $query->result();
    }

    public function insert_budget($budget) {
        
        $result_budget = $this->db->insert('BUDGET', $budget);
      
        return $result_budget;
        
    }

    public function get_Budget_All() {
        $this->db->select('b.*, s.SchoolNameThai ')
        ->from('BUDGET b')
        ->where('b.DeleteStatus', 0 )
        ->join('SCHOOL s', 's.SchoolID   = b.BudgetSchoolID   ', 'LEFT');

       
        $query = $this->db->get();
    
      
        return $query->result();
    }
    
    public function get_Budget( $BudgetID) {
        $this->db->from('BUDGET')
        ->where('BudgetID ', $BudgetID );
        
        $query = $this->db->get();
    
        return $query->result();
    }

    public function update_Budget($budget,$BudgetID){
        $this->db->where('BudgetID', $BudgetID );
        $result = $this->db->update('BUDGET',  $budget);
        
        return $result;
    }
    public function delete_budget($BudgetID){   
        $data = [
            'DeleteStatus' => 1
        ];
         $this->db->where('BudgetID', $BudgetID );
        $result = $this->db->update('BUDGET',  $data);
     
        return $result;
    }
    public function get_Budget_by_school($SchoolID) {
        $this->db->select('*')
        ->from('BUDGET b')
        ->join('SCHOOL s', 's.SchoolID   = b.BudgetSchoolID   ', 'LEFT') 
        ->join('CLS_INNOVATION_AREA ina', 'b.AREA_NO = ina.INNOVATION_AREA_CODE', 'LEFT') 
        ->where('b.DeleteStatus', 0 )
        ->where_in('b.BudgetSchoolID', $SchoolID  )
        ;
        
        $query = $this->db->get();
        return $query->result();
        
    }
    public function get_innovation_area_All() {
        $this->db->from('CLS_INNOVATION_AREA');
        $query = $this->db->get();
    
        return $query->result();
        
    }

    public function get_innovation_area($test) {
        $this->db
        ->from('CLS_INNOVATION_AREA ina')
        ->join('BUDGET b', 'b.AREA_NO = ina.INNOVATION_AREA_CODE', 'LEFT') 
        ->where_in('b.AREA_NO', $test);

    
        $query = $this->db->get();
    
        return $query->result();
        
    }


    
}
?>

