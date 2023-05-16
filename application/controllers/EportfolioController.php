<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EportfolioController extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        // Your own constructor code
        $this->load->library('session');
        $this->load->model('School_model');
        $this->load->model('Student_model');
        $this->load->model('Eportfolio_model');
    }
    public function do_upload($fileName , $field_name ) {
        $config['upload_path'] = 'assets/Eportfolio/document/';   // โฟลเดอร์ ตำแหน่งเดียวกับ root ของโปรเจ็ค
        
        $config['allowed_types'] = 'jpg|jpeg|png'; // ปรเเภทไฟล์ 
        $config['max_size']     = '0';  // ขนาดไฟล์ (kb)  0 คือไม่จำกัด ขึ้นกับกำหนดใน php.ini ปกติไม่เกิน 2MB
        $config['file_name'] = $fileName;  // ชื่อไฟล์ ถ้าไม่กำหนดจะเป็นตามชื่อเดิม

        $this->load->library('upload');
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload($field_name)) {
            $error = array('error' => $this->upload->display_errors());
            return -1 ;
        }
        else {
            $data = $this->upload->data();
            return $data['file_name'];
        }

    }

 #eportfolio   
    public function forms_eportfolio() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/Eportfolio/forms-eportfolio.php'))
        {
            show_404();
        }
        $data['StudentReferenceID'] = $_GET['StudentReferenceID']; 
        $data['SchoolID'] = $_GET['SchoolID']; 
        $data['EducationYear'] = $_GET['EducationYear']; 
        $data['Semester'] = $_GET['Semester']; 
        $data['GradeLevelCode'] = $_GET['GradeLevelCode']; 
       
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/forms/Eportfolio/forms-eportfolio',$data);
        $this->load->view('templates/footer');

    }

    public function add_eportfolio($StudentReferenceID, $SchoolID, $EducationYear, $Semester, $GradeLevelCode) {
        $eportfolio = [
            'STUDENT_NO' => $this->input->post('STUDENT_NO'),
            'STUDENT_LIKE' => $this->input->post('STUDENT_LIKE'),
            'STUDENT_DREAM' => $this->input->post('STUDENT_DREAM'),
            'STUDENT_HOPE' => $this->input->post('STUDENT_HOPE'),
            'STUDENT_TARGET' => $this->input->post('STUDENT_TARGET'),
            'STUDENT_LEARNING' => $this->input->post('STUDENT_LEARNING'), 
            'STUDENT_USEFULNESS' => $this->input->post('STUDENT_USEFULNESS'),
            'STUDENT_PRIDE' => $this->input->post('STUDENT_PRIDE'),
            'STUDENT_SUMMARY' => $this->input->post('STUDENT_SUMMARY'),
        ];
        $result_eportfolio = $this->Eportfolio_model->insert_eportfolio($eportfolio);
       

        if($result_eportfolio != -1 ){    
            $STUDENT_PROJECT_DOCUMENT = $this->do_upload('STUDENT_PROJECT_DOCUMENT',"STUDENT_PROJECT_DOCUMENT");
            $STUDENT_PROJECT = [
                'EPORTFOLIO_ID' => $result_eportfolio,
                'STUDENT_PROJECT_DOCUMENT' => $STUDENT_PROJECT_DOCUMENT,
                'STUDENT_PROJECT_DESCRIPTION' => $this->input->post('STUDENT_PROJECT_DESCRIPTION'),
            ];
            $result_STUDENT_PROJECT = $this->Eportfolio_model->insert_STUDENT_PROJECT($STUDENT_PROJECT) ;

            $STUDENT_GOODNESS_DOCUMENT = $this->do_upload('STUDENT_GOODNESS_DOCUMENT',"STUDENT_GOODNESS_DOCUMENT");
            $STUDENT_GOODNESS = [
                'EPORTFOLIO_ID' => $result_eportfolio,
                'STUDENT_GOODNESS_DOCUMENT' => $STUDENT_GOODNESS_DOCUMENT,
                'STUDENT_GOODNESS_DESCRIPTION' => $this->input->post('STUDENT_GOODNESS_DESCRIPTION'),
            ];
            $result_STUDENT_GOODNESS = $this->Eportfolio_model->insert_STUDENT_GOODNESS($STUDENT_GOODNESS) ;
            

            $this->session->set_flashdata('success',"บันทึกข้อมูลสำเร็จ");
            redirect(base_url('student?StudentReferenceID=' . $StudentReferenceID . '&&SchoolID=' . $SchoolID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&ShowDetail='));
        }else{
            redirect(base_url('forms_eportfolio?StudentReferenceID=' . $StudentReferenceID . '&&SchoolID=' . $SchoolID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode));
        }

    }
    public function show_eportfolio() {
            
        if ( ! file_exists(APPPATH.'views/pages/dashboard/Eportfolio/eportfolio.php'))
        {
            show_404();
        }
        $data['StudentReferenceID'] = $_GET['StudentReferenceID'];     
        $data["EPORTFOLIO"] = $this->Eportfolio_model->get_EPORTFOLIO_by_STUDENT_NO($data['StudentReferenceID']);
  
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/dashboard/Eportfolio/eportfolio',$data);
        $this->load->view('templates/footer');

    }

    public function eportfolio_download()
    {

        if (!file_exists(APPPATH . 'views/pages/dashboard/Eportfolio/eportfolio-download.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['StudentReferenceID'] = $_GET['StudentReferenceID'];     
        $data["EPORTFOLIO"] = $this->Eportfolio_model->get_EPORTFOLIO_by_STUDENT_NO($data['StudentReferenceID']);

        $data['title'] = 'eportfolio-download'; // Capitalize the first letter
        $this->load->view('pages/dashboard/Eportfolio/eportfolio-download', $data);
    }

    public function edit_forms_eportfolio() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/Eportfolio/edit_forms-eportfolio.php'))
        {
            show_404();
        }

        $data['StudentReferenceID'] = $_GET['StudentReferenceID']; 
        $data['SchoolID'] = $_GET['SchoolID']; 
        $data['EducationYear'] = $_GET['EducationYear']; 
        $data['Semester'] = $_GET['Semester']; 
        $data['GradeLevelCode'] = $_GET['GradeLevelCode']; 

        $data["EPORTFOLIO"] = $this->Eportfolio_model->get_EPORTFOLIO_by_STUDENT_NO($data['StudentReferenceID']);
               
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/forms/Eportfolio/edit_forms-eportfolio',$data);
        $this->load->view('templates/footer');




    }
    public function edit_eportfolio($StudentReferenceID, $SchoolID, $EducationYear, $Semester, $GradeLevelCode,$EPORTFOLIO_ID) {
             
        $eportfolio = [
            'STUDENT_NO' => $this->input->post('STUDENT_NO'),
            'STUDENT_LIKE' => $this->input->post('STUDENT_LIKE'),
            'STUDENT_DREAM' => $this->input->post('STUDENT_DREAM'),
            'STUDENT_HOPE' => $this->input->post('STUDENT_HOPE'),
            'STUDENT_TARGET' => $this->input->post('STUDENT_TARGET'),
            'STUDENT_LEARNING' => $this->input->post('STUDENT_LEARNING'), 
            'STUDENT_USEFULNESS' => $this->input->post('STUDENT_USEFULNESS'),
            'STUDENT_PRIDE' => $this->input->post('STUDENT_PRIDE'),
            'STUDENT_SUMMARY' => $this->input->post('STUDENT_SUMMARY'),
        ];
        $result_eportfolio = $this->Eportfolio_model->update_EPORTFOLIO($EPORTFOLIO_ID ,$eportfolio);

        if($result_eportfolio == 1 ){    
            $this->session->set_flashdata('success',"แก้ไขข้อมูลสำเร็จ");
            redirect(base_url('student?StudentReferenceID=' . $StudentReferenceID . '&&SchoolID=' . $SchoolID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode . '&&ShowDetail='));
        }else{
            redirect(base_url('edit_forms_eportfolio?StudentReferenceID=' . $StudentReferenceID . '&&SchoolID=' . $SchoolID . '&&EducationYear=' . $EducationYear . '&&Semester=' . $Semester . '&&GradeLevelCode=' . $GradeLevelCode));
        }

    }
    public function delete_eportfolio($EPORTFOLIO_ID){


        $result =$this->Eportfolio_model->delete_eportfolio($EPORTFOLIO_ID);

        if($result == 1 ){
            $this->session->set_flashdata('success',"ลบข้อมูลสำเร็จ");
            redirect(base_url('list-curriculum_activity?pid='. $PLAN_ID.'&&sid='. $SubjectCode.'&&cid='. $CurriculumID ));
        }else{
            $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการลบข้อมูล");
            redirect(base_url('list-curriculum_activity?pid='. $PLAN_ID.'&&sid='. $SubjectCode.'&&cid='. $CurriculumID ));
        }
    }
}

?>