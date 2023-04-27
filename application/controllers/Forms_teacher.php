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
        $result = $this->db->query('SELECT * 
        FROM TEACHER
        WHERE DeleteStatus = 0 AND SchoolID = ' . $SchoolID . ' 
        AND TeacherPersonalID = ' . $_POST['TeacherPersonalID'] . '
        ')->result();

        if ($result != TRUE) {
            $this->forms_teacher->add_teacher($SchoolID);
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
    public function add_teacher_select($SchoolID, $EducationYear, $Semester, $EntryMajorCode, $EntryProgramCode)
    {
        $result = $this->db->query('SELECT * 
        FROM TEACHER
        WHERE DeleteStatus = 0 AND SchoolID = ' . $SchoolID . ' 
        AND TeacherPersonalID = ' . $_POST['TeacherPersonalID'] . '
        ')->result();

        if ($result != TRUE) {
            $this->forms_teacher->add_teacher_select($SchoolID, $EducationYear, $Semester, $EntryMajorCode, $EntryProgramCode);
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('teacher?SchoolID=' . $SchoolID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&EntryMajorCode=' . $EntryMajorCode . '&&EntryProgramCode=' . $EntryProgramCode));
        } else {
            $_SESSION['danger'] = "ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบข้อมูลครูอาจจะซ้ำกันในระบบ";
            redirect(base_url('forms-teacher-select?SchoolID=' . $SchoolID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&EntryMajorCode=' . $EntryMajorCode . '&&EntryProgramCode=' . $EntryProgramCode));
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
    public function update_teacher_main($TeacherID, $SchoolID, $EducationYear, $Semester, $PersonnelTypeCode, $PositionCode, $ImageTeacher)
    {
        $this->forms_teacher->update_teacher_main($TeacherID, $SchoolID, $EducationYear, $Semester, $ImageTeacher);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('teacher?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
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

        $data['title'] = 'Forms Teacher-select'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/teacher/edit-forms-teacher-person', $data);
        $this->load->view('templates/footer', $data);
    }

    //update_teacher_person
    public function update_teacher_person($TeacherID, $SchoolID, $EducationYear, $Semester, $PersonnelTypeCode, $PositionCode)
    {
        $this->forms_teacher->update_teacher_person($TeacherID, $SchoolID, $EducationYear, $Semester, $PersonnelTypeCode, $PositionCode);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('teacher?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
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
    public function update_teacher_marriage($TeacherID, $SchoolID, $EducationYear, $Semester, $PersonnelTypeCode, $PositionCode)
    {
        $this->forms_teacher->update_teacher_marriage($TeacherID, $SchoolID, $EducationYear, $Semester, $PersonnelTypeCode, $PositionCode);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('teacher?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
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
    public function update_teacher_address($TeacherID, $SchoolID, $EducationYear, $Semester, $PersonnelTypeCode, $PositionCode)
    {
        $this->forms_teacher->update_teacher_address($TeacherID, $SchoolID, $EducationYear, $Semester);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('teacher?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
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
    public function update_teacher_contract($TeacherID, $SchoolID, $EducationYear, $Semester, $PersonnelTypeCode, $PositionCode)
    {
        $this->forms_teacher->update_teacher_contract($TeacherID, $SchoolID, $EducationYear, $Semester);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('teacher?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
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
    public function update_teacher_signature($TeacherID, $SchoolID, $EducationYear, $Semester, $PersonnelTypeCode, $PositionCode, $Signature)
    {
        $this->forms_teacher->update_teacher_signature($TeacherID, $SchoolID, $EducationYear, $Semester, $Signature);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('teacher?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
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
    public function update_teacher_talent($TeacherID, $SchoolID, $EducationYear, $Semester, $PersonnelTypeCode, $PositionCode)
    {
        $this->forms_teacher->update_teacher_talent($TeacherID, $SchoolID, $EducationYear, $Semester);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('teacher?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
    }
    //////////////////////////// edit_forms_teacher_contract-END//////////////////////////////

    //Delete Data Form teacher
    public function delete_teacher($TeacherID, $SchoolID, $EducationYear, $Semester, $PersonnelTypeCode, $PositionCode)
    {
        $this->forms_teacher->delete_teacher($TeacherID, $SchoolID, $EducationYear, $Semester);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('teacher?SchoolID=' . $SchoolID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode));
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
    public function add_teacher_certificate($TeacherID, $SchoolID, $EducationYear, $Semester, $PersonnelTypeCode, $PositionCode)
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
            redirect(base_url('teacher-certificate?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
        } else {
            $_SESSION['danger'] = "ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบข้อมูลประเภทและเลขที่อาจจะซ้ำกันในระบบ";
            redirect(base_url('forms-teacher-certificate?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
        }
    }

    //update_teacherr_certificate
    public function update_teacher_certificate($TeacherID, $SchoolID, $EducationYear, $Semester, $PersonnelTypeCode, $PositionCode, $CertificateCode, $CertificateLicenseNumber)
    {
        $this->forms_teacher->update_teacher_certificate($TeacherID, $SchoolID, $CertificateCode, $CertificateLicenseNumber);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('teacher-certificate?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
    }

    //Delete Data Form teacher_certificate
    public function delete_teacher_certificate($TeacherID, $SchoolID, $EducationYear, $Semester, $PersonnelTypeCode, $PositionCode, $CertificateCode, $CertificateLicenseNumber)
    {
        $this->forms_teacher->delete_teacher_certificate($TeacherID, $SchoolID, $CertificateCode, $CertificateLicenseNumber);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('teacher-certificate?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode));
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
    public function add_teacher_position($TeacherID, $SchoolID, $EducationYear, $Semester, $PersonnelTypeCode, $PositionCode)
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
            redirect(base_url('teacher-position?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
        } else {
            $_SESSION['danger'] = "ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบข้อมูลกลุ่มและวันที่เริ่มปฎิบัติอาจจะซ้ำกันในระบบ";
            redirect(base_url('forms-teacher-position?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
        }
    }

    //update_teacherr_position
    public function update_teacher_position($TeacherID, $SchoolID, $EducationYear, $Semester, $PersonnelTypeCode, $PositionCode, $AdditionalDepartmentCode, $AdditionalDutyDate, $AdditionalDocumentURL)
    {
        $this->forms_teacher->update_teacher_position($TeacherID, $SchoolID, $AdditionalDepartmentCode, $AdditionalDutyDate, $AdditionalDocumentURL);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('teacher-position?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
    }

    //Delete Data Form teacher_position
    public function delete_teacher_position($TeacherID, $SchoolID, $EducationYear, $Semester, $PersonnelTypeCode, $PositionCode, $AdditionalDepartmentCode, $AdditionalDutyDate)
    {
        $this->forms_teacher->delete_teacher_position($TeacherID, $SchoolID, $AdditionalDepartmentCode, $AdditionalDutyDate);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('teacher-position?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode));
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
    public function add_teacher_assistance($TeacherID, $SchoolID, $EducationYear, $Semester, $PersonnelTypeCode, $PositionCode)
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
            redirect(base_url('teacher-assistance?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
        } else {
            $_SESSION['danger'] = "ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบข้อมูลประเภทและวันที่อาจจะซ้ำกันในระบบ";
            redirect(base_url('forms-teacher-assistance?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
        }
    }

    //update_teacherr_assistance
    public function update_teacher_assistance($TeacherID, $SchoolID, $EducationYear, $Semester, $PersonnelTypeCode, $PositionCode, $AssistanceTypeCode, $AssistanceStartDate, $AssistanceDocumentURL)
    {
        $this->forms_teacher->update_teacher_assistance($TeacherID, $SchoolID, $AssistanceTypeCode, $AssistanceStartDate, $AssistanceDocumentURL);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('teacher-assistance?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
    }

    //Delete Data Form teacher_assistance
    public function delete_teacher_assistance($TeacherID, $SchoolID, $EducationYear, $Semester, $PersonnelTypeCode, $PositionCode, $AssistanceTypeCode, $AssistanceStartDate)
    {
        $this->forms_teacher->delete_teacher_assistance($TeacherID, $SchoolID, $AssistanceTypeCode, $AssistanceStartDate);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('teacher-assistance?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode));
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
    public function add_teacher_academic($TeacherID, $SchoolID, $EducationYear, $Semester, $PersonnelTypeCode, $PositionCode)
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
            redirect(base_url('teacher-academic?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
        } else {
            $_SESSION['danger'] = "ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบข้อมูลวิทยาฐานะและตำแหน่งอาจจะซ้ำกันในระบบ";
            redirect(base_url('forms-teacher-academic?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
        }
    }

    //update_teacherr_academic
    public function update_teacher_academic($TeacherID, $SchoolID, $EducationYear, $Semester, $PersonnelTypeCode, $PositionCode, $AcademicStandingCode)
    {
        $this->forms_teacher->update_teacher_academic($TeacherID, $SchoolID, $AcademicStandingCode);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('teacher-academic?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
    }

    //Delete Data Form teacher_academic
    public function delete_teacher_academic($TeacherID, $SchoolID, $EducationYear, $Semester, $PersonnelTypeCode, $PositionCode, $AcademicStandingCode)
    {
        $this->forms_teacher->delete_teacher_academic($TeacherID, $SchoolID, $AcademicStandingCode);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('teacher-academic?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode));
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
    public function add_teacher_education($TeacherID, $SchoolID, $EducationYear, $Semester, $PersonnelTypeCode, $PositionCode)
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
            redirect(base_url('teacher-education?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
        } else {
            $_SESSION['danger'] = "ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบข้อมูลอาจจะซ้ำกันในระบบ";
            redirect(base_url('forms-teacher-education?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
        }
    }

    //update_teacher_education
    public function update_teacher_education($TeacherID, $SchoolID, $EducationYear, $Semester, $PersonnelTypeCode, $PositionCode, $EducationLevelCode, $EducationMajorCode, $EducationDegreeCode)
    {
        $this->forms_teacher->update_teacher_education($TeacherID, $SchoolID, $EducationLevelCode, $EducationMajorCode, $EducationDegreeCode);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('teacher-education?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
    }

    //Delete Data Form teacher_education
    public function delete_teacher_education($TeacherID, $SchoolID, $EducationYear, $Semester, $PersonnelTypeCode, $PositionCode, $EducationLevelCode, $EducationMajorCode, $EducationDegreeCode)
    {
        $this->forms_teacher->delete_teacher_education($TeacherID, $SchoolID, $EducationLevelCode, $EducationMajorCode, $EducationDegreeCode);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('teacher-education?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode));
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
    public function add_teacher_teaching($TeacherID, $SchoolID, $EducationYear, $Semester, $PersonnelTypeCode, $PositionCode)
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
            redirect(base_url('teacher-teaching?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
        } else {
            $_SESSION['danger'] = "ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบข้อมูลอาจจะซ้ำกันในระบบ";
            redirect(base_url('form-teacher-teaching?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
        }
    }

    //update_teacher_teaching
    public function update_teacher_teaching($TeacherID, $SchoolID, $EducationYear, $Semester, $PersonnelTypeCode, $PositionCode, $TeachingEducationYear, $TeachingSemester, $TeachingSubjectCode)
    {
        $this->forms_teacher->update_teacher_teaching($TeacherID, $SchoolID, $TeachingEducationYear, $TeachingSemester, $TeachingSubjectCode);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('teacher-teaching?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
    }

    //Delete Data Form teacher_teaching
    public function delete_teacher_teaching($TeacherID, $SchoolID, $EducationYear, $Semester, $PersonnelTypeCode, $PositionCode, $TeachingEducationYear, $TeachingSemester, $TeachingSubjectCode)
    {
        $this->forms_teacher->delete_teacher_teaching($TeacherID, $SchoolID, $TeachingEducationYear, $TeachingSemester, $TeachingSubjectCode);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('teacher-teaching?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode));
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
    public function add_teacher_classroom($TeacherID, $SchoolID, $EducationYear, $Semester, $PersonnelTypeCode, $PositionCode)
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
            redirect(base_url('teacher-classroom?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
        } else {
            $_SESSION['danger'] = "ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบข้อมูลอาจจะซ้ำกันในระบบ";
            redirect(base_url('forms-teacher-classroom?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
        }
    }

    //Delete Data Form teacher_classroom
    public function delete_teacher_classroom($TeacherID, $SchoolID, $EducationYear, $Semester, $PersonnelTypeCode, $PositionCode, $GradeLevelCode, $ClassRoom)
    {
        $this->forms_teacher->delete_teacher_classroom($TeacherID, $SchoolID, $GradeLevelCode, $ClassRoom);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('teacher-classroom?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode));
    }

    //update_teacher_classroom
    public function update_teacher_classroom($TeacherID, $SchoolID, $EducationYear, $Semester, $PersonnelTypeCode, $PositionCode, $GradeLevelCode, $ClassRoom)
    {
        $this->forms_teacher->update_teacher_classroom($TeacherID, $SchoolID, $GradeLevelCode, $ClassRoom);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('teacher-classroom?SchoolID=' . $SchoolID . '&&TeacherID=' . $TeacherID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&PersonnelTypeCode=' . $PersonnelTypeCode . '&&PositionCode=' . $PositionCode . '&&ShowDetail='));
    }

    public function uploadfile_teacher()
    {
        if (isset($_FILES['FileTeacherUpload'])) {
            $i = 0;
            if (($handle = fopen($_FILES['FileTeacherUpload']['tmp_name'], "r")) !== FALSE) {
                while (($DataTeacher = fgetcsv($handle, 1000, ",")) == TRUE) {
                    $i++;
                    if ($i > 1) {

                        $data = [

                            `TeacherID` => $DataTeacher[1] . $DataTeacher[0],
                            `SchoolID` => $_POST['SchoolID'],
                            `TeacherPersonalID` => $DataTeacher[0],
                            `TeacherPersonalIDTypeCode` => $DataTeacher[1],
                            `TeacherPassportNumber` => $DataTeacher[2],
                            `TeacherPrefixCode` => $DataTeacher[1],
                            `TeacherNameThai` => $DataTeacher[1],
                            `TeacherNameEnglish` => $DataTeacher[1],
                            `TeacherMiddleNameThai` => $DataTeacher[1],
                            `TeacherMiddleNameEnglish` => $DataTeacher[1],
                            `TeacherLastNameThai` => $DataTeacher[1],
                            `TeacherLastNameEnglish` => $DataTeacher[1],
                            `TeacherGenderCode` => $DataTeacher[1],
                            `TeacherBirthDate` => $DataTeacher[1],
                            `TeacherNationalityCode` => $DataTeacher[1],
                            `TeacherRaceCode` => $DataTeacher[1],
                            `TeacherReligionCode` => $DataTeacher[1],
                            `TeacherBloodCode` => $DataTeacher[1],
                            `TeacherOfficialAddressHouseRegisterID` => $DataTeacher[1],
                            `TeacherOfficialAddressHouseNumber` => $DataTeacher[1],
                            `TeacherOfficialAddressMoo` => $DataTeacher[1],
                            `TeacherOfficialAddressStreet` => $DataTeacher[1],
                            `TeacherOfficialAddressSoi` => $DataTeacher[1],
                            `TeacherOfficialAddressTrok` => $DataTeacher[1],
                            `TeacherOfficialAddressSubdistrictCode` => $DataTeacher[1],
                            `TeacherOfficialAddressDistrictCode` => $DataTeacher[1],
                            `TeacherOfficialAddressProvinceCode` => $DataTeacher[1],
                            `TeacherOfficialAddressPostcode` => $DataTeacher[1],
                            `TeacherOfficialAddressPhoneNumber` => $DataTeacher[1],
                            `TeacherCurrentAddressHouseRegisterID` => $DataTeacher[1],
                            `TeacherCurrentAddressHouseNumber` => $DataTeacher[1],
                            `TeacherCurrentAddressMoo` => $DataTeacher[1],
                            `TeacherCurrentAddressStreet` => $DataTeacher[1],
                            `TeacherCurrentAddressSoi` => $DataTeacher[1],
                            `TeacherCurrentAddressTrok` => $DataTeacher[1],
                            `TeacherCurrentAddressSubdistrictCode` => $DataTeacher[1],
                            `TeacherCurrentAddressDistrictCode` => $DataTeacher[1],
                            `TeacherCurrentAddressProvinceCode` => $DataTeacher[1],
                            `TeacherCurrentAddressPostcode` => $DataTeacher[1],
                            `TeacherCurrentAddressPhoneNumber` => $DataTeacher[1],
                            `TeacherEmail` => $DataTeacher[1],
                            `MarriageStatusCode` => $DataTeacher[1],
                            `SpousePersonalID` => $DataTeacher[1],
                            `SpousePrefixCode` => $DataTeacher[1],
                            `SpouseNameThai` => $DataTeacher[1],
                            `SpouseNameEnglish` => $DataTeacher[1],
                            `SpouseMiddleNameThai` => $DataTeacher[1],
                            `SpouseMiddleNameEnglish` => $DataTeacher[1],
                            `SpouseLastNameThai` => $DataTeacher[1],
                            `SpouseLastNameEnglish` => $DataTeacher[1],
                            `PersonnelStatusCode` => $DataTeacher[1],
                            `EntryEducationLevelCode` => $DataTeacher[1],
                            `EntryDegreeCode` => $DataTeacher[1],
                            `EntryMajorCode` => $DataTeacher[1],
                            `EntryProgramCode` => $DataTeacher[1],
                            `PersonnelStartDate` => $DataTeacher[1],
                            `PersonnelRetireDate` => $DataTeacher[1],
                            `PersonnelTypeCode` => $DataTeacher[1],
                            `PositionCode` => $DataTeacher[1],
                            `PositionLevelCode` => $DataTeacher[1],
                            `PositionStartDate` => $DataTeacher[1],
                            `ContractNumber` => $DataTeacher[1],
                            `ContractTimes` => $DataTeacher[1],
                            `ContractTypeCode` => $DataTeacher[1],
                            `ContractYear` => $DataTeacher[1],
                            `ContractStartDate` => $DataTeacher[1],
                            `ContractEndDate` => $DataTeacher[1],
                            `SalaryTypeCode` => $DataTeacher[1],
                            `CurrentSalary` => $DataTeacher[1],
                            `AcademicSalary` => $DataTeacher[1],
                            `CompensationSalary` => $DataTeacher[1],
                            `EmolumentsSalary` => $DataTeacher[1],
                            `TeacherQualificationCode` => $DataTeacher[1],
                            `TeacherTalentCode` => $DataTeacher[1],

                        ];

                        $result = $this->db->insert('TEACHER', $data);
                    }
                }
                fclose($handle);
                $_SESSION['success'] = "อัปโหลดไฟล์ข้อมูลครูและบุคลากรเรียบร้อย";
                redirect(base_url('school'));
            }
        }
    }
}
