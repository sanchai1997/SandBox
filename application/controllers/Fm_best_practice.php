<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fm_best_practice extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('best_practice_model');
	}
	public function index()
	{
		$data['query']=$this->best_practice_model->show_index();
		$this->load->view('mycss');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
		$this->load->view('pages/dashboard/best_practice',$data);
        $this->load->view('templates/footer');
		$this->load->view('myjs');
	}
	public function sh1()
	{
		$data['query']=$this->best_practice_model->show_BP();
		$this->load->view('mycss');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
		$this->load->view('pages/dashboard/best_practice',$data);
        $this->load->view('templates/footer');
		$this->load->view('myjs');
	}
	public function sh2()
	{
		
		$data['query']=$this->best_practice_model->show_BPC();
		$this->load->view('mycss');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
		$this->load->view('pages/dashboard/best_practice',$data);
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
		$this->load->view('pages/forms/EII/forms-best_practice');
        $this->load->view('templates/footer');
        $this->load->view('myjs');
    }
	public function add_sh1()
	{
		$this->best_practice_model->add_BP();

		
	}
	public function edit_sh1()
	{
		
		$this->best_practice_model->edit_BP();

		
	}
	public function del_sh1()
	{
		
		$this->best_practice_model->del_BP();

		
	}
	public function add_sh2()
	{
		$this->best_practice_model->add_BPC();

		
	}
	public function edit_sh2()
	{
		
		$this->best_practice_model->edit_BPC();

		
	}
	public function del_sh2()
	{
		
		$this->best_practice_model->del_BPC();

		
	}

}
