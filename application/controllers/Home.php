<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function index()
	{
        $this->load->view('mycss');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
		$this->load->view('mypage_view');
        $this->load->view('templates/footer');
		$this->load->view('myjs');
		echo'';
	}


}
