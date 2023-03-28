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

    public function teacher_certificate()
    {

        if (!file_exists(APPPATH . 'views/pages/dashboard/teacher/teacher-certificate.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = 'teacher-certificate'; // Capitalize the first letter
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/teacher/teacher-certificate', $data);
        $this->load->view('templates/footer', $data);
    }

    public function teacher_position()
    {

        if (!file_exists(APPPATH . 'views/pages/dashboard/teacher/teacher-position.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = 'teacher-position'; // Capitalize the first letter
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/teacher/teacher-position', $data);
        $this->load->view('templates/footer', $data);
    }

    public function teacher_assistance()
    {

        if (!file_exists(APPPATH . 'views/pages/dashboard/teacher/teacher-assistance.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = 'teacher-assistance'; // Capitalize the first letter
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/teacher/teacher-assistance', $data);
        $this->load->view('templates/footer', $data);
    }

    public function teacher_academic()
    {

        if (!file_exists(APPPATH . 'views/pages/dashboard/teacher/teacher-academic.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = 'teacher-academic'; // Capitalize the first letter
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/teacher/teacher-academic', $data);
        $this->load->view('templates/footer', $data);
    }

    public function teacher_education()
    {

        if (!file_exists(APPPATH . 'views/pages/dashboard/teacher/teacher-education.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = 'teacher-education'; // Capitalize the first letter
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/teacher/teacher-education', $data);
        $this->load->view('templates/footer', $data);
    }

    public function teacher_teaching()
    {

        if (!file_exists(APPPATH . 'views/pages/dashboard/teacher/teacher-teaching.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = 'teacher-teaching'; // Capitalize the first letter
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/teacher/teacher-teaching', $data);
        $this->load->view('templates/footer', $data);
    }
}
