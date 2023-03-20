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

    //Add Data Form graduated
    public function add_graduated()
    {
        $this->forms_graduated->add_graduated();
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('graduated'));
    }
    //edit-forms-graduated
    public function edit_graduated()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/graduated/edit-forms-graduated.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms edit-forms-graduated'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/graduated/edit-forms-graduated', $data);
        $this->load->view('templates/footer', $data);
    }

    //Update Data graduated
    public function update_graduated($GraduatedSchoolID, $StudentReferenceID, $GraduatedGradeLevelCode, $EducationYear)
    {

        $this->forms_graduated->update_graduated($GraduatedSchoolID, $StudentReferenceID, $GraduatedGradeLevelCode, $EducationYear);
        $_SESSION['success'] = "แก้ไขข้อมูลเรียบร้อย";
        redirect(base_url('graduated-P2?SchoolID=' . $GraduatedSchoolID . '&&GraduatedGradeLevelCode=' . $GraduatedGradeLevelCode . '&&EducationYear=' . $EducationYear));
    }

    //Delete Data graduated
    public function delete_graduated($GraduatedSchoolID, $StudentReferenceID, $GraduatedGradeLevelCode, $EducationYear)
    {
        $this->forms_graduated->delete_graduated($StudentReferenceID);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('graduated-P2?SchoolID=' . $GraduatedSchoolID . '&&EducationYear=' . $EducationYear . '&&GraduatedGradeLevelCode=' . $GraduatedGradeLevelCode));
    }
}
