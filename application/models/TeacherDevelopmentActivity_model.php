<?php

class TeacherDevelopmentActivity_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }

    
    public function get_teacher_All() {
        $this->db->from('TEACHER')
        ->where('DeleteStatus', 0);
         $query = $this->db->get();
        return $query->result();
    }

    public function insert_TeacherDevelopmentActivity($teacher_development_activity) {          
        $result = $this->db->insert('TEACHER_DEVELOPMENT_ACTIVITY', $teacher_development_activity);
        return $result;

    }

    
    public function get_TeacherDevelopmentActivityAll() {
        $this->db->select('td.*, t.*, at.TEACHER_DEVELOPMENT_ACTIVITY_TYPE_NAME')
        ->from('TEACHER_DEVELOPMENT_ACTIVITY td')
        ->join('TEACHER t', 't.TeacherID   = td.TeacherID  ', 'LEFT') 
        ->join('CLS_TEACHER_DEVELOPMENT_ACTIVITY_TYPE at', 'at.TEACHER_DEVELOPMENT_ACTIVITY_TYPE_CODE   = td.DevelopmentActivityTypeCode  ', 'LEFT') 
        ->where('td.DeleteStatus', 0)
        ->where('t.DeleteStatus', 0)
        ;

        $query = $this->db->get();
        return $query->result();

    }

    public function get_TeacherDevelopmentActivity($TeacherID, $DevelopmentActivityName, $DevelopmentActivityStartDate) {
        $this->db->from('TEACHER_DEVELOPMENT_ACTIVITY');
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
        $result = $this->db->update('TEACHER_DEVELOPMENT_ACTIVITY', $teacher_development_activity);
        return $result;
    
    }

    public function delete_teacher_development_activity($TeacherID, $DevelopmentActivityName, $DevelopmentActivityStartDate){        
        $data = [
            'DevelopmentActivityName' => Date('YmdHis'),
            'DeleteStatus' => 1
        ];
        $this->db->where('TeacherID', $TeacherID)
                 ->where('DevelopmentActivityName', $DevelopmentActivityName)
                 ->where('DevelopmentActivityStartDate', $DevelopmentActivityStartDate);

        $result = $this->db->update('TEACHER_DEVELOPMENT_ACTIVITY', $data);
        return $result;
    }
    

}
?>