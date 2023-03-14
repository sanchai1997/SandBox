<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fm_lear_tech_media extends CI_Controller {


	public function __construct()
	{
			parent::__construct();
			$this->load->model('Lear_tech_media_model');
	}

	public function index()
	{
		$data['query']=$this->Lear_tech_media_model->show_index();
		$this->load->view('mycss');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
		$this->load->view('pages/dashboard/lear_tech_media',$data);
        $this->load->view('templates/footer');
		$this->load->view('myjs');
	}
	public function sh1()
	{
		$data['query']=$this->Lear_tech_media_model->show_LTM();
		$this->load->view('mycss');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
		$this->load->view('pages/dashboard/lear_tech_media',$data);
        $this->load->view('templates/footer');
		$this->load->view('myjs');
	}
	public function sh2()
	{
		$data['query']=$this->Lear_tech_media_model->show_LTMC();
		$this->load->view('mycss');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
		$this->load->view('pages/dashboard/lear_tech_media',$data);
        $this->load->view('templates/footer');
		$this->load->view('myjs');
	}
	public function forms()
    {
        
        // 		echo '<pre>';
        // print_r($data_q_member . $data_q_committee);
        // echo '</pre>';
        // exit;
        
        $this->load->view('mycss');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/forms/EII/forms-learning_technology_media');
        $this->load->view('templates/footer');
        $this->load->view('myjs');
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
