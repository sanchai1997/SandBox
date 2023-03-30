<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forms_transcript extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Yourownconstructorcode
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Transcript_model', 'forms_transcript');
    }

    ///////////////////////////////////forms-transcript/////////////////////////////////
    //PageForm transcript
    public function index()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/transcript/forms-transcript.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms Teacher'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/transcript/forms-transcript', $data);
        $this->load->view('templates/footer', $data);
    }

    //Add_transcript
    public function add_transcript($SchoolID, $StudentReferenceID, $EducationYear, $Semester, $GradeLevelCode, $StudentID)
    {
        $result = $this->db->query('SELECT * 
         FROM TRANSCRIPT 
         WHERE DeleteStatus = 0
         AND TranscriptSeriesNumber  = ' . $_POST['TranscriptSeriesNumber'] . '
         AND TranscriptNumber   = ' . $_POST['TranscriptNumber'] . '
         AND StudentReferenceID = "' . $StudentReferenceID . '"
         ')->result();

        if ($result != TRUE) {
            $this->forms_transcript->add_transcript($StudentReferenceID);
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('transcript?SchoolID=' . $SchoolID . '&&StudentReferenceID=' . $StudentReferenceID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&StudentID=' . $StudentID));
        } else {
            $_SESSION['danger'] = "ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบข้อมูลใบแสดงผลการศึกษาชุดที่และเลขที่อาจจะซ้ำกันในระบบ";
            redirect(base_url('forms-transcript?SchoolID=' . $SchoolID . '&&StudentReferenceID=' . $StudentReferenceID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&StudentID=' . $StudentID));
        }
    }

    //Delete Data transcript
    public function delete_transcript($SchoolID, $StudentReferenceID, $EducationYear, $Semester, $GradeLevelCode, $StudentID, $TranscriptSeriesNumber, $TranscriptNumber)
    {
        $this->forms_transcript->delete_transcript($StudentReferenceID, $TranscriptSeriesNumber, $TranscriptNumber);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('transcript?SchoolID=' . $SchoolID . '&&StudentReferenceID=' . $StudentReferenceID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&StudentID=' . $StudentID));
    }

    public function edit_transcript_main()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/transcript/edit-forms-transcript-main.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'edit-forms-transcript-main'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/transcript/edit-forms-transcript-main', $data);
        $this->load->view('templates/footer', $data);
    }

    //update_transcript_main
    public function update_transcript_main($SchoolID, $StudentReferenceID, $EducationYear, $Semester, $GradeLevelCode, $StudentID, $TranscriptSeriesNumber, $TranscriptNumber)
    {
        $this->forms_transcript->update_transcript_main($StudentReferenceID, $TranscriptSeriesNumber, $TranscriptNumber);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('transcript?SchoolID=' . $SchoolID . '&&StudentReferenceID=' . $StudentReferenceID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&StudentID=' . $StudentID . '&&TranscriptSeriesNumber=' . $TranscriptSeriesNumber . '&&TranscriptNumber=' . $TranscriptNumber));
    }


    public function edit_transcript_evaluation()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/transcript/edit-forms-transcript-evaluation.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'edit-forms-transcript-evaluation'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/transcript/edit-forms-transcript-evaluation', $data);
        $this->load->view('templates/footer', $data);
    }

    //update_transcript_evaluation
    public function update_transcript_evaluation($SchoolID, $StudentReferenceID, $EducationYear, $Semester, $GradeLevelCode, $StudentID, $TranscriptSeriesNumber, $TranscriptNumber)
    {
        $this->forms_transcript->update_transcript_evaluation($StudentReferenceID, $TranscriptSeriesNumber, $TranscriptNumber);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('transcript?SchoolID=' . $SchoolID . '&&StudentReferenceID=' . $StudentReferenceID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&StudentID=' . $StudentID . '&&TranscriptSeriesNumber=' . $TranscriptSeriesNumber . '&&TranscriptNumber=' . $TranscriptNumber));
    }


    ///////////////////////////////////forms-transcript-END/////////////////////////////////

    ////////////////////////////////forms-transcript-subject///////////////////////////////
    //PageForm transcript-subject
    public function forms_transcript_subject()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/transcript/forms-transcript-subject.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms Teacher'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/transcript/forms-transcript-subject', $data);
        $this->load->view('templates/footer', $data);
    }

    //add_transcript_evaluation
    public function add_transcript_subject($SchoolID, $StudentReferenceID, $EducationYear, $Semester, $GradeLevelCode, $StudentID, $TranscriptSeriesNumber, $TranscriptNumber)
    {
        $result = $this->db->query('SELECT * 
        FROM TRANSCRIPT_SUBJECT 
        WHERE DeleteStatus = 0
        AND TranscriptSeriesNumber = ' . $TranscriptSeriesNumber . ' 
        AND TranscriptNumber = ' . $TranscriptNumber . '
        AND SubjectEducationYear  = ' . $_POST['SubjectEducationYear'] . '
        AND SubjectSemester   = ' . $_POST['SubjectSemester'] . '
        AND SubjectCode    = "' . $_POST['SubjectCode'] . '"
        ')->result();

        if ($result != TRUE) {
            $this->forms_transcript->add_transcript_subject($TranscriptSeriesNumber, $TranscriptNumber);
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('transcript-subject?SchoolID=' . $SchoolID . '&&StudentReferenceID=' . $StudentReferenceID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&StudentID=' . $StudentID . '&&TranscriptSeriesNumber=' . $TranscriptSeriesNumber . '&&TranscriptNumber=' . $TranscriptNumber));
        } else {
            $_SESSION['danger'] = "ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบข้อมูลรายวิชาอาจจะซ้ำกันในระบบ";
            redirect(base_url('forms-transcript-subject?SchoolID=' . $SchoolID . '&&StudentReferenceID=' . $StudentReferenceID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&StudentID=' . $StudentID . '&&TranscriptSeriesNumber=' . $TranscriptSeriesNumber . '&&TranscriptNumber=' . $TranscriptNumber));
        }
    }

    //Delete Data transcript_subject
    public function delete_transcript_subject($SchoolID, $StudentReferenceID, $EducationYear, $Semester, $GradeLevelCode, $StudentID, $TranscriptSeriesNumber, $TranscriptNumber, $SubjectEducationYear, $SubjectSemester)
    {
        $this->forms_transcript->delete_transcript_subject($TranscriptSeriesNumber, $TranscriptNumber, $SubjectEducationYear, $SubjectSemester);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('transcript-subject?SchoolID=' . $SchoolID . '&&StudentReferenceID=' . $StudentReferenceID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&StudentID=' . $StudentID . '&&TranscriptSeriesNumber=' . $TranscriptSeriesNumber . '&&TranscriptNumber=' . $TranscriptNumber));
    }

    //EDITForm transcript-subject
    public function edit_forms_transcript_subject()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/transcript/edit-forms-transcript-subject.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms Teacher'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/transcript/edit-forms-transcript-subject', $data);
        $this->load->view('templates/footer', $data);
    }

    //Update Data transcript_subject
    public function update_transcript_subject($SchoolID, $StudentReferenceID, $EducationYear, $Semester, $GradeLevelCode, $StudentID, $TranscriptSeriesNumber, $TranscriptNumber, $SubjectEducationYear, $SubjectSemester)
    {
        $this->forms_transcript->update_transcript_subject($TranscriptSeriesNumber, $TranscriptNumber, $SubjectEducationYear, $SubjectSemester);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        //redirect(base_url('transcript-subject?SchoolID=' . $SchoolID . '&&StudentReferenceID=' . $StudentReferenceID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&StudentID=' . $StudentID . '&&TranscriptSeriesNumber=' . $TranscriptSeriesNumber . '&&TranscriptNumber=' . $TranscriptNumber));
    }

    ////////////////////////////////forms-transcript-subject -END///////////////////////////////

}
