<?php

class Budget_model extends CI_Model
{

    public function __construct()
    {

        $this->load->database();
        $this->load->helper('url');
    }

    public function get_expense_type() {
        $query = $this->db->get('cls_expense_type');
        return $query->result();
    }
}
