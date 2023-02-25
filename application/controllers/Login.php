<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Project_model', 'project');
    }

    public function index() {
           if ( ! file_exists(APPPATH.'views/pages/auth/login.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = 'Index'; // Capitalize the first letter

        $this->load->view('pages/auth/login', $data);

    }
}
?>