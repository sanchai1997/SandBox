<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher_developmant_activity_controller extends CI_Controller{
    public function index() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/forms-Curriculum.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = 'Forms Teacher Developmant Activity'; // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/forms-teacher_developmant_activity', $data);
        $this->load->view('templates/footer', $data);
    }
    
}