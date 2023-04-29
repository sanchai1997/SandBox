<?php

require_once '_sandboxmodel.php';

class Config_model extends _sandboxmodel {

    public function __construct() {
        parent::__construct('CONFIG');
    }

    function getitem($key, $select = "*") {

        $query = $this->db
                ->select($select)
                ->where($key)
                ->get('CONFIG');
				
		return $query->row_array();
				
    }    

    public function updateitem($data) {
        $this->load->database();
        $x = $data['x'];
        unset($data['x']);
        $this->db->where('x', $x);
        $this->db->update('CONFIG', $data);

        if ($this->db->affected_rows() > 0) {
            // Code here after successful insert
            return true; // to the controller
        }
    }
    
}

?>