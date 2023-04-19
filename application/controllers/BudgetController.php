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
        $data['listBudget_type'] = $this->Budget_model->get_budget_type();
        $data['innovation_area'] = $this->Budget_model->get_innovation_area_All();

        $data['SchoolID'] = $_GET['sid'];
        
        

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
        $data['listBudget_type'] = $this->Budget_model->get_budget_type();
        $data['innovation_area'] = $this->Budget_model->get_innovation_area_All();

        $data['BudgetID'] = $_GET['bid']; 
        $data['SchoolID'] = $_GET['sid'];

        $data['Budget'] = $this->Budget_model->get_Budget($data['BudgetID'] );


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

        
        $data['School'] = $this->School_model->get_school_All();

        if($data['School']==null){
            $data['listBudget'] = null;
        }else{
            $data['School_id'] = $this->School_model->get_school_top();
            $data['SchoolID'] = $data['School_id'][0]-> SchoolID;
            $data['SchoolNameThai'] = $data['School_id'][0]-> SchoolNameThai;
            $data['listBudget'] = $this->Budget_model->get_Budget_by_school($data['SchoolID']);  
            
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

    public function add_budget() {
       
        $SchoolID  = $this->input->post('SchoolID');
        

            $budget = [
                'BudgetID' => $this->input->post('BudgetID'),
                'BudgetEducationYear' => $this->input->post('BudgetEducationYear'),
                'BudgetSemester' => $this->input->post('BudgetSemester'),
                'BudgetYear' => $this->input->post('BudgetYear'),
                'AREA_NO' => $this->input->post('AREA_NO'),
                'BUDGET_TYPE_CODE' => $this->input->post('BUDGET_TYPE_CODE'),   
                'BudgetSchoolID'  => $SchoolID,
                'BudgetProgram' => $this->input->post('BudgetProgram'),
                'BudgetAmount' => $this->input->post('BudgetAmount'),
                'BudgetDate' => $this->input->post('BudgetDate'),
                'BudgetReceivedDate' => $this->input->post('BudgetReceivedDate'),
            ];

            $result_budget =  $this->Budget_model->insert_budget($budget);



            if($result_budget == 1){
                $this->session->set_flashdata('success',"บันทึกข้อมูลสำเร็จ");
                redirect(base_url('list_budget_by_school?sid='.$SchoolID));
            }else{
                $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการบันทึกข้อมูล");
                redirect(base_url('forms-budget?sid='.$SchoolID));
            }
        
    }

    public function edit_budget() {
       
        $SchoolID  = $this->input->post('SchoolID');
        $BudgetID  = $this->input->post('OLDBudgetID');
        
        $budget = [
            'BudgetID' => $this->input->post('BudgetID'),
            'BudgetEducationYear' => $this->input->post('BudgetEducationYear'),
            'BudgetSemester' => $this->input->post('BudgetSemester'),
            'BudgetYear' => $this->input->post('BudgetYear'),
            'AREA_NO' => $this->input->post('AREA_NO'),
            'BUDGET_TYPE_CODE' => $this->input->post('BUDGET_TYPE_CODE'),   
            'BudgetSchoolID'  =>  $SchoolID ,
            'BudgetProgram' => $this->input->post('BudgetProgram'),
            'BudgetAmount' => $this->input->post('BudgetAmount'),
            'BudgetDate' => $this->input->post('BudgetDate'),
            'BudgetReceivedDate' => $this->input->post('BudgetReceivedDate'),
        ];

        $result_budget =  $this->Budget_model->update_budget($budget,$BudgetID);
   
        if($result_budget == 1){
            $this->session->set_flashdata('success',"แก้ไขข้อมูลสำเร็จ");
            redirect(base_url('list_budget_by_school?sid='.$SchoolID));
        }else{
            $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการแก้ไขข้อมูล");
            redirect(base_url('edit_forms_budget?sid='.$SchoolID .'&&bid='.$BudgetID));
        }
    

}
   public function delete_budget(){
        $BudgetID = $_GET['bid'];
        $SchoolID = $_GET['sid']; 

        $result =$this->Budget_model->delete_budget($BudgetID);
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