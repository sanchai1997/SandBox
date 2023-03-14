<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fm_participant extends CI_Controller {


	public function __construct()
	{
			parent::__construct();
			$this->load->model('Participant_model');
	}
	public function index()
	{
		$data['query']=$this->Participant_model->show_index();

		
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
		$this->load->view('pages/dashboard/participant',$data);
        $this->load->view('templates/footer');
		
	}
	public function sh1()
	{
		$data['query']=$this->Participant_model->show_par();//sh1
		
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
		$this->load->view('pages/dashboard/participant',$data);
        $this->load->view('templates/footer');
		
	}
	public function sh2()
	{
		$data['query']=$this->Participant_model->show_par_con();//sh2
		
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
		$this->load->view('pages/dashboard/participant',$data);
        $this->load->view('templates/footer');
		
	}
	public function sh3()
	{
		$data['query']=$this->Participant_model->show_par_coop();//sh3
		
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
		$this->load->view('pages/dashboard/participant',$data);
        $this->load->view('templates/footer');
		
	}
	public function sh4()
	{
		$data['query']=$this->Participant_model->show_par_note();//sh4
		
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
		$this->load->view('pages/dashboard/participant',$data);
        $this->load->view('templates/footer');
		
	}
	public function forms()
    {
        
        // 		echo '<pre>';
        // print_r($data_q_member . $data_q_committee);
        // echo '</pre>';
        // exit;
        
        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/forms/EII/forms-participant');
        $this->load->view('templates/footer');
        
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
