<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once '_sandboxcontroller.php';

class Student extends _sandboxcontroller
{

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('School_model', 'school');
        $this->load->model('Student_model', 'student');
    }

    public function index()
    {

        if (!file_exists(APPPATH . 'views/pages/dashboard/student/student.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = 'student'; // Capitalize the first letter
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/student/student', $data);
        $this->load->view('templates/footer', $data);
    }
}
