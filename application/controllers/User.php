<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once '_authen.php';

class User extends _authen {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->library('form_validation');
        //$this->load->model('Project_model', 'project');
    }

	public function Get_Users(){
		$this->load->model('User_model');

		$UGSchoolID = $this->input->post('UGSchoolID');

		$key = array(
				'UGSchoolID' => $UGSchoolID
				);

		$sql = 'UserID, UserFullName, UserName, UserPassword, UserEmail';
		$sql .= 'UserPhone, UserCardType, UserCardNo, UserGroupID, UserSchoolID';
		$sql .= 'UserStatus, UserActive, SALT, UserTime';
		
		$Users = $this->User_model->getitems($key, $sql);
				
		echo  json_encode($Users);		
	}

	public function Get_UserByCardNo(){
		$this->load->model('User_model');

		$UserCardNo = $this->input->post('UserCardNo');

		$key = array(
				'UserCardNo' => $UserCardNo
				);

		$sql = 'UserID, UserFullName, UserName, UserPassword, UserEmail';
		$sql .= 'UserPhone, UserCardType, UserCardNo, UserGroupID, UserSchoolID';
		$sql .= 'UserStatus, UserActive, SALT, UserTime';
		
		$User = $this->User_model->getitem($key, $sql);
				
		echo  json_encode($User);		
	}

    public function Insert(){        		
        $this->load->model('User_model');	

        $x = rand(1000, 9999);
        $a = date("His");
        $y = rand(100, 999);
        $b = date("Ymd");
        $z = rand(10, 99);
        $c = "314159265";

        $pass = $this->input->post('FRM_UserPassword');

        $salt = md5("$x$c$a$b$z$y");
        $hash = sha1("$salt$pass$salt");
				
        $data = array(
            'UserFullName' => $this->input->post('FRM_UserFullName'),
            'UserName' => $this->input->post('FRM_UserCardNo'),
			'UserPassword' => $hash,
			'UserEmail' => $this->input->post('FRM_UserEmail'),
			'UserPhone' => $this->input->post('FRM_UserPhone'),
			'UserCardType' => $this->input->post('FRM_UserCardType'),
			'UserCardNo' => $this->input->post('FRM_UserCardNo'),
			'UserGroupID' => $this->input->post('FRM_UserGroupID'),
			'UserSchoolID' => $this->input->post('FRM_UserSchoolID'),
			'UserStatus' => 'Active',
			'UserActive' => '1',
			'SALT' => $salt,
			'UserTime' => time()
        );

        if ($this->User_model->insertitem($data)) {
            echo "บันทึกข้อมูลเรียบร้อยแล้ว";
        } else {
            echo "ไม่สามารถบันทึกได้กรุณาลองใหม่";
        }		
    }	

    public function Edit(){        		
        $this->load->model('User_model');	
				
        $data = array(
            'UserID' => $this->input->post('FRM_UserID'),
            'UserFullName' => $this->input->post('FRM_UserFullName'),
            'UserName' => $this->input->post('FRM_UserCardNo'),
			'UserEmail' => $this->input->post('FRM_UserEmail'),
			'UserPhone' => $this->input->post('FRM_UserPhone'),
			'UserCardType' => $this->input->post('FRM_UserCardType'),
			'UserCardNo' => $this->input->post('FRM_UserCardNo'),
			'UserGroupID' => $this->input->post('FRM_UserGroupID'),
			'UserSchoolID' => $this->input->post('FRM_UserSchoolID'),
			'UserStatus' => 'Active',
			'UserActive' => '1',
			'UserTime' => time()
        );

		$user_change_password = $this->input->post('user_change_password');
		
		if($user_change_password == 'Y'){
			$pass = $this->input->post('user_password');
			if ($pass <> "") {
				$x = rand(1000, 9999);
				$a = date("His");
				$y = rand(100, 999);
				$b = date("Ymd");
				$z = rand(10, 99);
				$c = "314159265";


				$salt = md5("$x$c$a$b$z$y");
				$hash = sha1("$salt$pass$salt");
				$data['UserPassword'] = $hash;
				$data['SALT'] = $salt;
			}
		}

        if ($this->User_model->updateitem($data)) {
            echo "บันทึกข้อมูลเรียบร้อยแล้ว";
        } else {
            echo "ไม่สามารถบันทึกได้กรุณาลองใหม่";
        }		
    }	
	
    public function EditFromUser(){        		
        $this->load->model('User_model');	
				
        $data = array(
            'UserID' => $this->input->post('FRMUserID'),
            'UserFullName' => $this->input->post('FRMUserFullName'),
            'UserName' => $this->input->post('FRMUserCardNo'),
			'UserEmail' => $this->input->post('FRMUserEmail'),
			'UserBirthDate' => $this->input->post('FRMUserBirthDate'),
			'UserPhone' => $this->input->post('FRMUserPhone'),
			'UserType' => $this->input->post('FRMUserType'),
			'UserCardType' => $this->input->post('FRMUserCardType'),
			'UserCardNo' => $this->input->post('FRMUserCardNo'),
			'UserGroupID' => $this->input->post('FRMUserGroupID'),
			'UserSchoolID' => $this->input->post('FRMUserSchoolID'),
			'UserTime' => time()
        );

		$user_change_password = $this->input->post('user_change_password_edit');
		
		if($user_change_password == 'Y'){
			$pass = $this->input->post('FRMUserPassword');
			if ($pass <> "") {
				$x = rand(1000, 9999);
				$a = date("His");
				$y = rand(100, 999);
				$b = date("Ymd");
				$z = rand(10, 99);
				$c = "314159265";


				$salt = md5("$x$c$a$b$z$y");
				$hash = sha1("$salt$pass$salt");
				$data['UserPassword'] = $hash;
				$data['SALT'] = $salt;
			}
		}

        if ($this->User_model->updateitem($data)) {

                $key = array(
                    'UserID' => $this->input->post('FRMUserID')
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
				$select .= 'UserSchoolID, SCHOOL.SchoolNameThai, SCHOOL.SchoolNameEnglish';

                $user = $this->User_model->getitem($key, $select);						
				$this->session->set_userdata($user);
				
            echo "บันทึกข้อมูลเรียบร้อยแล้ว";
        } else {
            echo "ไม่สามารถบันทึกได้กรุณาลองใหม่";
        }		
    }	
		
	
    public function Delete(){
        $this->load->model('User_model');	
		
        $data = array(
            'UserID' => $this->input->post('UserID')
        );
		
        if ($this->User_model->deleteitem($data)) {			
            echo "บันทึกข้อมูลเรียบร้อยแล้ว";
        } else {
            echo "ไม่สามารถบันทึกได้กรุณาลองใหม่";
        }
		
    }	
 
}