<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Graduated extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Graduated_model', 'Graduated');
    }

    public function index()
    {

        if (!file_exists(APPPATH . 'views/pages/dashboard/graduated/graduated.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = 'graduated'; // Capitalize the first letter
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/graduated/graduated', $data);
        $this->load->view('templates/footer', $data);
    }

    public function P2()
    {

        if (!file_exists(APPPATH . 'views/pages/dashboard/graduated/graduated-P2.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = 'graduated'; // Capitalize the first letter
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/graduated/graduated-P2', $data);
        $this->load->view('templates/footer', $data);
    }
}
