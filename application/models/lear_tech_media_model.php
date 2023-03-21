<?php
class Lear_tech_media_model extends CI_Model
{

	public function add_LTM()
	{

		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		if (isset($_FILES['AttachmentURL'])) {
			$file = $_FILES['AttachmentURL']['tmp_name'];
			if (file_exists($file)) {
				$config['upload_path'] = './document/';
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
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "เพิ่มข้อมูลเรียบร้อย !"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_lear_tech_media_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function edit_LTM()
	{

		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		if (isset($_FILES['AttachmentURL'])) {
			$file = $_FILES['AttachmentURL']['tmp_name'];
			if (file_exists($file)) {
				$config['upload_path'] = './document/';
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
		$this->db->where('Id', $this->input->post('Id'));
		$query = $this->db->update('LEARNING_TECHNOLOGY_MEDIA', $data);
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

		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		$value = "1";
		$data = array(

			'DeleteStatus' => $value
		);

		$this->db->where('Id', $this->input->post('Id'));
		$query = $this->db->update('LEARNING_TECHNOLOGY_MEDIA', $data);
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

		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		$data = array(
			'MediaID' => $this->input->post('MediaID'),
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
		$query = $this->db->insert('LEARNING_TECHNOLOGY_MEDIA_CREATOR', $data);
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "เพิ่มข้อมูลเรียบร้อย !"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_lear_tech_media_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function edit_LTMC()
	{

		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		$data = array(
			'MediaID' => $this->input->post('MediaID'),
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

		$query = $this->db->update('LEARNING_TECHNOLOGY_MEDIA_CREATOR', $data);
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "แก้ไขข้อมูลสำเร็จ !"; // กำหนดค่า success ใน session เป็น true
			header("Location: " . site_url('Fm_lear_tech_media_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function del_LTMC()
	{

		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		$value = "1";
		$data = array(

			'DeleteStatus' => 	$value
		);
		$this->db->where('Id', $this->input->post('Id'));

		$query = $this->db->update('LEARNING_TECHNOLOGY_MEDIA_CREATOR', $data);
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
