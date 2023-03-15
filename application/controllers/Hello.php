<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hello extends CI_Controller {


	public function index()
	{
		$this->load->view('hello_view');
		echo'';
	}
    public function index2()
	{
		$this->load->view('index_view');
		echo'';
	}
}
