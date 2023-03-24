<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forms_teacher extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Yourownconstructorcode
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Teacher_model', 'forms_teacher');
    }

    ///////////////////////////////////forms-teacher/////////////////////////////////
    //PageForm teacher
    public function index()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/teacher/forms-teacher.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms Teacher'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/teacher/forms-teacher', $data);
        $this->load->view('templates/footer', $data);
    }

    //Add Data Form teacher
    public function add_teacher($SchoolID)
    {
        $this->forms_teacher->add_teacher($SchoolID);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('teacher?SchoolID=' . $SchoolID));
    }
    ////////////////////////////// forms-teacher-END/////////////////////////////////

    ///////////////////////////////////forms-teacher-select/////////////////////////////////
    //Pageforms-teacher-select
    public function forms_teacher_select()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/teacher/forms-teacher-select.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms Teacher-select'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/teacher/forms-teacher-select', $data);
        $this->load->view('templates/footer', $data);
    }

    //Add Data Form teacher
    public function add_teacher_select($SchoolID, $EducationYear, $Semester, $EntryMajorCode, $EntryProgramCode)
    {
        $this->forms_teacher->add_teacher_select($SchoolID, $EducationYear, $Semester, $EntryMajorCode, $EntryProgramCode);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('teacher?SchoolID=' . $SchoolID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&EntryMajorCode=' . $EntryMajorCode . '&&EntryProgramCode=' . $EntryProgramCode));
    }
    ////////////////////////////// forms-teacher-END/////////////////////////////////


    //Delete Data Form teacher
    public function delete_teacher($TeacherID, $SchoolID, $EducationYear, $Semester, $EntryMajorCode, $EntryProgramCode)
    {
        $this->forms_teacher->delete_teacher($TeacherID);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('teacher?SchoolID=' . $SchoolID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&EntryMajorCode=' . $EntryMajorCode . '&&EntryProgramCode=' . $EntryProgramCode));
    }
}
