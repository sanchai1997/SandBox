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
            $this->forms_student->add_student($SchoolID);
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('student?SchoolID=' . $SchoolID));
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
            $this->forms_student->add_student_select($SchoolID, $EducationYear, $Semester, $GradeLevelCode);
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('student?SchoolID=' . $SchoolID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode));
        }

        ////////////////////////////////forms-student-select-END///////////////////////////



        //Delete Data Form student
        public function delete_student($StudentReferenceID, $SchoolID, $EducationYear, $Semester, $GradeLevelCode)
        {
            $this->forms_student->delete_student($StudentReferenceID);
            $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
            redirect(base_url('student?SchoolID=' . $SchoolID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode));
        }
    }
