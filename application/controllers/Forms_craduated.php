<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forms_craduated extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Yourownconstructorcode
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Craduated_model', 'forms_craduated');
    }

    ///////////////////////////////////forms-craduated/////////////////////////////////
    //PageForm craduated
    public function index()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/craduated/forms-craduated.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms craduated'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/craduated/forms-craduated', $data);
        $this->load->view('templates/footer', $data);
    }
}
