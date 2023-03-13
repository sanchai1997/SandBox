<?php
class committee_model extends CI_Model {

    public function add_committee()
    {

        // echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		$config['upload_path'] = './document/';
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
		$query=$this->db->insert('COMMITTEE',$data);
		if($query){
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "เพิ่มข้อมูลเทคโนโลยี และสื่อการเรียนรู้สำเร็จ !"; // กำหนดค่า success ใน session เป็น true
			header("Location:".site_url('Fm_committee/committee')); // ไปยังหน้าก่อนหน้านี้
			
		} else {
			echo 'false';
		}
    }
}
    public function add_comm_member()
    {

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
		$query=$this->db->insert('COMMITTEE_MEMBER',$data);
		if($query){
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "เพิ่มข้อมูลเทคโนโลยี และสื่อการเรียนรู้สำเร็จ !"; // กำหนดค่า success ใน session เป็น true
			header("Location:".site_url('Fm_committee/member?page=sh2')); // ไปยังหน้าก่อนหน้านี้
			
		} else {
			echo 'false';
		}
    }
	
    
    public function show_committee()
	{
		$this->db->select('*');
		$this->db->from('COMMITTEE as com');
		$query = $this->db->get();
		return $query->result();
        }
        public function show_comm_member()
	{
		$this->db->select('*');
		$this->db->from('COMMITTEE_MEMBER as com_m');
		$query = $this->db->get();
		return $query->result();
        }
        public function show_index()
	{
		$this->db->select('com.*,com_m.*');
		$this->db->from('COMMITTEE as com');
        $this->db->join('COMMITTEE_MEMBER as com_m','com.CommitteeAppointmentNumber=com_m.CommitteeAppointmentNumber');
		$query = $this->db->get();
		return $query->result();
        }
}