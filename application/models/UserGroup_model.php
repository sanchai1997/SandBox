<?php

require_once '_sandboxmodel.php';

class UserGroup_model extends _sandboxmodel {

    public function __construct() {
        parent::__construct('USR_USERGROUPS');
    }

    function getitems($key, $select = "*") {

        $query = $this->db
                ->select($select)
                ->where($key)
                ->join('USR_GROUPS', 'USR_GROUPS.GroupID = USR_USERGROUPS.UGGroupTypeID', 'left outer')								
                ->join('SCHOOL', 'SCHOOL.SchoolID = USR_USERGROUPS.UGSchoolID', 'left outer')	
				->join('(SELECT UserGroupID, count(UserID) as Member_Count FROM USR_USERS group by UserGroupID) as GroupMember', 'USR_USERGROUPS.UGID = GroupMember.UserGroupID', 'left outer')
				->order_by('USR_USERGROUPS.UGID asc')
                ->get('USR_USERGROUPS');
				
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

        $this->db->insert('USR_USERGROUPS', $data);
        if ($this->db->affected_rows() > 0) {
            // Code here after successful insert
            return true; // to the controller
        }
    }	
	
    public function updateitem($data) {
        $this->load->database();
        $key = $data['UGID'];
        unset($data['UGID']);
        $this->db->where('UGID', $key);
        $this->db->update('USR_USERGROUPS', $data);

        if ($this->db->affected_rows() > 0) {
            // Code here after successful insert
            return true; // to the controller
        }
    }
	
    public function deleteitem($data) {
        $this->load->database();

        $this->db->delete('USR_USERGROUPS', $data);
        if ($this->db->affected_rows() > 0) {
            // Code here after successful insert
            return true; // to the controller
        }
    }    
    
}

?>