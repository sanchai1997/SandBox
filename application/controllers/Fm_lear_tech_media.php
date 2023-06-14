<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once '_sandboxcontroller.php';
class Fm_lear_tech_media extends _sandboxcontroller {


	public function __construct()
	{
			parent::__construct();
			$this->load->model('Lear_tech_media_model');
			$this->load->library('session');
			$this->load->library('form_validation');
	}

	public function index()
	{
		$data = array();
		$data = $this->session->userdata();
		
				if(!empty($data['UserRights'])){
					//'503000', 'ข้อมูลแนวปฏิบัติที่เป็นเลิศการจัดการศึกษา'
					$R_503000 = $data['UserRights'][array_search('503000', array_column($data['UserRights'], 'UR_Code'))];		
					$data['R_503000'] = $R_503000;
				}else{
					$data['R_503000'] = NULL;
				}
		$data['query']=$this->Lear_tech_media_model->show_index();
		
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
		$this->load->view('pages/dashboard/EII/lear_tech_media',$data);
        $this->load->view('templates/footer', $data);
		
	}
	public function sh1()
	{
		$data = array();
		$data = $this->session->userdata();
		
				if(!empty($data['UserRights'])){
					//'503000', 'ข้อมูลแนวปฏิบัติที่เป็นเลิศการจัดการศึกษา'
					$R_503000 = $data['UserRights'][array_search('503000', array_column($data['UserRights'], 'UR_Code'))];		
					$data['R_503000'] = $R_503000;
				}else{
					$data['R_503000'] = NULL;
				}
		$data['query']=$this->Lear_tech_media_model->show_LTM();
		
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
		$this->load->view('pages/dashboard/EII/lear_tech_media',$data);
        $this->load->view('templates/footer', $data);
		
	}
	public function sh2()
	{
		$data = array();
		$data = $this->session->userdata();
		
				if(!empty($data['UserRights'])){
					//'503000', 'ข้อมูลแนวปฏิบัติที่เป็นเลิศการจัดการศึกษา'
					$R_503000 = $data['UserRights'][array_search('503000', array_column($data['UserRights'], 'UR_Code'))];		
					$data['R_503000'] = $R_503000;
				}else{
					$data['R_503000'] = NULL;
				}
		$data['query']=$this->Lear_tech_media_model->show_LTMC();
		
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
		$this->load->view('pages/dashboard/EII/lear_tech_media',$data);
        $this->load->view('templates/footer', $data);
		
	}
	public function forms()
    {
        
        // 		echo '<pre>';
        // print_r($data_q_member . $data_q_committee);
        // echo '</pre>';
        // exit;
        $data = array();
		$data = $this->session->userdata();
		
				if(!empty($data['UserRights'])){
					//'503000', 'ข้อมูลแนวปฏิบัติที่เป็นเลิศการจัดการศึกษา'
					$R_503000 = $data['UserRights'][array_search('503000', array_column($data['UserRights'], 'UR_Code'))];		
					$data['R_503000'] = $R_503000;
				}else{
					$data['R_503000'] = NULL;
				}
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/EII/forms-learning_technology_media');
        $this->load->view('templates/footer', $data);
        
    }
	public function adding_sh1()
	{
		$this->Lear_tech_media_model->add_LTM();

		
	}
	public function edit_sh1()
	{
		$this->Lear_tech_media_model->edit_LTM();

		
	}
	public function del_sh1()
	{
		$this->Lear_tech_media_model->del_LTM();

		
	}
	public function adding_sh2()
	{
		$this->Lear_tech_media_model->add_LTMC();

		
	}
	public function edit_sh2()
	{
		$this->Lear_tech_media_model->edit_LTMC();

		
	}
	public function del_sh2()
	{
		$this->Lear_tech_media_model->del_LTMC();

		
	}
}
