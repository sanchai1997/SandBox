<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once '_sandboxcontroller.php';
class Fm_participant extends _sandboxcontroller {


	public function __construct()
	{
			parent::__construct();
			$this->load->model('Participant_model');
			$this->load->library('session');
			$this->load->library('form_validation');
	}
	public function index()
	{
		$data = array();
		$data = $this->session->userdata();
		
				if(!empty($data['UserRights'])){
					//'601000', 'ข้อมูลแนวปฏิบัติที่เป็นเลิศการจัดการศึกษา'
					$R_601000 = $data['UserRights'][array_search('601000', array_column($data['UserRights'], 'UR_Code'))];		
					$data['R_601000'] = $R_601000;
				}else{
					$data['R_601000'] = NULL;
				}
		$data['query']=$this->Participant_model->show_index();

		
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
		$this->load->view('pages/dashboard/EII/participant',$data);
        $this->load->view('templates/footer', $data);
		
	}
	public function sh1()
	{
		$data = array();
		$data = $this->session->userdata();
		
				if(!empty($data['UserRights'])){
					//'601000', 'ข้อมูลแนวปฏิบัติที่เป็นเลิศการจัดการศึกษา'
					$R_601000 = $data['UserRights'][array_search('601000', array_column($data['UserRights'], 'UR_Code'))];		
					$data['R_601000'] = $R_601000;
				}else{
					$data['R_601000'] = NULL;
				}
		$data['query']=$this->Participant_model->show_par();//sh1
		
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
		$this->load->view('pages/dashboard/EII/participant',$data);
        $this->load->view('templates/footer', $data);
		
	}
	public function sh2()
	{
		$data = array();
		$data = $this->session->userdata();
		
				if(!empty($data['UserRights'])){
					//'601000', 'ข้อมูลแนวปฏิบัติที่เป็นเลิศการจัดการศึกษา'
					$R_601000 = $data['UserRights'][array_search('601000', array_column($data['UserRights'], 'UR_Code'))];		
					$data['R_601000'] = $R_601000;
				}else{
					$data['R_601000'] = NULL;
				}
		$data['query']=$this->Participant_model->show_par_con();//sh2
		
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
		$this->load->view('pages/dashboard/EII/participant',$data);
        $this->load->view('templates/footer', $data);
		
	}
	public function sh3()
	{
		$data = array();
		$data = $this->session->userdata();
		
				if(!empty($data['UserRights'])){
					//'601000', 'ข้อมูลแนวปฏิบัติที่เป็นเลิศการจัดการศึกษา'
					$R_601000 = $data['UserRights'][array_search('601000', array_column($data['UserRights'], 'UR_Code'))];		
					$data['R_601000'] = $R_601000;
				}else{
					$data['R_601000'] = NULL;
				}
		$data['query']=$this->Participant_model->show_par_coop();//sh3
		
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
		$this->load->view('pages/dashboard/EII/participant',$data);
        $this->load->view('templates/footer', $data);
		
	}
	public function sh4()
	{
		$data = array();
		$data = $this->session->userdata();
		
				if(!empty($data['UserRights'])){
					//'601000', 'ข้อมูลแนวปฏิบัติที่เป็นเลิศการจัดการศึกษา'
					$R_601000 = $data['UserRights'][array_search('601000', array_column($data['UserRights'], 'UR_Code'))];		
					$data['R_601000'] = $R_601000;
				}else{
					$data['R_601000'] = NULL;
				}
		$data['query']=$this->Participant_model->show_par_note();//sh4
		
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
		$this->load->view('pages/dashboard/EII/participant',$data);
        $this->load->view('templates/footer', $data);
		
	}
	public function forms()
    {
		$data = array();
		$data = $this->session->userdata();
		
				if(!empty($data['UserRights'])){
					//'601000', 'ข้อมูลแนวปฏิบัติที่เป็นเลิศการจัดการศึกษา'
					$R_601000 = $data['UserRights'][array_search('601000', array_column($data['UserRights'], 'UR_Code'))];		
					$data['R_601000'] = $R_601000;
				}else{
					$data['R_601000'] = NULL;
				}
        // 		echo '<pre>';
        // print_r($data_q_member . $data_q_committee);
        // echo '</pre>';
        // exit;
        
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/EII/forms-participant');
        $this->load->view('templates/footer', $data);
        
    }
	public function adding_sh1()
	{
		$this->Participant_model->add_par();

		
	}
	public function edit_sh1()
	{
		$this->Participant_model->edit_par();

		
	}
	public function del_sh1()
	{
		$this->Participant_model->del_par();

		
	}
	public function adding_sh2()
	{
		$this->Participant_model->add_par_con();

		
	}
	public function edit_sh2()
	{
		$this->Participant_model->edit_par_con();

		
	}
	public function del_sh2()
	{
		$this->Participant_model->del_par_con();

		
	}
	public function adding_sh3()
	{
		$this->Participant_model->add_par_coop();

		
	}
	public function edit_sh3()
	{
		$this->Participant_model->edit_par_coop();

		
	}
	public function del_sh3()
	{
		$this->Participant_model->del_par_coop();

		
	}
	public function adding_sh4()
	{
		$this->Participant_model->add_par_note();

		
	}
	public function edit_sh4()
	{
		$this->Participant_model->edit_par_note();

		
	}
	public function del_sh4()
	{
		$this->Participant_model->del_par_note();

		
	}


}
