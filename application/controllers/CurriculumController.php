<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CurriculumController extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        // Your own constructor code
        $this->load->library('session');
        $this->load->model('Curriculum_model');
        $this->load->model('School_model');
        $this->load->model('Code_model');
        $this->load->model('Student_model');
    }
    public function do_upload($fileName , $field_name ) {
        $config['upload_path'] = 'assets/curriculum/document/';   // โฟลเดอร์ ตำแหน่งเดียวกับ root ของโปรเจ็ค
        
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
            $data = $this->upload->data();
            return $data['file_name'];
        }

    }
#### curriculum
    public function forms_curriculum() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/Curriculum/forms-curriculum.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $data['SchoolID'] = $_GET['sid']; 
        $data['title'] = 'Curriculum'; // Capitalize the first letter
        $data['listSchool'] = $this->School_model->get_school_All();
        $data['listCurriculumType'] = $this->Code_model->get_CurriculumType_All();
        $data['listEducationLevel'] = $this->Code_model->get_EducationLevel_All();
        $data['listGradeLevel'] = $this->Code_model->get_GradeLevel_All();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/Curriculum/forms-curriculum', $data);
        $this->load->view('templates/footer', $data);

    }

    
    public function list_curriculum_by_school() {
        
        if ( ! file_exists(APPPATH.'views/pages/dashboard/Curriculum/list-curriculum.php'))
        {
            show_404();
        }

        $data['SchoolID'] = $_GET['sid']; 
        $school = $this->School_model->get_school($data['SchoolID']);  
        $data['SchoolNameThai'] = $school[0]->SchoolNameThai ; 

        $data['listCurriculum'] = $this->Curriculum_model->get_Curriculum_by_school($data['SchoolID']);  
        $data['School'] = $this->School_model->get_school_All();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/Curriculum/list-curriculum', $data);
        $this->load->view('templates/footer', $data);

    }
    public function list_curriculum() {
        
        if ( ! file_exists(APPPATH.'views/pages/dashboard/Curriculum/list-curriculum.php'))
        {
            show_404();
        }

        $data['School'] = $this->School_model->get_school_All();

        if($data['School']==null){
            $data['listCurriculum'] = null;  
        }else{
            $data['School_id'] = $this->School_model->get_school_top();
            $data['SchoolID'] = $data['School_id'][0]-> SchoolID;
            $data['SchoolNameThai'] = $data['School_id'][0]-> SchoolNameThai;
            $data['listCurriculum'] = $this->Curriculum_model->get_Curriculum_by_school($data['SchoolID']);  
          
        }
        

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/Curriculum/list-curriculum', $data);
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

        if($CurriculumDocumentURL == -1) {$CurriculumDocumentURL=null;}
        if($LocalCurriculumDocumentURL == -1) {$LocalCurriculumDocumentURL=null;}

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
            'LocalCurriculumDocumentURL' => $LocalCurriculumDocumentURL,
            'DeleteStatus' => 0 
        ];
        $result_curriculum =  $this->Curriculum_model->insert_curriculum($curriculum);

        if($result_curriculum == 1 ){
            $this->session->set_flashdata('success',"บันทึกข้อมูลสำเร็จ");
            redirect(base_url('list_curriculum_by_school?sid='.$SchoolID));
        }else{
            $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการบันทึกข้อมูล");
            redirect(base_url('forms-curriculum?sid='.$SchoolID));
        }   

    }

    public function forms_edit_curriculum() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/Curriculum/edit_forms-curriculum.php'))
        {
            show_404();
        }

        $data['title'] = 'Curriculum'; // Capitalize the first letter
        $data['SchoolID'] = $_GET['sid']; 
        $data['listSchool'] = $this->School_model->get_school_All();
        $data['listCurriculumType'] = $this->Code_model->get_CurriculumType_All();
        $data['listEducationLevel'] = $this->Code_model->get_EducationLevel_All();
        $data['listGradeLevel'] = $this->Code_model->get_GradeLevel_All();

        $data['CurriculumID'] = $_GET['cid']; 
        $data['Curriculum'] = $this->Curriculum_model->get_Curriculum($data['CurriculumID'] );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/Curriculum/edit_forms-curriculum', $data);
        $this->load->view('templates/footer', $data);

    }

    public function edit_curriculum() {
        $Old_CurriculumID = $this->input->post('Old_CurriculumID');

        $EducationYear = $this->input->post('EducationYear');
        $Semester = $this->input->post('Semester');
        $SchoolID = $this->input->post('SchoolID');
        $CurriculumID =  $EducationYear . $Semester . $SchoolID;

        $CurriculumDocumentURL = $this->do_upload('CurriculumDocument'.$CurriculumID ,"CurriculumDocumentURL");
        $LocalCurriculumDocumentURL = $this->do_upload('LocalCurriculumDocument'.$CurriculumID ,"LocalCurriculumDocumentURL");

        $curriculum = [];

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
                'LocalCurriculumDocumentURL' => $LocalCurriculumDocumentURL,
                'DeleteStatus' => 0 
            ];
        }else if($CurriculumDocumentURL != -1  ){
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
                'DeleteStatus' => 0 
            ];
        }else if($LocalCurriculumDocumentURL !=-1 ){
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
                'LocalCurriculumFlag' => $this->input->post('LocalCurriculumFlag'),
                'LocalCurriculumName' => $this->input->post('LocalCurriculumName'),
                'LocalCurriculumDocumentURL' => $LocalCurriculumDocumentURL,
                'DeleteStatus' => 0 
            ];
        }else{
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
                'LocalCurriculumFlag' => $this->input->post('LocalCurriculumFlag'),
                'LocalCurriculumName' => $this->input->post('LocalCurriculumName'),
                'DeleteStatus' => 0 
            ];
        }
        $result =  $this->Curriculum_model->update_curriculum($Old_CurriculumID, $curriculum);

        if($result == 1 ){
            $this->session->set_flashdata('success',"แก้ไขข้อมูลสำเร็จ");
            redirect(base_url('list_curriculum_by_school?sid='.$SchoolID));
        }else{
            $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการแก้ไขข้อมูล");
            redirect(base_url('edit_forms-curriculum?cid='. $Old_CurriculumID));
        }

    }
    public function delete_curriculum($CurriculumID,$SchoolID ){


        $result =$this->Curriculum_model->delete_curriculum($CurriculumID);
        if($result == 1 ){
            $this->session->set_flashdata('success',"ลบข้อมูลสำเร็จ");
            redirect(base_url('list_curriculum_by_school?sid='.$SchoolID));
        }else{
            $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการลบข้อมูล");
            redirect(base_url('list_curriculum_by_school?sid='.$SchoolID));
        }
        
    }

    
#### curriculum_subject
    public function list_curriculum_subject() {
        
        if ( ! file_exists(APPPATH.'views/pages/dashboard/Curriculum/list-curriculum_subject.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        
        $data['title'] = 'Curriculum Subject'; // Capitalize the first letter
        $data['CurriculumID'] = $_GET['cid']; 
        $data['listCurriculumSubject'] = $this->Curriculum_model->get_CurriculumSubject_All($data['CurriculumID']);
        $data['Curriculum'] = $this->Curriculum_model->get_Curriculum($data['CurriculumID']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/Curriculum/list-curriculum_subject', $data);
        $this->load->view('templates/footer', $data);

    }

    public function forms_curriculum_subject() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/Curriculum/forms-curriculum_subject.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = 'Curriculum Subject'; // Capitalize the first letter
        $data['listSubjectGroup'] = $this->Code_model->get_SubjectGroup_All();
        $data['listSubjectType'] = $this->Code_model->get_Subject_Type_All();
        $data['CurriculumID'] = $_GET['cid']; 
        $data['Curriculum'] = $this->Curriculum_model->get_Curriculum($data['CurriculumID']);
        $data['listCriteria'] = $this->Curriculum_model->get_ASSESSMENT_CRITERIA_All();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/Curriculum/forms-curriculum_subject', $data);
        $this->load->view('templates/footer', $data);

    }

    public function add_curriculum_subject() {
        // add_curriculum_subject
        $CurriculumID = $this->input->post('CurriculumID');
        $CURRICULUM_SUBJECT = [
            'CurriculumID' => $CurriculumID,
            'SubjectName' => $this->input->post('SubjectName'),
            'SubjectCode' => $this->input->post('SubjectCode'),
            'SubjectGroupCode' => $this->input->post('SubjectGroupCode'),
            'SubjectTypeCode' => $this->input->post('SubjectTypeCode'),
            'Credit' => $this->input->post('Credit'),
            'LearningHour' => $this->input->post('LearningHour'),
            'SUBJECT_STD_ID' => $this->input->post('SUBJECT_STD_ID'),
            'SUBJECT_STD_DETAILS' => $this->input->post('SUBJECT_STD_DETAILS'),
            'SUBJECT_KPI_ID' => $this->input->post('SUBJECT_KPI_ID'),
            'DeleteStatus' => 0 
        ];
        $result_CURRICULUM_SUBJECT = $this->Curriculum_model->insert_curriculum_subject($CURRICULUM_SUBJECT);

      
        if($result_CURRICULUM_SUBJECT == 1 ){
            $this->session->set_flashdata('success',"บันทึกข้อมูลสำเร็จ");
            redirect(base_url('list-curriculum_subject?cid='. $CurriculumID));
        }else{
            $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการบันทึกข้อมูล");
            redirect(base_url('forms-curriculum_subject?cid='. $CurriculumID ));
        }

    }

    public function forms_edit_curriculum_subject() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/Curriculum/edit_forms-curriculum_subject.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = 'Curriculum Subject'; // Capitalize the first letter
        $data['listSubjectGroup'] = $this->Code_model->get_SubjectGroup_All();
        $data['listSubjectType'] = $this->Code_model->get_Subject_Type_All();
        $data['CurriculumID'] = $_GET['cid']; 
        $data['SubjectCode'] = $_GET['sid']; 
        $data['CurriculumSubject'] = $this->Curriculum_model->get_CurriculumSubject($data['CurriculumID'],$data['SubjectCode']);
        $data['Curriculum'] = $this->Curriculum_model->get_Curriculum($data['CurriculumID']);
        $data['listCriteria'] = $this->Curriculum_model->get_ASSESSMENT_CRITERIA_All();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/Curriculum/edit_forms-curriculum_subject', $data);
        $this->load->view('templates/footer', $data);

    }

    public function edit_curriculum_subject() {
        $CurriculumID = $this->input->post('CurriculumID');
        $Old_SubjectCode = $this->input->post('Old_SubjectCode');

        $CURRICULUM_SUBJECT = [
            'SubjectName' => $this->input->post('SubjectName'),
            'SubjectCode' => $this->input->post('SubjectCode'),
            'SubjectGroupCode' => $this->input->post('SubjectGroupCode'),
            'SubjectTypeCode' => $this->input->post('SubjectTypeCode'),
            'Credit' => $this->input->post('Credit'),
            'LearningHour' => $this->input->post('LearningHour'),
            'DeleteStatus' => 0 
        ];
        $result_CURRICULUM_SUBJECT = $this->Curriculum_model->update_curriculum_subject($CurriculumID, $Old_SubjectCode, $CURRICULUM_SUBJECT);

      
        if($result_CURRICULUM_SUBJECT == 1 ){
            $this->session->set_flashdata('success',"แก้ไขข้อมูลสำเร็จ");
            redirect(base_url('list-curriculum_subject?cid='. $CurriculumID));
        }else{
            $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการแก้ไขข้อมูล");
            redirect(base_url('edit_forms-curriculum_subject?cid='. $CurriculumID.'&&sid='. $Old_SubjectCode ));
        }
    }

    public function delete_curriculum_subject($CurriculumID, $SubjectCode ){

        $result =$this->Curriculum_model->delete_curriculum_subject($CurriculumID, $SubjectCode);
        if($result == 1 ){
            $this->session->set_flashdata('success',"ลบข้อมูลสำเร็จ");
            redirect(base_url('list-curriculum_subject?cid='. $CurriculumID));
        }else{
            $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการลบข้อมูล");
            redirect(base_url('list-curriculum_subject?cid='. $CurriculumID));
        }
        
    }



### curriculum_school_competency
    public function list_curriculum_school_competency() {
            
        if ( ! file_exists(APPPATH.'views/pages/dashboard/Curriculum/list-curriculum_school_competency.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
        
        $data['title'] = 'Curriculum School Competency'; // Capitalize the first letter
        $data['CurriculumID'] = $_GET['cid']; 
        $data['SubjectCode'] = $_GET['sid']; 
        $data['listCurriculumCompetency'] = $this->Curriculum_model->get_CurriculumCompetency_All($data['CurriculumID'], $data['SubjectCode']);
        $data['Curriculum'] = $this->Curriculum_model->get_Curriculum($data['CurriculumID']);
        $data['Subject'] = $this->Curriculum_model->get_CurriculumSubject($data['CurriculumID'], $data['SubjectCode']);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/Curriculum/list-curriculum_school_competency', $data);
        $this->load->view('templates/footer', $data);

    }

    public function forms_curriculum_school_competency() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/Curriculum/forms-curriculum_school_competency.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = 'Curriculum School Competency'; // Capitalize the first letter
        $data['listCompetency'] = $this->Code_model->get_Competency_Type_All();
        $data['CurriculumID'] = $_GET['cid']; 
        $data['SubjectCode'] = $_GET['sid']; 
        $data['Curriculum'] = $this->Curriculum_model->get_Curriculum($data['CurriculumID']);
        $data['Subject'] = $this->Curriculum_model->get_CurriculumSubject($data['CurriculumID'], $data['SubjectCode']);


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/Curriculum/forms-curriculum_school_competency', $data);
        $this->load->view('templates/footer', $data);

    }

    public function add_curriculum_school_competency() {
        // add_curriculum_school_competency
        $CurriculumID = $this->input->post('CurriculumID');
        $SubjectCode = $this->input->post('SubjectCode');
        $CURRICULUM_SCHOOl_COMPETENCY = [
            'CurriculumID' => $CurriculumID,
            'SubjectCode' => $SubjectCode,
            'CompetencyCode' => $this->input->post('CompetencyCode'),
            'DeleteStatus' => 0 
        ];
        $result_SCHOOl_COMPETENCY = $this->Curriculum_model->insert_curriculum_school_competency($CURRICULUM_SCHOOl_COMPETENCY);

        if($result_SCHOOl_COMPETENCY == 1){
            $this->session->set_flashdata('success',"บันทึกข้อมูลสำเร็จ");
            redirect(base_url('list-curriculum_school_competency?cid='. $CurriculumID.'&&sid='.$SubjectCode));
        }else{
            $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการบันทึกข้อมูล");
            redirect(base_url('forms-curriculum_school_competency?cid='. $CurriculumID.'&&sid='.$SubjectCode));
           
        }

    }
    public function forms_edit_curriculum_school_competency() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/Curriculum/edit_forms-curriculum_school_competency.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = 'Curriculum School Competency'; // Capitalize the first letter
        $data['listCompetency'] = $this->Code_model->get_Competency_Type_All();
        $data['CurriculumID'] = $_GET['cid']; 
        $data['SubjectCode'] = $_GET['sid']; 
        $data['CompetencyCode'] = $_GET['cpid']; 

        $data['CurriculumCompetency'] = $this->Curriculum_model->get_CurriculumCompetency($data['CurriculumID'], $data['SubjectCode'], $data['CompetencyCode'] );
        $data['Curriculum'] = $this->Curriculum_model->get_Curriculum($data['CurriculumID']);
        $data['Subject'] = $this->Curriculum_model->get_CurriculumSubject($data['CurriculumID'], $data['SubjectCode']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/Curriculum/edit_forms-curriculum_school_competency', $data);
        $this->load->view('templates/footer', $data);

    }

    public function edit_curriculum_school_competency() {
        $CurriculumID = $this->input->post('CurriculumID');
        $SubjectCode = $this->input->post('SubjectCode');
        $Old_CompetencyCode = $this->input->post('Old_CompetencyCode');
        
        $CURRICULUM_SCHOOl_COMPETENCY = [
            'CurriculumID' => $CurriculumID,
            'SubjectCode' => $SubjectCode,
            'CompetencyCode' => $this->input->post('CompetencyCode'),
            'DeleteStatus' => 0 
        ];

        $result_SCHOOl_COMPETENCY = $this->Curriculum_model->update_curriculum_school_competency($CurriculumID, $SubjectCode, $Old_CompetencyCode, $CURRICULUM_SCHOOl_COMPETENCY);

      
        if($result_SCHOOl_COMPETENCY == 1 ){
            $this->session->set_flashdata('success',"แก้ไขข้อมูลสำเร็จ");
            redirect(base_url('list-curriculum_school_competency?cid='. $CurriculumID.'&&sid='.$SubjectCode));
        }else{
            $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการแก้ไขข้อมูล");
            redirect(base_url('edit_forms-curriculum_school_competency?cid='. $CurriculumID.'&&sid='.$SubjectCode.'&&cpid='.$Old_CompetencyCode));
        }
    }

    
    public function delete_curriculum_school_competency($CurriculumID, $SubjectCode, $CompetencyCode ){

        $result =$this->Curriculum_model->delete_curriculum_school_competency($CurriculumID, $SubjectCode, $CompetencyCode);
        if($result == 1 ){
            $this->session->set_flashdata('success',"ลบข้อมูลสำเร็จ");
            redirect(base_url('list-curriculum_school_competency?cid='. $CurriculumID.'&&sid='.$SubjectCode));
        }else{
            $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการลบข้อมูล");
            redirect(base_url('list-curriculum_school_competency?cid='. $CurriculumID.'&&sid='.$SubjectCode));
        }
        
    }
    ##curriculum_plan
    public function list_curriculum_plan() {
            
        if ( ! file_exists(APPPATH.'views/pages/dashboard/Curriculum/list-curriculum_plan.php'))
        {
            show_404();
        }

        $data['CurriculumID'] = $_GET['cid']; 
        $data['SubjectCode'] = $_GET['sid']; 
        $data['listcurriculum_plan'] = $this->Curriculum_model->get_Curriculum_plan_All($data['CurriculumID'], $data['SubjectCode']);
        $data['Curriculum'] = $this->Curriculum_model->get_Curriculum($data['CurriculumID']);
        $data['Subject'] = $this->Curriculum_model->get_CurriculumSubject($data['CurriculumID'], $data['SubjectCode']);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/dashboard/Curriculum/list-curriculum_plan',$data);
        $this->load->view('templates/footer');

    }

    public function forms_curriculum_plan() {
            
        if ( ! file_exists(APPPATH.'views/pages/forms/Curriculum/forms-curriculum_plan.php'))
        {
            show_404();
        }
        $data['CurriculumID'] = $_GET['cid']; 
        $data['SubjectCode'] = $_GET['sid']; 
        $data['Curriculum'] = $this->Curriculum_model->get_Curriculum($data['CurriculumID']);
        $data['Subject'] = $this->Curriculum_model->get_CurriculumSubject($data['CurriculumID'], $data['SubjectCode']);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/forms/Curriculum/forms-curriculum_plan',$data);
        $this->load->view('templates/footer');

    }
    public function add_curriculum_plan() {
        $data['CurriculumID'] = $_GET['cid']; 
        $data['SubjectCode'] = $_GET['sid']; 

        $CurriculumID = $data['CurriculumID'];
        $SubjectCode = $data['SubjectCode'];

        $curriculum_plan = [
            'PLAN_NAME' => $this->input->post('PLAN_NAME'),
            'EDUCATION_YEAR' => $this->input->post('EDUCATION_YEAR'),
            'SEMESTER' => $this->input->post('SEMESTER'),
            'PLAN_KEY' => $this->input->post('PLAN_KEY'),
            'PLAN_OBJECTIVE' => $this->input->post('PLAN_OBJECTIVE'),
            'PLAN_CHARACTER' => $this->input->post('PLAN_CHARACTER'),
            'PLAN_DETAILS' => $this->input->post('PLAN_DETAILS'),
            'PLAN_PROCESS' => $this->input->post('PLAN_PROCESS'),
            'PLAN_RECOMMEND' => $this->input->post('PLAN_RECOMMEND'),
            'PLAN_MEMO_TA' => $this->input->post('PLAN_MEMO_TA'),
            'PLAN_MEMO_SV' => $this->input->post('PLAN_MEMO_SV'),
            'CurriculumID' => $CurriculumID,
            'SubjectCode' =>  $SubjectCode,
        ];
        $result_curriculum_plan = $this->Curriculum_model->insert_curriculum_plan($curriculum_plan);

      
        if($result_curriculum_plan == 1 ){
            $this->session->set_flashdata('success',"บันทึกข้อมูลสำเร็จ");
            redirect(base_url('list-curriculum_plan?sid='. $SubjectCode.'&&cid='.$CurriculumID));
        }else{
            $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการบันทึกข้อมูล");
            redirect(base_url('forms-forms_curriculum_plan?sid='. $SubjectCode.'&&cid='.$CurriculumID));
        }

    }
    public function forms_edit_curriculum_plan() {
        
             
        if ( ! file_exists(APPPATH.'views/pages/forms/Curriculum/edit_forms-curriculum_plan.php'))
        {
            show_404();
        }
        $data['PLAN_ID'] = $_GET['pid'];
        $data['CurriculumID'] = $_GET['cid']; 
        $data['SubjectCode'] = $_GET['sid']; 

        $data['curriculum_plan'] = $this->Curriculum_model->get_Curriculum_plan($data['PLAN_ID']);
        $data['Curriculum'] = $this->Curriculum_model->get_Curriculum($data['CurriculumID']);
        $data['Subject'] = $this->Curriculum_model->get_CurriculumSubject($data['CurriculumID'], $data['SubjectCode']);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/forms/Curriculum/edit_forms-curriculum_plan',$data);
        $this->load->view('templates/footer');

    }
    public function edit_curriculum_plan() {
        $data['PLAN_ID'] =  $this->input->post('PLAN_ID');
        $CurriculumID = $this->input->post('CurriculumID');
        $SubjectCode = $this->input->post('SubjectCode');
        
        $curriculum_plan = [
            'PLAN_NAME' => $this->input->post('PLAN_NAME'),
            'EDUCATION_YEAR' => $this->input->post('EDUCATION_YEAR'),
            'SEMESTER' => $this->input->post('SEMESTER'),
            'PLAN_KEY' => $this->input->post('PLAN_KEY'),
            'PLAN_OBJECTIVE' => $this->input->post('PLAN_OBJECTIVE'),
            'PLAN_CHARACTER' => $this->input->post('PLAN_CHARACTER'),
            'PLAN_DETAILS' => $this->input->post('PLAN_DETAILS'),
            'PLAN_PROCESS' => $this->input->post('PLAN_PROCESS'),
            'PLAN_RECOMMEND' => $this->input->post('PLAN_RECOMMEND'),
            'PLAN_MEMO_TA' => $this->input->post('PLAN_MEMO_TA'),
            'PLAN_MEMO_SV' => $this->input->post('PLAN_MEMO_SV'),
            'CurriculumID' => $CurriculumID,
            'SubjectCode' =>  $SubjectCode,
        ];
        $result_curriculum_plan = $this->Curriculum_model->update_Curriculum_plan($data['PLAN_ID'],$curriculum_plan);

      
        if($result_curriculum_plan == 1 ){
            $this->session->set_flashdata('success',"บันทึกข้อมูลสำเร็จ");
            redirect(base_url('list-curriculum_plan?sid='. $SubjectCode.'&&cid='.$CurriculumID));
        }else{
            $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการบันทึกข้อมูล");
            redirect(base_url('forms-forms_curriculum_plan?sid='. $SubjectCode.'&&cid='.$CurriculumID));
        }

    }
    public function delete_curriculum_plan($PLAN_ID,$SubjectCode, $CurriculumID){

        $result =$this->Curriculum_model->delete_Curriculum_plan($PLAN_ID);

        if($result == 1 ){
            $this->session->set_flashdata('success',"ลบข้อมูลสำเร็จ");
            redirect(base_url('list-curriculum_plan?sid='. $SubjectCode.'&&cid='. $CurriculumID));
        }else{
            $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการลบข้อมูล");
            redirect(base_url('list-curriculum_plan?sid='. $SubjectCode.'&&cid='. $CurriculumID));
        }
    }
    ##curriculum_activity
    public function list_curriculum_activity() {
            
        if ( ! file_exists(APPPATH.'views/pages/dashboard/Curriculum/list-curriculum_activity.php'))
        {
            show_404();
        }
        $data['PLAN_ID'] = $_GET['pid']; 
        $data['CurriculumID'] = $_GET['cid']; 
        $data['SubjectCode'] = $_GET['sid']; 
        $data['list_curriculum_activity'] = $this->Curriculum_model->get_curriculum_activity_All($data['PLAN_ID']);

        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/dashboard/Curriculum/list-curriculum_activity',$data);
        $this->load->view('templates/footer');

    }
    public function add_curriculum_activity() {

        $PLAN_ID =  $this->input->post('PLAN_ID');
        $CurriculumID = $this->input->post('CurriculumID');
        $SubjectCode = $this->input->post('SubjectCode');
       
        $SCORE_TEACHER = $this->input->post('SCORE_TEACHER');
            if (empty($SCORE_TEACHER)) $SCORE_TEACHER=null;
        $SCORE_PARENT  = $this->input->post('SCORE_PARENT');
            if (empty($SCORE_PARENT)) $SCORE_PARENT=null;
        $SCORE_OTHER = $this->input->post('SCORE_OTHER');
            if (empty($SCORE_OTHER)) $SCORE_OTHER=null;
        $SCORE_SUM_TOTAL = ($SCORE_TEACHER+$SCORE_PARENT+$SCORE_OTHER);

        $SCORE = [
            'SCORE_TEACHER' =>  $SCORE_TEACHER ,
            'SCORE_PARENT' => $SCORE_PARENT,
            'SCORE_OTHER' => $SCORE_OTHER,
            'SCORE_SUM_TOTAL' => $SCORE_SUM_TOTAL,
        ];
        $resultscoreid = $this->Curriculum_model->insert_score($SCORE);

        $curriculum_assessment = [
            'ASSESSMENT_NAME' => $this->input->post('ASSESSMENT_NAME'),
            //'ASSESSMENT_PEOPLE_ID' => $this->input->post('ASSESSMENT_PEOPLE_ID'),
            'SCORE_ID' => $resultscoreid,
            'ASSESSMENT_TOOL_CODE' => $this->input->post('ASSESSMENT_TOOL_CODE'),
            'DeleteStatus' => 0 
        ];
        $result_ASSESSMENT_ID  = $this->Curriculum_model->insert_curriculum_assessment($curriculum_assessment);


        $curriculum_activity = [
            'ACTIVITY_NAME' => $this->input->post('ACTIVITY_NAME'),
            'PLAN_ID' =>$PLAN_ID ,
            'ASSESSMENT_ID' => $result_ASSESSMENT_ID 
        ];
        $result_curriculum_activity = $this->Curriculum_model->insert_curriculum_activity($curriculum_activity);
      

        if($result_curriculum_activity == 1 ){    
            $this->session->set_flashdata('success',"บันทึกข้อมูลสำเร็จ");
            redirect(base_url('list-curriculum_plan?sid='. $SubjectCode.'&&cid='.$CurriculumID));
        }else{
            $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการบันทึกข้อมูล");
            redirect(base_url('forms-curriculum_activity?pid='. $PLAN_ID.'&&sid='. $SubjectCode.'&&cid='. $CurriculumID));
        }

    }

    public function forms_curriculum_activity() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/Curriculum/forms-curriculum_activity.php'))
        {
            show_404();
        }
        $data['PLAN_ID'] = $_GET['pid']; 
        $data['CurriculumID'] = $_GET['cid']; 
        $data['SubjectCode'] = $_GET['sid']; 

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/forms/Curriculum/forms-curriculum_activity',$data);
        $this->load->view('templates/footer');

    }
    public function edit_forms_curriculum_activity() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/Curriculum/edit_forms-curriculum_activity.php'))
        {
            show_404();
        }
        $data['PLAN_ID'] = $_GET['pid']; 
        $data['ACTIVITY_ID'] = $_GET['ACTIVITY_ID'];
        $data['CurriculumID'] = $_GET['cid']; 
        $data['SubjectCode'] = $_GET['sid']; 

        $data['curriculum_activity'] = $this->Curriculum_model->get_curriculum_activity($data['ACTIVITY_ID']);
        
        $data['CLS_FUNDAMENTAL_SUBJECT_PASSING'] = $this->Curriculum_model->get_CLS_FUNDAMENTAL_SUBJECT_PASSING();

            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/forms/Curriculum/edit_forms-curriculum_activity',$data);
            $this->load->view('templates/footer');

    }

    public function edit_curriculum_activity() {
        $PLAN_ID =  $this->input->post('PLAN_ID');
        $ACTIVITY_ID =  $this->input->post('ACTIVITY_ID');
        $CurriculumID = $this->input->post('CurriculumID');
        $SubjectCode = $this->input->post('SubjectCode');
        $ASSESSMENT_ID   = $this->input->post('ASSESSMENT_ID');
        $SCORE_ID   = $this->input->post('SCORE_ID');

            $SCORE_TEACHER = $this->input->post('SCORE_TEACHER');
                if (empty($SCORE_TEACHER)) $SCORE_TEACHER=null;
            $SCORE_PARENT  = $this->input->post('SCORE_PARENT');
                if (empty($SCORE_PARENT)) $SCORE_PARENT=null;
            $SCORE_OTHER = $this->input->post('SCORE_OTHER');
                if (empty($SCORE_OTHER)) $SCORE_OTHER=null;
            $SCORE_SUM_TOTAL = ($SCORE_TEACHER+$SCORE_PARENT+$SCORE_OTHER);
    
            $SCORE = [
                'SCORE_TEACHER' =>  $SCORE_TEACHER,
                'SCORE_PARENT' => $SCORE_PARENT,
                'SCORE_OTHER' => $SCORE_OTHER,
                'SCORE_SUM_TOTAL' => $SCORE_SUM_TOTAL,
                'FUNDAMENTAL_SUBJECT_PASSING_CODE' => $this->input->post('FUNDAMENTAL_SUBJECT_PASSING_CODE'),
            ];             

            $result_score_id = $this->Curriculum_model->update_score($SCORE_ID,$SCORE);
            
            $curriculum_assessment = [
                'ASSESSMENT_NAME' => $this->input->post('ASSESSMENT_NAME'),
                'ASSESSMENT_PEOPLE_ID' => $this->input->post('ASSESSMENT_PEOPLE_ID'),
                // 'SCORE_ID' => $SCORE_ID,
                'ASSESSMENT_TOOL_CODE' => $this->input->post('ASSESSMENT_TOOL_CODE'),
                'DeleteStatus' => 0 
            ];
            $result_assessment = $this->Curriculum_model->update_assessment($ASSESSMENT_ID,$curriculum_assessment);

            $curriculum_activity = [
                'ACTIVITY_NAME' => $this->input->post('ACTIVITY_NAME'),
                'PLAN_ID' =>$PLAN_ID ,
                'ASSESSMENT_ID' => $this->input->post('ASSESSMENT_ID')
            ];
            $result_curriculum_activity = $this->Curriculum_model->update_curriculum_activity($curriculum_activity,$ACTIVITY_ID );
    
            if($result_curriculum_activity==1){    
                $this->session->set_flashdata('success',"แก้ไขข้อมูลสำเร็จ");
                redirect(base_url('list-curriculum_plan?sid='. $SubjectCode.'&&cid='.$CurriculumID)); 
            }else{
                $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการแก้ไขข้อมูล");
                redirect(base_url('edit_forms-curriculum_activity?pid='. $PLAN_ID.'&&sid='. $SubjectCode.'&&cid='. $CurriculumID .'&&ACTIVITY_ID='.$ACTIVITY_ID ));
            }
           
    }
    public function delete_curriculum_activity ($PLAN_ID,$ACTIVITY_ID,$SubjectCode,$CurriculumID){


        $result =$this->Curriculum_model->delete_curriculum_activity($ACTIVITY_ID);

        if($result == 1 ){
            $this->session->set_flashdata('success',"ลบข้อมูลสำเร็จ");
            redirect(base_url('list-curriculum_plan?sid='. $SubjectCode.'&&cid='.$CurriculumID)); 
        }else{
            $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการลบข้อมูล");
            redirect(base_url('edit_forms-curriculum_activity?pid='. $PLAN_ID.'&&sid='. $SubjectCode.'&&cid='. $CurriculumID .'&&ACTIVITY_ID='.$ACTIVITY_ID ));
        }
    }

###curriculum_assessment

    public function list_curriculum_assignment() {
        
        if ( ! file_exists(APPPATH.'views/pages/dashboard/Curriculum/list-curriculum_assignment.php'))
        {
            show_404();
        }
        $data['ACTIVITY_ID'] = $_GET['aid']; 
        $data['PLAN_ID'] = $_GET['pid']; 
        $data['SubjectCode'] = $_GET['sid']; 
        $data['CurriculumID'] = $_GET['cid']; 
        
        
        $data['assignment'] = $this->Curriculum_model->get_assessment($data['ACTIVITY_ID']);

       if($data['assignment'] == "" || $data['assignment'] == null){
            $data['assignment']  = null;
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/dashboard/Curriculum/list-curriculum_assignment',$data);
            $this->load->view('templates/footer');
       }else{
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/dashboard/Curriculum/list-curriculum_assignment',$data);
            $this->load->view('templates/footer');
       }
     
        

    }
    public function forms_curriculum_assessment() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/Curriculum/forms-curriculum_assessment.php'))
        {
            show_404();
        }
        $data['ACTIVITY_ID'] = $_GET['aid']; 

        $data['PLAN_ID'] = $_GET['pid']; 
        $data['SubjectCode'] = $_GET['sid']; 
        $data['CurriculumID'] = $_GET['cid']; 

        $data['CLS_FUNDAMENTAL_SUBJECT_PASSING'] = $this->Curriculum_model->get_CLS_FUNDAMENTAL_SUBJECT_PASSING();
       
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/forms/Curriculum/forms-curriculum_assessment',$data);
        $this->load->view('templates/footer');

    }
    public function edit_forms_curriculum_assessment() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/Curriculum/edit_forms-curriculum_assessment.php'))
        {
            show_404();
        }
        $data['ACTIVITY_ID'] = $_GET['aid']; 

        $data['ASSESSMENT_ID'] = $_GET['asid']; 
        
        $data['PLAN_ID'] = $_GET['pid']; 
        $data['SubjectCode'] = $_GET['sid']; 
        $data['CurriculumID'] = $_GET['cid']; 

        $data['assignment'] = $this->Curriculum_model->get_assessment($data['ACTIVITY_ID']);
       
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/forms/Curriculum/edit_forms-curriculum_assessment',$data);
        $this->load->view('templates/footer');

    }

   
    public function add_curriculum_assessment() {

        $ACTIVITY_ID =  $this->input->post('ACTIVITY_ID');
        
        $SCORE_TEACHER = $this->input->post('SCORE_TEACHER');
        $SCORE_PARENT  = $this->input->post('SCORE_PARENT');
        $SCORE_OTHER = $this->input->post('SCORE_OTHER');
        $SCORE_SUM_TOTAL = ($SCORE_TEACHER+$SCORE_PARENT+$SCORE_OTHER);

        $SCORE = [
            'SCORE_TEACHER' =>  $SCORE_TEACHER,
            'SCORE_PARENT' => $SCORE_PARENT,
            'SCORE_OTHER' => $SCORE_OTHER,
            'SCORE_SUM_TOTAL' => $SCORE_SUM_TOTAL,
            'FUNDAMENTAL_SUBJECT_PASSING_CODE' => $this->input->post('FUNDAMENTAL_SUBJECT_PASSING_CODE'),
        ];
        $resultscoreid = $this->Curriculum_model->insert_score($SCORE);

        $curriculum_assessment = [
            'ASSESSMENT_NAME' => $this->input->post('ASSESSMENT_NAME'),
            'ASSESSMENT_PEOPLE_ID' => $this->input->post('ASSESSMENT_PEOPLE_ID'),
            'SCORE_ID' => $resultscoreid,
            'ASSESSMENT_TOOL_CODE' => $this->input->post('ASSESSMENT_TOOL_CODE'),
            'ACTIVITY_ID' =>$ACTIVITY_ID ,
            'DeleteStatus' => 0 
        ];
        $result_curriculum_assessment = $this->Curriculum_model->insert_curriculum_assessment($curriculum_assessment);

      
        if($result_curriculum_assessment == 1 ){    
            $this->session->set_flashdata('success',"บันทึกข้อมูลสำเร็จ");
            redirect(base_url('list_curriculum_assignment?aid='. $ACTIVITY_ID.'&pid='. $PLAN_ID.'&&sid='. $SubjectCode.'&&cid='.$CurriculumID ));
        }else{
            redirect(base_url('forms-curriculum_assessment?aid='. $ACTIVITY_ID.'&pid='. $PLAN_ID.'&&sid='. $SubjectCode.'&&cid='.$CurriculumID ));
        }

    }
    
    
 #eportfolio   
    public function forms_eportfolio() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/Curriculum/forms-eportfolio.php'))
        {
            show_404();
        }

        $data['STUDENT'] = $this->Student_model->get_STUDENT_All();
       
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/forms/Curriculum/forms-eportfolio',$data);
        $this->load->view('templates/footer');

    }

    public function add_eportfolio() {
        $eportfolio = [
            'STUDENT_LIKE' => $this->input->post('STUDENT_LIKE'),
            'STUDENT_NO' => $this->input->post('STUDENT_NO'),
            'STUDENT_DREAM' => $this->input->post('STUDENT_DREAM'),
            'STUDENT_HOPE' => $this->input->post('STUDENT_HOPE'),
            'STUDENT_TARGET' => $this->input->post('STUDENT_TARGET'),
            'STUDENT_LEARNING' => $this->input->post('STUDENT_LEARNING'),
            'STUDENT_PROJECT' => $this->input->post('STUDENT_PROJECT'),
            'STUDENT_GOODNESS' => $this->input->post('STUDENT_GOODNESS'),
            'STUDENT_USEFULNESS' => $this->input->post('STUDENT_USEFULNESS'),
            'STUDENT_PRIDE' => $this->input->post('STUDENT_PRIDE'),
            'STUDENT_SUMMARY' => $this->input->post('STUDENT_SUMMARY'),
        ];
        $result_eportfolio = $this->Curriculum_model->insert_eportfolio($eportfolio);

        if($result_eportfolio == 1 ){    
            $this->session->set_flashdata('success',"บันทึกข้อมูลสำเร็จ");
            redirect(base_url('list-eportfolio'));
        }else{
            redirect(base_url('forms_eportfolio'));
        }

    }

    public function list_eportfolio() {
            
        if ( ! file_exists(APPPATH.'views/pages/dashboard/Curriculum/list-eportfolio.php'))
        {
            show_404();
        }
        $data["EPORTFOLIO"] = $this->Curriculum_model->get_EPORTFOLIO_ALL();
        
  
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/dashboard/Curriculum/list-eportfolio',$data);
        $this->load->view('templates/footer');

    }
    public function edit_forms_eportfolio() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/Curriculum/edit_forms-eportfolio.php'))
        {
            show_404();
        }
        $data['EPORTFOLIO_ID'] = $_GET['ep']; 
        $data['STUDENT'] = $this->Student_model->get_STUDENT_All();
        
        $data["EPORTFOLIO"] = $this->Curriculum_model->get_EPORTFOLIO($data['EPORTFOLIO_ID']);
       
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/forms/Curriculum/edit_forms-eportfolio',$data);
        $this->load->view('templates/footer');




    }
    public function edit_eportfolio() {
        $EPORTFOLIO_ID = $this->input->post('EPORTFOLIO_ID');
        
        $eportfolio = [
            'STUDENT_LIKE' => $this->input->post('STUDENT_LIKE'),
            'STUDENT_NO' => $this->input->post('STUDENT_NO'),
            'STUDENT_DREAM' => $this->input->post('STUDENT_DREAM'),
            'STUDENT_HOPE' => $this->input->post('STUDENT_HOPE'),
            'STUDENT_TARGET' => $this->input->post('STUDENT_TARGET'),
            'STUDENT_LEARNING' => $this->input->post('STUDENT_LEARNING'),
            'STUDENT_PROJECT' => $this->input->post('STUDENT_PROJECT'),
            'STUDENT_GOODNESS' => $this->input->post('STUDENT_GOODNESS'),
            'STUDENT_USEFULNESS' => $this->input->post('STUDENT_USEFULNESS'),
            'STUDENT_PRIDE' => $this->input->post('STUDENT_PRIDE'),
            'STUDENT_SUMMARY' => $this->input->post('STUDENT_SUMMARY'),
        ];
        $result_eportfolio = $this->Curriculum_model->update_EPORTFOLIO($EPORTFOLIO_ID ,$eportfolio);

        if($result_eportfolio == 1 ){    
            $this->session->set_flashdata('success',"บันทึกข้อมูลสำเร็จ");
            redirect(base_url('list-eportfolio'));
        }else{
            redirect(base_url('forms_eportfolio'));
        }

    }
    public function delete_eportfolio($EPORTFOLIO_ID){


        $result =$this->Curriculum_model->delete_eportfolio($EPORTFOLIO_ID);

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