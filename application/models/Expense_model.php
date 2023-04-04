<?php

class Expense_model extends CI_Model
{

    public function __construct()
    {

        $this->load->database();
        $this->load->helper('url');
    }

    public function insert_expense($expense) {
        $result_expense = $this->db->insert('EXPENSE', $expense);
        return $result_expense;
    }

    public function get_expense_all($ExpenseID) {
        $this->db->from('EXPENSE')
        ->where('BudgetID', $ExpenseID );
        
        $query = $this->db->get();

        return $query->result();
    }

    public function get_expense($ExpenseID) {
        $this->db->from('EXPENSE')
        ->where('ExpenseID ', $ExpenseID );
        
        $query = $this->db->get();

        return $query->result();
    }

    public function update_expense($expense,$ExpenseID ){
        $this->db->where('ExpenseID', $ExpenseID );
        $result = $this->db->update('EXPENSE',  $expense);


        return $result;
    }
    

}
?>

