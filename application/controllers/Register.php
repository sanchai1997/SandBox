<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '_sandboxcontroller.php';
require_once APPPATH.'third_party/phpmailer/Exception.php';
require_once APPPATH.'third_party/phpmailer/PHPMailer.php';
require_once APPPATH.'third_party/phpmailer/SMTP.php';

class Register extends _sandboxcontroller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->library('form_validation');



        //$this->load->model('Project_model', 'project');
    }


    public function index() {

        if ( ! file_exists(APPPATH.'views/pages/admin/register_view.php'))
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

            $salt = $this->User_model->getsalt($post['username']);
			
            if (empty($salt)) {
				$data['show_error'] = true;
                $this->load->view('pages/auth/login_view', $data);
            } else {
                $key = array(
                    'UserName' => $post['username'],
                    'UserPassword' => sha1($salt["SALT"] . $post['password'] . $salt["SALT"])
                );

				$select = 'UserID, UserFullName, UserName, UserEmail, UserCardType, UserCardNo, ';
				$select .= 'UserGroupID, USR_GROUPS.GroupCode as UserGroupCode, USR_GROUPS.GroupName as UserGroupName, ';
				$select .= 'USR_GROUPS.GroupID as GroupTypeID, USR_GROUPS.GroupCode as GroupTypeCode, USR_GROUPS.GroupName as GroupTypeName, ';
				$select .= 'UserSchoolID, SCHOOL.SchoolNameThai, SCHOOL.SchoolNameEnglish';

                $user = $this->User_model->getitem($key, $select);
								
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

	public function getPerson(){
		$this->load->model('Register_model');

		$PersonType = $this->input->post('PersonType');
		$UserCardType = $this->input->post('UserCardType');
		$UserCardNo = $this->input->post('UserCardNo');

		$key = array(
				'PersonType' => $PersonType,
				'UserCardType' => $UserCardType,
				'UserCardNo' => $UserCardNo
				);

		$sql = 'PersonID, PersonPrefixCode, PersonNameThai, PersonLastNameThai, ';
		$sql .= 'PersonNameEnglish, PersonLastNameEnglish, ';
		$sql .= 'PersonEmail, PersonBirthDate, PersonPersonalID, PersonPassportNumber, PersonSchoolID, PersonGroupID, PersonType';
		
		$Person = $this->Register_model->getPerson($key, $sql);
				
		echo  json_encode($Person);		
	}

	public function Get_Users(){
		$this->load->model('Register_model');

		$UGSchoolID = $this->input->post('UGSchoolID');

		$key = array(
				'UGSchoolID' => $UGSchoolID
				);

		$sql = 'UserID, UserFullName, UserName, UserPassword, UserEmail';
		$sql .= 'UserPhone, UserCardType, UserCardNo, UserGroupID, UserSchoolID';
		$sql .= 'UserStatus, UserActive, SALT, UserTime';
		
		$Users = $this->Register_model->getitems($key, $sql);
				
		echo  json_encode($Users);		
	}

    public function Insert(){        		
        $this->load->model('Register_model');	

        $x = rand(1000, 9999);
        $a = date("His");
        $y = rand(100, 999);
        $b = date("Ymd");
        $z = rand(10, 99);
        $c = "314159265";

        $pass = $this->input->post('FRM_UserPassword');

        $salt = md5("$x$c$a$b$z$y");
        $hash = sha1("$salt$pass$salt");
		
		$UserName = $this->input->post('FRM_UserCardNo');
		$UserEmail = $this->input->post('FRM_UserEmail');
						
        $data = array(
            'UserFullName' => $this->input->post('FRM_UserFullName'),
            'UserName' => $this->input->post('FRM_UserCardNo'),
			'UserPassword' => $hash,
			'UserEmail' => $this->input->post('FRM_UserEmail'),
			'UserBirthDate' => $this->input->post('FRM_UserBirthDate'),
			'UserPhone' => $this->input->post('FRM_UserPhone'),
			'UserType' => $this->input->post('FRM_UserType'),
			'UserCardType' => $this->input->post('FRM_UserCardType'),
			'UserCardNo' => $this->input->post('FRM_UserCardNo'),
			'UserGroupID' => $this->input->post('FRM_UserGroupID'),
			'UserSchoolID' => $this->input->post('FRM_UserSchoolID'),
			'UserActivate' => '0',
			'SALT' => $salt,
			'UserTime' => time()
        );

		$Subject = 'ยืนยันการเข้าใช้งานระบบพื้นที่นวัตกรรมการศึกษา จังหวัดสตูล (Satun SandBox)'; 
		$mailContent = 'ตามที่ท่านได้ลงทะเบียนเพื่อเข้าใช้งาน จึงจำเป็นต้องทำการยืนยันตัวตนของท่าน';	
		$mailContent .= 'โดยการกดยืนยัน  >> <a href="' . base_url(). 'index.php/Register/Activated/' . $UserName . '">ยืนยันตัวตนผ่านทางอีเมล์ที่นี่</a> << ';	


        if ($this->Register_model->insertitem($data)) {
            echo "บันทึกข้อมูลเรียบร้อยแล้ว";
			$this->sendmail($UserEmail, $Subject, $mailContent);
        } else {
            echo "ไม่สามารถบันทึกได้กรุณาลองใหม่";
        }		
    }	

    public function Edit(){        		
        $this->load->model('Register_model');	
				
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
			'UserActivate' => '0',
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
	
    public function Delete(){
        $this->load->model('Register_model');	
		
        $data = array(
            'UserID' => $this->input->post('UserID')
        );
		
        if ($this->Register_model->deleteitem($data)) {			
            echo "บันทึกข้อมูลเรียบร้อยแล้ว";
        } else {
            echo "ไม่สามารถบันทึกได้กรุณาลองใหม่";
        }
		
    }	
 
	public function sendmail($To, $Subject, $mailContent){		
        $this->load->model('Config_model');	

        // Load PHPMailer library		
        // $this->load->library('Phpmailer_lib');
		// $this->Phpmailer_lib->load();
		
		$config_mail_server = $this->Config_model->getitem(array('service' => 'mail', 'x' => 'mail_server'));
		$mail_server = $config_mail_server['y'];			
		
		$config_mail_port = $this->Config_model->getitem(array('service' => 'mail', 'x' => 'mail_port'));
		$mail_port = $config_mail_port['y'];		
		
		$config_mail_username = $this->Config_model->getitem(array('service' => 'mail', 'x' => 'mail_username'));
		$mail_username = $config_mail_username['y'];			
		
		$config_mail_password = $this->Config_model->getitem(array('service' => 'mail', 'x' => 'mail_password'));
		$mail_password = $config_mail_password['y'];			
				
		

		$mail = new PHPMailer(true);
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = $mail_server;
        $mail->SMTPAuth = true;
        $mail->Username = $mail_username;
        $mail->Password = $mail_password;
        $mail->SMTPSecure = 'tls';
        $mail->Port     = $mail_port;
		
		$mail->CharSet = "UTF-8"; 
		$mail->Encoding = 'base64';		

        $mail->setFrom($mail_username, 'พื้นที่นวัตกรรมการศึกษา จังหวัดสตูล (Satun SandBox)');
        $mail->addReplyTo($mail_username, 'พื้นที่นวัตกรรมการศึกษา จังหวัดสตูล (Satun SandBox)');

        // Add a recipient
        $mail->addAddress($To);

        // Add cc or bcc 
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        // Email subject
        $mail->Subject = $Subject;

        // Set email format to HTML
        $mail->isHTML(true);

        // Email body content

        $mail->Body = $mailContent;

        // Send email
		
		return $mail->send();
		
/*         if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            echo 'Message has been sent';
        } */
		
	}	
	
	public function Activated($UserName){
		
        if ( ! file_exists(APPPATH.'views/pages/admin/index_view.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
		
        $data = array();
		$data = $this->session->userdata();
				
		$this->load->model('Register_model');
		$this->load->model('User_model');	

		$data_userregister = array('UserName'	=>	$UserName);
		$UserRegister = $this->Register_model->getitem($data_userregister);
		
		//var_dump($UserRegister);
		
		$UserEmail = $UserRegister['UserEmail'];
		$UserName = $UserRegister['UserName'];
		$UserActivate = $UserRegister['UserActivate'];

		
		if($UserActivate == "0"){

					
			$data_insert_user = array(
				'UserFullName'	=>	$UserRegister['UserFullName'],
				'UserName'		=>	$UserRegister['UserName'],
				'UserPassword'	=>	$UserRegister['UserPassword'],
				'UserEmail'		=>	$UserRegister['UserEmail'],
				'UserBirthDate' =>	$UserRegister['UserBirthDate'],
				'UserPhone'		=>	$UserRegister['UserPhone'],
				'UserType'		=>	$UserRegister['UserType'],
				'UserCardType'	=>	$UserRegister['UserCardType'],
				'UserCardNo'	=>	$UserRegister['UserCardNo'],
				'UserGroupID'	=>	$UserRegister['UserGroupID'],
				'UserSchoolID'	=>	$UserRegister['UserSchoolID'],
				'UserStatus'	=>	'Active',
				'UserActive'	=>	'1',
				'SALT'			=>	$UserRegister['SALT'],
				'UserTime'		=>	time()
			);

			//var_dump($data_insert_user);

			if ($this->User_model->insertitem($data_insert_user)) {
				
				
				$data_update_userregister = array(
											'UserID'		=>	$UserRegister['UserID'],
											'UserActivate'	=>	'1'
										);
				$this->Register_model->updateitem($data_update_userregister);				
				
				//Send Mail
				$Subject = 'แจ้งผลการยืนยันบัญชีผู้ใช้งาน';
				$message_mail = '
								ท่านได้ทำการยืนยันบัญชีผู้ใช้งานของท่านเรียบร้อยแล้ว<br>
								บัญชีผู้ใช้งาน : ' . $UserName . '<br>
								รหัสผ่าน : ตามที่ท่านได้กำหนดไว้ในขั้นตอนการสมัครสมาชิก<br>
								เริ่มใช้งานระบบ >> ' . base_url(). 'Main' . '
				';		
				
				$this->sendmail($UserEmail, $Subject, $message_mail);
						
				$message = '
								<center><h5><font color="green">ท่านได้ทำการยืนยันบัญชีผู้ใช้งานของท่านเรียบร้อยแล้ว</font></h5></center><br><br>
								<center><h5><font color="blue">บัญชีผู้ใช้งาน : ' . $UserName . '</font></h5></center><br>
								<center><h5><font color="blue">รหัสผ่าน : ตามที่ท่านได้กำหนดไว้ในขั้นตอนการสมัครสมาชิก</font></h5></center><br><br>
								<center><button type="button" id="btn-next" name="btn-next" class="btn btn-primary">เริ่มใช้งานระบบ"</button></center>
				';
			} else {
				$message = '
								<center><h5><font color="red">ไม่สามารถยืนยันบัญชีผู้ใช้งานของท่านได้ กรุณาลองใหม่</font></h5></center><br><br>
								<center><h5><font color="blue">หรือติดต่อผู้ดูแลระบบ</font></h5></center><br>
				';
			}
			
		
			
		}else{
			$message = '
							<center><h5><font color="green">ท่านได้ทำการยืนยันบัญชีผู้ใช้งานของท่านเรียบร้อยแล้ว</font></h5></center><br><br>
							<center><h5><font color="blue">บัญชีผู้ใช้งาน : ' . $UserName . '</font></h5></center><br>
							<center><h5><font color="blue">รหัสผ่าน : ตามที่ท่านได้กำหนดไว้ในขั้นตอนการสมัครสมาชิก</font></h5></center><br><br>
							<center><button type="button" id="btn-next" name="btn-next" class="btn btn-primary">เริ่มใช้งานระบบ"</button></center>
			';			
		}






		$data['message'] = $message;

        $this->load->view('templates/header', $data);
        $this->load->view('pages/admin/activated_view', $data);
        $this->load->view('templates/footer', $data);

				
	}

	public function ActivatedByAdmin(){
						
		$this->load->model('Register_model');
		$this->load->model('User_model');	

		$UserID = $this->input->post('UserID');

		$data_userregister = array('UserID'	=> $UserID);
		$UserRegister = $this->Register_model->getitem($data_userregister);
		
		//var_dump($UserRegister);
		
		$UserEmail = $UserRegister['UserEmail'];
		$UserName = $UserRegister['UserName'];
		$UserActivate = $UserRegister['UserActivate'];

		
		if($UserActivate == "0"){

					
			$data_insert_user = array(
				'UserFullName'	=>	$UserRegister['UserFullName'],
				'UserName'		=>	$UserRegister['UserName'],
				'UserPassword'	=>	$UserRegister['UserPassword'],
				'UserEmail'		=>	$UserRegister['UserEmail'],
				'UserBirthDate' =>	$UserRegister['UserBirthDate'],
				'UserPhone'		=>	$UserRegister['UserPhone'],
				'UserType'		=>	$UserRegister['UserType'],
				'UserCardType'	=>	$UserRegister['UserCardType'],
				'UserCardNo'	=>	$UserRegister['UserCardNo'],
				'UserGroupID'	=>	$UserRegister['UserGroupID'],
				'UserSchoolID'	=>	$UserRegister['UserSchoolID'],
				'UserStatus'	=>	'Active',
				'UserActive'	=>	'1',
				'SALT'			=>	$UserRegister['SALT'],
				'UserTime'		=>	time()
			);

			//var_dump($data_insert_user);

			if ($this->User_model->insertitem($data_insert_user)) {
				
				
				$data_update_userregister = array(
											'UserID'		=>	$UserRegister['UserID'],
											'UserActivate'	=>	'1'
										);
				$this->Register_model->updateitem($data_update_userregister);				
				
				//Send Mail
				$Subject = 'แจ้งผลการยืนยันบัญชีผู้ใช้งาน';
				$message_mail = '
								ท่านได้ทำการยืนยันบัญชีผู้ใช้งานของท่านเรียบร้อยแล้ว<br>
								บัญชีผู้ใช้งาน : ' . $UserName . '<br>
								รหัสผ่าน : ตามที่ท่านได้กำหนดไว้ในขั้นตอนการสมัครสมาชิก<br>
								เริ่มใช้งานระบบ >> ' . base_url(). 'Main' . '
				';		
				
				$this->sendmail($UserEmail, $Subject, $message_mail);
						
				echo "บันทึกข้อมูลเรียบร้อยแล้ว";
			} else {
				echo "บันทึกข้อมูลเรียบร้อยแล้ว";		
			}
						
		}else{
			echo "บันทึกข้อมูลเรียบร้อยแล้ว";				
		}
				
	}
}
?>