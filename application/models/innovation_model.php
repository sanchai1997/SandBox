<?php
class Innovation_model extends CI_Model
{

	public function add_in_model()
	{

		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;

		$EducationYear = $this->input->post('EducationYear');
		$Semester = $this->input->post('Semester');
		$InnovationName = $this->input->post('InnovationName');
		$this->db->where('EducationYear', $EducationYear);
		$this->db->where('Semester', $Semester);
		$this->db->where('InnovationName', $InnovationName);
		$this->db->where('DeleteStatus=0');
		$query = $this->db->get('INNOVATION');
		$num_chk = $query->num_rows();
		if ($num_chk <= 0) {
			// ไม่พบข้อมูลในฐานข้อมูล
			if (isset($_FILES['AttachmentURL'])) {
				$file = $_FILES['AttachmentURL']['tmp_name'];
				if (file_exists($file)) {
					$config['upload_path'] = 'assets/EII/INNOVATION/';
					$config['allowed_types'] = 'doc|docx|pdf|jpg|png|xls|ppt|zip';
					$config['encrypt_name'] = TRUE;
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('AttachmentURL')) {
						echo $this->upload->display_errors();
					} else {

						$data = $this->upload->data();
						$filename = $data['file_name'];
						$data = array(
							// 'InnovationID' => $this->input->post('InnovationID'),
							'EducationYear' => $this->input->post('EducationYear'),
							'Semester' => $this->input->post('Semester'),
							'InnovationName' => $this->input->post('InnovationName'),
							'InnovationTypeCode' => $this->input->post('InnovationTypeCode'),
							'TargetEducationLevelCode' => $this->input->post('TargetEducationLevelCode'),
							'InnovationBenefit' => $this->input->post('InnovationBenefit'),
							'Abstract' => $this->input->post('Abstract'),
							'AttachmentURL' => $filename,
							'Source' => $this->input->post('Source'),
							'PublishDate' => $this->input->post('PublishDate'),
							'SearchKeyword' => $this->input->post('SearchKeyword')

						);
					}
				} else {
					$data = array(
						// 'InnovationID' => $this->input->post('InnovationID'),
						'EducationYear' => $this->input->post('EducationYear'),
						'Semester' => $this->input->post('Semester'),
						'InnovationName' => $this->input->post('InnovationName'),
						'InnovationTypeCode' => $this->input->post('InnovationTypeCode'),
						'TargetEducationLevelCode' => $this->input->post('TargetEducationLevelCode'),
						'InnovationBenefit' => $this->input->post('InnovationBenefit'),
						'Abstract' => $this->input->post('Abstract'),

						'Source' => $this->input->post('Source'),
						'PublishDate' => $this->input->post('PublishDate'),
						'SearchKeyword' => $this->input->post('SearchKeyword')

					);
				}
			}
			$query = $this->db->insert('INNOVATION', $data);
			if ($query) {
				session_start(); // เริ่มต้น session
				$_SESSION['success'] = "เพิ่มข้อมูลนวัตกรรมการศึกษาสำเร็จ !"; // กำหนดค่า success ใน session เป็น true
				header("Location:" . site_url('Fm_innovation_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้. 

			} else {
				echo 'false';
			}
		} else {
			session_start(); // เริ่มต้น session
			$_SESSION['false'] = "ไม่มามารถบันทึกข้อมูลได้โปรดตรวจสอบข้อมูล (ปีการศึกษา/ภาคเรียน/ชื่อ) ซ้ำกันในระบบ !"; // กำหนดค่า success ใน session เป็น true
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			exit;
		}

	}
	public function edit_in_model()
	{

		//    echo '<pre>';
		// 	print_r($_POST);
		// 	echo'</pre>';
		// 	exit;
		if (isset($_FILES['AttachmentURL'])) {
			$file = $_FILES['AttachmentURL']['tmp_name'];
			if (file_exists($file)) {
				$config['upload_path'] = 'assets/EII/INNOVATION/';
				$config['allowed_types'] = 'doc|docx|pdf|jpg|png|xls|ppt|zip';
				$config['encrypt_name'] = TRUE;
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('AttachmentURL')) {
					echo $this->upload->display_errors();
				} else {

					$data = $this->upload->data();
					$filename = $data['file_name'];
					$data = array(
						// 'InnovationID' => $this->input->post('InnovationID'),
						'EducationYear' => $this->input->post('EducationYear'),
						'Semester' => $this->input->post('Semester'),
						'InnovationName' => $this->input->post('InnovationName'),
						'InnovationTypeCode' => $this->input->post('InnovationTypeCode'),
						'TargetEducationLevelCode' => $this->input->post('TargetEducationLevelCode'),
						'InnovationBenefit' => $this->input->post('InnovationBenefit'),
						'Abstract' => $this->input->post('Abstract'),
						'AttachmentURL' => $filename,
						'Source' => $this->input->post('Source'),
						'PublishDate' => $this->input->post('PublishDate'),
						'SearchKeyword' => $this->input->post('SearchKeyword')

					);
				}
			} else {
				$data = array(
					// 'InnovationID' => $this->input->post('InnovationID'),
					'EducationYear' => $this->input->post('EducationYear'),
					'Semester' => $this->input->post('Semester'),
					'InnovationName' => $this->input->post('InnovationName'),
					'InnovationTypeCode' => $this->input->post('InnovationTypeCode'),
					'TargetEducationLevelCode' => $this->input->post('TargetEducationLevelCode'),
					'InnovationBenefit' => $this->input->post('InnovationBenefit'),
					'Abstract' => $this->input->post('Abstract'),

					'Source' => $this->input->post('Source'),
					'PublishDate' => $this->input->post('PublishDate'),
					'SearchKeyword' => $this->input->post('SearchKeyword')

				);
			}
		}
		$this->db->where('InnovationID', $this->input->post('InnovationID'));
		$query = $this->db->update('INNOVATION', $data);
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "แก้ไขสำเร็จ !"; // กำหนดค่า success ใน session เป็น true
			header("Location:" . site_url('Fm_innovation_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้. 

		} else {
			echo 'false';
		}
	}
	public function del_in_model()
	{

		$velue = "1";
		$data = array(


			'DeleteStatus' => $velue

		);
		$this->db->where('InnovationID', $this->input->post('InnovationID'));
		$query = $this->db->update('INNOVATION', $data);
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "ลบข้อมูลเรียบร้อย !"; // กำหนดค่า success ใน session เป็น true
			header("Location:" . site_url('Fm_innovation_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้. 

		} else {
			echo 'false';
		}
	}
	public function add_in_tor_model()
	{


		$InnovationID = $this->input->post('InnovationID');
		$CreatorPersonalID = $this->input->post('CreatorPersonalID');
		$this->db->where('InnovationID', $InnovationID);
		$this->db->where('CreatorPersonalID', $CreatorPersonalID);
		$this->db->where('DeleteStatus=0');
		$query = $this->db->get('INNOVATION_CREATOR');
		$num_rows = $query->num_rows();
		if ($num_rows <= 0) {
			// ไม่พบข้อมูลจากฐานข้อมูล
			$data = array(
				'InnovationID' => $this->input->post('InnovationID'),
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
			$query = $this->db->insert('INNOVATION_CREATOR', $data);
			if ($query) {
				session_start(); // เริ่มต้น session
				$_SESSION['success'] = "เพิ่มข้อมูลนวัตกรรมการศึกษาสำเร็จ !"; // กำหนดค่า success ใน session เป็น true
				header("Location:" . site_url('Fm_innovation_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้. 

			} else {
				echo 'false';
			}
		} else {
			// พบข้อมูลจากฐานข้อมูล
			session_start(); // เริ่มต้น session
			$_SESSION['false'] = "ไม่มามารถบันทึกข้อมูลได้โปรดตรวจสอบข้อมูล (เลขบัตร ปชช.) ซ้ำกันในระบบ !"; // กำหนดค่า success ใน session เป็น true
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			exit;
		}
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;

	}
	public function edit_in_tor_model()
	{

		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;

		$data = array(
			'InnovationID' => $this->input->post('InnovationID'),
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
		$this->db->where('Id', $this->input->post('Id'));
		$query = $this->db->update('INNOVATION_CREATOR', $data);
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "แก้ไขสำเร็จ !"; // กำหนดค่า success ใน session เป็น true
			header("Location:" . site_url('Fm_innovation_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้. 

		} else {
			echo 'false';
		}
	}
	public function del_in_tor_model()
	{

		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		$value = "1";
		$data = array(


			'DeleteStatus' => $value

		);
		$this->db->where('Id', $this->input->post('Id'));
		$query = $this->db->update('INNOVATION_CREATOR', $data);
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "ลบข้อมูลสำเร็จ !"; // กำหนดค่า success ใน session เป็น true
			header("Location:" . site_url('Fm_innovation_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้. 

		} else {
			echo 'false';
		}
	}
	public function show_index()
	{
		$this->db->select('in.*,in_tor.*');
		$this->db->from('INNOVATION as in');
		$this->db->join('INNOVATION_CREATOR as in_tor', 'in.InnovationID=in_tor.InnovationID');
		$this->db->where('in.DeleteStatus=0');
		$query = $this->db->get();
		return $query->result();
	}
	public function show_in()
	{
		$this->db->select('*');
		$this->db->from('INNOVATION');
		$this->db->where('DeleteStatus=0');
		$query = $this->db->get();
		return $query->result();
	}
	public function show_in_tor()
	{
		$this->db->select('*');
		$this->db->from('INNOVATION_CREATOR');
		$this->db->where('DeleteStatus=0');
		$query = $this->db->get();
		return $query->result();
	}
}