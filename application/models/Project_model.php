<?php
class Project_model extends CI_Model{
 
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }
 
    /*
        Get all the records from the database
    */
    public function get_all_school()
    {
        $projects = $this->db->get("SCHOOL")->result();
        return $projects;
    }
 
    /*
        Store the record in the database
    */
    public function add_school()
    {    
        $data = [
            'NAME_TH' => $this->input->post('NAME_TH'),
            'NAME_EN' => $this->input->post('NAME_EN')
        ];
 
        $result = $this->db->insert('SCHOOL', $data);
        return $result;
    }
 
   
     
}
    
?>