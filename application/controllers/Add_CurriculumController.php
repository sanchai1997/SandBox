<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CurriculumController extends CI_Controller{
    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('AddCurriculum_Model', 'add_Curriculum');
    }

    public function index() {
        $this->form_validation->set_rules('EDUCATION_YEAR', 'EDUCATION_YEAR', 'required');
        $this->form_validation->set_rules('SEMESTER', 'SEMESTER', 'required');
        $this->form_validation->set_rules('SCHOOL_ID', 'SCHOOL_ID', 'required');
        $this->form_validation->set_rules('CURRICULUM_NAME', 'CURRICULUM_NAME', 'required');
        $this->form_validation->set_rules('CURRICULUM_CODE', 'CURRICULUM_CODE', 'required');
        $this->form_validation->set_rules('EDUCATION_LEVEL_CODE', 'EDUCATION_LEVEL_CODE', 'required');
        $this->form_validation->set_rules('GRADE_LEVEL_CODE', 'GRADE_LEVEL_CODE', 'required');
        $this->form_validation->set_rules('CURRICULUM_DOCUMENT', 'CURRICULUM_DOCUMENT', 'required');
        $this->form_validation->set_rules('LOCAL_CURRICULUM_FLAG', 'LOCAL_CURRICULUM_FLAG', 'required');
        $this->form_validation->set_rules('LOCAL_CURRICULUM_NAME', 'LOCAL_CURRICULUM_NAME', 'required');
        $this->form_validation->set_rules('LOCAL_CURRICULUM_DOCUMENT', 'LOCAL_CURRICULUM_DOCUMENT', 'required');*/
           
        if (!$this->form_validation->run())
        {
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url('add_Curriculum'));
        }
        else
        {
        $this->add_Curriculum->add_Curriculum();
        $this->session->set_flashdata('success', "Saved Successfully!");
        redirect(base_url('add_Curriculum'));
        }
    
    }
}