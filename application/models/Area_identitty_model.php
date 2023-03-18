<?php
class Area_identitty_model extends CI_Model
{

    public function __construct()
    {

        $this->load->database();
        $this->load->helper('url');
    }

    public function get_RELIGION() {
        $query = $this->db->get('CLS_RELIGION');
        return $query->result();
    }

    public function get_OCCUPATION() {
        $query = $this->db->get('CLS_OCCUPATION');
        return $query->result();
    }
}