<?php

class Summary_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_school_All()
    {
        $this->db->from('SCHOOL')
            ->where('DeleteStatus', 0);
        $query = $this->db->get();

        return $query->num_rows();
    }

    public function get_teacher_All()
    {
        $this->db->from('TEACHER')
            ->where('DeleteStatus', 0);
        $query = $this->db->get();

        return $query->num_rows();
    }

    public function get_personnel_All()
    {
        $this->db->from('PERSONNEL')
            ->where('DeleteStatus', 0);
        $query = $this->db->get();

        return $query->num_rows();
    }
	
    public function get_student_All()
    {
        $this->db->from('STUDENT')
            ->where('DeleteStatus', 0);
        $query = $this->db->get();

        return $query->num_rows();
    }	

}
