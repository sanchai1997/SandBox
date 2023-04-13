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
        
        if ( ! file_exists(APPPATH.'views/pages/forms/Area_identity/forms-area_identitty.php'))
        {
            show_404();
        }
        $data['listSchool'] = $this->School_model->get_school_All();
        $data['listReligion'] = $this->Area_identitty_model->get_RELIGION();
        $data['listOccupation'] = $this->Area_identitty_model->get_OCCUPATION();

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

}