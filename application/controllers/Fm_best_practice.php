<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once '_sandboxcontroller.php';
class Fm_best_practice extends _sandboxcontroller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('Best_practice_model');
			$this->load->library('session');
			$this->load->library('form_validation');
	}
	public function index()
	{
		

		$data['query']=$this->Best_practice_model->show_index();
		
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
		$this->load->view('pages/dashboard/EII/best_practice',$data);
        $this->load->view('templates/footer', $data);
		
	}
	public function sh1()
	{

		$data = array();
		$data = $this->session->userdata();

		if(!empty($data['UserRights'])){
			//'504000', 'ข้อมูลแนวปฏิบัติที่เป็นเลิศการจัดการศึกษา'
			$R_504000 = $data['UserRights'][array_search('504000', array_column($data['UserRights'], 'UR_Code'))];		
			$data['R_504000'] = $R_504000;
		}else{
			$data['R_504000'] = NULL;
		}
		var_dump($data['UserIPAddress']);
		$data['query']=$this->Best_practice_model->show_BP();
		
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
		$this->load->view('pages/dashboard/EII/best_practice',$data);
        $this->load->view('templates/footer', $data);
		
	}
	public function sh2()
	{
		$data = array();
		$data = $this->session->userdata();

		if(!empty($data['UserRights'])){
			//'504000', 'ข้อมูลแนวปฏิบัติที่เป็นเลิศการจัดการศึกษา'
			$R_504000 = $data['UserRights'][array_search('504000', array_column($data['UserRights'], 'UR_Code'))];		
			$data['R_504000'] = $R_504000;
		}else{
			$data['R_504000'] = NULL;
		}
		$data['query']=$this->Best_practice_model->show_BPC();
		
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
		$this->load->view('pages/dashboard/EII/best_practice',$data);
        $this->load->view('templates/footer', $data);
		
	}
	public function forms()
    {
        $data = array();
		$data = $this->session->userdata();

		if(!empty($data['UserRights'])){
			//'504000', 'ข้อมูลแนวปฏิบัติที่เป็นเลิศการจัดการศึกษา'
			$R_504000 = $data['UserRights'][array_search('504000', array_column($data['UserRights'], 'UR_Code'))];		
			$data['R_504000'] = $R_504000;
		}else{
			$data['R_504000'] = NULL;
		}
        // 		echo '<pre>';
        // print_r($data_q_member . $data_q_committee);
        // echo '</pre>';
        // exit;
        
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
		$this->load->view('pages/forms/EII/forms-best_practice', $data);
        $this->load->view('templates/footer', $data);
        
    }
	public function add_sh1()
	{
		$this->Best_practice_model->add_BP();

		
	}
	public function edit_sh1()
	{
		
		$this->Best_practice_model->edit_BP();

		
	}
	public function del_sh1()
	{
		
		$this->Best_practice_model->del_BP();

		
	}
	public function add_sh2()
	{
		$this->Best_practice_model->add_BPC();

		
	}
	public function edit_sh2()
	{
		
		$this->Best_practice_model->edit_BPC();

		
	}
	public function del_sh2()
	{
		
		$this->Best_practice_model->del_BPC();

		
	}

}
