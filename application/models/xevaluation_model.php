<?php
class evaluation_model extends CI_Model
{

	public function add_EVALUATION_CRITERIA_model()
	{

		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		$data = array(
			'INNOVATION_AREA_CODE' => $this->input->post('INNOVATION_AREA_CODE'),
			'CRITERIA_NAME' => $this->input->post('CRITERIA_NAME'),
			'CRITERIA_DESCRIPTION' => $this->input->post('CRITERIA_DESCRIPTION')

		);
		$query = $this->db->insert('EVALUATION_CRITERIA', $data);
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "เพิ่มข้อมูลเทคโนโลยี และสื่อการเรียนรู้สำเร็จ !"; // กำหนดค่า success ใน session เป็น true
			header("Location: {$_SERVER['HTTP_REFERER']}"); // ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function add_EVALUATION_CRITERIA_LEVEL_model()
	{

		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		$data = array(
			'CRITERIA_ID' => $this->input->post('CRITERIA_ID'),
			'LEVEL_INDEX' => $this->input->post('LEVEL_INDEX'),
			'LEVEL_NAME' => $this->input->post('LEVEL_NAME')

		);
		$query = $this->db->insert('EVALUATION_CRITERIA_LEVEL', $data);
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "เพิ่มข้อมูลเทคโนโลยี และสื่อการเรียนรู้สำเร็จ !"; // กำหนดค่า success ใน session เป็น true
			header("Location: {$_SERVER['HTTP_REFERER']}"); // ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function add_EVALUATION_CRITERIA_COMPOSITION_model()
	{

		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		$data = array(
			'CRITERIA_ID' => $this->input->post('CRITERIA_ID'),
			'COMPOSITION_INDEX' => $this->input->post('COMPOSITION_INDEX'),
			'COMPOSITION_NAME' => $this->input->post('COMPOSITION_NAME'),
			'COMPOSITION_WEIGHT_SCORE' => $this->input->post('COMPOSITION_WEIGHT_SCORE'),
			'COMPOSITION_GUIDELIINE' => $this->input->post('COMPOSITION_GUIDELIINE')

		);
		$query = $this->db->insert('EVALUATION_CRITERIA_COMPOSITION', $data);
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "เพิ่มข้อมูลเทคโนโลยี และสื่อการเรียนรู้สำเร็จ !"; // กำหนดค่า success ใน session เป็น true
			header("Location: {$_SERVER['HTTP_REFERER']}"); // ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function add_EVALUATION_CRITERIA_COMPOSITION_LEVEL_model()
	{

		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		$data = array(
			'CRITERIA_COMPOSITION_ID' => $this->input->post('CRITERIA_COMPOSITION_ID'),
			'CRITERIA_LEVEL_ID' => $this->input->post('CRITERIA_LEVEL_ID'),
			'COMPOSITION_LEVEL_DESCRIPTION' => $this->input->post('COMPOSITION_LEVEL_DESCRIPTION')


		);
		$query = $this->db->insert('EVALUATION_CRITERIA_COMPOSITION_LEVEL', $data);
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "เพิ่มข้อมูลเทคโนโลยี และสื่อการเรียนรู้สำเร็จ !"; // กำหนดค่า success ใน session เป็น true
			header("Location: {$_SERVER['HTTP_REFERER']}"); // ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}

	public function add_SCHOOL_EVALUATION_model()
	{

		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		$data = array(
			'SCHOOL_ID' => $this->input->post('SCHOOL_ID'),
			'EVALUATION_NAME' => $this->input->post('EVALUATION_NAME'),
			'EVALUATION_DESCRIPTION' => $this->input->post('EVALUATION_DESCRIPTION')


		);
		$query = $this->db->insert('SCHOOL_EVALUATION', $data);
		if ($query) {
			session_start(); // เริ่มต้น session
			$_SESSION['success'] = "เพิ่มข้อมูลเทคโนโลยี และสื่อการเรียนรู้สำเร็จ !"; // กำหนดค่า success ใน session เป็น true
			header("Location: {$_SERVER['HTTP_REFERER']}"); // ไปยังหน้าก่อนหน้านี้

		} else {
			echo 'false';
		}
	}
	public function add_SCHOOL_EVALUATION_CRITERIA_model()
	{

		// echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
		$data = array(
			'SCHOOL_EVALUATION_ID' => $this->input->post('SCHOOL_EVALUATION_ID'),
			'CRITERIA_ID' => $this->input->post('CRITERIA_ID'),
			'SELF_EVALUATE_FLAG' => $this->input->post('SELF_EVALUATE_FLAG'),
			'EVALUATOR_NAME' => $this->input->post('EVALUATOR_NAME'),
			'SCHOOL_EVALUATION_CODE' => $this->input->post('SCHOOL_EVALUATION_CODE')
		);



		$query = $this->db->insert('SCHOOL_EVALUATION_CRITERIA', $data);

		if ($query) {
			$datas = array(
				'SCHOOL_EVALUATION_CRITERIA_ID' => $this->input->post('SCHOOL_EVALUATION_CRITERIA_ID'),
				'CRITERIA_COMPOSITION_ID' => $this->input->post('CRITERIA_COMPOSITION_ID'),
				'LEVEL_INDEX' => $this->input->post('LEVEL_INDEX')
			);
			$querys = $this->db->insert('SCHOOL_EVALUATION_CRITERIA_LEVEL', $datas);
			if ($querys) {
				session_start(); // เริ่มต้น session
				$_SESSION['success'] = "เพิ่มข้อมูลเทคโนโลยี และสื่อการเรียนรู้สำเร็จ !"; // กำหนดค่า success ใน session เป็น true
				header("Location: {$_SERVER['HTTP_REFERER']}"); // ไปยังหน้าก่อนหน้านี้
			} else {
				echo 'false';
			}
		} else {
			echo 'false';
		}
	}
	public function show_EVALUATION_CRITERIA_model()
        {
                $query = $this->db->get('EVALUATION_CRITERIA');
                return $query->result();
        }
		public function show_EVALUATION_CRITERIA_LEVEL_model()
        {
                $query = $this->db->get('EVALUATION_CRITERIA_LEVEL');
                return $query->result();
        }
		public function show_EVALUATION_CRITERIA_COMPOSITION_model()
        {
                $query = $this->db->get('EVALUATION_CRITERIA_COMPOSITION');
                return $query->result();
        }
		public function show_EVALUATION_CRITERIA_COMPOSITION_LEVEL_model()
        {
                $query = $this->db->get('EVALUATION_CRITERIA_COMPOSITION_LEVEL');
                return $query->result();
        }
		public function show_SCHOOL_EVALUATION_CRITERIA_model()
        {
                $query = $this->db->get('SCHOOL_EVALUATION_CRITERIA');
                return $query->result();
        }
		public function show_SCHOOL_EVALUATION_model()
        {	
				$this->db->select('sec.*,secl.*');
				$this->db->from('');
				$this->db->join('');
                $query = $this->db->get('SCHOOL_EVALUATION');
                return $query->result();
        }




}
