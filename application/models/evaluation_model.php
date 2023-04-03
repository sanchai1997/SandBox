<?php
class Evaluation_model extends CI_Model
{

	public function insert_ass_ria() //sh1
	{

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
		$this->db->where('CriteriaID', $this->input->post('CriteriaID'));
		$query = $this->db->update('ASSESSMENT_CRITERIA', $data);
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

		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		$status = '1';
	$data = array(
				
		'DeleteStatus' => $status 
	);
		$this->db->where('CriteriaID', $this->input->post('CriteriaID'));
		$query = $this->db->update('ASSESSMENT_CRITERIA', $data);
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

		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		$data = array(
			'Id_ac' => $this->input->post('Id_ac'),
			'CriteriaID' => $this->input->post('CriteriaID'),
			'LevelIndex' => $this->input->post('LevelIndex'),
			'LevelName' => $this->input->post('LevelName'),
			'LevelScore' => $this->input->post('LevelScore')

		);
		$query = $this->db->insert('ASSESSMENT_CRITERIA_LEVEL', $data);
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

		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		// สร้างตัวแปร $id_name มาเก็บค่าไว้ก่อน
		$Id_ac = $this->input->post('Id_ac');
		$LevelIndex = $this->input->post('LevelIndex');

// นำค่า $id_name มาใช้ในการค้นหาข้อมูลในฐานข้อมูล
$this->db->where('Id_ac', $Id_ac);
$this->db->where('LevelIndex', $LevelIndex);
$this->db->where('DeleteStatus=0');
$query = $this->db->get('ASSESSMENT_CRITERIA_LEVEL');

// นับจำนวนแถวที่ค้นพบ
$num_chk = $query->num_rows();

// ตรวจสอบจำนวนแถวที่ค้นพบว่ามีมากกว่า 0 หรือไม่
if ($num_chk <= 0 ) {
	// ไม่พบข้อมูลในฐานข้อมูล
	$data = array(
		'Id_ac' => $this->input->post('Id_ac'),
		'CriteriaID' => $this->input->post('CriteriaID'),
		'LevelIndex' => $this->input->post('LevelIndex'),
		'LevelName' => $this->input->post('LevelName'),
		'LevelScore' => $this->input->post('LevelScore')
  
	);
	$this->db->where('Id', $this->input->post('Id'));
	$query = $this->db->update('ASSESSMENT_CRITERIA_LEVEL', $data);
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

		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		$status = '1';
	$data = array(
				
		'DeleteStatus' => $status 
	);
		$this->db->where('Id', $this->input->post('Id'));
		$query = $this->db->update('ASSESSMENT_CRITERIA_LEVEL', $data);
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

		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		$data = array(
			'Id_ac' => $this->input->post('Id_ac'),
			'CriteriaID' => $this->input->post('CriteriaID'),
			'CompositionIndex' => $this->input->post('CompositionIndex'),
			'CompositionName' => $this->input->post('CompositionName'),
			'CompositionWeightScore' => $this->input->post('CompositionWeightScore'),
			'CompositionGuideline' => $this->input->post('CompositionGuideline')


		);
		$query = $this->db->insert('ASSESSMENT_CRITERIA_COMPOSITION', $data);
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

			// echo '<pre>';
			// print_r($_POST);
			// echo'</pre>';
			// exit;
			// สร้างตัวแปร $id_name มาเก็บค่าไว้ก่อน
$Id_ac = $this->input->post('Id_ac');
$CompositionIndex = $this->input->post('CompositionIndex');

// นำค่า $id_name มาใช้ในการค้นหาข้อมูลในฐานข้อมูล
$this->db->where('Id_ac', $Id_ac);
$this->db->where('CompositionIndex', $CompositionIndex);
$this->db->where('DeleteStatus=0');
$query = $this->db->get('ASSESSMENT_CRITERIA_COMPOSITION');

// นับจำนวนแถวที่ค้นพบ
$num_chk = $query->num_rows();

// ตรวจสอบจำนวนแถวที่ค้นพบว่ามีมากกว่า 0 หรือไม่
if ($num_chk <= 0 ) {
  // ไม่พบข้อมูลในฐานข้อมูล
  $data = array(
	  'Id_ac' => $this->input->post('Id_ac'),
	  'CriteriaID' => $this->input->post('CriteriaID'),
	  'CompositionIndex' => $this->input->post('CompositionIndex'),
	  'CompositionName' => $this->input->post('CompositionName'),
	  'CompositionWeightScore' => $this->input->post('CompositionWeightScore'),
	  'CompositionGuideline' => $this->input->post('CompositionGuideline')


  );
  $this->db->where('Id', $this->input->post('Id'));
  $query = $this->db->update('ASSESSMENT_CRITERIA_COMPOSITION', $data);
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

		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		$status = '1';
	$data = array(
				
		'DeleteStatus' => $status 
	);
		$this->db->where('Id', $this->input->post('Id'));
		$query = $this->db->update('ASSESSMENT_CRITERIA_COMPOSITION', $data);
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

		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		$data = array(
			'Id_ac' => $this->input->post('Id_ac'),
			'CriteriaID' => $this->input->post('CriteriaID'),
			'CompositionIndex' => $this->input->post('CompositionIndex'),
			'LevelIndex' => $this->input->post('LevelIndex'),
			'CompositionLevelDescription' => $this->input->post('CompositionLevelDescription')


		);
		$query = $this->db->insert('ASSESSMENT_CRITERIA_COMPOSITION_LEVEL', $data);
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

		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		$data = array(
			'Id_ac' => $this->input->post('Id_ac'),
			'CriteriaID' => $this->input->post('CriteriaID'),
			'CompositionIndex' => $this->input->post('CompositionIndex'),
			'LevelIndex' => $this->input->post('LevelIndex'),
			'CompositionLevelDescription' => $this->input->post('CompositionLevelDescription')


		);
		$this->db->where('Id', $this->input->post('Id'));
		$query = $this->db->update('ASSESSMENT_CRITERIA_COMPOSITION_LEVEL', $data);
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

		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		$status = '1';
	$data = array(
				
		'DeleteStatus' => $status 
	);
		$this->db->where('Id', $this->input->post('Id'));
		$query = $this->db->update('ASSESSMENT_CRITERIA_COMPOSITION_LEVEL', $data);
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
if ($num_chk <= 0 ) {
  // ไม่พบข้อมูลในฐานข้อมูล
  $data = array(
	  'SchoolAssessmentEducationYear' => $this->input->post('SchoolAssessmentEducationYear'),
	  'SchoolAssessmentSemester' => $this->input->post('SchoolAssessmentSemester'),
	  'SchoolID' => $this->input->post('SchoolID'),
	  'SchoolAssessmentName' => $this->input->post('SchoolAssessmentName'),
	  'SchoolAssessmentDescription' => $this->input->post('SchoolAssessmentDescription')


  );
  $query = $this->db->insert('SCHOOL_ASSESSMENT', $data);
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
			$_SESSION['false'] = "ไม่มามารถบันทึกข้อมูลได้โปรดตรวจสอบข้อมูล (ปีการศึกษา/ภาคเรียน/สถานศึกษา/ชื่อการประเมิน) ซ้ำกันในระบบ !"; // กำหนดค่า success ใน session เป็น true
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			exit;
}
	}
	public function edit_sc_ass() //sh5
	{

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
		$this->db->where('Id', $this->input->post('Id'));
		$query = $this->db->update('SCHOOL_ASSESSMENT', $data);
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "แก้ไขสำเร็จ!"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_evaluation_das_p5?page=sh5'));
			// ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function del_sc_ass() //sh5
	{

		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		$status = '1';
	$data = array(
				
		'DeleteStatus' => $status 
	);
		$this->db->where('Id', $this->input->post('Id'));
		$query = $this->db->update('SCHOOL_ASSESSMENT', $data);
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "ลบสำเร็จ!"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_evaluation_das_p5?page=sh5'));
			// ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function insert_sc_ass_ria() //sh6
	{

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
		
					$data = $this->upload->data();
					$filename = $data['file_name'];
				$data = array(
					'Id_sa' => $this->input->post('Id_sa'),
					'Id_ac' => $this->input->post('Id_ac'),
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
			}else {
				$data = array(
					'Id_sa' => $this->input->post('Id_sa'),
					'Id_ac' => $this->input->post('Id_ac'),
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
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "เพิ่มข้อมูลเรียบร้อย!"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_evaluation_das_p5?page=sh5'));
			// ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}

	}
	
public function edit_sc_ass_ria() //sh6
	{

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
			}else {
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

		$this->db->where('Id', $this->input->post('Id'));
		$query = $this->db->update('SCHOOL_ASSESSMENT_CRITERIA', $data);
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "แก้ไขข้อมูลสำเร็จ!"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_evaluation_das_p5?page=sh5'));
			// ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	
}
public function del_sc_ass_ria(){
	$status = '1';
	$data = array(
				
		'DeleteStatus' => $status 
	);
	$this->db->where('Id', $this->input->post('Id'));
	$query = $this->db->update('SCHOOL_ASSESSMENT_CRITERIA', $data);
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "ลบข้อมูลสำเร็จ!"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_evaluation_das_p5?page=sh5'));
			// ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
}
	public function insert_sc_ass_res() //sh7
	{

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
		$query = $this->db->insert('SCHOOL_ASSESSMENT_RESULT', $data);
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "เพิ่มข้อมูลเรียบร้อย!"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_evaluation_das_p5?page=sh5'));
			// ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function edit_sc_ass_res() //sh7
	{

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
		$this->db->where('Id', $this->input->post('Id'));
		$query = $this->db->update('SCHOOL_ASSESSMENT_RESULT', $data);
		if ($query) {
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

		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		$status = '1';
	$data = array(
				
		'DeleteStatus' => $status 
	);
		$this->db->where('Id', $this->input->post('Id'));
		$query = $this->db->update('SCHOOL_ASSESSMENT_RESULT', $data);
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
}else {
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
		$query=$this->db->insert('ACHIEVEMENT_ASSESSMENT',$data);
		if($query){
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "เพิ่มข้อมูลเรียบร้อย !"; // กำหนดค่า success ใน session เป็น true
			header("Location:".site_url('Fm_evaluation_das_p8?page=sh8')); // ไปยังหน้าก่อนหน้านี้
			
		} else {
			echo 'false';
		}
    }

public function edit_achie_ass() //sh8
	{
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
			'SchoolID' => $this->input->post('SchoolID'),
			'SchoolAssessmentName' => $this->input->post('SchoolAssessmentName'),
			'SchoolAssessmentDescription' => $this->input->post('SchoolAssessmentDescription'),
			'AssessmentorName' => $this->input->post('AssessmentorName'),
			'AchievementAssessmentPassingFlag' => $this->input->post('AchievementAssessmentPassingFlag'),
			'AchievementAssessmentAttachmentURL' =>  $filename

		);
	}
			}else {
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
		$this->db->where('Id', $this->input->post('Id'));
		$query = $this->db->update('ACHIEVEMENT_ASSESSMENT', $data);
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
		$status = '1';
	$data = array(
				
		'DeleteStatus' => $status 
	);
		$this->db->where('Id', $this->input->post('Id'));
		$query = $this->db->update('ACHIEVEMENT_ASSESSMENT', $data);
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
		$this->db->join('ASSESSMENT_CRITERIA_COMPOSITION_LEVEL as ass_ria_com_lvl' , 'ass_ria_com.CriteriaID=ass_ria_com_lvl.CriteriaID');
		$this->db->join('SCHOOL_ASSESSMENT_CRITERIA as sc_ass_ria' , 'ass_ria_com_lvl.CriteriaID=sc_ass_ria.CriteriaID');
		$this->db->join('SCHOOL_ASSESSMENT_RESULT as sc_ass_res','sc_ass_ria.CriteriaID=sc_ass_res.CriteriaID');
		$this->db->join('ACHIEVEMENT_ASSESSMENT as achie_ass','sc_ass_res.SchoolID=achie_ass.SchoolID');
		$this->db->join('SCHOOL_ASSESSMENT as sc_ass','sc_ass_res.SchoolID=sc_ass.SchoolID');
		$query = $this->db->get();
		return $query->result();
	}
}
