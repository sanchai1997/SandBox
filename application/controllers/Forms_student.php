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
    }
