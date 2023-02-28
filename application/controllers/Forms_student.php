<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forms_student extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('School_model', 'forms_student');
    }
    
    ///////////////////////////////////STUDENT/////////////////////////////////////////
     //Page Form School
    public function index() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/forms-student.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = 'Forms Student'; // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/forms-student', $data);
        $this->load->view('templates/footer', $data);
    }
    //////////////////////////////// STUDENT - END ////////////////////////////////////

}

