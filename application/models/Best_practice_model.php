<?php
class Best_practice_model extends CI_Model
{

	public function add_BP()
	{

		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		// สร้างตัวแปร $id_name มาเก็บค่าไว้ก่อน
		$EducationYear = $this->input->post('EducationYear');
		$BestPracticeID = $this->input->post('BestPracticeID');
		$Semester = $this->input->post('Semester');
		$BestPracticeName = $this->input->post('BestPracticeName');
		$this->db->where('EducationYear', $EducationYear);
		$this->db->where('Semester', $Semester);
		$this->db->where('BestPracticeID', $BestPracticeID);
		$this->db->where('DeleteStatus=0');
		$query = $this->db->get('BEST_PRACTICE');
		$num_chk = $query->num_rows();
		if ($num_chk <= 0) {
			// ไม่พบข้อมูลในฐานข้อมูล
			if (isset($_FILES['AttachmentURL'])) {
				$file = $_FILES['AttachmentURL']['tmp_name'];
				if (file_exists($file)) {
					$config['upload_path'] = 'assets/EII/BEST_PRACTICE/';
					$config['allowed_types'] = 'doc|docx|pdf|jpg|png|xls|ppt|zip|xlsx';
					$config['encrypt_name'] = TRUE;
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('AttachmentURL')) {
						echo $this->upload->display_errors();
					} else {

						$data = $this->upload->data();
						$filename = $data['file_name'];
						$data = array(
							'BestPracticeID' => $this->input->post('BestPracticeID'),
							'EducationYear' => $this->input->post('EducationYear'),
							'Semester' => $this->input->post('Semester'),
							'BestPracticeName' => $this->input->post('BestPracticeName'),
							'BestPracticeTypeCode' => $this->input->post('BestPracticeTypeCode'),
							'TargetEducationLevelCode' => $this->input->post('TargetEducationLevelCode'),
							'Benefit' => $this->input->post('Benefit'),
							'RecognizedCode' => $this->input->post('RecognizedCode'),
							'Abstract' => $this->input->post('Abstract'),
							'SearchKeyword' => $this->input->post('SearchKeyword'),
							'AttachmentURL' => $filename,
							'PracticeProcess' => $this->input->post('PracticeProcess'),
							'Source' => $this->input->post('Source'),
							'PublishDate' => $this->input->post('PublishDate')

						);
					}
				} else {
					$data = array(
						'BestPracticeID' => $this->input->post('BestPracticeID'),
						'EducationYear' => $this->input->post('EducationYear'),
						'Semester' => $this->input->post('Semester'),
						'BestPracticeName' => $this->input->post('BestPracticeName'),
						'BestPracticeTypeCode' => $this->input->post('BestPracticeTypeCode'),
						'TargetEducationLevelCode' => $this->input->post('TargetEducationLevelCode'),
						'Benefit' => $this->input->post('Benefit'),
						'RecognizedCode' => $this->input->post('RecognizedCode'),
						'Abstract' => $this->input->post('Abstract'),
						'SearchKeyword' => $this->input->post('SearchKeyword'),
						'PracticeProcess' => $this->input->post('PracticeProcess'),
						'Source' => $this->input->post('Source'),
						'PublishDate' => $this->input->post('PublishDate')
					);
				}
			}
			$query = $this->db->insert('BEST_PRACTICE', $data);
			if ($query) {
				session_start(); // เริ่มต้น session
				$_SESSION['success'] = "เพิ่มข้อมูลเรียบร้อย !"; // กำหนดค่า success ใน session เป็น true
				header("Location: " . site_url('Fm_best_practice_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้

			} else {
				echo 'false';
			}
		} else {
			// พบข้อมูลในฐานข้อมูล
			session_start(); // เริ่มต้น session
			$_SESSION['false'] = "ไม่มามารถบันทึกข้อมูลได้โปรดตรวจสอบข้อมูล (ปีการศึกษา/ภาคเรียน/รหัสวิธีปฏิบัติที่เป็นเลิศในการจัดการศึกษา) ซ้ำกันในระบบ !"; // กำหนดค่า success ใน session เป็น true
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			exit;
		}
	}

	public function edit_BP()
	{

		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		// สร้างตัวแปร $id_name มาเก็บค่าไว้ก่อน
		$EducationYear = $this->input->post('EducationYear');
		$BestPracticeID = $this->input->post('BestPracticeID');
		$Semester = $this->input->post('Semester');
		$BestPracticeName = $this->input->post('BestPracticeName');
		$this->db->where('EducationYear', $EducationYear);
		$this->db->where('Semester', $Semester);
		$this->db->where('BestPracticeID', $BestPracticeID);
		$this->db->where('DeleteStatus=0');
		$query = $this->db->get('BEST_PRACTICE');
		$num_chk = $query->num_rows();
		if ($num_chk <= 0) {
			// ไม่พบข้อมูลในฐานข้อมูล
			if (isset($_FILES['AttachmentURL'])) {
				$file = $_FILES['AttachmentURL']['tmp_name'];
				if (file_exists($file)) {
					$config['upload_path'] = 'assets/EII/BEST_PRACTICE/';
					$config['allowed_types'] = 'doc|docx|pdf|jpg|png|xls|ppt|zip|xlsx';
					$config['encrypt_name'] = TRUE;
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('AttachmentURL')) {
						echo $this->upload->display_errors();
					} else {

						$data = $this->upload->data();
						$filename = $data['file_name'];
						$data = array(
							'BestPracticeID' => $this->input->post('BestPracticeID'),
							'EducationYear' => $this->input->post('EducationYear'),
							'Semester' => $this->input->post('Semester'),
							'BestPracticeName' => $this->input->post('BestPracticeName'),
							'BestPracticeTypeCode' => $this->input->post('BestPracticeTypeCode'),
							'TargetEducationLevelCode' => $this->input->post('TargetEducationLevelCode'),
							'Benefit' => $this->input->post('Benefit'),
							'RecognizedCode' => $this->input->post('RecognizedCode'),
							'Abstract' => $this->input->post('Abstract'),
							'SearchKeyword' => $this->input->post('SearchKeyword'),
							'AttachmentURL' => $filename,
							'PracticeProcess' => $this->input->post('PracticeProcess'),
							'Source' => $this->input->post('Source'),
							'PublishDate' => $this->input->post('PublishDate')

						);
					}
				} else {
					$data = array(
						'BestPracticeID' => $this->input->post('BestPracticeID'),
						'EducationYear' => $this->input->post('EducationYear'),
						'Semester' => $this->input->post('Semester'),
						'BestPracticeName' => $this->input->post('BestPracticeName'),
						'BestPracticeTypeCode' => $this->input->post('BestPracticeTypeCode'),
						'TargetEducationLevelCode' => $this->input->post('TargetEducationLevelCode'),
						'Benefit' => $this->input->post('Benefit'),
						'RecognizedCode' => $this->input->post('RecognizedCode'),
						'Abstract' => $this->input->post('Abstract'),
						'SearchKeyword' => $this->input->post('SearchKeyword'),
						'PracticeProcess' => $this->input->post('PracticeProcess'),
						'Source' => $this->input->post('Source'),
						'PublishDate' => $this->input->post('PublishDate')
					);
				}
			}
			$this->db->where('Id_best', $this->input->post('Id_best'));
					$query = $this->db->update('BEST_PRACTICE', $data);
			if ($query) {
				session_start(); // เริ่มต้น session
				$_SESSION['success'] = "เพิ่มข้อมูลเรียบร้อย !"; // กำหนดค่า success ใน session เป็น true
				header("Location: " . site_url('Fm_best_practice_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้

			} else {
				echo 'false';
			}
		} else {
			// พบข้อมูลในฐานข้อมูล
			session_start(); // เริ่มต้น session
			$_SESSION['false'] = "ไม่มามารถบันทึกข้อมูลได้โปรดตรวจสอบข้อมูล (ปีการศึกษา/ภาคเรียน/รหัสวิธีปฏิบัติที่เป็นเลิศในการจัดการศึกษา) ซ้ำกันในระบบ !"; // กำหนดค่า success ใน session เป็น true
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			exit;
		}
	}
	public function del_BP()
	{
		$status = '1';
		$data = array(

			'DeleteStatus' => $status
		);
		$this->db->where('Id_best', $this->input->post('Id_best'));
		$query = $this->db->update('BEST_PRACTICE', $data);
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "ลบสำเร็จ !"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_best_practice_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function add_BPC()
	{

		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		$CreatorPersonalID = $this->input->post('CreatorPersonalID');
		$BestPracticeID = $this->input->post('BestPracticeID');
		if ($CreatorPersonalID == '') {
			$data = array(
				'BestPracticeID' => $this->input->post('BestPracticeID'),
				'CreatorPersonalID' => $this->input->post('CreatorPersonalID'),
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
			$query = $this->db->insert('BEST_PRACTICE_CREATOR', $data);
			if ($query) {
				session_start(); // เริ่มต้น session
				$_SESSION['success'] = "เพิ่มข้อมูลเรียบร้อย !"; // กำหนดค่า success ใน session เป็น true
				header("Location: " . site_url('Fm_best_practice_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้

			} else {
				echo 'false';
			}
		} elseif ($CreatorPersonalID != '') {
			$this->db->where('CreatorPersonalID', $CreatorPersonalID);
			$this->db->where('BestPracticeID', $BestPracticeID);
			$this->db->where('DeleteStatus=0');
			$this->db->where('CreatorPersonalID=0');
			$query = $this->db->get('BEST_PRACTICE_CREATOR');
			$num_chk = $query->num_rows();
			if ($num_chk <= 0) {
				// ไม่พบข้อมูลในฐานข้อมูล
				$data = array(
					'BestPracticeID' => $this->input->post('BestPracticeID'),
					'CreatorPersonalID' => $this->input->post('CreatorPersonalID'),
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
				$query = $this->db->insert('BEST_PRACTICE_CREATOR', $data);
				if ($query) {
					session_start(); // เริ่มต้น session
					$_SESSION['success'] = "เพิ่มข้อมูลเรียบร้อย !"; // กำหนดค่า success ใน session เป็น true
					header("Location: " . site_url('Fm_best_practice_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้

				} else {
					echo 'false';
				}
			} else {
				// พบข้อมูลในฐานข้อมูล
				session_start(); // เริ่มต้น session
				$_SESSION['false'] = "ไม่มามารถบันทึกข้อมูลได้โปรดตรวจสอบข้อมูล (เลขบัตร ปชช) ซ้ำกันในระบบ !"; // กำหนดค่า success ใน session เป็น true
				header('Location: ' . $_SERVER['HTTP_REFERER']);
				exit;
			}
		}
	}
	public function edit_BPC()
	{

		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		// สร้างตัวแปร $id_name มาเก็บค่าไว้ก่อน
		$CreatorPersonalID = $this->input->post('CreatorPersonalID');
		$BestPracticeID = $this->input->post('BestPracticeID');

// นำค่า $id_name มาใช้ในการค้นหาข้อมูลในฐานข้อมูล
$this->db->where('CreatorPersonalID', $CreatorPersonalID);
$this->db->where('BestPracticeID', $BestPracticeID);
$this->db->where('CreatorPersonalID !=0');
$query = $this->db->get('BEST_PRACTICE_CREATOR');

// นับจำนวนแถวที่ค้นพบ
$num_chk = $query->num_rows();

// ตรวจสอบจำนวนแถวที่ค้นพบว่ามีมากกว่า 0 หรือไม่
if ($num_chk <= 0 ) {
  // ไม่พบข้อมูลในฐานข้อมูล
  $data = array(
	  'BestPracticeID' => $this->input->post('BestPracticeID'),
	  'CreatorPersonalID' => $this->input->post('CreatorPersonalID'),
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
  $this->db->where('Id_bestc', $this->input->post('Id_bestc'));
  $query = $this->db->update('BEST_PRACTICE_CREATOR', $data);
  if ($query) {
	  session_start(); // เริ่มต้น session
	  $_SESSION['success'] = "แก้ไขสำเร็จ !"; // กำหนดค่า success ใน session เป็น true
	  header("Location: " . site_url('Fm_best_practice_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้

  } else {
	  echo 'false';
  }
} else {
  // พบข้อมูลในฐานข้อมูล
  session_start(); // เริ่มต้น session
  $_SESSION['false'] = "ไม่มามารถบันทึกข้อมูลได้โปรดตรวจสอบข้อมูล (เลขบัตร ปชช) ซ้ำกันในระบบ !"; // กำหนดค่า success ใน session เป็น true
  header('Location: ' . $_SERVER['HTTP_REFERER']);
  exit;
}
	}
	public function del_BPC()
	{
		$status = '1';
		$data = array(

			'DeleteStatus' => $status
		);
		$this->db->where('Id_bestc', $this->input->post('Id_bestc'));
		$query = $this->db->update('BEST_PRACTICE_CREATOR', $data);
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "ลบสำเร็จ !"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_best_practice_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function show_index()
	{
		$this->db->select('BP.*,BPC.*');
		$this->db->from('BEST_PRACTICE as BP ');
		$this->db->join('BEST_PRACTICE_CREATOR as BPC', 'BP.BestPracticeID=BPC.BestPracticeID');

		$query = $this->db->get();
		return $query->result();
	}
	public function show_BP()
	{
		$this->db->select('*');
		$this->db->from('BEST_PRACTICE as BP');
		$this->db->where('BP.DeleteStatus=0');
		$query = $this->db->get();
		return $query->result();
	}
	public function show_BPC()
	{
		$this->db->select('*');
		$this->db->from('BEST_PRACTICE_CREATOR as BPC');
		$this->db->where('BPC.DeleteStatus=0');
		$query = $this->db->get();
		return $query->result();
	}

}
