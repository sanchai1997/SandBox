<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExpenseController extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        // Your own constructor code
        $this->load->library('session');
        $this->load->model('School_model');
        $this->load->model('Budget_model');
        $this->load->model('Expense_model');
    }
    public function forms_Expense() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/Expense/forms-Expense.php'))
        {
            show_404();
        }
        $data['BudgetID'] = $_GET['bid']; 
        $data['SchoolID'] = $_GET['sid']; 

        $data['listSchool'] = $this->School_model->get_school_All();
        $data['listExpense_type'] = $this->Expense_model->get_expense_type();
        $limit_amount = $this->Expense_model-> limit_amount($data['BudgetID']);    
        if(count($limit_amount)>0 ){
             $data['limit_amount'] = $limit_amount[0]->limit_amount;
        }else{
            $Budget = $this->Budget_model->get_Budget($data['BudgetID'] );
            $data['limit_amount'] = $Budget[0]-> BudgetAmount;
        }
       
        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/forms/Expense/forms-Expense',$data);
        $this->load->view('templates/footer');

    }

    public function edit_forms_Expense() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/Expense/edit_forms-Expense.php'))
        {
            show_404();
        }

        $data['listSchool'] = $this->School_model->get_school_All();
        $data['listExpense_type'] = $this->Expense_model->get_expense_type();

        $data['ExpenseID'] = $_GET['eid']; 
        $data['SchoolID'] = $_GET['sid']; 
        
        $data['expense'] = $this->Expense_model->get_expense($data['ExpenseID']);
        $limit_amount = $this->Expense_model-> limit_amount_without($data['expense'][0]->BudgetID, $data['expense'][0]->ExpenseID);    

        if(count($limit_amount)>0 ){
            $data['limit_amount'] = $limit_amount[0]->limit_amount;
       }else{
           $Budget = $this->Budget_model->get_Budget($data['expense'][0]->BudgetID );
           $data['limit_amount'] = $Budget[0]-> BudgetAmount;
       }

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/forms/Expense/edit_forms-Expense',$data);
        $this->load->view('templates/footer');

    }



    public function add_Expense() {
            
            $SchoolID = $this->input->post('SchoolID'); 

            $expense = [
                'ExpenseID' => $this->input->post('ExpenseID'),
                'ExpenseEducationYear' => $this->input->post('ExpenseEducationYear'),
                'ExpenseSemester' => $this->input->post('ExpenseSemester'),
                'BudgetID' => $this->input->post('BudgetID'),
                'ExpenseSchoolID ' =>  $SchoolID,
                'ExpenseTypeCode' => $this->input->post('ExpenseTypeCode'),
                'ExpenseAmount' => $this->input->post('ExpenseAmount'),
                'ExpenseDate' => $this->input->post('ExpenseDate'),
            ];

            $result_expense =  $this->Expense_model->insert_expense($expense);
           
            
            
            if($result_expense == 1){
                $this->session->set_flashdata('success',"บันทึกข้อมูลสำเร็จ");
                redirect(base_url('list_budget_by_school?sid='.$SchoolID));
            }else{
                $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการบันทึกข้อมูล");
                redirect(base_url('list_budget_by_school?sid='.$SchoolID));
            }
        
    }

    public function edit_Expense() {
       
        $ExpenseID  = $this->input->post('OLD_ExpenseID');
        $SchoolID = $this->input->post('SchoolID'); 
   
       
        $expense = [
            'ExpenseID' => $this->input->post('ExpenseID'),
            'ExpenseEducationYear' => $this->input->post('ExpenseEducationYear'),
            'ExpenseSemester' => $this->input->post('ExpenseSemester'),
            'ExpenseSchoolID ' => $SchoolID,
            'ExpenseTypeCode' => $this->input->post('ExpenseTypeCode'),
            'ExpenseAmount' => $this->input->post('ExpenseAmount'),
            'ExpenseDate' => $this->input->post('ExpenseDate'),
        ];

        $result_expense =  $this->Expense_model->update_expense($expense,$ExpenseID);
       
        
        
        if($result_expense == 1){
            $this->session->set_flashdata('success',"บันทึกข้อมูลสำเร็จ");
            redirect(base_url('list_budget_by_school?sid='.$SchoolID));
        }else{
            $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการบันทึกข้อมูล");
            redirect(base_url('list_budget_by_school?sid='.$SchoolID));
        }
    
}
public function delete_Expense(){
    $ExpenseID = $_GET['eid'];
    $SchoolID = $_GET['sid']; 

    $result =$this->Expense_model->delete_expense($ExpenseID);
    if($result == 1 ){
        $this->session->set_flashdata('success',"ลบข้อมูลสำเร็จ");
        redirect(base_url('list_budget_by_school?sid='.$SchoolID));
    }else{
        $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการลบข้อมูล");
        redirect(base_url('list_budget_by_school?sid='.$SchoolID));
    }
    
}


}
?>