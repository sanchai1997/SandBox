<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BudgetController extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        // Your own constructor code
        $this->load->library('session');
        $this->load->model('School_model');
        $this->load->model('Budget_model');
        $this->load->model('Expense_model');
    }
    public function forms_budget() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/Budget/forms-budget.php'))
        {
            show_404();
        }
        $data['listSchool'] = $this->School_model->get_school_All();
        $data['listBudget_type'] = $this->Budget_model->get_expense_type();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/forms/Budget/forms-budget',$data);
        $this->load->view('templates/footer');

    }

    public function edit_forms_budget() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/Budget/edit_forms-budget.php'))
        {
            show_404();
        }

        $data['listSchool'] = $this->School_model->get_school_All();
        $data['listBudget_type'] = $this->Budget_model->get_expense_type();

        $data['BudgetID'] = $_GET['bid']; 

        $data['Budget'] = $this->Budget_model->get_Budget($data['BudgetID'] );

        $data['expense'] = $this->Expense_model->get_expense($data['BudgetID'] );

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/forms/Budget/edit_forms-budget',$data);
        $this->load->view('templates/footer');

    }

    public function list_budget() {
        
        if ( ! file_exists(APPPATH.'views/pages/dashboard/Budget/list-budget.php'))
        {
            show_404();
        }

        $data['listBudget'] = $this->Budget_model->get_Budget_All();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/dashboard/Budget/list-budget',$data);
        $this->load->view('templates/footer');

    }

    public function add_budget() {
       
            $budget = [
                'BudgetEducationYear' => $this->input->post('BudgetEducationYear'),
                'BudgetSemester' => $this->input->post('BudgetSemester'),
                'BudgetYear' => $this->input->post('BudgetYear'),
                'BudgetSchoolID'  =>  $this->input->post('BudgetSchoolID'),
                'BudgetProgram' => $this->input->post('BudgetProgram'),
                'BudgetAmount' => $this->input->post('BudgetAmount'),
                'BudgetDate' => $this->input->post('BudgetDate'),
                'BudgetReceivedDate' => $this->input->post('BudgetReceivedDate'),
            ];

            $budget_id =  $this->Budget_model->insert_budget($budget);

            $expense = [
                'ExpenseEducationYear' => $this->input->post('ExpenseEducationYear'),
                'ExpenseSemester' => $this->input->post('ExpenseSemester'),
                'BudgetID' => $budget_id,
                'ExpenseSchoolID ' => $this->input->post('ExpenseBudgetSchoolID'),
                'ExpenseTypeCode' => $this->input->post('ExpenseTypeCode'),
                'ExpenseAmount' => $this->input->post('ExpenseAmount'),
                'ExpenseDate' => $this->input->post('ExpenseDate'),
            ];

            $result_expense2 =  $this->Expense_model->insert_expense($expense);
           
            
            
            if($result_expense == 1){
                $this->session->set_flashdata('success',"บันทึกข้อมูลสำเร็จ");
                redirect(base_url('forms-budget'));
            }else{
                $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการบันทึกข้อมูล");
                redirect(base_url('forms-budget'));
            }
        
    }

}
?>