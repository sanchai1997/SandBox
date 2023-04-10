<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Personnel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Personnel_model', 'Personnel');
    }

    public function index()
    {

        if (!file_exists(APPPATH . 'views/pages/dashboard/personnel/personnel.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = 'personnel'; // Capitalize the first letter
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/personnel/personnel', $data);
        $this->load->view('templates/footer', $data);
    }

    //PageForm education
    public function personnel_education()
    {

        if (!file_exists(APPPATH . 'views/pages/dashboard/personnel/personnel-education.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = 'personnel-additional-position'; // Capitalize the first letter
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/personnel/personnel-education', $data);
        $this->load->view('templates/footer', $data);
    }

    //PageForm position
    public function personnel_position()
    {

        if (!file_exists(APPPATH . 'views/pages/dashboard/personnel/personnel-position.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = 'personnel-additional-position'; // Capitalize the first letter
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/personnel/personnel-position', $data);
        $this->load->view('templates/footer', $data);
    }

    //PageForm assistance
    public function personnel_assistance()
    {

        if (!file_exists(APPPATH . 'views/pages/dashboard/personnel/personnel-assistance.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = 'personnel-additional-assistance'; // Capitalize the first letter
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/personnel/personnel-assistance', $data);
        $this->load->view('templates/footer', $data);
    }

    //PageForm academic
    public function personnel_academic()
    {

        if (!file_exists(APPPATH . 'views/pages/dashboard/personnel/personnel-academic.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = 'personnel-additional-academic'; // Capitalize the first letter
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/personnel/personnel-academic', $data);
        $this->load->view('templates/footer', $data);
    }
}
