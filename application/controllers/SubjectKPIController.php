<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once '_sandboxcontroller.php';

class SubjectKPIController extends _sandboxcontroller{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        // Your own constructor code
        $this->load->library('session');
        $this->load->model('Curriculum_model');
        $this->load->model('School_model');
        $this->load->model('Code_model');
        $this->load->model('Student_model');
        $this->load->model('SubjectKPI_model');

    }

#### subject_group   
    public function list_subject_group() {
        $data = array();
        $data = $this->session->userdata();

		if (!empty($data['UserRights'])) {
			//'200000', 'ข้อมูลหลักสูตร/หลักสูตรพื้นที่นวัตกรรม'
			$R_200000 = $data['UserRights'][array_search('200000', array_column($data['UserRights'], 'UR_Code'))];
			$data['R_200000'] = $R_200000;
		} else {
			$data['R_200000'] = NULL;
		}


        $data['listSubjectGroup'] = $this->SubjectKPI_model->get_subject_group_All();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/SubjectKPI/list-subject_group', $data);
        $this->load->view('templates/footer', $data);

    }


    public function forms_subject_group() {
        $data = array();
        $data = $this->session->userdata();
        
        if (!empty($data['UserRights'])) {
            //'200000', 'ข้อมูลหลักสูตร/หลักสูตรพื้นที่นวัตกรรม'
            $R_200000 = $data['UserRights'][array_search('200000', array_column($data['UserRights'], 'UR_Code'))];
            $data['R_200000'] = $R_200000;
        } else {
            $data['R_200000'] = NULL;
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/SubjectKPI/forms-subject_group', $data);
        $this->load->view('templates/footer', $data);

    }

    public function add_subject_group() {
               
            $subject_group = [
                #'SUBJECT_GROUP_CODE' => $this->input->post('SUBJECT_GROUP_CODE'),
                'SUBJECT_GROUP_NAME' => $this->input->post('SUBJECT_GROUP_NAME'),
            ];

            $result =  $this->SubjectKPI_model->insert_subject_group($subject_group);

            if($result == 1){
    
                $UserID = $this->session->userdata('UserID');
                $UserIPAddress = $this->session->userdata('UserIPAddress');
                $UserName = $this->session->userdata('UserName');

                $log = [
                    'LogMessage' => 'เพิ่มข้อมูลกลุ่มสาระการเรียนรู้ ชื่อ = "' . $this->input->post('SUBJECT_GROUP_NAME') . '"',
                    'LogUserID' => $UserID,
                    'LogUsername' => $UserName ,
                    'LogIpAddress' => $UserIPAddress,
                    'LogCreation' => date('Y-m-d H:i:s')
                ];
    
                $logresult = $this->db->insert('SYS_LOG', $log);

                $this->session->set_flashdata('success',"บันทึกข้อมูลสำเร็จ");
                redirect(base_url('list-subject_group'));
            }else{
                $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการบันทึกข้อมูล");
                redirect(base_url('forms-subject_group'));
            }
        
    }

    public function edit_forms_subject_group() {
        $data = array();
        $data = $this->session->userdata();
        
        if (!empty($data['UserRights'])) {
            //'200000', 'ข้อมูลหลักสูตร/หลักสูตรพื้นที่นวัตกรรม'
            $R_200000 = $data['UserRights'][array_search('200000', array_column($data['UserRights'], 'UR_Code'))];
            $data['R_200000'] = $R_200000;
        } else {
            $data['R_200000'] = NULL;
        }

        $data['SUBJECT_GROUP_CODE'] = $_GET['gid']; 
        $data['SubjectGroup'] = $this->SubjectKPI_model->get_subject_group($data['SUBJECT_GROUP_CODE'] );


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/SubjectKPI/edit_forms-subject_group', $data);
        $this->load->view('templates/footer', $data);

    }

    public function edit_subject_group() {
        $SUBJECT_GROUP_CODE = $this->input->post('SUBJECT_GROUP_CODE'); 
   
        $subject_group = [
            #'SUBJECT_GROUP_CODE' => $this->input->post('SUBJECT_GROUP_CODE'),
            'SUBJECT_GROUP_NAME' => $this->input->post('SUBJECT_GROUP_NAME'),
        ];

        $result =  $this->SubjectKPI_model->update_subject_group($SUBJECT_GROUP_CODE, $subject_group);
       
        if($result == 1){
          
            $UserID = $this->session->userdata('UserID');
            $UserIPAddress = $this->session->userdata('UserIPAddress');
            $UserName = $this->session->userdata('UserName');

            $log = [
                'LogMessage' => 'แก้ไขกลุ่มสาระการเรียนรู้ ชื่อ = "' .$this->input->post('SUBJECT_GROUP_NAME') . '"',
                'LogUserID' => $UserID,
                'LogUsername' => $UserName ,
                'LogIpAddress' => $UserIPAddress,
                'LogCreation' => date('Y-m-d H:i:s')
            ];

            $logresult = $this->db->insert('SYS_LOG', $log);

            $this->session->set_flashdata('success',"แก้ไขข้อมูลสำเร็จ");
            redirect(base_url('list-subject_group'));
        }else{
            $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการบันทึกข้อมูล");
            redirect(base_url('edit_forms-subject_group?gid='.$SUBJECT_GROUP_CODE));
        }
    
    }
    public function delete_subject_group( $SUBJECT_GROUP_CODE){


        $result =$this->SubjectKPI_model->delete_subject_group($SUBJECT_GROUP_CODE);
        if($result == 1 ){

            $UserID = $this->session->userdata('UserID');
            $UserIPAddress = $this->session->userdata('UserIPAddress');
            $UserName = $this->session->userdata('UserName');

            $log = [
                'LogMessage' => 'ลบกลุ่มสาระการเรียนรู้ รหัส = "' . $SUBJECT_GROUP_CODE . '"',
                'LogUserID' => $UserID,
                'LogUsername' => $UserName ,
                'LogIpAddress' => $UserIPAddress,
                'LogCreation' => date('Y-m-d H:i:s')
            ];

            $logresult = $this->db->insert('SYS_LOG', $log);

            $this->session->set_flashdata('success',"ลบข้อมูลสำเร็จ");
            redirect(base_url('list-subject_group'));
        }else{
            $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการลบข้อมูล");
            redirect(base_url('list-subject_group'));
        }
        
    }

#### lc  
    public function list_lc() {
        $data = array();
        $data = $this->session->userdata();

		if (!empty($data['UserRights'])) {
			//'200000', 'ข้อมูลหลักสูตร/หลักสูตรพื้นที่นวัตกรรม'
			$R_200000 = $data['UserRights'][array_search('200000', array_column($data['UserRights'], 'UR_Code'))];
			$data['R_200000'] = $R_200000;
		} else {
			$data['R_200000'] = NULL;
		}

        $data['SUBJECT_GROUP_CODE'] = $_GET['gid']; 
        $SubjectGroup = $this->SubjectKPI_model->get_subject_group($data['SUBJECT_GROUP_CODE'] );
        $data['SUBJECT_GROUP_NAME'] =  $SubjectGroup[0] -> SUBJECT_GROUP_NAME ;

        $data['listLC'] = $this->SubjectKPI_model->get_lc_All( $data['SUBJECT_GROUP_CODE']);
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/SubjectKPI/list-lc', $data);
        $this->load->view('templates/footer', $data);

    }

    public function forms_lc() {
        $data = array();
        $data = $this->session->userdata();
        
        if (!empty($data['UserRights'])) {
            //'200000', 'ข้อมูลหลักสูตร/หลักสูตรพื้นที่นวัตกรรม'
            $R_200000 = $data['UserRights'][array_search('200000', array_column($data['UserRights'], 'UR_Code'))];
            $data['R_200000'] = $R_200000;
        } else {
            $data['R_200000'] = NULL;
        }
        
        $data['SUBJECT_GROUP_CODE'] = $_GET['gid']; 
        $SubjectGroup = $this->SubjectKPI_model->get_subject_group($data['SUBJECT_GROUP_CODE'] );
        $data['SUBJECT_GROUP_NAME'] =  $SubjectGroup[0] -> SUBJECT_GROUP_NAME ;     

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/SubjectKPI/forms-lc', $data);
        $this->load->view('templates/footer', $data);

    }

    public function add_lc() {
        $SUBJECT_GROUP_CODE = $this->input->post('SUBJECT_GROUP_CODE'); 
        $count_STD = $this->input->post('total_STD');

        $result = -1;
        for($i=1;$i<=$count_STD;$i++){
            $lc = [
                'SUBJECT_STD_ID' => $this->input->post('SUBJECT_STD_ID'.$i),
                'SUBJECT_STD_DETAILS' => $this->input->post('SUBJECT_STD_DETAILS'.$i),
                'SUBJECT_GROUP_CODE' => $this->input->post('SUBJECT_GROUP_CODE'),
                'LC_ID' => $this->input->post('LC_ID'),
                'LC_NAME' => $this->input->post('LC_NAME'),
            ];
    
            $result =  $this->SubjectKPI_model->insert_lc($lc);
        }
       
        if($result == 1){

            $UserID = $this->session->userdata('UserID');
            $UserIPAddress = $this->session->userdata('UserIPAddress');
            $UserName = $this->session->userdata('UserName');

            $log = [
                'LogMessage' => 'เพิ่มข้อมูลสาระการเรียนรู้ ชื่อ = "' . $this->input->post('SUBJECT_STD_ID') . '"',
                'LogUserID' => $UserID,
                'LogUsername' => $UserName ,
                'LogIpAddress' => $UserIPAddress,
                'LogCreation' => date('Y-m-d H:i:s')
            ];

            $logresult = $this->db->insert('SYS_LOG', $log);

            $this->session->set_flashdata('success',"บันทึกข้อมูลสำเร็จ");
            redirect(base_url('list-lc?gid='. $SUBJECT_GROUP_CODE));
        }else{
            $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการบันทึกข้อมูล");
            redirect(base_url('forms-lc?gid='. $SUBJECT_GROUP_CODE));
        }
    
    }

    public function edit_forms_lc() {
        $data = array();
        $data = $this->session->userdata();
        
        if (!empty($data['UserRights'])) {
            //'200000', 'ข้อมูลหลักสูตร/หลักสูตรพื้นที่นวัตกรรม'
            $R_200000 = $data['UserRights'][array_search('200000', array_column($data['UserRights'], 'UR_Code'))];
            $data['R_200000'] = $R_200000;
        } else {
            $data['R_200000'] = NULL;
        }

        $data['SUBJECT_GROUP_CODE'] = $_GET['gid']; 
        $SubjectGroup = $this->SubjectKPI_model->get_subject_group($data['SUBJECT_GROUP_CODE'] );
        $data['SUBJECT_GROUP_NAME'] =  $SubjectGroup[0] -> SUBJECT_GROUP_NAME ;  

        $data['LC_ID'] = $_GET['lc']; 
        $data['lc'] = $this->SubjectKPI_model->get_STD_by_lc($data['LC_ID'], $data['SUBJECT_GROUP_CODE'] );
        $data['LC_NAME'] = $data['lc'][0] -> LC_NAME ;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/SubjectKPI/edit_forms-lc', $data);
        $this->load->view('templates/footer', $data);

    }

    public function edit_lc() {
        $SUBJECT_GROUP_CODE = $this->input->post('SUBJECT_GROUP_CODE'); 
        $LC_ID = $this->input->post('LC_ID'); 
   
        $lc = [
            'LC_NAME' => $this->input->post('LC_NAME'),
        ];

        $result =  $this->SubjectKPI_model->update_lc($SUBJECT_GROUP_CODE, $LC_ID, $lc);
       
        if($result == 1){
          
            $UserID = $this->session->userdata('UserID');
            $UserIPAddress = $this->session->userdata('UserIPAddress');
            $UserName = $this->session->userdata('UserName');

            $log = [
                'LogMessage' => 'แก้ไขสาระการเรียนรู้ ชื่อ = "' .$this->input->post('LC_NAME') . '"',
                'LogUserID' => $UserID,
                'LogUsername' => $UserName ,
                'LogIpAddress' => $UserIPAddress,
                'LogCreation' => date('Y-m-d H:i:s')
            ];

            $logresult = $this->db->insert('SYS_LOG', $log);

            $this->session->set_flashdata('success',"แก้ไขข้อมูลสำเร็จ");
            redirect(base_url('list-lc?gid='. $SUBJECT_GROUP_CODE));
        }else{
            $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการบันทึกข้อมูล");
            redirect(base_url('edit_forms-lc?gid='.$SUBJECT_GROUP_CODE .'&&lc=' .$LC_ID));
        }
    
    }


    public function delete_lc($LC_ID, $SUBJECT_GROUP_CODE){
        $list_lc = $this->SubjectKPI_model->get_STD_by_lc($LC_ID, $SUBJECT_GROUP_CODE );
        for($i=0;$i<count($list_lc);$i++){

            $result =$this->SubjectKPI_model->delete_lc( $list_lc[$i]->SUBJECT_STD_ID);

        }

            $lc = $this->SubjectKPI_model->get_STD_by_lc($LC_ID, $SUBJECT_GROUP_CODE );
            $LC_NAME =  $lc[0] -> LC_NAME ;     

            $UserID = $this->session->userdata('UserID');
            $UserIPAddress = $this->session->userdata('UserIPAddress');
            $UserName = $this->session->userdata('UserName');

            $log = [
                'LogMessage' => 'ลบสาระการเรียนรู้ ชื่อ = "' . $LC_NAME . '"',
                'LogUserID' => $UserID,
                'LogUsername' => $UserName ,
                'LogIpAddress' => $UserIPAddress,
                'LogCreation' => date('Y-m-d H:i:s')
            ];

            $logresult = $this->db->insert('SYS_LOG', $log);

            $this->session->set_flashdata('success',"ลบข้อมูลสำเร็จ");
            redirect(base_url('list-lc?gid='. $SUBJECT_GROUP_CODE));

    }

#### STD 

public function forms_std() {
    $data = array();
    $data = $this->session->userdata();
    
    if (!empty($data['UserRights'])) {
        //'200000', 'ข้อมูลหลักสูตร/หลักสูตรพื้นที่นวัตกรรม'
        $R_200000 = $data['UserRights'][array_search('200000', array_column($data['UserRights'], 'UR_Code'))];
        $data['R_200000'] = $R_200000;
    } else {
        $data['R_200000'] = NULL;
    }
    
    $data['SUBJECT_GROUP_CODE'] = $_GET['gid']; 
    $SubjectGroup = $this->SubjectKPI_model->get_subject_group($data['SUBJECT_GROUP_CODE'] );
    $data['SUBJECT_GROUP_NAME'] =  $SubjectGroup[0] -> SUBJECT_GROUP_NAME ;     

    $data['LC_ID'] = $_GET['lc']; 
    $data['lc'] = $this->SubjectKPI_model->get_STD_by_lc($data['LC_ID'], $data['SUBJECT_GROUP_CODE'] );
    $data['LC_NAME'] = $data['lc'][0] -> LC_NAME ;

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('pages/forms/SubjectKPI/forms-std', $data);
    $this->load->view('templates/footer', $data);

}

public function add_std() {
    $SUBJECT_GROUP_CODE = $this->input->post('SUBJECT_GROUP_CODE'); 
    $LC_ID = $this->input->post('LC_ID');

    $std = [
        'SUBJECT_STD_ID' => $this->input->post('SUBJECT_STD_ID'.$i),
        'SUBJECT_STD_DETAILS' => $this->input->post('SUBJECT_STD_DETAILS'.$i),
        'SUBJECT_GROUP_CODE' => $this->input->post('SUBJECT_GROUP_CODE'),
        'LC_ID' => $this->input->post('LC_ID'),
        'LC_NAME' => $this->input->post('LC_NAME'),
    ];

    $result =  $this->SubjectKPI_model->insert_lc($std);
   
    if($result == 1){

        $UserID = $this->session->userdata('UserID');
        $UserIPAddress = $this->session->userdata('UserIPAddress');
        $UserName = $this->session->userdata('UserName');

        $log = [
            'LogMessage' => 'เพิ่มข้อมูลมาตรฐานการเรียนรู้ รหัส = "' . $this->input->post('SUBJECT_STD_ID') . '"',
            'LogUserID' => $UserID,
            'LogUsername' => $UserName ,
            'LogIpAddress' => $UserIPAddress,
            'LogCreation' => date('Y-m-d H:i:s')
        ];

        $logresult = $this->db->insert('SYS_LOG', $log);

        $this->session->set_flashdata('success',"บันทึกข้อมูลสำเร็จ");
        redirect(base_url('list-lc?gid='. $SUBJECT_GROUP_CODE));
    }else{
        $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการบันทึกข้อมูล");
        redirect(base_url('forms-std?gid='. $SUBJECT_GROUP_CODE .'&&lc=' .$LC_ID));
    }

}

public function edit_forms_std() {
    $data = array();
    $data = $this->session->userdata();
    
    if (!empty($data['UserRights'])) {
        //'200000', 'ข้อมูลหลักสูตร/หลักสูตรพื้นที่นวัตกรรม'
        $R_200000 = $data['UserRights'][array_search('200000', array_column($data['UserRights'], 'UR_Code'))];
        $data['R_200000'] = $R_200000;
    } else {
        $data['R_200000'] = NULL;
    }

    $data['SUBJECT_GROUP_CODE'] = $this->input->post('SUBJECT_GROUP_CODE'); 
    $SubjectGroup = $this->SubjectKPI_model->get_subject_group($data['SUBJECT_GROUP_CODE'] );
    $data['SUBJECT_GROUP_NAME'] =  $SubjectGroup[0] -> SUBJECT_GROUP_NAME ;  

    $data['SUBJECT_STD_ID'] = $this->input->post('SUBJECT_STD_ID');
    $data['std'] = $this->SubjectKPI_model->get_STD($data['SUBJECT_STD_ID'] );
   
    $data['LC_ID'] =  $this->input->post('LC_ID'); 
    $data['lc'] = $this->SubjectKPI_model->get_STD_by_lc($data['LC_ID'], $data['SUBJECT_GROUP_CODE'] );
    $data['LC_NAME'] = $data['lc'][0] -> LC_NAME ;

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('pages/forms/SubjectKPI/edit_forms-std', $data);
    $this->load->view('templates/footer', $data);
}

public function edit_std() {
    $SUBJECT_GROUP_CODE = $this->input->post('SUBJECT_GROUP_CODE'); 
    $LC_ID = $this->input->post('LC_ID'); 
    $LC_NAME =  $this->input->post('LC_NAME'); 
    $OLD_SUBJECT_STD_ID = $this->input->post('OLD_SUBJECT_STD_ID'); 

    $std = [
        'SUBJECT_STD_ID' => $this->input->post('SUBJECT_STD_ID'.$i),
        'SUBJECT_STD_DETAILS' => $this->input->post('SUBJECT_STD_DETAILS'.$i)
    ];

    $result =  $this->SubjectKPI_model->update_std($OLD_SUBJECT_STD_ID, $std);
   
    if($result == 1){
      
        $UserID = $this->session->userdata('UserID');
        $UserIPAddress = $this->session->userdata('UserIPAddress');
        $UserName = $this->session->userdata('UserName');

        $log = [
            'LogMessage' => 'แก้ไขมาตรฐานการเรียนรู้ รหัส = "' .$this->input->post('SUBJECT_STD_ID') . '"',
            'LogUserID' => $UserID,
            'LogUsername' => $UserName ,
            'LogIpAddress' => $UserIPAddress,
            'LogCreation' => date('Y-m-d H:i:s')
        ];

        $logresult = $this->db->insert('SYS_LOG', $log);

        $this->session->set_flashdata('success',"แก้ไขข้อมูลสำเร็จ");
        redirect(base_url('list-lc?gid='. $SUBJECT_GROUP_CODE));
    }else{
        $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการบันทึกข้อมูล");
        redirect(base_url('list-lc?gid='. $SUBJECT_GROUP_CODE));
    }

}

public function delete_std(){
    $SUBJECT_STD_ID =  $this->input->post('SUBJECT_STD_ID'); 
    $SUBJECT_GROUP_CODE = $this->input->post('SUBJECT_GROUP_CODE'); 

    $result =$this->SubjectKPI_model->delete_lc($SUBJECT_STD_ID);
    if($result == 1 ){

        $UserID = $this->session->userdata('UserID');
        $UserIPAddress = $this->session->userdata('UserIPAddress');
        $UserName = $this->session->userdata('UserName');

        $log = [
            'LogMessage' => 'ลบมาตรฐานการเรียนรู้ รหัส = "' . $SUBJECT_STD_ID . '"',
            'LogUserID' => $UserID,
            'LogUsername' => $UserName ,
            'LogIpAddress' => $UserIPAddress,
            'LogCreation' => date('Y-m-d H:i:s')
        ];

        $logresult = $this->db->insert('SYS_LOG', $log);

        $this->session->set_flashdata('success',"ลบข้อมูลสำเร็จ");
        redirect(base_url('list-lc?gid='. $SUBJECT_GROUP_CODE));
    }else{
        $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการลบข้อมูล");
        redirect(base_url('list-lc?gid='. $SUBJECT_GROUP_CODE));
    }
    
}

#### kpi  
public function list_kpi() {
    $data = array();
    $data = $this->session->userdata();

    if (!empty($data['UserRights'])) {
        //'200000', 'ข้อมูลหลักสูตร/หลักสูตรพื้นที่นวัตกรรม'
        $R_200000 = $data['UserRights'][array_search('200000', array_column($data['UserRights'], 'UR_Code'))];
        $data['R_200000'] = $R_200000;
    } else {
        $data['R_200000'] = NULL;
    }

    $data['SUBJECT_GROUP_CODE'] = $_GET['gid']; 
    $data['SUBJECT_KPI_YEAR'] = $_GET['y']; 
    $data['LC_ID'] = $_GET['lc']; 


    $data['listkpi'] = $this->SubjectKPI_model->get_kpi_All_By_LC( $data['SUBJECT_GROUP_CODE'], $data['SUBJECT_KPI_YEAR'],  $data['LC_ID']);

    if($data['listkpi']==null){
        $data['SUBJECT_GROUP_CODE'] = $_GET['gid']; 
        $data['SUBJECT_KPI_YEAR'] = $_GET['y'];
        $data['LC_ID'] = $_GET['lc'];

        $SUBJECT_GROUP = $this->Curriculum_model->get_SUBJECT_GROUP_CODE( $data['SUBJECT_GROUP_CODE'] );
        $GRADE_LEVEL = $this->Code_model->get_GradeLevel( $data['SUBJECT_KPI_YEAR']) ;
        $data['GRADE_LEVEL_NAME'] =  $GRADE_LEVEL[0] -> GRADE_LEVEL_NAME ;
        $data['SUBJECT_GROUP_NAME'] =  $SUBJECT_GROUP[0] -> SUBJECT_GROUP_NAME ;

        $listLC = $this->SubjectKPI_model->get_lc_All( $data['SUBJECT_GROUP_CODE']);
        if($listLC==null){
            $data['LC_NAME'] =  '-';
        }else{
            $data['LC_NAME'] =  $listLC[0] -> LC_NAME ;
        }


    }else{
        $data['SUBJECT_GROUP_CODE'] = $data['listkpi'][0] ->SUBJECT_GROUP_CODE ;
        $data['SUBJECT_KPI_YEAR'] = $data['listkpi'][0] ->SUBJECT_KPI_YEAR ;
        $data['LC_ID'] = $data['listkpi'][0] -> LC_ID ;

        $data['GRADE_LEVEL_NAME'] = $data['listkpi'][0] ->GRADE_LEVEL_NAME ;
        $data['SUBJECT_GROUP_NAME'] =  $data['listkpi'][0] ->SUBJECT_GROUP_NAME ;
        $data['LC_NAME'] =  $data['listkpi'][0] -> LC_NAME ;

    }

  
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('pages/dashboard/SubjectKPI/list-kpi'  , $data);
    $this->load->view('templates/footer', $data);

}

public function forms_kpi() {
    $data = array();
    $data = $this->session->userdata();
    
    if (!empty($data['UserRights'])) {
        //'200000', 'ข้อมูลหลักสูตร/หลักสูตรพื้นที่นวัตกรรม'
        $R_200000 = $data['UserRights'][array_search('200000', array_column($data['UserRights'], 'UR_Code'))];
        $data['R_200000'] = $R_200000;
    } else {
        $data['R_200000'] = NULL;
    }

    $data['SUBJECT_GROUP_CODE'] = $_GET['gid']; 
    $data['SUBJECT_KPI_YEAR'] = $_GET['y']; 
    $data['LC_ID'] = $_GET['lc']; 

    $SUBJECT_GROUP = $this->Curriculum_model->get_SUBJECT_GROUP_CODE( $data['SUBJECT_GROUP_CODE'] );
    $GRADE_LEVEL = $this->Code_model->  get_GradeLevel( $data['SUBJECT_KPI_YEAR']) ;
    $data['GRADE_LEVEL_NAME'] =  $GRADE_LEVEL[0] -> GRADE_LEVEL_NAME ;
    $data['SUBJECT_GROUP_NAME'] =  $SUBJECT_GROUP[0] -> SUBJECT_GROUP_NAME ;

    $listLC = $this->SubjectKPI_model->get_STD_by_lc($data['LC_ID'], $data['SUBJECT_GROUP_CODE']);
    $data['LC_NAME'] =  $listLC[0] -> LC_NAME ;


    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('pages/forms/SubjectKPI/forms-kpi', $data);
    $this->load->view('templates/footer', $data);

}


public function add_kpi() {
    $SUBJECT_GROUP_CODE =  $this->input->post('SUBJECT_GROUP_CODE'); 
    $SUBJECT_KPI_YEAR =  $this->input->post('SUBJECT_KPI_YEAR'); 
    $LC_ID = $this->input->post('LC_ID'); 

               
    $SUBJECT_KPI = [
        'SUBJECT_KPI_ID' => $this->input->post('SUBJECT_KPI_ID'),
        'SUBJECT_STD_ID' => $this->input->post('SUBJECT_STD_ID'),
        'SUBJECT_KPI_DETAIL' => $this->input->post('SUBJECT_KPI_DETAIL'),
        'SUBJECT_KPI_YEAR' => $SUBJECT_KPI_YEAR,
       // 'SUBJECT_LC_STD' => $this->input->post('SUBJECT_LC_STD'),

    ];

    $result =  $this->SubjectKPI_model->insert_kpi($SUBJECT_KPI);

    if($result == 1){

        $UserID = $this->session->userdata('UserID');
        $UserIPAddress = $this->session->userdata('UserIPAddress');
        $UserName = $this->session->userdata('UserName');

        $log = [
            'LogMessage' => 'เพิ่มข้อมูลตัวชี้วัดชั้นปี รหัส = "' . $this->input->post('SUBJECT_KPI_ID') . '"',
            'LogUserID' => $UserID,
            'LogUsername' => $UserName ,
            'LogIpAddress' => $UserIPAddress,
            'LogCreation' => date('Y-m-d H:i:s')
        ];

        $logresult = $this->db->insert('SYS_LOG', $log);

        $this->session->set_flashdata('success',"บันทึกข้อมูลสำเร็จ");
        redirect(base_url('list-kpi?gid='.$SUBJECT_GROUP_CODE .'&&y=' .$SUBJECT_KPI_YEAR .'&&lc=' .$LC_ID));
    }else{
        $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการบันทึกข้อมูล");
        redirect(base_url('forms-kpi?gid='.$SUBJECT_GROUP_CODE .'&&y=' .$SUBJECT_KPI_YEAR .'&&lc=' .$LC_ID ));
    }

}

public function delete_kpi(){
    $SUBJECT_KPI_ID =  $this->input->post('SUBJECT_KPI_ID'); 
    $SUBJECT_GROUP_CODE =  $this->input->post('SUBJECT_GROUP_CODE'); 
    $SUBJECT_KPI_YEAR =  $this->input->post('SUBJECT_KPI_YEAR'); 
    $LC_ID =  $this->input->post('LC_ID'); 



    $result =$this->SubjectKPI_model->delete_kpi($SUBJECT_KPI_ID);
    if($result == 1 ){

        $UserID = $this->session->userdata('UserID');
        $UserIPAddress = $this->session->userdata('UserIPAddress');
        $UserName = $this->session->userdata('UserName');

        $log = [
            'LogMessage' => 'ลบตัวชี้วัดชั้นปี รหัส = "' . $SUBJECT_KPI_ID . '"',
            'LogUserID' => $UserID,
            'LogUsername' => $UserName ,
            'LogIpAddress' => $UserIPAddress,
            'LogCreation' => date('Y-m-d H:i:s')
        ];

        $logresult = $this->db->insert('SYS_LOG', $log);

        $this->session->set_flashdata('success',"ลบข้อมูลสำเร็จ");
        redirect(base_url('list-kpi?gid='.$SUBJECT_GROUP_CODE .'&&y=' .$SUBJECT_KPI_YEAR .'&&lc=' .$LC_ID));
    }else{
        $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการลบข้อมูล");
        redirect(base_url('list-kpi?gid='.$SUBJECT_GROUP_CODE .'&&y=' .$SUBJECT_KPI_YEAR.'&&lc=' .$LC_ID));
    }
    
}

public function edit_forms_kpi() {
    $data = array();
    $data = $this->session->userdata();
    
    if (!empty($data['UserRights'])) {
        //'200000', 'ข้อมูลหลักสูตร/หลักสูตรพื้นที่นวัตกรรม'
        $R_200000 = $data['UserRights'][array_search('200000', array_column($data['UserRights'], 'UR_Code'))];
        $data['R_200000'] = $R_200000;
    } else {
        $data['R_200000'] = NULL;
    }

    $data['SUBJECT_GROUP_CODE'] = $_GET['gid']; 
    $data['SUBJECT_KPI_YEAR'] = $_GET['y']; 
    $SUBJECT_KPI_ID = $_GET['kid']; 
    $data['LC_ID'] = $_GET['lc']; 


    $SUBJECT_GROUP = $this->Curriculum_model->get_SUBJECT_GROUP_CODE( $data['SUBJECT_GROUP_CODE'] );
    $GRADE_LEVEL = $this->Code_model->  get_GradeLevel( $data['SUBJECT_KPI_YEAR']) ;
    $data['GRADE_LEVEL_NAME'] =  $GRADE_LEVEL[0] -> GRADE_LEVEL_NAME ;
    $data['SUBJECT_GROUP_NAME'] =  $SUBJECT_GROUP[0] -> SUBJECT_GROUP_NAME ;

    $listLC = $this->SubjectKPI_model->get_STD_by_lc($data['LC_ID'], $data['SUBJECT_GROUP_CODE']);
    $data['LC_NAME'] =  $listLC[0] -> LC_NAME ;


    $data['KPI'] = $this->SubjectKPI_model->get_kpi($SUBJECT_KPI_ID );


    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('pages/forms/SubjectKPI/edit_forms-kpi', $data);
    $this->load->view('templates/footer', $data);

}

public function edit_kpi() {
    $SUBJECT_GROUP_CODE =  $this->input->post('SUBJECT_GROUP_CODE'); 
    $SUBJECT_KPI_YEAR =  $this->input->post('SUBJECT_KPI_YEAR'); 
    $OLD_SUBJECT_KPI_ID =  $this->input->post('OLD_SUBJECT_KPI_ID'); 
    $LC_ID = $this->input->post('LC_ID'); 
               
    $SUBJECT_KPI = [
        'SUBJECT_KPI_ID' => $this->input->post('SUBJECT_KPI_ID'),
        'SUBJECT_STD_ID' => $this->input->post('SUBJECT_STD_ID'),
        'SUBJECT_KPI_DETAIL' => $this->input->post('SUBJECT_KPI_DETAIL'),
        'SUBJECT_KPI_YEAR' => $SUBJECT_KPI_YEAR,
       // 'SUBJECT_LC_STD' => $this->input->post('SUBJECT_LC_STD'),

    ];

    $result =  $this->SubjectKPI_model->update_kpi( $OLD_SUBJECT_KPI_ID, $SUBJECT_KPI);
   
    if($result == 1){
      
        $UserID = $this->session->userdata('UserID');
        $UserIPAddress = $this->session->userdata('UserIPAddress');
        $UserName = $this->session->userdata('UserName');

        $log = [
            'LogMessage' => 'แก้ไขตัวชี้วัดชั้นปี รหัส = "' .$OLD_SUBJECT_KPI_ID . '"',
            'LogUserID' => $UserID,
            'LogUsername' => $UserName ,
            'LogIpAddress' => $UserIPAddress,
            'LogCreation' => date('Y-m-d H:i:s')
        ];

        $logresult = $this->db->insert('SYS_LOG', $log);

        $this->session->set_flashdata('success',"แก้ไขข้อมูลสำเร็จ");
        redirect(base_url('list-kpi?gid='.$SUBJECT_GROUP_CODE .'&&y=' .$SUBJECT_KPI_YEAR .'&&lc=' .$LC_ID));
    }else{
        $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการบันทึกข้อมูล");
        redirect(base_url('edit_forms-subject_group?kid='. $OLD_SUBJECT_KPI_ID.'&&gid='.$SUBJECT_GROUP_CODE .'&&y=' .$SUBJECT_KPI_YEAR .'&&lc=' .$LC_ID));
    }

}




}

?>