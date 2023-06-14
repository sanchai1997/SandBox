<?php

require_once '_sandboxmodel.php';

class Syslog_model extends _sandboxmodel {

    public function __construct() {
        parent::__construct('SYS_LOG');
    }

    function getitems($key, $select = "*") {

        $query = $this->db
                ->select($select)
                ->where($key)
                ->get('SYS_LOG');
				
		return $query->result_array();				
    }
   
    function getitem($key, $select = "*") {

        $query = $this->db
                ->select($select)
                ->where($key)						
                ->get('SYS_LOG');
				
		return $query->row_array();
				
    }
    
    public function countitems($key, $select) {

        $query = $this->db
                ->select($select)
                ->where($key)
                ->get('SYS_LOG');

        return $query->num_rows();
    }

    public function insertitem($data) {
        $this->load->database();

        $this->db->insert('SYS_LOG', $data);
        if ($this->db->affected_rows() > 0) {
            // Code here after successful insert
            return true; // to the controller
        }
    }	
	
    public function updateitem($data) {
        $this->load->database();
        $key = $data['LogID'];
        unset($data['LogID']);
        $this->db->where('LogID', $key);
        $this->db->update('SYS_LOG', $data);

        if ($this->db->affected_rows() > 0) {
            // Code here after successful insert
            return true; // to the controller
        }
    }
	
    public function deleteitem($data) {
        $this->load->database();

        $this->db->delete('SYS_LOG', $data);
        if ($this->db->affected_rows() > 0) {
            // Code here after successful insert
            return true; // to the controller
        }
    }    
    
}

?>