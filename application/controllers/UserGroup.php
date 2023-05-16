<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once '_authen.php';

class UserGroup extends _authen {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->library('form_validation');
        //$this->load->model('Project_model', 'project');
    }

	public function Get_UserGroups(){
		$this->load->model('UserGroup_model');

		$UGSchoolID = $this->input->post('UGSchoolID');

		$key = array(
				'UGSchoolID' => $UGSchoolID
				);

		$sql = 'UGID, UGGroupTypeID, UGName, UGSchoolID, UGIsAdmin';
		$UserGroups = $this->UserGroup_model->getitems($key, $sql);
				
		echo  json_encode($UserGroups);		
	}

    public function Insert(){        		
        $this->load->model('UserGroup_model');	
		
		if($this->input->post('FRM_UGIsAdmin') <> NULL){
			$UGIsAdmin = $this->input->post('FRM_UGIsAdmin');
		}else{
			$UGIsAdmin = 0;						
		}		
		
        $data = array(
            'UGGroupTypeID' => '',
            'UGName' => $this->input->post('FRM_UGName'),
			'UGSchoolID' => $this->input->post('FRM_UGSchoolID'),
            'UGIsAdmin' => $UGIsAdmin
        );

        if ($this->UserGroup_model->insertitem($data)) {
            echo "บันทึกข้อมูลเรียบร้อยแล้ว";
        } else {
            echo "ไม่สามารถบันทึกได้กรุณาลองใหม่";
        }		
    }	

    public function Edit(){        		
        $this->load->model('UserGroup_model');	
		
		if($this->input->post('FRM_UGIsAdmin') <> NULL){
			$UGIsAdmin = $this->input->post('FRM_UGIsAdmin');
		}else{
			$UGIsAdmin = 0;						
		}
		
        $data = array(
            'UGID' => $this->input->post('FRM_UGID'),
            'UGName' => $this->input->post('FRM_UGName'),
			'UGSchoolID' => $this->input->post('FRM_UGSchoolID'),
            'UGIsAdmin' => $UGIsAdmin,
        );
        if ($this->UserGroup_model->updateitem($data)) {
            echo "บันทึกข้อมูลเรียบร้อยแล้ว";
        } else {
            echo "ไม่สามารถบันทึกได้กรุณาลองใหม่";
        }		
    }	
	
    public function Delete(){
        $this->load->model('UserGroup_model');	
        $this->load->model('GroupRight_model');	
		
        $data = array(
            'UGID' => $this->input->post('UGID')
        );
		
        if ($this->UserGroup_model->deleteitem($data)) {
			
			$data_GroupRight = array(
				'UR_GroupID' => $this->input->post('UGID')
			);
			$this->GroupRight_model->deleteitem($data_GroupRight);
			
            echo "บันทึกข้อมูลเรียบร้อยแล้ว";
        } else {
            echo "ไม่สามารถบันทึกได้กรุณาลองใหม่";
        }
		
    }	
 
}