<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forms_student extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('School_model', 'forms_student');
        $this->load->model('Student_model', 'forms_student');
        
    }
    
    ///////////////////////////////////STUDENT/////////////////////////////////////////
     //Page Form School
    public function index() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/student/forms-student.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = 'Forms Student'; // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/student/forms-student', $data);
        $this->load->view('templates/footer', $data);
    }
    //////////////////////////////// STUDENT - END ////////////////////////////////////

    ////////////////////////////////// School /////////////////////////////////////////
     //Page Form Student School
     public function school() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/student/forms-student-school.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = 'Forms Student School'; // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/student/forms-student-school', $data);
        $this->load->view('templates/footer', $data);
    }
    ///////////////////////// STUDENT School - END ////////////////////////////////////

     //////////////////////////////// Parents /////////////////////////////////////////
     //Page Form Student Parents
     public function parents() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/student/forms-student-parents.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = 'Forms Student School'; // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/student/forms-student-parents', $data);
        $this->load->view('templates/footer', $data);
    }
    ///////////////////////// STUDENT Parents - END ///////////////////////////////////

     //////////////////////////////// Family //////////////////////////////////////////
     //Page Form Student Parents
     public function family() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/student/forms-student-family.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = 'Forms Student School'; // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/student/forms-student-family', $data);
        $this->load->view('templates/footer', $data);
    }
    ///////////////////////// STUDENT Family - END ////////////////////////////////////

}

