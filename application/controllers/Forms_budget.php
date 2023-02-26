<?php defined('BASEPATH') or exit('No direct script access allowed');

class Forms_budget extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (!file_exists(APPPATH . 'views/pages/forms/forms-budget.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = 'Forms budget'; // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/forms-budget', $data);
        $this->load->view('templates/footer', $data);
    }

}