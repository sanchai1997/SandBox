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
        $data['listSchool'] = $this->School_model->get_school_All();
        $data['listBudget_type'] = $this->Budget_model->get_expense_type();
        $data['BudgetID'] = $_GET['bid']; 
        $data['SchoolID'] = $_GET['sid']; 
        
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
        $data['listBudget_type'] = $this->Budget_model->get_expense_type();

        $data['ExpenseID'] = $_GET['eid']; 
        $data['SchoolID'] = $_GET['sid']; 
        
        $data['expense'] = $this->Expense_model->get_expense($data['ExpenseID']);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/forms/Expense/edit_forms-Expense',$data);
        $this->load->view('templates/footer');

    }

    public function list_budget() {
        
        if ( ! file_exists(APPPATH.'views/pages/dashboard/Budget/list-budget.php'))
        {
            show_404();
        }

        $data['listBudget'] = $this->Budget_model->get_Budget_All();
        $data['School'] = $this->School_model->get_school_All();

        if($data['School']==null){
           
        }else{
            $data['School_id'] = $this->School_model->get_school_top();
            $data['SchoolID'] = $data['School_id'][0]-> SchoolID;
            $data['SchoolNameThai'] = $data['School_id'][0]-> SchoolNameThai;
        }

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/dashboard/Budget/list-budget',$data);
        $this->load->view('templates/footer');

    }
    public function list_budget_by_school() {
        
        if ( ! file_exists(APPPATH.'views/pages/dashboard/Budget/list-budget.php'))
        {
            show_404();
        }

        $data['SchoolID'] = $_GET['sid']; 
        $school = $this->School_model->get_school($data['SchoolID']);  
        $data['SchoolNameThai'] = $school[0]->SchoolNameThai ; 

        $data['listBudget'] = $this->Budget_model->get_Budget_by_school($data['SchoolID']);  
        $data['School'] = $this->School_model->get_school_All();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/dashboard/Budget/list-budget',$data);
        $this->load->view('templates/footer');

    }

    public function add_Expense() {
            
            
            $SchoolID = $this->input->post('SchoolID'); 

            $expense = [
                'ExpenseEducationYear' => $this->input->post('ExpenseEducationYear'),
                'ExpenseSemester' => $this->input->post('ExpenseSemester'),
                'BudgetID' => $this->input->post('BudgetID'),
                'ExpenseSchoolID ' => $this->input->post('ExpenseBudgetSchoolID'),
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

    public function edit_budget() {
       
        $ExpenseID  = $this->input->post('ExpenseID');
        $SchoolID = $this->input->post('SchoolID'); 
        show_error($SchoolID);
       

        $expense = [
            'ExpenseEducationYear' => $this->input->post('ExpenseEducationYear'),
            'ExpenseSemester' => $this->input->post('ExpenseSemester'),
            'ExpenseSchoolID ' => $this->input->post('ExpenseSchoolID'),
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


}
?>