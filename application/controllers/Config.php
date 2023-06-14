<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once '_authen.php';

class Config extends _authen {

	public function upload(){
		$config['upload_path']          = 'assets/img/uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 50000;
        $config['max_width']            = 3402;
        $config['max_height']           = 1417;
		$config['file_name'] 			= 'logo.png';
		
		copy($config['upload_path'].$config['file_name'],$config['upload_path'].'logoold.png');
		unlink($config['upload_path'].$config['file_name']);
		
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('logofile')){
			copy($config['upload_path'].'logoold.png',$config['upload_path'].$config['file_name']);
			echo str_replace("</p>", "", str_replace("<p>", "", $this->upload->display_errors()));
        }else{
			unlink($config['upload_path'].'logoold.png');
			echo 'อัพโหลดไฟล์เรียบร้อยแล้ว';
		}
	}

	public function upload_privacy_policy_full(){
		$config['upload_path']          = 'assets/docs/';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 50000;
        $config['max_width']            = 3402;
        $config['max_height']           = 1417;
		$config['file_name'] 			= 'privacy_policy_full.pdf';
				
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('privacy_policy_full_file')){
			echo 'อัพโหลดไฟล์เรียบร้อยแล้ว';
        }
	}

	public function upload_privacy_policy_form(){
		$config['upload_path']          = 'assets/docs/';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 50000;
        $config['max_width']            = 3402;
        $config['max_height']           = 1417;
		$config['file_name'] 			= 'privacy_policy_form.pdf';
				
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('privacy_policy_form_file')){
			echo 'อัพโหลดไฟล์เรียบร้อยแล้ว';
        }
	}	
		
    public function update() {
        $this->load->model('Config_model');

        $data = array(
            'x' => $this->input->post('x'),
            'y' => $this->input->post('y')
        );

        if ($this->Config_model->updateitem($data)) {
            echo "บันทึกข้อมูลเรียบร้อยแล้ว";
        } else {
            echo "ไม่สามารถบันทึกได้กรุณาลองใหม่";
        }
    }	
					
}
