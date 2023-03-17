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
        return $result_budget;
    }

    public function insert_curriculum($curriculum) {    
       
        $result_curriculum = $this->db->insert('CURRICULUM', $curriculum);
        return $result_curriculum;

    }
}
<<<<<<< Updated upstream
  
=======

?>
>>>>>>> Stashed changes
