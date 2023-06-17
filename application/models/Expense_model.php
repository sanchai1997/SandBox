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
            'ExpenseID' => Date('YmdHis'),
            'DeleteStatus' => 1
        ];

        $this->db->where('ExpenseID ', $ExpenseID );
        $result = $this->db->update('EXPENSE',  $data);
    
        return $result;
    }

    public function limit_amount($BudgetID) {
        $this->db->select('b.BudgetAmount as BudgetAmount , b.BudgetAmount-sum(e.ExpenseAmount) as limit_amount, b.BudgetReceivedDate')
        ->from('EXPENSE e')
        ->join('BUDGET b', 'b.BudgetID=e.BudgetID', 'LEFT') 
        ->where('b.BudgetID', $BudgetID )
        ->where('e.DeleteStatus', 0 )
        ->group_by(' b.BudgetAmount' );

        $query = $this->db->get();

        return $query->result();
    }

    public function limit_amount_without($BudgetID,$ExpenseID) {
        $this->db->select('b.BudgetAmount , b.BudgetAmount-sum(e.ExpenseAmount) as limit_amount, b.BudgetReceivedDate')
        ->from('EXPENSE e')
        ->join('BUDGET b', 'b.BudgetID=e.BudgetID', 'LEFT') 
        ->where('b.BudgetID', $BudgetID )
        ->where_not_in('e.ExpenseID', $ExpenseID )
        ->where('e.DeleteStatus', 0 )
        ->group_by(' b.BudgetAmount' );

        $query = $this->db->get();

        return $query->result();
    }

}
?>

