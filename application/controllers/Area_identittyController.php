<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once '_sandboxcontroller.php';

class Area_identittyController extends _sandboxcontroller{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        // Your own constructor code
        $this->load->library('session');
        $this->load->model('School_model');
        $this->load->model('Area_identitty_model');
        $this->load->helper('string');
        
    }
    public function forms_Area_identitty() {
        $data = array();
        $data = $this->session->userdata();
        
        if (!empty($data['UserRights'])) {
			//'501000', 'ข้อมูลอัตลักษณ์ของแต่ละพื้นที่'
			$R_501000 = $data['UserRights'][array_search('501000', array_column($data['UserRights'], 'UR_Code'))];
			$data['R_501000'] = $R_501000;
		} else {
			$data['R_501000'] = NULL;
		}
        
        if ( ! file_exists(APPPATH.'views/pages/forms/Area_Identity/forms-area_identitty.php'))
        {
            show_404();
        }
        
        $data['listSchool'] = $this->School_model->get_school_All();
        $data['listReligion'] = $this->Area_identitty_model->get_RELIGION_All();
        $data['listOccupation'] = $this->Area_identitty_model->get_OCCUPATION_All();

        $data['SchoolID'] = $_GET['sid'];
        

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/forms/Area_Identity/forms-area_identitty',$data);
        $this->load->view('templates/footer');

    }

    public function list_area_identity() {    
        $data = array();
        $data = $this->session->userdata();
        
        if (!empty($data['UserRights'])) {
			//'501000', 'ข้อมูลอัตลักษณ์ของแต่ละพื้นที่'
			$R_501000 = $data['UserRights'][array_search('501000', array_column($data['UserRights'], 'UR_Code'))];
			$data['R_501000'] = $R_501000;
		} else {
			$data['R_501000'] = NULL;
		}
            
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
        $this->load->view('pages/dashboard/Area_Identity/list-area_identity',$data);
        $this->load->view('templates/footer');

    }

    public function list_area_identity_by_school() {
        $data = array();
        $data = $this->session->userdata();
        
        if (!empty($data['UserRights'])) {
			//'501000', 'ข้อมูลอัตลักษณ์ของแต่ละพื้นที่'
			$R_501000 = $data['UserRights'][array_search('501000', array_column($data['UserRights'], 'UR_Code'))];
			$data['R_501000'] = $R_501000;
		} else {
			$data['R_501000'] = NULL;
		}

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
                $school = $this->School_model->get_school($SchoolID);  
                $SchoolNameThai = $school[0]->SchoolNameThai ; 

                $UserID = $this->session->userdata('UserID');
                $UserIPAddress = $this->session->userdata('UserIPAddress');
                $UserName = $this->session->userdata('UserName');
    
                $log = [
                    'LogMessage' => 'เพิ่มอัตลักษณ์ของแต่ละพื้นที่ ปีการศึกษา = "' . $this->input->post('EducationYear') . '" ภาคเรียน = "' . $this->input->post('Semester') . '" โรงเรียน = "' . $SchoolNameThai . '"',
                    'LogUserID' => $UserID,
                    'LogUsername' => $UserName ,
                    'LogIpAddress' => $UserIPAddress,
                    'LogCreation' => date('Y-m-d H:i:s')
                ];
    
                $logresult = $this->db->insert('SYS_LOG', $log);

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
            $school = $this->School_model->get_school($SchoolID);  
            $SchoolNameThai = $school[0]->SchoolNameThai ; 
            
            $UserID = $this->session->userdata('UserID');
            $UserIPAddress = $this->session->userdata('UserIPAddress');
            $UserName = $this->session->userdata('UserName');

            $log = [
                'LogMessage' => 'แก้ไขอัตลักษณ์ของแต่ละพื้นที่ ปีการศึกษา = "' . $EducationYear . '" ภาคเรียน = "' . $Semester . '" โรงเรียน = "' . $SchoolNameThai . '"',
                'LogUserID' => $UserID,
                'LogUsername' => $UserName ,
                'LogIpAddress' => $UserIPAddress,
                'LogCreation' => date('Y-m-d H:i:s')
            ];

            $logresult = $this->db->insert('SYS_LOG', $log);

            $this->session->set_flashdata('success',"ลบข้อมูลสำเร็จ");
            redirect(base_url('list-area_identity_by_school?sid='.$SchoolID));
        }else{
            $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการลบข้อมูล");
            redirect(base_url('list-area_identity_by_school?sid='.$SchoolID));
        }
        
    }

    public function edit_forms_area_identity() {
        $data = array();
        $data = $this->session->userdata();
        
        if (!empty($data['UserRights'])) {
			//'501000', 'ข้อมูลอัตลักษณ์ของแต่ละพื้นที่'
			$R_501000 = $data['UserRights'][array_search('501000', array_column($data['UserRights'], 'UR_Code'))];
			$data['R_501000'] = $R_501000;
		} else {
			$data['R_501000'] = NULL;
		}
        
        if ( ! file_exists(APPPATH.'views/pages/forms/Area_Identity/edit_forms-area_identity.php'))
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
        $this->load->view('pages/forms/Area_Identity/edit_forms-area_identity',$data);
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
            $school = $this->School_model->get_school($SchoolID);  
            $SchoolNameThai = $school[0]->SchoolNameThai ; 
            
            $UserID = $this->session->userdata('UserID');
            $UserIPAddress = $this->session->userdata('UserIPAddress');
            $UserName = $this->session->userdata('UserName');

            $log = [
                'LogMessage' => 'แก้ไขอัตลักษณ์ของแต่ละพื้นที่ ปีการศึกษา = "' . $EducationYear . '" ภาคเรียน = "' . $Semester . '" โรงเรียน = "' . $SchoolNameThai . '"',
                'LogUserID' => $UserID,
                'LogUsername' => $UserName ,
                'LogIpAddress' => $UserIPAddress,
                'LogCreation' => date('Y-m-d H:i:s')
            ];

            $logresult = $this->db->insert('SYS_LOG', $log);

            $this->session->set_flashdata('success',"แก้ไขข้อมูลสำเร็จ");
            redirect(base_url('list-area_identity_by_school?sid='.$SchoolID));
        }else{
            $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการแก้ไขข้อมูล");
            redirect(base_url('edit_forms_area_identity?sid='.$SchoolID . '&&y='. $EducationYear . '&&s='. $Semester));
        }
    
    }

    ///Region
    public function forms_Region() {
        $data = array();
        $data = $this->session->userdata();
        
        if (!empty($data['UserRights'])) {
			//'501000', 'ข้อมูลอัตลักษณ์ของแต่ละพื้นที่'
			$R_501000 = $data['UserRights'][array_search('501000', array_column($data['UserRights'], 'UR_Code'))];
			$data['R_501000'] = $R_501000;
		} else {
			$data['R_501000'] = NULL;
		}
        
        if ( ! file_exists(APPPATH.'views/pages/forms/Area_Identity/forms-region.php'))
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
        $this->load->view('pages/forms/Area_Identity/forms-region',$data);
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
                $school = $this->School_model->get_school($SchoolID);  
                $SchoolNameThai = $school[0]->SchoolNameThai ; 

                $rg = $this->Area_identitty_model->get_Region_byCode($SchoolID, $EducationYear, $Semester, $this->input->post('AreaReligionCode'));  
                $RELIGION_NAME = $rg[0]->RELIGION_NAME ; 

                $UserID = $this->session->userdata('UserID');
                $UserIPAddress = $this->session->userdata('UserIPAddress');
                $UserName = $this->session->userdata('UserName');
    
                $log = [
                    'LogMessage' => 'เพิ่มศาสนา ชื่อ = "' .  $RELIGION_NAME . '" ปีการศึกษา = "' . $EducationYear . '" ภาคเรียน = "' .  $Semester . '" โรงเรียน = "' . $SchoolNameThai . '"',
                    'LogUserID' => $UserID,
                    'LogUsername' => $UserName ,
                    'LogIpAddress' => $UserIPAddress,
                    'LogCreation' => date('Y-m-d H:i:s')
                ];
    
                $logresult = $this->db->insert('SYS_LOG', $log);

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
        $data = array();
        $data = $this->session->userdata();
        
        if (!empty($data['UserRights'])) {
			//'501000', 'ข้อมูลอัตลักษณ์ของแต่ละพื้นที่'
			$R_501000 = $data['UserRights'][array_search('501000', array_column($data['UserRights'], 'UR_Code'))];
			$data['R_501000'] = $R_501000;
		} else {
			$data['R_501000'] = NULL;
		}
        
        if ( ! file_exists(APPPATH.'views/pages/forms/Area_Identity/edit_forms-region.php'))
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
        $this->load->view('pages/forms/Area_Identity/edit_forms-region',$data);
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
            $school = $this->School_model->get_school($SchoolID);  
            $SchoolNameThai = $school[0]->SchoolNameThai ; 

            $rg = $this->Area_identitty_model->get_Region_byCode($SchoolID, $EducationYear, $Semester, $AreaReligionCode);  
            $RELIGION_NAME = $rg[0]->RELIGION_NAME ; 

            $UserID = $this->session->userdata('UserID');
            $UserIPAddress = $this->session->userdata('UserIPAddress');
            $UserName = $this->session->userdata('UserName');

            $log = [
                'LogMessage' => 'แก้ไขศาสนา ชื่อ = "' .  $RELIGION_NAME . '" ปีการศึกษา = "' . $EducationYear . '" ภาคเรียน = "' .  $Semester . '" โรงเรียน = "' . $SchoolNameThai . '"',
                'LogUserID' => $UserID,
                'LogUsername' => $UserName ,
                'LogIpAddress' => $UserIPAddress,
                'LogCreation' => date('Y-m-d H:i:s')
            ];

            $logresult = $this->db->insert('SYS_LOG', $log);

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

        $rg = $this->Area_identitty_model->get_Region_byCode($SchoolID, $EducationYear, $Semester, $AreaReligionCode);  
        $RELIGION_NAME = $rg[0]->RELIGION_NAME ; 

        $result =$this->Area_identitty_model-> delete_Region($EducationYear, $Semester, $SchoolID, $AreaReligionCode);
        if($result == 1 ){
            $school = $this->School_model->get_school($SchoolID);  
            $SchoolNameThai = $school[0]->SchoolNameThai ; 

            $UserID = $this->session->userdata('UserID');
            $UserIPAddress = $this->session->userdata('UserIPAddress');
            $UserName = $this->session->userdata('UserName');

            $log = [
                'LogMessage' => 'ลบศาสนา ชื่อ = "' .  $RELIGION_NAME . '" ปีการศึกษา = "' . $EducationYear . '" ภาคเรียน = "' .  $Semester . '" โรงเรียน = "' . $SchoolNameThai . '"',
                'LogUserID' => $UserID,
                'LogUsername' => $UserName ,
                'LogIpAddress' => $UserIPAddress,
                'LogCreation' => date('Y-m-d H:i:s')
            ];

            $logresult = $this->db->insert('SYS_LOG', $log);

            $this->session->set_flashdata('success',"ลบข้อมูลสำเร็จ");
            redirect(base_url('list-area_identity_by_school?sid='.$SchoolID));
        }else{
            $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการลบข้อมูล");
            redirect(base_url('list-area_identity_by_school?sid='.$SchoolID));
        }
        
    }
//////////////////// OCCUPATION ///////////////////
    public function forms_OCCUPATION() {
        $data = array();
        $data = $this->session->userdata();
        
        if (!empty($data['UserRights'])) {
			//'501000', 'ข้อมูลอัตลักษณ์ของแต่ละพื้นที่'
			$R_501000 = $data['UserRights'][array_search('501000', array_column($data['UserRights'], 'UR_Code'))];
			$data['R_501000'] = $R_501000;
		} else {
			$data['R_501000'] = NULL;
		}
        
        if ( ! file_exists(APPPATH.'views/pages/forms/Area_Identity/forms-OCCUPATION.php'))
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
        $this->load->view('pages/forms/Area_Identity/forms-OCCUPATION',$data);
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
                $school = $this->School_model->get_school($SchoolID);  
                $SchoolNameThai = $school[0]->SchoolNameThai ; 

                $oc = $this->Area_identitty_model->get_OCCUPATION_byCode($SchoolID, $EducationYear, $Semester,  $this->input->post('AreaOccupationCode'));  
                $OCCUPATION_NAME = $oc[0]->OCCUPATION_NAME ; 

                $UserID = $this->session->userdata('UserID');
                $UserIPAddress = $this->session->userdata('UserIPAddress');
                $UserName = $this->session->userdata('UserName');
    
                $log = [
                    'LogMessage' => 'เพิ่มอาชีพ ชื่อ = "' .  $OCCUPATION_NAME . '" ปีการศึกษา = "' . $EducationYear . '" ภาคเรียน = "' .  $Semester . '" โรงเรียน = "' . $SchoolNameThai . '"',
                    'LogUserID' => $UserID,
                    'LogUsername' => $UserName ,
                    'LogIpAddress' => $UserIPAddress,
                    'LogCreation' => date('Y-m-d H:i:s')
                ];
    
                $logresult = $this->db->insert('SYS_LOG', $log);

                $this->session->set_flashdata('success',"บันทึกข้อมูลสำเร็จ");
                redirect(base_url('list-area_identity_by_school?sid='.$SchoolID));
            }else{
                $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการบันทึกข้อมูล");
                redirect(base_url('forms-OCCUPATION?sid='.$SchoolID . '&&y='. $EducationYear . '&&s='. $Semester));
            }
        
    }
    
    public function edit_forms_OCCUPATION() {
        $data = array();
        $data = $this->session->userdata();
        
        if (!empty($data['UserRights'])) {
			//'501000', 'ข้อมูลอัตลักษณ์ของแต่ละพื้นที่'
			$R_501000 = $data['UserRights'][array_search('501000', array_column($data['UserRights'], 'UR_Code'))];
			$data['R_501000'] = $R_501000;
		} else {
			$data['R_501000'] = NULL;
		}
        
        if ( ! file_exists(APPPATH.'views/pages/forms/Area_Identity/edit_forms-OCCUPATION.php'))
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
        $this->load->view('pages/forms/Area_Identity/edit_forms-OCCUPATION',$data);
        $this->load->view('templates/footer');

    }

    public function edit_OCCUPATION() {
       
        $SchoolID  = $this->input->post('SchoolID');
        $EducationYear = $this->input->post('EducationYear');
        $Semester = $this->input->post('Semester');
        $AreaOccupationCode = $this->input->post('OLDAreaOccupationCode');

        $oc = $this->Area_identitty_model->get_OCCUPATION_byCode($SchoolID, $EducationYear, $Semester, $AreaOccupationCode);  
        $OCCUPATION_NAME = $oc[0]->OCCUPATION_NAME ; 
        
        $OCCUPATION = [
            'AreaOccupationCode' => $this->input->post('AreaOccupationCode'),
            'AreaOccupationPercentage' => $this->input->post('AreaOccupationPercentage'),
        ];

        $result =  $this->Area_identitty_model->update_OCCUPATION($SchoolID, $EducationYear, $Semester,$AreaOccupationCode, $OCCUPATION);
   
        if($result == 1){
            $school = $this->School_model->get_school($SchoolID);  
            $SchoolNameThai = $school[0]->SchoolNameThai ; 



            $UserID = $this->session->userdata('UserID');
            $UserIPAddress = $this->session->userdata('UserIPAddress');
            $UserName = $this->session->userdata('UserName');

            $log = [
                'LogMessage' => 'แก้ไขอาชีพ ชื่อ = "' .  $OCCUPATION_NAME . '" ปีการศึกษา = "' . $EducationYear . '" ภาคเรียน = "' .  $Semester . '" โรงเรียน = "' . $SchoolNameThai . '"',
                'LogUserID' => $UserID,
                'LogUsername' => $UserName ,
                'LogIpAddress' => $UserIPAddress,
                'LogCreation' => date('Y-m-d H:i:s')
            ];

            $logresult = $this->db->insert('SYS_LOG', $log);

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

        $oc = $this->Area_identitty_model->get_OCCUPATION_byCode($SchoolID, $EducationYear, $Semester, $AreaOccupationCode);  
        $OCCUPATION_NAME = $oc[0]->OCCUPATION_NAME ; 

        $result =$this->Area_identitty_model-> delete_OCCUPATION($EducationYear, $Semester, $SchoolID, $AreaOccupationCode);
        if($result == 1 ){
            $school = $this->School_model->get_school($SchoolID);  
            $SchoolNameThai = $school[0]->SchoolNameThai ; 

            $UserID = $this->session->userdata('UserID');
            $UserIPAddress = $this->session->userdata('UserIPAddress');
            $UserName = $this->session->userdata('UserName');

            $log = [
                'LogMessage' => 'ลบอาชีพ ชื่อ = "' .  $OCCUPATION_NAME . '" ปีการศึกษา = "' . $EducationYear . '" ภาคเรียน = "' .  $Semester . '" โรงเรียน = "' . $SchoolNameThai . '"',
                'LogUserID' => $UserID,
                'LogUsername' => $UserName ,
                'LogIpAddress' => $UserIPAddress,
                'LogCreation' => date('Y-m-d H:i:s')
            ];

            $logresult = $this->db->insert('SYS_LOG', $log);

            $this->session->set_flashdata('success',"ลบข้อมูลสำเร็จ");
            redirect(base_url('list-area_identity_by_school?sid='.$SchoolID));
        }else{
            $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการลบข้อมูล");
            redirect(base_url('list-area_identity_by_school?sid='.$SchoolID));
        }
        
    }

}