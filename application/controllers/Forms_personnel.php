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



    //PageForm additionalposition
    public function forms_additionalposition()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/personnel/forms-additionalposition.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms Additionalposition'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/personnel/forms-additionalposition', $data);
        $this->load->view('templates/footer', $data);
    }
}
