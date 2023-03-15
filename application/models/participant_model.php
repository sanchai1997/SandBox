<?php
class Participant_model extends CI_Model {

    public function add_par()
    {

        // echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
        $data = array(
            'ParticipantID' => $this->input->post('ParticipantID'),
            'ParticipantName' => $this->input->post('ParticipantName'),
            'ParticipantTypeCode' => $this->input->post('ParticipantTypeCode')
        );
		$query=$this->db->insert('PARTICIPANT',$data);
		if($query){
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "เพิ่มข้อมูลเรียบร้อย !"; // กำหนดค่า success ใน session เป็น true
			header("Location: ".site_url('Fm_participant_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้
			
		} else {
			echo 'false';
		}
    }
	public function edit_par()
    {

        // echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
        $data = array(
            'ParticipantID' => $this->input->post('ParticipantID'),
            'ParticipantName' => $this->input->post('ParticipantName'),
            'ParticipantTypeCode' => $this->input->post('ParticipantTypeCode')
        );
		$this->db->where('Id',$this->input->post('Id'));
		$query=$this->db->update('PARTICIPANT',$data);
		if($query){
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "แก้ไขข้อมูลสำเร็จ !"; // กำหนดค่า success ใน session เป็น true
			header("Location: ".site_url('Fm_participant_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้
			
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
		$value="1";
        $data = array(
            
            'DeleteStatus' => $value 
        );
		$this->db->where('Id',$this->input->post('Id'));
		$query=$this->db->update('PARTICIPANT',$data);
		if($query){
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "ลบข้อมูลสำเร็จ !"; // กำหนดค่า success ใน session เป็น true
			header("Location: ".site_url('Fm_participant_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้
			
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
		$query=$this->db->insert('PARTICIPANT_CONTACT',$data);
		if($query){
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "เพิ่มข้อมูลสำเร็จ !"; // กำหนดค่า success ใน session เป็น true
			header("Location: ".site_url('Fm_participant_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้
			
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
		$this->db->where('Id',$this->input->post('Id'));
		$query=$this->db->update('PARTICIPANT_CONTACT',$data);
		if($query){
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "แก้ไขข้อมูลสำเร็จ !"; // กำหนดค่า success ใน session เป็น true
			header("Location: ".site_url('Fm_participant_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้
			
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
		$value="1";
        $data = array(
            
            'DeleteStatus' => $value 
        );
		$this->db->where('Id',$this->input->post('Id'));
		$query=$this->db->update('PARTICIPANT_CONTACT',$data);
		if($query){
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "ลบข้อมูลสำเร็จ !"; // กำหนดค่า success ใน session เป็น true
			header("Location: ".site_url('Fm_participant_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้
			
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
		$config['upload_path'] = './document/';
        $config['allowed_types'] = 'doc|docx|pdf|jpg|png|xls|ppt|zip|xlsx';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('CooperationAttachmentURL')) 
        {
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
		$query=$this->db->insert('PARTICIPANT_COOPERATION',$data);
		if($query){
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "เพิ่มข้อมูลเรียบร้อย !"; // กำหนดค่า success ใน session เป็น true
			header("Location: ".site_url('Fm_participant_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้
			
		} else {
			echo 'false';
		}
	}
    }
	public function edit_par_coop()
    {

        // echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		if(isset($_FILES['CooperationAttachmentURL'])){
			$file = $_FILES['CooperationAttachmentURL']['tmp_name'];
			if(file_exists($file)){
		$config['upload_path'] = './document/';
        $config['allowed_types'] = 'doc|docx|pdf|jpg|png|xls|ppt|zip|xlsx';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('CooperationAttachmentURL')) 
        {
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
	}else{
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
$this->db->where('Id',$this->input->post('Id'));
		$query=$this->db->update('PARTICIPANT_COOPERATION',$data);
		if($query){
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "แก้ไขข้อมูลสำเร็จ !"; // กำหนดค่า success ใน session เป็น true
			header("Location: ".site_url('Fm_participant_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้
			
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
	$value ="0";
			$data = array(
				
				'DeleteStatus' => $value
			);
		
			$this->db->where('Id',$this->input->post('Id'));
			$query=$this->db->update('PARTICIPANT_COOPERATION',$data);
			if($query){
				session_start(); // เริ่มต้น session
				$_SESSION['success'] = "ลบข้อมูลสำเร็จ !"; // กำหนดค่า success ใน session เป็น true
				header("Location: ".site_url('Fm_participant_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้
				
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
		$query=$this->db->insert('PARTICIPANT_NOTE',$data);
		if($query){
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "เพิ่มข้อมูลเรียบร้อย !"; // กำหนดค่า success ใน session เป็น true
			header("Location: ".site_url('Fm_participant_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้
			
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
		$this->db->where('Id',$this->input->post('Id'));

		$query=$this->db->update('PARTICIPANT_NOTE',$data);
		if($query){
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "แก้ไขข้อมูลสำเร็จ !"; // กำหนดค่า success ใน session เป็น true
			header("Location: ".site_url('Fm_participant_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้
			
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
		$value ="1";
		$data = array(
			
			'DeleteStatus' => $value
		);
		$this->db->where('Id',$this->input->post('Id'));

		$query=$this->db->update('PARTICIPANT_NOTE',$data);
		if($query){
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "ลบข้อมูลสำเร็จ !"; // กำหนดค่า success ใน session เป็น true
			header("Location: ".site_url('Fm_participant_das_p1?page=sh1')); // ไปยังหน้าก่อนหน้านี้
			
		} else {
			echo 'false';
		}
    }
    public function show_index() 
	{
		$this->db->select('par.*,par_con.*,par_coop.*,par_note.*');
		$this->db->from('PARTICIPANT as par');
        $this->db->join('PARTICIPANT_CONTACT as par_con ','par.ParticipantID=par_con.ParticipantID');
		$this->db->join('PARTICIPANT_COOPERATION as par_coop ','par.ParticipantID=par_coop.ParticipantID');
		$this->db->join('PARTICIPANT_NOTE as par_note ','par.ParticipantID=par_note.ParticipantID');

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