<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fm_innovation extends CI_Controller {
	public function __construct()
	{
			parent::__construct();
			$this->load->model('innovation_model');
	}

	public function index()
	{
		$data['query']=$this->innovation_model->show_index();
		// echo '<pre>';
		// print_r($data);
		// echo'</pre>';
		// exit;
		$this->load->view('mycss');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
		$this->load->view('pages/dashboard/innovation',$data);
        $this->load->view('templates/footer');
		$this->load->view('myjs');
	}
	public function sh1()
	{
		$data['query']=$this->innovation_model->show_in();
		// echo '<pre>';
		// print_r($data);
		// echo'</pre>';
		// exit;
		$this->load->view('mycss');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
		$this->load->view('pages/dashboard/innovation',$data);
        $this->load->view('templates/footer');
		$this->load->view('myjs');
	}
	public function sh2()
	{
		$data['query']=$this->innovation_model->show_in_tor();
		$this->load->view('mycss');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
		$this->load->view('pages/dashboard/innovation',$data);
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
        $this->load->view('pages/forms/EII/forms-innovation');
        $this->load->view('templates/footer');
        $this->load->view('myjs');
    }
	public function adding_sh1()
	{
		$this->innovation_model->add_in_model();
	}
	public function edit_sh1()
	{
		$this->innovation_model->edit_in_model();
	}
	public function del_sh1()
	{
		$this->innovation_model->del_in_model();
	}
	public function adding_sh2()
	{
		$this->innovation_model->add_in_tor_model();
	}
	public function edit_sh2()
	{
		$this->innovation_model->edit_in_tor_model();
	}
	public function del_sh2()
	{
		$this->innovation_model->del_in_tor_model();
	}

}
