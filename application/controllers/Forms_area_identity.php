<?php defined('BASEPATH') or exit('No direct script access allowed');

class Forms_area_identity extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        if (!file_exists(APPPATH . 'views/pages/forms/forms-area_identity.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = 'Forms Area Identity'; // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/forms-area_identity', $data);
        $this->load->view('templates/footer', $data);
    }

}