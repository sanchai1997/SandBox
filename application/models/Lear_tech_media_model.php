<?php
class Lear_tech_media_model extends CI_Model
{

	public function add_LTM()
	{
	$ip_address = '';
			if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
				$ip_address = $_SERVER['HTTP_CLIENT_IP'];
			} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
				$ip_address = $_SERVER['REMOTE_ADDR'];
			}
		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;

		$EducationYear = $this->input->post('EducationYear');
		$Semester = $this->input->post('Semester');
		$MediaName = $this->input->post('MediaName');
		// นำค่า $id_name มาใช้ในการค้นหาข้อมูลในฐานข้อมูล
		$this->db->where('EducationYear', $EducationYear);
		$this->db->where('Semester', $Semester);
		$this->db->where('MediaName', $MediaName);
		$this->db->where('DeleteStatus=0');
		$query = $this->db->get('LEARNING_TECHNOLOGY_MEDIA');


		$num_chk = $query->num_rows();


		if ($num_chk <= 0) {
			// ไม่พบข้อมูลในฐานข้อมูล
			if (isset($_FILES['AttachmentURL'])) {
				$file = $_FILES['AttachmentURL']['tmp_name'];
				if (file_exists($file)) {
					$config['upload_path'] = 'assets/EII/LEARNING_TECHNOLOGY_MEDIA/';
					$config['allowed_types'] = 'doc|docx|pdf|jpg|png|xls|ppt|zip|xlsx';
					$config['encrypt_name'] = TRUE;
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('AttachmentURL')) {
						echo $this->upload->display_errors();
					} else {

						$data = $this->upload->data();
						$filename = $data['file_name'];
						$data = array(
							'MediaID' => $this->input->post('MediaID'),
							'EducationYear' => $this->input->post('EducationYear'),
							'Semester' => $this->input->post('Semester'),
							'MediaName' => $this->input->post('MediaName'),
							'MediaTypeCode' => $this->input->post('MediaTypeCode'),
							'TargetEducationLevelCode' => $this->input->post('TargetEducationLevelCode'),
							'MediaBenefit' => $this->input->post('MediaBenefit'),
							'Abstract' => $this->input->post('Abstract'),
							'SearchKeyword' => $this->input->post('SearchKeyword'),
							'AttachmentURL' => $filename,
							'Source' => $this->input->post('Source'),
							'PublishDate' => $this->input->post('PublishDate')
						);
					}
				} else {


					$data = array(
						'MediaID' => $this->input->post('MediaID'),
						'EducationYear' => $this->input->post('EducationYear'),
						'Semester' => $this->input->post('Semester'),
						'MediaName' => $this->input->post('MediaName'),
						'MediaTypeCode' => $this->input->post('MediaTypeCode'),
						'TargetEducationLevelCode' => $this->input->post('TargetEducationLevelCode'),
						'MediaBenefit' => $this->input->post('MediaBenefit'),
						'Abstract' => $this->input->post('Abstract'),
						'SearchKeyword' => $this->input->post('SearchKeyword'),
						'Source' => $this->input->post('Source'),
						'PublishDate' => $this->input->post('PublishDate')
					);
				}
			}
			$query = $this->db->insert('LEARNING_TECHNOLOGY_MEDIA', $data);
			if ($query == TRUE) {
				$UserID = $this->session->userdata('UserID');
				$log = [
				'LogMessage' => 'Insert MediaID = "' . $this->input->post('MediaID') . '" MediaName = "' . $this->input->post('MediaName') . '"',
				'LogUserID' => $UserID,
				'LogIpAddress' => $ip_address,
				'LogCreation' => date('Y-m-d H:i:s')
				];
				$logresult = $this->db->insert('SYS_LOG', $log);
										}
			if ($query) {
				session_start(); // เริ่มต้น session
				$_SESSION['success'] = "เพิ่มข้อมูลเรียบร้อย !"; // กำหนดค่า success ใน session เป็น true
				header("Location: " . site_url('Fm_lear_tech_media_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้

			} else {
				echo 'false';
			}
		} else {
			// พบข้อมูลในฐานข้อมูล
			session_start(); // เริ่มต้น session
			$_SESSION['false'] = "ไม่มามารถบันทึกข้อมูลได้โปรดตรวจสอบข้อมูล (ปีการศึกษา/ภาคเรียน/ชื่อ) ซ้ำกันในระบบ !"; // กำหนดค่า success ใน session เป็น true
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			exit;
		}
	}
	public function edit_LTM()
	{
	$ip_address = '';
			if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
				$ip_address = $_SERVER['HTTP_CLIENT_IP'];
			} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
				$ip_address = $_SERVER['REMOTE_ADDR'];
			}
		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		if (isset($_FILES['AttachmentURL'])) {
			$file = $_FILES['AttachmentURL']['tmp_name'];
			if (file_exists($file)) {
				$config['upload_path'] = 'assets/EII/LEARNING_TECHNOLOGY_MEDIA/';
				$config['allowed_types'] = 'doc|docx|pdf|jpg|png|xls|ppt|zip|xlsx';
				$config['encrypt_name'] = TRUE;
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('AttachmentURL')) {
					echo $this->upload->display_errors();
				} else {
					$oil_file = $this->input->post('oil_file');
					unlink('assets/EII/LEARNING_TECHNOLOGY_MEDIA/'.$oil_file);
					$data = $this->upload->data();
					$filename = $data['file_name'];
					$data = array(
						'MediaID' => $this->input->post('MediaID'),
						'EducationYear' => $this->input->post('EducationYear'),
						'Semester' => $this->input->post('Semester'),
						'MediaName' => $this->input->post('MediaName'),
						'MediaTypeCode' => $this->input->post('MediaTypeCode'),
						'TargetEducationLevelCode' => $this->input->post('TargetEducationLevelCode'),
						'MediaBenefit' => $this->input->post('MediaBenefit'),
						'Abstract' => $this->input->post('Abstract'),
						'SearchKeyword' => $this->input->post('SearchKeyword'),
						'AttachmentURL' => $filename,
						'Source' => $this->input->post('Source'),
						'PublishDate' => $this->input->post('PublishDate')
					);
				}
			} else {
				$data = array(
					'MediaID' => $this->input->post('MediaID'),
					'EducationYear' => $this->input->post('EducationYear'),
					'Semester' => $this->input->post('Semester'),
					'MediaName' => $this->input->post('MediaName'),
					'MediaTypeCode' => $this->input->post('MediaTypeCode'),
					'TargetEducationLevelCode' => $this->input->post('TargetEducationLevelCode'),
					'MediaBenefit' => $this->input->post('MediaBenefit'),
					'Abstract' => $this->input->post('Abstract'),
					'SearchKeyword' => $this->input->post('SearchKeyword'),
					'Source' => $this->input->post('Source'),
					'PublishDate' => $this->input->post('PublishDate')
				);
			}
		}
		$this->db->where('Id_ltm', $this->input->post('Id_ltm'));
		$query = $this->db->update('LEARNING_TECHNOLOGY_MEDIA', $data);
		if ($query == TRUE) {
			$UserID = $this->session->userdata('UserID');
			$log = [
			'LogMessage' => 'Update MediaID = "' . $this->input->post('MediaID') . '" MediaName = "' . $this->input->post('MediaName') . '"',
			'LogUserID' => $UserID,
			'LogIpAddress' => $ip_address,
			'LogCreation' => date('Y-m-d H:i:s')
			];
			$logresult = $this->db->insert('SYS_LOG', $log);
			}
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "แก้ไขข้อมูลสำเร็จ !"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_lear_tech_media_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function del_LTM()
	{
	$ip_address = '';
			if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
				$ip_address = $_SERVER['HTTP_CLIENT_IP'];
			} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
				$ip_address = $_SERVER['REMOTE_ADDR'];
			}
		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		$value = "1";
		$data = array(

			'DeleteStatus' => $value
		);

		$this->db->where('Id_ltm', $this->input->post('Id_ltm'));
		$query = $this->db->update('LEARNING_TECHNOLOGY_MEDIA', $data);
		if ($query == TRUE) {
			$UserID = $this->session->userdata('UserID');
			$log = [
			'LogMessage' => 'Delete MediaID = "' . $this->input->post('MediaID') . '" MediaName = "' . $this->input->post('MediaName') . '"',
			'LogUserID' => $UserID,
			'LogIpAddress' => $ip_address,
			'LogCreation' => date('Y-m-d H:i:s')
			];
						
			$logresult = $this->db->insert('SYS_LOG', $log);
			}
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "ลบข้อมูลสำเร็จ !"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_lear_tech_media_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function add_LTMC()
	{
	$ip_address = '';
			if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
				$ip_address = $_SERVER['HTTP_CLIENT_IP'];
			} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
				$ip_address = $_SERVER['REMOTE_ADDR'];
			}
		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;

		$CreatorPersonalID = $this->input->post('CreatorPersonalID');
		$encodedCreatorPersonalID = base64_encode($CreatorPersonalID);
		$MediaID = $this->input->post('MediaID');
		if ($CreatorPersonalID == '') {
			$data = array(
				'MediaID' => $this->input->post('MediaID'),
				
				'CreatorPersonalIDTypeCode' => $this->input->post('CreatorPersonalIDTypeCode'),
				'CreatorPrefixCode' => $this->input->post('CreatorPrefixCode'),
				'CreatorNameThai' => $this->input->post('CreatorNameThai'),
				'CreatorNameEnglish' => $this->input->post('CreatorNameEnglish'),
				'CreatorMiddleNameThai' => $this->input->post('CreatorMiddleNameThai'),
				'CreatorMiddleNameEnglish' => $this->input->post('CreatorMiddleNameEnglish'),
				'CreatorLastNameThai' => $this->input->post('CreatorLastNameThai'),
				'CreatorLastNameEnglish' => $this->input->post('CreatorLastNameEnglish'),
				'ParticipantRatio' => $this->input->post('ParticipantRatio')
			);
			$query = $this->db->insert('LEARNING_TECHNOLOGY_MEDIA_CREATOR', $data);
			if ($query == TRUE) {
				$UserID = $this->session->userdata('UserID');
				$log = [
				'LogMessage' => 'Insert MediaID = "' . $this->input->post('MediaID') . '" CreatorNameThai = "' . $this->input->post('CreatorNameThai') . '"',
				'LogUserID' => $UserID,
				'LogIpAddress' => $ip_address,
				'LogCreation' => date('Y-m-d H:i:s')
				];
				$logresult = $this->db->insert('SYS_LOG', $log);
										}
			if ($query) {
				session_start(); // เริ่มต้น session
				$_SESSION['success'] = "เพิ่มข้อมูลเรียบร้อย !"; // กำหนดค่า success ใน session เป็น true
				header("Location: " . site_url('Fm_lear_tech_media_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้

			} else {
				echo 'false';
			}
		}elseif($CreatorPersonalID != '') {
			$this->db->where('MediaID', $MediaID);
			$this->db->where('CreatorPersonalID', $CreatorPersonalID);
			$this->db->where('DeleteStatus=0');
			$this->db->where('CreatorPersonalID!=0');
			$query = $this->db->get('LEARNING_TECHNOLOGY_MEDIA_CREATOR');
			$num_chk = $query->num_rows();
			if ($num_chk <= 0) {
				// ไม่พบข้อมูลในฐานข้อมูล
				$data = array(
					'MediaID' => $this->input->post('MediaID'),
					'CreatorPersonalID' => $encodedCreatorPersonalID,
					'CreatorPersonalIDTypeCode' => $this->input->post('CreatorPersonalIDTypeCode'),
					'CreatorPrefixCode' => $this->input->post('CreatorPrefixCode'),
					'CreatorNameThai' => $this->input->post('CreatorNameThai'),
					'CreatorNameEnglish' => $this->input->post('CreatorNameEnglish'),
					'CreatorMiddleNameThai' => $this->input->post('CreatorMiddleNameThai'),
					'CreatorMiddleNameEnglish' => $this->input->post('CreatorMiddleNameEnglish'),
					'CreatorLastNameThai' => $this->input->post('CreatorLastNameThai'),
					'CreatorLastNameEnglish' => $this->input->post('CreatorLastNameEnglish'),
					'ParticipantRatio' => $this->input->post('ParticipantRatio')
				);
				$query = $this->db->insert('LEARNING_TECHNOLOGY_MEDIA_CREATOR', $data);
				if ($query == TRUE) {
					$UserID = $this->session->userdata('UserID');
					$log = [
					'LogMessage' => 'Insert MediaID = "' . $this->input->post('MediaID') . '" CreatorNameThai = "' . $this->input->post('CreatorNameThai') . '"',
					'LogUserID' => $UserID,
					'LogIpAddress' => $ip_address,
					'LogCreation' => date('Y-m-d H:i:s')
					];
					$logresult = $this->db->insert('SYS_LOG', $log);
											}
				if ($query) {
					session_start(); // เริ่มต้น session
					$_SESSION['success'] = "เพิ่มข้อมูลเรียบร้อย !"; // กำหนดค่า success ใน session เป็น true
					header("Location: " . site_url('Fm_lear_tech_media_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้
	
				} else {
					echo 'false';
				}
			} else {
				// พบข้อมูลในฐานข้อมูล
				session_start(); // เริ่มต้น session
				$_SESSION['false'] = "ไม่มามารถบันทึกข้อมูลได้โปรดตรวจสอบข้อมูล (เลขบัตร ปชช.) ซ้ำกันในระบบ !"; // กำหนดค่า success ใน session เป็น true
				header('Location: ' . $_SERVER['HTTP_REFERER']);
				exit;
			}
		}
	}
	public function edit_LTMC()
	{
	$ip_address = '';
			if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
				$ip_address = $_SERVER['HTTP_CLIENT_IP'];
			} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
				$ip_address = $_SERVER['REMOTE_ADDR'];
			}
		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		$CreatorPersonalID = $this->input->post('CreatorPersonalID');
		$encodedCreatorPersonalID = base64_encode($CreatorPersonalID);
		$MediaID = $this->input->post('MediaID');

// นำค่า $id_name มาใช้ในการค้นหาข้อมูลในฐานข้อมูล
$this->db->where('CreatorPersonalID', $CreatorPersonalID);
$this->db->where('MediaID', $MediaID);
$this->db->where('DeleteStatus=0');
$this->db->where('CreatorPersonalID!=0');
$query = $this->db->get('LEARNING_TECHNOLOGY_MEDIA_CREATOR');

// นับจำนวนแถวที่ค้นพบ
$num_chk = $query->num_rows();

// ตรวจสอบจำนวนแถวที่ค้นพบว่ามีมากกว่า 0 หรือไม่
if ($num_chk <= 0 ) {
  // ไม่พบข้อมูลในฐานข้อมูล
  $data = array(
	  'MediaID' => $this->input->post('MediaID'),
	  'CreatorPersonalID' => $encodedCreatorPersonalID,
	  'CreatorPersonalIDTypeCode' => $this->input->post('CreatorPersonalIDTypeCode'),
	  'CreatorPrefixCode' => $this->input->post('CreatorPrefixCode'),
	  'CreatorNameThai' => $this->input->post('CreatorNameThai'),
	  'CreatorNameEnglish' => $this->input->post('CreatorNameEnglish'),
	  'CreatorMiddleNameThai' => $this->input->post('CreatorMiddleNameThai'),
	  'CreatorMiddleNameEnglish' => $this->input->post('CreatorMiddleNameEnglish'),
	  'CreatorLastNameThai' => $this->input->post('CreatorLastNameThai'),
	  'CreatorLastNameEnglish' => $this->input->post('CreatorLastNameEnglish'),
	  'ParticipantRatio' => $this->input->post('ParticipantRatio')
  );
  $this->db->where('Id_ltmc', $this->input->post('Id_ltmc'));

  $query = $this->db->update('LEARNING_TECHNOLOGY_MEDIA_CREATOR', $data);
  if ($query == TRUE) {
	$UserID = $this->session->userdata('UserID');
	$log = [
	'LogMessage' => 'Update MediaID = "' . $this->input->post('MediaID') . '" CreatorNameThai = "' . $this->input->post('CreatorNameThai') . '"',
	'LogUserID' => $UserID,
	'LogIpAddress' => $ip_address,
	'LogCreation' => date('Y-m-d H:i:s')
	];
	$logresult = $this->db->insert('SYS_LOG', $log);
	}
  if ($query) {
	  session_start(); // เริ่มต้น session
	  $_SESSION['success'] = "แก้ไขข้อมูลสำเร็จ !"; // กำหนดค่า success ใน session เป็น true
	  header("Location: " . site_url('Fm_lear_tech_media_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้

  } else {
	  echo 'false';
  }
} else {
  // พบข้อมูลในฐานข้อมูล
  session_start(); // เริ่มต้น session
				$_SESSION['false'] = "ไม่มามารถแก้ข้อมูลได้โปรดตรวจสอบข้อมูล (เลขบัตร ปชช.) ซ้ำกันในระบบ !"; // กำหนดค่า success ใน session เป็น true
				header('Location: ' . $_SERVER['HTTP_REFERER']);
				exit;
}
	}
	public function del_LTMC()
	{
	$ip_address = '';
			if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
				$ip_address = $_SERVER['HTTP_CLIENT_IP'];
			} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
				$ip_address = $_SERVER['REMOTE_ADDR'];
			}
		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		$value = "1";
		$data = array(

			'DeleteStatus' => $value
		);
		$this->db->where('Id_ltmc', $this->input->post('Id_ltmc'));

		$query = $this->db->update('LEARNING_TECHNOLOGY_MEDIA_CREATOR', $data);
		if ($query == TRUE) {
			$UserID = $this->session->userdata('UserID');
			$log = [
			'LogMessage' => 'Delete MediaID = "' . $this->input->post('MediaID') . '" CreatorNameThai = "' . $this->input->post('CreatorNameThai') . '"',
			'LogUserID' => $UserID,
			'LogIpAddress' => $ip_address,
			'LogCreation' => date('Y-m-d H:i:s')
			];
						
			$logresult = $this->db->insert('SYS_LOG', $log);
			}
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "ลบข้อมูลสำเร็จ !"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_lear_tech_media_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function show_index()
	{
		$this->db->select('LTM.*,LTMC.*');
		$this->db->from('LEARNING_TECHNOLOGY_MEDIA as LTM');
		$this->db->join('LEARNING_TECHNOLOGY_MEDIA_CREATOR as LTMC', 'LTM.MediaID=LTMC.MediaID');
		$query = $this->db->get();
		return $query->result();
	}
	public function show_LTM()
	{
		$this->db->select('*');
		$this->db->from('LEARNING_TECHNOLOGY_MEDIA');
		$this->db->where('DeleteStatus=0');
		$query = $this->db->get();
		return $query->result();
	}
	public function show_LTMC()
	{
		$this->db->select('*');
		$this->db->from('LEARNING_TECHNOLOGY_MEDIA_CREATOR');
		$this->db->where('DeleteStatus=0');
		$query = $this->db->get();
		return $query->result();
	}
}
