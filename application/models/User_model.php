<?php

require_once '_sandboxmodel.php';

class User_model extends _sandboxmodel {

    public function __construct() {
        parent::__construct('USR_USERS');
    }

    function getitems($key, $select = "*") {

        $query = $this->db
                ->select($select)
                ->where($key)
                ->join('USR_USERGROUPS', 'USR_USERGROUPS.UGID = USR_USERS.UserGroupID', 'left outer')															
                ->join('SCHOOL', 'SCHOOL.SchoolID = USR_USERS.UserSchoolID', 'left outer')								
                ->get('USR_USERS');
				
		return $query->result_array();				
    }

    function getitems_join($key, $select = "*") {

        $query = $this->db
                ->select($select)
                ->where($key)
                ->join('servicepoint', 'servicepoint.svp_department = USR_USERS.user_depcode', 'left outer')								
				->order_by("USR_USERS.user_id", "asc")
                ->get('USR_USERS');
				
		return $query->result_array();
				
    }
   
    function getitem($key, $select = "*") {

        $query = $this->db
                ->select($select)
                ->where($key)
                ->join('USR_USERGROUPS', 'USR_USERGROUPS.UGSchoolID = USR_USERS.UserSchoolID and USR_USERGROUPS.UGID = USR_USERS.UserGroupID', 'left outer')								
                ->join('USR_GROUPS', 'USR_GROUPS.GroupID = USR_USERS.UserGroupID', 'left outer')								
                ->join('SCHOOL', 'SCHOOL.SchoolID = USR_USERS.UserSchoolID', 'left outer')								
                ->get('USR_USERS');
				
		return $query->row_array();
				
    }

    function getitem_join($key, $select = "*") {

        $query = $this->db
                ->select($select)
                ->where($key)
                ->join('servicepoint', 'servicepoint.svp_department = USR_USERS.user_depcode', 'left outer')				
                ->get('USR_USERS');
				
		return $query->row_array();
				
    }
    
    function getsalt($UserName){
        
        $query = $this->db
                ->select('SALT')
                ->where('UserName',$UserName)
                ->get('USR_USERS');

        return $query->row_array();        
    }

    public function countitems($key, $select) {
        if (!is_array($key)) {
            $key = array('user_id' => $key);
        }

        $query = $this->db
                ->select($select)
                ->where($key)
                ->get('USR_USERS');

        return $query->num_rows();
    }

    public function insertitem($data) {
        $this->load->database();

        $this->db->insert('USR_USERS', $data);
        if ($this->db->affected_rows() > 0) {
            // Code here after successful insert
            return true; // to the controller
        }
    }	
	
    public function updateitem($data) {
        $this->load->database();
        $key = $data['UserID'];
        unset($data['UserID']);
        $this->db->where('UserID', $key);
        $this->db->update('USR_USERS', $data);

        if ($this->db->affected_rows() > 0) {
            // Code here after successful insert
            return true; // to the controller
        }
    }
	
    public function deleteitem($data) {
        $this->load->database();

        $this->db->delete('USR_USERS', $data);
        if ($this->db->affected_rows() > 0) {
            // Code here after successful insert
            return true; // to the controller
        }
    }    
    
}

?>