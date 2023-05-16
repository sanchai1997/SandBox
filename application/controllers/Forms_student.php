    <?php
    defined('BASEPATH') or exit('No direct script access allowed');
    require_once '_sandboxcontroller.php';

    class Forms_student extends _sandboxcontroller
    {
        public function __construct()
        {
            parent::__construct();
            //Yourownconstructorcode
            $this->load->library('form_validation');
            $this->load->library('session');
            $this->load->model('Student_model', 'forms_student');
        }

        ///////////////////////////////////forms-student/////////////////////////////////
        //PageFormStudent
        public function index()
        {

            if (!file_exists(APPPATH . 'views/pages/forms/student/forms-student.php')) {
                //Whoops,wedon'thaveapageforthat!
                show_404();
            }

            $data['title'] = 'Forms - Student'; //Capitalizethefirstletter

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pages/forms/student/forms-student', $data);
            $this->load->view('templates/footer', $data);
        }

        //Add Data Form student
        public function add_student($SchoolID)
        {
            $result = $this->db->query('SELECT * 
            FROM STUDENT 
            WHERE DeleteStatus = 0
            AND SchoolID = ' . $SchoolID . ' 
            AND StudentReferenceID = "' . $_POST['StudentPersonalIDTypeCode'] . $_POST['StudentPersonalID'] . '" 
            ')->result();

            $StudentPersonalID = $this->sandb_encode($_POST['StudentPersonalID']);
            $StudentPassportNumber = $this->sandb_encode($_POST['StudentPassportNumber']);
            $StudentBirthDate = $this->sandb_encode($_POST['StudentBirthDate']);

            if ($result != TRUE) {

                $this->forms_student->add_student($SchoolID, $StudentPersonalID, $StudentPassportNumber, $StudentBirthDate);

                $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
                redirect(base_url('student?SchoolID=' . $SchoolID));
            } else {
                $_SESSION['danger'] = "ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบข้อมูลนักเรียนนี้อาจจะซ้ำในระบบ";
                redirect(base_url('forms-student?SchoolID=' . $SchoolID));
            }
        }

        ////////////////////////////////forms-student- END///////////////////////////

        ///////////////////////////////////forms-student-select/////////////////////////////////
        //PageForm student Select
        public function forms_student_select()
        {

            if (!file_exists(APPPATH . 'views/pages/forms/student/forms-student-select.php')) {
                //Whoops,wedon'thaveapageforthat!
                show_404();
            }

            $data['title'] = 'Forms Student Select'; //Capitalizethefirstletter

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pages/forms/student/forms-student-select', $data);
            $this->load->view('templates/footer', $data);
        }

        //Add Data Form student Select SchoolID , EducationYear , Semester , GradeLevelCode
        public function add_student_select($SchoolID, $EducationYear, $Semester, $GradeLevelCode)
        {

            $result = $this->db->query('SELECT * 
            FROM STUDENT 
            WHERE DeleteStatus = 0
            AND SchoolID = ' . $SchoolID . ' 
            AND StudentReferenceID = "' . $_POST['StudentPersonalIDTypeCode'] . $_POST['StudentPersonalID'] . '" 
            ')->result();

            $StudentPersonalID = $this->sandb_encode($_POST['StudentPersonalID']);
            $StudentPassportNumber = $this->sandb_encode($_POST['StudentPassportNumber']);
            $StudentBirthDate = $this->sandb_encode($_POST['StudentBirthDate']);

            if ($result != TRUE) {
                $this->forms_student->add_student_select($SchoolID, $EducationYear, $Semester, $GradeLevelCode, $StudentPersonalID, $StudentPassportNumber, $StudentBirthDate);
                $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
                redirect(base_url('student?SchoolID=' . $SchoolID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode));
            } else {
                $_SESSION['danger'] = "ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบข้อมูลนักเรียนนี้อาจจะซ้ำในระบบ";
                redirect(base_url('forms-student?SchoolID=' . $SchoolID));
            }
        }

        ////////////////////////////////forms-student-select-END///////////////////////////


        ///////////////////////////////////edit-forms-student-main/////////////////////////////////
        //PageForm edit-forms-student-main
        public function edit_forms_student_main()
        {

            if (!file_exists(APPPATH . 'views/pages/forms/student/edit-forms-student-main.php')) {
                //Whoops,wedon'thaveapageforthat!
                show_404();
            }

            $data['title'] = 'Forms edit Student main'; //Capitalizethefirstletter

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pages/forms/student/edit-forms-student-main', $data);
            $this->load->view('templates/footer', $data);
        }

        //update Data student Main
        public function update_student_main($StudentReferenceID, $SchoolID, $EducationYear, $Semester, $GradeLevelCode, $ImageStudent)
        {
            //StudentStatusCode
            $this->forms_student->update_student_main($StudentReferenceID, $SchoolID, $ImageStudent);
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('student?StudentReferenceID=' . $StudentReferenceID . '&&SchoolID=' . $SchoolID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&ShowDetail='));
        }
        ////////////////////////////////edit-forms-student-main-END///////////////////////////


        ///////////////////////////////////edit-forms-student-person/////////////////////////////////
        //PageForm edit-forms-student-person
        public function edit_forms_student_person()
        {

            if (!file_exists(APPPATH . 'views/pages/forms/student/edit-forms-student-person.php')) {
                //Whoops,wedon'thaveapageforthat!
                show_404();
            }

            $data['title'] = 'Forms edit Student person'; //Capitalizethefirstletter

            if (isset($_GET['StudentReferenceID'])) {
                $result = $this->db->query('SELECT * FROM STUDENT
                                WHERE DeleteStatus = 0 AND StudentReferenceID = "' . $_GET['StudentReferenceID'] . '"');
                foreach ($result->result() as $DETAIL) {
                    $data['StudentPersonalID'] = $this->sandb_decode($DETAIL->StudentPersonalID);
                    $data['StudentPassportNumber'] = $this->sandb_decode($DETAIL->StudentPassportNumber);
                    $data['StudentBirthDate'] = $this->sandb_decode($DETAIL->StudentBirthDate);
                }
            }

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pages/forms/student/edit-forms-student-person', $data);
            $this->load->view('templates/footer', $data);
        }

        //update Data student person
        public function update_student_person($StudentReferenceID, $SchoolID, $EducationYear, $Semester, $GradeLevelCode)
        {
            $StudentPersonalID = $this->sandb_encode($_POST['StudentPersonalID']);
            $StudentPassportNumber = $this->sandb_encode($_POST['StudentPassportNumber']);
            $StudentBirthDate = $this->sandb_encode($_POST['StudentBirthDate']);

            $this->forms_student->update_student_person($StudentReferenceID, $SchoolID, $StudentPersonalID, $StudentPassportNumber, $StudentBirthDate);
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('student?StudentReferenceID=' . $StudentReferenceID . '&&SchoolID=' . $SchoolID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&ShowDetail='));
        }
        ////////////////////////////////edit-forms-student-person-END///////////////////////////

        ///////////////////////////////////edit-forms-student-address/////////////////////////////////
        //PageForm edit-forms-student-address
        public function edit_forms_student_address()
        {

            if (!file_exists(APPPATH . 'views/pages/forms/student/edit-forms-student-address.php')) {
                //Whoops,wedon'thaveapageforthat!
                show_404();
            }

            $data['title'] = 'Forms edit Student address'; //Capitalizethefirstletter

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pages/forms/student/edit-forms-student-address', $data);
            $this->load->view('templates/footer', $data);
        }

        //update Data student address
        public function update_student_address($StudentReferenceID, $SchoolID, $EducationYear, $Semester, $GradeLevelCode)
        {
            $this->forms_student->update_student_address($StudentReferenceID, $SchoolID);
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('student?StudentReferenceID=' . $StudentReferenceID . '&&SchoolID=' . $SchoolID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&ShowDetail='));
        }
        ////////////////////////////////edit-forms-student-address-END///////////////////////////

        ///////////////////////////////////edit-forms-student-parents/////////////////////////////////
        //PageForm edit-forms-student-parents
        public function edit_forms_student_parents()
        {

            if (!file_exists(APPPATH . 'views/pages/forms/student/edit-forms-student-parents.php')) {
                //Whoops,wedon'thaveapageforthat!
                show_404();
            }

            if (isset($_GET['StudentReferenceID'])) {
                $result = $this->db->query('SELECT * FROM STUDENT
                                WHERE DeleteStatus = 0 AND StudentReferenceID = "' . $_GET['StudentReferenceID'] . '"');
                foreach ($result->result() as $DETAIL) {
                    $data['StudentPersonalID'] = $this->sandb_decode($DETAIL->StudentPersonalID);
                    $data['StudentPassportNumber'] = $this->sandb_decode($DETAIL->StudentPassportNumber);
                    $data['FatherPersonalID'] = $this->sandb_decode($DETAIL->FatherPersonalID);
                    $data['FatherPassportNumber'] = $this->sandb_decode($DETAIL->FatherPassportNumber);
                    $data['MotherPersonalID'] = $this->sandb_decode($DETAIL->MotherPersonalID);
                    $data['MotherPassportNumber'] = $this->sandb_decode($DETAIL->MotherPassportNumber);
                    $data['GuardianPersonalID'] = $this->sandb_decode($DETAIL->GuardianPersonalID);
                    $data['GuardianPassportNumber'] = $this->sandb_decode($DETAIL->GuardianPassportNumber);
                }
            }

            $data['title'] = 'Forms edit Student parents'; //Capitalizethefirstletter
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pages/forms/student/edit-forms-student-parents', $data);
            $this->load->view('templates/footer', $data);
        }

        //update Data student parents
        public function update_student_parents($StudentReferenceID, $SchoolID, $EducationYear, $Semester, $GradeLevelCode)
        {
            $FatherPersonalID = $this->sandb_encode($_POST['FatherPersonalID']);
            $MotherPersonalID = $this->sandb_encode($_POST['MotherPersonalID']);
            $FatherPassportNumber = $this->sandb_encode($_POST['FatherPassportNumber']);
            $MotherPassportNumber = $this->sandb_encode($_POST['MotherPassportNumber']);

            $this->forms_student->update_student_parents($StudentReferenceID, $SchoolID, $FatherPersonalID, $MotherPersonalID, $FatherPassportNumber, $MotherPassportNumber);
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('student?StudentReferenceID=' . $StudentReferenceID . '&&SchoolID=' . $SchoolID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&ShowDetail='));
        }
        ////////////////////////////////edit-forms-student-parents-END///////////////////////////


        ///////////////////////////////////edit-forms-student-family/////////////////////////////////
        //PageForm edit-forms-student-family
        public function edit_forms_student_family()
        {

            if (!file_exists(APPPATH . 'views/pages/forms/student/edit-forms-student-family.php')) {
                //Whoops,wedon'thaveapageforthat!
                show_404();
            }
            if (isset($_GET['StudentReferenceID'])) {
                $result = $this->db->query('SELECT * FROM STUDENT
                                WHERE DeleteStatus = 0 AND StudentReferenceID = "' . $_GET['StudentReferenceID'] . '"');
                foreach ($result->result() as $DETAIL) {
                    $data['GuardianPersonalID'] = $this->sandb_decode($DETAIL->GuardianPersonalID);
                    $data['GuardianPassportNumber'] = $this->sandb_decode($DETAIL->GuardianPassportNumber);
                }
            }
            $data['title'] = 'Forms edit Student family'; //Capitalizethefirstletter

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pages/forms/student/edit-forms-student-family', $data);
            $this->load->view('templates/footer', $data);
        }

        //update Data student family
        public function update_student_family($StudentReferenceID, $SchoolID, $EducationYear, $Semester, $GradeLevelCode)
        {
            $GuardianPersonalID = $this->sandb_encode($_POST['GuardianPersonalID']);
            $GuardianPassportNumber = $this->sandb_encode($_POST['GuardianPassportNumber']);
            $this->forms_student->update_student_family($StudentReferenceID, $SchoolID, $GuardianPersonalID, $GuardianPassportNumber);
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('student?StudentReferenceID=' . $StudentReferenceID . '&&SchoolID=' . $SchoolID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&ShowDetail='));
        }
        ////////////////////////////////edit-forms-student-family-END///////////////////////////

        ///////////////////////////////////edit-forms-student-journey/////////////////////////////////
        //PageForm edit-forms-student-journey
        public function edit_forms_student_journey()
        {

            if (!file_exists(APPPATH . 'views/pages/forms/student/edit-forms-student-journey.php')) {
                //Whoops,wedon'thaveapageforthat!
                show_404();
            }

            $data['title'] = 'Forms edit Student journey'; //Capitalizethefirstletter

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pages/forms/student/edit-forms-student-journey', $data);
            $this->load->view('templates/footer', $data);
        }

        //update Data student journey
        public function update_student_journey($StudentReferenceID, $SchoolID, $EducationYear, $Semester, $GradeLevelCode)
        {
            $this->forms_student->update_student_journey($StudentReferenceID, $SchoolID);
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('student?StudentReferenceID=' . $StudentReferenceID . '&&SchoolID=' . $SchoolID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&ShowDetail='));
        }
        ////////////////////////////////edit-forms-student-journey-END///////////////////////////

        ///////////////////////////////////edit-forms-student-disadvantaged/////////////////////////////////
        //PageForm edit-forms-student-disadvantaged
        public function edit_forms_student_disadvantaged()
        {

            if (!file_exists(APPPATH . 'views/pages/forms/student/edit-forms-student-disadvantaged.php')) {
                //Whoops,wedon'thaveapageforthat!
                show_404();
            }

            $data['title'] = 'Forms edit Student disadvantaged'; //Capitalizethefirstletter

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pages/forms/student/edit-forms-student-disadvantaged', $data);
            $this->load->view('templates/footer', $data);
        }

        //update Data student disadvantaged
        public function update_student_disadvantaged($StudentReferenceID, $SchoolID, $EducationYear, $Semester, $GradeLevelCode)
        {
            $this->forms_student->update_student_disadvantaged($StudentReferenceID, $SchoolID);
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('student?StudentReferenceID=' . $StudentReferenceID . '&&SchoolID=' . $SchoolID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&ShowDetail='));
        }
        ////////////////////////////////edit-forms-student-disadvantaged-END///////////////////////////


        ///////////////////////////////////edit-forms-student-talent/////////////////////////////////
        //PageForm edit-forms-student-talent
        public function edit_forms_student_talent()
        {

            if (!file_exists(APPPATH . 'views/pages/forms/student/edit-forms-student-talent.php')) {
                //Whoops,wedon'thaveapageforthat!
                show_404();
            }

            $data['title'] = 'Forms edit Student talent'; //Capitalizethefirstletter

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pages/forms/student/edit-forms-student-talent', $data);
            $this->load->view('templates/footer', $data);
        }

        //update Data student talent
        public function update_student_talent($StudentReferenceID, $SchoolID, $EducationYear, $Semester, $GradeLevelCode)
        {
            $this->forms_student->update_student_talent($StudentReferenceID, $SchoolID);
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('student?StudentReferenceID=' . $StudentReferenceID . '&&SchoolID=' . $SchoolID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&ShowDetail='));
        }
        ////////////////////////////////edit-forms-student-talent-END///////////////////////////


        //Delete Data Form student
        public function delete_student($StudentReferenceID, $SchoolID, $EducationYear, $Semester, $GradeLevelCode)
        {

            $transcript = $this->db->query('SELECT * 
            FROM TRANSCRIPT 
            WHERE DeleteStatus = 0
            AND StudentReferenceID = "' . $StudentReferenceID . '" 
            ')->result();

            $graduated = $this->db->query('SELECT * 
            FROM GRADUATED 
            WHERE DeleteStatus = 0
            AND StudentReferenceID = "' . $StudentReferenceID . '"  
            ')->result();

            if ($transcript != TRUE && $graduated != TRUE) {
                $this->forms_student->delete_student($StudentReferenceID);
                $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
            } else {
                $_SESSION['danger'] = "ไม่สามารถลบข้อมูลได้ โปรดลบข้อมูลอื่นที่เกี่ยวข้องก่อนลบข้อมูล";
            }

            redirect(base_url('student?SchoolID=' . $SchoolID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode));
        }


        public function uploadfile_student()
        {
            if (isset($_FILES['FileStudentUpload'])) {
                $i = 1;
                $count = 0;
                $handle = fopen($_FILES['FileStudentUpload']['tmp_name'], 'r');
                ini_set('auto_detect_line_endings', TRUE);
                while (($data = fgetcsv($handle)) !== FALSE && $data[0] != '') {

                    if ($data[1] != '') {
                        $result = $this->db->query('SELECT * FROM CLS_STUDENT_STATUS WHERE STUDENT_STATUS_NAME = "' . $data[1] . '"');
                        if ($result == TRUE) {
                            foreach ($result->result() as $CLS_STUDENT_STATUS) {
                                $StudentStatusCode = $CLS_STUDENT_STATUS->STUDENT_STATUS_CODE;
                            }
                        } else $StudentStatusCode = $data[1];
                    } else $StudentStatusCode = $data[1];

                    if ($data[3] != '') {
                        $result = $this->db->query('SELECT * FROM CLS_CITIZEN_ID_TYPE WHERE CITIZEN_ID_TYPE_NAME = "' . $data[3] . '"');
                        if ($result == TRUE) {
                            foreach ($result->result() as $CLS_CITIZEN_ID_TYPE) {
                                $StudentPersonalIDTypeCode = $CLS_CITIZEN_ID_TYPE->CITIZEN_ID_TYPE_CODE;
                            }
                        } else $StudentPersonalIDTypeCode = $data[3];
                    } else $StudentPersonalIDTypeCode = $data[3];

                    if ($data[5] != '') {
                        $result = $this->db->query('SELECT * FROM CLS_PREFIX WHERE PREFIX_NAME = "' . $data[5] . '"');
                        if ($result == TRUE) {
                            foreach ($result->result() as $CLS_PREFIX) {
                                $StudentPrefixCode = $CLS_PREFIX->PREFIX_CODE;
                            }
                        } else $StudentPrefixCode = $data[5];
                    } else $StudentPrefixCode = $data[5];

                    if ($data[12] != '') {
                        $result = $this->db->query('SELECT * FROM CLS_GENDER WHERE GENDER_NAME = "' . $data[12] . '"');
                        if ($result == TRUE) {
                            foreach ($result->result() as $CLS_GENDER) {
                                $StudentGenderCode = $CLS_GENDER->GENDER_CODE;
                            }
                        } else $StudentGenderCode = $data[12];
                    } else $StudentGenderCode = $data[12];

                    if ($data[14] != '') {
                        $result = $this->db->query('SELECT * FROM CLS_PROVINCE WHERE PROVINCE_NAME = "' . $data[14] . '"');
                        if ($result == TRUE) {
                            foreach ($result->result() as $CLS_PROVINCE) {
                                $StudentBirthProvinceCode = $CLS_PROVINCE->PROVINCE_CODE;
                            }
                        } else $StudentBirthProvinceCode = $data[14];
                    } else $StudentBirthProvinceCode = $data[14];

                    if ($data[15] != '') {
                        $result = $this->db->query('SELECT * FROM CLS_NATIONALITY WHERE NATIONALITY_NAME = "' . $data[15] . '"');
                        if ($result == TRUE) {
                            foreach ($result->result() as $CLS_NATIONALITY) {
                                $StudentNationalityCode = $CLS_NATIONALITY->NATIONALITY_CODE;
                            }
                        } else $StudentNationalityCode = $data[15];
                    } else $StudentNationalityCode = $data[15];

                    if ($data[16] != '') {
                        $result = $this->db->query('SELECT * FROM CLS_RACE WHERE RACE_NAME = "' . $data[16] . '"');
                        if ($result == TRUE) {
                            foreach ($result->result() as $CLS_RACE) {
                                $StudentRaceCode = $CLS_RACE->RACE_CODE;
                            }
                        } else $StudentRaceCode = $data[16];
                    } else $StudentRaceCode = $data[16];

                    if ($data[17] != '') {
                        $result = $this->db->query('SELECT * FROM CLS_RELIGION WHERE RELIGION_NAME = "' . $data[17] . '"');
                        if ($result == TRUE) {
                            foreach ($result->result() as $CLS_RELIGION) {
                                $StudentReligionCode = $CLS_RELIGION->RELIGION_CODE;
                            }
                        } else $StudentReligionCode = $data[17];
                    } else $StudentReligionCode = $data[17];

                    if ($data[18] != '') {
                        $result = $this->db->query('SELECT * FROM CLS_LANGUAGE WHERE LANGUAGE_NAME = "' . $data[18] . '"');
                        if ($result == TRUE) {
                            foreach ($result->result() as $CLS_LANGUAGE) {
                                $StudentLanguageCode = $CLS_LANGUAGE->LANGUAGE_CODE;
                            }
                        } else $StudentLanguageCode = $data[18];
                    } else $StudentLanguageCode = $data[18];

                    if ($data[19] != '') {
                        $result = $this->db->query('SELECT * FROM CLS_LANGUAGE WHERE LANGUAGE_NAME = "' . $data[19] . '"');
                        if ($result == TRUE) {
                            foreach ($result->result() as $CLS_LANGUAGE) {
                                $StudentOtherLanguageCode = $CLS_LANGUAGE->LANGUAGE_CODE;
                            }
                        } else $StudentOtherLanguageCode = $data[19];
                    } else $StudentOtherLanguageCode = $data[19];

                    if ($data[20] != '') {
                        $result = $this->db->query('SELECT * FROM CLS_BLOOD WHERE BLOOD_NAME = "' . $data[20] . '"');
                        if ($result == TRUE) {
                            foreach ($result->result() as $CLS_BLOOD) {
                                $StudentBloodCode = $CLS_BLOOD->BLOOD_CODE;
                            }
                        } else $StudentBloodCode = $data[20];
                    } else $StudentBloodCode = $data[20];

                    if ($data[29] != '') {
                        $result = $this->db->query('SELECT * FROM CLS_SUBDISTRICT WHERE SUBDISTRICT_NAME = "' . $data[29] . '"');
                        if ($result == TRUE) {
                            foreach ($result->result() as $CLS_SUBDISTRICT) {
                                $StudentOfficialAddressSubdistrictCode = $CLS_SUBDISTRICT->SUBDISTRICT_CODE;
                            }
                        } else $StudentOfficialAddressSubdistrictCode = $data[29];
                    } else $StudentOfficialAddressSubdistrictCode = $data[29];

                    if ($data[30] != '') {
                        $result = $this->db->query('SELECT * FROM CLS_DISTRICT WHERE DISTRICT_NAME = "' . $data[30] . '"');
                        if ($result == TRUE) {
                            foreach ($result->result() as $CLS_DISTRICT) {
                                $StudentOfficialAddressDistrictCode = $CLS_DISTRICT->DISTRICT_CODE;
                            }
                        } else $StudentOfficialAddressDistrictCode = $data[30];
                    } else $StudentOfficialAddressDistrictCode = $data[30];

                    if ($data[31] != '') {
                        $result = $this->db->query('SELECT * FROM CLS_PROVINCE WHERE PROVINCE_NAME = "' . $data[31] . '"');
                        if ($result == TRUE) {
                            foreach ($result->result() as $CLS_PROVINCE) {
                                $StudentOfficialAddressProvinceCode = $CLS_PROVINCE->PROVINCE_CODE;
                            }
                        } else $StudentOfficialAddressProvinceCode = $data[31];
                    } else $StudentOfficialAddressProvinceCode = $data[31];

                    if ($data[40] != '') {
                        $result = $this->db->query('SELECT * FROM CLS_SUBDISTRICT WHERE SUBDISTRICT_NAME = "' . $data[40] . '"');
                        if ($result == TRUE) {
                            foreach ($result->result() as $CLS_SUBDISTRICT) {
                                $StudentCurrentAddressSubdistrictCode = $CLS_SUBDISTRICT->SUBDISTRICT_CODE;
                            }
                        } else $StudentCurrentAddressSubdistrictCode = $data[40];
                    } else $StudentCurrentAddressSubdistrictCode = $data[40];

                    if ($data[41] != '') {
                        $result = $this->db->query('SELECT * FROM CLS_DISTRICT WHERE DISTRICT_NAME = "' . $data[41] . '"');
                        if ($result == TRUE) {
                            foreach ($result->result() as $CLS_DISTRICT) {
                                $StudentCurrentAddressDistrictCode = $CLS_DISTRICT->DISTRICT_CODE;
                            }
                        } else $StudentCurrentAรีddressDistrictCode = $data[41];
                    } else $StudentCurrentAddressDistrictCode = $data[41];

                    if ($data[42] != '') {
                        $result = $this->db->query('SELECT * FROM CLS_PROVINCE WHERE PROVINCE_NAME = "' . $data[42] . '"');
                        if ($result == TRUE) {
                            foreach ($result->result() as $CLS_PROVINCE) {
                                $StudentCurrentAddressProvinceCode = $CLS_PROVINCE->PROVINCE_CODE;
                            }
                        } else $StudentCurrentAddressProvinceCode = $data[41];
                    } else $StudentCurrentAddressProvinceCode = $data[41];

                    if ($data[46] != '') {
                        $result = $this->db->query('SELECT * FROM CLS_CITIZEN_ID_TYPE WHERE CITIZEN_ID_TYPE_NAME = "' . $data[46] . '"');
                        if ($result == TRUE) {
                            foreach ($result->result() as $CLS_CITIZEN_ID_TYPE) {
                                $FatherPersonalIDTypeCode = $CLS_CITIZEN_ID_TYPE->CITIZEN_ID_TYPE_CODE;
                            }
                        } else $FatherPersonalIDTypeCode = $data[46];
                    } else $FatherPersonalIDTypeCode = $data[46];

                    if ($data[48] != '') {
                        $result = $this->db->query('SELECT * FROM CLS_PREFIX WHERE PREFIX_NAME = "' . $data[48] . '"');
                        if ($result == TRUE) {
                            foreach ($result->result() as $CLS_PREFIX) {
                                $FatherPrefixCode = $CLS_PREFIX->PREFIX_CODE;
                            }
                        } else $FatherPrefixCode = $data[48];
                    } else $FatherPrefixCode = $data[48];

                    if ($data[55] != '') {
                        $result = $this->db->query('SELECT * FROM CLS_PERSON_STATUS WHERE PERSON_STATUS_NAME = "' . $data[55] . '"');
                        if ($result == TRUE) {
                            foreach ($result->result() as $CLS_PERSON_STATUS) {
                                $FatherPersonStatusCode = $CLS_PERSON_STATUS->PERSON_STATUS_CODE;
                            }
                        } else $FatherPersonStatusCode = $data[55];
                    } else $FatherPersonStatusCode = $data[55];

                    if ($data[57] != '') {
                        $result = $this->db->query('SELECT * FROM CLS_OCCUPATION WHERE OCCUPATION_NAME = "' . $data[57] . '"');
                        if ($result == TRUE) {
                            foreach ($result->result() as $CLS_OCCUPATION) {
                                $FatherOccupationCode = $CLS_OCCUPATION->OCCUPATION_CODE;
                            }
                        } else $FatherOccupationCode = $data[57];
                    } else $FatherOccupationCode = $data[57];

                    if ($data[60] != '') {
                        $result = $this->db->query('SELECT * FROM CLS_CITIZEN_ID_TYPE WHERE CITIZEN_ID_TYPE_NAME = "' . $data[60] . '"');
                        if ($result == TRUE) {
                            foreach ($result->result() as $CLS_CITIZEN_ID_TYPE) {
                                $MotherPersonalIDTypeCode = $CLS_CITIZEN_ID_TYPE->CITIZEN_ID_TYPE_CODE;
                            }
                        } else $MotherPersonalIDTypeCode = $data[60];
                    } else $MotherPersonalIDTypeCode = $data[60];

                    if ($data[62] != '') {
                        $result = $this->db->query('SELECT * FROM CLS_PREFIX WHERE PREFIX_NAME = "' . $data[62] . '"');
                        if ($result == TRUE) {
                            foreach ($result->result() as $CLS_PREFIX) {
                                $MotherPrefixCode = $CLS_PREFIX->PREFIX_CODE;
                            }
                        } else $MotherPrefixCode = $data[62];
                    } else $MotherPrefixCode = $data[62];

                    if ($data[69] != '') {
                        $result = $this->db->query('SELECT * FROM CLS_PERSON_STATUS WHERE PERSON_STATUS_NAME = "' . $data[69] . '"');
                        if ($result == TRUE) {
                            foreach ($result->result() as $CLS_PERSON_STATUS) {
                                $MotherPersonStatusCode = $CLS_PERSON_STATUS->PERSON_STATUS_CODE;
                            }
                        } else $MotherPersonStatusCode = $data[69];
                    } else $MotherPersonStatusCode = $data[69];

                    if ($data[71] != '') {
                        $result = $this->db->query('SELECT * FROM CLS_OCCUPATION WHERE OCCUPATION_NAME = "' . $data[71] . '"');
                        if ($result == TRUE) {
                            foreach ($result->result() as $CLS_OCCUPATION) {
                                $MotherOccupationCode = $CLS_OCCUPATION->OCCUPATION_CODE;
                            }
                        } else $MotherOccupationCode = $data[71];
                    } else $MotherOccupationCode = $data[71];

                    if ($data[74] != '') {
                        $result = $this->db->query('SELECT * FROM CLS_CITIZEN_ID_TYPE WHERE CITIZEN_ID_TYPE_NAME = "' . $data[74] . '"');
                        if ($result == TRUE) {
                            foreach ($result->result() as $CLS_CITIZEN_ID_TYPE) {
                                $GuardianPersonalIDTypeCode = $CLS_CITIZEN_ID_TYPE->CITIZEN_ID_TYPE_CODE;
                            }
                        } else $GuardianPersonalIDTypeCode = $data[74];
                    } else $GuardianPersonalIDTypeCode = $data[74];

                    if ($data[76] != '') {
                        $result = $this->db->query('SELECT * FROM CLS_PREFIX WHERE PREFIX_NAME = "' . $data[76] . '"');
                        if ($result == TRUE) {
                            foreach ($result->result() as $CLS_PREFIX) {
                                $GuardianPrefixCode = $CLS_PREFIX->PREFIX_CODE;
                            }
                        } else $GuardianPrefixCode = $data[76];
                    } else $GuardianPrefixCode = $data[76];

                    if ($data[83] != '') {
                        $result = $this->db->query('SELECT * FROM CLS_FAMILY_RELATION WHERE FAMILY_RELATION_NAME = "' . $data[83] . '"');
                        if ($result == TRUE) {
                            foreach ($result->result() as $CLS_FAMILY_RELATION) {
                                $GuardianRelationCode = $CLS_FAMILY_RELATION->FAMILY_RELATION_CODE;
                            }
                        } else $GuardianRelationCode = $data[83];
                    } else $GuardianRelationCode = $data[83];

                    if ($data[85] != '') {
                        $result = $this->db->query('SELECT * FROM CLS_OCCUPATION WHERE OCCUPATION_NAME = "' . $data[85] . '"');
                        if ($result == TRUE) {
                            foreach ($result->result() as $CLS_OCCUPATION) {
                                $GuardianOccupationCode = $CLS_OCCUPATION->OCCUPATION_CODE;
                            }
                        } else $GuardianOccupationCode = $data[85];
                    } else $GuardianOccupationCode = $data[85];

                    if ($data[87] != '') {
                        $result = $this->db->query('SELECT * FROM CLS_MARRIAGE_STATUS WHERE MARRIAGE_STATUS_NAME = "' . $data[87] . '"');
                        if ($result == TRUE) {
                            foreach ($result->result() as $CLS_MARRIAGE_STATUS) {
                                $ParentMarriageStatusCode = $CLS_MARRIAGE_STATUS->MARRIAGE_STATUS_CODE;
                            }
                        } else $ParentMarriageStatusCode = $data[87];
                    } else $ParentMarriageStatusCode = $data[87];

                    if ($data[98] != '') {
                        $result = $this->db->query('SELECT * FROM CLS_JOURNEY_TYPE WHERE JOURNEY_TYPE_NAME = "' . $data[98] . '"');
                        if ($result == TRUE) {
                            foreach ($result->result() as $CLS_JOURNEY_TYPE) {
                                $JourneyTypeCode = $CLS_JOURNEY_TYPE->JOURNEY_TYPE_CODE;
                            }
                        } else $JourneyTypeCode = $data[98];
                    } else $JourneyTypeCode = $data[98];

                    if ($data[103] != '') {
                        $result = $this->db->query('SELECT * FROM CLS_DISABILITY WHERE DISABILITY_NAME = "' . $data[103] . '"');
                        if ($result == TRUE) {
                            foreach ($result->result() as $CLS_DISABILITY) {
                                $DisabilityCode = $CLS_DISABILITY->DISABILITY_CODE;
                            }
                        } else $DisabilityCode = $data[103];
                    } else $DisabilityCode = $data[103];

                    if ($data[105] != '') {
                        $result = $this->db->query('SELECT * FROM CLS_DISABILITY_LEVEL WHERE DISABILITY_LEVEL_NAME = "' . $data[105] . '"');
                        if ($result == TRUE) {
                            foreach ($result->result() as $CLS_DISABILITY_LEVEL) {
                                $DisabilityLevelCode = $CLS_DISABILITY_LEVEL->DISABILITY_LEVEL_CODE;
                            }
                        } else $DisabilityLevelCode = $data[105];
                    } else $DisabilityLevelCode = $data[105];

                    if ($data[106] != '') {
                        $result = $this->db->query('SELECT * FROM CLS_DISAVANTAGED WHERE DISAVANTAGED_NAME = "' . $data[106] . '"');
                        if ($result == TRUE) {
                            foreach ($result->result() as $CLS_DISAVANTAGED) {
                                $DisadvantagedCode = $CLS_DISAVANTAGED->DISAVANTAGED_CODE;
                            }
                        } else $DisadvantagedCode = $data[106];
                    } else $DisadvantagedCode = $data[106];

                    if ($data[112] != '') {
                        $result = $this->db->query('SELECT * FROM CLS_FAMILY_STATUS WHERE FAMILY_STATUS_NAME = "' . $data[112] . '"');
                        if ($result == TRUE) {
                            foreach ($result->result() as $CLS_FAMILY_STATUS) {
                                $FamilyStatusCode = $CLS_FAMILY_STATUS->FAMILY_STATUS_CODE;
                            }
                        } else $FamilyStatusCode = $data[112];
                    } else $FamilyStatusCode = $data[112];

                    if ($data[113] != '') {
                        $result = $this->db->query('SELECT * FROM CLS_STUDENT_LIVE_WITH WHERE STUDENT_LIVE_WITH_NAME = "' . $data[113] . '"');
                        if ($result == TRUE) {
                            foreach ($result->result() as $CLS_STUDENT_LIVE_WITH) {
                                $StudentLiveWithCode = $CLS_STUDENT_LIVE_WITH->STUDENT_LIVE_WITH_CODE;
                            }
                        } else $StudentLiveWithCode = $data[113];
                    } else $StudentLiveWithCode = $data[113];

                    if ($data[115] != '') {
                        $result = $this->db->query('SELECT * FROM CLS_TALENT WHERE TALENT_NAME = "' . $data[115] . '"');
                        if ($result == TRUE) {
                            foreach ($result->result() as $CLS_TALENT) {
                                $TalentCode = $CLS_TALENT->TALENT_CODE;
                            }
                        } else $TalentCode = $data[115];
                    } else $TalentCode = $data[115];


                    if ($data[96] != '') {
                        if ($data[96] == 'เรียน') {
                            $PartSchoolFlag = 1;
                        } elseif ($data[96] == 'ไม่เรียน') {
                            $PartSchoolFlag = 0;
                        } else $PartSchoolFlag = $data[96];
                    } else $PartSchoolFlag = $data[96];

                    if ($data[107] != '') {
                        if ($data[107] == 'ขาดแคลน') {
                            $LackingBookFlag = 1;
                        } elseif ($data[107] == 'ไม่ขาดแคลน') {
                            $LackingBookFlag = 0;
                        } else $LackingBookFlag = $data[107];
                    } else $LackingBookFlag = $data[107];

                    if ($data[108] != '') {
                        if ($data[108] == 'ขาดแคลน') {
                            $LackingFoodFlag = 1;
                        } elseif ($data[108] == 'ไม่ขาดแคลน') {
                            $LackingFoodFlag = 0;
                        } else $LackingFoodFlag = $data[108];
                    } else $LackingFoodFlag = $data[108];

                    if ($data[109] != '') {
                        if ($data[109] == 'ขาดแคลน') {
                            $LackingStationeryFlag = 1;
                        } elseif ($data[109] == 'ไม่ขาดแคลน') {
                            $LackingStationeryFlag = 0;
                        } else $LackingStationeryFlag = $data[109];
                    } else $LackingStationeryFlag = $data[109];

                    if ($data[110] != '') {
                        if ($data[110] == 'ขาดแคลน') {
                            $LackingUniformFlag = 1;
                        } elseif ($data[110] == 'ไม่ขาดแคลน') {
                            $LackingUniformFlag = 0;
                        } else $LackingUniformFlag = $data[110];
                    } else $LackingUniformFlag = $data[110];

                    if ($data[114] != '') {
                        if ($data[114] == 'มี') {
                            $StateWelfareFlag = 1;
                        } elseif ($data[114] == 'ไม่มี') {
                            $StateWelfareFlag = 0;
                        } else {
                            $StateWelfareFlag = $data[114];
                        }
                    } else $StateWelfareFlag = $data[114];


                    if ($i > 1 && $data[0] != '' && $data[1] != '' && $data[2] != '' && $data[3] != '' && $data[5] != '' && $data[6] != '' && $data[10] != '' && $data[12] != '' && $data[13] != '' && $data[15] != '' && $data[16] != '' && $data[17] != '' && $data[20] != '' && $data[21] != '' && $data[22] != '' && $data[93] != '' && $data[94] != '') {

                        $database = [

                            'StudentReferenceID' =>  $StudentPersonalIDTypeCode . $data[2],
                            'EducationYear' => $_POST['EducationYear'],
                            'Semester' => $_POST['Semester'],
                            'SchoolID' => $_POST['SchoolID'],
                            'StudentID' => $data[0],
                            'StudentStatusCode' => $StudentStatusCode,
                            'StudentPersonalID' => $this->sandb_encode($data[2]),
                            'StudentPersonalIDTypeCode' => $StudentPersonalIDTypeCode,
                            'StudentPassportNumber' => $data[4],
                            'StudentPrefixCode' => $StudentPrefixCode,
                            'StudentNameThai' => $data[6],
                            'StudentNameEnglish' => $data[7],
                            'StudentMiddleNameThai' => $data[8],
                            'StudentMiddleEnglish' => $data[9],
                            'StudentLastNameThai' => $data[10],
                            'StudentLastNameEnglish' => $data[11],
                            'StudentGenderCode' => $StudentGenderCode,
                            'StudentBirthDate' => $this->sandb_encode($data[13]),
                            'StudentBirthProvinceCode' => $StudentBirthProvinceCode,
                            'StudentNationalityCode' => $StudentNationalityCode,
                            'StudentRaceCode' => $StudentRaceCode,
                            'StudentReligionCode' => $StudentReligionCode,
                            'StudentLanguageCode' => $StudentLanguageCode,
                            'StudentOtherLanguageCode' => $StudentOtherLanguageCode,
                            'StudentBloodCode' => $StudentBloodCode,
                            'StudentWeight' => $data[21],
                            'StudentHeight' => $data[22],
                            'StudentOfficialAddressHouseRegisterID' => $data[23],
                            'StudentOfficialAddressHouseNumber' => $data[24],
                            'StudentOfficialAddressMoo' => $data[25],
                            'StudentOfficialAddressStreet' => $data[26],
                            'StudentOfficialAddressSoi' => $data[27],
                            'StudentOfficialAddressTrok' => $data[28],
                            'StudentOfficialAddressSubdistrictCode' => $StudentOfficialAddressSubdistrictCode,
                            'StudentOfficialAddressDistrictCode' => $StudentOfficialAddressDistrictCode,
                            'StudentOfficialAddressProvinceCode' => $StudentOfficialAddressProvinceCode,
                            'StudentOfficialAddressPostcode' => $data[32],
                            'StudentOfficialAddressPhoneNumber ' => $data[33],
                            'StudentCurrentAddressHouseRegisterID' => $data[34],
                            'StudentCurrentAddressHouseNumber' => $data[35],
                            'StudentCurrentAddressMoo' => $data[36],
                            'StudentCurrentAddressStreet' => $data[37],
                            'StudentCurrentAddressSoi' => $data[38],
                            'StudentCurrentAddressTrok' => $data[39],
                            'StudentCurrentAddressSubdistrictCode' => $StudentCurrentAddressSubdistrictCode,
                            'StudentCurrentAddressDistrictCode' => $StudentCurrentAddressDistrictCode,
                            'StudentCurrentAddressProvinceCode' => $StudentCurrentAddressProvinceCode,
                            'StudentCurrentAddressPostcode' => $data[43],
                            'StudentCurrentAddressPhoneNumber' => $data[44],
                            'FatherPersonalID' => $this->sandb_encode($data[45]),
                            'FatherPersonalIDTypeCode' => $FatherPersonalIDTypeCode,
                            'FatherPassportNumber' => $data[47],
                            'FatherPrefixCode' => $FatherPrefixCode,
                            'FatherNameThai' => $data[49],
                            'FatherNameEnglish' => $data[50],
                            'FatherMiddleNameEnglish' => $data[51],
                            'FatherMiddleNameThai' => $data[52],
                            'FatherLastNameThai' => $data[53],
                            'FatherLastNameEnglish' => $data[54],
                            'FatherPersonStatusCode' => $FatherPersonStatusCode,
                            'FatherPhoneNumber' => $data[56],
                            'FatherOccupationCode' => $FatherOccupationCode,
                            'FatherSalary' => $data[58],
                            'MotherPersonalID' => $this->sandb_encode($data[59]),
                            'MotherPersonalIDTypeCode' => $MotherPersonalIDTypeCode,
                            'MotherPassportNumber' => $data[61],
                            'MotherPrefixCode' => $MotherPrefixCode,
                            'MotherNameThai' => $data[63],
                            'MotherNameEnglish' => $data[64],
                            'MotherMiddleNameThai' => $data[65],
                            'MotherMiddleNameEnglish' => $data[66],
                            'MotherLastNameThai' => $data[67],
                            'MotherLastNameEnglish' => $data[68],
                            'MotherPersonStatusCode' => $MotherPersonStatusCode,
                            'MotherPhoneNumber' => $data[70],
                            'MotherOccupationCode' => $MotherOccupationCode,
                            'MotherSalary' => $data[72],
                            'GuardianPersonalID' => $this->sandb_encode($data[73]),
                            'GuardianPersonalIDTypeCode' => $GuardianPersonalIDTypeCode,
                            'GuardianPassportNumber' => $data[75],
                            'GuardianPrefixCode' => $GuardianPrefixCode,
                            'GuardianNameThai' => $data[77],
                            'GuardianNameEnglish' => $data[78],
                            'GuardianMiddleNameThai' => $data[79],
                            'GuardianMiddleNameEnglish' => $data[80],
                            'GuardianLastNameThai' => $data[81],
                            'GuardianLastNameEnglish' => $data[82],
                            'GuardianRelationCode' => $GuardianRelationCode,
                            'GuardianPhoneNumber' => $data[84],
                            'GuardianOccupationCode' => $GuardianOccupationCode,
                            'GuardianSalary' => $data[86],
                            'ParentMarriageStatusCode' => $ParentMarriageStatusCode,
                            'StudentBirthOrder' => $data[88],
                            'StudentElderBrotherAmount' => $data[89],
                            'StudentElderSisterAmount' => $data[90],
                            'StudentYoungerBrotherAmount' => $data[91],
                            'StudentYoungerSisterAmount' => $data[92],
                            'CurrentEducationLevelAdmissionYear' => $data[93],
                            'SchoolAdmissionYear' => $data[94],
                            'EducationLevelCode' => $_POST['EducationLevelCode'],
                            'GradeLevelCode' =>  $_POST['GradeLevelCode'],
                            'Classroom' => $data[95],
                            'PartSchoolFlag' => $PartSchoolFlag,
                            'CurriculumID' => $data[97],
                            'JourneyTypeCode' => $JourneyTypeCode,
                            'JourneyTime' => $data[99],
                            'RockJourneyDistance' => $data[100],
                            'RubberJourneyDistance' => $data[101],
                            'WaterJourneyDistance' => $data[102],
                            'DisabilityCode' => $DisabilityCode,
                            'DisabilityDetail' => $data[104],
                            'DisabilityLevelCode' => $DisabilityLevelCode,
                            'DisadvantagedCode' => $DisadvantagedCode,
                            'LackingBookFlag' => $LackingBookFlag,
                            'LackingFoodFlag' => $LackingFoodFlag,
                            'LackingStationeryFlag' => $LackingStationeryFlag,
                            'LackingUniformFlag' => $LackingUniformFlag,
                            'FamilyMonthlyIncome' => $data[111],
                            'FamilyStatusCode' => $FamilyStatusCode,
                            'StudentLiveWithCode' => $StudentLiveWithCode,
                            'StateWelfareFlag' => $StateWelfareFlag,
                            'TalentCode' => $TalentCode

                        ];

                        $Check = $this->db->query('SELECT * 
                        FROM STUDENT 
                        WHERE StudentReferenceID = "' . $StudentPersonalIDTypeCode . $data[2] . '" 
                        ')->result();
                        if ($Check != TRUE) {
                            $insert = $this->db->insert('STUDENT', $database);
                            $_SESSION['Detail'][$i] = '-';
                            $_SESSION['StatusUpload'][$i] = 1;
                        } else {
                            $_SESSION['Detail'][$i] = 'ข้อมูลซ้ำในระบบ';
                            $_SESSION['StatusUpload'][$i] = 0;
                        }
                    }

                    $_SESSION['UploadSchoolDetail'][$i][0] = $data[0];
                    $_SESSION['UploadSchoolDetail'][$i][1] = $data[5];
                    $_SESSION['UploadSchoolDetail'][$i][2] = $data[6];
                    $_SESSION['UploadSchoolDetail'][$i][3] = $data[10];

                    if ($i > 1 && $data[0] == '' || $data[1] == '' || $data[2] == '' || $data[3] == '' || $data[5] == '' || $data[6] == '' || $data[10] == '' || $data[12] == '' || $data[13] == '' || $data[15] == '' || $data[16] == '' || $data[17] == '' || $data[20] == '' || $data[21] == '' || $data[22] == '' || $data[93] == '' || $data[94] == '') {
                        $_SESSION['Detail'][$i] = 'กรอกข้อมูลจำเป็นไม่ครบถ้วน';
                        $_SESSION['StatusUpload'][$i] = 0;
                    }

                    $count++;
                    $i++;
                }

                ini_set('auto_detect_line_endings', FALSE);
                $_SESSION['CountUploadSchool'] = $count;
                $_SESSION['success'] = "อัปโหลดไฟล์ข้อมูลนักเรียนเรียบร้อย";
                redirect(base_url('student-uploaddetail?SchoolID=' . $_POST['SchoolID'] . '&&EducationYear=' . $_POST['EducationYear'] . '&&Semester=' . $_POST['Semester'] . '&&EducationLevelCode=' . $_POST['EducationLevelCode'] . '&&GradeLevelCode=' . $_POST['GradeLevelCode']));
            }
        }
    }
