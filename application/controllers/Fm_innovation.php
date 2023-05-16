<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once '_sandboxcontroller.php';
class Fm_innovation extends _sandboxcontroller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Innovation_model');
		$this->load->library('session');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data = array();
		$data = $this->session->userdata();

		if (!empty($data['UserRights'])) {
			//'502000', 'ข้อมูลแนวปฏิบัติที่เป็นเลิศการจัดการศึกษา'
			$R_502000 = $data['UserRights'][array_search('502000', array_column($data['UserRights'], 'UR_Code'))];
			$data['R_502000'] = $R_502000;
		} else {
			$data['R_502000'] = NULL;
		}
		$data['query'] = $this->Innovation_model->show_index();
		// echo '<pre>';
		// print_r($data);
		// echo'</pre>';
		// exit;

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pages/dashboard/EII/innovation', $data);
		$this->load->view('templates/footer', $data);
	}
	public function sh1()
	{
		$data = array();
		$data = $this->session->userdata();

		if (!empty($data['UserRights'])) {
			//'502000', 'ข้อมูลแนวปฏิบัติที่เป็นเลิศการจัดการศึกษา'
			$R_502000 = $data['UserRights'][array_search('502000', array_column($data['UserRights'], 'UR_Code'))];
			$data['R_502000'] = $R_502000;
		} else {
			$data['R_502000'] = NULL;
		}
		$data['query'] = $this->Innovation_model->show_in();
		// echo '<pre>';
		// print_r($data);
		// echo'</pre>';
		// exit;

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pages/dashboard/EII/innovation', $data);
		$this->load->view('templates/footer', $data);
	}
	public function sh2()
	{
		$data = array();
		$data = $this->session->userdata();

		if (!empty($data['UserRights'])) {
			//'502000', 'ข้อมูลแนวปฏิบัติที่เป็นเลิศการจัดการศึกษา'
			$R_502000 = $data['UserRights'][array_search('502000', array_column($data['UserRights'], 'UR_Code'))];
			$data['R_502000'] = $R_502000;
		} else {
			$data['R_502000'] = NULL;
		}
		$data['query'] = $this->Innovation_model->show_in_tor();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pages/dashboard/EII/innovation', $data);
		$this->load->view('templates/footer', $data);
	}
	public function forms()
	{
		$data = array();
		$data = $this->session->userdata();

		if (!empty($data['UserRights'])) {
			//'502000', 'ข้อมูลแนวปฏิบัติที่เป็นเลิศการจัดการศึกษา'
			$R_502000 = $data['UserRights'][array_search('502000', array_column($data['UserRights'], 'UR_Code'))];
			$data['R_502000'] = $R_502000;
		} else {
			$data['R_502000'] = NULL;
		}
		// 		echo '<pre>';
		// print_r($data_q_member . $data_q_committee);
		// echo '</pre>';
		// exit;


		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pages/forms/EII/forms-innovation', $data);
		$this->load->view('templates/footer', $data);
	}
	public function adding_sh1()
	{
		$this->Innovation_model->add_in_model();
	}
	public function edit_sh1()
	{
		$this->Innovation_model->edit_in_model();
	}
	public function del_sh1()
	{
		$this->Innovation_model->del_in_model();
	}
	public function adding_sh2()
	{
		$this->Innovation_model->add_in_tor_model();
	}
	public function edit_sh2()
	{
		$this->Innovation_model->edit_in_tor_model();
	}
	public function del_sh2()
	{
		$this->Innovation_model->del_in_tor_model();
	}
}
