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

        ///////////////////////////////////forms-student-P1/////////////////////////////////
        //PageFormSchool
        public function index()
        {

            if (!file_exists(APPPATH . 'views/pages/forms/student/forms-student-P1.php')) {
                //Whoops,wedon'thaveapageforthat!
                show_404();
            }

            $data['title'] = 'FormsStudent'; //Capitalizethefirstletter

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pages/forms/student/forms-student-P1', $data);
            $this->load->view('templates/footer', $data);
        }
        ////////////////////////////////forms-student-P1-END///////////////////////////

        ////////////////////////////////forms-student-P2/////////////////////////////////
        //PageFormStudentParents
        public function P2()
        {

            if (!file_exists(APPPATH . 'views/pages/forms/student/forms-student-P2.php')) {
                //Whoops,wedon'thaveapageforthat!
                show_404();
            }

            $data['title'] = 'FormsStudentSchool'; //Capitalizethefirstletter

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pages/forms/student/forms-student-P2', $data);
            $this->load->view('templates/footer', $data);
        }
        /////////////////////////forms-student-P2-END///////////////////////////////////

        //////////////////////////////////forms-student-P3/////////////////////////////////
        public function P3()
        {

            if (!file_exists(APPPATH . 'views/pages/forms/student/forms-student-P3.php')) {
                //Whoops,wedon'thaveapageforthat!
                show_404();
            }

            $data['title'] = 'FormsStudentSchool'; //Capitalizethefirstletter

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pages/forms/student/forms-student-P3', $data);
            $this->load->view('templates/footer', $data);
        }
        /////////////////////////forms-student-P3-END////////////////////////////////////



        ////////////////////////////////forms-student-P4///////////////////////////////////
        //PageFormStudentParents
        public function P4()
        {

            if (!file_exists(APPPATH . 'views/pages/forms/student/forms-student-P4.php')) {
                //Whoops,wedon'thaveapageforthat!
                show_404();
            }

            $data['title'] = 'FormsStudentSchool'; //Capitalizethefirstletter

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pages/forms/student/forms-student-P4', $data);
            $this->load->view('templates/footer', $data);
        }
        /////////////////////////forms-student-P4-END////////////////////////////////////

        ////////////////////////////////edit-forms-student///////////////////////////////////
        //edit-forms-student
        public function edit_student()
        {

            if (!file_exists(APPPATH . 'views/pages/forms/student/edit-forms-student.php')) {
                //Whoops,wedon'thaveapageforthat!
                show_404();
            }

            $data['title'] = 'Forms edit-forms-student'; //Capitalizethefirstletter

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pages/forms/student/edit-forms-student', $data);
            $this->load->view('templates/footer', $data);
        }
        /////////////////////////edit-forms-student-END////////////////////////////////////

        //Add Data Form student
        public function add_student()
        {
            $this->forms_student->add_student();
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('student'));
        }

        //Update Data student
        public function update_student($StudentReferenceID, $SchoolID, $EducationYear, $Semester, $EducationLevelCode, $GradeLevelCode)
        {

            $this->forms_student->update_student($StudentReferenceID, $SchoolID);
            $_SESSION['success'] = "แก้ไขข้อมูลเรียบร้อย";
            redirect(base_url('student-P2?SchoolID=' . $SchoolID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&EducationLevelCode=' . $EducationLevelCode . '&&GradeLevelCode=' . $GradeLevelCode));
        }

        //Delete Data student
        public function delete_student($StudentReferenceID, $SchoolID, $EducationYear, $Semester, $EducationLevelCode, $GradeLevelCode)
        {
            $this->forms_student->delete_student($StudentReferenceID, $SchoolID);
            $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
            redirect(base_url('student-P2?SchoolID=' . $SchoolID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&EducationLevelCode=' . $EducationLevelCode . '&&GradeLevelCode=' . $GradeLevelCode));
        }
        ///////////////////////////////////SCHOOL-END/////////////////////////////////////////
    }
