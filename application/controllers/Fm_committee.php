<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once '_sandboxcontroller.php';
class Fm_committee extends _sandboxcontroller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('Committee_model');
			$this->load->library('session');
			$this->load->library('form_validation');
	}
	public function committee()
	{
		$data = array();
$data = $this->session->userdata();

if(!empty($data['UserRights'])){
	//'602000', 'ข้อมูลแนวปฏิบัติที่เป็นเลิศการจัดการศึกษา'
	$R_602000 = $data['UserRights'][array_search('602000', array_column($data['UserRights'], 'UR_Code'))];		
	$data['R_602000'] = $R_602000;
}else{
	$data['R_602000'] = NULL;
}
		
		$data['query']=$this->Committee_model->show_committee();
		
		
// 		echo '<pre>';
// print_r($data);
// echo '</pre>';
// exit;


$this->load->view('templates/header', $data);
$this->load->view('templates/sidebar', $data);
$this->load->view('pages/dashboard/EII/committee' , $data);
$this->load->view('templates/footer', $data);


	}

	public function member()
	{
		
		$data = array();
$data = $this->session->userdata();

if(!empty($data['UserRights'])){
	//'602000', 'ข้อมูลแนวปฏิบัติที่เป็นเลิศการจัดการศึกษา'
	$R_602000 = $data['UserRights'][array_search('602000', array_column($data['UserRights'], 'UR_Code'))];		
	$data['R_602000'] = $R_602000;
}else{
	$data['R_602000'] = NULL;
		$data['query']=$this->Committee_model->show_comm_member();
}
// 		echo '<pre>';
// print_r($data . $data);
// echo '</pre>';
// exit;


$this->load->view('templates/header', $data);
$this->load->view('templates/sidebar', $data);
$this->load->view('pages/dashboard/EII/committee', $data);
$this->load->view('templates/footer', $data);


	}
	public function index()
	{
		$data = array();
$data = $this->session->userdata();

if(!empty($data['UserRights'])){
	//'602000', 'ข้อมูลแนวปฏิบัติที่เป็นเลิศการจัดการศึกษา'
	$R_602000 = $data['UserRights'][array_search('602000', array_column($data['UserRights'], 'UR_Code'))];		
	$data['R_602000'] = $R_602000;
}else{
	$data['R_602000'] = NULL;
		$data['query']=$this->Committee_model->show_index();
}
		
// 		echo '<pre>';
// print_r($data);
// echo '</pre>';
// exit;


$this->load->view('templates/header', $data);
$this->load->view('templates/sidebar', $data);
$this->load->view('pages/dashboard/EII/committee' , $data);
$this->load->view('templates/footer', $data);


	}
	public function form_page()
	{
		
		$data = array();
$data = $this->session->userdata();

if(!empty($data['UserRights'])){
	//'602000', 'ข้อมูลแนวปฏิบัติที่เป็นเลิศการจัดการศึกษา'
	$R_602000 = $data['UserRights'][array_search('602000', array_column($data['UserRights'], 'UR_Code'))];		
	$data['R_602000'] = $R_602000;
}else{
	$data['R_602000'] = NULL;
}
		// echo '<pre>';
		// print_r($data);
		// echo'</pre>';
		// exit;
		
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
		$this->load->view('pages/forms/EII/forms-committee', $data);
        $this->load->view('templates/footer', $data);
		
	}

	public function adding()
	{
		$this->Committee_model->add_committee();

		
	}
	public function edit_committee()
	{
		$this->Committee_model->edit_committee();

		
	}
	public function del_committee()
	{
		$this->Committee_model->del_committee();

		
	}
	public function adding_member()
	{
		$this->Committee_model->add_comm_member();

		
	}
	public function edit_member()
	{
		$this->Committee_model->edit_comm_member();

		
	}
	public function del_member()
	{
		$this->Committee_model->del_comm_member();

		
	}

}
