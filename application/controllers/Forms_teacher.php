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


}
