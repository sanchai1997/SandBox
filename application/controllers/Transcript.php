<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transcript extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Transcript_model', 'school');
    }

    public function index()
    {

        if (!file_exists(APPPATH . 'views/pages/dashboard/transcript/transcript.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = 'transcript'; // Capitalize the first letter
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/transcript/transcript', $data);
        $this->load->view('templates/footer', $data);
    }

    public function transcript_subject()
    {

        if (!file_exists(APPPATH . 'views/pages/dashboard/transcript/transcript-subject.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = 'transcript-subject'; // Capitalize the first letter
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/transcript/transcript-subject', $data);
        $this->load->view('templates/footer', $data);
    }
}
