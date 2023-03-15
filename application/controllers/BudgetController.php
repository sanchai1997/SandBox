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
    }
    public function forms_budget() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/Budget/forms-budget.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $data['listSchool'] = $this->School_model->get_school_All();
        $data['listEXPENSE_TYPE'] = $this->Budget_model->get_expense_type();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/forms/Budget/forms-budget',$data);
        $this->load->view('templates/footer');

    }

}