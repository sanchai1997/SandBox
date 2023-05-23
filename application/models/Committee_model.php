<?php
class Committee_model extends CI_Model
{

	public function add_committee()
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
		$CommitteeProvinceCode = $this->input->post('CommitteeProvinceCode');
		$CommitteeYear = $this->input->post('CommitteeYear');
		$CommitteeAppointmentNumber = $this->input->post('CommitteeAppointmentNumber');
		$CommitteeAppointmentTypeCode = $this->input->post('CommitteeAppointmentTypeCode');

		$this->db->where('CommitteeProvinceCode', $CommitteeProvinceCode);
		$this->db->where('CommitteeYear', $CommitteeYear);
		$this->db->where('CommitteeAppointmentNumber', $CommitteeAppointmentNumber);
		$this->db->where('CommitteeAppointmentTypeCode', $CommitteeAppointmentTypeCode);
		$this->db->where('DeleteStatus=0');
		$query = $this->db->get('COMMITTEE');
		$num_chk = $query->num_rows();

		// ตรวจสอบจำนวนแถวที่ค้นพบว่ามีมากกว่า 0 หรือไม่
		if ($num_chk <= 0) {
			// ไม่พบข้อมูลในฐานข้อมูล
			if (isset($_FILES['CommitteeAppointmentAttachmentURL'])) {
				$file = $_FILES['CommitteeAppointmentAttachmentURL']['tmp_name'];
				if (file_exists($file)) {
					$config['upload_path'] = 'assets/EII/COMMITTEE/';
					$config['allowed_types'] = 'doc|docx|pdf|jpg|png|xls|ppt|zip|xlsx';
					$config['encrypt_name'] = TRUE;

					$this->load->library('upload', $config);

					if (!$this->upload->do_upload('CommitteeAppointmentAttachmentURL')) {
						echo $this->upload->display_errors();
					} else {

						$data = $this->upload->data();
						$filename = $data['file_name'];
						$data = array(
							'CommitteeProvinceCode' => $this->input->post('CommitteeProvinceCode'),
							'CommitteeYear' => $this->input->post('CommitteeYear'),
							'CommitteeAppointmentNumber' => $this->input->post('CommitteeAppointmentNumber'),
							'CommitteeAppointmentTypeCode' => $this->input->post('CommitteeAppointmentTypeCode'),
							'CommitteeAppointmentAttachmentURL' => $filename

						);
					}
				} else {
					$data = array(
						'CommitteeProvinceCode' => $this->input->post('CommitteeProvinceCode'),
						'CommitteeYear' => $this->input->post('CommitteeYear'),
						'CommitteeAppointmentNumber' => $this->input->post('CommitteeAppointmentNumber'),
						'CommitteeAppointmentTypeCode' => $this->input->post('CommitteeAppointmentTypeCode'),


					);
				}
			}
			$query = $this->db->insert('COMMITTEE', $data);
			if ($query == TRUE) {
				$UserID = $this->session->userdata('UserID');
				$log = [
						'LogMessage' => 'เพิ่มข้อมูล ผู้อำนาจและหน้าที่ เลขที่คำสั่ง = "' . $this->input->post('CommitteeAppointmentNumber') . '"',
				'LogUserID' => $UserID,
				'LogUsername' => $this->input->post('UserName'),
				'LogIpAddress' => $ip_address,
				'LogCreation' => date('Y-m-d H:i:s')
				];
				$logresult = $this->db->insert('SYS_LOG', $log);
				}
			if ($query) {
				session_start(); // เริ่มต้น session
				$_SESSION['success'] = "เพิ่มข้อมูลเรียบร้อย !"; // กำหนดค่า success ใน session เป็น true
				header("Location:" . site_url('Fm_committee_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้

			} else {
				echo 'false';
			}
		} else {
			// พบข้อมูลในฐานข้อมูล
			session_start(); // เริ่มต้น session
			$_SESSION['false'] = "ไม่มามารถบันทึกข้อมูลได้โปรดตรวจสอบข้อมูล (จังหวัด/ปีการศึกษา/เลขคำสั่ง/ประเภทการแต่งตั้ง) ซ้ำกันในระบบ !"; // กำหนดค่า success ใน session เป็น true
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			exit;
		}
	}

	public function edit_committee()
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
		if (isset($_FILES['CommitteeAppointmentAttachmentURL'])) {
			$file = $_FILES['CommitteeAppointmentAttachmentURL']['tmp_name'];
			if (file_exists($file)) {
				$config['upload_path'] = './assets/EII/COMMITTEE/';
				$config['allowed_types'] = 'doc|docx|pdf|jpg|png|xls|ppt|zip|xlsx';
				$config['encrypt_name'] = TRUE;
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('CommitteeAppointmentAttachmentURL')) {
					echo $this->upload->display_errors();
				} else {

					$oil_file = $this->input->post('oil_file');
					unlink('./assets/EII/COMMITTEE/' . $oil_file);
					$data = $this->upload->data();
					echo $filename = $data['file_name'];
					$data = array(
						'CommitteeProvinceCode' => $this->input->post('CommitteeProvinceCode'),
						'CommitteeYear' => $this->input->post('CommitteeYear'),
						'CommitteeAppointmentNumber' => $this->input->post('CommitteeAppointmentNumber'),
						'CommitteeAppointmentTypeCode' => $this->input->post('CommitteeAppointmentTypeCode'),
						'CommitteeAppointmentAttachmentURL' => $filename
					);
					$this->db->where('Id', $this->input->post('Id'));
					
					$query = $this->db->update('COMMITTEE', $data);
					
					if ($query == TRUE) {
						$UserID = $this->session->userdata('UserID');
						$log = [
						'LogMessage' => 'แก้ไขข้อมูล ผู้อำนาจและหน้าที่ เลขที่คำสั่ง = "' . $this->input->post('CommitteeAppointmentNumber') . '"',
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
						header("Location:" . site_url('Fm_committee_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้

					} else {
						echo 'false';
					}
				}
			} else {
				$data = array(
					'CommitteeProvinceCode' => $this->input->post('CommitteeProvinceCode'),
					'CommitteeYear' => $this->input->post('CommitteeYear'),
					'CommitteeAppointmentNumber' => $this->input->post('CommitteeAppointmentNumber'),
					'CommitteeAppointmentTypeCode' => $this->input->post('CommitteeAppointmentTypeCode')

				);
				$this->db->where('Id', $this->input->post('Id'));
				
				$query = $this->db->update('COMMITTEE', $data);
				if ($query == TRUE) {
					$UserID = $this->session->userdata('UserID');
					$log = [
					'LogMessage' => 'แก้ไขข้อมูล ผู้อำนาจและหน้าที่ เลขที่คำสั่ง = "' . $this->input->post('CommitteeAppointmentNumber') . '"',
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
					header("Location:" . site_url('Fm_committee_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้

				} else {
					echo 'false';
				}
			}
		}



	}
	public function del_committee()
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
		$query = $this->db->update('COMMITTEE', $data);
		if ($query == TRUE) {
			$UserID = $this->session->userdata('UserID');
			$log = [
			'LogMessage' => 'ลบข้อมูล ผู้อำนาจและหน้าที่ เลขที่คำสั่ง = "' . $this->input->post('CommitteeAppointmentNumber') . '"',
			'LogUserID' => $UserID,
			'LogUsername' => $this->input->post('UserName'),
			'LogIpAddress' => $ip_address,
			'LogCreation' => date('Y-m-d H:i:s')
			];
						
			$logresult = $this->db->insert('SYS_LOG', $log);
			}
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "ลบสำเร็จ !"; // กำหนดค่า success ใน session เป็น true
			header("Location:" . site_url('Fm_committee_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function add_comm_member()
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

		$CommitteeProvinceCode = $this->input->post('CommitteeProvinceCode');
		$CommitteeYear = $this->input->post('CommitteeYear');
		$CommitteeAppointmentNumber = $this->input->post('CommitteeAppointmentNumber');
		$CommitteeMemberNameThai = $this->input->post('CommitteeMemberNameThai');
		$CommitteeMemberLastNameThai = $this->input->post('CommitteeMemberLastNameThai');
		$this->db->where('CommitteeProvinceCode', $CommitteeProvinceCode);
		$this->db->where('CommitteeYear', $CommitteeYear);
		$this->db->where('CommitteeAppointmentNumber', $CommitteeAppointmentNumber);
		$this->db->where('CommitteeMemberNameThai', $CommitteeMemberNameThai);
		$this->db->where('CommitteeMemberLastNameThai', $CommitteeMemberLastNameThai);
		$this->db->where('DeleteStatus=0');
		$query = $this->db->get('COMMITTEE_MEMBER');
		$num_chk = $query->num_rows();
		if ($num_chk <= 0) {
			// ไม่พบข้อมูลในฐานข้อมูล
			$data = array(
				'CommitteeProvinceCode' => $this->input->post('CommitteeProvinceCode'),
				'CommitteeYear' => $this->input->post('CommitteeYear'),
				'CommitteeAppointmentNumber' => $this->input->post('CommitteeAppointmentNumber'),
				'CommitteeMemberPrefixCode' => $this->input->post('CommitteeMemberPrefixCode'),
				'CommitteeMemberNameThai' => $this->input->post('CommitteeMemberNameThai'),
				'CommitteeMemberNameEnglish' => $this->input->post('CommitteeMemberNameEnglish'),
				'CommitteeMemberMiddleNameThai' => $this->input->post('CommitteeMemberMiddleNameThai'),
				'CommitteeMemberMiddleNameEnglish' => $this->input->post('CommitteeMemberMiddleNameEnglish'),
				'CommitteeMemberLastNameThai' => $this->input->post('CommitteeMemberLastNameThai'),
				'CommitteeMemberLastNameEnglish' => $this->input->post('CommitteeMemberLastNameEnglish'),
				'CommitteeMemberPositionCode' => $this->input->post('CommitteeMemberPositionCode'),
				'CommitteeMemberOrganizationPosition' => $this->input->post('CommitteeMemberOrganizationPosition'),
				'CommitteeMemberTermStartDate' => $this->input->post('CommitteeMemberTermStartDate'),
				'CommitteeMemberTermEndDate' => $this->input->post('CommitteeMemberTermEndDate')

			);
			$query = $this->db->insert('COMMITTEE_MEMBER', $data);
			if ($query == TRUE) {
				$UserID = $this->session->userdata('UserID');
				$log = [
				'LogMessage' => 'เพิ่มข้อมูล คณะกรรมการ เลขที่คำสั่ง = "' . $this->input->post('CommitteeAppointmentNumber')  . '"',
				'LogUserID' => $UserID,
				'LogUsername' => $this->input->post('UserName'),
				'LogIpAddress' => $ip_address,
				'LogCreation' => date('Y-m-d H:i:s')
				];
				$logresult = $this->db->insert('SYS_LOG', $log);
				}
			if ($query) {
				session_start(); // เริ่มต้น session
				$_SESSION['success'] = "เพิ่มข้อมูลเรียบร้อย !"; // กำหนดค่า success ใน session เป็น true
				header("Location:" . site_url('Fm_committee_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้

			} else {
				echo 'false';
			}
		} else {
			// พบข้อมูลในฐานข้อมูล
			session_start(); // เริ่มต้น session
			$_SESSION['false'] = "ไม่มามารถบันทึกข้อมูลได้โปรดตรวจสอบข้อมูล (จังหวัด/ปีที่ออกคำสั่ง/เลขคำสั่ง/ชื่อ-นามสกุล) ซ้ำกันในระบบ !"; // กำหนดค่า success ใน session เป็น true
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			exit;
		}
	}
	public function edit_comm_member()
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
			'CommitteeProvinceCode' => $this->input->post('CommitteeProvinceCode'),
			'CommitteeYear' => $this->input->post('CommitteeYear'),
			'CommitteeAppointmentNumber' => $this->input->post('CommitteeAppointmentNumber'),
			'CommitteeMemberPrefixCode' => $this->input->post('CommitteeMemberPrefixCode'),
			'CommitteeMemberNameThai' => $this->input->post('CommitteeMemberNameThai'),
			'CommitteeMemberNameEnglish' => $this->input->post('CommitteeMemberNameEnglish'),
			'CommitteeMemberMiddleNameThai' => $this->input->post('CommitteeMemberMiddleNameThai'),
			'CommitteeMemberMiddleNameEnglish' => $this->input->post('CommitteeMemberMiddleNameEnglish'),
			'CommitteeMemberLastNameThai' => $this->input->post('CommitteeMemberLastNameThai'),
			'CommitteeMemberLastNameEnglish' => $this->input->post('CommitteeMemberLastNameEnglish'),
			'CommitteeMemberPositionCode' => $this->input->post('CommitteeMemberPositionCode'),
			'CommitteeMemberOrganizationPosition' => $this->input->post('CommitteeMemberOrganizationPosition'),
			'CommitteeMemberTermStartDate' => $this->input->post('CommitteeMemberTermStartDate'),
			'CommitteeMemberTermEndDate' => $this->input->post('CommitteeMemberTermEndDate')

		);
		$this->db->where('Id', $this->input->post('Id'));

		$query = $this->db->update('COMMITTEE_MEMBER', $data);
		if ($query == TRUE) {
			$UserID = $this->session->userdata('UserID');
			$log = [
			'LogMessage' => 'แก้ไขข้อมูล  คณะกรรมการ เลขที่คำสั่ง = "' . $this->input->post('CommitteeAppointmentNumber')  . '"',
			'LogUserID' => $UserID,
			'LogUsername' => $this->input->post('UserName'),
			'LogIpAddress' => $ip_address,
			'LogCreation' => date('Y-m-d H:i:s')
			];
			$logresult = $this->db->insert('SYS_LOG', $log);
			}
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "แก้ไขข้อมูลสำเร็จ !"; // กำหนดค่า success ใน session เป็น true
			header("Location:" . site_url('Fm_committee_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function del_comm_member()
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

		$query = $this->db->update('COMMITTEE_MEMBER', $data);
		if ($query == TRUE) {
			$UserID = $this->session->userdata('UserID');
			$log = [
			'LogMessage' => 'ลบข้อมูล  คณะกรรมการ เลขที่คำสั่ง = "' . $this->input->post('CommitteeAppointmentNumber')  . '"',
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
			header("Location:" . site_url('Fm_committee_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}

	public function show_committee()
	{
		$this->db->select('*');
		$this->db->from('COMMITTEE as com');
		$this->db->where('DeleteStatus = 0');
		$query = $this->db->get();
		return $query->result();
	}
	public function show_comm_member()
	{
		$this->db->select('*');
		$this->db->from('COMMITTEE_MEMBER as com_m');
		$this->db->where('DeleteStatus = 0');
		$query = $this->db->get();
		return $query->result();
	}
	public function show_index()
	{
		$this->db->select('com.*,com_m.*');
		$this->db->from('COMMITTEE as com');
		$this->db->join('COMMITTEE_MEMBER as com_m', 'com.CommitteeAppointmentNumber=com_m.CommitteeAppointmentNumber');
		$query = $this->db->get();
		return $query->result();
	}
}