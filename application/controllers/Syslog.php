<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once '_authen.php';

class Syslog extends _sandboxcontroller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->library('form_validation');
        //$this->load->model('Project_model', 'project');
    }

    public function Insert(){        		
        $this->load->model('Syslog_model');	
				
        $data = array(
            'LogMessage' => $this->input->post('LogMessage'),
            'LogUserID' => $this->input->post('LogUserID'),
			'LogIpAddress' => $this->input->post('LogIpAddress'),
			'LogCreation' => $this->input->post('LogCreation')
        );

        if ($this->Syslog_model->insertitem($data)) {
            echo "บันทึกข้อมูลเรียบร้อยแล้ว";
        } else {
            echo "ไม่สามารถบันทึกได้กรุณาลองใหม่";
        }		
    }	

    public function Edit(){        		
        $this->load->model('Syslog_model');	
				
        $data = array(
            'LogID' => $this->input->post('LogID'),
            'LogMessage' => $this->input->post('LogMessage'),
            'LogUserID' => $this->input->post('LogUserID'),
			'LogIpAddress' => $this->input->post('LogIpAddress'),
			'LogCreation' => $this->input->post('LogCreation')
        );

        if ($this->Syslog_model->updateitem($data)) {
            echo "บันทึกข้อมูลเรียบร้อยแล้ว";
        } else {
            echo "ไม่สามารถบันทึกได้กรุณาลองใหม่";
        }		
    }	
		
    public function Delete(){
        $this->load->model('Syslog_model');	
		
        $data = array(
            'LogID' => $this->input->post('LogID')
        );
		
        if ($this->Syslog_model->deleteitem($data)) {			
            echo "บันทึกข้อมูลเรียบร้อยแล้ว";
        } else {
            echo "ไม่สามารถบันทึกได้กรุณาลองใหม่";
        }
		
    }	
 
}