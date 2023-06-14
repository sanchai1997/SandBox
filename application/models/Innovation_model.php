<?php
class Innovation_model extends CI_Model
{

	public function add_in_model()
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
					$config['upload_path'] = './assets/EII/INNOVATION/';
					$config['allowed_types'] = 'doc|docx|pdf|jpg|png|xls|ppt|zip';
					$config['encrypt_name'] = TRUE;
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('AttachmentURL')) {
						echo $this->upload->display_errors();
					} else {

						$data = $this->upload->data();
						$filename = $data['file_name'];
						$data = array(
							'InnovationID' => $this->input->post('InnovationID'),
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
						// ใช้งานฟังก์ชัน get_client_ip() ในโค้ด
						$query = $this->db->insert('INNOVATION', $data);
						if ($query == TRUE) {
							$UserID = $this->session->userdata('UserID');
							
							$log = [
								'LogMessage' => 'เพิ่มข้อมูล นวัตกรรมการศึกษา = "' . $this->input->post('InnovationName') . '"',
								'LogUserID' => $UserID,
								'LogUsername' => $this->input->post('UserName'),
								'LogIpAddress' => $ip_address,
								'LogCreation' => date('Y-m-d H:i:s')
							];
							$logresult = $this->db->insert('SYS_LOG', $log);
						}
						if ($query) {

							session_start(); // เริ่มต้น session
							$_SESSION['success'] = "เพิ่มข้อมูลนวัตกรรมการศึกษาสำเร็จ !"; // กำหนดค่า success ใน session เป็น true
							header("Location:" . site_url('Fm_innovation_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้. 

						} else {
							echo 'false';
						}
					}
				} else {
					$data = array(
						'InnovationID' => $this->input->post('InnovationID'),
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
					// ใช้งานฟังก์ชัน get_client_ip() ในโค้ด
					$query = $this->db->insert('INNOVATION', $data);
					

					if ($query == TRUE) {
						
						$UserID = $this->session->userdata('UserID');
						$log = [
							'LogMessage' => 'เพิ่มข้อมูล นวัตกรรมการศึกษา = "' . $this->input->post('InnovationName') . '"',
							'LogUserID' => $UserID,
							'LogUsername' => $this->input->post('UserName'),
							'LogIpAddress' => $ip_address,
							'LogCreation' => date('Y-m-d H:i:s')
						];
						
						$logresult = $this->db->insert('SYS_LOG', $log);
					}
					if ($query) {
						session_start(); // เริ่มต้น session
						$_SESSION['success'] = "เพิ่มข้อมูลนวัตกรรมการศึกษาสำเร็จ !"; // กำหนดค่า success ใน session เป็น true
						header("Location:" . site_url('Fm_innovation_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้. 

					} else {
						echo 'false';
					}
				}
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
		
			$ip_address = '';
			if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
				$ip_address = $_SERVER['HTTP_CLIENT_IP'];
			} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
				$ip_address = $_SERVER['REMOTE_ADDR'];
			}
			
	
		//    echo '<pre>';
		// 	print_r($_POST);
		// 	echo'</pre>';
		// 	exit;
		if (isset($_FILES['AttachmentURL'])) {
			$file = $_FILES['AttachmentURL']['tmp_name'];
			if (file_exists($file)) {
				$config['upload_path'] = './assets/EII/INNOVATION/';
				$config['allowed_types'] = 'doc|docx|pdf|jpg|png|xls|ppt|zip';
				$config['max_size'] = 50000;
				$config['max_width'] = 3402;
				$config['max_height'] = 1417;
				$config['encrypt_name'] = TRUE;
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('AttachmentURL')) {
					echo $this->upload->display_errors();
				} else {
					$oil_file = $this->input->post('oil_file');
					unlink('./assets/EII/INNOVATION/' . $oil_file);
					$data = $this->upload->data();
					$filename = $data['file_name'];
					$data = array(
						'InnovationID' => $this->input->post('InnovationID'),
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
					$this->db->where('Id_in', $this->input->post('Id_in'));
					$query = $this->db->update('INNOVATION', $data);
					if ($query == TRUE) {
						
						$UserID = $this->session->userdata('UserID');
						$log = [
							'LogMessage' => 'แก้ไขข้อมูล นวัตกรรมการศึกษา = "' . $this->input->post('InnovationName') . '"',
							'LogUserID' => $UserID,
							'LogUsername' => $this->input->post('UserName'),
							'LogIpAddress' => $ip_address,
							'LogCreation' => date('Y-m-d H:i:s')
						];
						
						$logresult = $this->db->insert('SYS_LOG', $log);
					}
					if ($query) {
						session_start(); // เริ่มต้น session
						$_SESSION['success'] = "แก้ไขสำเร็จ !"; // กำหนดค่า success ใน session เป็น true
						header("Location:" . site_url('Fm_innovation_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้. 

					} else {
						echo 'false';
					}
				}
			} else {
				$data = array(
					'InnovationID' => $this->input->post('InnovationID'),
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
				$this->db->where('Id_in', $this->input->post('Id_in'));
				$query = $this->db->update('INNOVATION', $data);
				if ($query == TRUE) {
						
					$UserID = $this->session->userdata('UserID');
					$log = [
						'LogMessage' => 'แก้ไขข้อมูล นวัตกรรมการศึกษา = "' . $this->input->post('InnovationName') . '"',
						'LogUserID' => $UserID,
						'LogUsername' => $this->input->post('UserName'),
						'LogIpAddress' => $ip_address,
						'LogCreation' => date('Y-m-d H:i:s')
					];
					
					$logresult = $this->db->insert('SYS_LOG', $log);
				}
				if ($query) {
					session_start(); // เริ่มต้น session
					$_SESSION['success'] = "แก้ไขสำเร็จ !"; // กำหนดค่า success ใน session เป็น true
					header("Location:" . site_url('Fm_innovation_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้. 

				} else {
					echo 'false';
				}
			}
		}
	}
	public function del_in_model()
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
		// 		print_r($_POST);
		// 		echo '</pre>';
		// 		exit;
		$velue = "1";
		$data = array(


			'DeleteStatus' => $velue

		);
		$this->db->where('Id_in', $this->input->post('Id_in'));
		$query = $this->db->update('INNOVATION', $data);
		if ($query == TRUE) {
						
			$UserID = $this->session->userdata('UserID');
			$log = [
				'LogMessage' => 'ลบข้อมูล นวัตกรรมการศึกษา = "' . $this->input->post('name') . '"',
				'LogUserID' => $UserID,
				'LogUsername' => $this->input->post('UserName'),
				'LogIpAddress' => $ip_address,
				'LogCreation' => date('Y-m-d H:i:s')
			];
			
			$logresult = $this->db->insert('SYS_LOG', $log);
		}
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
		// 	echo '</pre>';
		// 	exit;

		$InnovationID = $this->input->post('InnovationID');
		$CreatorPersonalID = $this->input->post('CreatorPersonalID');
		$encodedCreatorPersonalID = base64_encode($CreatorPersonalID);
		$this->db->where('InnovationID', $InnovationID);
		$this->db->where('CreatorPersonalID', $CreatorPersonalID);
		$this->db->where('DeleteStatus=0');
		$this->db->where('CreatorPersonalID!=0');
		$query = $this->db->get('INNOVATION_CREATOR');
		$num_rows = $query->num_rows();
		if ($num_rows <= 0) {
			// ไม่พบข้อมูลจากฐานข้อมูล
			$data = array(
				'InnovationID' => $this->input->post('InnovationID'),
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
			$query = $this->db->insert('INNOVATION_CREATOR', $data);
				if ($query == TRUE) {
						
			$UserID = $this->session->userdata('UserID');
			$log = [
				'LogMessage' => 'เพิ่มข้อมูล ผู้จัดทำนวัตกรรมการศึกษา = "' . $this->input->post('name') . '"',
				'LogUserID' => $UserID,
				'LogUsername' => $this->input->post('UserName'),
				'LogIpAddress' => $ip_address,
				'LogCreation' => date('Y-m-d H:i:s')
			];
			
			$logresult = $this->db->insert('SYS_LOG', $log);
		}
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
	}
	public function edit_in_tor_model()
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

		$InnovationID = $this->input->post('InnovationID');
		$CreatorPersonalID = $this->input->post('CreatorPersonalID');
		$encodedCreatorPersonalID = base64_encode($CreatorPersonalID);
		$this->db->where('InnovationID', $InnovationID);
		$this->db->where('CreatorPersonalID', $CreatorPersonalID);
		$this->db->where('DeleteStatus=0');
		$this->db->where('CreatorPersonalID!=0');
		$query = $this->db->get('INNOVATION_CREATOR');
		$num_rows = $query->num_rows();
		if ($num_rows <= 0) {
			// ไม่พบข้อมูลจากฐานข้อมูล
			$data = array(
				'InnovationID' => $this->input->post('InnovationID'),
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
			$this->db->where('Id_inc', $this->input->post('Id_inc'));
			$query = $this->db->update('INNOVATION_CREATOR', $data);
			if ($query == TRUE) {
						
				$UserID = $this->session->userdata('UserID');
				$log = [
					'LogMessage' => 'แก้ไขข้อมูล ผู้จัดทำนวัตกรรมการศึกษา = "' . $this->input->post('name') . '"',
					'LogUserID' => $UserID,
					'LogUsername' => $this->input->post('UserName'),
					'LogIpAddress' => $ip_address,
					'LogCreation' => date('Y-m-d H:i:s')
				];
				
				$logresult = $this->db->insert('SYS_LOG', $log);
			}
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
	}
	public function del_in_tor_model()
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
		$this->db->where('Id_inc', $this->input->post('Id_inc'));
		$query = $this->db->update('INNOVATION_CREATOR', $data);
		if ($query == TRUE) {
						
			$UserID = $this->session->userdata('UserID');
			$log = [
				'LogMessage' => 'ลบข้อมูล ผู้จัดทำนวัตกรรมการศึกษา = "' . $this->input->post('name') . '"',
				'LogUserID' => $UserID,
				'LogUsername' => $this->input->post('UserName'),
				'LogIpAddress' => $ip_address,
				'LogCreation' => date('Y-m-d H:i:s')
			];
			
			$logresult = $this->db->insert('SYS_LOG', $log);
		}
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
