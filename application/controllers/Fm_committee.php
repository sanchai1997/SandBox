<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fm_committee extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('committee_model');
			
	}
	public function committee()
	{
		
		$data['query']=$this->committee_model->show_committee();
		
		
// 		echo '<pre>';
// print_r($data);
// echo '</pre>';
// exit;

$this->load->view('mycss');
$this->load->view('templates/header');
$this->load->view('templates/sidebar');
$this->load->view('pages/dashboard/committee' , $data);
$this->load->view('templates/footer');
$this->load->view('myjs');

	}

	public function member()
	{
		
		
		$data['query']=$this->committee_model->show_comm_member();
		
// 		echo '<pre>';
// print_r($data . $data);
// echo '</pre>';
// exit;

$this->load->view('mycss');
$this->load->view('templates/header');
$this->load->view('templates/sidebar');
$this->load->view('pages/dashboard/committee', $data);
$this->load->view('templates/footer');
$this->load->view('myjs');

	}
	public function index()
	{
		
		$data['query']=$this->committee_model->show_index();
		
		
// 		echo '<pre>';
// print_r($data);
// echo '</pre>';
// exit;

$this->load->view('mycss');
$this->load->view('templates/header');
$this->load->view('templates/sidebar');
$this->load->view('pages/dashboard/committee' , $data);
$this->load->view('templates/footer');
$this->load->view('myjs');

	}
	public function form_page()
	{
		
		
		
		// echo '<pre>';
		// print_r($data);
		// echo'</pre>';
		// exit;
		$this->load->view('mycss');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
		$this->load->view('pages/forms/EII/forms-committee');
        $this->load->view('templates/footer');
		$this->load->view('myjs');
	}

	public function adding()
	{
		$this->committee_model->add_committee();

		
	}
	public function edit_committee()
	{
		$this->committee_model->edit_committee();

		
	}
	public function del_committee()
	{
		$this->committee_model->del_committee();

		
	}
	public function adding_member()
	{
		$this->committee_model->add_comm_member();

		
	}
	public function edit_member()
	{
		$this->committee_model->edit_comm_member();

		
	}
	public function del_member()
	{
		$this->committee_model->del_comm_member();

		
	}

}
