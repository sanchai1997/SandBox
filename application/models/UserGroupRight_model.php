<?php

require_once '_sandboxmodel.php';

class UserGroupRight_model extends _sandboxmodel {

    public function __construct() {
        parent::__construct('USR_GROUPRIGHTS');
    }

    function getitems($key, $select = "*") {

        $query = $this->db
                ->select($select)
                ->where($key)
				->order_by('UR_GroupID, UR_Code')
                ->get('USR_GROUPRIGHTS');
				
		return $query->result_array();				
    }    
}

?>