<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forms_school extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('School_model', 'forms_school');
    }
    
     //Page Form School
    public function index() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/forms-school.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = 'Forms School'; // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/forms-school', $data);
        $this->load->view('templates/footer', $data);
    }

    //Page Form School Detail
    public function detail() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/forms-school-detail.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = 'Forms School Detail'; // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/forms-school-detail', $data);
        $this->load->view('templates/footer', $data);
    }


     //Add Data Form School
     public function add_school() {

        //Page forms-school
        $this->form_validation->set_rules('NAME_TH', 'NAME_TH', 'required');
        $this->form_validation->set_rules('NAME_EN', 'NAME_EN', 'required');
        $this->form_validation->set_rules('ESTABLISHED_DATE', 'ESTABLISHED_DATE', 'required');
        $this->form_validation->set_rules('SCHOOL_TYPE_CODE', 'SCHOOL_TYPE_CODE', 'required');
        $this->form_validation->set_rules('SCHOOL_STATUS_CODE', 'SCHOOL_STATUS_CODE', 'required');
        $this->form_validation->set_rules('ADDRESS_PROVINCE_CODE', 'ADDRESS_PROVINCE_CODE', 'required');
        $this->form_validation->set_rules('ADDRESS_HOUSE_NO', 'ADDRESS_HOUSE_NO', 'required');
        $this->form_validation->set_rules('ADDRESS_MOO', 'ADDRESS_MOO', 'required');
        $this->form_validation->set_rules('ADDRESS_STREET', 'ADDRESS_STREET', 'required');
        $this->form_validation->set_rules('ADDRESS_SOI', 'ADDRESS_SOI', 'required');
        $this->form_validation->set_rules('ADDRESS_TROK', 'ADDRESS_TROK', 'required');
        $this->form_validation->set_rules('ADDRESS_SUBDISTRICT_CODE', 'ADDRESS_SUBDISTRICT_CODE', 'required');
        $this->form_validation->set_rules('ADDRESS_DISTRICT_CODE', 'ADDRESS_DISTRICT_CODE', 'required');
        $this->form_validation->set_rules('ADDRESS_PROVINCE_CODE', 'ADDRESS_PROVINCE_CODE', 'required');
        $this->form_validation->set_rules('ADDRESS_POSTCODE', 'ADDRESS_POSTCODE', 'required');
        $this->form_validation->set_rules('LATTITUDE', 'LATTITUDE', 'required');
        $this->form_validation->set_rules('LONGITUDE', 'LONGITUDE', 'required');
        $this->form_validation->set_rules('MAP_URL', 'MAP_URL', 'required');
        $this->form_validation->set_rules('PHONE_NUMBER', 'PHONE_NUMBER', 'required');
        $this->form_validation->set_rules('SECOND_PHONE_NUMBER', 'SECOND_PHONE_NUMBER',);
        $this->form_validation->set_rules('FAX_NUMBER', 'FAX_NUMBER', 'required');
        $this->form_validation->set_rules('SECOND_FAX_NUMBER', 'SECOND_FAX_NUMBER',);
        $this->form_validation->set_rules('EMAIL', 'EMAIL', 'required');
        $this->form_validation->set_rules('WEBSITE_URL', 'WEBSITE_URL', 'required');

        //Page forms-school-detail
        $this->form_validation->set_rules('EDUCATION_YEAR', 'EDUCATION_YEAR', 'required');
        $this->form_validation->set_rules('SEMESTER', 'SEMESTER', 'required');
        $this->form_validation->set_rules('AREA_NO', 'AREA_NO', 'required');
        $this->form_validation->set_rules('AREA_NAME', 'AREA_NAME', 'required');
        $this->form_validation->set_rules('JURISDICTION_CODE', 'JURISDICTION_CODE', 'required');
        $this->form_validation->set_rules('MUNICIPAL_CODE', 'MUNICIPAL_CODE', 'required');
        $this->form_validation->set_rules('INNOVATION_AREA_CODE', 'INNOVATION_AREA_CODE', 'required');
        $this->form_validation->set_rules('EDUCATION_LEVEL_CODES', 'EDUCATION_LEVEL_CODES', 'required');
        $this->form_validation->set_rules('ELECTRIC_TYPE_CODES', 'ELECTRIC_TYPE_CODES', 'required');
        $this->form_validation->set_rules('WATER_TYPE_CODES', 'WATER_TYPE_CODES', 'required');
        $this->form_validation->set_rules('INTERNET_TYPE_CODES', 'INTERNET_TYPE_CODES', 'required');
        $this->form_validation->set_rules('EDUCATION_CONTENTS', 'EDUCATION_CONTENTS', 'required');
        $this->form_validation->set_rules('COMPUTER_ONLINE_NUMBER', 'COMPUTER_ONLINE_NUMBER', 'required');
        $this->form_validation->set_rules('COMPUTER_STANDALONE_NUMBER', 'COMPUTER_STANDALONE_NUMBER', 'required');
        $this->form_validation->set_rules('COMPUTER_TEACH_NUMBER', 'COMPUTER_TEACH_NUMBER', 'required');
        $this->form_validation->set_rules('COMPUTER_MANAGE_NUMBER', 'COMPUTER_MANAGE_NUMBER', 'required');
        $this->form_validation->set_rules('TOILET_STUDENT_MALE_NUMBER', 'TOILET_STUDENT_MALE_NUMBER', 'required');
        $this->form_validation->set_rules('TOILET_STUDENT_FEMALE_NUMBER', 'TOILET_STUDENT_FEMALE_NUMBER', 'required');
        $this->form_validation->set_rules('TOILET_COMBINATION', 'TOILET_COMBINATION', 'required');


    
        if (!$this->form_validation->run())
        {
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url('forms-school'));
        }
        else
        {
            $this->forms_school->add_school();
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('school'));
        }
    
    }
}