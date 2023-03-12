<?php

class TeacherDevelopmentActivity_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }

    public function insert_TeacherDevelopmentActivity($teacher_development_activity) {          
        $result = $this->db->insert('teacher_development_activity', $teacher_development_activity);
        return $result;

    }

    
    public function get_TeacherDevelopmentActivityAll() {
        $this->db->select('td.*, t.TeacherNameThai, at.TEACHER_DEVELOPMENT_ACTIVITY_TYPE_NAME')
        ->from('teacher_development_activity td')
        ->join('teacher t', 't.TeacherID   = td.TeacherID  ', 'LEFT') 
        ->join('cls_teacher_development_activity_type at', 'at.TEACHER_DEVELOPMENT_ACTIVITY_TYPE_CODE   = td.DevelopmentActivityTypeCode  ', 'LEFT') 
        ->where('td.DeleteStatus', 0)
        ;

        $query = $this->db->get();
        return $query->result();

    }

    public function get_TeacherDevelopmentActivity($TeacherID, $DevelopmentActivityName, $DevelopmentActivityStartDate) {
        $this->db->from('teacher_development_activity');
        $this->db->where('TeacherID', $TeacherID)
                ->where('DevelopmentActivityName ', $DevelopmentActivityName  ) 
                ->where('DevelopmentActivityStartDate  ', $DevelopmentActivityStartDate  ) 
                ->where('DeleteStatus', 0)
                ;
        $query = $this->db->get();
        
        return $query->result();
    }

    public function update_TeacherDevelopmentActivity($Old_TeacherID, $Old_DevelopmentActivityName, $Old_DevelopmentActivityStartDate, $teacher_development_activity) {
        $this->db->where('TeacherID', $Old_TeacherID)
                ->where('DevelopmentActivityName ', $Old_DevelopmentActivityName  ) 
                ->where('DevelopmentActivityStartDate  ', $Old_DevelopmentActivityStartDate  ) 
                ;
        $result = $this->db->update('teacher_development_activity', $teacher_development_activity);
        return $result;
    
    }

    public function delete_teacher_development_activity($TeacherID, $DevelopmentActivityName, $DevelopmentActivityStartDate){
        show_error($TeacherID.' : '.$DevelopmentActivityName.' : '.$DevelopmentActivityStartDate);
        
        $data = [
            'DeleteStatus' => 1
        ];
        $this->db->where('TeacherID', $TeacherID)
                 ->where('DevelopmentActivityName', $DevelopmentActivityName)
                 ->where('DevelopmentActivityStartDate', $DevelopmentActivityStartDate);

        $result = $this->db->update('teacher_development_activity', $data);
        return $result;
    }
    

}
?>