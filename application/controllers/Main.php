<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once '_sandboxcontroller.php';

class Main extends _sandboxcontroller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->library('form_validation');
        //$this->load->model('Project_model', 'project');
    }

    public function index(){
        
        if ( ! file_exists(APPPATH.'views/pages/dashboard/index.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

		$this->load->model('Summary_model');	
		$this->load->model('Config_model');	
        $this->load->model('Syslog_model');	
		
		/*
		User Common variable
		$select = 'UserID, UserFullName, UserName, UserEmail, UserCardType, UserCardID, ';
		$select .= 'UserGroupID, USR_GROUPS.GroupCode as UserGroupCode, USR_GROUPS.GroupName as UserGroupName, ';
		$select .= 'USR_GROUPS.GroupID as GroupTypeID, USR_GROUPS.GroupCode as GroupTypeCode, USR_GROUPS.GroupName as GroupTypeName, ';
		$select .= 'UserSchoolID, SCHOOL.SchoolNameThai, SCHOOL.SchoolNameEnglish';*/

        $data = array();
		$data = $this->session->userdata();
				
        $data['title'] = 'Main'; // Capitalize the first letter
		
		$data['SchoolCount'] =  $this->Summary_model->get_school_All();		
		$data['TeacherCount'] =  $this->Summary_model->get_teacher_All();
		$data['PersonnelCount'] =  $this->Summary_model->get_personnel_All();
		$data['StudentCount'] =  $this->Summary_model->get_student_All();

		$config_privacy_policy = $this->Config_model->getitem(array('service' => 'privacy_policy', 'x' => 'privacy_policy'));
		$data['privacy_policy'] = $config_privacy_policy['y'];

		$select = 'LogID, LogMessage, LogUserID, LogUserName, LogIpAddress, LogCreation ';
		$SystemLogs = $this->Syslog_model->getitems_limit10(array(), $select);
		$data['SystemLogs'] = $SystemLogs;
				
		//var_dump($data['UserRights']);
		//student Manage
		// $R_101000 = $data['UserRights'][array_search('101000', array_column($data['UserRights'], 'UR_Code'))];
		// $R_101000_
		// var_dump($R_101000);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/index', $data);
        $this->load->view('templates/footer', $data);
    }
	
	public function register(){
        if ( ! file_exists(APPPATH.'views/pages/admin/register_view.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
		
		/*
		User Common variable
		$select = 'UserID, UserFullName, UserName, UserEmail, UserCardType, UserCardID, ';
		$select .= 'UserGroupID, USR_GROUPS.GroupCode as UserGroupCode, USR_GROUPS.GroupName as UserGroupName, ';
		$select .= 'USR_GROUPS.GroupID as GroupTypeID, USR_GROUPS.GroupCode as GroupTypeCode, USR_GROUPS.GroupName as GroupTypeName, ';
		$select .= 'UserSchoolID, SCHOOL.SchoolNameThai, SCHOOL.SchoolNameEnglish';*/

        $data = array();
		$data = $this->session->userdata();
				
        $data['title'] = 'Register'; // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/admin/register', $data);
        $this->load->view('templates/footer', $data);
		
	}
 
}