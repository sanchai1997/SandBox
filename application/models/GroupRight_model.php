<?php

require_once '_sandboxmodel.php';

class GroupRight_model extends _sandboxmodel {

    public function __construct() {
        parent::__construct('USR_GROUPRIGHTS');
    }

    function getitems($key, $select = "*") {

        $query = $this->db
                ->select($select)
                ->where($key)							
                ->get('USR_GROUPRIGHTS');
				
		return $query->result_array();				
    }
   
    function getitem($key, $select = "*") {

        $query = $this->db
                ->select($select)
                ->where($key)
                ->get('USR_GROUPRIGHTS');
				
		return $query->row_array();
				
    }
    
    public function insertitem($data) {
        $this->load->database();

        $this->db->insert('USR_GROUPRIGHTS', $data);
        if ($this->db->affected_rows() > 0) {
            // Code here after successful insert
            return true; // to the controller
        }
    }	
	
    public function insertitems($data) {
        $this->load->database();

        $UR_GroupID = $data['UR_GroupID'];
        unset($data['UR_GroupID']);

        $sql = 'insert into USR_GROUPRIGHTS (UR_GroupID, UR_Code, UR_Name, UR_Read, UR_Add, UR_Edit, UR_Delete) ';
        $sql .= 'SELECT \'' . $UR_GroupID . '\' as UR_GroupID, Right_Code as UR_Code, Right_Name, 0, 0, 0, 0 ';
        $sql .= 'FROM USR_RIGHTS ';
        $sql .= 'ORDER BY UR_Code asc';

		return $this->db->query($sql);
		
    }	
	
    public function updateitem($data) {
        $this->load->database();
        $key = $data['UGID'];
        unset($data['UGID']);
        $this->db->where('UGID', $key);
        $this->db->update('USR_GROUPRIGHTS', $data);

        if ($this->db->affected_rows() > 0) {
            // Code here after successful insert
            return true; // to the controller
        }
    }

    public function updateitems($data) {
        $this->load->database();
        $UR_GroupID = $data['UR_GroupID'];
        unset($data['UR_GroupID']);	
		
        $data_checkbox = $data['data_checkbox'];
        unset($data['data_checkbox']);	
		
		//var_dump($data_checkbox);
		
        $this->db->where('UR_GroupID', $UR_GroupID);
        $this->db->update_batch('USR_GROUPRIGHTS', $data_checkbox, 'UR_Code');

        if ($this->db->affected_rows() > 0) {
            // Code here after successful insert
            return true; // to the controller
        }
    }

	
    public function deleteitem($data) {
        $this->load->database();

        $this->db->delete('USR_GROUPRIGHTS', $data);
        if ($this->db->affected_rows() > 0) {
            // Code here after successful insert
            return true; // to the controller
        }
    }    
    
}

?>