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
    public function classroom_P2()
    {

        if (!file_exists(APPPATH . 'views/pages/dashboard/school/school-classroom-P2.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }


        $data['title'] = 'School-classrom-detail'; // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/school/school-classroom-P2', $data);
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

    public function award_P2()
    {

        if (!file_exists(APPPATH . 'views/pages/dashboard/school/school-award-P2.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }


        $data['title'] = 'School-award-P2'; // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/school/school-award-P2', $data);
        $this->load->view('templates/footer', $data);
    }
    ///////////////////////////////////// AWARD- END /////////////////////////////////////////

}
