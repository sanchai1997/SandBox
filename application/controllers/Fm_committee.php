<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fm_committee extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('Committee_model');
			
	}
	public function committee()
	{
		
		$data['query']=$this->Committee_model->show_committee();
		
		
// 		echo '<pre>';
// print_r($data);
// echo '</pre>';
// exit;


$this->load->view('templates/header');
$this->load->view('templates/sidebar');
$this->load->view('pages/dashboard/committee' , $data);
$this->load->view('templates/footer');


	}

	public function member()
	{
		
		
		$data['query']=$this->Committee_model->show_comm_member();
		
// 		echo '<pre>';
// print_r($data . $data);
// echo '</pre>';
// exit;


$this->load->view('templates/header');
$this->load->view('templates/sidebar');
$this->load->view('pages/dashboard/committee', $data);
$this->load->view('templates/footer');


	}
	public function index()
	{
		
		$data['query']=$this->Committee_model->show_index();
		
		
// 		echo '<pre>';
// print_r($data);
// echo '</pre>';
// exit;


$this->load->view('templates/header');
$this->load->view('templates/sidebar');
$this->load->view('pages/dashboard/committee' , $data);
$this->load->view('templates/footer');


	}
	public function form_page()
	{
		
		
		
		// echo '<pre>';
		// print_r($data);
		// echo'</pre>';
		// exit;
		
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
		$this->load->view('pages/forms/EII/forms-committee');
        $this->load->view('templates/footer');
		
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
