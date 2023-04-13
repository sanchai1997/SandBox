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

    public function forms_personnel_select()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/personnel/forms-personnel-select.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms personnel'; //Capitalizethefirstletter
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/personnel/forms-personnel-select', $data);
        $this->load->view('templates/footer', $data);
    }


    //Add Data Form personnel
    public function add_personnel()
    {
        $result = $this->db->query('SELECT * 
        FROM PERSONNEL
        WHERE DeleteStatus = 0
        AND PersonnelPersonalID = ' . $_POST['PersonnelPersonalID'] . '
        ')->result();
        if ($result != TRUE) {
            $this->forms_personnel->add_personnel();
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('personnel'));
        } else {
            $_SESSION['danger'] = "ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบข้อมูลครูอาจจะซ้ำกันในระบบ";
            redirect(base_url('forms-personnel'));
        }
    }

    //Delete Data personnel
    public function delete_personnel($PersonnelID, $JurisdictionCode, $PersonnelTypeCode, $PositionCode)
    {
        $this->forms_personnel->delete_personnel($PersonnelID);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('personnel?JurisdictionCode=' . $JurisdictionCode . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode));
    }

    public function edit_forms_personnel_main()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/personnel/edit-forms-personnel-main.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms personnel'; //Capitalizethefirstletter
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/personnel/edit-forms-personnel-main', $data);
        $this->load->view('templates/footer', $data);
    }

    //update_personnel_main
    public function update_personnel_main($PersonnelID, $JurisdictionCode, $PersonnelTypeCode, $PositionCode, $ImagePersonnel)
    {
        $this->forms_personnel->update_personnel_main($PersonnelID, $ImagePersonnel);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('personnel?PersonnelID=' . $PersonnelID . '&&JurisdictionCode=' . $JurisdictionCode . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
    }

    public function edit_forms_personnel_person()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/personnel/edit-forms-personnel-person.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms personnel'; //Capitalizethefirstletter
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/personnel/edit-forms-personnel-person', $data);
        $this->load->view('templates/footer', $data);
    }

    public function update_personnel_person($PersonnelID, $JurisdictionCode, $PersonnelTypeCode, $PositionCode)
    {
        $this->forms_personnel->update_personnel_person($PersonnelID);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('personnel?PersonnelID=' . $PersonnelID . '&&JurisdictionCode=' . $JurisdictionCode . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
    }


    public function edit_forms_personnel_address()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/personnel/edit-forms-personnel-address.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms personnel'; //Capitalizethefirstletter
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/personnel/edit-forms-personnel-address', $data);
        $this->load->view('templates/footer', $data);
    }

    public function update_personnel_address($PersonnelID, $JurisdictionCode, $PersonnelTypeCode, $PositionCode)
    {
        $this->forms_personnel->update_personnel_address($PersonnelID);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('personnel?PersonnelID=' . $PersonnelID . '&&JurisdictionCode=' . $JurisdictionCode . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
    }

    public function edit_forms_personnel_contract()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/personnel/edit-forms-personnel-contract.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms personnel'; //Capitalizethefirstletter
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/personnel/edit-forms-personnel-contract', $data);
        $this->load->view('templates/footer', $data);
    }

    public function update_personnel_contract($PersonnelID, $JurisdictionCode, $PersonnelTypeCode, $PositionCode)
    {
        $this->forms_personnel->update_personnel_contract($PersonnelID);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('personnel?PersonnelID=' . $PersonnelID . '&&JurisdictionCode=' . $JurisdictionCode . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
    }

    public function edit_forms_personnel_talent()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/personnel/edit-forms-personnel-talent.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms personnel'; //Capitalizethefirstletter
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/personnel/edit-forms-personnel-talent', $data);
        $this->load->view('templates/footer', $data);
    }

    public function update_personnel_talent($PersonnelID, $JurisdictionCode, $PersonnelTypeCode, $PositionCode)
    {
        $this->forms_personnel->update_personnel_talent($PersonnelID);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('personnel?PersonnelID=' . $PersonnelID . '&&JurisdictionCode=' . $JurisdictionCode . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
    }

    public function forms_personnel_education()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/personnel/forms-personnel-education.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms personnel'; //Capitalizethefirstletter
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/personnel/forms-personnel-education', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add_personnel_education($PersonnelID, $JurisdictionCode, $PersonnelTypeCode, $PositionCode)
    {
        $result = $this->db->query('SELECT * 
        FROM PERSONNEL_EDUCATION_DEGREE 
        WHERE DeleteStatus = 0
        AND PersonnelID = "' . $PersonnelID . '"
        AND EducationLevelCode  = ' . $_POST['EducationLevelCode'] . '
        AND EducationMajorCode   = ' . $_POST['EducationMajorCode'] . '
        AND EducationDegreeCode    = ' . $_POST['EducationDegreeCode'] . '
        ')->result();
        if ($result != TRUE) {
            $this->forms_personnel->add_personnel_education($PersonnelID);
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('personnel-education?PersonnelID=' . $PersonnelID . '&&JurisdictionCode=' . $JurisdictionCode . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
        } else {
            $_SESSION['danger'] = "ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบข้อมูลอาจจะซ้ำกันในระบบ";
            redirect(base_url('forms-personnel-education?PersonnelID=' . $PersonnelID . '&&JurisdictionCode=' . $JurisdictionCode . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
        }
    }

    //Delete Data personnel education
    public function delete_personnel_education($PersonnelID, $JurisdictionCode, $PersonnelTypeCode, $PositionCode, $EducationLevelCode, $EducationMajorCode, $EducationDegreeCode)
    {
        $this->forms_personnel->delete_personnel_education($PersonnelID, $EducationLevelCode, $EducationMajorCode, $EducationDegreeCode);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('personnel-education?PersonnelID=' . $PersonnelID . '&&JurisdictionCode=' . $JurisdictionCode . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
    }

    public function edit_forms_personnel_education()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/personnel/edit-forms-personnel-education.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms personnel'; //Capitalizethefirstletter
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/personnel/edit-forms-personnel-education', $data);
        $this->load->view('templates/footer', $data);
    }

    public function update_personnel_education($PersonnelID, $JurisdictionCode, $PersonnelTypeCode, $PositionCode, $EducationLevelCode, $EducationMajorCode, $EducationDegreeCode)
    {
        $this->forms_personnel->update_personnel_education($PersonnelID, $EducationLevelCode, $EducationMajorCode, $EducationDegreeCode);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('personnel-education?PersonnelID=' . $PersonnelID . '&&JurisdictionCode=' . $JurisdictionCode . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
    }

    public function forms_personnel_position()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/personnel/forms-personnel-position.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms personnel'; //Capitalizethefirstletter
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/personnel/forms-personnel-position', $data);
        $this->load->view('templates/footer', $data);
    }

    //Add_position_position
    public function add_personnel_position($PersonnelID, $JurisdictionCode, $PersonnelTypeCode, $PositionCode)
    {
        $result = $this->db->query('SELECT * 
        FROM PERSONNEL_ADDITIONAL_POSITION 
        WHERE DeleteStatus = 0
        AND PersonnelID = "' . $PersonnelID . '"
        AND JurisdictionCode = ' . $JurisdictionCode . '
        AND AdditionalDepartmentCode = ' . $_POST['AdditionalDepartmentCode'] . '
        AND AdditionalDutyDate = "' . $_POST['AdditionalDutyDate'] . '"
        ')->result();

        if ($result != TRUE) {
            $this->forms_personnel->add_personnel_position($PersonnelID, $JurisdictionCode);
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('personnel-position?PersonnelID=' . $PersonnelID . '&&JurisdictionCode=' . $JurisdictionCode . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
        } else {
            $_SESSION['danger'] = "ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบข้อมูลกลุ่มและวันที่เริ่มปฎิบัติอาจจะซ้ำกันในระบบ";
            redirect(base_url('forms-personnel-position?PersonnelID=' . $PersonnelID . '&&JurisdictionCode=' . $JurisdictionCode . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
        }
    }

    //update_Personnel_position
    public function update_personnel_position($PersonnelID, $JurisdictionCode, $PersonnelTypeCode, $PositionCode, $AdditionalDepartmentCode, $AdditionalDutyDate, $AdditionalDocumentURL)
    {
        $this->forms_personnel->update_personnel_position($PersonnelID, $JurisdictionCode, $AdditionalDepartmentCode, $AdditionalDutyDate, $AdditionalDocumentURL);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('personnel-position?PersonnelID=' . $PersonnelID . '&&JurisdictionCode=' . $JurisdictionCode . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
    }


    //Delete Data Form personnel_position
    public function delete_personnel_position($PersonnelID, $JurisdictionCode, $PersonnelTypeCode, $PositionCode, $AdditionalDepartmentCode, $AdditionalDutyDate)
    {
        $this->forms_personnel->delete_personnel_position($PersonnelID, $JurisdictionCode, $AdditionalDepartmentCode, $AdditionalDutyDate);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('personnel-position?PersonnelID=' . $PersonnelID . '&&JurisdictionCode=' . $JurisdictionCode . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
    }

    public function edit_forms_personnel_position()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/personnel/edit-forms-personnel-position.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms personnel'; //Capitalizethefirstletter
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/personnel/edit-forms-personnel-position', $data);
        $this->load->view('templates/footer', $data);
    }

    public function forms_personnel_assistance()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/personnel/forms-personnel-assistance.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms personnel'; //Capitalizethefirstletter
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/personnel/forms-personnel-assistance', $data);
        $this->load->view('templates/footer', $data);
    }

    //Add_personnel_assistance
    public function add_personnel_assistance($PersonnelID, $JurisdictionCode, $PersonnelTypeCode, $PositionCode)
    {
        $result = $this->db->query('SELECT * 
        FROM PERSONNEL_ASSISTANCE 
        WHERE DeleteStatus = 0 AND PersonnelID = "' . $PersonnelID . '" AND JurisdictionCode = ' . $JurisdictionCode . '
        AND AssistanceTypeCode = ' . $_POST['AssistanceTypeCode'] . '
        AND AssistanceStartDate = "' . $_POST['AssistanceStartDate'] . '"
        ')->result();

        if ($result != TRUE) {
            $this->forms_personnel->add_personnel_assistance($PersonnelID, $JurisdictionCode);
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('personnel-assistance?PersonnelID=' . $PersonnelID . '&&JurisdictionCode=' . $JurisdictionCode . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
        } else {
            $_SESSION['danger'] = "ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบข้อมูลประเภทและวันที่อาจจะซ้ำกันในระบบ";
            redirect(base_url('forms-personnel-assistance?PersonnelID=' . $PersonnelID . '&&JurisdictionCode=' . $JurisdictionCode . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
        }
    }

    public function edit_forms_personnel_assistance()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/personnel/edit-forms-personnel-assistance.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms personnel'; //Capitalizethefirstletter
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/personnel/edit-forms-personnel-assistance', $data);
        $this->load->view('templates/footer', $data);
    }

    //update_personnel_assistance
    public function update_personnel_assistance($PersonnelID, $JurisdictionCode, $PersonnelTypeCode, $PositionCode, $AssistanceTypeCode, $AssistanceStartDate, $AssistanceDocumentURL)
    {
        $this->forms_personnel->update_personnel_assistance($PersonnelID, $JurisdictionCode, $AssistanceTypeCode, $AssistanceStartDate, $AssistanceDocumentURL);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('personnel-assistance?PersonnelID=' . $PersonnelID . '&&JurisdictionCode=' . $JurisdictionCode . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
    }

    //Delete Data Form personnel_assistance
    public function delete_personnel_assistance($PersonnelID, $JurisdictionCode, $PersonnelTypeCode, $PositionCode, $AssistanceTypeCode, $AssistanceStartDate)
    {
        $this->forms_personnel->delete_personnel_assistance($PersonnelID, $JurisdictionCode, $AssistanceTypeCode, $AssistanceStartDate);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('personnel-assistance?PersonnelID=' . $PersonnelID . '&&JurisdictionCode=' . $JurisdictionCode . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
    }

    public function forms_personnel_academic()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/personnel/forms-personnel-academic.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms personnel'; //Capitalizethefirstletter
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/personnel/forms-personnel-academic', $data);
        $this->load->view('templates/footer', $data);
    }

    public function edit_forms_personnel_academic()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/personnel/edit-forms-personnel-academic.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms personnel'; //Capitalizethefirstletter
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/personnel/edit-forms-personnel-academic', $data);
        $this->load->view('templates/footer', $data);
    }

    //Add_personnel_academic
    public function add_personnel_academic($PersonnelID, $JurisdictionCode, $PersonnelTypeCode, $PositionCode)
    {
        $result = $this->db->query('SELECT * 
         FROM PERSONNEL_ACADEMIC 
         WHERE DeleteStatus = 0
         AND JurisdictionCode = ' . $JurisdictionCode . ' 
         AND PersonnelID = "' . $PersonnelID . '"
         AND AcademicStandingCode = ' . $_POST['AcademicStandingCode'] . '
         ')->result();

        if ($result != TRUE) {
            $this->forms_personnel->add_personnel_academic($PersonnelID, $JurisdictionCode);
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('personnel-academic?PersonnelID=' . $PersonnelID . '&&JurisdictionCode=' . $JurisdictionCode . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
        } else {
            $_SESSION['danger'] = "ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบข้อมูลวิทยาฐานะและตำแหน่งอาจจะซ้ำกันในระบบ";
            redirect(base_url('forms-personnel-academic?PersonnelID=' . $PersonnelID . '&&JurisdictionCode=' . $JurisdictionCode . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
        }
    }

    //update_personnel_academic
    public function update_personnel_academic($PersonnelID, $JurisdictionCode, $PersonnelTypeCode, $PositionCode, $AcademicStandingCode)
    {
        $this->forms_personnel->update_personnel_academic($PersonnelID, $JurisdictionCode, $AcademicStandingCode);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('personnel-academic?PersonnelID=' . $PersonnelID . '&&JurisdictionCode=' . $JurisdictionCode . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
    }

    //Delete Data Form personnel_academic
    public function delete_personnel_academic($PersonnelID, $JurisdictionCode, $PersonnelTypeCode, $PositionCode, $AcademicStandingCode)
    {
        $this->forms_personnel->delete_personnel_academic($PersonnelID, $JurisdictionCode, $AcademicStandingCode);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('personnel-academic?PersonnelID=' . $PersonnelID . '&&JurisdictionCode=' . $JurisdictionCode . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
    }
}
