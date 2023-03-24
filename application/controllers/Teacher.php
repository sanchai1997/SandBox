<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Teacher extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Teacher_model', 'teacher');
    }

    public function index()
    {

        if (!file_exists(APPPATH . 'views/pages/dashboard/teacher/teacher.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = 'teacher'; // Capitalize the first letter
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/teacher/teacher', $data);
        $this->load->view('templates/footer', $data);
    }
}
