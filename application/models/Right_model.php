<?php

require_once '_sandboxmodel.php';

class Right_model extends _sandboxmodel {

    public function __construct() {
        parent::__construct('USR_RIGHTS');
    }

    function getitems($key, $select = "*") {

        $query = $this->db
                ->select($select)
                ->where($key)	
				->order_by('Right_Code asc')
                ->get('USR_RIGHTS');
				
		return $query->result_array();				
    }
   
    public function insertitem($data) {
        $this->load->database();

        $this->db->insert('USR_RIGHTS', $data);
        if ($this->db->affected_rows() > 0) {
            // Code here after successful insert
            return true; // to the controller
        }
    }	
	
    public function updateitem($data) {
        $this->load->database();
        $key = $data['Right_ID'];
        unset($data['Right_ID']);
        $this->db->where('Right_ID', $key);
        $this->db->update('USR_RIGHTS', $data);

        if ($this->db->affected_rows() > 0) {
            // Code here after successful insert
            return true; // to the controller
        }
    }
	
    public function deleteitem($data) {
        $this->load->database();

        $this->db->delete('USR_RIGHTS', $data);
        if ($this->db->affected_rows() > 0) {
            // Code here after successful insert
            return true; // to the controller
        }
    }    
    
}

?>