<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {


	public function index()
	{
		$this->load->view('myform_view');
		echo'';
	}
    public function showform()
	{

        $data = array(
            'name' => $this->input->post('name'),
            'lname' => $this->input->post('lname')
        );
        $this->load->view('mycss');
        $this->load->view('form_view',$data);
        $this->load->view('myjs');
        // echo '<pre>';
        // print_r($_POST);
        // echo '<pre>';
	}

}
