<?php

class Graduated_model extends CI_Model
{

    public function __construct()
    {

        $this->load->database();
        $this->load->helper('url');
    }

    //Delete Data graduated
    public function delete_graduated($StudentReferenceID, $SchoolID, $EducationYear, $Semester, $GradeLevelCode)
    {
        $data = [

            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('StudentReferenceID', $StudentReferenceID)
            ->where('GraduatedSchoolID', $SchoolID)
            ->where('EducationYear', $EducationYear)
            ->where('Semester', $Semester)
            ->where('GraduatedGradeLevelCode', $GradeLevelCode)
            ->update('GRADUATED', $data);
        return $result;
    }
}
