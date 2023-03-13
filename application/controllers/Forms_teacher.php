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

    //PageForm teacher
    public function teacher_P2()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/teacher/forms-teacher-P2.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms Teacher-P2'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/teacher/forms-teacher-P2', $data);
        $this->load->view('templates/footer', $data);
    }
    ////////////////////////////////forms-teacher-P2-END///////////////////////////

    ////////////////////////////////edit-forms-teacher///////////////////////////////////
    //edit-forms-teacher
    public function edit_teacher()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/teacher/edit-forms-teacher.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms edit-forms-teacher'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/teacher/edit-forms-teacher', $data);
        $this->load->view('templates/footer', $data);
    }
    /////////////////////////edit-forms-teacher-END////////////////////////////////////


    //Add Data Form teacher
    public function add_teacher()
    {
        $this->forms_teacher->add_teacher();
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('teacher'));
    }

    //Update Data teacher
    public function update_teacher($TeacherID)
    {

        $this->forms_teacher->update_teacher($TeacherID);
        $_SESSION['success'] = "แก้ไขข้อมูลเรียบร้อย";
        redirect(base_url('teacher'));
    }


    //Delete Data teacher
    public function delete_teacher($TeacherID)
    {
        $this->forms_teacher->delete_teacher($TeacherID);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('teacher'));
    }
    ///////////////////////////////////SCHOOL-END/////////////////////////////////////////
}
