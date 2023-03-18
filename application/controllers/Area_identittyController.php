<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area_identittyController extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        // Your own constructor code
        $this->load->library('session');
        $this->load->model('School_model');
        $this->load->model('Area_identitty_model');
        
        
    }
    public function forms_Area_identitty() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/Area_identitty/forms-area_identitty.php'))
        {
            show_404();
        }
        $data['listSchool'] = $this->School_model->get_school_All();
        $data['listReligion'] = $this->Area_identitty_model->get_RELIGION();
        $data['listOccupation'] = $this->Area_identitty_model->get_OCCUPATION();
        
      

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/forms/Area_identitty/forms-area_identitty',$data);
        $this->load->view('templates/footer');

    }

}