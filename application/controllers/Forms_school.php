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

        if (!file_exists(APPPATH . 'views/pages/forms/school/forms-school.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = 'Forms School'; // Capitalize the first letter
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/school/forms-school', $data);
        $this->load->view('templates/footer', $data);
    }

    //Add Data Form School
    public function add_school()
    {
        $result = $this->db->query('SELECT * 
        FROM SCHOOL 
        WHERE SchoolID = ' . $_POST['SchoolID'] . ' 
        ')->result();
        if ($result != TRUE) {
            $this->forms_school->add_school();
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('school'));
        } else {
            $_SESSION['danger'] = "ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบข้อมูลรหัสสถานศึกษานี้อาจจะซ้ำในระบบ";
            redirect(base_url('forms-school'));
        }
    }

    //Edit Data Form School MAIN
    public function edit_school_main()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/school/edit-forms-school-main.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = "Edit School";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/school/edit-forms-school-main', $data);
        $this->load->view('templates/footer', $data);
    }

    //Edit Data Form School Address
    public function edit_forms_school_address()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/school/edit-forms-school-address.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = "Edit School";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/school/edit-forms-school-address', $data);
        $this->load->view('templates/footer', $data);
    }

    //Edit Data Form School Contact
    public function edit_forms_school_contact()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/school/edit-forms-school-contact.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = "Edit School";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/school/edit-forms-school-contact', $data);
        $this->load->view('templates/footer', $data);
    }

    //Edit Data Form School Administrator
    public function edit_forms_school_administrator()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/school/edit-forms-school-administrator.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = "Edit School";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/school/edit-forms-school-administrator', $data);
        $this->load->view('templates/footer', $data);
    }

    //Edit Data Form School Utilities
    public function edit_forms_school_utilities()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/school/edit-forms-school-utilities.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = "Edit School";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/school/edit-forms-school-utilities', $data);
        $this->load->view('templates/footer', $data);
    }

    //Edit Data Form School Teaching
    public function edit_forms_school_teaching()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/school/edit-forms-school-teaching.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = "Edit School";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/school/edit-forms-school-teaching', $data);
        $this->load->view('templates/footer', $data);
    }
    //Edit Data Form School Statistical
    public function edit_forms_school_statistical()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/school/edit-forms-school-statistical.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = "Edit School";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/school/edit-forms-school-statistical', $data);
        $this->load->view('templates/footer', $data);
    }

    //Update Data Form School MAIN
    public function update_school_main($SchoolID, $ImgNull)
    {
        $this->forms_school->update_school_main($SchoolID, $ImgNull);
        $_SESSION['success'] = "แก้ไขข้อมูลเรียบร้อย";
        redirect(base_url('school?SchoolID=' . $SchoolID));
    }

    //Update Data Form School Address
    public function update_school_address($SchoolID)
    {
        $this->forms_school->update_school_address($SchoolID);
        $_SESSION['success'] = "แก้ไขข้อมูลเรียบร้อย";
        redirect(base_url('school?SchoolID=' . $SchoolID));
    }

    //Update Data Form School Contact
    public function update_school_contact($SchoolID)
    {
        $this->forms_school->update_school_contact($SchoolID);
        $_SESSION['success'] = "แก้ไขข้อมูลเรียบร้อย";
        redirect(base_url('school?SchoolID=' . $SchoolID));
    }

    //Update Data Form School Administrator
    public function update_school_administrator($SchoolID)
    {
        $this->forms_school->update_school_administrator($SchoolID);
        $_SESSION['success'] = "แก้ไขข้อมูลเรียบร้อย";
        redirect(base_url('school?SchoolID=' . $SchoolID));
    }

    //Update Data Form School Utilities
    public function update_school_utilities($SchoolID)
    {
        $this->forms_school->update_school_utilities($SchoolID);
        $_SESSION['success'] = "แก้ไขข้อมูลเรียบร้อย";
        redirect(base_url('school?SchoolID=' . $SchoolID));
    }

    //Update Data Form School Teaching
    public function update_school_teaching($SchoolID)
    {
        $this->forms_school->update_school_teaching($SchoolID);
        $_SESSION['success'] = "แก้ไขข้อมูลเรียบร้อย";
        redirect(base_url('school?SchoolID=' . $SchoolID));
    }

    //Update Data Form School Teaching
    public function update_school_statistical($SchoolID)
    {
        $this->forms_school->update_school_statistical($SchoolID);
        $_SESSION['success'] = "แก้ไขข้อมูลเรียบร้อย";
        redirect(base_url('school?SchoolID=' . $SchoolID));
    }

    //Delete Data Form School
    public function delete_school($SchoolID)
    {
        $student = $this->db->query('SELECT * 
        FROM STUDENT 
        WHERE DeleteStatus = 0
        AND SchoolID = ' . $SchoolID . ' 
        ')->result();

        $teacher = $this->db->query('SELECT * 
        FROM TEACHER 
        WHERE DeleteStatus = 0
        AND SchoolID = ' . $SchoolID . ' 
        ')->result();

        if ($student != TRUE && $teacher != TRUE) {
            $this->forms_school->delete_school($SchoolID);
            $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        } else {
            $_SESSION['danger'] = "ไม่สามารถลบข้อมูลได้ โปรดลบข้อมูลอื่นที่เกี่ยวข้องก่อนลบข้อมูล";
        }
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
    public function add_classroom($SchoolID)
    {
        $result = $this->db->query('SELECT * 
        FROM SCHOOL_CLASSROOM 
        WHERE DeleteStatus = 0
        AND SchoolID = ' . $SchoolID . ' 
        AND ClassroomGradeLevelCode  = ' . $_POST['ClassroomGradeLevelCode'] . '
        ')->result();

        if ($result != TRUE) {
            $this->forms_school->add_classroom($SchoolID);
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('school-classroom?SchoolID=' . $SchoolID));
        } else {
            $_SESSION['danger'] = "ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบข้อมูลชั้นเรียนอาจจะซ้ำกันในระบบ";
            redirect(base_url('forms-school-classroom?SchoolID=' . $SchoolID));
        }
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
        redirect(base_url('school-classroom?SchoolID=' . $SchoolID));
    }

    //Delete Data Form ClassRoom
    public function delete_classroom($SchoolID, $ClassID)
    {
        $this->forms_school->delete_classroom($SchoolID, $ClassID);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('school-classroom?SchoolID=' . $SchoolID));
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
    public function add_award($SchoolID)
    {
        $result = $this->db->query('SELECT * 
        FROM SCHOOL_AWARD 
        WHERE DeleteStatus = 0
        AND SchoolID = ' . $SchoolID . ' 
        AND AwardYear  = ' . $_POST['AwardYear'] . '
        AND AwardName   = "' . $_POST['AwardName'] . '"
        ')->result();

        if ($result != TRUE) {
            $this->forms_school->add_award($SchoolID);
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('school-award?SchoolID=' . $SchoolID));
        } else {
            $_SESSION['danger'] = "ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบข้อมูลรางวัลอาจจะซ้ำกันในระบบ";
            redirect(base_url('forms-school-award?SchoolID=' . $SchoolID));
        }
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
    public function update_award($ID, $SchoolID, $AwardYear)
    {

        $this->forms_school->update_award($ID, $SchoolID, $AwardYear);
        $_SESSION['success'] = "แก้ไขข้อมูลเรียบร้อย";
        redirect(base_url('school-award?SchoolID=' . $SchoolID));
    }

    //Delete Data Form Award
    public function delete_award($ID, $SchoolID, $AwardYear)
    {

        $this->forms_school->delete_award($ID, $SchoolID, $AwardYear);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('school-award?SchoolID=' . $SchoolID));
    }
    ///////////////////////////////////// AWARD- END /////////////////////////////////////////


    //////////////////////////////////////Buildingฺ///////////////////////////////////////////////
    //Page Form building
    public function building()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/school/forms-school-building.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = 'Forms School building'; // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/school/forms-school-building', $data);
        $this->load->view('templates/footer', $data);
    }

    //Add Data AWARD
    public function add_building($SchoolID)
    {
        $result = $this->db->query('SELECT * 
        FROM SCHOOL_BUILDING 
        WHERE DeleteStatus = 0
        AND SchoolID = ' . $SchoolID . ' 
        AND BuildingName   = "' . $_POST['BuildingName '] . '"
        ')->result();
        if ($result != TRUE) {
            $this->forms_school->add_building();
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('school-building?SchoolID=' . $SchoolID));
        } else {
            $_SESSION['danger'] = "ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบข้อมูลชื่ออาคารอาจจะซ้ำกันในระบบ";
            redirect(base_url('forms-school-building?SchoolID=' . $SchoolID));
        }
    }


    //Edit Data Form building
    public function edit_building()
    {
        $data['title'] = "Edit building";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/school/edit-forms-building', $data);
        $this->load->view('templates/footer', $data);
    }

    //Add Data Form building
    public function update_building($SchoolID, $ID)
    {

        $this->forms_school->update_building($ID);
        $_SESSION['success'] = "แก้ไขข้อมูลเรียบร้อย";
        redirect(base_url('school-building?SchoolID=' . $SchoolID));
    }

    //Delete Data Form building
    public function delete_building($SchoolID, $ID)
    {
        $this->forms_school->delete_building($ID);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('school-building?SchoolID=' . $SchoolID));
    }

    //////////////////////////////////////Buildingฺ- END///////////////////////////////////////////////


    //////////////////////////////////////UploadFILE///////////////////////////////////////////////
    //Delete Data Form building
    public function uploadfile_school()
    {
        if (isset($_FILES['FileSchoolUpload'])) {
            $i = 1;
            $count = 0;
            $handle = fopen($_FILES['FileSchoolUpload']['tmp_name'], 'r');
            ini_set('auto_detect_line_endings', TRUE);
            while (($data = fgetcsv($handle)) !== FALSE) {
                if ($i > 1 && $data[0] != '') {

                    for ($x = 0; $x <= 43; $x++) {
                        if ($data[$x] == '') {
                            $_SESSION['danger'] = "ไม่สามารถบันทึกข้อมูลได้ โปรดกรอกข้อมูลให้ครบถ้วน ";
                            redirect(base_url('school'));
                        }
                    }


                    $result = $this->db->query('SELECT * FROM CLS_JURISDICTION WHERE JURISDICTION_NAME = "' . $data[1] . '"');
                    foreach ($result->result() as $CLS_JURISDICTION) {
                        $JurisdictionCode = $CLS_JURISDICTION->JURISDICTION_CODE;
                    }
                    $result = $this->db->query('SELECT * FROM CLS_INNOVATION_AREA WHERE INNOVATION_AREA_NAME = "' . $data[2] . '"');
                    foreach ($result->result() as $CLS_INNOVATION_AREA) {
                        $InnovationAreaCode = $CLS_INNOVATION_AREA->INNOVATION_AREA_CODE;
                    }
                    $result = $this->db->query('SELECT * FROM CLS_SCHOOL_TYPE WHERE SCHOOL_TYPE_NAME = "' . $data[6] . '"');
                    foreach ($result->result() as $CLS_SCHOOL_TYPE) {
                        $SchoolTypeCode = $CLS_SCHOOL_TYPE->SCHOOL_TYPE_CODE;
                    }
                    $result = $this->db->query('SELECT * FROM CLS_SCHOOL_STATUS WHERE SCHOOL_STATUS_NAME = "' . $data[7] . '"');
                    foreach ($result->result() as $CLS_SCHOOL_STATUS) {
                        $SchoolStatusCode = $CLS_SCHOOL_STATUS->SCHOOL_STATUS_CODE;
                    }
                    $result = $this->db->query('SELECT * FROM CLS_MUNICIPAL WHERE MUNICIPAL_NAME = "' . $data[8] . '"');
                    foreach ($result->result() as $CLS_MUNICIPAL) {
                        $MunicipalCode = $CLS_MUNICIPAL->MUNICIPAL_CODE;
                    }
                    $result = $this->db->query('SELECT * FROM CLS_SUBDISTRICT WHERE SUBDISTRICT_NAME = "' . $data[14] . '"');
                    foreach ($result->result() as $CLS_SUBDISTRICT) {
                        $SchoolAddressSubdistrictCode = $CLS_SUBDISTRICT->SUBDISTRICT_CODE;
                    }
                    $result = $this->db->query('SELECT * FROM CLS_DISTRICT WHERE DISTRICT_NAME = "' . $data[15] . '"');
                    foreach ($result->result() as $CLS_DISTRICT) {
                        $SchoolAddressDistrictCode = $CLS_DISTRICT->DISTRICT_CODE;
                    }

                    $result = $this->db->query('SELECT * FROM CLS_PREFIX WHERE PREFIX_NAME = "' . $data[28] . '"');
                    foreach ($result->result() as $CLS_PREFIX) {
                        $AdministratorPrefixCode = $CLS_PREFIX->PREFIX_CODE;
                    }
                    $result = $this->db->query('SELECT * FROM CLS_EDUCATION_LEVEL WHERE EDUCATION_LEVEL_NAME = "' . $data[31] . '"');
                    foreach ($result->result() as $CLS_EDUCATION_LEVEL) {
                        $EducationLevelCode = $CLS_EDUCATION_LEVEL->EDUCATION_LEVEL_CODE;
                    }
                    $result = $this->db->query('SELECT * FROM CLS_ELECTRIC_TYPE WHERE ELECTRIC_TYPE_NAME = "' . $data[32] . '"');
                    foreach ($result->result() as $CLS_ELECTRIC_TYPE) {
                        $ElectricTypeCode = $CLS_ELECTRIC_TYPE->ELECTRIC_TYPE_CODE;
                    }
                    $result = $this->db->query('SELECT * FROM CLS_INTERNET_TYPE WHERE INTERNET_TYPE_NAME = "' . $data[33] . '"');
                    foreach ($result->result() as $CLS_INTERNET_TYPE) {
                        $InternetTypeCode = $CLS_INTERNET_TYPE->INTERNET_TYPE_CODE;
                    }
                    $result = $this->db->query('SELECT * FROM CLS_WATER_TYPE WHERE WATER_TYPE_NAME = "' . $data[34] . '"');
                    foreach ($result->result() as $CLS_WATER_TYPE) {
                        $WaterTypeCode = $CLS_WATER_TYPE->WATER_TYPE_CODE;
                    }
                    $result = $this->db->query('SELECT * FROM CLS_EDUCATION_CONTENT WHERE EDUCATION_CONTENT_NAME = "' . $data[35] . '"');
                    foreach ($result->result() as $CLS_EDUCATION_CONTENT) {
                        $EducationContentCode = $CLS_EDUCATION_CONTENT->EDUCATION_CONTENT_CODE;
                    }
                    if ($data[36] == 'อยู่ในโครงการ') {
                        $DLTVFlag = 1;
                    } else $DLTVFlag = 0;


                    $database = [

                        'SchoolID' => $data[0],
                        'JurisdictionCode' => $JurisdictionCode,
                        'InnovationAreaCode' => $InnovationAreaCode,
                        'SchoolNameThai' => $data[3],
                        'SchoolNameEnglish' => $data[4],
                        'SchoolEstablishedDate' => $data[5],
                        'SchoolTypeCode' => $SchoolTypeCode,
                        'SchoolStatusCode' => $SchoolStatusCode,
                        'MunicipalCode' => $MunicipalCode,
                        'SchoolAddressHouseNumber' => $data[9],
                        'SchoolAddressMoo' => $data[10],
                        'SchoolAddressStreet' => $data[11],
                        'SchoolAddressSoi' => $data[12],
                        'SchoolAddressTrok' => $data[13],
                        'SchoolAddressSubdistrictCode' => $SchoolAddressSubdistrictCode,
                        'SchoolAddressDistrictCode' => $SchoolAddressDistrictCode,
                        'SchoolAddressProvinceCode' => 91,
                        'SchoolAddressPostcode' => $data[17],
                        'SchoolLatitude' => $data[18],
                        'SchoolLongitude' => $data[19],
                        'SchoolMapURL' => $data[20],
                        'SchoolPhoneNumber' => $data[21],
                        'SchoolSecondPhoneNumber' => $data[22],
                        'SchoolFaxNumber' => $data[23],
                        'SchoolSecondFaxNumber' => $data[24],
                        'SchoolEmail' => $data[25],
                        'SchoolWebsiteURL' => $data[26],
                        'AdministratorPersonalID' => $data[27],
                        'AdministratorPrefixCode' => $AdministratorPrefixCode,
                        'AdministratorNameThai' => $data[29],
                        'AdministratorLastNameThai' => $data[30],
                        'EducationLevelCode' => $EducationLevelCode,
                        'ElectricTypeCode' => $ElectricTypeCode,
                        'InternetTypeCode' => $InternetTypeCode,
                        'WaterTypeCode' => $WaterTypeCode,
                        'EducationContentCode' => $EducationContentCode,
                        'DLTVFlag' => $DLTVFlag,
                        'ComputerOnlineNumber' => $data[37],
                        'ComputerStandaloneNumber' => $data[38],
                        'ComputerTeachNumber' => $data[39],
                        'ComputerManageNumber' => $data[40],
                        'ToiletMaleStudentNumber' => $data[41],
                        'ToiletFemaleStudentNumber' => $data[42],
                        'ToiletCombinationNumber' => $data[43]

                    ];

                    $Check = $this->db->query('SELECT * 
                    FROM SCHOOL 
                    WHERE SchoolID = "' . $data[0] . '" 
                    ')->result();
                    if ($Check != TRUE) {
                        $insert = $this->db->insert('SCHOOL', $database);
                    }
                }

                if ($i > 1 && $data[0] != '') {

                    $_SESSION['UploadSchoolDetail'][$i][0] = $data[0];
                    $_SESSION['UploadSchoolDetail'][$i][1] = $data[3];
                    $_SESSION['UploadSchoolDetail'][$i][2] = $data[1];
                    $_SESSION['UploadSchoolDetail'][$i][3] = $data[2];
                    if ($Check != TRUE) {
                        $_SESSION['StatusUpload'][$i] = 1;
                    } else {
                        $_SESSION['StatusUpload'][$i] = 0;
                    }
                    $count++;
                }
                $i++;
            }
            ini_set('auto_detect_line_endings', FALSE);
            $_SESSION['CountUploadSchool'] = $count;
            $_SESSION['success'] = "อัปโหลดไฟล์ข้อมูลสถานศึกษาเรียบร้อย";
            redirect(base_url('school-uploaddetail'));
        }
    }
}
