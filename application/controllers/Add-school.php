<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_school extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Project_model', 'project');
    }

    //Add Data Form School
    public function index() {
        $this->form_validation->set_rules('NAME_TH', 'NAME_TH', 'required');
        $this->form_validation->set_rules('NAME_EN', 'NAME_EN', 'required');
    
        if (!$this->form_validation->run())
        {
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url('project/forms_school'));
        }
        else
        {
        $this->project->add_school();
        $this->session->set_flashdata('success', "Saved Successfully!");
        redirect(base_url('project'));
        }
    
    }
}