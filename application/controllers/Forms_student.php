    <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Forms_student extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            //Yourownconstructorcode
            $this->load->library('form_validation');
            $this->load->library('session');
            $this->load->model('Student_model', 'forms_student');
            $this->load->model('Eportfolio_model');
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
            if ($result != TRUE) {
                $this->forms_student->add_student($SchoolID);
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
            if ($result != TRUE) {
                $this->forms_student->add_student_select($SchoolID, $EducationYear, $Semester, $GradeLevelCode);
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

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pages/forms/student/edit-forms-student-person', $data);
            $this->load->view('templates/footer', $data);
        }

        //update Data student person
        public function update_student_person($StudentReferenceID, $SchoolID, $EducationYear, $Semester, $GradeLevelCode)
        {
            $this->forms_student->update_student_person($StudentReferenceID, $SchoolID);
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

            $data['title'] = 'Forms edit Student parents'; //Capitalizethefirstletter

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pages/forms/student/edit-forms-student-parents', $data);
            $this->load->view('templates/footer', $data);
        }

        //update Data student parents
        public function update_student_parents($StudentReferenceID, $SchoolID, $EducationYear, $Semester, $GradeLevelCode)
        {
            $this->forms_student->update_student_parents($StudentReferenceID, $SchoolID);
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

            $data['title'] = 'Forms edit Student family'; //Capitalizethefirstletter

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pages/forms/student/edit-forms-student-family', $data);
            $this->load->view('templates/footer', $data);
        }

        //update Data student family
        public function update_student_family($StudentReferenceID, $SchoolID, $EducationYear, $Semester, $GradeLevelCode)
        {
            $this->forms_student->update_student_family($StudentReferenceID, $SchoolID);
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
                $handle = fopen($_FILES['FileStudentUpload']['tmp_name'], 'r');
                ini_set('auto_detect_line_endings', TRUE);
                while (($data = fgetcsv($handle)) !== FALSE) {

                    $result = $this->db->query('SELECT * 
                    FROM STUDENT 
                    WHERE StudentReferenceID = "' . $data[3] . $data[2] . '" 
                    ')->result();
                    if ($i > 1) {
                        if ($result == TRUE) {
                            $_SESSION['danger'] = "ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบข้อมูลสถานศึกษาอาจจะซ้ำในระบบ";
                            redirect(base_url('school'));
                        } else {


                            $database = [

                                'StudentReferenceID' =>  $data[3] . $data[2],
                                'EducationYear' => $_POST['EducationYear'],
                                'Semester' => $_POST['Semester'],
                                'SchoolID' => $_POST['SchoolID'],
                                'StudentID' => $data[0],
                                'StudentStatusCode' => $data[1],
                                'StudentPersonalID' => $data[2],
                                'StudentPersonalIDTypeCode' => $data[3],
                                'StudentPassportNumber' => $data[4],
                                'StudentPrefixCode' => $data[5],
                                'StudentNameThai' => $data[6],
                                'StudentNameEnglish' => $data[7],
                                'StudentMiddleNameThai' => $data[8],
                                'StudentMiddleEnglish' => $data[9],
                                'StudentLastNameThai' => $data[10],
                                'StudentLastNameEnglish' => $data[11],
                                'StudentGenderCode' => $data[12],
                                'StudentBirthDate' => $data[13],
                                'StudentBirthProvinceCode' => $data[14],
                                'StudentNationalityCode' => $data[15],
                                'StudentRaceCode' => $data[16],
                                'StudentReligionCode' => $data[17],
                                'StudentLanguageCode' => $data[18],
                                'StudentOtherLanguageCode' => $data[19],
                                'StudentBloodCode' => $data[20],
                                'StudentWeight' => $data[21],
                                'StudentHeight' => $data[22],
                                'StudentOfficialAddressHouseRegisterID' => $data[23],
                                'StudentOfficialAddressHouseNumber' => $data[24],
                                'StudentOfficialAddressMoo' => $data[25],
                                'StudentOfficialAddressStreet' => $data[26],
                                'StudentOfficialAddressSoi' => $data[27],
                                'StudentOfficialAddressTrok' => $data[28],
                                'StudentOfficialAddressProvinceCode' => $data[29],
                                'StudentOfficialAddressDistrictCode' => $data[30],
                                'StudentOfficialAddressSubdistrictCode' => $data[31],
                                'StudentOfficialAddressPostcode' => $data[32],
                                'StudentOfficialAddressPhoneNumber ' => $data[33],
                                'StudentCurrentAddressHouseRegisterID' => $data[34],
                                'StudentCurrentAddressHouseNumber' => $data[35],
                                'StudentCurrentAddressMoo' => $data[36],
                                'StudentCurrentAddressStreet' => $data[37],
                                'StudentCurrentAddressSoi' => $data[38],
                                'StudentCurrentAddressTrok' => $data[39],
                                'StudentCurrentAddressSubdistrictCode' => $data[40],
                                'StudentCurrentAddressDistrictCode' => $data[41],
                                'StudentCurrentAddressProvinceCode' => $data[42],
                                'StudentCurrentAddressPostcode' => $data[43],
                                'StudentCurrentAddressPhoneNumber' => $data[44],
                                'FatherPersonalID' => $data[45],
                                'FatherPersonalIDTypeCode' => $data[46],
                                'FatherPassportNumber' => $data[47],
                                'FatherPrefixCode' => $data[48],
                                'FatherNameThai' => $data[49],
                                'FatherNameEnglish' => $data[50],
                                'FatherMiddleNameEnglish' => $data[51],
                                'FatherMiddleNameThai' => $data[52],
                                'FatherLastNameThai' => $data[53],
                                'FatherLastNameEnglish' => $data[54],
                                'FatherPersonStatusCode' => $data[55],
                                'FatherPhoneNumber' => $data[56],
                                'FatherOccupationCode' => $data[57],
                                'FatherSalary' => $data[58],
                                'MotherPersonalID' => $data[59],
                                'MotherPersonalIDTypeCode' => $data[60],
                                'MotherPassportNumber' => $data[61],
                                'MotherPrefixCode' => $data[62],
                                'MotherNameThai' => $data[63],
                                'MotherNameEnglish' => $data[64],
                                'MotherMiddleNameThai' => $data[65],
                                'MotherMiddleNameEnglish' => $data[66],
                                'MotherLastNameThai' => $data[67],
                                'MotherLastNameEnglish' => $data[68],
                                'MotherPersonStatusCode' => $data[69],
                                'MotherPhoneNumber' => $data[70],
                                'MotherOccupationCode' => $data[71],
                                'MotherSalary' => $data[72],
                                'GuardianPersonalID' => $data[73],
                                'GuardianPersonalIDTypeCode' => $data[74],
                                'GuardianPassportNumber' => $data[75],
                                'GuardianPrefixCode' => $data[76],
                                'GuardianNameThai' => $data[77],
                                'GuardianNameEnglish' => $data[78],
                                'GuardianMiddleNameThai' => $data[79],
                                'GuardianMiddleNameEnglish' => $data[80],
                                'GuardianLastNameThai' => $data[81],
                                'GuardianLastNameEnglish' => $data[82],
                                'GuardianRelationCode' => $data[83],
                                'GuardianPhoneNumber' => $data[84],
                                'GuardianOccupationCode' => $data[85],
                                'GuardianSalary' => $data[86],
                                'ParentMarriageStatusCode' => $data[87],
                                'StudentBirthOrder' => $data[88],
                                'StudentElderBrotherAmount' => $data[89],
                                'StudentElderSisterAmount' => $data[90],
                                'StudentYoungerBrotherAmount' => $data[91],
                                'StudentYoungerSisterAmount' => $data[92],
                                'CurrentEducationLevelAdmissionYear' => $data[93],
                                'SchoolAdmissionYear' => $data[94],
                                'EducationLevelCode' =>  $data[95],
                                'GradeLevelCode' =>  $data[96],
                                'Classroom' => $data[97],
                                'PartSchoolFlag' => $data[98],
                                'CurriculumID' => $data[99],
                                'JourneyTypeCode' => $data[100],
                                'JourneyTime' => $data[101],
                                'RockJourneyDistance' => $data[102],
                                'RubberJourneyDistance' => $data[103],
                                'WaterJourneyDistance' => $data[104],
                                'DisabilityCode' => $data[105],
                                'DisabilityDetail' => $data[106],
                                'DisabilityLevelCode' => $data[107],
                                'DisadvantagedCode' => $data[108],
                                'LackingBookFlag' => $data[109],
                                'LackingFoodFlag' => $data[110],
                                'LackingStationeryFlag' => $data[111],
                                'LackingUniformFlag' => $data[112],
                                'FamilyMonthlyIncome' => $data[113],
                                'FamilyStatusCode' => $data[114],
                                'StudentLiveWithCode' => $data[115],
                                'StateWelfareFlag' => $data[116],
                                'TalentCode' => $data[117]

                            ];

                            $result = $this->db->insert('STUDENT', $database);
                        }
                    }
                    $i++;
                }
                ini_set('auto_detect_line_endings', FALSE);
                $_SESSION['success'] = "อัปโหลดไฟล์ข้อมูลนักเรียนเรียบร้อย";
                redirect(base_url('school'));
            }
        }
    }
