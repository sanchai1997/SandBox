<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once '_sandboxcontroller.php';

class Student extends _sandboxcontroller
{

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('School_model', 'school');
        $this->load->model('Student_model', 'student');
    }

    public function index()
    {

        if (!file_exists(APPPATH . 'views/pages/dashboard/student/student.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        if (isset($_GET['StudentReferenceID'])) {
            $result = $this->db->query('SELECT * FROM STUDENT
                            WHERE DeleteStatus = 0 AND StudentReferenceID = "' . $_GET['StudentReferenceID'] . '"');
            foreach ($result->result() as $DETAIL) {
                $data['StudentPersonalID'] = $this->sandb_decode($DETAIL->StudentPersonalID);
                $data['StudentPassportNumber'] = $this->sandb_decode($DETAIL->StudentPassportNumber);
                $data['StudentBirthDate'] = $this->sandb_decode($DETAIL->StudentBirthDate);
                $data['FatherPersonalID'] = $this->sandb_decode($DETAIL->FatherPersonalID);
                $data['FatherPassportNumber'] = $this->sandb_decode($DETAIL->FatherPassportNumber);
                $data['MotherPersonalID'] = $this->sandb_decode($DETAIL->MotherPersonalID);
                $data['MotherPassportNumber'] = $this->sandb_decode($DETAIL->MotherPassportNumber);
                $data['GuardianPersonalID'] = $this->sandb_decode($DETAIL->GuardianPersonalID);
                $data['GuardianPassportNumber'] = $this->sandb_decode($DETAIL->GuardianPassportNumber);
            }
        }

        $data['title'] = 'student'; // Capitalize the first letter
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/student/student', $data);
        $this->load->view('templates/footer', $data);
    }

    public function student_uploaddetail()
    {

        if (!file_exists(APPPATH . 'views/pages/dashboard/student/student-uploaddetail.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }


        $data['title'] = 'student-uploaddetail'; // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/student/student-uploaddetail', $data);
        $this->load->view('templates/footer', $data);
    }
}
