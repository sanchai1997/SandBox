<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forms_school extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('School_model', 'forms_school');
    }

    ///////////////////////////////////SCHOOL/////////////////////////////////////////
    //Page Form School
    public function index()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/school/forms-school-P1.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = 'Forms School'; // Capitalize the first letter
        $data['ShowProvince'] = $this->forms_school->province();
        $data['ShowDistrict'] = $this->forms_school->district();
        $data['ShowSubdistrict'] = $this->forms_school->subdistrict();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/school/forms-school-P1', $data);
        $this->load->view('templates/footer', $data);
    }

    public function P2()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/school/forms-school-P2.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = 'Forms School Detail'; // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/school/forms-school-P2', $data);
        $this->load->view('templates/footer', $data);
    }


    //Add Data Form School
    public function add_school()
    {
        $this->forms_school->add_school();
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('school'));
    }

    //Edit Data Form School
    public function edit_school()
    {
        $data['title'] = "Edit School";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/school/edit-forms-school', $data);
        $this->load->view('templates/footer', $data);
    }

    //Add Data Form School
    public function update_school($id)
    {
        $this->forms_school->update_school($id);
        $_SESSION['success'] = "แก้ไขข้อมูลเรียบร้อย";
        redirect(base_url('school'));
    }
    //Delete Data Form School
    public function delete_school($id)
    {
        $this->forms_school->delete_school($id);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('school'));
    }
    ///////////////////////////////////SCHOOL- END /////////////////////////////////////////


    ///////////////////////////////////CLASSROM/////////////////////////////////////////////
    //Page Form Classroom
    public function classroom()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/school/forms-school-classroom.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = 'Forms School ClassRoom'; // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/school/forms-school-classroom', $data);
        $this->load->view('templates/footer', $data);
    }

    //Add Data Classroom
    public function add_classroom()
    {
        $this->forms_school->add_classroom();
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('school-classroom'));
    }

    //Edit Data Form ClassRoom
    public function edit_classroom()
    {
        $data['title'] = "Edit ClassRoom";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/school/edit-forms-classroom', $data);
        $this->load->view('templates/footer', $data);
    }

    //Add Data Form ClassRoom
    public function update_classroom($SchoolID, $ClassID)
    {

        $this->forms_school->update_classroom($SchoolID, $ClassID);
        $_SESSION['success'] = "แก้ไขข้อมูลเรียบร้อย";
        redirect(base_url('school-classroom-P2?SchoolID=' . $SchoolID));
    }

    //Delete Data Form ClassRoom
    public function delete_classroom($SchoolID, $ClassID)
    {
        $this->forms_school->delete_classroom($SchoolID, $ClassID);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('school-classroom-P2?SchoolID=' . $SchoolID));
    }
    ///////////////////////////////////CLASSROM- END /////////////////////////////////////////

    //////////////////////////////////////AWARD///////////////////////////////////////////////
    //Page Form AWARD
    public function award()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/school/forms-school-award.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = 'Forms School Award'; // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/school/forms-school-award', $data);
        $this->load->view('templates/footer', $data);
    }

    //Add Data AWARD
    public function add_award()
    {
        $this->forms_school->add_award();
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('school-award'));
    }

    //Edit Data Form ClassRoom
    public function edit_award()
    {
        $data['title'] = "Edit Award";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/school/edit-forms-award', $data);
        $this->load->view('templates/footer', $data);
    }

    //Add Data Form Award
    public function update_award($SchoolID, $Year, $Name)
    {

        $this->forms_school->update_award($SchoolID, $Year, $Name);
        $_SESSION['success'] = "แก้ไขข้อมูลเรียบร้อย";
        redirect(base_url('school-award-P2?SchoolID=' . $SchoolID));
    }

    //Delete Data Form Award
    public function delete_award($SchoolID, $Year, $Name)
    {
        $this->forms_school->delete_award($SchoolID, $Year, $Name);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('school-award-P2?SchoolID=' . $SchoolID));
    }
    ///////////////////////////////////// AWARD- END /////////////////////////////////////////
}
