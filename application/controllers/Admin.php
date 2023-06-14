<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once '_authen.php';

class Admin extends _authen {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->library('form_validation');
        //$this->load->model('Project_model', 'project');
    }

	public function test(){
		$mystring = "สวัสดีครับ";
		$key = "test_key";
		
		echo "ต้นแบบ : " . $mystring . "<br>";
		
		echo "encode : " . $this->sandb_encode($mystring) . "<br>"; // encode
		echo "decode กลับ : " . $this->sandb_decode($this->sandb_encode($mystring)) . "<br>"; // decode
	}

    public function index(){
        
        if ( ! file_exists(APPPATH.'views/pages/admin/index_view.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
		
		/*
		User Common variable
		$select = 'UserID, UserFullName, UserName, UserEmail, UserCardType, UserCardNo, ';
		$select .= 'UserGroupID, USR_GROUPS.GroupCode as UserGroupCode, USR_GROUPS.GroupName as UserGroupName, ';
		$select .= 'USR_GROUPS.GroupID as GroupTypeID, USR_GROUPS.GroupCode as GroupTypeCode, USR_GROUPS.GroupName as GroupTypeName, ';
		$select .= 'UserSchoolID, SCHOOL.SchoolNameThai, SCHOOL.SchoolNameEnglish';*/

        $data = array();
		$data = $this->session->userdata();
				
        $data['title'] = 'Admin'; // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('pages/admin/index_view', $data);
        $this->load->view('templates/footer', $data);
    }

    public function ConfigSystem(){
        
        if ( ! file_exists(APPPATH.'views/pages/admin/configsystem_view.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
		
        $this->load->model('Config_model');	
		
        $data = array();
		$data = $this->session->userdata();				
        $data['title'] = 'Config'; // Capitalize the first letter

		$config_organize_code = $this->Config_model->getitem(array('service' => 'main_system', 'x' => 'organize_code'));
		$data['organize_code'] = $config_organize_code['y'];	

		$config_organize_name_thai = $this->Config_model->getitem(array('service' => 'main_system', 'x' => 'organize_name_thai'));
		$data['organize_name_thai'] = $config_organize_name_thai['y'];	

		$config_organize_name_eng = $this->Config_model->getitem(array('service' => 'main_system', 'x' => 'organize_name_eng'));
		$data['organize_name_eng'] = $config_organize_name_eng['y'];	

		$config_systemfooter = $this->Config_model->getitem(array('x' => 'system_footer'));
		$data['system_footer'] = $config_systemfooter['y'];	

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('pages/admin/configsystem_view', $data);
        $this->load->view('templates/footer', $data);
    }

    public function UserGroups($DefaultSchoolID = ''){
        
        if ( ! file_exists(APPPATH.'views/pages/admin/usergroups_view.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
		
        $this->load->model('Config_model');	
        $this->load->model('Right_model');	
        $this->load->model('UserGroup_model');	
        $this->load->model('School_model');	
		
        $data = array();
		$data = $this->session->userdata();				
        $data['title'] = 'Users'; // Capitalize the first letter

		$config_organize_code = $this->Config_model->getitem(array('service' => 'main_system', 'x' => 'organize_code'));
		$data['organize_code'] = $config_organize_code['y'];	

		$config_organize_name_thai = $this->Config_model->getitem(array('service' => 'main_system', 'x' => 'organize_name_thai'));
		$data['organize_name_thai'] = $config_organize_name_thai['y'];	

		$config_organize_name_eng = $this->Config_model->getitem(array('service' => 'main_system', 'x' => 'organize_name_eng'));
		$data['organize_name_eng'] = $config_organize_name_eng['y'];	


		$select = 'USR_RIGHTS.Right_ID, USR_RIGHTS.Right_Code, USR_RIGHTS.Right_Name ';
		$Rights = $this->Right_model->getitems(array(), $select);
		$data['Rights'] = $Rights;

		$Schools = $this->School_model->get_school_All();
		$data['Schools'] = $Schools;
		$data['DefaultSchoolID'] = $DefaultSchoolID;

		$select = 'USR_USERGROUPS.UGID, USR_USERGROUPS.UGName, USR_USERGROUPS.UGIsAdmin, USR_USERGROUPS.UGIsDefault, ifnull(GroupMember.Member_Count, 0) as Member_Count, ';
		$select .= 'USR_USERGROUPS.UGGroupTypeID as GroupTypeID, USR_GROUPS.GroupCode as GroupTypeCode, USR_GROUPS.GroupName as GroupTypeName, ';
		$select .= 'case when USR_USERGROUPS.UGSchoolID = \'-99999\' then \'-99999\' else USR_USERGROUPS.UGSchoolID end as UGSchoolID, ';
		$select .= 'case when USR_USERGROUPS.UGSchoolID = \'-99999\' then \'สำนักศึกษาธิการจังหวัดสตูล\'  else SCHOOL.SchoolNameThai end as SchoolNameThai, ';
		$select .= 'case when USR_USERGROUPS.UGSchoolID = \'-99999\' then \'Satun Provincial Education Office\' else SCHOOL.SchoolNameEnglish end as SchoolNameEnglish ';
		
		if($DefaultSchoolID == ""){
			$UserGroups = $this->UserGroup_model->getitems(array(), $select);
		}else{
			$UserGroups = $this->UserGroup_model->getitems(array('USR_USERGROUPS.UGSchoolID' => $DefaultSchoolID), $select);
		}
		
		$data['UserGroups'] = $UserGroups;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('pages/admin/usergroups_view', $data);
        $this->load->view('templates/footer', $data);
    }	

    public function Registers($DefaultSchoolID = ''){
        
        if ( ! file_exists(APPPATH.'views/pages/admin/users_view.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
		
        $this->load->model('Config_model');	
        $this->load->model('Register_model');	
        $this->load->model('School_model');	
        $this->load->model('UserGroup_model');	
		
        $data = array();
		$data = $this->session->userdata();				
        $data['title'] = 'Users'; // Capitalize the first letter

		$config_organize_code = $this->Config_model->getitem(array('service' => 'main_system', 'x' => 'organize_code'));
		$data['organize_code'] = $config_organize_code['y'];	

		$config_organize_name_thai = $this->Config_model->getitem(array('service' => 'main_system', 'x' => 'organize_name_thai'));
		$data['organize_name_thai'] = $config_organize_name_thai['y'];	

		$config_organize_name_eng = $this->Config_model->getitem(array('service' => 'main_system', 'x' => 'organize_name_eng'));
		$data['organize_name_eng'] = $config_organize_name_eng['y'];	
		
		$Schools = $this->School_model->get_school_All();
		$data['Schools'] = $Schools;	
		$data['DefaultSchoolID'] = $DefaultSchoolID;		

		$select = 'USR_USERGROUPS.UGID, USR_USERGROUPS.UGName, USR_USERGROUPS.UGIsAdmin, USR_USERGROUPS.UGIsDefault, ';
		$select .= 'case when USR_USERGROUPS.UGSchoolID = \'-99999\' then \'-99999\' else USR_USERGROUPS.UGSchoolID end as UGSchoolID, ';
		$select .= 'case when USR_USERGROUPS.UGSchoolID = \'-99999\' then \'สำนักศึกษาธิการจังหวัดสตูล\'  else SCHOOL.SchoolNameThai end as SchoolNameThai, ';
		$select .= 'case when USR_USERGROUPS.UGSchoolID = \'-99999\' then \'Satun Provincial Education Office\' else SCHOOL.SchoolNameEnglish end as SchoolNameEnglish ';
		

		$UserGroups = $this->UserGroup_model->getitems(array(), $select);
		$data['UserGroups'] = $UserGroups;	

		$select = 'UserID, UserFullName, UserName, UserEmail, UserBirthDate, UserPhone, UserType, UserCardType, UserCardNo, ';
		$select .= 'UserGroupID, USR_USERGROUPS.UGName as UserGroupName, ';
		$select .= 'case when UserSchoolID = \'-99999\' then \'-99999\' else UserSchoolID end as UserSchoolID, ';
		$select .= 'case when UserSchoolID = \'-99999\' then \'สำนักศึกษาธิการจังหวัดสตูล\'  else SCHOOL.SchoolNameThai end as SchoolNameThai, ';
		$select .= 'case when UserSchoolID = \'-99999\' then \'Satun Provincial Education Office\' else SCHOOL.SchoolNameEnglish end as SchoolNameEnglish, ';
		$select .= 'case when UserActivate = 0 then \'รอยืนยัน\' else \'ยืนยันแล้ว\' end as UserActivate';

		if($DefaultSchoolID == ""){
			$UserRegisters = $this->Register_model->getitems(array(), $select);
		}else{
			$UserRegisters = $this->Register_model->getitems(array('UserSchoolID'	=>	$DefaultSchoolID), $select);
		}
		
		$data['UserRegisters'] = $UserRegisters;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('pages/admin/registers_view', $data);
        $this->load->view('templates/footer', $data);
    }
	
    public function Users($DefaultSchoolID = ''){
        
        if ( ! file_exists(APPPATH.'views/pages/admin/users_view.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
		
        $this->load->model('Config_model');	
        $this->load->model('UserGroup_model');	
        $this->load->model('School_model');	
        $this->load->model('User_model');	
		
        $data = array();
		$data = $this->session->userdata();				
        $data['title'] = 'Users'; // Capitalize the first letter

		$config_organize_code = $this->Config_model->getitem(array('service' => 'main_system', 'x' => 'organize_code'));
		$data['organize_code'] = $config_organize_code['y'];	

		$config_organize_name_thai = $this->Config_model->getitem(array('service' => 'main_system', 'x' => 'organize_name_thai'));
		$data['organize_name_thai'] = $config_organize_name_thai['y'];	

		$config_organize_name_eng = $this->Config_model->getitem(array('service' => 'main_system', 'x' => 'organize_name_eng'));
		$data['organize_name_eng'] = $config_organize_name_eng['y'];	

		$Schools = $this->School_model->get_school_All();
		$data['Schools'] = $Schools;
		$data['DefaultSchoolID'] = $DefaultSchoolID;
		
		$select = 'USR_USERGROUPS.UGID, USR_USERGROUPS.UGName, USR_USERGROUPS.UGIsAdmin, USR_USERGROUPS.UGIsDefault, ';
		$select .= 'case when USR_USERGROUPS.UGSchoolID = \'-99999\' then \'-99999\' else USR_USERGROUPS.UGSchoolID end as UGSchoolID, ';
		$select .= 'case when USR_USERGROUPS.UGSchoolID = \'-99999\' then \'สำนักศึกษาธิการจังหวัดสตูล\'  else SCHOOL.SchoolNameThai end as SchoolNameThai, ';
		$select .= 'case when USR_USERGROUPS.UGSchoolID = \'-99999\' then \'Satun Provincial Education Office\' else SCHOOL.SchoolNameEnglish end as SchoolNameEnglish ';
		

		$UserGroups = $this->UserGroup_model->getitems(array(), $select);
		$data['UserGroups'] = $UserGroups;	
		
		$select = 'UserID, UserFullName, UserName, UserEmail, UserBirthDate, UserPhone, UserType, UserCardType, UserCardNo, ';
		$select .= 'UserGroupID, USR_USERGROUPS.UGName as UserGroupName, ';
		$select .= 'case when UserSchoolID = \'-99999\' then \'-99999\' else UserSchoolID end as UserSchoolID, ';
		$select .= 'case when UserSchoolID = \'-99999\' then \'สำนักศึกษาธิการจังหวัดสตูล\'  else SCHOOL.SchoolNameThai end as SchoolNameThai, ';
		$select .= 'case when UserSchoolID = \'-99999\' then \'Satun Provincial Education Office\' else SCHOOL.SchoolNameEnglish end as SchoolNameEnglish ';
		
		if($DefaultSchoolID == ""){
			$Users = $this->User_model->getitems(array(), $select);
		}else{
			$Users = $this->User_model->getitems(array('UserSchoolID'	=>	$DefaultSchoolID), $select);
		}
		$data['Users'] = $Users;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('pages/admin/users_view', $data);
        $this->load->view('templates/footer', $data);
    }	

    public function MailServer(){
        
        if ( ! file_exists(APPPATH.'views/pages/admin/mailserver_view.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
		
        $this->load->model('Config_model');	
		
        $data = array();
		$data = $this->session->userdata();				
        $data['title'] = 'Users'; // Capitalize the first letter
		
		$config_mail_server = $this->Config_model->getitem(array('service' => 'mail', 'x' => 'mail_server'));
		$data['mail_server'] = $config_mail_server['y'];
		
		$config_mail_port = $this->Config_model->getitem(array('service' => 'mail', 'x' => 'mail_port'));
		$data['mail_port'] = $config_mail_port['y'];	
		
		$config_mail_username = $this->Config_model->getitem(array('service' => 'mail', 'x' => 'mail_username'));
		$data['mail_username'] = $config_mail_username['y'];	
		
		$config_mail_password = $this->Config_model->getitem(array('service' => 'mail', 'x' => 'mail_password'));
		$data['mail_password'] = $config_mail_password['y'];	

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('pages/admin/mailserver_view', $data);
        $this->load->view('templates/footer', $data);
    }
 
    public function PrivacyPolicy(){
        
        if ( ! file_exists(APPPATH.'views/pages/admin/privacypolicy_view.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
		
        $this->load->model('Config_model');	
		
        $data = array();
		$data = $this->session->userdata();				
        $data['title'] = 'Users'; // Capitalize the first letter
		
		$config_privacy_policy = $this->Config_model->getitem(array('service' => 'privacy_policy', 'x' => 'privacy_policy'));
		$data['privacy_policy'] = $config_privacy_policy['y'];
		
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('pages/admin/privacypolicy_view', $data);
        $this->load->view('templates/footer', $data);
    } 
	
    public function CookiePolicy(){
        
        if ( ! file_exists(APPPATH.'views/pages/admin/cookiepolicy_view.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
		
        $this->load->model('Config_model');	
		
        $data = array();
		$data = $this->session->userdata();				
        $data['title'] = 'Users'; // Capitalize the first letter
		
		$config_cookie_policy = $this->Config_model->getitem(array('service' => 'cookie_policy', 'x' => 'cookie_policy'));
		$data['cookie_policy'] = $config_cookie_policy['y'];
		
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('pages/admin/cookiepolicy_view', $data);
        $this->load->view('templates/footer', $data);
    } 	
 
	public function UserGroupRights(){
		$this->load->model('User_model');
		$this->load->model('UserGroupRight_model');

		$select = 'UserID, UserFullName, UserName, UserEmail, UserBirthDate, UserPhone, ';
		$select .= 'UserType, case when UserType = \'Teacher\' then \'ครู\'  ';
		$select .= 'when UserType = \'Student\' then \'นักเรียน\'  ';
		$select .= 'when UserType = \'Father\' then \'บิดา\'  ';
		$select .= 'when UserType = \'Mother\' then \'มารดา\'  ';
		$select .= 'when UserType = \'Guardian\' then \'ผู้ปกครอง\'  ';
		$select .= 'when UserType = \'Personnel\' then \'บุคลากรอื่นๆ\'  else \'\' end as UserTypeName, ';
		$select .= 'UserCardType, UserCardNo, ';
		$select .= 'UserGroupID, USR_GROUPS.GroupCode as UserGroupCode, USR_GROUPS.GroupName as UserGroupName, ';
		$select .= 'USR_GROUPS.GroupID as GroupTypeID, USR_GROUPS.GroupCode as GroupTypeCode, USR_GROUPS.GroupName as GroupTypeName, ';
		$select .= 'UserSchoolID, SCHOOL.SchoolNameThai, SCHOOL.SchoolNameEnglish, \'\' as UserRights';

		$user = $this->User_model->getitem(array('UserName' => '1729800078691'), $select);	
		$Rights = $this->UserGroupRight_model->getitems(array('UR_GroupID' => $user['UserGroupID']));		


		foreach($Rights as $Right){

			var_dump($Right);
			echo "<br><br>";
		
			if($Right['UR_Code'] == "101000"){
				$Rights_101000 = $Rights;				
			}else if($Right['UR_Code'] == "102000"){
				$Rights_102000 = $Rights;
			}else if($Right['UR_Code'] == "103000"){
				$Rights_103000 = $Rights;
			}else if($Right['UR_Code'] == "104000"){
				$Rights_104000 = $Rights;
			}else if($Right['UR_Code'] == "105000"){
				$Rights_105000 = $Rights;
			}else if($Right['UR_Code'] == "106000"){
				$Rights_106000 = $Rights;
			}else if($Right['UR_Code'] == "200000"){
				$Rights_200000 = $Rights;
			}else if($Right['UR_Code'] == "300000"){
				$Rights_300000 = $Rights;
			}else if($Right['UR_Code'] == "400000"){
				$Rights_400000 = $Rights;
			}else if($Right['UR_Code'] == "501000"){
				$Rights_501000 = $Rights;
			}else if($Right['UR_Code'] == "502000"){
				$Rights_502000 = $Rights;
			}else if($Right['UR_Code'] == "503000"){
				$Rights_503000 = $Rights;
			}else if($Right['UR_Code'] == "504000"){
				$Rights_504000 = $Rights;
			}else if($Right['UR_Code'] == "601000"){
				$Rights_601000 = $Rights;
			}else if($Right['UR_Code'] == "602000"){
				$Rights_602000 = $Rights;
			}else if($Right['UR_Code'] == "801000"){
				$Rights_801000 = $Rights;
			}else if($Right['UR_Code'] == "900101"){
				$Rights_900101 = $Rights;
			}else if($Right['UR_Code'] == "900201"){
				$Rights_900201 = $Rights;
			}else if($Right['UR_Code'] == "900202"){
				$Rights_900202 = $Rights;
			}else if($Right['UR_Code'] == "900203"){
				$Rights_900203 = $Rights;
			}else if($Right['UR_Code'] == "900204"){
				$Rights_900204 = $Rights;
			}else if($Right['UR_Code'] == "900301"){
				$Rights_900301 = $Rights;
			}else if($Right['UR_Code'] == "900302"){
				$Rights_900302 = $Rights;
			}else if($Right['UR_Code'] == "900303"){
				$Rights_900303 = $Rights;
			}else if($Right['UR_Code'] == "900401"){
				$Rights_900401 = $Rights;
			}else if($Right['UR_Code'] == "900402"){
				$Rights_900402 = $Rights;
			}

		}

		$user['Rights_101000'] = $Rights_101000;

		var_dump($user);
	}
 
}