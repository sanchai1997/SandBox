<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Project_model', 'project');
    }

    public function main(){
        
        if ( ! file_exists(APPPATH.'views/pages/dashboard/index.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = 'SandBox Education'; // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/index', $data);
        $this->load->view('templates/footer', $data);
    }

    ///////////////////////////// School //////////////////////////////////
    public function forms_school(){
        
        if ( ! file_exists(APPPATH.'views/pages/forms/forms-school.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = 'Forms School'; // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/forms-school', $data);
        $this->load->view('templates/footer', $data);
    }


    //Add Data Form School
    public function add_school()
    {
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
    ///////////////////////////// School - END //////////////////////////////////
    
 
 
}