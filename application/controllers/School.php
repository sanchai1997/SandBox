<?php
defined('BASEPATH') or exit('No direct script access allowed');

class School extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('School_model', 'school');
    }

    ///////////////////////////////////SCHOOL/////////////////////////////////////////
    public function index()
    {

        if (!file_exists(APPPATH . 'views/pages/dashboard/school/school.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = 'School'; // Capitalize the first letter
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/school/school', $data);
        $this->load->view('templates/footer', $data);
    }
    ///////////////////////////////////SCHOOL- END /////////////////////////////////////////

    ///////////////////////////////////CLASSROM/////////////////////////////////////////////
    public function classroom()
    {

        if (!file_exists(APPPATH . 'views/pages/dashboard/school/school-classroom.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }


        $data['title'] = 'School-classrom'; // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/school/school-classroom', $data);
        $this->load->view('templates/footer', $data);
    }

    ///////////////////////////////////CLASSROM- END /////////////////////////////////////////

    //////////////////////////////////////AWARD///////////////////////////////////////////////
    public function award()
    {

        if (!file_exists(APPPATH . 'views/pages/dashboard/school/school-award.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }


        $data['title'] = 'School-award'; // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/school/school-award', $data);
        $this->load->view('templates/footer', $data);
    }
    ///////////////////////////////////// AWARD- END /////////////////////////////////////////

    //////////////////////////////////////Building///////////////////////////////////////////////
    public function building()
    {

        if (!file_exists(APPPATH . 'views/pages/dashboard/school/school-building.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }


        $data['title'] = 'School-Building'; // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/school/school-building', $data);
        $this->load->view('templates/footer', $data);
    }
    ///////////////////////////////////// Building- END /////////////////////////////////////////

    //////////////////////////////////////Building///////////////////////////////////////////////
    public function school_uploaddetail()
    {

        if (!file_exists(APPPATH . 'views/pages/dashboard/school/school-uploaddetail.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }


        $data['title'] = 'School-uploaddetail'; // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/school/school-uploaddetail', $data);
        $this->load->view('templates/footer', $data);
    }
    ///////////////////////////////////// Building- END /////////////////////////////////////////

}
