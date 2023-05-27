<?php
class Participant_model extends CI_Model
{

	public function add_par()
	{
		

		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		$ParticipantName = $this->input->post('ParticipantName');
		$ParticipantTypeCode = $this->input->post('ParticipantTypeCode');
		$this->db->where('ParticipantName', $ParticipantName);
		$this->db->where('ParticipantTypeCode', $ParticipantTypeCode);
		$this->db->where('DeleteStatus=0');
		$query = $this->db->get('PARTICIPANT');
		$num_chk = $query->num_rows();
		if ($num_chk <= 0) {
			// ไม่พบข้อมูลในฐานข้อมูล
			$data = array(
				// 'ParticipantID' => $this->input->post('ParticipantID'),
				'ParticipantName' => $this->input->post('ParticipantName'),
				'ParticipantTypeCode' => $this->input->post('ParticipantTypeCode')
			);
			$this->db->trans_start();
			$query = $this->db->insert('PARTICIPANT', $data);
			$last_id = $this->db->insert_id();
			$this->db->trans_complete();
			if ($query == TRUE) {
				$UserID = $this->session->userdata('UserID');
				$UserIPAddress = $this->session->userdata('UserIPAddress');
				$log = [
					'LogMessage' => 'เพิ่มข้อมูล หน่วยงานที่เข้ามามีส่วนร่วม  ชื่อภาครัฐ "' . $this->input->post('ParticipantName') . '"',
					'LogUserID' => $UserID,
					'LogUsername' => $this->input->post('UserName'),
					'LogIpAddress' => $UserIPAddress,
					'LogCreation' => date('Y-m-d H:i:s')
				];
				$logresult = $this->db->insert('SYS_LOG', $log);
			}
			if ($query) {
				session_start(); // เริ่มต้น session
				$_SESSION['success'] = "เพิ่มข้อมูลเรียบร้อย !"; // กำหนดค่า success ใน session เป็น true
				header("Location: " . site_url('Fm_participant_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้

			} else {
				echo 'false';
			}
		} else {
			// พบข้อมูลในฐานข้อมูล
			session_start(); // เริ่มต้น session
			$_SESSION['false'] = "ไม่มามารถบันทึกข้อมูลได้โปรดตรวจสอบข้อมูล (ชื่อ/ประเภท) ซ้ำกันในระบบ !"; // กำหนดค่า success ใน session เป็น true
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			exit;
		}
	}
	public function edit_par()
	{
		

		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		$data = array(
			// 'ParticipantID' => $this->input->post('ParticipantID'),
			'ParticipantName' => $this->input->post('ParticipantName'),
			'ParticipantTypeCode' => $this->input->post('ParticipantTypeCode')
		);
		$this->db->where('ParticipantID', $this->input->post('ParticipantID'));
		$query = $this->db->update('PARTICIPANT', $data);
		if ($query == TRUE) {
			$UserID = $this->session->userdata('UserID');
			$UserIPAddress = $this->session->userdata('UserIPAddress');
			$log = [
				'LogMessage' => 'แก้ไขข้อมูล หน่วยงานที่เข้ามามีส่วนร่วม  ชื่อภาครัฐ "' . $this->input->post('ParticipantName') . '"',
				'LogUserID' => $UserID,
				'LogUsername' => $this->input->post('UserName'),
				'LogIpAddress' => $UserIPAddress,
				'LogCreation' => date('Y-m-d H:i:s')
			];
			$logresult = $this->db->insert('SYS_LOG', $log);
		}
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "แก้ไขข้อมูลสำเร็จ !"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_participant_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function del_par()
	{
		

		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		$value = "1";
		$data = array(

			'DeleteStatus' => $value
		);
		$this->db->where('ParticipantID', $this->input->post('ParticipantID'));
		$query = $this->db->update('PARTICIPANT', $data);
		if ($query == TRUE) {
			$UserID = $this->session->userdata('UserID');
			$UserIPAddress = $this->session->userdata('UserIPAddress');
			$log = [
				'LogMessage' => 'ลบข้อมูล หน่วยงานที่เข้ามามีส่วนร่วม  ชื่อภาครัฐ "' . $this->input->post('ParticipantName') . '"',
				'LogUserID' => $UserID,
				'LogUsername' => $this->input->post('UserName'),
				'LogIpAddress' => $UserIPAddress,
				'LogCreation' => date('Y-m-d H:i:s')
			];

			$logresult = $this->db->insert('SYS_LOG', $log);
		}
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "ลบข้อมูลสำเร็จ !"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_participant_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function add_par_con()
	{
		

		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		$data = array(
			'ParticipantID' => $this->input->post('ParticipantID'),
			'ContactName' => $this->input->post('ContactName'),
			'ContactPhone' => $this->input->post('ContactPhone'),
			'ContactMobilePhone' => $this->input->post('ContactMobilePhone'),
			'ContactEmail' => $this->input->post('ContactEmail'),
			'ContactOrganizationPosition' => $this->input->post('ContactOrganizationPosition')
		);
		$query = $this->db->insert('PARTICIPANT_CONTACT', $data);
		if ($query == TRUE) {
			$UserID = $this->session->userdata('UserID');
			$UserIPAddress = $this->session->userdata('UserIPAddress');
			$log = [
				'LogMessage' => 'เพิ่มข้อมูล ติดต่อผู้มีส่วนร่วมของหน่วยงานที่เข้ามามีส่วนร่วม = "' . $this->input->post('name') . '"',
				'LogUserID' => $UserID,
				'LogUsername' => $this->input->post('UserName'),
				'LogIpAddress' => $UserIPAddress,
				'LogCreation' => date('Y-m-d H:i:s')
			];
			$logresult = $this->db->insert('SYS_LOG', $log);
		}
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "เพิ่มข้อมูลสำเร็จ !"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_participant_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function edit_par_con()
	{
		

		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		$data = array(
			'ParticipantID' => $this->input->post('ParticipantID'),
			'ContactName' => $this->input->post('ContactName'),
			'ContactPhone' => $this->input->post('ContactPhone'),
			'ContactMobilePhone' => $this->input->post('ContactMobilePhone'),
			'ContactEmail' => $this->input->post('ContactEmail'),
			'ContactOrganizationPosition' => $this->input->post('ContactOrganizationPosition')
		);
		$this->db->where('Id', $this->input->post('Id'));
		$query = $this->db->update('PARTICIPANT_CONTACT', $data);
		if ($query == TRUE) {
			$UserID = $this->session->userdata('UserID');
			$UserIPAddress = $this->session->userdata('UserIPAddress');
			$log = [
				'LogMessage' => 'แก้ไขข้อมูล ติดต่อผู้มีส่วนร่วมของหน่วยงานที่เข้ามามีส่วนร่วม = "' . $this->input->post('name') . '"',
				'LogUserID' => $UserID,
				'LogUsername' => $this->input->post('UserName'),
				'LogIpAddress' => $UserIPAddress,
				'LogCreation' => date('Y-m-d H:i:s')
			];
			$logresult = $this->db->insert('SYS_LOG', $log);
		}
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "แก้ไขข้อมูลสำเร็จ !"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_participant_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function del_par_con()
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
		$query = $this->db->update('PARTICIPANT_CONTACT', $data);
		if ($query == TRUE) {
			$UserID = $this->session->userdata('UserID');
			$UserIPAddress = $this->session->userdata('UserIPAddress');
			$log = [
				'LogMessage' => 'ลบข้อมูล ติดต่อผู้มีส่วนร่วมของหน่วยงานที่เข้ามามีส่วนร่วม = "' . $this->input->post('name') . '"',
				'LogUserID' => $UserID,
				'LogUsername' => $this->input->post('UserName'),
				'LogIpAddress' => $UserIPAddress,
				'LogCreation' => date('Y-m-d H:i:s')
			];

			$logresult = $this->db->insert('SYS_LOG', $log);
		}
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "ลบข้อมูลสำเร็จ !"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_participant_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function add_par_coop()
	{
		

		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		if (isset($_FILES['CooperationAttachmentURL'])) {
			$file = $_FILES['CooperationAttachmentURL']['tmp_name'];
			if (file_exists($file)) {
				$config['upload_path'] = 'assets/EII/PARTICIPANT_COOPERATION/';
				$config['allowed_types'] = 'doc|docx|pdf|jpg|png|xls|ppt|zip|xlsx';
				$config['encrypt_name'] = TRUE;

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('CooperationAttachmentURL')) {
					echo $this->upload->display_errors();
				} else {

					$data = $this->upload->data();
					$filename = $data['file_name'];
					$data = array(
						'ParticipantID' => $this->input->post('ParticipantID'),
						'CooperationStartDate' => $this->input->post('CooperationStartDate'),
						'CooperationEndDate' => $this->input->post('CooperationEndDate'),
						'CooperationStatusCode' => $this->input->post('CooperationStatusCode'),
						'CooperationActivity' => $this->input->post('CooperationActivity'),
						'CooperationLevelCode' => $this->input->post('CooperationLevelCode'),
						'CooperationSchoolID' => $this->input->post('CooperationSchoolID'),
						'CooperationAttachmentURL' =>  $filename
					);
				}
			} else {
				$data = array(
					'ParticipantID' => $this->input->post('ParticipantID'),
					'CooperationStartDate' => $this->input->post('CooperationStartDate'),
					'CooperationEndDate' => $this->input->post('CooperationEndDate'),
					'CooperationStatusCode' => $this->input->post('CooperationStatusCode'),
					'CooperationActivity' => $this->input->post('CooperationActivity'),
					'CooperationLevelCode' => $this->input->post('CooperationLevelCode'),
					'CooperationSchoolID' => $this->input->post('CooperationSchoolID'),

				);
			}
		}
		$query = $this->db->insert('PARTICIPANT_COOPERATION', $data);
		if ($query == TRUE) {
			$UserID = $this->session->userdata('UserID');
			$UserIPAddress = $this->session->userdata('UserIPAddress');
			$log = [
				'LogMessage' => 'เพิ่มข้อมูล การมีส่วนร่วมของหน่วยงานที่เข้ามามีส่วนร่วม = "' . $this->input->post('name') . '"',
				'LogUserID' => $UserID,
				'LogUsername' => $this->input->post('UserName'),
				'LogIpAddress' => $UserIPAddress,
				'LogCreation' => date('Y-m-d H:i:s')
			];
			$logresult = $this->db->insert('SYS_LOG', $log);
		}
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "เพิ่มข้อมูลเรียบร้อย !"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_participant_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}

	public function edit_par_coop()
	{
		

		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		if (isset($_FILES['CooperationAttachmentURL'])) {
			$file = $_FILES['CooperationAttachmentURL']['tmp_name'];
			if (file_exists($file)) {
				$config['upload_path'] = 'assets/EII/PARTICIPANT_COOPERATION/';
				$config['allowed_types'] = 'doc|docx|pdf|jpg|png|xls|ppt|zip|xlsx';
				$config['encrypt_name'] = TRUE;

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('CooperationAttachmentURL')) {
					echo $this->upload->display_errors();
				} else {
					$oil_file = $this->input->post('oil_file');
					unlink('assets/EII/PARTICIPANT_COOPERATION/' . $oil_file);
					$data = $this->upload->data();
					$filename = $data['file_name'];
					$data = array(
						'ParticipantID' => $this->input->post('ParticipantID'),
						'CooperationStartDate' => $this->input->post('CooperationStartDate'),
						'CooperationEndDate' => $this->input->post('CooperationEndDate'),
						'CooperationStatusCode' => $this->input->post('CooperationStatusCode'),
						'CooperationActivity' => $this->input->post('CooperationActivity'),
						'CooperationLevelCode' => $this->input->post('CooperationLevelCode'),
						'CooperationSchoolID' => $this->input->post('CooperationSchoolID'),
						'CooperationAttachmentURL' =>  $filename
					);
				}
			} else {
				$data = array(
					'ParticipantID' => $this->input->post('ParticipantID'),
					'CooperationStartDate' => $this->input->post('CooperationStartDate'),
					'CooperationEndDate' => $this->input->post('CooperationEndDate'),
					'CooperationStatusCode' => $this->input->post('CooperationStatusCode'),
					'CooperationActivity' => $this->input->post('CooperationActivity'),
					'CooperationLevelCode' => $this->input->post('CooperationLevelCode'),
					'CooperationSchoolID' => $this->input->post('CooperationSchoolID'),

				);
			}
		}
		$this->db->where('Id', $this->input->post('Id'));
		$query = $this->db->update('PARTICIPANT_COOPERATION', $data);

		if ($query == TRUE) {
			$UserID = $this->session->userdata('UserID');
			$UserIPAddress = $this->session->userdata('UserIPAddress');
			$log = [
				'LogMessage' => 'แก้ไขข้อมูล ของหน่วยงานที่เข้ามามีส่วนร่วม = "' . $this->input->post('name') . '"',
				'LogUserID' => $UserID,
				'LogUsername' => $this->input->post('UserName'),
				'LogIpAddress' => $UserIPAddress,
				'LogCreation' => date('Y-m-d H:i:s')
			];
			$logresult = $this->db->insert('SYS_LOG', $log);
		}
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "แก้ไขข้อมูลสำเร็จ !"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_participant_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function del_par_coop()
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
		$query = $this->db->update('PARTICIPANT_COOPERATION', $data);

		if ($query == TRUE) {
			$UserID = $this->session->userdata('UserID');
			$UserIPAddress = $this->session->userdata('UserIPAddress');
			$log = [
				'LogMessage' => 'ลบข้อมูล ของหน่วยงานที่เข้ามามีส่วนร่วม = "' . $this->input->post('name') . '"',
				'LogUserID' => $UserID,
				'LogUsername' => $this->input->post('UserName'),
				'LogIpAddress' => $UserIPAddress,
				'LogCreation' => date('Y-m-d H:i:s')
			];

			$logresult = $this->db->insert('SYS_LOG', $log);
		}
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "ลบข้อมูลสำเร็จ !"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_participant_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function add_par_note()
	{
		

		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		$data = array(
			'ParticipantID' => $this->input->post('ParticipantID'),
			'Note' => $this->input->post('Note'),
			'NoteReporterName' => $this->input->post('NoteReporterName'),
			'NoteReporterPhone' => $this->input->post('NoteReporterPhone'),
			'NoteReporterMobilePhone' => $this->input->post('NoteReporterMobilePhone'),
			'NoteReporterEmail' => $this->input->post('NoteReporterEmail')
		);
		$query = $this->db->insert('PARTICIPANT_NOTE', $data);

		if ($query == TRUE) {
			$UserID = $this->session->userdata('UserID');
			$UserIPAddress = $this->session->userdata('UserIPAddress');
			$log = [
				'LogMessage' => 'เพิ่มข้อมูล บันทึกเพิ่มเติมของหน่วยงานที่เข้ามามีส่วนร่วม = "' . $this->input->post('name') . '"',
				'LogUserID' => $UserID,
				'LogUsername' => $this->input->post('UserName'),
				'LogIpAddress' => $UserIPAddress,
				'LogCreation' => date('Y-m-d H:i:s')
			];
			$logresult = $this->db->insert('SYS_LOG', $log);
		}
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "เพิ่มข้อมูลเรียบร้อย !"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_participant_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function edit_par_note()
	{
		

		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		$data = array(
			'ParticipantID' => $this->input->post('ParticipantID'),
			'Note' => $this->input->post('Note'),
			'NoteReporterName' => $this->input->post('NoteReporterName'),
			'NoteReporterPhone' => $this->input->post('NoteReporterPhone'),
			'NoteReporterMobilePhone' => $this->input->post('NoteReporterMobilePhone'),
			'NoteReporterEmail' => $this->input->post('NoteReporterEmail')
		);
		$this->db->where('Id', $this->input->post('Id'));

		$query = $this->db->update('PARTICIPANT_NOTE', $data);

		if ($query == TRUE) {
			$UserID = $this->session->userdata('UserID');
			$UserIPAddress = $this->session->userdata('UserIPAddress');
			$log = [
				'LogMessage' => 'แก้ไขข้อมูล บันทึกเพิ่มเติมของหน่วยงานที่เข้ามามีส่วนร่วม = "' . $this->input->post('name') . '"',
				'LogUserID' => $UserID,
				'LogUsername' => $this->input->post('UserName'),
				'LogIpAddress' => $UserIPAddress,
				'LogCreation' => date('Y-m-d H:i:s')
			];
			$logresult = $this->db->insert('SYS_LOG', $log);
		}
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "แก้ไขข้อมูลสำเร็จ !"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_participant_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function del_par_note()
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

		$query = $this->db->update('PARTICIPANT_NOTE', $data);

		if ($query == TRUE) {
			$UserID = $this->session->userdata('UserID');
			$UserIPAddress = $this->session->userdata('UserIPAddress');
			$log = [
				'LogMessage' => 'ลบข้อมูล บันทึกเพิ่มเติมของหน่วยงานที่เข้ามามีส่วนร่วม = "' . $this->input->post('name') . '"',
				'LogUserID' => $UserID,
				'LogUsername' => $this->input->post('UserName'),
				'LogIpAddress' => $UserIPAddress,
				'LogCreation' => date('Y-m-d H:i:s')
			];

			$logresult = $this->db->insert('SYS_LOG', $log);
		}
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "ลบข้อมูลสำเร็จ !"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_participant_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function show_index()
	{
		$this->db->select('par.*,par_con.*,par_coop.*,par_note.*');
		$this->db->from('PARTICIPANT as par');
		$this->db->join('PARTICIPANT_CONTACT as par_con ', 'par.ParticipantID=par_con.ParticipantID');
		$this->db->join('PARTICIPANT_COOPERATION as par_coop ', 'par.ParticipantID=par_coop.ParticipantID');
		$this->db->join('PARTICIPANT_NOTE as par_note ', 'par.ParticipantID=par_note.ParticipantID');

		$query = $this->db->get();
		return $query->result();
	}
	public function show_par()
	{
		$this->db->select('*');
		$this->db->from('PARTICIPANT');
		$this->db->where('DeleteStatus=0');
		$query = $this->db->get();
		return $query->result();
	}
	public function show_par_con()
	{
		$this->db->select('*');
		$this->db->from('PARTICIPANT_CONTACT');
		$this->db->where('DeleteStatus=0');
		$query = $this->db->get();
		return $query->result();
	}
	public function show_par_coop()
	{
		$this->db->select('*');
		$this->db->from('PARTICIPANT_COOPERATION');
		$this->db->where('DeleteStatus=0');
		$query = $this->db->get();
		return $query->result();
	}
	public function show_par_note()
	{
		$this->db->select('*');
		$this->db->from('PARTICIPANT_NOTE');
		$this->db->where('DeleteStatus=0');
		$query = $this->db->get();
		return $query->result();
	}
}
