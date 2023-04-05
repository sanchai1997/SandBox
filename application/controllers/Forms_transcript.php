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
         AND OldSchoolID   = ' . $SchoolID . '
         AND OldSchoolLastGradeLevelCode   = ' . $GradeLevelCode . '
         AND StudentReferenceID = "' . $StudentReferenceID . '"
         ')->result();

        if ($result != TRUE) {
            $this->forms_transcript->add_transcript($SchoolID, $StudentReferenceID, $EducationYear, $Semester, $GradeLevelCode);
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('transcript?SchoolID=' . $SchoolID . '&&StudentReferenceID=' . $StudentReferenceID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&StudentID=' . $StudentID));
        } else {
            $_SESSION['danger'] = "ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบข้อมูลอาจจะซ้ำกันในระบบ";
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
        if ($_POST['FundamentalSubjectPassingCode'] == 1 && $_POST['LiteracyPassingCode'] == 1 && $_POST['AttributePassingCode'] == 1 && $_POST['ExtracurricularPassingCode'] == 1) {

            $this->forms_transcript->update_transcript_evaluation($StudentReferenceID, $TranscriptSeriesNumber, $TranscriptNumber, $EducationYear, $Semester, $GradeLevelCode);
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('transcript?SchoolID=' . $SchoolID));
        }
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
    public function add_transcript_subject($SchoolID, $StudentReferenceID, $EducationYear, $Semester, $GradeLevelCode, $StudentID, $TranscriptSeriesNumber, $TranscriptNumber, $TranscriptEducationYear, $TranscriptSemester, $OldSchoolLastGradeLevelCode)
    {
        $this->forms_transcript->add_transcript_subject($TranscriptSeriesNumber, $TranscriptNumber, $TranscriptEducationYear, $TranscriptSemester);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('transcript-subject?SchoolID=' . $SchoolID . '&&StudentReferenceID=' . $StudentReferenceID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&StudentID=' . $StudentID . '&&TranscriptSeriesNumber=' . $TranscriptSeriesNumber . '&&TranscriptNumber=' . $TranscriptNumber . '&&TranscriptEducationYear=' . $TranscriptEducationYear . '&&TranscriptSemester=' . $TranscriptSemester . '&&OldSchoolLastGradeLevelCode=' . $OldSchoolLastGradeLevelCode));
    }

    //Delete Data transcript_subject
    public function delete_transcript_subject($SchoolID, $StudentReferenceID, $EducationYear, $Semester, $GradeLevelCode, $StudentID, $TranscriptSeriesNumber, $TranscriptNumber, $TranscriptEducationYear, $TranscriptSemester, $OldSchoolLastGradeLevelCode)
    {
        $this->forms_transcript->delete_transcript_subject($TranscriptSeriesNumber, $TranscriptNumber, $TranscriptEducationYear, $TranscriptSemester);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('transcript-subject?SchoolID=' . $SchoolID . '&&StudentReferenceID=' . $StudentReferenceID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&StudentID=' . $StudentID . '&&TranscriptSeriesNumber=' . $TranscriptSeriesNumber . '&&TranscriptNumber=' . $TranscriptNumber . '&&TranscriptEducationYear=' . $TranscriptEducationYear . '&&TranscriptSemester=' . $TranscriptSemester . '&&OldSchoolLastGradeLevelCode=' . $OldSchoolLastGradeLevelCode));
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
    public function update_transcript_subject($SchoolID, $StudentReferenceID, $EducationYear, $Semester, $GradeLevelCode, $StudentID, $TranscriptSeriesNumber, $TranscriptNumber, $TranscriptEducationYear, $TranscriptSemester, $OldSchoolLastGradeLevelCode)
    {
        $this->forms_transcript->update_transcript_subject($TranscriptSeriesNumber, $TranscriptNumber, $TranscriptEducationYear, $TranscriptSemester);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('transcript-subject?SchoolID=' . $SchoolID . '&&StudentReferenceID=' . $StudentReferenceID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&StudentID=' . $StudentID . '&&TranscriptSeriesNumber=' . $TranscriptSeriesNumber . '&&TranscriptNumber=' . $TranscriptNumber . '&&TranscriptEducationYear=' . $TranscriptEducationYear . '&&TranscriptSemester=' . $TranscriptSemester . '&&OldSchoolLastGradeLevelCode=' . $OldSchoolLastGradeLevelCode));
    }

    ////////////////////////////////forms-transcript-subject -END///////////////////////////////


    ////////////////////////////////forms-transcript-activity///////////////////////////////
    //PageForm transcript-activity
    public function forms_transcript_activity()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/transcript/forms-transcript-activity.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms Teacher'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/transcript/forms-transcript-activity', $data);
        $this->load->view('templates/footer', $data);
    }

    //add_transcript_activity
    public function add_transcript_activity($SchoolID, $StudentReferenceID, $EducationYear, $Semester, $GradeLevelCode, $StudentID, $TranscriptSeriesNumber, $TranscriptNumber, $TranscriptEducationYear, $TranscriptSemester)
    {
        $result = $this->db->query('SELECT * 
        FROM TRANSCRIPT_EXTRACURRICULAR_ACTIVITY 
        WHERE DeleteStatus = 0
        AND TranscriptSeriesNumber = ' . $TranscriptSeriesNumber . ' 
        AND TranscriptNumber = ' . $TranscriptNumber . '
        AND ActivityEducationYear  = ' . $TranscriptEducationYear . '
        AND ActivitySemester   = ' . $TranscriptSemester . '
        AND ActivityName    = "' . $_POST['ActivityName'] . '"
        ')->result();

        if ($result != TRUE) {
            $this->forms_transcript->add_transcript_activity($TranscriptSeriesNumber, $TranscriptNumber, $TranscriptEducationYear, $TranscriptSemester);
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('transcript-activity?SchoolID=' . $SchoolID . '&&StudentReferenceID=' . $StudentReferenceID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&StudentID=' . $StudentID . '&&TranscriptSeriesNumber=' . $TranscriptSeriesNumber . '&&TranscriptNumber=' . $TranscriptNumber . '&&TranscriptEducationYear=' . $TranscriptEducationYear . '&&TranscriptSemester=' . $TranscriptSemester));
        } else {
            $_SESSION['danger'] = "ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบข้อมูลรายวิชาอาจจะซ้ำกันในระบบ";
            redirect(base_url('forms-transcript-activity?SchoolID=' . $SchoolID . '&&StudentReferenceID=' . $StudentReferenceID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&StudentID=' . $StudentID . '&&TranscriptSeriesNumber=' . $TranscriptSeriesNumber . '&&TranscriptNumber=' . $TranscriptNumber . '&&TranscriptEducationYear=' . $TranscriptEducationYear . '&&TranscriptSemester=' . $TranscriptSemester));
        }
    }

    //EDITForm transcript-activity
    public function edit_forms_transcript_activity()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/transcript/edit-forms-transcript-activity.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms Teacher'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/transcript/edit-forms-transcript-activity', $data);
        $this->load->view('templates/footer', $data);
    }

    //Delete Data transcript_activity
    public function update_transcript_activity($SchoolID, $StudentReferenceID, $EducationYear, $Semester, $GradeLevelCode, $StudentID, $TranscriptSeriesNumber, $TranscriptNumber, $ActivityEducationYear, $ActivitySemester)
    {
        $this->forms_transcript->update_transcript_activity($TranscriptSeriesNumber, $TranscriptNumber, $ActivityEducationYear, $ActivitySemester);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('transcript-activity?SchoolID=' . $SchoolID . '&&StudentReferenceID=' . $StudentReferenceID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&StudentID=' . $StudentID . '&&TranscriptSeriesNumber=' . $TranscriptSeriesNumber . '&&TranscriptNumber=' . $TranscriptNumber . '&&TranscriptEducationYear=' . $ActivityEducationYear . '&&TranscriptSemester=' . $ActivitySemester));
    }

    //Delete Data transcript_activity
    public function delete_transcript_activity($SchoolID, $StudentReferenceID, $EducationYear, $Semester, $GradeLevelCode, $StudentID, $TranscriptSeriesNumber, $TranscriptNumber, $ActivityEducationYear, $ActivitySemester)
    {
        $this->forms_transcript->delete_transcript_activity($TranscriptSeriesNumber, $TranscriptNumber, $ActivityEducationYear, $ActivitySemester);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('transcript-activity?SchoolID=' . $SchoolID . '&&StudentReferenceID=' . $StudentReferenceID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&StudentID=' . $StudentID . '&&TranscriptSeriesNumber=' . $TranscriptSeriesNumber . '&&TranscriptNumber=' . $TranscriptNumber . '&&TranscriptEducationYear=' . $ActivityEducationYear . '&&TranscriptSemester=' . $ActivitySemester));
    }
    ////////////////////////////////forms-transcript-activity-END///////////////////////////////

    ////////////////////////////////////forms-transcript-onet//////////////////////////////////
    //PageForm transcript-onet
    public function forms_transcript_onet()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/transcript/forms-transcript-onet.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms Teacher onet'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/transcript/forms-transcript-onet', $data);
        $this->load->view('templates/footer', $data);
    }

    //add_transcript_onet
    public function add_transcript_onet($SchoolID, $StudentReferenceID, $EducationYear, $Semester, $GradeLevelCode, $StudentID, $TranscriptSeriesNumber, $TranscriptNumber, $TranscriptEducationYear)
    {
        $result = $this->db->query('SELECT * 
        FROM TRANSCRIPT_ONET 
        WHERE DeleteStatus = 0
        AND TranscriptSeriesNumber = ' . $TranscriptSeriesNumber . ' 
        AND TranscriptNumber = ' . $TranscriptNumber . '
        AND ONETEducationYear  = ' . $TranscriptEducationYear . '
        AND ONETGradeLevelCode   = ' . $_POST['ONETGradeLevelCode'] . '
        AND ONETSubjectGroupCode    = ' . $_POST['ONETSubjectGroupCode'] . '
        ')->result();

        if ($result != TRUE) {
            $this->forms_transcript->add_transcript_onet($TranscriptSeriesNumber, $TranscriptNumber, $TranscriptEducationYear);
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('transcript-onet?SchoolID=' . $SchoolID . '&&StudentReferenceID=' . $StudentReferenceID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&StudentID=' . $StudentID . '&&TranscriptSeriesNumber=' . $TranscriptSeriesNumber . '&&TranscriptNumber=' . $TranscriptNumber . '&&TranscriptEducationYear=' . $TranscriptEducationYear));
        } else {
            $_SESSION['danger'] = "ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบข้อมูลรายวิชาอาจจะซ้ำกันในระบบ";
            redirect(base_url('forms-transcript-onet?SchoolID=' . $SchoolID . '&&StudentReferenceID=' . $StudentReferenceID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&StudentID=' . $StudentID . '&&TranscriptSeriesNumber=' . $TranscriptSeriesNumber . '&&TranscriptNumber=' . $TranscriptNumber . '&&TranscriptEducationYear=' . $TranscriptEducationYear));
        }
    }

    //EDITForm transcript-onet
    public function edit_forms_transcript_onet()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/transcript/edit-forms-transcript-onet.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms Teacher onet'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/transcript/edit-forms-transcript-onet', $data);
        $this->load->view('templates/footer', $data);
    }

    //Update Data transcript_onet
    public function update_transcript_onet($SchoolID, $StudentReferenceID, $EducationYear, $Semester, $GradeLevelCode, $StudentID, $TranscriptSeriesNumber, $TranscriptNumber, $ONETEducationYear, $ONETGradeLevelCode, $ONETSubjectGroupCode)
    {
        $this->forms_transcript->update_transcript_onet($TranscriptSeriesNumber, $TranscriptNumber, $ONETEducationYear, $ONETGradeLevelCode, $ONETSubjectGroupCode);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('transcript-onet?SchoolID=' . $SchoolID . '&&StudentReferenceID=' . $StudentReferenceID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&StudentID=' . $StudentID . '&&TranscriptSeriesNumber=' . $TranscriptSeriesNumber . '&&TranscriptNumber=' . $TranscriptNumber . '&&TranscriptEducationYear=' . $ONETEducationYear));
    }

    //Delete Data transcript_onet
    public function delete_transcript_onet($SchoolID, $StudentReferenceID, $EducationYear, $Semester, $GradeLevelCode, $StudentID, $TranscriptSeriesNumber, $TranscriptNumber, $ONETEducationYear, $ONETGradeLevelCode, $ONETSubjectGroupCode)
    {
        $this->forms_transcript->delete_transcript_onet($TranscriptSeriesNumber, $TranscriptNumber, $ONETEducationYear, $ONETGradeLevelCode, $ONETSubjectGroupCode);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('transcript-onet?SchoolID=' . $SchoolID . '&&StudentReferenceID=' . $StudentReferenceID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&StudentID=' . $StudentID . '&&TranscriptSeriesNumber=' . $TranscriptSeriesNumber . '&&TranscriptNumber=' . $TranscriptNumber . '&&TranscriptEducationYear=' . $ONETEducationYear));
    }

    ////////////////////////////////forms-transcript-onet-END/////////////////////////////////


    ////////////////////////////////////forms-transcript-nt//////////////////////////////////
    //PageForm transcript-nt
    public function forms_transcript_nt()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/transcript/forms-transcript-nt.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms Teacher nt'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/transcript/forms-transcript-nt', $data);
        $this->load->view('templates/footer', $data);
    }

    //add_transcript_nt
    public function add_transcript_nt($SchoolID, $StudentReferenceID, $EducationYear, $Semester, $GradeLevelCode, $StudentID, $TranscriptSeriesNumber, $TranscriptNumber, $TranscriptEducationYear, $TranscriptSemester)
    {
        $result = $this->db->query('SELECT * 
        FROM TRANSCRIPT_NT 
        WHERE DeleteStatus = 0
        AND TranscriptSeriesNumber = ' . $TranscriptSeriesNumber . ' 
        AND TranscriptNumber = ' . $TranscriptNumber . '
        AND NTEducationYear  = ' . $TranscriptEducationYear . '
        AND NTSemester   = ' . $TranscriptSemester . '
        AND NTGradeLevelCode    = ' . $_POST['NTGradeLevelCode'] . '
        ')->result();

        if ($result != TRUE) {
            $this->forms_transcript->add_transcript_nt($TranscriptSeriesNumber, $TranscriptNumber, $TranscriptEducationYear, $TranscriptSemester);
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('transcript-nt?SchoolID=' . $SchoolID . '&&StudentReferenceID=' . $StudentReferenceID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&StudentID=' . $StudentID . '&&TranscriptSeriesNumber=' . $TranscriptSeriesNumber . '&&TranscriptNumber=' . $TranscriptNumber . '&&TranscriptEducationYear=' . $TranscriptEducationYear . '&&TranscriptSemester=' . $TranscriptSemester));
        } else {
            $_SESSION['danger'] = "ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบข้อมูลรายวิชาอาจจะซ้ำกันในระบบ";
            redirect(base_url('forms-transcript-nt?SchoolID=' . $SchoolID . '&&StudentReferenceID=' . $StudentReferenceID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&StudentID=' . $StudentID . '&&TranscriptSeriesNumber=' . $TranscriptSeriesNumber . '&&TranscriptNumber=' . $TranscriptNumber . '&&TranscriptEducationYear=' . $TranscriptEducationYear . '&&TranscriptSemester=' . $TranscriptSemester));
        }
    }

    //EDITForm transcript-nt
    public function edit_forms_transcript_nt()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/transcript/edit-forms-transcript-nt.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms Teacher nt'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/transcript/edit-forms-transcript-nt', $data);
        $this->load->view('templates/footer', $data);
    }

    //Update Data transcript_nt
    public function update_transcript_nt($SchoolID, $StudentReferenceID, $EducationYear, $Semester, $GradeLevelCode, $StudentID, $TranscriptSeriesNumber, $TranscriptNumber, $NTEducationYear, $NTSemester, $NTGradeLevelCode)
    {
        $this->forms_transcript->update_transcript_nt($TranscriptSeriesNumber, $TranscriptNumber, $NTEducationYear, $NTSemester, $NTGradeLevelCode);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('transcript-nt?SchoolID=' . $SchoolID . '&&StudentReferenceID=' . $StudentReferenceID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&StudentID=' . $StudentID . '&&TranscriptSeriesNumber=' . $TranscriptSeriesNumber . '&&TranscriptNumber=' . $TranscriptNumber . '&&TranscriptEducationYear=' . $NTEducationYear . '&&TranscriptSemester=' . $NTSemester));
    }

    //Delete Data transcript_nt
    public function delete_transcript_nt($SchoolID, $StudentReferenceID, $EducationYear, $Semester, $GradeLevelCode, $StudentID, $TranscriptSeriesNumber, $TranscriptNumber, $NTEducationYear, $NTSemester, $NTGradeLevelCode)
    {
        $this->forms_transcript->delete_transcript_nt($TranscriptSeriesNumber, $TranscriptNumber, $NTEducationYear, $NTSemester, $NTGradeLevelCode);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('transcript-nt?SchoolID=' . $SchoolID . '&&StudentReferenceID=' . $StudentReferenceID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&StudentID=' . $StudentID . '&&TranscriptSeriesNumber=' . $TranscriptSeriesNumber . '&&TranscriptNumber=' . $TranscriptNumber . '&&TranscriptEducationYear=' . $NTEducationYear . '&&TranscriptSemester=' . $NTSemester));
    }
    ////////////////////////////////forms-transcript-nt-END/////////////////////////////////

    ////////////////////////////////////forms-transcript-rt//////////////////////////////////
    //PageForm transcript-rt
    public function forms_transcript_rt()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/transcript/forms-transcript-rt.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms Teacher rt'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/transcript/forms-transcript-rt', $data);
        $this->load->view('templates/footer', $data);
    }

    //add_transcript_rt
    public function add_transcript_rt($SchoolID, $StudentReferenceID, $EducationYear, $Semester, $GradeLevelCode, $StudentID, $TranscriptSeriesNumber, $TranscriptNumber, $TranscriptEducationYear, $TranscriptSemester)
    {
        $result = $this->db->query('SELECT * 
        FROM TRANSCRIPT_RT 
        WHERE DeleteStatus = 0
        AND TranscriptSeriesNumber = ' . $TranscriptSeriesNumber . ' 
        AND TranscriptNumber = ' . $TranscriptNumber . '
        AND RTEducationYear  = ' . $TranscriptEducationYear . '
        AND RTSemester   = ' . $TranscriptSemester . '
        AND RTEducationLevelCode    = ' . $_POST['RTEducationLevelCode'] . '
        AND RTGradeLevelCode    = ' . $_POST['RTGradeLevelCode'] . '
        ')->result();

        if ($result != TRUE) {
            $this->forms_transcript->add_transcript_rt($TranscriptSeriesNumber, $TranscriptNumber, $TranscriptEducationYear, $TranscriptSemester);
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('transcript-rt?SchoolID=' . $SchoolID . '&&StudentReferenceID=' . $StudentReferenceID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&StudentID=' . $StudentID . '&&TranscriptSeriesNumber=' . $TranscriptSeriesNumber . '&&TranscriptNumber=' . $TranscriptNumber . '&&TranscriptEducationYear=' . $TranscriptEducationYear . '&&TranscriptSemester=' . $TranscriptSemester));
        } else {
            $_SESSION['danger'] = "ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบข้อมูลรายวิชาอาจจะซ้ำกันในระบบ";
            redirect(base_url('forms-transcript-rt?SchoolID=' . $SchoolID . '&&StudentReferenceID=' . $StudentReferenceID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&StudentID=' . $StudentID . '&&TranscriptSeriesNumber=' . $TranscriptSeriesNumber . '&&TranscriptNumber=' . $TranscriptNumber . '&&TranscriptEducationYear=' . $TranscriptEducationYear . '&&TranscriptSemester=' . $TranscriptSemester));
        }
    }

    //EDITForm transcript-rt
    public function edit_forms_transcript_rt()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/transcript/edit-forms-transcript-rt.php')) {
            //Whoops,wedon'thaveapageforthat!
            show_404();
        }

        $data['title'] = 'Forms Teacher rt'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/transcript/edit-forms-transcript-rt', $data);
        $this->load->view('templates/footer', $data);
    }

    //Update Data transcript_rt
    public function update_transcript_rt($SchoolID, $StudentReferenceID, $EducationYear, $Semester, $GradeLevelCode, $StudentID, $TranscriptSeriesNumber, $TranscriptNumber, $RTEducationYear, $RTSemester, $RTEducationLevelCode, $RTGradeLevelCode)
    {
        $this->forms_transcript->update_transcript_rt($TranscriptSeriesNumber, $TranscriptNumber, $RTEducationYear, $RTSemester, $RTEducationLevelCode, $RTGradeLevelCode);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('transcript-rt?SchoolID=' . $SchoolID . '&&StudentReferenceID=' . $StudentReferenceID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&StudentID=' . $StudentID . '&&TranscriptSeriesNumber=' . $TranscriptSeriesNumber . '&&TranscriptNumber=' . $TranscriptNumber . '&&TranscriptEducationYear=' . $RTEducationYear . '&&TranscriptSemester=' . $RTSemester));
    }

    //Delete Data transcript_rt
    public function delete_transcript_rt($SchoolID, $StudentReferenceID, $EducationYear, $Semester, $GradeLevelCode, $StudentID, $TranscriptSeriesNumber, $TranscriptNumber, $RTEducationYear, $RTSemester, $RTEducationLevelCode, $RTGradeLevelCode)
    {
        $this->forms_transcript->delete_transcript_rt($TranscriptSeriesNumber, $TranscriptNumber, $RTEducationYear, $RTSemester, $RTEducationLevelCode, $RTGradeLevelCode);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('transcript-rt?SchoolID=' . $SchoolID . '&&StudentReferenceID=' . $StudentReferenceID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&StudentID=' . $StudentID . '&&TranscriptSeriesNumber=' . $TranscriptSeriesNumber . '&&TranscriptNumber=' . $TranscriptNumber . '&&TranscriptEducationYear=' . $RTEducationYear . '&&TranscriptSemester=' . $RTSemester));
    }
    ////////////////////////////////forms-transcript-rt-END/////////////////////////////////

    ///////////////////////////////////forms-transcript-competency//////////////////////////////////
    //PageForm transcript-competency
    public function forms_transcript_competency()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/transcript/forms-transcript-competency.php')) {
            //Whoops,wedon'thaveapagefocompetencyhat!
            show_404();
        }

        $data['title'] = 'Forms Teacher competency'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/transcript/forms-transcript-competency', $data);
        $this->load->view('templates/footer', $data);
    }

    //add_transcript_competency
    public function add_transcript_competency($SchoolID, $StudentReferenceID, $EducationYear, $Semester, $GradeLevelCode, $StudentID, $TranscriptSeriesNumber, $TranscriptNumber, $TranscriptEducationYear, $TranscriptSemester)
    {
        $result = $this->db->query('SELECT * 
        FROM TRANSCRIPT_COMPETENCY 
        WHERE DeleteStatus = 0
        AND TranscriptSeriesNumber = ' . $TranscriptSeriesNumber . ' 
        AND TranscriptNumber = ' . $TranscriptNumber . '
        AND CompetencyEducationYear  = ' . $TranscriptEducationYear . '
        AND CompetencySemester   = ' . $TranscriptSemester . '
        AND CompetencyCode    = ' . $_POST['CompetencyCode'] . '
        ')->result();

        if ($result != TRUE) {
            $this->forms_transcript->add_transcript_competency($TranscriptSeriesNumber, $TranscriptNumber, $TranscriptEducationYear, $TranscriptSemester);
            $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
            redirect(base_url('transcript-competency?SchoolID=' . $SchoolID . '&&StudentReferenceID=' . $StudentReferenceID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&StudentID=' . $StudentID . '&&TranscriptSeriesNumber=' . $TranscriptSeriesNumber . '&&TranscriptNumber=' . $TranscriptNumber . '&&TranscriptEducationYear=' . $TranscriptEducationYear . '&&TranscriptSemester=' . $TranscriptSemester));
        } else {
            $_SESSION['danger'] = "ไม่สามารถบันทึกข้อมูลได้ โปรดตรวจสอบข้อมูลรายวิชาอาจจะซ้ำกันในระบบ";
            redirect(base_url('forms-transcript-competency?SchoolID=' . $SchoolID . '&&StudentReferenceID=' . $StudentReferenceID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&StudentID=' . $StudentID . '&&TranscriptSeriesNumber=' . $TranscriptSeriesNumber . '&&TranscriptNumber=' . $TranscriptNumber . '&&TranscriptEducationYear=' . $TranscriptEducationYear . '&&TranscriptSemester=' . $TranscriptSemester));
        }
    }

    //Delete Data transcript_competency
    public function delete_transcript_competency($SchoolID, $StudentReferenceID, $EducationYear, $Semester, $GradeLevelCode, $StudentID, $TranscriptSeriesNumber, $TranscriptNumber, $CompetencyEducationYear, $CompetencySemester, $CompetencyCode)
    {
        $this->forms_transcript->delete_transcript_competency($TranscriptSeriesNumber, $TranscriptNumber, $CompetencyEducationYear, $CompetencySemester, $CompetencyCode);
        $_SESSION['success'] = "ลบข้อมูลเรียบร้อย";
        redirect(base_url('transcript-competency?SchoolID=' . $SchoolID . '&&StudentReferenceID=' . $StudentReferenceID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&StudentID=' . $StudentID . '&&TranscriptSeriesNumber=' . $TranscriptSeriesNumber . '&&TranscriptNumber=' . $TranscriptNumber . '&&TranscriptEducationYear=' . $CompetencyEducationYear . '&&TranscriptSemester=' . $CompetencySemester));
    }

    //EDITForm transcript-competency
    public function edit_forms_transcript_competency()
    {

        if (!file_exists(APPPATH . 'views/pages/forms/transcript/edit-forms-transcript-competency.php')) {
            //Whoops,wedon'thaveapagefocompetencyhat!
            show_404();
        }

        $data['title'] = 'Forms Teacher competency'; //Capitalizethefirstletter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/transcript/edit-forms-transcript-competency', $data);
        $this->load->view('templates/footer', $data);
    }

    //Update Data transcript_competency
    public function update_transcript_competency($SchoolID, $StudentReferenceID, $EducationYear, $Semester, $GradeLevelCode, $StudentID, $TranscriptSeriesNumber, $TranscriptNumber, $CompetencyEducationYear, $CompetencySemester, $CompetencyCode)
    {
        $this->forms_transcript->update_transcript_competency($TranscriptSeriesNumber, $TranscriptNumber, $CompetencyEducationYear, $CompetencySemester, $CompetencyCode);
        $_SESSION['success'] = "บันทึกข้อมูลเรียบร้อย";
        redirect(base_url('transcript-competency?SchoolID=' . $SchoolID . '&&StudentReferenceID=' . $StudentReferenceID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&StudentID=' . $StudentID . '&&TranscriptSeriesNumber=' . $TranscriptSeriesNumber . '&&TranscriptNumber=' . $TranscriptNumber . '&&TranscriptEducationYear=' . $CompetencyEducationYear . '&&TranscriptSemester=' . $CompetencySemester));
    }
    ////////////////////////////////forms-transcript-competency-END/////////////////////////////////

}
