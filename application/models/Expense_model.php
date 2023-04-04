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

    public function get_expense_type() {
        $query = $this->db->get('CLS_EXPENSE_TYPE');
        return $query->result();
    }

    public function get_expense_all($ExpenseID) {

        $this->db->select('e.*, et.EXPENSE_TYPE_NAME')
        ->from('EXPENSE e')
        ->join('CLS_EXPENSE_TYPE et', 'et.EXPENSE_TYPE_CODE  = e.ExpenseTypeCode ', 'LEFT') 
        ->where('e.BudgetID', $ExpenseID )
        ->where('e.DeleteStatus', 0 );

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

    public function delete_expense($ExpenseID){   
        $data = [
            'DeleteStatus' => 1
        ];

        $this->db->where('ExpenseID ', $ExpenseID );
        $result = $this->db->update('EXPENSE',  $data);
    
        return $result;
    }
    

}
?>

