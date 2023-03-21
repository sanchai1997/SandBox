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
        //PageFormSchool
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

        ////////////////////////////////forms-student-P1-END///////////////////////////

        //Add Data Form student
        public function add_student($SchoolID)
        {
            $this->forms_student->add_student($SchoolID);
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('student?SchoolID=' . $SchoolID));
        }
    }
