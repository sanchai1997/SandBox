<?php

class Budget_model extends CI_Model
{

    public function __construct()
    {

        $this->load->database();
        $this->load->helper('url');
    }

    public function get_expense_type() {
        $query = $this->db->get('CLS_BUDGET_TYPE');
        return $query->result();
    }

    public function insert_budget($budget) {
        
        $result_budget = $this->db->insert('BUDGET', $budget);

        if($result_budget == 1){
            $BudgetID = $this->db->insert_id();
            return $BudgetID;
        }else{
            return -1 ;
        }
        
    }

    public function get_Budget_All() {
        $this->db->select('b.*, s.SchoolNameThai, ')
        ->from('budget b')
        ->join('SCHOOL s', 's.SchoolID   = b.BudgetSchoolID   ', 'LEFT') 
        ;
       
        $query = $this->db->get();
        
        return $query->result();
    }
    
    public function get_Budget( $BudgetID) {
        $this->db->from('budget')
        ->where('BudgetID ', $BudgetID );
        
        $query = $this->db->get();
    
        return $query->result();
    }
}
?>

