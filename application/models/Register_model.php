<?php

require_once '_sandboxmodel.php';

class Register_model extends _sandboxmodel {

    public function __construct() {
        parent::__construct('USR_REGISTERS');
    }

	function getPerson($key, $select = "*") {
        $PersonType = $key['PersonType'];
        unset($key['PersonType']);
        $UserCardType = $key['UserCardType'];
        unset($key['UserCardType']);
        $UserCardNo = $key['UserCardNo'];
        unset($key['UserCardNo']);
		
		if($UserCardType == "CardID"){
			$where = ' and Person.PersonPersonalID = \'' . $UserCardNo . '\' ';
		}else if($UserCardType == "Passport"){
			$where = ' and Person.PersonPassportNumber = \'' . $UserCardNo . '\' ';
		}else{
			$where = ' and Person.PersonID = \'' . $UserCardNo . '\' ';
		}
		
		
		$sql = '
			select PersonID, PersonPrefixCode, PersonNameThai, PersonLastNameThai, 
			PersonNameEnglish, PersonLastNameEnglish,
			PersonEmail, PersonBirthDate, PersonPersonalID, PersonPassportNumber, 
			PersonSchoolID, PersonGroupID, PersonType
			from (
				select TeacherID as PersonID, 
				TeacherPrefixCode as PersonPrefixCode, TeacherNameThai as PersonNameThai, TeacherLastNameThai as PersonLastNameThai,
				TeacherNameEnglish as PersonNameEnglish, TeacherLastNameEnglish as PersonLastNameEnglish,
				TeacherEmail as PersonEmail, TeacherBirthDate as PersonBirthDate,
				TeacherPersonalID as PersonPersonalID, TeacherPassportNumber as PersonPassportNumber, SchoolID as PersonSchoolID,
				\'2\' as PersonGroupID,	
				\'Teacher\' as PersonType
				from TEACHER
				
				UNION
				select StudentID as PersonID, 
				StudentPrefixCode as PersonPrefixCode, StudentNameThai as PersonNameThai, StudentLastNameThai as PersonLastNameThai,
				StudentNameEnglish as PersonNameEnglish, StudentLastNameEnglish as PersonLastNameEnglish,
				\'\' as PersonEmail, StudentBirthDate as PersonBirthDate,
				StudentPersonalID as PersonPersonalID, StudentPassportNumber as PersonPassportNumber, SchoolID as PersonSchoolID,
				\'3\' as PersonGroupID,	
				\'Student\' as PersonType
				from STUDENT
				
				UNION
				select StudentID as PersonID, 
				FatherPrefixCode as PersonPrefixCode, FatherNameThai as PersonNameThai, FatherLastNameThai as PersonLastNameThai,
				FatherNameEnglish as PersonNameEnglish, FatherLastNameEnglish as PersonLastNameEnglish,
				\'\' as PersonEmail, \'\' as PersonBirthDate,
				FatherPersonalID as PersonPersonalID, FatherPassportNumber as PersonPassportNumber, SchoolID as PersonSchoolID,
				\'4\' as PersonGroupID,	
				\'Father\' as PersonType
				from STUDENT
				
				UNION
				select StudentID as PersonID, 
				MotherPrefixCode as PersonPrefixCode, MotherNameThai as PersonNameThai, MotherLastNameThai as PersonLastNameThai,
				MotherNameEnglish as PersonNameEnglish, MotherLastNameEnglish as PersonLastNameEnglish,
				\'\' as PersonEmail, \'\' as PersonBirthDate,
				MotherPersonalID as PersonPersonalID, MotherPassportNumber as PersonPassportNumber, SchoolID as PersonSchoolID,
				\'4\' as PersonGroupID,	
				\'Mother\' as PersonType				
				from STUDENT
				
				UNION
				select StudentID as PersonID, 
				GuardianPrefixCode as PersonPrefixCode, GuardianNameThai as PersonNameThai, GuardianLastNameThai as PersonLastNameThai,
				GuardianNameEnglish as PersonNameEnglish, GuardianLastNameEnglish as PersonLastNameEnglish,
				\'\' as PersonEmail, \'\' as PersonBirthDate,
				GuardianPersonalID as PersonPersonalID, GuardianPassportNumber as PersonPassportNumber, SchoolID as PersonSchoolID,
				\'4\' as PersonGroupID,	
				\'Guardian\' as PersonType				
				from STUDENT
				
				UNION
				select PersonnelID as PersonID, 
				PersonnelPrefixCode as PersonPrefixCode, PersonnelNameThai as PersonNameThai, PersonnelLastNameThai as PersonLastNameThai,
				PersonnelNameEnglish as PersonNameEnglish, PersonnelLastNameEnglish as PersonLastNameEnglish,
				PersonnelEmail as PersonEmail, \'\' as PersonBirthDate,
				PersonnelPersonalID as PersonPersonalID, PersonnelPassportNumber as PersonPassportNumber, \'-99999\' as PersonSchoolID,
				\'7\' as PersonGroupID,	
				\'Personnel\' as PersonType
				from PERSONNEL
				
				) as Person
			where Person.PersonType = \'' . $PersonType . '\' ' . $where . '
			
		';

		$query = $this->db->query($sql);

		return $query->row_array();
		
    }

    function getitems($key, $select = "*") {

        $query = $this->db
                ->select($select)
                ->where($key)
                ->where('USR_REGISTERS.UserActivate = 0')
                ->join('USR_USERGROUPS', 'USR_USERGROUPS.UGID = USR_REGISTERS.UserGroupID', 'left outer')															
                ->join('SCHOOL', 'SCHOOL.SchoolID = USR_REGISTERS.UserSchoolID', 'left outer')								
                ->get('USR_REGISTERS');
				
		return $query->result_array();				
    }
   
    function getitem($key, $select = "*") {

        $query = $this->db
                ->select($select)
                ->where($key)
                ->join('USR_USERGROUPS', 'USR_USERGROUPS.UGSchoolID = USR_REGISTERS.UserSchoolID and USR_USERGROUPS.UGID = USR_REGISTERS.UserGroupID', 'left outer')								
                ->join('USR_GROUPS', 'USR_GROUPS.GroupID = USR_REGISTERS.UserGroupID', 'left outer')								
                ->join('SCHOOL', 'SCHOOL.SchoolID = USR_REGISTERS.UserSchoolID', 'left outer')								
                ->get('USR_REGISTERS');
				
		return $query->row_array();
				
    }

    
    function getsalt($UserName){
        
        $query = $this->db
                ->select('SALT')
                ->where('UserName',$UserName)
                ->get('USR_REGISTERS');

        return $query->row_array();        
    }

    public function countitems($key, $select) {

        $query = $this->db
                ->select($select)
                ->where($key)
                ->get('USR_REGISTERS');

        return $query->num_rows();
    }

    public function insertitem($data) {
        $this->load->database();

        $this->db->insert('USR_REGISTERS', $data);
        if ($this->db->affected_rows() > 0) {
            // Code here after successful insert
            return true; // to the controller
        }
    }	
	
    public function updateitem($data) {
        $this->load->database();
        $UserID = $data['UserID'];
        unset($data['UserID']);
		
        $this->db->where('UserID', $UserID);
        $this->db->update('USR_REGISTERS', $data);

        if ($this->db->affected_rows() > 0) {
            // Code here after successful insert
            return true; // to the controller
        }
    }
	
    public function deleteitem($data) {
        $this->load->database();

        $this->db->delete('USR_REGISTERS', $data);
        if ($this->db->affected_rows() > 0) {
            // Code here after successful insert
            return true; // to the controller
        }
    }    
    
}

?>