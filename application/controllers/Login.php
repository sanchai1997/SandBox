<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once '_sandboxcontroller.php';

class Login extends _sandboxcontroller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->library('form_validation');
        //$this->load->model('Project_model', 'project');
    }


    public function index() {

        if ( ! file_exists(APPPATH.'views/pages/auth/login_view.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }


        $data = array();
		
        $post = $this->input->post();
		
		
        if (!isset($post['submit'])) {
			$data['show_error'] = false;
            $this->load->view('pages/auth/login_view', $data);
        } else {
            $this->load->model('User_model');
            $this->load->model('UserGroupRight_model');

            $salt = $this->User_model->getsalt($post['username']);
			
            if (empty($salt)) {
				$data['show_error'] = true;
                $this->load->view('pages/auth/login_view', $data);
            } else {
                $key = array(
                    'UserName' => $post['username'],
                    'UserPassword' => sha1($salt["SALT"] . $post['password'] . $salt["SALT"])
                );

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

                $user = $this->User_model->getitem($key, $select);
				$Rights = $this->UserGroupRight_model->getitems(array('UR_GroupID' => $user['UserGroupID']));
				$user['UserRights'] = $Rights;				
								
				if($user <> NULL){				
					$this->session->set_userdata($user);
					
					if($user['GroupTypeCode'] == "Admin"){
						redirect('Admin/ConfigSystem');
					}else{
						redirect('Main');
					}

				}else{
					$data['show_error'] = true;
					$this->load->view('pages/auth/login_view', $data);
				}
            } 
        }
    }

}
?>