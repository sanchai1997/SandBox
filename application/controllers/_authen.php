<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once '_sandboxcontroller.php';

abstract  class _authen extends _sandboxcontroller {

    public function __construct() {
        parent::__construct();
		
        $UserID = $this->session->userdata('UserID');
        $UserName = $this->session->userdata('UserName');
        
        if (($UserID="" || empty($UserID)) && ($UserName="" || empty($UserName))) {
            redirect('login');
            exit();
        }else{
			
		}
		
    }
    

    public function index(){
        $this->load->view('welcome_message');
    }
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */