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

    //PageForm additional-position
    public function additional_position()
    {

        if (!file_exists(APPPATH . 'views/pages/dashboard/personnel/personnel-additionalposition.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = 'personnel-additional-position'; // Capitalize the first letter
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/personnel/personnel-additionalposition', $data);
        $this->load->view('templates/footer', $data);
    }
}
