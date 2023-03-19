<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forms_transcript extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Yourownconstructorcode
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Transcript_model', 'forms_transcript');
    }

    ///////////////////////////////////forms-transcript/////////////////////////////////
    //PageForm transcript
    public function index()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/transcript/forms-transcript.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms Teacher'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/transcript/forms-transcript', $data);
        $this->load->view('templates/footer', $data);
    }
}
