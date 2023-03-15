<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forms_personnel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Yourownconstructorcode
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Personnel_model', 'forms_personnel');
    }

    ///////////////////////////////////forms-personnel/////////////////////////////////
    //PageForm personnel
    public function index()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/personnel/forms-personnel.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms personnel'; //Capitalizethefirstletter
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/personnel/forms-personnel', $data);
        $this->load->view('templates/footer', $data);
    }

    //PageForm personnel_P2
    public function P2()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/personnel/forms-personnel-P2.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms personnel-2'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/personnel/forms-personnel-P2', $data);
        $this->load->view('templates/footer', $data);
    }

    //Add Data Form personnel
    public function add_personnel()
    {
        $this->forms_personnel->add_personnel();
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('personnel'));
    }

    //edit-forms-personnel
    public function edit_personnel()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/personnel/edit-forms-personnel.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms edit-forms-personnel'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/personnel/edit-forms-personnel', $data);
        $this->load->view('templates/footer', $data);
    }

    //Update Data personnel
    public function update_personnel($PersonnelID)
    {

        $this->forms_personnel->update_personnel($PersonnelID);
        $_SESSION['success'] = "แก้ไขข้อมูลเรียบร้อย";
        redirect(base_url('personnel'));
    }


    //Delete Data personnel
    public function delete_personnel($PersonnelID)
    {
        $this->forms_personnel->delete_personnel($PersonnelID);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('personnel'));
    }



    //PageForms Additionalposition
    public function forms_additionalposition()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/personnel/forms-personnel-additionalposition.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms Additionalposition'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/personnel/forms-personnel-additionalposition', $data);
        $this->load->view('templates/footer', $data);
    }

    //Add Data Form additionalposition
    public function add_additionalposition($PersonnelID)
    {
        $this->forms_personnel->add_additionalposition();
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('personnel-additionalposition?PersonnelID=' . $PersonnelID));
    }

    //edit-forms-additionalposition
    public function edit_additionalposition()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/personnel/edit-forms-personnel-additionalposition.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms edit-forms-personnel-additionalposition'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/personnel/edit-forms-personnel-additionalposition', $data);
        $this->load->view('templates/footer', $data);
    }

    //Update Data additionalposition
    public function update_additionalposition($PersonnelID, $JurisdictionCode)
    {

        $this->forms_personnel->update_additionalposition($PersonnelID, $JurisdictionCode);
        $_SESSION['success'] = "แก้ไขข้อมูลเรียบร้อย";
        redirect(base_url('personnel-additionalposition?PersonnelID=' . $PersonnelID));
    }

    //Delete Data additionalposition
    public function delete_additionalposition($PersonnelID, $JurisdictionCode)
    {
        $this->forms_personnel->delete_additionalposition($PersonnelID, $JurisdictionCode);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('personnel-additionalposition?PersonnelID=' . $PersonnelID));
    }



    //PageForms academic
    public function forms_academic()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/personnel/forms-personnel-academic.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms academic'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/personnel/forms-personnel-academic', $data);
        $this->load->view('templates/footer', $data);
    }

    //Add Data Form academic
    public function add_academic($PersonnelID)
    {
        $this->forms_personnel->add_academic();
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('personnel-academic?PersonnelID=' . $PersonnelID));
    }

    //edit-forms-academic
    public function edit_academic()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/personnel/edit-forms-personnel-academic.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms edit-forms-personnel-academic'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/personnel/edit-forms-personnel-academic', $data);
        $this->load->view('templates/footer', $data);
    }

    //Update Data academic
    public function update_academic($PersonnelID, $JurisdictionCode)
    {

        $this->forms_personnel->update_academic($PersonnelID, $JurisdictionCode);
        $_SESSION['success'] = "แก้ไขข้อมูลเรียบร้อย";
        redirect(base_url('personnel-academic?PersonnelID=' . $PersonnelID));
    }

    //Delete Data academic
    public function delete_academic($PersonnelID, $JurisdictionCode)
    {
        $this->forms_personnel->delete_academic($PersonnelID, $JurisdictionCode);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('personnel-academic?PersonnelID=' . $PersonnelID));
    }

    //PageForms education
    public function forms_education()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/personnel/forms-personnel-education.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms education'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/personnel/forms-personnel-education', $data);
        $this->load->view('templates/footer', $data);
    }

    //Add Data Form education
    public function add_education($PersonnelID)
    {
        $this->forms_personnel->add_education();
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('personnel-education?PersonnelID=' . $PersonnelID));
    }

    //edit-forms-education
    public function edit_education()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/personnel/edit-forms-personnel-education.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms edit-forms-personnel-education'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/personnel/edit-forms-personnel-education', $data);
        $this->load->view('templates/footer', $data);
    }

    //Update Data education
    public function update_education($PersonnelID, $EducationLevelCode, $EducationMajorCode)
    {

        $this->forms_personnel->update_education($PersonnelID, $EducationLevelCode, $EducationMajorCode);
        $_SESSION['success'] = "แก้ไขข้อมูลเรียบร้อย";
        redirect(base_url('personnel-education?PersonnelID=' . $PersonnelID));
    }

    //Delete Data education
    public function delete_education($PersonnelID, $EducationLevelCode, $EducationMajorCode)
    {
        $this->forms_personnel->delete_education($PersonnelID, $EducationLevelCode, $EducationMajorCode);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('personnel-education?PersonnelID=' . $PersonnelID));
    }


    //PageForms assistance
    public function forms_assistance()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/personnel/forms-personnel-assistance.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms assistance'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/personnel/forms-personnel-assistance', $data);
        $this->load->view('templates/footer', $data);
    }

    //Add Data Form assistance
    public function add_assistance($PersonnelID)
    {
        $this->forms_personnel->add_assistance();
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('personnel-assistance?PersonnelID=' . $PersonnelID));
    }

    //edit-forms-assistance
    public function edit_assistance()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/personnel/edit-forms-personnel-assistance.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms edit-forms-personnel-assistance'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/personnel/edit-forms-personnel-assistance', $data);
        $this->load->view('templates/footer', $data);
    }

    //Update Data assistance
    public function update_assistance($PersonnelID, $JurisdictionCode, $AssistanceTypeCode)
    {

        $this->forms_personnel->update_assistance($PersonnelID, $JurisdictionCode, $AssistanceTypeCode);
        $_SESSION['success'] = "แก้ไขข้อมูลเรียบร้อย";
        redirect(base_url('personnel-assistance?PersonnelID=' . $PersonnelID));
    }

    //Delete Data assistance
    public function delete_assistance($PersonnelID, $JurisdictionCode, $AssistanceTypeCode)
    {
        $this->forms_personnel->delete_assistance($PersonnelID, $JurisdictionCode, $AssistanceTypeCode);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('personnel-assistance?PersonnelID=' . $PersonnelID));
    }
}
