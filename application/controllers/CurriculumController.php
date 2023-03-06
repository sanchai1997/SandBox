<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CurriculumController extends CI_Controller{
    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->library('session');
        $this->load->model('Curriculum_model');
        $this->load->model('School_model');
        $this->load->model('Code_model');
    }

    public function index() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/forms-Curriculum.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = 'Forms Curriculum'; // Capitalize the first letter
        $data['listSchool'] = $this->School_model->get_school_All();
        $data['listCurriculumType'] = $this->Code_model->get_CurriculumType_All();
        $data['listEducationLevel'] = $this->Code_model->get_EducationLevel_All();
        $data['listGradeLevel'] = $this->Code_model->get_GradeLevel_All();
        $data['listSubjectGroup'] = $this->Code_model->get_SubjectGroup_All();
        $data['listSubjectType'] = $this->Code_model->get_Subject_Type_All();
        $data['listCompetency'] = $this->Code_model->get_Competency_Type_All();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/forms-curriculum', $data);
        $this->load->view('templates/footer', $data);

    }

    public function add_curriculum() {
        // add_curriculum
        $EducationYear = $this->input->post('EducationYear');
        $Semester = $this->input->post('Semester');
        $SchoolID = $this->input->post('SchoolID');
        $CurriculumID =  $EducationYear . $Semester . $SchoolID;

        $CurriculumDocumentURL = $this->do_upload('CurriculumDocument'.$CurriculumID ,"CurriculumDocumentURL");
        $LocalCurriculumDocumentURL = $this->do_upload('LocalCurriculumDocument'.$CurriculumID ,"LocalCurriculumDocumentURL");

        if($CurriculumDocumentURL != -1 && $LocalCurriculumDocumentURL !=-1 ){

            $curriculum = [
                'CurriculumID' => $CurriculumID,
                'EducationYear' => $EducationYear,
                'Semester' =>  $Semester,
                'SchoolID' => $SchoolID,
                'CurriculumName' => $this->input->post('CurriculumName'),
                'CurriculumCode' => $this->input->post('CurriculumCode'),
                'EducationLevelCode' => $this->input->post('EducationLevelCode'),
                'GradeLevelCode' => $this->input->post('GradeLevelCode'),
                'ClassroomNumber' => $this->input->post('ClassroomNumber'),
                'CurriculumDocumentURL' => $CurriculumDocumentURL,
                'LocalCurriculumFlag' => $this->input->post('LocalCurriculumFlag'),
                'LocalCurriculumName' => $this->input->post('LocalCurriculumName'),
                'LocalCurriculumDocumentURL' => $LocalCurriculumDocumentURL
            ];
            $result_curriculum =  $this->Curriculum_model->insert_curriculum($curriculum);

            if($result_curriculum == 1 ){
                $this->session->set_flashdata('success',"บันทึก CURRICULUM สำเร็จ");
            }else{
                $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการบันทึกข้อมูล");
            }
        
        }else{
            $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการบันทึกข้อมูล");
        }

        redirect(base_url('forms-curriculum'));

    }

    public function add_curriculum_subject() {
        // add_curriculum_subject
        $CURRICULUM_SUBJECT = [
            'CurriculumID' => $CurriculumID,
            'SubjectName' => $this->input->post('SubjectName'),
            'SubjectCode' => $this->input->post('SubjectCode'),
            'SubjectGroupCode' => $this->input->post('SubjectGroupCode'),
            'SubjectTypeCode' => $this->input->post('SubjectTypeCode'),
            'Credit' => $this->input->post('Credit'),
            'LearningHour' => $this->input->post('LearningHour')
        ];
        $result_CURRICULUM_SUBJECT = $this->Curriculum_model->insert_curriculum_subject($CURRICULUM_SUBJECT);

      
        if($result_CURRICULUM_SUBJECT == 1 ){
            $this->session->set_flashdata('success',"บันทึก CURRICULUM_SUBJECT สำเร็จ");
        }else{
            $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการบันทึกข้อมูล");
        }

    }

    public function add_curriculum_school_competency() {
        // add_curriculum_school_competency
        $CURRICULUM_SCHOOl_COMPETENCY = [
            'CurriculumID' => $CurriculumID,
            'CompetencyCode' => $this->input->post('CompetencyCode'),
        ];
        $result_SCHOOl_COMPETENCY = $this->Curriculum_model->insert_curriculum_school_competency($CURRICULUM_SCHOOl_COMPETENCY);

        if($result_SCHOOl_COMPETENCY == 1){
            $this->session->set_flashdata('success',"บันทึก CURRICULUM_SCHOOl_COMPETENCY สำเร็จ");
        }else{
            $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการบันทึกข้อมูล");
        }

    }




    public function do_upload($fileName , $field_name ) {
        $config['upload_path'] = FCPATH."application/documents/";  // โฟลเดอร์ ตำแหน่งเดียวกับ root ของโปรเจ็ค
        $config['allowed_types'] = 'jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|3gp'; // ปรเเภทไฟล์ 
        $config['max_size']     = '0';  // ขนาดไฟล์ (kb)  0 คือไม่จำกัด ขึ้นกับกำหนดใน php.ini ปกติไม่เกิน 2MB
        $config['file_name'] = $fileName;  // ชื่อไฟล์ ถ้าไม่กำหนดจะเป็นตามชื่อเดิม

        $this->load->library('upload');
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload($field_name)) {
            $error = array('error' => $this->upload->display_errors());
            return -1 ;
        }
        else {
            $data = array('upload_data' => $this->upload->data());
            return $this->upload->data('full_path') ;
        }

         /*     
        // เรียกใช้การตั้งค่า  
        $config['upload_path'] =  FCPATH."application/documents/" ;  // โฟลเดอร์ ตำแหน่งเดียวกับ root ของโปรเจ็ค
        //$config['allowed_types'] = 'gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp'; // ปรเเภทไฟล์ 
        $config['max_size']     = '0';  // ขนาดไฟล์ (kb)  0 คือไม่จำกัด ขึ้นกับกำหนดใน php.ini ปกติไม่เกิน 2MB
        $config['max_width'] = '6000';  // ความกว้างรูปไม่เกิน
        $config['max_height'] = '6000'; // ความสูงรูปไม่เกิน
        $config['file_name'] = 'myfile';  // ชื่อไฟล์ ถ้าไม่กำหนดจะเป็นตามชื่อเดิม
        $this->load->library('upload', $config);

        $this->upload->do_upload('CurriculumDocumentURL'); // ทำการอัพโหลดไฟล์จาก input file 
        $CurriculumDocumentURL = FCPATH."application/documents/".$this->upload->data('file_name');  // ถ้าอัพโหลดได้ เราสามารถเรียกดูข้อมูลไฟล์ที่อัพได้
*/
    }
    
}

?>