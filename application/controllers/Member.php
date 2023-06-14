<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once '_authen.php';

class Member extends _authen {

    public function index() {

        $data = array(
            'user_id' => $this->session->userdata('user_id'),
            'user_detail' => $this->session->userdata('user_detail'),
            'user_level' => $this->session->userdata('user_level')
        );	
	
		redirect('config/mainsystem');
		//$this->template->load('template_admin', 'conf_system_view', $data);
    }
	
}
