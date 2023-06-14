<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once '_authen.php';

class GroupRight extends _authen {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->library('form_validation');
        //$this->load->model('Project_model', 'project');
    }

	public function GET_GROUPRIGHTS(){
		$this->load->model('GroupRight_model');

		$UR_GroupID = $this->input->post('UR_GroupID');

		$key = array(
				'UR_GroupID' => $UR_GroupID
				);

		$sql = 'UR_ID, UR_GroupID, UR_Code, UR_Name, UR_Read, UR_Add, UR_Edit, UR_Delete';
		$GROUPRIGHTS = $this->GroupRight_model->getitems($key, $sql);
				
		echo  json_encode($GROUPRIGHTS);		
	}

	public function Insert_GROUPRIGHTS(){
		$this->load->model('GroupRight_model');

		$UR_GroupID = $this->input->post('UR_GroupID');		
        $data = array(
            'UR_GroupID' => $UR_GroupID
        );		
		
        if ($this->GroupRight_model->insertitems($data)) {
            echo "บันทึกข้อมูลเรียบร้อยแล้ว";
        } else {
            echo "ไม่สามารถบันทึกได้กรุณาลองใหม่";
        }		
	}

    public function Insert(){        		
        $this->load->model('GroupRight_model');	
		
        $data = array(
            'UGGroupTypeID' => '',
            'UGName' => $this->input->post('FRM_UGName'),
			'UGSchoolID' => $this->input->post('FRM_UGSchoolID'),
            'UGIsAdmin' => $this->input->post('FRM_UGIsAdmin')
        );

        if ($this->GroupRight_model->insertitem($data)) {
            echo "บันทึกข้อมูลเรียบร้อยแล้ว";
        } else {
            echo "ไม่สามารถบันทึกได้กรุณาลองใหม่";
        }		
    }	

    public function Edit(){
        		
        $this->load->model('GroupRight_model');	
        $data = array(
            'UGID' => $this->input->post('FRM_UGID'),
            'UGName' => $this->input->post('FRM_UGName'),
			'UGSchoolID' => $this->input->post('FRM_UGSchoolID'),
            'UGIsAdmin' => $this->input->post('FRM_UGIsAdmin'),
        );
        if ($this->GroupRight_model->updateitem($data)) {
            echo "บันทึกข้อมูลเรียบร้อยแล้ว";
        } else {
            echo "ไม่สามารถบันทึกได้กรุณาลองใหม่";
        }		
    }	
	
    public function Updates(){
        		
        $this->load->model('GroupRight_model');	
		
		$UR_GroupID = $this->input->post('UR_GroupID');
		$data_checkbox = $this->input->post('data_checkbox');
		//var_dump($data_checkbox);
		$data_update = array(
						'UR_GroupID' => $UR_GroupID ,
						'data_checkbox' => $data_checkbox
						);
						
        if ($this->GroupRight_model->updateitems($data_update) == true) {
            echo "บันทึกข้อมูลเรียบร้อยแล้ว";
        } else {
            echo "ไม่สามารถบันทึกได้กรุณาลองใหม่";
        }		
    }	

    public function Delete(){
        $this->load->model('GroupRight_model');	
		
        $data = array(
            'UGID' => $this->input->post('UGID')
        );
		
        if ($this->GroupRight_model->deleteitem($data)) {
            echo "บันทึกข้อมูลเรียบร้อยแล้ว";
        } else {
            echo "ไม่สามารถบันทึกได้กรุณาลองใหม่";
        }
		
    }	
 
}