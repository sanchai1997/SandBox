<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fm_innovation extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Innovation_model');
	}

	public function index()
	{
		$data['query'] = $this->Innovation_model->show_index();
		// echo '<pre>';
		// print_r($data);
		// echo'</pre>';
		// exit;

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('pages/dashboard/EII/innovation', $data);
		$this->load->view('templates/footer');
	}
	public function sh1()
	{
		$data['query'] = $this->Innovation_model->show_in();
		// echo '<pre>';
		// print_r($data);
		// echo'</pre>';
		// exit;

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('pages/dashboard/EII/innovation', $data);
		$this->load->view('templates/footer');
	}
	public function sh2()
	{
		$data['query'] = $this->Innovation_model->show_in_tor();

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('pages/dashboard/EII/innovation', $data);
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
		$this->load->view('pages/forms/EII/forms-innovation');
		$this->load->view('templates/footer');
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
