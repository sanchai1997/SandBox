<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area_identittyController extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        // Your own constructor code
        $this->load->library('session');
        $this->load->model('School_model');
        $this->load->model('Area_identitty_model');
        
        
    }
    public function forms_Area_identitty() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/Area_identity/forms-area_identity.php'))
        {
            show_404();
        }
        $data['listSchool'] = $this->School_model->get_school_All();
        $data['listReligion'] = $this->Area_identitty_model->get_RELIGION_All();
        $data['listOccupation'] = $this->Area_identitty_model->get_OCCUPATION_All();

        $data['SchoolID'] = $_GET['sid'];
        

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/forms/Area_identity/forms-area_identitty',$data);
        $this->load->view('templates/footer');

    }

    public function list_area_identity() {        
        $data['School'] = $this->School_model->get_school_All();
        

        if($data['School']==null){
            $data['listAreaIdentity'] = null;
        }else{
            $data['School_id'] = $this->School_model->get_school_top();
            $data['SchoolID'] = $data['School_id'][0]-> SchoolID;
            $data['SchoolNameThai'] = $data['School_id'][0]-> SchoolNameThai;
            $data['listAreaIdentity'] = $this->Area_identitty_model->get_AreaIdentity_by_school($data['SchoolID']);  
            
        }
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/dashboard/Area_Identity/list-area_Identity',$data);
        $this->load->view('templates/footer');

    }

    public function list_area_identity_by_school() {
        

        $data['SchoolID'] = $_GET['sid']; 
        $school = $this->School_model->get_school($data['SchoolID']);  
        $data['SchoolNameThai'] = $school[0]->SchoolNameThai ; 

        $data['listAreaIdentity'] = $this->Area_identitty_model->get_AreaIdentity_by_school($data['SchoolID']); 
        $data['School'] = $this->School_model->get_school_All();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/dashboard/Area_Identity/list-area_identity',$data);
        $this->load->view('templates/footer');

    }

    public function add_area_identity() {
       
        $SchoolID  = $this->input->post('SchoolID');
        
            $area_identity = [
                'EducationYear' => $this->input->post('EducationYear'),
                'Semester' => $this->input->post('Semester'),
                'SchoolID' => $SchoolID,
                'AreaProduct' => $this->input->post('AreaProduct'),
                'AreaEnvironment' => $this->input->post('AreaEnvironment'),
                'AreaLanguage' => $this->input->post('AreaLanguage'),   
                'AreaCulture'  => $this->input->post('AreaCulture'),   
                'AreaValues' => $this->input->post('AreaValues'),
            ];

            $result_area_identity =  $this->Area_identitty_model->insert_area_identitty($area_identity);

            if($result_area_identity == 1){
                $this->session->set_flashdata('success',"บันทึกข้อมูลสำเร็จ");
               // show_error("111");
                redirect(base_url('list-area_identity_by_school?sid='.$SchoolID));
            }else{
                $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการบันทึกข้อมูล");
               // show_error("222");
                redirect(base_url('forms-area_identity?sid='.$SchoolID));
            }
        
    }

    public function delete_area_identity(){
        $EducationYear = $_GET['y'];
        $Semester = $_GET['s']; 
        $SchoolID = $_GET['sid']; 

        $result =$this->Area_identitty_model-> delete_area_identitty($EducationYear, $Semester, $SchoolID);
        if($result == 1 ){
            $this->session->set_flashdata('success',"ลบข้อมูลสำเร็จ");
            redirect(base_url('list-area_identity_by_school?sid='.$SchoolID));
        }else{
            $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการลบข้อมูล");
            redirect(base_url('list-area_identity_by_school?sid='.$SchoolID));
        }
        
    }

    public function edit_forms_area_identity() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/Area_identity/edit_forms-area_identity.php'))
        {
            show_404();
        }

        $data['listSchool'] = $this->School_model->get_school_All();
        $data['listReligion'] = $this->Area_identitty_model->get_RELIGION_All();
        $data['listOccupation'] = $this->Area_identitty_model->get_OCCUPATION_All();

        $data['SchoolID'] = $_GET['sid'];
        $EducationYear = $_GET['y'];
        $Semester = $_GET['s']; 

        $data['Area_identity'] = $this->Area_identitty_model->get_Area_identity($data['SchoolID'], $EducationYear, $Semester);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/forms/Area_identity/edit_forms-area_identity',$data);
        $this->load->view('templates/footer');

    }

    public function edit_area_identity() {
       
        $SchoolID  = $this->input->post('SchoolID');
        $EducationYear = $this->input->post('OLDEducationYear');
        $Semester = $this->input->post('OLDSemester');
        
        $area_identity = [
            'EducationYear' => $this->input->post('EducationYear'),
            'Semester' => $this->input->post('Semester'),
            'SchoolID' => $SchoolID,
            'AreaProduct' => $this->input->post('AreaProduct'),
            'AreaEnvironment' => $this->input->post('AreaEnvironment'),
            'AreaLanguage' => $this->input->post('AreaLanguage'),   
            'AreaCulture'  => $this->input->post('AreaCulture'),   
            'AreaValues' => $this->input->post('AreaValues'),
        ];
        $result =  $this->Area_identitty_model->update_area_identity($SchoolID, $EducationYear, $Semester, $area_identity);
   
        if($result == 1){
            $this->session->set_flashdata('success',"แก้ไขข้อมูลสำเร็จ");
            redirect(base_url('list-area_identity_by_school?sid='.$SchoolID));
        }else{
            $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการแก้ไขข้อมูล");
            redirect(base_url('edit_forms_area_identity?sid='.$SchoolID . '&&y='. $EducationYear . '&&s='. $Semester));
        }
    
    }

    ///Region
    public function forms_Region() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/Area_identity/forms-region.php'))
        {
            show_404();
        }
        $data['listReligion'] = $this->Area_identitty_model->get_RELIGION_All();

        $data['SchoolID'] = $_GET['sid'];
        $data['EducationYear'] = $_GET['y']; 
        $data['Semester'] = $_GET['s']; 

        $limit_AreaReligionPercentage = $this->Area_identitty_model-> limit_AreaReligionPercentage($data['EducationYear'], $data['Semester'], $data['SchoolID']);    

        if(count($limit_AreaReligionPercentage)>0 ){
            $data['limit_AreaReligionPercentage'] = $limit_AreaReligionPercentage[0]->limit_Percentage;
       }else{
           $data['limit_AreaReligionPercentage'] = 0;
       }

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/forms/Area_identity/forms-region',$data);
        $this->load->view('templates/footer');

    }

    public function add_Region() {
       
        $SchoolID  = $this->input->post('SchoolID');
        $EducationYear = $this->input->post('EducationYear');
        $Semester = $this->input->post('Semester');
        
            $Region = [
                'EducationYear' =>  $EducationYear,
                'Semester' => $Semester,
                'SchoolID' => $SchoolID,
                'AreaReligionCode' => $this->input->post('AreaReligionCode'),
                'AreaReligionPercentage' => $this->input->post('AreaReligionPercentage'),
            ];

            $result =  $this->Area_identitty_model->insert_area_Region($Region);

            if($result == 1){
                $this->session->set_flashdata('success',"บันทึกข้อมูลสำเร็จ");
               // show_error("111");
                redirect(base_url('list-area_identity_by_school?sid='.$SchoolID));
            }else{
                $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการบันทึกข้อมูล");
               // show_error("222");
                redirect(base_url('forms-Region?sid='.$SchoolID . '&&y='. $EducationYear . '&&s='. $Semester));
            }
        
    }
    
    public function edit_forms_Region() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/Area_identity/edit_forms-Region.php'))
        {
            show_404();
        }

        $data['listReligion'] = $this->Area_identitty_model->get_RELIGION_All();

        $SchoolID = $_GET['sid'];
        $EducationYear = $_GET['y'];
        $Semester = $_GET['s']; 
        $AreaReligionCode = $_GET['rid'];

        $data['Region'] = $this->Area_identitty_model->get_Region_byCode($SchoolID, $EducationYear, $Semester,  $AreaReligionCode);

        $limit_AreaReligionPercentage = $this->Area_identitty_model-> limit_AreaReligionPercentage_without($EducationYear, $Semester, $SchoolID,$AreaReligionCode );    

        if(count($limit_AreaReligionPercentage)>0 ){
            $data['limit_AreaReligionPercentage'] = $limit_AreaReligionPercentage[0]->limit_Percentage;
       }else{
           $data['limit_AreaReligionPercentage'] = 0;
       }

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/forms/Area_identity/edit_forms-Region',$data);
        $this->load->view('templates/footer');

    }

    public function edit_Region() {
       
        $SchoolID  = $this->input->post('SchoolID');
        $EducationYear = $this->input->post('EducationYear');
        $Semester = $this->input->post('Semester');
        $AreaReligionCode = $this->input->post('OLDAreaReligionCode');
        
        $Region = [
            'AreaReligionCode' => $this->input->post('AreaReligionCode'),
            'AreaReligionPercentage' => $this->input->post('AreaReligionPercentage'),
        ];

        $result =  $this->Area_identitty_model->update_Region($SchoolID, $EducationYear, $Semester,$AreaReligionCode, $Region);
   
        if($result == 1){
            $this->session->set_flashdata('success',"แก้ไขข้อมูลสำเร็จ");
            redirect(base_url('list-area_identity_by_school?sid='.$SchoolID));
        }else{
            $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการแก้ไขข้อมูล");
            redirect(base_url('edit_forms_Region?sid='.$SchoolID . '&&y='. $EducationYear . '&&s='. $Semester. '&&rid='. $AreaReligionCode));
        }
    
    }

    public function delete_Region(){
        $EducationYear = $_GET['y'];
        $Semester = $_GET['s']; 
        $SchoolID = $_GET['sid']; 
        $AreaReligionCode = $_GET['rid'];

        $result =$this->Area_identitty_model-> delete_Region($EducationYear, $Semester, $SchoolID, $AreaReligionCode);
        if($result == 1 ){
            $this->session->set_flashdata('success',"ลบข้อมูลสำเร็จ");
            redirect(base_url('list-area_identity_by_school?sid='.$SchoolID));
        }else{
            $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการลบข้อมูล");
            redirect(base_url('list-area_identity_by_school?sid='.$SchoolID));
        }
        
    }
//////////////////// OCCUPATION ///////////////////
    public function forms_OCCUPATION() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/Area_identity/forms-OCCUPATION.php'))
        {
            show_404();
        }
        $data['listOCCUPATION'] = $this->Area_identitty_model->get_OCCUPATION_All();

        $data['SchoolID'] = $_GET['sid'];
        $data['EducationYear'] = $_GET['y']; 
        $data['Semester'] = $_GET['s']; 

        $limit_AreaOccupationPercentage = $this->Area_identitty_model-> limit_AreaOccupationPercentage($data['EducationYear'], $data['Semester'], $data['SchoolID']);    

        if(count($limit_AreaOccupationPercentage)>0 ){
            $data['limit_AreaOccupationPercentage'] = $limit_AreaOccupationPercentage[0]->limit_Percentage;
       }else{
           $data['limit_AreaOccupationPercentage'] = 0;
       }

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/forms/Area_identity/forms-Occupation',$data);
        $this->load->view('templates/footer');

    }

    public function add_OCCUPATION() {
       
        $SchoolID  = $this->input->post('SchoolID');
        $EducationYear = $this->input->post('EducationYear');
        $Semester = $this->input->post('Semester');
        
            $OCCUPATION = [
                'EducationYear' =>  $EducationYear,
                'Semester' => $Semester,
                'SchoolID' => $SchoolID,
                'AreaOccupationCode' => $this->input->post('AreaOccupationCode'),
                'AreaOccupationPercentage' => $this->input->post('AreaOccupationPercentage'),
            ];

            $result =  $this->Area_identitty_model->insert_area_OCCUPATION($OCCUPATION);

            if($result == 1){
                $this->session->set_flashdata('success',"บันทึกข้อมูลสำเร็จ");
                redirect(base_url('list-area_identity_by_school?sid='.$SchoolID));
            }else{
                $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการบันทึกข้อมูล");
                redirect(base_url('forms-OCCUPATION?sid='.$SchoolID . '&&y='. $EducationYear . '&&s='. $Semester));
            }
        
    }
    
    public function edit_forms_OCCUPATION() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/Area_identity/edit_forms-OCCUPATION.php'))
        {
            show_404();
        }

        $data['listOCCUPATION'] = $this->Area_identitty_model->get_OCCUPATION_All();

        $SchoolID = $_GET['sid'];
        $EducationYear = $_GET['y'];
        $Semester = $_GET['s']; 
        $AreaOccupationCode = $_GET['rid'];

        $data['OCCUPATION'] = $this->Area_identitty_model->get_OCCUPATION_byCode($SchoolID, $EducationYear, $Semester,  $AreaOccupationCode);

        $limit_AreaOccupationPercentage = $this->Area_identitty_model-> limit_AreaOccupationPercentage_without($EducationYear, $Semester, $SchoolID,$AreaOccupationCode );    

        if(count($limit_AreaOccupationPercentage)>0 ){
            $data['limit_AreaOccupationPercentage'] = $limit_AreaOccupationPercentage[0]->limit_Percentage;
       }else{
           $data['limit_AreaOccupationPercentage'] = 0;
       }

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/forms/Area_identity/edit_forms-OCCUPATION',$data);
        $this->load->view('templates/footer');

    }

    public function edit_OCCUPATION() {
       
        $SchoolID  = $this->input->post('SchoolID');
        $EducationYear = $this->input->post('EducationYear');
        $Semester = $this->input->post('Semester');
        $AreaOccupationCode = $this->input->post('OLDAreaOccupationCode');
        
        $OCCUPATION = [
            'AreaOccupationCode' => $this->input->post('AreaOccupationCode'),
            'AreaOccupationPercentage' => $this->input->post('AreaOccupationPercentage'),
        ];

        $result =  $this->Area_identitty_model->update_OCCUPATION($SchoolID, $EducationYear, $Semester,$AreaOccupationCode, $OCCUPATION);
   
        if($result == 1){
            $this->session->set_flashdata('success',"แก้ไขข้อมูลสำเร็จ");
            redirect(base_url('list-area_identity_by_school?sid='.$SchoolID));
        }else{
            $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการแก้ไขข้อมูล");
            redirect(base_url('edit_forms_OCCUPATION?sid='.$SchoolID . '&&y='. $EducationYear . '&&s='. $Semester. '&&rid='. $AreaOccupationCode));
        }
    
    }

    public function delete_OCCUPATION(){
        $EducationYear = $_GET['y'];
        $Semester = $_GET['s']; 
        $SchoolID = $_GET['sid']; 
        $AreaOccupationCode = $_GET['rid'];

        $result =$this->Area_identitty_model-> delete_OCCUPATION($EducationYear, $Semester, $SchoolID, $AreaOccupationCode);
        if($result == 1 ){
            $this->session->set_flashdata('success',"ลบข้อมูลสำเร็จ");
            redirect(base_url('list-area_identity_by_school?sid='.$SchoolID));
        }else{
            $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการลบข้อมูล");
            redirect(base_url('list-area_identity_by_school?sid='.$SchoolID));
        }
        
    }

}