<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forms_graduated extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Yourownconstructorcode
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Graduated_model', 'forms_graduated');
    }

    ///////////////////////////////////forms-graduated/////////////////////////////////
    //PageForm graduated
    public function index()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/graduated/forms-graduated.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms graduated'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/graduated/forms-graduated', $data);
        $this->load->view('templates/footer', $data);
    }

    //Delete Data graduated
    public function delete_graduated($StudentReferenceID, $SchoolID, $EducationYear, $Semester, $GradeLevelCode)
    {
        $this->forms_graduated->delete_graduated($StudentReferenceID, $SchoolID, $EducationYear, $Semester, $GradeLevelCode);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('graduated?SchoolID=' . $SchoolID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode));
    }
}
