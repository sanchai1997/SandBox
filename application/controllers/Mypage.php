<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mypage extends CI_Controller {


	public function index()
	{
		$this->load->view('mycss');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('pages/dashboard\index.php');
		$this->load->view('templates/footer');
		$this->load->view('myjs');
	}
	public function page2()
	{
        $this->load->view('mycss');
		$this->load->view('mypage_view2');
		$this->load->view('mycss');
		echo'';
	}

}
