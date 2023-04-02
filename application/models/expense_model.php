<?php

class expense_model extends CI_Model
{

    public function __construct()
    {

        $this->load->database();
        $this->load->helper('url');
    }

    public function insert_expense($expense) {
        $result_expense = $this->db->insert('expense', $expense);
        return $result_expense;
    }

    public function get_expense($BudgetID) {
        $this->db->from('expense')
        ->where('BudgetID', $BudgetID );
        
        $query = $this->db->get();

        return $query->result();
    }

}
?>

