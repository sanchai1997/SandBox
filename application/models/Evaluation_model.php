<?php
class Evaluation_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insert_ass_ria() //sh1
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
		$data = array(
			'CriteriaID' => $this->input->post('CriteriaID'),
			'CriteriaName' => $this->input->post('CriteriaName'),
			'CriteriaDescription' => $this->input->post('CriteriaDescription'),
			'CriteriaLevelAmount' => $this->input->post('CriteriaLevelAmount'),
			'CriteriaCompositionAmount' => $this->input->post('CriteriaCompositionAmount'),
			'CriteriaPassingScorePercentage' => $this->input->post('CriteriaPassingScorePercentage')

		);
		$query = $this->db->insert('ASSESSMENT_CRITERIA', $data);
		if ($query == TRUE) {
			$UserID = $this->session->userdata('UserID');
			$log = [
				'LogMessage' => 'Insert CriteriaID = "' .  $this->input->post('CriteriaID')  . '" CriteriaName = "' . $this->input->post('CriteriaName') . '"',
				'LogUserID' => $UserID,
				'LogIpAddress' => $ip_address,
				'LogCreation' => date('Y-m-d H:i:s')
			];
			$logresult = $this->db->insert('SYS_LOG', $log);
		}
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "เพิ่มข้อมูลสำเร็จ!"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_evaluation_das_p1?page=sh1'));
			// ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function edit_ass_ria() //sh1
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
		$data = array(
			'CriteriaID' => $this->input->post('CriteriaID'),
			'CriteriaName' => $this->input->post('CriteriaName'),
			'CriteriaDescription' => $this->input->post('CriteriaDescription'),
			'CriteriaLevelAmount' => $this->input->post('CriteriaLevelAmount'),
			'CriteriaCompositionAmount' => $this->input->post('CriteriaCompositionAmount'),
			'CriteriaPassingScorePercentage' => $this->input->post('CriteriaPassingScorePercentage')

		);
		$this->db->where('Id', $this->input->post('Id'));
		$query = $this->db->update('ASSESSMENT_CRITERIA', $data);
		if ($query == TRUE) {
			$UserID = $this->session->userdata('UserID');
			$log = [
				'LogMessage' => 'Update CriteriaID =  "' .  $this->input->post('CriteriaID')  . '" CriteriaName = "' . $this->input->post('CriteriaName') . '"',
				'LogUserID' => $UserID,
				'LogIpAddress' => $ip_address,
				'LogCreation' => date('Y-m-d H:i:s')
			];
			$logresult = $this->db->insert('SYS_LOG', $log);
		}
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "แก้ไขสำเร็จ!"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_evaluation_das_p1?page=sh1'));
			// ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function del_ass_ria() //sh1
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
		$status = '1';
		$data = array(

			'DeleteStatus' => $status
		);
		$this->db->where('Id', $this->input->post('Id'));
		$query = $this->db->update('ASSESSMENT_CRITERIA', $data);
		if ($query == TRUE) {
			$UserID = $this->session->userdata('UserID');
			$log = [
				'LogMessage' => 'Delete CriteriaID = "' .  $this->input->post('CriteriaID')  . '" CriteriaName = "' . $this->input->post('CriteriaName') . '"',
				'LogUserID' => $UserID,
				'LogIpAddress' => $ip_address,
				'LogCreation' => date('Y-m-d H:i:s')
			];

			$logresult = $this->db->insert('SYS_LOG', $log);
		}
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "ลบสำเร็จ!"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_evaluation_das_p1?page=sh1'));
			// ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function insert_ass_ria_lvl() //sh2
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
		$data = array(

			'CriteriaID' => $this->input->post('CriteriaID'),
			'LevelIndex' => $this->input->post('LevelIndex'),
			'LevelName' => $this->input->post('LevelName'),
			'LevelScore' => $this->input->post('LevelScore')

		);
		$query = $this->db->insert('ASSESSMENT_CRITERIA_LEVEL', $data);
		if ($query == TRUE) {
			$UserID = $this->session->userdata('UserID');
			$log = [
				'LogMessage' => 'Insert CriteriaID = "' .  $this->input->post('index')  . '" LevelIndex = "' . $this->input->post('LevelIndex') . '"',
				'LogUserID' => $UserID,
				'LogIpAddress' => $ip_address,
				'LogCreation' => date('Y-m-d H:i:s')
			];
			$logresult = $this->db->insert('SYS_LOG', $log);
		}
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "เพิ่มข้อมูลสำเร็จ!"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_evaluation_das_p1?page=sh1'));
			// ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function edit_ass_ria_lvl() //sh2
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
		// สร้างตัวแปร $id_name มาเก็บค่าไว้ก่อน
		$CriteriaID = $this->input->post('CriteriaID');
		$LevelIndex = $this->input->post('LevelIndex');
		$LevelName = $this->input->post('LevelName');

		// นำค่า $id_name มาใช้ในการค้นหาข้อมูลในฐานข้อมูล
		// $this->db->where('CriteriaID', $CriteriaID);
		$this->db->where('LevelName', $LevelName);
		$this->db->where('LevelIndex', $LevelIndex);
		$this->db->where('DeleteStatus=0');
		$this->db->where('CriteriaID !=', $CriteriaID);
		$query = $this->db->get('ASSESSMENT_CRITERIA_LEVEL');

		// นับจำนวนแถวที่ค้นพบ
		$num_chk = $query->num_rows();

		// ตรวจสอบจำนวนแถวที่ค้นพบว่ามีมากกว่า 0 หรือไม่
		if ($num_chk <= 0) {
			// ไม่พบข้อมูลในฐานข้อมูล
			$data = array(

				'CriteriaID' => $this->input->post('CriteriaID'),
				'LevelIndex' => $this->input->post('LevelIndex'),
				'LevelName' => $this->input->post('LevelName'),
				'LevelScore' => $this->input->post('LevelScore')

			);
			$this->db->where('Id_acl', $this->input->post('Id_acl'));
			$query = $this->db->update('ASSESSMENT_CRITERIA_LEVEL', $data);
			if ($query == TRUE) {
				$UserID = $this->session->userdata('UserID');
				$log = [
					'LogMessage' => 'Update CriteriaID =  "' .  $this->input->post('index')  . '" LevelIndex = "' . $this->input->post('LevelIndex') . '"',
					'LogUserID' => $UserID,
					'LogIpAddress' => $ip_address,
					'LogCreation' => date('Y-m-d H:i:s')
				];
				$logresult = $this->db->insert('SYS_LOG', $log);
			}
			if ($query) {
				session_start(); // เริ่มต้น session
				$_SESSION['success'] = "แก้ไขสำเร็จ!"; // กำหนดค่า success ใน session เป็น true
				header("Location: " . site_url('Fm_evaluation_das_p1?page=sh1'));
				// ไปยังหน้าก่อนหน้านี้

			} else {
				echo 'false';
			}
		} else {

			// พบข้อมูลในฐานข้อมูล
			session_start(); // เริ่มต้น session
			$_SESSION['false'] = "ไม่มามารถแก้ไขได้เนื่องจากลำดับองค์ประกอบตัวชี้วัด ซ้ำกันในระบบ !"; // กำหนดค่า success ใน session เป็น true
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			exit;
		}
	}
	public function del_ass_ria_lvl() //sh2
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
		$status = '1';
		$data = array(

			'DeleteStatus' => $status
		);
		$this->db->where('Id_acl', $this->input->post('Id_acl'));
		$query = $this->db->update('ASSESSMENT_CRITERIA_LEVEL', $data);
		if ($query == TRUE) {
			$UserID = $this->session->userdata('UserID');
			$log = [
				'LogMessage' => 'Delete CriteriaID = "' .  $this->input->post('index')  . '" LevelIndex = "' . $this->input->post('LevelIndex') . '"',
				'LogUserID' => $UserID,
				'LogIpAddress' => $ip_address,
				'LogCreation' => date('Y-m-d H:i:s')
			];

			$logresult = $this->db->insert('SYS_LOG', $log);
		}
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "ลบสำเร็จ!"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_evaluation_das_p1?page=sh1'));
			// ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function insert_ass_ria_com() //sh3
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
		$data = array(

			'CriteriaID' => $this->input->post('CriteriaID'),
			'CompositionIndex' => $this->input->post('CompositionIndex'),
			'CompositionName' => $this->input->post('CompositionName'),
			'CompositionWeightScore' => $this->input->post('CompositionWeightScore'),
			'CompositionGuideline' => $this->input->post('CompositionGuideline')


		);
		$query = $this->db->insert('ASSESSMENT_CRITERIA_COMPOSITION', $data);
		if ($query == TRUE) {
			$UserID = $this->session->userdata('UserID');
			$log = [
				'LogMessage' => 'Insert CriteriaID = "' .  $this->input->post('index')  . '" CompositionIndex = "' . $this->input->post('CompositionIndex') . '"',
				'LogUserID' => $UserID,
				'LogIpAddress' => $ip_address,
				'LogCreation' => date('Y-m-d H:i:s')
			];
			$logresult = $this->db->insert('SYS_LOG', $log);
		}
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "เพิ่มข้อมูลเรียบร้อย!"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_evaluation_das_p1?page=sh1'));
			// ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function edit_ass_ria_com() //sh3
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
		// สร้างตัวแปร $id_name มาเก็บค่าไว้ก่อน
		$CriteriaID = $this->input->post('CriteriaID');
		$CompositionIndex = $this->input->post('CompositionIndex');
		$CompositionName = $this->input->post('CompositionName');

		// นำค่า $id_name มาใช้ในการค้นหาข้อมูลในฐานข้อมูล
		$this->db->where('CriteriaID !=', $CriteriaID);
		$this->db->where('CompositionName', $CompositionName);
		$this->db->where('CompositionIndex', $CompositionIndex);
		$this->db->where('DeleteStatus=0');
		$query = $this->db->get('ASSESSMENT_CRITERIA_COMPOSITION');

		// นับจำนวนแถวที่ค้นพบ
		$num_chk = $query->num_rows();

		// ตรวจสอบจำนวนแถวที่ค้นพบว่ามีมากกว่า 0 หรือไม่
		if ($num_chk <= 0) {
			// ไม่พบข้อมูลในฐานข้อมูล
			$data = array(
				'CriteriaID' => $this->input->post('CriteriaID'),
				'CompositionIndex' => $this->input->post('CompositionIndex'),
				'CompositionName' => $this->input->post('CompositionName'),
				'CompositionWeightScore' => $this->input->post('CompositionWeightScore'),
				'CompositionGuideline' => $this->input->post('CompositionGuideline')


			);
			$this->db->where('Id_acc', $this->input->post('Id_acc'));
			$query = $this->db->update('ASSESSMENT_CRITERIA_COMPOSITION', $data);
			if ($query == TRUE) {
				$UserID = $this->session->userdata('UserID');
				$log = [
					'LogMessage' => 'Update CriteriaID =  "' .  $this->input->post('index')  . '" CompositionIndex = "' . $this->input->post('CompositionIndex') . '"',
					'LogUserID' => $UserID,
					'LogIpAddress' => $ip_address,
					'LogCreation' => date('Y-m-d H:i:s')
				];
				$logresult = $this->db->insert('SYS_LOG', $log);
			}
			if ($query) {
				session_start(); // เริ่มต้น session
				$_SESSION['success'] = "แก้ไขสำเร็จ!"; // กำหนดค่า success ใน session เป็น true
				header("Location: " . site_url('Fm_evaluation_das_p1?page=sh1'));
				// ไปยังหน้าก่อนหน้านี้

			} else {
				echo 'false';
			}
		} else {
			// พบข้อมูลในฐานข้อมูล
			session_start(); // เริ่มต้น session
			$_SESSION['false'] = "ไม่มามารถแก้ไขได้เนื่องจากลำดับองค์ประกอบตัวชี้วัด ซ้ำกันในระบบ !"; // กำหนดค่า success ใน session เป็น true
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			exit;
		}
	}
	public function del_ass_ria_com() //sh3
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
		$status = '1';
		$data = array(

			'DeleteStatus' => $status
		);
		$this->db->where('Id_acc', $this->input->post('Id'));
		$query = $this->db->update('ASSESSMENT_CRITERIA_COMPOSITION', $data);
		if ($query == TRUE) {
			$UserID = $this->session->userdata('UserID');
			$log = [
				'LogMessage' => 'Delete CriteriaID = "' .  $this->input->post('index')  . '" CompositionIndex = "' . $this->input->post('CompositionIndex') . '"',
				'LogUserID' => $UserID,
				'LogIpAddress' => $ip_address,
				'LogCreation' => date('Y-m-d H:i:s')
			];

			$logresult = $this->db->insert('SYS_LOG', $log);
		}
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "ลบสำเร็จ!"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_evaluation_das_p1?page=sh1'));
			// ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function insert_ass_ria_com_lvl() //sh4
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
		$data = array(

			'CriteriaID' => $this->input->post('CriteriaID'),
			'CompositionIndex' => $this->input->post('CompositionIndex'),
			'LevelIndex' => $this->input->post('LevelIndex'),
			'CompositionLevelDescription' => $this->input->post('CompositionLevelDescription')


		);
		$query = $this->db->insert('ASSESSMENT_CRITERIA_COMPOSITION_LEVEL', $data);
		if ($query == TRUE) {
			$UserID = $this->session->userdata('UserID');
			$log = [
				'LogMessage' => 'Insert CriteriaID = "' . $this->input->post('CriteriaID') . '" LevelIndex = "' . $this->input->post('LevelIndex') . '", CompositionIndex = "' . $this->input->post('CompositionIndex') . '"',
				'LogUserID' => $UserID,
				'LogIpAddress' => $ip_address,
				'LogCreation' => date('Y-m-d H:i:s')
			];
			$logresult = $this->db->insert('SYS_LOG', $log);
		}
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "เพิ่มข้อมูสำเร็จ!"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_evaluation_das_p1?page=sh1'));
			// ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function edit_ass_ria_com_lvl() //sh4
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
		$data = array(

			'CriteriaID' => $this->input->post('CriteriaID'),
			'CompositionIndex' => $this->input->post('CompositionIndex'),
			'LevelIndex' => $this->input->post('LevelIndex'),
			'CompositionLevelDescription' => $this->input->post('CompositionLevelDescription')


		);
		$this->db->where('Id_accl', $this->input->post('Id_accl'));
		$query = $this->db->update('ASSESSMENT_CRITERIA_COMPOSITION_LEVEL', $data);
		if ($query == TRUE) {
			$UserID = $this->session->userdata('UserID');
			$log = [
				'LogMessage' => 'Update CriteriaID = "' . $this->input->post('CriteriaID') . '" LevelIndex = "' . $this->input->post('LevelIndex') . '", CompositionIndex = "' . $this->input->post('CompositionIndex') . '"',
				'LogUserID' => $UserID,
				'LogIpAddress' => $ip_address,
				'LogCreation' => date('Y-m-d H:i:s')
			];
			$logresult = $this->db->insert('SYS_LOG', $log);
		}
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "แก้ไขสำเร็จ!"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_evaluation_das_p1?page=sh1'));
			// ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function del_ass_ria_com_lvl() //sh4
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
		$status = '1';
		$data = array(

			'DeleteStatus' => $status
		);
		$this->db->where('Id_accl', $this->input->post('Id_accl'));
		$query = $this->db->update('ASSESSMENT_CRITERIA_COMPOSITION_LEVEL', $data);
		if ($query == TRUE) {
			$UserID = $this->session->userdata('UserID');
			$log = [
				'LogMessage' => 'Delete CriteriaID = "' . $this->input->post('CriteriaID') . '" LevelIndex = "' . $this->input->post('LevelIndex') . '", CompositionIndex = "' . $this->input->post('CompositionIndex') . '"',
				'LogUserID' => $UserID,
				'LogIpAddress' => $ip_address,
				'LogCreation' => date('Y-m-d H:i:s')
			];

			$logresult = $this->db->insert('SYS_LOG', $log);
		}
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "ลบข้อมูลสำเร็จ!"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_evaluation_das_p1?page=sh1'));
			// ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function insert_sc_ass() //sh5
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
		// สร้างตัวแปร $id_name มาเก็บค่าไว้ก่อน
		$SchoolAssessmentEducationYear = $this->input->post('SchoolAssessmentEducationYear');
		$SchoolAssessmentSemester = $this->input->post('SchoolAssessmentSemester');
		$SchoolID = $this->input->post('SchoolID');
		$SchoolAssessmentName = $this->input->post('SchoolAssessmentName');
		// นำค่า $id_name มาใช้ในการค้นหาข้อมูลในฐานข้อมูล
		$this->db->where('SchoolAssessmentEducationYear', $SchoolAssessmentEducationYear);
		$this->db->where('SchoolAssessmentSemester', $SchoolAssessmentSemester);
		$this->db->where('SchoolID', $SchoolID);
		$this->db->where('SchoolAssessmentName', $SchoolAssessmentName);
		$query = $this->db->get('SCHOOL_ASSESSMENT');

		// นับจำนวนแถวที่ค้นพบ
		$num_chk = $query->num_rows();

		// ตรวจสอบจำนวนแถวที่ค้นพบว่ามีมากกว่า 0 หรือไม่
		if ($num_chk <= 0) {
			// ไม่พบข้อมูลในฐานข้อมูล
			$data = array(
				'SchoolAssessmentEducationYear' => $this->input->post('SchoolAssessmentEducationYear'),
				'SchoolAssessmentSemester' => $this->input->post('SchoolAssessmentSemester'),
				'SchoolID' => $this->input->post('SchoolID'),
				'SchoolAssessmentName' => $this->input->post('SchoolAssessmentName'),
				'SchoolAssessmentDescription' => $this->input->post('SchoolAssessmentDescription')


			);
			$query = $this->db->insert('SCHOOL_ASSESSMENT', $data);

			if ($query == TRUE) {
				$UserID = $this->session->userdata('UserID');
				$log = [
					'LogMessage' => 'Insert [SCHOOL_ASSESSMENT] SchoolAssessmentEducationYear = "' . $this->input->post('SchoolAssessmentEducationYear') . '" SchoolAssessmentSemester = "' . $this->input->post('SchoolAssessmentSemester') . '", SchoolID = "' . $this->input->post('SchoolID') . '"',
					'LogUserID' => $UserID,
					'LogIpAddress' => $ip_address,
					'LogCreation' => date('Y-m-d H:i:s')
				];
				$logresult = $this->db->insert('SYS_LOG', $log);
			}
			if ($query) {
				session_start(); // เริ่มต้น session
				$_SESSION['success'] = "เพิ่มข้อมูลเรียบร้อย!"; // กำหนดค่า success ใน session เป็น true
				header("Location: " . site_url('Fm_evaluation_das_p4?page=sh4'));
				// ไปยังหน้าก่อนหน้านี้

			} else {
				echo 'false';
			}
		} else {
			// พบข้อมูลในฐานข้อมูล
			session_start(); // เริ่มต้น session
			$_SESSION['false'] = "ไม่มามารถบันทึกข้อมูลได้โปรดตรวจสอบข้อมูล (ปีการศึกษา/ภาคเรียน/สถานศึกษา/ชื่อการประเมิน) ซ้ำกันในระบบ !"; // กำหนดค่า success ใน session เป็น true
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			exit;
		}
	}
	public function edit_sc_ass() //sh5
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
		$data = array(
			'SchoolAssessmentEducationYear' => $this->input->post('SchoolAssessmentEducationYear'),
			'SchoolAssessmentSemester' => $this->input->post('SchoolAssessmentSemester'),
			'SchoolID' => $this->input->post('SchoolID'),
			'SchoolAssessmentName' => $this->input->post('SchoolAssessmentName'),
			'SchoolAssessmentDescription' => $this->input->post('SchoolAssessmentDescription')


		);
		$this->db->where('Id_sa', $this->input->post('Id_sa'));
		$query = $this->db->update('SCHOOL_ASSESSMENT', $data);
		if ($query == TRUE) {
			$UserID = $this->session->userdata('UserID');
			$log = [
				'LogMessage' => 'Update  [SCHOOL_ASSESSMENT] SchoolAssessmentEducationYear = "' . $this->input->post('SchoolAssessmentEducationYear') . '" SchoolAssessmentSemester = "' . $this->input->post('SchoolAssessmentSemester') . '", SchoolID = "' . $this->input->post('SchoolID') . '"',
				'LogUserID' => $UserID,
				'LogIpAddress' => $ip_address,
				'LogCreation' => date('Y-m-d H:i:s')
			];
			$logresult = $this->db->insert('SYS_LOG', $log);
		}
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "แก้ไขสำเร็จ!"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_evaluation_das_p4?page=sh4'));
			// ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function del_sc_ass() //sh5
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
		$status = '1';
		$data = array(

			'DeleteStatus' => $status
		);
		$this->db->where('Id_sa', $this->input->post('Id_sa'));
		$query = $this->db->update('SCHOOL_ASSESSMENT', $data);
		if ($query == TRUE) {
			$UserID = $this->session->userdata('UserID');
			$log = [
				'LogMessage' => 'Delete  [SCHOOL_ASSESSMENT] SchoolAssessmentEducationYear = "' . $this->input->post('SchoolAssessmentEducationYear') . '" SchoolAssessmentSemester = "' . $this->input->post('SchoolAssessmentSemester') . '", SchoolID = "' . $this->input->post('SchoolID') . '"',
				'LogUserID' => $UserID,
				'LogIpAddress' => $ip_address,
				'LogCreation' => date('Y-m-d H:i:s')
			];

			$logresult = $this->db->insert('SYS_LOG', $log);
		}
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "ลบสำเร็จ!"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_evaluation_das_p4?page=sh4'));
			// ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function insert_sc_ass_ria() //sh6
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
		$SchoolAssessmentEducationYear  = $this->input->post('SchoolAssessmentEducationYear');
		$SchoolAssessmentSemester = $this->input->post('SchoolAssessmentSemester');
		$SchoolID  = $this->input->post('SchoolID');


		// นำค่า $id_name มาใช้ในการค้นหาข้อมูลในฐานข้อมูล
		$this->db->where('SchoolAssessmentEducationYear', $SchoolAssessmentEducationYear);
		$this->db->where('SchoolAssessmentSemester', $SchoolAssessmentSemester);
		$this->db->where('SchoolID', $SchoolID);
		$this->db->where('DeleteStatus', 0);
		$query = $this->db->get('SCHOOL_ASSESSMENT_CRITERIA');

		// นับจำนวนแถวที่ค้นพบ
		$num_chk = $query->num_rows();

		// ตรวจสอบจำนวนแถวที่ค้นพบว่ามีมากกว่า 0 หรือไม่
		if ($num_chk <= 0) {

			// ไม่พบข้อมูลในฐานข้อมูล
			if (isset($_FILES['SchoolAssessmentAttachmentURL'])) {
				$file = $_FILES['SchoolAssessmentAttachmentURL']['tmp_name'];
				if (file_exists($file)) {
					$config['upload_path'] = 'assets/EII/SCHOOL_ASSESSMENT_CRITERIA/';
					$config['allowed_types'] = 'doc|docx|pdf|jpg|png|xls|ppt|zip|xlsx';
					$config['encrypt_name'] = TRUE;

					$this->load->library('upload', $config);

					if (!$this->upload->do_upload('SchoolAssessmentAttachmentURL')) {
						echo $this->upload->display_errors();
					} else {

						$data = $this->upload->data();
						$filename = $data['file_name'];
						$data = array(

							'SchoolAssessmentEducationYear' => $this->input->post('SchoolAssessmentEducationYear'),
							'SchoolAssessmentSemester' => $this->input->post('SchoolAssessmentSemester'),
							'SchoolID' => $this->input->post('SchoolID'),
							'CriteriaID' => $this->input->post('CriteriaID'),
							'AssessmentorName' => $this->input->post('AssessmentorName'),
							'SchoolAssessmentScore' => $this->input->post('SchoolAssessmentScore'),
							'SchoolAssessmentCode' => $this->input->post('SchoolAssessmentCode'),
							'SchoolAssessmentAttachmentURL' =>  $filename


						);
					}
				} else {
					$data = array(

						'SchoolAssessmentEducationYear' => $this->input->post('SchoolAssessmentEducationYear'),
						'SchoolAssessmentSemester' => $this->input->post('SchoolAssessmentSemester'),
						'SchoolID' => $this->input->post('SchoolID'),
						'CriteriaID' => $this->input->post('CriteriaID'),
						'AssessmentorName' => $this->input->post('AssessmentorName'),
						'SchoolAssessmentScore' => $this->input->post('SchoolAssessmentScore'),
						'SchoolAssessmentCode' => $this->input->post('SchoolAssessmentCode')
					);
				}
			}
			$query = $this->db->insert('SCHOOL_ASSESSMENT_CRITERIA', $data);
			if ($query == TRUE) {
				$UserID = $this->session->userdata('UserID');
				$log = [
					'LogMessage' => 'Insert [SCHOOL_ASSESSMENT_CRITERIA] SchoolAssessmentEducationYear = "' . $this->input->post('SchoolAssessmentEducationYear') . '" SchoolAssessmentSemester = "' . $this->input->post('SchoolAssessmentSemester') . '", SchoolID = "' . $this->input->post('SchoolID') . '"',
					'LogUserID' => $UserID,
					'LogIpAddress' => $ip_address,
					'LogCreation' => date('Y-m-d H:i:s')
				];
				$logresult = $this->db->insert('SYS_LOG', $log);
			}
			if ($query) {
				session_start(); // เริ่มต้น session
				$_SESSION['success'] = "เพิ่มข้อมูลเรียบร้อย!"; // กำหนดค่า success ใน session เป็น true
				header("Location: " . site_url('Fm_evaluation_das_p5?page=sh5'));
				// ไปยังหน้าก่อนหน้านี้

			} else {
				echo 'false';
			}
		} else {
			// พบข้อมูลในฐานข้อมูล
			session_start(); // เริ่มต้น session
			$_SESSION['false'] = "มีการประเมินคำสั่งชุดนี้ไปแล้ว !"; // กำหนดค่า success ใน session เป็น true
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			exit;
		}
	}

	public function edit_sc_ass_ria() //sh6
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
		if (isset($_FILES['SchoolAssessmentAttachmentURL'])) {
			$file = $_FILES['SchoolAssessmentAttachmentURL']['tmp_name'];
			if (file_exists($file)) {
				$config['upload_path'] = 'assets/EII/SCHOOL_ASSESSMENT_CRITERIA/';
				$config['allowed_types'] = 'doc|docx|pdf|jpg|png|xls|ppt|zip|xlsx';
				$config['encrypt_name'] = TRUE;

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('SchoolAssessmentAttachmentURL')) {
					echo $this->upload->display_errors();
				} else {
					$oil_file = $this->input->post('oil_file');
					unlink('assets/EII/SCHOOL_ASSESSMENT_CRITERIA/' . $oil_file);
					$data = $this->upload->data();
					$filename = $data['file_name'];
					$data = array(
						'SchoolAssessmentEducationYear' => $this->input->post('SchoolAssessmentEducationYear'),
						'SchoolAssessmentSemester' => $this->input->post('SchoolAssessmentSemester'),
						'SchoolID' => $this->input->post('SchoolID'),
						'CriteriaID' => $this->input->post('CriteriaID'),
						'AssessmentorName' => $this->input->post('AssessmentorName'),
						'SchoolAssessmentScore' => $this->input->post('SchoolAssessmentScore'),
						'SchoolAssessmentCode' => $this->input->post('SchoolAssessmentCode'),
						'SchoolAssessmentAttachmentURL' =>  $filename


					);
				}
			} else {
				$data = array(
					'SchoolAssessmentEducationYear' => $this->input->post('SchoolAssessmentEducationYear'),
					'SchoolAssessmentSemester' => $this->input->post('SchoolAssessmentSemester'),
					'SchoolID' => $this->input->post('SchoolID'),
					'CriteriaID' => $this->input->post('CriteriaID'),
					'AssessmentorName' => $this->input->post('AssessmentorName'),
					'SchoolAssessmentScore' => $this->input->post('SchoolAssessmentScore'),
					'SchoolAssessmentCode' => $this->input->post('SchoolAssessmentCode')
				);
			}
		}

		$this->db->where('Id_sac', $this->input->post('Id_sac'));
		$query = $this->db->update('SCHOOL_ASSESSMENT_CRITERIA', $data);
		if ($query == TRUE) {
			$UserID = $this->session->userdata('UserID');
			$log = [
				'LogMessage' => 'Update  [SCHOOL_ASSESSMENT_CRITERIA] SchoolAssessmentEducationYear = "' . $this->input->post('SchoolAssessmentEducationYear') . '" SchoolAssessmentSemester = "' . $this->input->post('SchoolAssessmentSemester') . '", SchoolID = "' . $this->input->post('SchoolID') . '"',
				'LogUserID' => $UserID,
				'LogIpAddress' => $ip_address,
				'LogCreation' => date('Y-m-d H:i:s')
			];
			$logresult = $this->db->insert('SYS_LOG', $log);
		}
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "แก้ไขข้อมูลสำเร็จ!"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_evaluation_das_p5?page=sh5'));
			// ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function del_sc_ass_ria()
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
		// 	print_r($_POST);
		// 	echo'</pre>';
		// 	exit;
		$status = '1';
		$data = array(

			'DeleteStatus' => $status
		);
		$this->db->where('Id_sac', $this->input->post('Id_sac'));
		$query = $this->db->update('SCHOOL_ASSESSMENT_CRITERIA', $data);
		if ($query) {

			$this->db->where('SchoolAssessmentEducationYear', $this->input->post('SchoolAssessmentEducationYear'));
			$this->db->where('SchoolAssessmentSemester', $this->input->post('SchoolAssessmentSemester'));
			$this->db->where('SchoolID', $this->input->post('SchoolID'));
			$querys = $this->db->update('SCHOOL_ASSESSMENT_RESULT', $data);
			if ($query == TRUE) {
				$UserID = $this->session->userdata('UserID');
				$log = [
					'LogMessage' => 'Delete  [SCHOOL_ASSESSMENT_CRITERIA] SchoolAssessmentEducationYear = "' . $this->input->post('SchoolAssessmentEducationYear') . '" SchoolAssessmentSemester = "' . $this->input->post('SchoolAssessmentSemester') . '", SchoolID = "' . $this->input->post('SchoolID') . '"',
					'LogUserID' => $UserID,
					'LogIpAddress' => $ip_address,
					'LogCreation' => date('Y-m-d H:i:s')
				];

				$logresult = $this->db->insert('SYS_LOG', $log);
			}
			if ($querys) {

				session_start(); // เริ่มต้น session
				$_SESSION['success'] = "ลบข้อมูลสำเร็จ!"; // กำหนดค่า success ใน session เป็น true
				header("Location: " . site_url('Fm_evaluation_das_p5?page=sh5'));
				// ไปยังหน้าก่อนหน้านี้
			}
		} else {
			echo 'false';
		}
	}
	public function insert_sc_ass_res() //sh7
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
		// สร้างตัวแปร $id_name มาเก็บค่าไว้ก่อน

		$SchoolAssessmentEducationYear = $this->input->post('SchoolAssessmentEducationYear');
		$SchoolAssessmentSemester = $this->input->post('SchoolAssessmentSemester');
		$SchoolID = $this->input->post('SchoolID');
		$CriteriaID = $this->input->post('CriteriaID');
		$CompositionIndex = $this->input->post('CompositionIndex');
		$LevelIndex = $this->input->post('LevelIndex');

		// นำค่า  มาใช้ในการค้นหาข้อมูลในฐานข้อมูล
		$this->db->where('SchoolAssessmentEducationYear', $SchoolAssessmentEducationYear);
		$this->db->where('SchoolAssessmentSemester', $SchoolAssessmentSemester);
		$this->db->where('SchoolID', $SchoolID);
		$this->db->where('CriteriaID', $CriteriaID);
		$this->db->where('LevelIndex !=', 0);
		$this->db->where('LevelIndex', $LevelIndex);
		$this->db->where('DeleteStatus', 0);
		$query = $this->db->get('SCHOOL_ASSESSMENT_RESULT');

		// นับจำนวนแถวที่ค้นพบ
		$num_chk = $query->num_rows();

		// ตรวจสอบจำนวนแถวที่ค้นพบว่ามีมากกว่า 0 หรือไม่
		if ($num_chk <= 0) {

			$this->db->where('SchoolAssessmentEducationYear', $SchoolAssessmentEducationYear);
			$this->db->where('SchoolAssessmentSemester', $SchoolAssessmentSemester);
			$this->db->where('SchoolID', $SchoolID);
			$this->db->where('CriteriaID', $CriteriaID);
			$this->db->where('CompositionIndex', $CompositionIndex);
			$this->db->where('CompositionIndex !=', 0);
			$this->db->where('DeleteStatus', 0);
			$query1 = $this->db->get('SCHOOL_ASSESSMENT_RESULT');
			$num_chk1 = $query1->num_rows();
			if ($num_chk1 <= 0) {
				// ไม่พบข้อมูลในฐานข้อมูล
				$data = array(
					'SchoolAssessmentEducationYear' => $this->input->post('SchoolAssessmentEducationYear'),
					'SchoolAssessmentSemester' => $this->input->post('SchoolAssessmentSemester'),
					'SchoolID' => $this->input->post('SchoolID'),
					'CriteriaID' => $this->input->post('CriteriaID'),
					'CompositionIndex' => $this->input->post('CompositionIndex'),
					'LevelIndex' => $this->input->post('LevelIndex')



				);
				$query = $this->db->insert('SCHOOL_ASSESSMENT_RESULT', $data);
				if ($query == TRUE) {
					$UserID = $this->session->userdata('UserID');
					$log = [
						'LogMessage' => 'Insert [SCHOOL_ASSESSMENT_RESULT] SchoolAssessmentEducationYear = "' . $this->input->post('SchoolAssessmentEducationYear') . '" SchoolAssessmentSemester = "' . $this->input->post('SchoolAssessmentSemester') . '", SchoolID = "' . $this->input->post('SchoolID') . '"',
						'LogUserID' => $UserID,
						'LogIpAddress' => $ip_address,
						'LogCreation' => date('Y-m-d H:i:s')
					];
					$logresult = $this->db->insert('SYS_LOG', $log);
				}
				if ($query) {
					session_start(); // เริ่มต้น session
					$_SESSION['success'] = "เพิ่มข้อมูลเรียบร้อย!"; // กำหนดค่า success ใน session เป็น true
					header("Location: " . site_url('Fm_evaluation_das_p5?page=sh5'));
					// ไปยังหน้าก่อนหน้านี้

				} else {
					echo 'false';
				}
			} else {
				// พบข้อมูลในฐานข้อมูล
				session_start(); // เริ่มต้น session
				$_SESSION['false'] = "ไม่มามารถบันทึกข้อมูลได้โปรดตรวจสอบข้อมูล (ลำดับองค์ประกอบตัวชี้วัด) ซ้ำกันในระบบ !"; // กำหนดค่า success ใน session เป็น true
				header('Location: ' . $_SERVER['HTTP_REFERER']);
				exit;
			}
		} else {
			//   // พบข้อมูลในฐานข้อมูล
			session_start(); // เริ่มต้น session
			$_SESSION['false'] = "ไม่มามารถบันทึกข้อมูลได้โปรดตรวจสอบข้อมูล (ลำดับของระดับตัวชี้วัดที่ได้) ซ้ำกันในระบบ !"; // กำหนดค่า success ใน session เป็น true
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			exit;
		}
	}
	public function edit_sc_ass_res() //sh7
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

		$data = array(
			'SchoolAssessmentEducationYear' => $this->input->post('SchoolAssessmentEducationYear'),
			'SchoolAssessmentSemester' => $this->input->post('SchoolAssessmentSemester'),
			'SchoolID' => $this->input->post('SchoolID'),
			'CriteriaID' => $this->input->post('CriteriaID'),
			'CompositionIndex' => $this->input->post('CompositionIndex'),
			'LevelIndex' => $this->input->post('LevelIndex')



		);
		$this->db->where('Id_sar', $this->input->post('Id_sar'));
		$query = $this->db->update('SCHOOL_ASSESSMENT_RESULT', $data);
		if ($query == TRUE) {
			$UserID = $this->session->userdata('UserID');
			$log = [
				'LogMessage' => 'Update  [SCHOOL_ASSESSMENT_RESULT] SchoolAssessmentEducationYear = "' . $this->input->post('SchoolAssessmentEducationYear') . '" SchoolAssessmentSemester = "' . $this->input->post('SchoolAssessmentSemester') . '", SchoolID = "' . $this->input->post('SchoolID') . '"',
				'LogUserID' => $UserID,
				'LogIpAddress' => $ip_address,
				'LogCreation' => date('Y-m-d H:i:s')
			];
			$logresult = $this->db->insert('SYS_LOG', $log);
		}
		if ($query) {
			// สอบถามข้อมูลจากตาราง
			$this->db->where('CompositionIndex', 0);
			$this->db->where('LevelIndex', 0);
			$query = $this->db->get('SCHOOL_ASSESSMENT_RESULT');

			// ตรวจสอบว่ามีแถวที่ตรงกับเงื่อนไขหรือไม่
			if ($query->num_rows() > 0) {
				// วนลูปแต่ละแถว
				foreach ($query->result() as $row) {
					// ลบแถวที่ตรงกับเงื่อนไข
					$this->db->where('Id_sar', $row->Id_sar);
					$this->db->delete('SCHOOL_ASSESSMENT_RESULT');
				}
			}
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "แก้ไขสำเร็จ!"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_evaluation_das_p5?page=sh5'));
			// ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}

	public function del_sc_ass_res() //sh7
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
		$status = '1';
		$data = array(

			'DeleteStatus' => $status
		);
		$this->db->where('Id_sar', $this->input->post('Id_sar'));
		$query = $this->db->update('SCHOOL_ASSESSMENT_RESULT', $data);
		if ($query == TRUE) {
			$UserID = $this->session->userdata('UserID');
			$log = [
				'LogMessage' => 'Delete  [SCHOOL_ASSESSMENT_RESULT] SchoolAssessmentEducationYear = "' . $this->input->post('SchoolAssessmentEducationYear') . '" SchoolAssessmentSemester = "' . $this->input->post('SchoolAssessmentSemester') . '", SchoolID = "' . $this->input->post('SchoolID') . '"',
				'LogUserID' => $UserID,
				'LogIpAddress' => $ip_address,
				'LogCreation' => date('Y-m-d H:i:s')
			];

			$logresult = $this->db->insert('SYS_LOG', $log);
		}
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "ลบข้อมูลสำเร็จ!"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_evaluation_das_p5?page=sh5'));
			// ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function insert_achie_ass() //sh8
	{
		$ip_address = '';
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip_address = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip_address = $_SERVER['REMOTE_ADDR'];
		}
		//   echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		if (isset($_FILES['AchievementAssessmentAttachmentURL'])) {
			$file = $_FILES['AchievementAssessmentAttachmentURL']['tmp_name'];
			if (file_exists($file)) {

				$config['upload_path'] = 'assets/EII/ACHIEVEMENT_ASSESSMENT/';
				$config['allowed_types'] = 'doc|docx|pdf|jpg|png|xls|ppt|zip|xlsx';
				$config['encrypt_name'] = TRUE;

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('AchievementAssessmentAttachmentURL')) {
					echo $this->upload->display_errors();
				} else {

					$data = $this->upload->data();
					$filename = $data['file_name'];
					$data = array(
						'AchievementAssessmentYear' => $this->input->post('AchievementAssessmentYear'),
						'SchoolID' => $this->input->post('SchoolID'),
						'SchoolAssessmentName' => $this->input->post('SchoolAssessmentName'),
						'SchoolAssessmentDescription' => $this->input->post('SchoolAssessmentDescription'),
						'AssessmentorName' => $this->input->post('AssessmentorName'),
						'AchievementAssessmentPassingFlag' => $this->input->post('AchievementAssessmentPassingFlag'),
						'AchievementAssessmentAttachmentURL' => $filename

					);
				}
			} else {
				$data = array(
					'AchievementAssessmentYear' => $this->input->post('AchievementAssessmentYear'),
					'SchoolID' => $this->input->post('SchoolID'),
					'SchoolAssessmentName' => $this->input->post('SchoolAssessmentName'),
					'SchoolAssessmentDescription' => $this->input->post('SchoolAssessmentDescription'),
					'AssessmentorName' => $this->input->post('AssessmentorName'),
					'AchievementAssessmentPassingFlag' => $this->input->post('AchievementAssessmentPassingFlag')
				);
			}
		}
		$query = $this->db->insert('ACHIEVEMENT_ASSESSMENT', $data);
		if ($query == TRUE) {
			$UserID = $this->session->userdata('UserID');
			$log = [
				'LogMessage' => 'Insert [ACHIEVEMENT_ASSESSMENT] AchievementAssessmentYear = "' . $this->input->post('AchievementAssessmentYear') . '" SchoolAssessmentSemester = "' . $this->input->post('SchoolAssessmentSemester') . '", SchoolID = "' . $this->input->post('SchoolID') . '", SchoolAssessmentName = "' . $this->input->post('SchoolAssessmentName') . '"',
				'LogUserID' => $UserID,
				'LogIpAddress' => $ip_address,
				'LogCreation' => date('Y-m-d H:i:s')
			];

			$logresult = $this->db->insert('SYS_LOG', $log);
		}
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "เพิ่มข้อมูลเรียบร้อย !"; // กำหนดค่า success ใน session เป็น true
			header("Location:" . site_url('Fm_evaluation_das_p8?page=sh8')); // ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}

	public function edit_achie_ass() //sh8
	{
		$ip_address = '';
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip_address = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip_address = $_SERVER['REMOTE_ADDR'];
		}
		if (isset($_FILES['AchievementAssessmentAttachmentURL'])) {
			$file = $_FILES['AchievementAssessmentAttachmentURL']['tmp_name'];
			if (file_exists($file)) {
				$config['upload_path'] = 'assets/EII/ACHIEVEMENT_ASSESSMENT/';
				$config['allowed_types'] = 'doc|docx|pdf|jpg|png|xls|ppt|zip|xlsx';
				$config['encrypt_name'] = TRUE;

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('AchievementAssessmentAttachmentURL')) {
					echo $this->upload->display_errors();
				} else {
					$oil_file = $this->input->post('oil_file');
					unlink('assets/EII/ACHIEVEMENT_ASSESSMENT/' . $oil_file);

					$data = $this->upload->data();
					$filename = $data['file_name'];
					$data = array(
						'AchievementAssessmentYear' => $this->input->post('AchievementAssessmentYear'),
						'SchoolAssessmentSemester' => $this->input->post('SchoolAssessmentSemester'),
						'SchoolID' => $this->input->post('SchoolID'),
						'SchoolAssessmentName' => $this->input->post('SchoolAssessmentName'),
						'SchoolAssessmentDescription' => $this->input->post('SchoolAssessmentDescription'),
						'AssessmentorName' => $this->input->post('AssessmentorName'),
						'AchievementAssessmentPassingFlag' => $this->input->post('AchievementAssessmentPassingFlag'),
						'AchievementAssessmentAttachmentURL' =>  $filename

					);
				}
			} else {
				$data = array(
					'AchievementAssessmentYear' => $this->input->post('AchievementAssessmentYear'),
					'SchoolAssessmentSemester' => $this->input->post('SchoolAssessmentSemester'),
					'SchoolID' => $this->input->post('SchoolID'),
					'SchoolAssessmentName' => $this->input->post('SchoolAssessmentName'),
					'SchoolAssessmentDescription' => $this->input->post('SchoolAssessmentDescription'),
					'AssessmentorName' => $this->input->post('AssessmentorName'),
					'AchievementAssessmentPassingFlag' => $this->input->post('AchievementAssessmentPassingFlag')
				);
			}
		}
		$this->db->where('Id', $this->input->post('Id'));
		$query = $this->db->update('ACHIEVEMENT_ASSESSMENT', $data);
		if ($query == TRUE) {
			$UserID = $this->session->userdata('UserID');
			$log = [
				'LogMessage' => 'Update [ACHIEVEMENT_ASSESSMENT] AchievementAssessmentYear = "' . $this->input->post('AchievementAssessmentYear') . '" SchoolAssessmentSemester = "' . $this->input->post('SchoolAssessmentSemester') . '", SchoolID = "' . $this->input->post('SchoolID') . '", SchoolAssessmentName = "' . $this->input->post('SchoolAssessmentName') . '"',
				'LogUserID' => $UserID,
				'LogIpAddress' => $ip_address,
				'LogCreation' => date('Y-m-d H:i:s')
			];
			$logresult = $this->db->insert('SYS_LOG', $log);
		}
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "แก้ไขสำเร็จ!"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_evaluation_das_p8?page=sh8'));
			// ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function del_achie_ass() //sh8
	{
		$ip_address = '';
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip_address = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip_address = $_SERVER['REMOTE_ADDR'];
		}

		// 	  echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		$status = '1';
		$data = array(

			'DeleteStatus' => $status
		);
		$this->db->where('Id', $this->input->post('Id'));
		$query = $this->db->update('ACHIEVEMENT_ASSESSMENT', $data);
		if ($query == TRUE) {
			$UserID = $this->session->userdata('UserID');
			$log = [
				'LogMessage' => 'Delete  [ACHIEVEMENT_ASSESSMENT] AchievementAssessmentYear = "' . $this->input->post('AchievementAssessmentYear') . '" SchoolAssessmentSemester = "' . $this->input->post('SchoolAssessmentSemester') . '", SchoolID = "' . $this->input->post('SchoolID') . '", SchoolAssessmentName = "' . $this->input->post('SchoolAssessmentName') . '"',
				'LogUserID' => $UserID,
				'LogIpAddress' => $ip_address,
				'LogCreation' => date('Y-m-d H:i:s')
			];

			$logresult = $this->db->insert('SYS_LOG', $log);
		}
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "ลบข้อมูลสำเร็จ!"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_evaluation_das_p8?page=sh8'));
			// ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function show_ass_ria()
	{
		$this->db->select('*');
		$this->db->from('ASSESSMENT_CRITERIA ');
		$this->db->where('DeleteStatus = 0');
		$query = $this->db->get();


		$this->db->select('*');
		$this->db->from('ASSESSMENT_CRITERIA ');
		$this->db->where('DeleteStatus = 0');
		$query = $this->db->get();
		return $query->result();
	}
	public function show_ass_ria_lvl() //sh2
	{
		$this->db->select('*');
		$this->db->from('ASSESSMENT_CRITERIA_LEVEL as ass_ria_lvl');
		$this->db->where('DeleteStatus = 0');
		$query = $this->db->get();
		return $query->result();
	}
	public function show_ass_ria_com() //sh3
	{
		$this->db->select('*');
		$this->db->from('ASSESSMENT_CRITERIA_COMPOSITION as ass_ria_com');
		$this->db->where('DeleteStatus = 0');
		$query = $this->db->get();
		return $query->result();
	}
	public function show_ass_ria_com_lvl() //sh4
	{
		$this->db->select('*');
		$this->db->from('ASSESSMENT_CRITERIA_COMPOSITION_LEVEL as ass_ria_com_lvl');
		$this->db->where('DeleteStatus = 0');
		$query = $this->db->get();
		return $query->result();
	}
	public function show_sc_ass() //sh5
	{
		$this->db->select('*');
		$this->db->from('SCHOOL_ASSESSMENT as sc_ass');
		$this->db->where('DeleteStatus = 0');
		$query = $this->db->get();
		return $query->result();
	}
	public function show_sc_ass_ria() //sh6
	{
		$this->db->select('*');
		$this->db->from('SCHOOL_ASSESSMENT_CRITERIA as sc_ass_ria');
		$this->db->where('DeleteStatus = 0');
		$query = $this->db->get();
		return $query->result();
	}
	public function show_sc_ass_res() //sh7
	{
		$this->db->select('*');
		$this->db->from('SCHOOL_ASSESSMENT_RESULT as sc_ass_res');
		$this->db->where('DeleteStatus = 0');
		$query = $this->db->get();
		return $query->result();
	}
	public function show_achie_ass() //sh8
	{
		$this->db->select('*');
		$this->db->from('ACHIEVEMENT_ASSESSMENT as achie_ass');
		$this->db->where('DeleteStatus = 0');
		$query = $this->db->get();
		return $query->result();
	}
	public function show_index() //sh0
	{
		$this->db->select('ass_ria.*,ass_ria_lvl.*,ass_ria_com.*,ass_ria_com_lvl.*,sc_ass.*,sc_ass_ria.*,sc_ass_res.*,achie_ass.*');
		$this->db->from('ASSESSMENT_CRITERIA as ass_ria');
		$this->db->join('ASSESSMENT_CRITERIA_LEVEL as ass_ria_lvl', 'ass_ria.CriteriaID=ass_ria_lvl.CriteriaID');
		$this->db->join('ASSESSMENT_CRITERIA_COMPOSITION as ass_ria_com', 'ass_ria_lvl.CriteriaID=ass_ria_com.CriteriaID');
		$this->db->join('ASSESSMENT_CRITERIA_COMPOSITION_LEVEL as ass_ria_com_lvl', 'ass_ria_com.CriteriaID=ass_ria_com_lvl.CriteriaID');
		$this->db->join('SCHOOL_ASSESSMENT_CRITERIA as sc_ass_ria', 'ass_ria_com_lvl.CriteriaID=sc_ass_ria.CriteriaID');
		$this->db->join('SCHOOL_ASSESSMENT_RESULT as sc_ass_res', 'sc_ass_ria.CriteriaID=sc_ass_res.CriteriaID');
		$this->db->join('ACHIEVEMENT_ASSESSMENT as achie_ass', 'sc_ass_res.SchoolID=achie_ass.SchoolID');
		$this->db->join('SCHOOL_ASSESSMENT as sc_ass', 'sc_ass_res.SchoolID=sc_ass.SchoolID');
		$query = $this->db->get();
		return $query->result();
	}
	public function get_ACHIEVEMENT_ASSESSMENT($SchoolAssessmentEducationYear, $SchoolAssessmentSemester, $SchoolID)
	{
		$query = $this->db->get_where('SCHOOL_ASSESSMENT_CRITERIA', array(
			'SchoolAssessmentEducationYear' => $SchoolAssessmentEducationYear,
			'SchoolAssessmentSemester' => $SchoolAssessmentSemester,
			'SchoolID' => $SchoolID
		));
		$result = $query->row_array();
		return array(
			'AssessmentorName' => $result['AssessmentorName'],
			'SchoolAssessmentScore' => $result['SchoolAssessmentScore']
		);
	}
	public function get_ACHIEVEMENT_ASSESSMENT1($SchoolAssessmentEducationYear, $SchoolAssessmentSemester, $SchoolID)
	{
		$query = $this->db->get_where('SCHOOL_ASSESSMENT', array(
			'SchoolAssessmentEducationYear' => $SchoolAssessmentEducationYear,
			'SchoolAssessmentSemester' => $SchoolAssessmentSemester,
			'SchoolID' => $SchoolID
		));
		$result = $query->row_array();
		return array(
			'SchoolAssessmentName' => $result['SchoolAssessmentName'],
			'SchoolAssessmentDescription' => $result['SchoolAssessmentDescription']
		);
	}
	// public function down_csv_criteria()
	// {
	// 	require_once 'path/to/PHPExcel.php';
	// 	$filename = 'Indicator_Template.csv'; // ชื่อไฟล์ CSV
	// 	$header = array("รหัสตัวชี้วัด", "ชื่อเกณฑ์", "ระดับของตัวชี้วัด", "องค์ประกอบของตัวชี้วัด", "คะแนนการผ่านเกณฑ์ (%)"); // กำหนดหัวคอลัมน์

	// 	// ดึงข้อมูลจากฐานข้อมูล
	// 	$query = $this->db->select('CriteriaID, CriteriaName, CriteriaDescription, CriteriaLevelAmount, CriteriaCompositionAmount, CriteriaPassingScorePercentage')
	// 		->where('DeleteStatus', 0)
	// 		->get('ASSESSMENT_CRITERIA');


	// 	// เปิด buffer เพื่อเขียนไฟล์ CSV
	// 	$fp = fopen('php://output', 'w');

	// 	// ใส่ UTF-8 BOM เพื่อให้ Excel อ่านภาษาไทยได้ถูกต้อง
	// 	fputs($fp, "\xEF\xBB\xBF");

	// 	// เขียนหัวคอลัมน์ในไฟล์ CSV
	// 	fputcsv($fp, $header);

	// 	// เขียนข้อมูลในไฟล์ CSV
	// 	foreach ($query->result() as $row) {
	// 		$data = array($row->CriteriaID, $row->CriteriaName, $row->CriteriaLevelAmount, $row->CriteriaCompositionAmount, $row->CriteriaPassingScorePercentage);
	// 		fputcsv($fp, $data);
	// 	}

	// 	// ปิด buffer เพื่อสร้างไฟล์ CSV และส่งให้ใช้งาน
	// 	fclose($fp);

	// 	// เรียกใช้ helper download เพื่อดาวน์โหลดไฟล์
	// 	$this->load->helper('download');
	// 	force_download($filename, ob_get_clean());
	// }
	public function uplod_criteria()
	{
		session_start();
		$this->db->trans_start();
		if (isset($_FILES['document_criteria'])) {
			$i = 1;
			$count = 0;
			$done = 0;
			$cancel = 0;
			$loop = 0;
			$data_get = array();
			$handle = fopen($_FILES['document_criteria']['tmp_name'], 'r');
			ini_set('auto_detect_line_endings', TRUE);

			// อ่าน header row
			$header_row = fgetcsv($handle);

			while (($data = fgetcsv($handle)) !== FALSE && $data[0] != '') {
				// เพิ่มเงื่อนไขเช็คว่าต้องเริ่ม insert จาก row ที่ 2 เป็นต้นไป
				if ($i >= 1 && ($data[0] != '' && $data[1] != '' &&  $data[2] != '' && $data[3] != '' && $data[4] != '' && $data[5] != '')) { //ถ้าข้อมูลไม่ว่างหรืออง+ลำไม่ต่ำกว่า3
					$all_data = [
						'CriteriaID' => $data[0],
						'CriteriaName' => $data[1],
						'CriteriaDescription' => $data[2],
						'CriteriaLevelAmount' => $data[3],
						'CriteriaCompositionAmount' => $data[4],
						'CriteriaPassingScorePercentage' => $data[5]
					];



					// ตรวจสอบว่าข้อมูลซ้ำหรือไม่
					$Check = $this->db->query("SELECT * 
					FROM ASSESSMENT_CRITERIA 
					WHERE CriteriaID = '" . $data[0] . "' 
					AND DeleteStatus = '0'
				")->result();



					if ($Check != TRUE) {
						$insert = $this->db->insert('ASSESSMENT_CRITERIA', $all_data);
						$ip_address = '';
						if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
							$ip_address = $_SERVER['HTTP_CLIENT_IP'];
						} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
							$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
						} else {
							$ip_address = $_SERVER['REMOTE_ADDR'];
						}
						if ($insert == TRUE) {
							$UserID = $this->session->userdata('UserID');
							$log = [
								'LogMessage' => 'insert CriteriaID =  "' .  $data[0]  . '" CriteriaName = "' . $data[1]. '"',
								'LogUserID' => $UserID,
								'LogIpAddress' => $ip_address,
								'LogCreation' => date('Y-m-d H:i:s')
							];
							$logresult = $this->db->insert('SYS_LOG', $log);
						}
						$last_id = $this->db->insert_id();
						$note = 'สำเร็จ';
						$status = '1';
						$done++;


						switch ($data[3]) {

							case ($data[3] == '1'):
								if ($data[6] == '' || $data[7] == '') {
									$path2 = "ระดับของตัวชี้วัด" . $data[3] . 'แต่ข้อมูลในลำดับระดับของตัวชี้วัด 1 ข้อมูลไม่ครบ';
									$status2 = '0';
								} else {
									$path_two = [
										'CriteriaID' => $last_id,
										'LevelIndex' => 1,
										'LevelName' => $data[6],
										'LevelScore' => $data[7]

									];

									$insert = $this->db->insert('ASSESSMENT_CRITERIA_LEVEL', $path_two);
									$status2 = '1';
									$path2 = '';
								}
								break;
							case ($data[3] == '2'):
								if ($data[6] == '' || $data[7] == '' || $data[8] == '' || $data[9] == '') {
									$path2 = "ระดับของตัวชี้วัด" . $data[3] . 'แต่ข้อมูลในลำดับระดับของตัวชี้วัด 1-2 ข้อมูลไม่ครบ';
									$status2 = '0';
								} else {
									$path_two = [
										'CriteriaID' => $last_id,
										'LevelIndex' => 1,
										'LevelName' => $data[6],
										'LevelScore' => $data[7]

									];
									$insert = $this->db->insert('ASSESSMENT_CRITERIA_LEVEL', $path_two);
									$path_two = [
										'CriteriaID' => $last_id,
										'LevelIndex' => 2,
										'LevelName' => $data[8],
										'LevelScore' => $data[9]

									];
									$insert = $this->db->insert('ASSESSMENT_CRITERIA_LEVEL', $path_two);
									$status2 = '1';
									$path2 = '';
								}
								break;
							case ($data[3] >= '3'):
								if ($data[6] == '' || $data[7] == '' || $data[8] == '' || $data[9] == '' || $data[10] == '' || $data[11] == '') {
									$path2 = "ระดับของตัวชี้วัด" . $data[3] . 'แต่ข้อมูลในลำดับระดับของตัวชี้วัด 1-3 ข้อมูลไม่ครบ';
									$status2 = '0';
								} else {
									$path_two = [
										'CriteriaID' => $last_id,
										'LevelIndex' => 1,
										'LevelName' => $data[6],
										'LevelScore' => $data[7]

									];
									$insert = $this->db->insert('ASSESSMENT_CRITERIA_LEVEL', $path_two);
									$path_two = [
										'CriteriaID' => $last_id,
										'LevelIndex' => 2,
										'LevelName' => $data[8],
										'LevelScore' => $data[9]

									];
									$insert = $this->db->insert('ASSESSMENT_CRITERIA_LEVEL', $path_two);
									$path_two = [
										'CriteriaID' => $last_id,
										'LevelIndex' => 3,
										'LevelName' => $data[10],
										'LevelScore' => $data[11]

									];
									$insert = $this->db->insert('ASSESSMENT_CRITERIA_LEVEL', $path_two);
									$status2 = '1';
									$path2 = '';
								}
								break;
						}

						switch ($data[4]) {

							case ($data[4] == '1'):
								if ($data[12] == '' || $data[13] == '' || $data[14] == '') {
									$path3 = "องค์ประกอบของตัวชี้วัดมี" . $data[4] . 'แต่ข้อมูลในลำดับองค์ประกอบของตัวชี้วัดมี 1 ข้อมูลไม่ครบ';
									$status3 = '0';
								} else {
									$path_three = [
										'CriteriaID' => $last_id,
										'CompositionIndex' => 1,
										'CompositionName' => $data[12],
										'CompositionWeightScore' => $data[13],
										'CompositionGuideline' => $data[14]

									];
									$insert = $this->db->insert('ASSESSMENT_CRITERIA_COMPOSITION', $path_three);
									$status3 = '1';
									$path3 = '';
								}
								break;
							case ($data[4] == '2'):
								if ($data[12] == '' || $data[13] == '' || $data[14] == '' || $data[15] == '' || $data[16] == '' || $data[17] == '') {
									$path3 = "องค์ประกอบของตัวชี้วัดมี" . $data[4] . 'แต่ข้อมูลในลำดับองค์ประกอบของตัวชี้วัดมี 1-2 ข้อมูลไม่ครบ';
									$status3 = '0';
								} else {
									$path_three = [
										'CriteriaID' => $last_id,
										'CompositionIndex' => 1,
										'CompositionName' => $data[12],
										'CompositionWeightScore' => $data[13],
										'CompositionGuideline' => $data[14]


									];
									$insert = $this->db->insert('ASSESSMENT_CRITERIA_COMPOSITION', $path_three);
									$path_three = [
										'CriteriaID' => $last_id,
										'CompositionIndex' => 2,
										'CompositionName' => $data[15],
										'CompositionWeightScore' => $data[16],
										'CompositionGuideline' => $data[17]


									];
									$insert = $this->db->insert('ASSESSMENT_CRITERIA_COMPOSITION', $path_three);
									$status3 = '1';
									$path3 = '';
								}
								break;
							case ($data[4] >= '3'):
								if ($data[12] == '' || $data[13] == '' || $data[14] == '' || $data[15] == '' || $data[16] == '' || $data[17] == '' || $data[18] == '' || $data[19] == '' || $data[20] == '') {
									$path3 = "องค์ประกอบของตัวชี้วัดมี" . $data[4] . 'แต่ข้อมูลในลำดับองค์ประกอบของตัวชี้วัดมี 1-3 ข้อมูลไม่ครบ';
									$status3 = '0';
								} else {
									$path_three = [
										'CriteriaID' => $last_id,
										'CompositionIndex' => 1,
										'CompositionName' => $data[12],
										'CompositionWeightScore' => $data[13],
										'CompositionGuideline' => $data[14]


									];
									$insert = $this->db->insert('ASSESSMENT_CRITERIA_COMPOSITION', $path_three);
									$path_three = [
										'CriteriaID' => $last_id,
										'CompositionIndex' => 2,
										'CompositionName' => $data[15],
										'CompositionWeightScore' => $data[16],
										'CompositionGuideline' => $data[17]


									];
									$insert = $this->db->insert('ASSESSMENT_CRITERIA_COMPOSITION', $path_three);
									$path_three = [
										'CriteriaID' => $last_id,
										'CompositionIndex' => 3,
										'CompositionName' => $data[18],
										'CompositionWeightScore' => $data[19],
										'CompositionGuideline' => $data[20]


									];
									$insert = $this->db->insert('ASSESSMENT_CRITERIA_COMPOSITION', $path_three);
									$status3 = '1';
									$path3 = '';
								}
								break;
						}
					} else {
						$note = 'ข้อมูลซ้ำ รหัสตัวชี้วัดห้ามซ้ำ';
						$status = '0';
						$loop++;
						$status2 = '0';
						$status3 = '0';
						$path2 = 'ข้อมูลซ้ำ';
						$path3 = 'ข้อมูลซ้ำ';
					}
				} elseif ($i >= 1 && ($data[0] == '' || $data[1] == '' || $data[2] == '' || $data[3] == '' || $data[4] == '')) { //ถ้าข้อมูลอันไหนว่าง
					$note = 'ข้อมูลไม่ครบ';
					$status = '0';
					$cancel++;
					$status2 = '0';
					$status3 = '0';
					$path2 = '';
					$path3 = '';
				}

				$count++;
				$i++;

				$data_get[] = [
					'CriteriaID' => $data[0],
					'CriteriaName' => $data[1],
					'CriteriaLevelAmount' => $data[2],
					'CriteriaCompositionAmount' => $data[3],
					'CriteriaPassingScorePercentage' => $data[4],
					'note' => $note,
					'status' => $status,
					'status2' => $status2,
					'status3' => $status3,
					'path2' => $path2,
					'path3' => $path3

				];
			}
			print_r($path_two);
			print_r($path_three);
			// exit;
			ini_set('auto_detect_line_endings', FALSE);
			$txt =  $data_get;
			$_SESSION['txt'] = $txt;
			$_SESSION['count'] = $count;
			$_SESSION['done'] = $done;
			$_SESSION['cancel'] = $cancel;
			$_SESSION['loop'] = $loop;
			$_SESSION['success_up'] = "อัปโหลดไฟล์ข้อมูลตัวชี้วัดเรียบร้อย";
			header("Location: " . site_url('Fm_evaluation_das_p1?page=sh1'));
		}
		$this->db->trans_complete();
	}
}
