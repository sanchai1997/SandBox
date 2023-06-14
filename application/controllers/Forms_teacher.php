<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once '_sandboxcontroller.php';

class Forms_teacher extends _sandboxcontroller
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
        $result = $this->db->query('SELECT * 
        FROM TEACHER
        WHERE DeleteStatus = 0 AND SchoolID = ' . $SchoolID . ' 
        AND TeacherPersonalID = ' . $_POST['TeacherPersonalID'] . '
        ')->result();

        $TeacherPersonalID = $this->sandb_encode($_POST['TeacherPersonalID']);
        $TeacherPassportNumber = $this->sandb_encode($_POST['TeacherPassportNumber']);
        $TeacherBirthDate = $this->sandb_encode($_POST['TeacherBirthDate']);

        if ($result != TRUE) {
            $this->forms_teacher->add_teacher($SchoolID, $TeacherPersonalID, $TeacherPassportNumber, $TeacherBirthDate);
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('teacher?SchoolID=' . $SchoolID));
        } else {
            $_SESSION['danger'] = "ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบข้อมูลครูอาจจะซ้ำกันในระบบ";
            redirect(base_url('forms-teacher?SchoolID=' . $SchoolID));
        }
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
    public function add_teacher_select($SchoolID, $EntryMajorCode, $EntryProgramCode)
    {
        $result = $this->db->query('SELECT * 
        FROM TEACHER
        WHERE DeleteStatus = 0 AND SchoolID = ' . $SchoolID . ' 
        AND TeacherPersonalID = ' . $_POST['TeacherPersonalID'] . '
        ')->result();
        $TeacherPersonalID = $this->sandb_encode($_POST['TeacherPersonalID']);
        $TeacherPassportNumber = $this->sandb_encode($_POST['TeacherPassportNumber']);
        $TeacherBirthDate = $this->sandb_encode($_POST['TeacherBirthDate']);

        if ($result != TRUE) {
            $this->forms_teacher->add_teacher_select($SchoolID, $EntryMajorCode, $EntryProgramCode, $TeacherPersonalID, $TeacherPassportNumber, $TeacherBirthDate);
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('teacher?SchoolID=' . $SchoolID . '&&EntryMajorCode=' . $EntryMajorCode . '&&EntryProgramCode=' . $EntryProgramCode));
        } else {
            $_SESSION['danger'] = "ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบข้อมูลครูอาจจะซ้ำกันในระบบ";
            redirect(base_url('forms-teacher-select?SchoolID=' . $SchoolID . '&&EntryMajorCode=' . $EntryMajorCode . '&&EntryProgramCode=' . $EntryProgramCode));
        }
    }
    ////////////////////////////// forms-teacher-END/////////////////////////////////

    ///////////////////////////////edit_forms_teacher_main/////////////////////////////////
    //PageEdit MAIN
    public function edit_forms_teacher_main()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/teacher/edit-forms-teacher-main.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms Teacher-select'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/teacher/edit-forms-teacher-main', $data);
        $this->load->view('templates/footer', $data);
    }

    //update_teacher_main
    public function update_teacher_main($TeacherID, $SchoolID, $PersonnelTypeCode, $PositionCode, $ImageTeacher)
    {
        $this->forms_teacher->update_teacher_main($TeacherID, $SchoolID, $ImageTeacher);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('teacher?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
    }
    //////////////////////////// edit_forms_teacher_main-END//////////////////////////////

    ///////////////////////////////edit_forms_teacher_person/////////////////////////////////
    //PageEdit person
    public function edit_forms_teacher_person()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/teacher/edit-forms-teacher-person.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        if (isset($_GET['TeacherID'])) {
            $result = $this->db->query('SELECT * FROM TEACHER
            WHERE DeleteStatus = 0 AND TeacherID = "' . $_GET['TeacherID'] . '"');
            foreach ($result->result() as $DETAIL) {
                $data['TeacherPersonalID'] = $this->sandb_decode($DETAIL->TeacherPersonalID);
                $data['TeacherPassportNumber'] = $this->sandb_decode($DETAIL->TeacherPassportNumber);
                $data['TeacherBirthDate'] = $this->sandb_decode($DETAIL->TeacherBirthDate);
            }
        }

        $data['title'] = 'Forms Teacher-select'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/teacher/edit-forms-teacher-person', $data);
        $this->load->view('templates/footer', $data);
    }

    //update_teacher_person
    public function update_teacher_person($TeacherID, $SchoolID, $PersonnelTypeCode, $PositionCode)
    {
        $TeacherPersonalID = $this->sandb_encode($_POST['TeacherPersonalID']);
        $TeacherPassportNumber = $this->sandb_encode($_POST['TeacherPassportNumber']);
        $TeacherBirthDate = $this->sandb_encode($_POST['TeacherBirthDate']);

        $this->forms_teacher->update_teacher_person($TeacherID, $SchoolID, $TeacherPersonalID, $TeacherPassportNumber, $TeacherBirthDate);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย " . $TeacherPersonalID;
        redirect(base_url('teacher?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
    }
    //////////////////////////// edit_forms_teacher_person-END//////////////////////////////

    ///////////////////////////////edit_forms_teacher_marriage/////////////////////////////////
    //PageEdit marriage
    public function edit_forms_teacher_marriage()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/teacher/edit-forms-teacher-marriage.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms Teacher-select'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/teacher/edit-forms-teacher-marriage', $data);
        $this->load->view('templates/footer', $data);
    }

    //update_teacher_marriage
    public function update_teacher_marriage($TeacherID, $SchoolID, $PersonnelTypeCode, $PositionCode)
    {
        $this->forms_teacher->update_teacher_marriage($TeacherID, $SchoolID, $PersonnelTypeCode, $PositionCode);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('teacher?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
    }
    //////////////////////////// edit_forms_teacher_marriage-END//////////////////////////////


    ///////////////////////////////edit_forms_teacher_address/////////////////////////////////
    //PageEdit address
    public function edit_forms_teacher_address()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/teacher/edit-forms-teacher-address.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms Teacher-select'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/teacher/edit-forms-teacher-address', $data);
        $this->load->view('templates/footer', $data);
    }

    //update_teacher_address
    public function update_teacher_address($TeacherID, $SchoolID, $PersonnelTypeCode, $PositionCode)
    {
        $this->forms_teacher->update_teacher_address($TeacherID, $SchoolID);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('teacher?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
    }
    //////////////////////////// edit_forms_teacher_address-END//////////////////////////////


    ///////////////////////////////edit_forms_teacher_contract/////////////////////////////////
    //PageEdit contract
    public function edit_forms_teacher_contract()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/teacher/edit-forms-teacher-contract.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms Teacher-select'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/teacher/edit-forms-teacher-contract', $data);
        $this->load->view('templates/footer', $data);
    }

    //update_teacher_contract
    public function update_teacher_contract($TeacherID, $SchoolID, $PersonnelTypeCode, $PositionCode)
    {
        $this->forms_teacher->update_teacher_contract($TeacherID, $SchoolID);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('teacher?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
    }
    //////////////////////////// edit_forms_teacher_contract-END//////////////////////////////

    ///////////////////////////////edit_forms_teacher_signature/////////////////////////////////
    //PageEdit contract
    public function edit_forms_teacher_signature()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/teacher/edit-forms-teacher-signature.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms Teacher-signature'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/teacher/edit-forms-teacher-signature', $data);
        $this->load->view('templates/footer', $data);
    }

    //update_teacher_signature
    public function update_teacher_signature($TeacherID, $SchoolID, $PersonnelTypeCode, $PositionCode, $Signature)
    {
        $this->forms_teacher->update_teacher_signature($TeacherID, $SchoolID, $Signature);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('teacher?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
    }
    //////////////////////////// edit_forms_teacher_signature-END/////////////////////////////


    ///////////////////////////////edit_forms_teacher_talent/////////////////////////////////
    //PageEdit talent
    public function edit_forms_teacher_talent()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/teacher/edit-forms-teacher-talent.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms Teacher-select'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/teacher/edit-forms-teacher-talent', $data);
        $this->load->view('templates/footer', $data);
    }

    //update_teacher_talent
    public function update_teacher_talent($TeacherID, $SchoolID, $PersonnelTypeCode, $PositionCode)
    {
        $this->forms_teacher->update_teacher_talent($TeacherID, $SchoolID);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('teacher?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
    }
    //////////////////////////// edit_forms_teacher_contract-END//////////////////////////////

    //Delete Data Form teacher
    public function delete_teacher($TeacherID, $SchoolID, $PersonnelTypeCode, $PositionCode)
    {
        $this->forms_teacher->delete_teacher($TeacherID, $SchoolID);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('teacher?SchoolID=' . $SchoolID . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode));
    }



    ///////////////////////////////teacher certificate/////////////////////////////////
    //PageEdit talent
    public function forms_teacher_certificate()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/teacher/forms-teacher-certificate.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms Teacher-select'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/teacher/forms-teacher-certificate', $data);
        $this->load->view('templates/footer', $data);
    }

    public function edit_teacher_certificate()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/teacher/edit-forms-teacher-certificate.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms Teacher-select'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/teacher/edit-forms-teacher-certificate', $data);
        $this->load->view('templates/footer', $data);
    }

    //Add_teacher_talent
    public function add_teacher_certificate($TeacherID, $SchoolID, $PersonnelTypeCode, $PositionCode)
    {
        $result = $this->db->query('SELECT * 
        FROM TEACHER_CERTIFICATE 
        WHERE DeleteStatus = 0 AND SchoolID = ' . $SchoolID . ' 
        AND TeacherID = "' . $TeacherID . '"
        AND CertificateCode = ' . $_POST['CertificateCode'] . '
        AND CertificateLicenseNumber = ' . $_POST['CertificateLicenseNumber'] . '
        ')->result();

        if ($result != TRUE) {
            $this->forms_teacher->add_teacher_certificate($TeacherID, $SchoolID);
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('teacher-certificate?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
        } else {
            $_SESSION['danger'] = "ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบข้อมูลประเภทและเลขที่อาจจะซ้ำกันในระบบ";
            redirect(base_url('forms-teacher-certificate?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
        }
    }

    //update_teacherr_certificate
    public function update_teacher_certificate($TeacherID, $SchoolID, $PersonnelTypeCode, $PositionCode, $CertificateCode, $CertificateLicenseNumber)
    {
        $this->forms_teacher->update_teacher_certificate($TeacherID, $SchoolID, $CertificateCode, $CertificateLicenseNumber);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('teacher-certificate?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
    }

    //Delete Data Form teacher_certificate
    public function delete_teacher_certificate($TeacherID, $SchoolID, $PersonnelTypeCode, $PositionCode, $CertificateCode, $CertificateLicenseNumber)
    {
        $this->forms_teacher->delete_teacher_certificate($TeacherID, $SchoolID, $CertificateCode, $CertificateLicenseNumber);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('teacher-certificate?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode));
    }

    ////////////////////////////teacher_certificate-END//////////////////////////////



    ///////////////////////////////teacher position/////////////////////////////////
    //PageEdit position
    public function forms_teacher_position()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/teacher/forms-teacher-position.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms Teacher-select'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/teacher/forms-teacher-position', $data);
        $this->load->view('templates/footer', $data);
    }

    public function edit_teacher_position()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/teacher/edit-forms-teacher-position.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms Teacher-select'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/teacher/edit-forms-teacher-position', $data);
        $this->load->view('templates/footer', $data);
    }

    //Add_teacher_position
    public function add_teacher_position($TeacherID, $SchoolID, $PersonnelTypeCode, $PositionCode)
    {
        $result = $this->db->query('SELECT * 
        FROM TEACHER_ADDITIONAL_POSITION 
        WHERE DeleteStatus = 0
        AND SchoolID = ' . $SchoolID . ' 
        AND TeacherID = "' . $TeacherID . '"
        AND AdditionalDepartmentCode = ' . $_POST['AdditionalDepartmentCode'] . '
        AND AdditionalDutyDate = "' . $_POST['AdditionalDutyDate'] . '"
        ')->result();

        if ($result != TRUE) {
            $this->forms_teacher->add_teacher_position($TeacherID, $SchoolID);
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('teacher-position?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
        } else {
            $_SESSION['danger'] = "ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบข้อมูลกลุ่มและวันที่เริ่มปฎิบัติอาจจะซ้ำกันในระบบ";
            redirect(base_url('forms-teacher-position?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
        }
    }

    //update_teacherr_position
    public function update_teacher_position($TeacherID, $SchoolID, $PersonnelTypeCode, $PositionCode, $AdditionalDepartmentCode, $AdditionalDutyDate, $AdditionalDocumentURL)
    {
        $this->forms_teacher->update_teacher_position($TeacherID, $SchoolID, $AdditionalDepartmentCode, $AdditionalDutyDate, $AdditionalDocumentURL);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('teacher-position?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
    }

    //Delete Data Form teacher_position
    public function delete_teacher_position($TeacherID, $SchoolID, $PersonnelTypeCode, $PositionCode, $AdditionalDepartmentCode, $AdditionalDutyDate)
    {
        $this->forms_teacher->delete_teacher_position($TeacherID, $SchoolID, $AdditionalDepartmentCode, $AdditionalDutyDate);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('teacher-position?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode));
    }

    ////////////////////////////teacher_position-END//////////////////////////////


    ///////////////////////////////teacher Assistance/////////////////////////////////
    //PageEdit assistance
    public function forms_teacher_assistance()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/teacher/forms-teacher-assistance.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms Teacher-select'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/teacher/forms-teacher-assistance', $data);
        $this->load->view('templates/footer', $data);
    }

    public function edit_teacher_assistance()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/teacher/edit-forms-teacher-assistance.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms Teacher-select'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/teacher/edit-forms-teacher-assistance', $data);
        $this->load->view('templates/footer', $data);
    }

    //Add_teacher_assistance
    public function add_teacher_assistance($TeacherID, $SchoolID, $PersonnelTypeCode, $PositionCode)
    {
        $result = $this->db->query('SELECT * 
        FROM TEACHER_ASSISTANCE 
        WHERE TEACHER_ASSISTANCE.DeleteStatus = 0 AND SchoolID = ' . $SchoolID . ' AND TeacherID = "' . $TeacherID . '"
        AND AssistanceTypeCode = ' . $_POST['AssistanceTypeCode'] . '
        AND AssistanceStartDate = "' . $_POST['AssistanceStartDate'] . '"
        ')->result();

        if ($result != TRUE) {
            $this->forms_teacher->add_teacher_assistance($TeacherID, $SchoolID);
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('teacher-assistance?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
        } else {
            $_SESSION['danger'] = "ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบข้อมูลประเภทและวันที่อาจจะซ้ำกันในระบบ";
            redirect(base_url('forms-teacher-assistance?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
        }
    }

    //update_teacherr_assistance
    public function update_teacher_assistance($TeacherID, $SchoolID, $PersonnelTypeCode, $PositionCode, $AssistanceTypeCode, $AssistanceStartDate, $AssistanceDocumentURL)
    {
        $this->forms_teacher->update_teacher_assistance($TeacherID, $SchoolID, $AssistanceTypeCode, $AssistanceStartDate, $AssistanceDocumentURL);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('teacher-assistance?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
    }

    //Delete Data Form teacher_assistance
    public function delete_teacher_assistance($TeacherID, $SchoolID, $PersonnelTypeCode, $PositionCode, $AssistanceTypeCode, $AssistanceStartDate)
    {
        $this->forms_teacher->delete_teacher_assistance($TeacherID, $SchoolID, $AssistanceTypeCode, $AssistanceStartDate);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('teacher-assistance?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode));
    }

    ////////////////////////////teacher_assistance-END//////////////////////////////

    ///////////////////////////////teacher Academic/////////////////////////////////
    //PageEdit assistance
    public function forms_teacher_academic()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/teacher/forms-teacher-academic.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms Teacher-academic'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/teacher/forms-teacher-academic', $data);
        $this->load->view('templates/footer', $data);
    }

    public function edit_teacher_academic()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/teacher/edit-forms-teacher-academic.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms Teacher-select'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/teacher/edit-forms-teacher-academic', $data);
        $this->load->view('templates/footer', $data);
    }

    //Add_teacher_academic
    public function add_teacher_academic($TeacherID, $SchoolID, $PersonnelTypeCode, $PositionCode)
    {
        $result = $this->db->query('SELECT * 
        FROM TEACHER_ACADEMIC 
        WHERE DeleteStatus = 0
        AND SchoolID = ' . $SchoolID . ' 
        AND TeacherID = "' . $TeacherID . '"
        AND AcademicStandingCode = ' . $_POST['AcademicStandingCode'] . '
        ')->result();

        if ($result != TRUE) {
            $this->forms_teacher->add_teacher_academic($TeacherID, $SchoolID);
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('teacher-academic?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
        } else {
            $_SESSION['danger'] = "ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบข้อมูลวิทยาฐานะและตำแหน่งอาจจะซ้ำกันในระบบ";
            redirect(base_url('forms-teacher-academic?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
        }
    }

    //update_teacherr_academic
    public function update_teacher_academic($TeacherID, $SchoolID, $PersonnelTypeCode, $PositionCode, $AcademicStandingCode)
    {
        $this->forms_teacher->update_teacher_academic($TeacherID, $SchoolID, $AcademicStandingCode);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('teacher-academic?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
    }

    //Delete Data Form teacher_academic
    public function delete_teacher_academic($TeacherID, $SchoolID, $PersonnelTypeCode, $PositionCode, $AcademicStandingCode)
    {
        $this->forms_teacher->delete_teacher_academic($TeacherID, $SchoolID, $AcademicStandingCode);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('teacher-academic?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode));
    }

    ////////////////////////////teacher_Academic-END//////////////////////////////

    ///////////////////////////////teacher Education/////////////////////////////////
    //PageEdit education
    public function forms_teacher_education()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/teacher/forms-teacher-education.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms Teacher-academic'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/teacher/forms-teacher-education', $data);
        $this->load->view('templates/footer', $data);
    }

    public function edit_teacher_education()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/teacher/edit-forms-teacher-education.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms Teacher-select'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/teacher/edit-forms-teacher-education', $data);
        $this->load->view('templates/footer', $data);
    }

    //Add_teacher_education
    public function add_teacher_education($TeacherID, $SchoolID, $PersonnelTypeCode, $PositionCode)
    {

        $result = $this->db->query('SELECT * 
        FROM TEACHER_EDUCATION_DEGREE 
        WHERE DeleteStatus = 0
        AND SchoolID = ' . $SchoolID . ' 
        AND TeacherID = "' . $TeacherID . '"
        AND EducationLevelCode  = ' . $_POST['EducationLevelCode'] . '
        AND EducationMajorCode   = ' . $_POST['EducationMajorCode'] . '
        AND EducationDegreeCode    = ' . $_POST['EducationDegreeCode'] . '
        ')->result();

        if ($result != TRUE) {
            $this->forms_teacher->add_teacher_education($TeacherID, $SchoolID);
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('teacher-education?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
        } else {
            $_SESSION['danger'] = "ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบข้อมูลอาจจะซ้ำกันในระบบ";
            redirect(base_url('forms-teacher-education?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
        }
    }

    //update_teacher_education
    public function update_teacher_education($TeacherID, $SchoolID, $PersonnelTypeCode, $PositionCode, $EducationLevelCode, $EducationMajorCode, $EducationDegreeCode)
    {
        $this->forms_teacher->update_teacher_education($TeacherID, $SchoolID, $EducationLevelCode, $EducationMajorCode, $EducationDegreeCode);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('teacher-education?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
    }

    //Delete Data Form teacher_education
    public function delete_teacher_education($TeacherID, $SchoolID, $PersonnelTypeCode, $PositionCode, $EducationLevelCode, $EducationMajorCode, $EducationDegreeCode)
    {
        $this->forms_teacher->delete_teacher_education($TeacherID, $SchoolID, $EducationLevelCode, $EducationMajorCode, $EducationDegreeCode);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('teacher-education?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode));
    }

    ////////////////////////////teacher_education-END//////////////////////////////

    ///////////////////////////////teacher teaching/////////////////////////////////
    //PageEdit teaching
    public function forms_teacher_teaching()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/teacher/forms-teacher-teaching.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms Teacher-academic'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/teacher/forms-teacher-teaching', $data);
        $this->load->view('templates/footer', $data);
    }

    public function edit_teacher_teaching()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/teacher/edit-forms-teacher-teaching.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms Teacher-select'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/teacher/edit-forms-teacher-teaching', $data);
        $this->load->view('templates/footer', $data);
    }

    //Add_teacher_teaching
    public function add_teacher_teaching($TeacherID, $SchoolID, $PersonnelTypeCode, $PositionCode)
    {
        $result = $this->db->query('SELECT * 
        FROM TEACHER_TEACHING 
        WHERE DeleteStatus = 0
        AND SchoolID = ' . $SchoolID . ' 
        AND TeacherID = "' . $TeacherID . '"
        AND TeachingEducationYear  = ' . $_POST['TeachingEducationYear'] . '
        AND TeachingSemester   = ' . $_POST['TeachingSemester'] . '
        AND EducationDegreeCode    = ' . $_POST['EducationDegreeCode'] . '
        ')->result();

        if ($result != TRUE) {
            $this->forms_teacher->add_teacher_teaching($TeacherID, $SchoolID);
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('teacher-teaching?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
        } else {
            $_SESSION['danger'] = "ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบข้อมูลอาจจะซ้ำกันในระบบ";
            redirect(base_url('form-teacher-teaching?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
        }
    }

    //update_teacher_teaching
    public function update_teacher_teaching($TeacherID, $SchoolID, $PersonnelTypeCode, $PositionCode, $TeachingEducationYear, $TeachingSemester, $TeachingSubjectCode)
    {
        $this->forms_teacher->update_teacher_teaching($TeacherID, $SchoolID, $TeachingEducationYear, $TeachingSemester, $TeachingSubjectCode);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('teacher-teaching?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
    }

    //Delete Data Form teacher_teaching
    public function delete_teacher_teaching($TeacherID, $SchoolID, $PersonnelTypeCode, $PositionCode, $TeachingEducationYear, $TeachingSemester, $TeachingSubjectCode)
    {
        $this->forms_teacher->delete_teacher_teaching($TeacherID, $SchoolID, $TeachingEducationYear, $TeachingSemester, $TeachingSubjectCode);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('teacher-teaching?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode));
    }

    ////////////////////////////teacher_teaching-END//////////////////////////////

    ///////////////////////////////teacher classroom/////////////////////////////////
    //PageEdit classroom
    public function forms_teacher_classroom()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/teacher/forms-teacher-classroom.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms Teacher-academic'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/teacher/forms-teacher-classroom', $data);
        $this->load->view('templates/footer', $data);
    }

    public function edit_teacher_classroom()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/teacher/edit-forms-teacher-classroom.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms Teacher-select'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/teacher/edit-forms-teacher-classroom', $data);
        $this->load->view('templates/footer', $data);
    }

    //Add_teacher_classroom
    public function add_teacher_classroom($TeacherID, $SchoolID, $PersonnelTypeCode, $PositionCode)
    {
        $result = $this->db->query('SELECT * 
         FROM TEACHER_CLASSROOM
         WHERE DeleteStatus = 0
         AND SchoolID = ' . $SchoolID . ' 
         AND TeacherID = "' . $TeacherID . '"
         AND GradeLevelCode  = ' . $_POST['GradeLevelCode'] . '
         AND ClassRoom   = "' . $_POST['ClassRoom'] . '"
         ')->result();

        if ($result != TRUE) {
            $this->forms_teacher->add_teacher_classroom($TeacherID, $SchoolID);
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('teacher-classroom?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
        } else {
            $_SESSION['danger'] = "ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบข้อมูลอาจจะซ้ำกันในระบบ";
            redirect(base_url('forms-teacher-classroom?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
        }
    }

    //Delete Data Form teacher_classroom
    public function delete_teacher_classroom($TeacherID, $SchoolID, $PersonnelTypeCode, $PositionCode, $GradeLevelCode, $ClassRoom)
    {
        $this->forms_teacher->delete_teacher_classroom($TeacherID, $SchoolID, $GradeLevelCode, $ClassRoom);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('teacher-classroom?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode));
    }

    //update_teacher_classroom
    public function update_teacher_classroom($TeacherID, $SchoolID, $PersonnelTypeCode, $PositionCode, $GradeLevelCode, $ClassRoom)
    {
        $this->forms_teacher->update_teacher_classroom($TeacherID, $SchoolID, $GradeLevelCode, $ClassRoom);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('teacher-classroom?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
    }

    public function uploadfile_teacher()
    {
        if (isset($_FILES['FileTeacherUpload'])) {
            $i = 1;
            $count = 0;
            $handle = fopen($_FILES['FileTeacherUpload']['tmp_name'], 'r');
            ini_set('auto_detect_line_endings', TRUE);
            while (($data = fgetcsv($handle)) !== FALSE && $data[0] != '') {

                if ($data[1] != '') {
                    $result = $this->db->query('SELECT * FROM CLS_CITIZEN_ID_TYPE WHERE CITIZEN_ID_TYPE_NAME = "' . $data[1] . '"');
                    if ($result == TRUE) {
                        foreach ($result->result() as $CLS_CITIZEN_ID_TYPE) {
                            $TeacherPersonalIDTypeCode = $CLS_CITIZEN_ID_TYPE->CITIZEN_ID_TYPE_CODE;
                        }
                    } else {
                        $TeacherPersonalIDTypeCode = $data[1];
                    }
                } else {
                    $TeacherPersonalIDTypeCode = $data[1];
                }

                if ($data[3] != '') {
                    $result = $this->db->query('SELECT * FROM CLS_PREFIX WHERE PREFIX_NAME = "' . $data[3] . '"');
                    if ($result == TRUE) {
                        foreach ($result->result() as $CLS_PREFIX) {
                            $TeacherPrefixCode = $CLS_PREFIX->PREFIX_CODE;
                        }
                    } else {
                        $TeacherPrefixCode = $data[3];
                    }
                } else {
                    $TeacherPrefixCode = $data[3];
                }

                if ($data[10] != '') {
                    $result = $this->db->query('SELECT * FROM CLS_GENDER WHERE GENDER_NAME = "' . $data[10] . '"');
                    if ($result == TRUE) {
                        foreach ($result->result() as $CLS_GENDER) {
                            $TeacherGenderCode = $CLS_GENDER->GENDER_CODE;
                        }
                    } else {
                        $TeacherGenderCode = $data[10];
                    }
                } else {
                    $TeacherGenderCode = $data[10];
                }

                if ($data[12] != '') {
                    $result = $this->db->query('SELECT * FROM CLS_NATIONALITY WHERE NATIONALITY_NAME = "' . $data[12] . '"');
                    if ($result == TRUE) {
                        foreach ($result->result() as $CLS_NATIONALITY) {
                            $TeacherNationalityCode = $CLS_NATIONALITY->NATIONALITY_CODE;
                        }
                    } else {
                        $TeacherNationalityCode = $data[12];
                    }
                } else {
                    $TeacherNationalityCode = $data[12];
                }

                if ($data[13] != '') {
                    $result = $this->db->query('SELECT * FROM CLS_RACE WHERE RACE_NAME = "' . $data[13] . '"');
                    if ($result == TRUE) {
                        foreach ($result->result() as $CLS_RACE) {
                            $TeacherRaceCode = $CLS_RACE->RACE_CODE;
                        }
                    } else {
                        $TeacherRaceCode = $data[10];
                    }
                } else {
                    $TeacherRaceCode = $data[10];
                }

                if ($data[14] != '') {
                    $result = $this->db->query('SELECT * FROM CLS_RELIGION WHERE RELIGION_NAME = "' . $data[14] . '"');
                    if ($result == TRUE) {
                        foreach ($result->result() as $CLS_RELIGION) {
                            $TeacherReligionCode = $CLS_RELIGION->RELIGION_CODE;
                        }
                    } else {
                        $TeacherReligionCode = $data[14];
                    }
                } else {
                    $TeacherReligionCode = $data[14];
                }

                if ($data[15] != '') {
                    $result = $this->db->query('SELECT * FROM CLS_BLOOD WHERE BLOOD_NAME = "' . $data[15] . '"');
                    if ($result == TRUE) {
                        foreach ($result->result() as $CLS_BLOOD) {
                            $TeacherBloodCode = $CLS_BLOOD->BLOOD_CODE;
                        }
                    } else {
                        $TeacherBloodCode = $data[15];
                    }
                } else {
                    $TeacherBloodCode = $data[15];
                }

                if ($data[22] != '') {
                    $result = $this->db->query('SELECT * FROM CLS_SUBDISTRICT WHERE SUBDISTRICT_NAME = "' . $data[22] . '"');
                    if ($result == TRUE) {
                        foreach ($result->result() as $CLS_SUBDISTRICT) {
                            $TeacherOfficialAddressSubdistrictCode = $CLS_SUBDISTRICT->SUBDISTRICT_CODE;
                        }
                    } else {
                        $TeacherOfficialAddressSubdistrictCode = $data[22];
                    }
                } else {
                    $TeacherOfficialAddressSubdistrictCode = $data[22];
                }

                if ($data[23] != '') {
                    $result = $this->db->query('SELECT * FROM CLS_DISTRICT WHERE DISTRICT_NAME = "' . $data[23] . '"');
                    if ($result == TRUE) {
                        foreach ($result->result() as $CLS_DISTRICT) {
                            $TeacherOfficialAddressDistrictCode = $CLS_DISTRICT->DISTRICT_CODE;
                        }
                    } else {
                        $TeacherOfficialAddressDistrictCode = $data[23];
                    }
                } else {
                    $TeacherOfficialAddressDistrictCode = $data[23];
                }

                if ($data[24] != '') {

                    $result = $this->db->query('SELECT * FROM CLS_PROVINCE WHERE PROVINCE_NAME = "' . $data[24] . '"');
                    if ($result == TRUE) {
                        foreach ($result->result() as $CLS_PROVINCE) {
                            $TeacherOfficialAddressProvinceCode = $CLS_PROVINCE->PROVINCE_CODE;
                        }
                    } else {
                        $TeacherOfficialAddressProvinceCode = $data[24];
                    }
                } else {
                    $TeacherOfficialAddressProvinceCode = $data[24];
                }

                if ($data[33] != '') {

                    $result = $this->db->query('SELECT * FROM CLS_SUBDISTRICT WHERE SUBDISTRICT_NAME = "' . $data[33] . '"');
                    if ($result == TRUE) {
                        foreach ($result->result() as $CLS_SUBDISTRICT) {
                            $TeacherCurrentAddressSubdistrictCode = $CLS_SUBDISTRICT->SUBDISTRICT_CODE;
                        }
                    } else {
                        $TeacherCurrentAddressSubdistrictCode = $data[33];
                    }
                } else {
                    $TeacherCurrentAddressSubdistrictCode = $data[33];
                }

                if ($data[34] != '') {
                    $result = $this->db->query('SELECT * FROM CLS_DISTRICT WHERE DISTRICT_NAME = "' . $data[34] . '"');
                    if ($result == TRUE) {
                        foreach ($result->result() as $CLS_DISTRICT) {
                            $TeacherCurrentAddressDistrictCode = $CLS_DISTRICT->DISTRICT_CODE;
                        }
                    } else {
                        $TeacherCurrentAddressDistrictCode = $data[34];
                    }
                } else {
                    $TeacherCurrentAddressDistrictCode = $data[34];
                }

                if ($data[35] != '') {
                    $result = $this->db->query('SELECT * FROM CLS_PROVINCE WHERE PROVINCE_NAME = "' . $data[35] . '"');
                    if ($result == TRUE) {
                        foreach ($result->result() as $CLS_PROVINCE) {
                            $TeacherCurrentAddressProvinceCode = $CLS_PROVINCE->PROVINCE_CODE;
                        }
                    } else {
                        $TeacherCurrentAddressProvinceCode = $data[35];
                    }
                } else {
                    $TeacherCurrentAddressProvinceCode = $data[35];
                }

                if ($data[39] != '') {
                    $result = $this->db->query('SELECT * FROM CLS_MARRIAGE_STATUS WHERE MARRIAGE_STATUS_NAME = "' . $data[39] . '"');
                    if ($result == TRUE) {
                        foreach ($result->result() as $CLS_MARRIAGE_STATUS) {
                            $MarriageStatusCode = $CLS_MARRIAGE_STATUS->MARRIAGE_STATUS_CODE;
                        }
                    } else {
                        $MarriageStatusCode = $data[39];
                    }
                } else {
                    $MarriageStatusCode = $data[39];
                }

                if ($data[40] != '') {
                    $result = $this->db->query('SELECT * FROM CLS_PERSONNEL_STATUS WHERE PERSONNEL_STATUS_NAME = "' . $data[40] . '"');
                    if ($result == TRUE) {
                        foreach ($result->result() as $CLS_PERSONNEL_STATUS) {
                            $PersonnelStatusCode = $CLS_PERSONNEL_STATUS->PERSONNEL_STATUS_CODE;
                        }
                    } else {
                        $PersonnelStatusCode = $data[40];
                    }
                } else {
                    $PersonnelStatusCode = $data[40];
                }

                if ($data[41] != '') {
                    $result = $this->db->query('SELECT * FROM CLS_EDUCATION_LEVEL WHERE EDUCATION_LEVEL_NAME = "' . $data[41] . '"');
                    if ($result == TRUE) {
                        foreach ($result->result() as $CLS_EDUCATION_LEVEL) {
                            $EntryEducationLevelCode = $CLS_EDUCATION_LEVEL->EDUCATION_LEVEL_CODE;
                        }
                    } else {
                        $EntryEducationLevelCode = $data[41];
                    }
                } else {
                    $EntryEducationLevelCode = $data[41];
                }

                if ($data[42] != '') {
                    $result = $this->db->query('SELECT * FROM CLS_DEGREE WHERE DEGREE_NAME = "' . $data[42] . '"');
                    if ($result == TRUE) {
                        foreach ($result->result() as $CLS_DEGREE) {
                            $EntryDegreeCode = $CLS_DEGREE->DEGREE_CODE;
                        }
                    } else {
                        $EntryDegreeCode = $data[42];
                    }
                } else {
                    $EntryDegreeCode = $data[42];
                }

                if ($data[43] != '') {
                    $result = $this->db->query('SELECT * FROM CLS_MAJOR WHERE MAJOR_NAME = "' . $data[43] . '"');
                    if ($result == TRUE) {
                        foreach ($result->result() as $CLS_MAJOR) {
                            $EntryMajorCode = $CLS_MAJOR->MAJOR_CODE;
                        }
                    } else {
                        $EntryMajorCode = $data[43];
                    }
                } else {
                    $EntryMajorCode = $data[43];
                }

                if ($data[44] != '') {

                    $result = $this->db->query('SELECT * FROM CLS_PROGRAM WHERE PROGRAM_NAME = "' . $data[44] . '"');
                    if ($result == TRUE) {
                        foreach ($result->result() as $CLS_PROGRAM) {
                            $EntryProgramCode = $CLS_PROGRAM->PROGRAM_CODE;
                        }
                    } else {
                        $EntryProgramCode = $data[44];
                    }
                } else {
                    $EntryProgramCode = $data[44];
                }

                if ($data[47] != '') {
                    $result = $this->db->query('SELECT * FROM CLS_PERSONNEL_TYPE WHERE PERSONNEL_TYPE_NAME = "' . $data[47] . '"');
                    if ($result == TRUE) {
                        foreach ($result->result() as $CLS_PERSONNEL_TYPE) {
                            $PersonnelTypeCode = $CLS_PERSONNEL_TYPE->PERSONNEL_TYPE_CODE;
                        }
                    } else {
                        $PersonnelTypeCode = $data[47];
                    }
                } else {
                    $PersonnelTypeCode = $data[47];
                }

                if ($data[48] != '') {
                    $result = $this->db->query('SELECT * FROM CLS_POSITION WHERE POSITION_NAME = "' . $data[48] . '"');
                    if ($result == TRUE) {
                        foreach ($result->result() as $CLS_POSITION) {
                            $PositionCode = $CLS_POSITION->POSITION_CODE;
                        }
                    } else {
                        $PositionCode = $data[48];
                    }
                } else {
                    $PositionCode = $data[48];
                }

                if ($data[49] != '') {
                    $result = $this->db->query('SELECT * FROM CLS_POSITION_LEVEL WHERE POSITION_LEVEL_NAME = "' . $data[49] . '"');
                    if ($result == TRUE) {
                        foreach ($result->result() as $CLS_POSITION_LEVEL) {
                            $PositionLevelCode = $CLS_POSITION_LEVEL->POSITION_LEVEL_CODE;
                        }
                    } else {
                        $PositionLevelCode = $data[49];
                    }
                } else {
                    $PositionLevelCode = $data[49];
                }

                if ($data[53] != '') {
                    $result = $this->db->query('SELECT * FROM CLS_CONTRACT_TYPE WHERE CONTRACT_TYPE_NAME = "' . $data[53] . '"');
                    if ($result == TRUE) {
                        foreach ($result->result() as $CLS_CONTRACT_TYPE) {
                            $ContractTypeCode = $CLS_CONTRACT_TYPE->CONTRACT_TYPE_CODE;
                        }
                    } else {
                        $ContractTypeCode = $data[53];
                    }
                } else {
                    $ContractTypeCode = $data[53];
                }

                if ($data[57] != '') {
                    $result = $this->db->query('SELECT * FROM CLS_SALARY_TYPE WHERE SALARY_TYPE_NAME = "' . $data[57] . '"');
                    if ($result == TRUE) {
                        foreach ($result->result() as $CLS_SALARY_TYPE) {
                            $SalaryTypeCode = $CLS_SALARY_TYPE->SALARY_TYPE_CODE;
                        }
                    } else {
                        $SalaryTypeCode = $data[57];
                    }
                } else {
                    $SalaryTypeCode = $data[57];
                }

                if ($data[62] != '') {
                    $result = $this->db->query('SELECT * FROM CLS_TEACHER_QUALIFICATION WHERE TEACHER_QUALIFICATION_NAME = "' . $data[62] . '"');
                    if ($result == TRUE) {
                        foreach ($result->result() as $CLS_TEACHER_QUALIFICATION) {
                            $TeacherQualificationCode = $CLS_TEACHER_QUALIFICATION->TEACHER_QUALIFICATION_CODE;
                        }
                    } else {
                        $TeacherQualificationCode = $data[62];
                    }
                } else {
                    $TeacherQualificationCode = $data[62];
                }

                if ($data[63] != '') {
                    $result = $this->db->query('SELECT * FROM CLS_TALENT WHERE TALENT_NAME = "' . $data[63] . '"');
                    if ($result == TRUE) {
                        foreach ($result->result() as $CLS_TALENT) {
                            $TeacherTalentCode = $CLS_TALENT->TALENT_CODE;
                        }
                    } else {
                        $TeacherTalentCode = $data[63];
                    }
                } else {
                    $TeacherTalentCode = $data[63];
                }

                if ($i > 1 && $data[0] != '' && $data[1] != '' && $data[3] != '' && $data[4] != '' && $data[8] != '' && $data[10] != '' && $data[11] != '' && $data[12] != '' && $data[13] != '' && $data[14] != '' && $data[15] != '' && $data[40] != '' && $data[41] != '' && $data[42] != '' && $data[43] != '' && $data[44] != '' && $data[47] != '' && $data[48] != '' && $data[49] != '') {

                    $database = [

                        'TeacherID' => $TeacherPersonalIDTypeCode . $data[0],
                        'SchoolID' => $_POST['SchoolID'],
                        'TeacherPersonalID' => $this->sandb_encode($data[0]),
                        'TeacherPersonalIDTypeCode' => $TeacherPersonalIDTypeCode,
                        'TeacherPassportNumber' => $data[2],
                        'TeacherPrefixCode' => $TeacherPrefixCode,
                        'TeacherNameThai' => $data[4],
                        'TeacherNameEnglish' => $data[5],
                        'TeacherMiddleNameThai' => $data[6],
                        'TeacherMiddleNameEnglish' => $data[7],
                        'TeacherLastNameThai' => $data[8],
                        'TeacherLastNameEnglish' => $data[9],
                        'TeacherGenderCode' => $TeacherGenderCode,
                        'TeacherBirthDate' => $this->sandb_encode($data[11]),
                        'TeacherNationalityCode' => $TeacherNationalityCode,
                        'TeacherRaceCode' => $TeacherRaceCode,
                        'TeacherReligionCode' => $TeacherReligionCode,
                        'TeacherBloodCode' => $TeacherBloodCode,
                        'TeacherOfficialAddressHouseRegisterID' => $data[16],
                        'TeacherOfficialAddressHouseNumber' => $data[17],
                        'TeacherOfficialAddressMoo' => $data[18],
                        'TeacherOfficialAddressStreet' => $data[19],
                        'TeacherOfficialAddressSoi' => $data[20],
                        'TeacherOfficialAddressTrok' => $data[21],
                        'TeacherOfficialAddressSubdistrictCode' => $TeacherOfficialAddressSubdistrictCode,
                        'TeacherOfficialAddressDistrictCode' => $TeacherOfficialAddressDistrictCode,
                        'TeacherOfficialAddressProvinceCode' => $TeacherOfficialAddressProvinceCode,
                        'TeacherOfficialAddressPostcode' => $data[25],
                        'TeacherOfficialAddressPhoneNumber' => $data[26],
                        'TeacherCurrentAddressHouseRegisterID' => $data[27],
                        'TeacherCurrentAddressHouseNumber' => $data[28],
                        'TeacherCurrentAddressMoo' => $data[29],
                        'TeacherCurrentAddressStreet' => $data[30],
                        'TeacherCurrentAddressSoi' => $data[31],
                        'TeacherCurrentAddressTrok' => $data[32],
                        'TeacherCurrentAddressSubdistrictCode' => $TeacherCurrentAddressSubdistrictCode,
                        'TeacherCurrentAddressDistrictCode' => $TeacherCurrentAddressDistrictCode,
                        'TeacherCurrentAddressProvinceCode' => $TeacherCurrentAddressProvinceCode,
                        'TeacherCurrentAddressPostcode' => $data[36],
                        'TeacherCurrentAddressPhoneNumber' => $data[37],
                        'TeacherEmail' => $data[38],
                        'MarriageStatusCode' => $MarriageStatusCode,
                        'PersonnelStatusCode' => $PersonnelStatusCode,
                        'EntryEducationLevelCode' => $EntryEducationLevelCode,
                        'EntryDegreeCode' => $EntryDegreeCode,
                        'EntryMajorCode' => $EntryMajorCode,
                        'EntryProgramCode' => $EntryProgramCode,
                        'PersonnelStartDate' => $data[45],
                        'PersonnelRetireDate' => $data[46],
                        'PersonnelTypeCode' => $PersonnelTypeCode,
                        'PositionCode' => $PositionCode,
                        'PositionLevelCode' => $PositionLevelCode,
                        'PositionStartDate' => $data[50],
                        'ContractNumber' => $data[51],
                        'ContractTimes' => $data[52],
                        'ContractTypeCode' => $ContractTypeCode,
                        'ContractYear' => $data[54],
                        'ContractStartDate' => $data[55],
                        'ContractEndDate' => $data[56],
                        'SalaryTypeCode' => $SalaryTypeCode,
                        'CurrentSalary' => $data[58],
                        'AcademicSalary' => $data[59],
                        'CompensationSalary' => $data[60],
                        'EmolumentsSalary' => $data[61],
                        'TeacherQualificationCode' => $TeacherQualificationCode,
                        'TeacherTalentCode' => $TeacherTalentCode

                    ];

                    $Check = $this->db->query('SELECT * 
                        FROM TEACHER 
                        WHERE TeacherID = "' . $TeacherPersonalIDTypeCode . $data[0] . '" 
                        ')->result();
                    if ($Check != TRUE) {
                        $insert = $this->db->insert('TEACHER', $database);
                        $_SESSION['Detail'][$i] = '-';
                        $_SESSION['StatusUpload'][$i] = 1;
                    } else {
                        $_SESSION['Detail'][$i] = 'ข้อมูลซ้ำในระบบ';
                        $_SESSION['StatusUpload'][$i] = 0;
                    }
                }

                $_SESSION['UploadSchoolDetail'][$i][0] = $data[3];
                $_SESSION['UploadSchoolDetail'][$i][1] = $data[4];
                $_SESSION['UploadSchoolDetail'][$i][2] = $data[8];
                $_SESSION['UploadSchoolDetail'][$i][3] = $data[47];
                $_SESSION['UploadSchoolDetail'][$i][4] = $data[48];

                if ($i > 1 && $data[0] == '' || $data[1] == '' || $data[3] == '' || $data[4] == '' || $data[8] == '' || $data[10] == '' || $data[11] == '' || $data[12] == '' || $data[13] == '' || $data[14] == '' || $data[15] == '' || $data[40] == '' || $data[41] == '' || $data[42] == '' || $data[43] == '' || $data[44] == '' || $data[47] == '' || $data[48] == '' || $data[49] == '') {
                    $_SESSION['Detail'][$i] = 'กรอกข้อมูลจำเป็นไม่ครบถ้วน';
                    $_SESSION['StatusUpload'][$i] = 0;
                }

                $count++;
                $i++;
            }
            ini_set('auto_detect_line_endings', FALSE);
            $_SESSION['CountUploadSchool'] = $count;
            $_SESSION['success'] = "อัปโหลดไฟล์ข้อมูลครูและบุคลากรเรียบร้อย";
            redirect(base_url('teacher-uploaddetail?SchoolID=' . $_POST['SchoolID']));
        }
    }
}
